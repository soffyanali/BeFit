    <?php

//Getting user id
           $sql9 = new mysqli("localhost","root","","be_fit"); //EDIT with your parameters for DB
            $sql9 -> set_charset ( 'utf8' );
            if ($sql9->connect_errno) {
            printf("Connect failed: %s\n", $sql9->connect_error);
            exit();}

$user = $_SESSION['login_user'];
           $sql2 = "SELECT userid FROM user_detail WHERE email_address = '$user'";
           if ($result = $sql9->query($sql2)) {
while ($row = $result->fetch_assoc()) {
$userid = $row['userid']; 
}}

    $conn = new mysqli("localhost", "root", "", "be_fit");
   
// SELECT DISTINCT(items.item_name),items.item_id,items.Energ_Kcal,items.Carbohydrt,items.Protein FROM items inner join recommendation ON items.item_name=recommendation.rhs WHERE recommendation.userid = 1 and recommendation.lhs =(select Selected_Items.Item_Name from Selected_Items where Selected_Items.user_ID = 1 ORDER by Selected_Items.ID DESC limit 1) ORDER by items.item_id DESC LIMIT 5

    $sql2 = "SELECT DISTINCT(items.item_name),items.item_id,items.Energ_Kcal,items.Carbohydrt,items.Protein FROM items inner join recommendation ON items.item_name=recommendation.rhs WHERE recommendation.userid = $userid and recommendation.lhs =(select Selected_Items.Item_Name from Selected_Items where Selected_Items.user_ID = $userid ORDER by Selected_Items.ID DESC limit 1) ORDER by items.item_id DESC LIMIT 5";
     $diet_list2= "";


                if($result = mysqli_query($conn, $sql2)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){


                                $diet_list2 .="<tr>
                                <td>
                                            <input  class='messageCheckbox'  type='checkbox' value= '$row[item_name]'  name='select'>
                                                        
                                            </td>
                                            <td>".$row['item_name']."</td>
                                            <td>".$row['Energ_Kcal']."</td>
                                            <td>".$row['Carbohydrt']."</td>
                                            <td>".$row['Protein']."</td>
                                        </tr> ";
                                  }
            
                                 // Close result set
                                 mysqli_free_result($result);
                        } else{
                             echo "No records matching your query were found.";
                        }

                }   else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }



//     $files = glob('output/*'); // glob() function searches for all the path names matching pattern
// foreach($files as $file){ 
//   if(is_file($file))
//     unlink($file); // delete
// }




// $email = $_SESSION['login_user'];


//     $conn = new mysqli("localhost", "root", "", "be_fit");
//     $sql2 = "SELECT * FROM user_detail where email_address='$email'";

    
//                 if($result = mysqli_query($conn, $sql2)){
    
//                         if(mysqli_num_rows($result) > 0){
//                             while($row = mysqli_fetch_array($result)){
//                                          $gender=$row['gender'];
//                                          $height=$row['height'];
//                                          $weight=$row['weight'];
//                                          $age=$row['Age'];
//                                          $activityLevel=$row['activityLevel'];
//                                         $targetWeight=$row['targetWeight'];

//        }
                            
            
                                 
//                                  mysqli_free_result($result);
//                         } else{
//                              echo "No records matching your query were found.";
//                         }

//                 }   else{
//                         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//                 }

    

//         function bmi($weight,$height) {
//             $ht=$height/100;
//             $bmi = $weight/($ht*$ht);
            
//         if ($bmi <= 18.5) {
//             $output = "UNDERWEIGHT";

//             } else if ($bmi > 18.5 AND $bmi<=24.9 ) {
//             $output = "NORMAL WEIGHT";

//             } else if ($bmi > 24.9 AND $bmi<=29.9) {
//             $output = "OVERWEIGHT";

//             } else if ($bmi > 30.0) {
//             $output = "OBESE";
//         }
//         //echo nl2br("Your BMI value is  " . $bmi . "  and you are : "); 
//         //echo nl2br("$output");
//             return $bmi;
//         }


//        $bmiuser = bmi($weight,$height); 

//        function  calculateBMR($height,$weight,$gender,$age,$activityLevel) { 
//             $bmr=((10 * $weight) + (6.25*$height) - (5*$age));
        
//             if($gender=="male") {
//                 $bmr+= 5;
               
//             }
//             else if($gender=="female") {
//                 $bmr-= 161;
               
//             }
//             $calories=$bmr*$activityLevel;
            
//             return $calories;
//             }
//     function calculateCaloriesNeeded($height,$gender, $age, $activityLevel, $targetWeight) {
            
//             $ht=$height/100;

//             if($targetWeight==0) {
//                 $targetWeight=24*$ht*$ht;
//             }
//             //echo nl2br("\n Your Target Weight is " . $targetWeight . " kgs!"); 
//             $caloriesNeeded=calculateBMR($height, $targetWeight, $gender, $age,$activityLevel);
//            // echo nl2br("\n To reach the target weight, you need " . $caloriesNeeded . " Calories per day!");
//             return $caloriesNeeded;
//         }

//     $caloriesRequired=calculateCaloriesNeeded($height,$gender, $age, $activityLevel, $targetWeight);


//     $percentage = 40;
// $caloriesRequiredForBreakfast = ($percentage / 100) * $caloriesRequired;

///////////////////////////////////////////////////////////////////////////////





// Recommended recipes table


    $conn = new mysqli("localhost", "root", "", "be_fit");
    $sql2 = "SELECT * FROM items ";
     $diet_list1= "";


                if($result = mysqli_query($conn, $sql2)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){


                                $diet_list1 .="<tr>
                                <td>
                                            <input  class='messageCheckbox'  type='checkbox' value= '$row[item_name]'  name='select'>
                                                        
                                            </td>
                                            <td>".$row['item_id']."</td>
                                            <td>".$row['item_name']."</td>
                                            <td>".$row['Carbohydrt']."</td>
                                            <td>".$row['Energ_Kcal']."</td>
                                            <td>".$row['Protein']."</td>
                                            <td>".$row['FA_Sat']."</td>
                                            <td>".$row['FA_Mono']."</td>
                                            <td>".$row['FA_Poly']."</td>
                                        </tr> ";
                                  }
            
                                 // Close result set
                                 mysqli_free_result($result);
                        } else{
                             echo "No records matching your query were found.";
                        }

                }   else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }


/////////////////////////////////////////////////////////////////////////////////////////

                // After clicking submit button insert the selected items into database

        if (isset($_POST['submit'])) {
           



            session_start();

            
           $item_name = $_POST['select'];
        




           $sql9 = new mysqli("localhost","root","","be_fit"); //EDIT with your parameters for DB
            $sql9 -> set_charset ( 'utf8' );
            if ($sql9->connect_errno) {
            printf("Connect failed: %s\n", $sql9->connect_error);
            exit();}

$user = $_SESSION['login_user'];
           $sql2 = "SELECT userid FROM user_detail WHERE email_address = '$user'";
           if ($result = $sql9->query($sql2)) {
while ($row = $result->fetch_assoc()) {
$userid = $row['userid']; 
}}


           $sql4 = "INSERT INTO Selected_Items (user_ID,Item_Name) VALUES ('$userid','$item_name')";

                 if(mysqli_query($conn, $sql4)){
                    $_SESSION['UNSUCCESS_MESSAGE']='Record Added Succesfully ...!!';
                     //header('Location: diet.php');
 include_once('r.php');   // including r script

                 } else{
                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                 }
         
        // Close connection
         //mysqli_close($conn);


        }



