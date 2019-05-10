<?php
 session_start();


        $conn = new mysqli("localhost","root","","be_fit");
        // CODE RUNS WHEN FORM SUBMIT
        if (isset($_POST['submit'])) {
            # code...
        //echo "asasasaasasas";
            
           $firstname = $_POST['firstname'];
           $lastname = $_POST['lastname'];
           $email = $_POST['email'];
           $age = $_POST['age'];
           $weight = $_POST['weight'];
           $height = $_POST['height'];
           //$phone = $_POST['phone'];
           $gender = $_POST['gender'];
           $password = $_POST['password'];





           $targetWeight = $_POST['targetWeight'];
           $activityLevel = $_POST['activityLevel'];








            
          // echo  $_SESSION['PURCHASE_BILL_NO'] ;

           // echo "INSERT INTO product (product_supplier_name,poduct_name,
           //   product_expiry_date,product_mrp,product_rp,product_vat,product_batch_code,
           //   product_quantity,product_free_quantity,product_total_quantity,product_product_type,
           //   product_tablets,product_tablet_price,product_company_name)
           // VALUES ('$supplier_name','$product_name','$date','$mrp','$rp','$vat','$batch_code','$quantity','$free',
           //   '$total_quantity','$product_type','$tablets','$tablet_price','$company')";


           $sql = "INSERT INTO user_detail (password,first_name,last_name,Age,gender,height,weight,email_address,targetWeight,activityLevel)
            VALUES ('$password','$firstname','$lastname','$age','$gender','$height','$weight','$email','$targetWeight','$activityLevel')";

                 if(mysqli_query($conn, $sql)){
                    $_SESSION['UNSUCCESS_MESSAGE']='You are successfully Sign up ...!!';
                     header('Location: signup.php');


                 } else{
                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                 }
         
        // Close connection
         //mysqli_close($conn);
        }




