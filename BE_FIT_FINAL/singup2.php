
























        
    <?php



    session_start();

$host = "localhost";
$db_name = "be_fit";
$username = "root";
$password = "";


$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    // save the username and password
    if(isset($_POST['submit'])){
     
        try{
            // load database connection and password hasher library
            
            

require("libs/PasswordHash.php");

            $firstname = $_POST['firstname'];
           $lastname = $_POST['lastname'];
           $email = $_POST['email'];
           $age = $_POST['age'];
           $weight = $_POST['weight'];
           $height = $_POST['height'];
           //$phone = $_POST['phone'];
           $gender = $_POST['gender'];

            $targetWeight = $_POST['targetWeight'];
           $activityLevel = $_POST['activityLevel'];
           
             
            /* 
             * -prepare password to be saved
             * -concatinate the salt and entered password 
             */
            $salt = "ipDaloveyBuohgGTZwcodeRJ1avofZ7HbZjzJbanDS8gtoninjaYj48CW" . $_POST['email'];
            $password = $salt . $_POST['password'];
             
            /* 
             * '8' - base-2 logarithm of the iteration count used for password stretching
             * 'false' - do we require the hashes to be portable to older systems (less secure)?
             */
            $hasher = new PasswordHash(8,false);
            $password = $hasher->HashPassword($password);
 
            // insert command
            $query = "INSERT INTO user_detail (password,first_name,last_name,Age,gender,height,weight,email_address,targetWeight,activityLevel)
            VALUES ('$password','$firstname','$lastname','$age','$gender','$height','$weight','$email','$targetWeight','$activityLevel')";
 
            $stmt = $conn->prepare($query);
 
            $stmt->bindParam(1, $_POST['email']);
            $stmt->bindParam(2, $password);
 
            // execute the query
            if($stmt->execute()){
               $_SESSION['UNSUCCESS_MESSAGE']='You are successfully Sign up ...!!';
                     header('Location: signup.php');
            }else{
                echo "<div>Unable to register. <a href='register.php'>Please try again.</a></div>";
            }
             
        }
         
        //to handle error
        catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }
    }
     
    
    ?>
