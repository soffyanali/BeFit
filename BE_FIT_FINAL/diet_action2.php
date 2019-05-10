    <?php

$email = $_SESSION['login_user'];


    $conn = new mysqli("localhost", "root", "", "be_fit");
    $sql2 = "SELECT * FROM user_detail where email_address='$email'";

    
                if($result = mysqli_query($conn, $sql2)){
    
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                         $gender=$row['gender'];
                                         $height=$row['height'];
                                         $weight=$row['weight'];
                                         $age=$row['Age'];
                                         $activityLevel=$row['activityLevel'];
                                        $targetWeight=$row['targetWeight'];

       }
                            
            
                                 
                                 mysqli_free_result($result);
                        } else{
                             echo "No records matching your query were found.";
                        }

                }   else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }

    

        function bmi($weight,$height) {
            $ht=$height/100;
            $bmi = $weight/($ht*$ht);
            
        if ($bmi <= 18.5) {
            $output = "UNDERWEIGHT";

            } else if ($bmi > 18.5 AND $bmi<=24.9 ) {
            $output = "NORMAL WEIGHT";

            } else if ($bmi > 24.9 AND $bmi<=29.9) {
            $output = "OVERWEIGHT";

            } else if ($bmi > 30.0) {
            $output = "OBESE";
        }
        //echo nl2br("Your BMI value is  " . $bmi . "  and you are : "); 
        //echo nl2br("$output");
            return $output;

        }

// storing bmi in variable bmiuser
       $bmiuser = bmi($weight,$height); 

       function  calculateBMR($height,$weight,$gender,$age,$activityLevel) { 
            $bmr=((10 * $weight) + (6.25*$height) - (5*$age));
        
            if($gender=="male") {
                $bmr+= 5;
               
            }
            else if($gender=="female") {
                $bmr-= 161;
               
            }
            $calories=$bmr*$activityLevel;
            
            return $calories;
            }
    function calculateCaloriesNeeded($height,$gender, $age, $activityLevel, $targetWeight) {
            
            $ht=$height/100;

            if($targetWeight==0) {
                $targetWeight=24*$ht*$ht;
            }
            //echo nl2br("\n Your Target Weight is " . $targetWeight . " kgs!"); 
            $caloriesNeeded=calculateBMR($height, $targetWeight, $gender, $age,$activityLevel);
           // echo nl2br("\n To reach the target weight, you need " . $caloriesNeeded . " Calories per day!");
            return $caloriesNeeded;
        }
//stored calories required in variable caloriesRequired
    $caloriesRequired=calculateCaloriesNeeded($height,$gender, $age, $activityLevel, $targetWeight);

//divide the calories for breakfast
    $percentage = 40;
$caloriesRequiredForBreakfast = ($percentage / 100) * $caloriesRequired;


//Recommended recipes
    $conn = new mysqli("localhost", "root", "", "be_fit");
    $sql2 = "SELECT * FROM recipe where calories between $caloriesRequiredForBreakfast-100 and $caloriesRequiredForBreakfast+100 ORDER BY calories DESC limit 10";
     $diet_list1="";


                if($result = mysqli_query($conn, $sql2)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){


                                $diet_list1 .="<tr>
                                <td>
                                            <input  class='messageCheckbox'  id='toppings' type='checkbox' value= '$row[calories]' >
                                                        
                                            </td>
                                            <td>".$row['title']."</td>
                                            <td>".$row['rating']."</td>
                                            <td>".$row['calories']."</td>
                                            <td>".$row['ingredients']."</td>
                                            <td>".$row['directions']."</td>
                                            
                                        </tr>";
                            }
            
                                 // Close result set
                                 mysqli_free_result($result);
                        } else{
                             echo "No records matching your query were found.";
                        }

                }   else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }


$percentage = 40;
$caloriesRequiredForLunch = ($percentage / 100) * $caloriesRequired;

$conn2 = new mysqli("localhost", "root", "", "be_fit");
$sql3 = "SELECT * FROM recipe where calories between $caloriesRequiredForLunch-100 and $caloriesRequiredForLunch+100 ORDER BY calories DESC limit 10";
     $diet_list2="";


                if($result = mysqli_query($conn2, $sql3)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){


                                $diet_list2 .="<tr>
                                <td>
                                            <input  class='messageCheckbox'  id='toppings2' type='checkbox' value= '$row[calories]' >
                                                        
                                            </td>
                                            <td>".$row['title']."</td>
                                            <td>".$row['rating']."</td>
                                            <td>".$row['calories']."</td>
                                            <td>".$row['ingredients']."</td>
                                            <td>".$row['directions']."</td>
                                            
                                        </tr>";
                            }
            
                                 // Close result set
                                 mysqli_free_result($result);
                        } else{
                             echo "No records matching your query were found.";
                        }

                }   else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }


$percentage = 20;
$caloriesRequiredForDinner = ($percentage / 100) * $caloriesRequired;


$conn3 = new mysqli("localhost", "root", "", "be_fit");
$sql4 = "SELECT * FROM recipe where calories between $caloriesRequiredForDinner-100 and $caloriesRequiredForDinner+100 ORDER BY calories DESC limit 10";
     $diet_list3="";


                if($result = mysqli_query($conn3, $sql4)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){


                                $diet_list3 .="<tr>
                                <td>
                                            <input  class='messageCheckbox'  id='toppings3' type='checkbox' value= '$row[calories]' >
                                                        
                                            </td>
                                            <td>".$row['title']."</td>
                                            <td>".$row['rating']."</td>
                                            <td>".$row['calories']."</td>
                                            <td>".$row['ingredients']."</td>
                                            <td>".$row['directions']."</td>
                                            
                                        </tr>";
                            }
            
                                 // Close result set
                                 mysqli_free_result($result);
                        } else{
                             echo "No records matching your query were found.";
                        }

                }   else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }




//All recipes below required calories
// $conn = new mysqli("localhost", "root", "", "csv_db");
//     $sql2 = "SELECT * FROM recipe where calories<= $caloriesRequired ORDER BY calories DESC limit 20";


//                 if($result = mysqli_query($conn, $sql2)){
// echo nl2br("\n\n Other recipes for you: ");
//                         if(mysqli_num_rows($result) > 0){
//                             while($row = mysqli_fetch_array($result)){
//                                          $calories=$row['calories'];
//                                          $title=$row['title'];
//                                          $rating=$row['rating'];

//        echo nl2br("\n calories: " . $calories);
//        echo nl2br("\n title: " . $title);
//        echo nl2br("\n rating: " . $rating);
//                             }
            
//                                  // Close result set
//                                  mysqli_free_result($result);
//                         } else{
//                              echo "No records matching your query were found.";
//                         }

//                 }   else{
//                         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//                 }
