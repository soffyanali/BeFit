









<?php

session_start();
    // form is submitted, check if acess will be granted
    if(isset($_POST['submit'])){
     
        try{



            $host = "localhost";
$db_name = "be_fit";
$username = "root";
$password = "";


$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
            // load database connection and password hasher library
            
$email = $_POST['email'];
            require 'libs/PasswordHash.php';
             
            // prepare query
            $query = "select email_address, password from User_Detail where email_address = '$email' limit 0,1";

            echo $query;
            $stmt = $conn->prepare( $query );
             
            // this will represent the first question mark
            $stmt->bindParam(1, $_POST['email']);
             
            // execute our query
            $stmt->execute();
             
            // count the rows returned
            $num = $stmt->rowCount();
             
            if($num==1){
                 
                //store retrieved row to a 'row' variable
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
             
                // hashed password saved in the database
                $storedPassword = $row['password'];

                
                echo $storedPassword;
                 
                // salt and entered password by the user
                $salt = "ipDaloveyBuohgGTZwcodeRJ1avofZ7HbZjzJbanDS8gtoninjaYj48CW";
                $postedPassword = $_POST['password'];
                $saltedPostedPassword = $salt . $postedPassword;
             
                // instantiate PasswordHash to check if it is a valid password
                $hasher = new PasswordHash(8,false);
                $check = $hasher->CheckPassword($saltedPostedPassword, $storedPassword);
                 
                /*
                 * access granted, for the next steps,
                 * you may use my php login script with php sessions tutorial :) 
                 */
                if($check){
                   $_SESSION['login_user']=$email;
header("location: dashboard.php");

                }
                 
                // $check variable is false, access denied.
                else{
                  $error = "Username or Password is invalid";
$_SESSION['UNSUCCESS_MESSAGE']='Please enter correct usename or password ..!!  ';
header("location: login.php");
                }
                 
            }
             
            // no rows returned, access denied
            else{
                $error = "Username or Password is invalid";
$_SESSION['UNSUCCESS_MESSAGE']='Please enter correct usename or password ..!!hey you';
header("location: login.php");
            }
             
        }
        //to handle error
        catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }
     
         
    }
     
   
    ?>