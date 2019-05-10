    <?php


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



//Recommended recipes
    $conn = new mysqli("localhost", "root", "", "be_fit");
    $sql2 = "SELECT DISTINCT(items.item_name),items.Energ_Kcal,items.Carbohydrt,items.Protein FROM 'items' inner join 'recommendation' ON items.item_name=recommendation.rhs WHERE recommendation.userid = $userid";
     $diet_list1= "";


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

        if (isset($_POST['submit'])) {
            # code...
        //echo "asasasaasasas";


            session_start();

            
           $item_name = $_POST['select'];
           //$question_text = $_POST['txtarea1'];





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

          // echo  $_SESSION['PURCHASE_BILL_NO'] ;

           // echo "INSERT INTO product (product_supplier_name,poduct_name,
           //   product_expiry_date,product_mrp,product_rp,product_vat,product_batch_code,
           //   product_quantity,product_free_quantity,product_total_quantity,product_product_type,
           //   product_tablets,product_tablet_price,product_company_name)
           // VALUES ('$supplier_name','$product_name','$date','$mrp','$rp','$vat','$batch_code','$quantity','$free',
           //   '$total_quantity','$product_type','$tablets','$tablet_price','$company')";


           $sql4 = "INSERT INTO Selected_Items (user_ID,Item_Name) VALUES ('$userid','$item_name')";

                 if(mysqli_query($conn, $sql4)){
                    $_SESSION['UNSUCCESS_MESSAGE']='Record Added Succesfully ...!!';
                     //header('Location: diet.php');

                 } else{
                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                 }
         
        // Close connection
         //mysqli_close($conn);
        }



        if (isset($_POST['submit'])) {
            # code...
        //echo "asasasaasasas";


            session_start();

            
           $item_name = $_POST['select'];
           //$question_text = $_POST['txtarea1'];





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

          // echo  $_SESSION['PURCHASE_BILL_NO'] ;

           // echo "INSERT INTO product (product_supplier_name,poduct_name,
           //   product_expiry_date,product_mrp,product_rp,product_vat,product_batch_code,
           //   product_quantity,product_free_quantity,product_total_quantity,product_product_type,
           //   product_tablets,product_tablet_price,product_company_name)
           // VALUES ('$supplier_name','$product_name','$date','$mrp','$rp','$vat','$batch_code','$quantity','$free',
           //   '$total_quantity','$product_type','$tablets','$tablet_price','$company')";


           $sql4 = "INSERT INTO Selected_Items (user_ID,Item_Name) VALUES ('$userid','$item_name')";

                 if(mysqli_query($conn, $sql4)){
                    $_SESSION['UNSUCCESS_MESSAGE']='Record Added Succesfully ...!!';
                     //header('Location: diet.php');

                 } else{
                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                 }
         
        // Close connection
         //mysqli_close($conn);
        }
