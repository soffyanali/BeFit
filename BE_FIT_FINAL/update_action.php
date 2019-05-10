<?php
session_start();
$conn = new mysqli("localhost", "root", "", "be_fit");
 

 $user = $_SESSION['login_user'];

//require_once("db.php");

$sql = "SELECT * FROM user_detail where email_address='$user'";


if ($result = $conn->query($sql)){

        while($row= $result->fetch_array()){

                                            $firstname=$row['first_name'];
                                            $lastname=$row['last_name'];
                                            $Age=$row['Age'];
                                            $height=$row['height'];
                                            $weight=$row['weight'];
                                            $targetWeight=$row['targetWeight'];
                   }
        }
        //$result->free();


        


         // Free memory associated with the query
    

    /* free result set */
//$result->free();

/* close connection */
//$conn->close();

 
// // Close connectio
 //exit();




if(isset($_POST['submit'])){

//echo"hi";

    $conn = new mysqli("localhost", "root", "", "be_fit");
             //echo "alert";
          $firstname = $_POST['firstname'];
           $lastname = $_POST['lastname'];
            $Age = $_POST['Age'];
           $height = $_POST['height'];
           $weight = $_POST['weight'];
           $targetWeight = $_POST['targetWeight'];





          $sql = "UPDATE user_detail SET 
              first_name='$firstname',
              last_name='$lastname',
              Age='$Age',
              height='$height',
              weight='$weight',
              targetWeight='$targetWeight'
             WHERE email_address='$user'";

           if($result = $conn->query($sql)){
             $_SESSION['SUCCESS_MESSAGE']='Record updated Succesfully ...!!';
               header('Location: update.php');

           } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
           }

       }

?>
