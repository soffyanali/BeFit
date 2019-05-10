<?php


 $conn = new mysqli("localhost","root","","be_fit");
          $sql3 = "select CONCAT(issue_cate_id, '-', body_part_id) AS body,issue_bodypart_id FROM issue_body_part";
			if($result = mysqli_query($conn, $sql3)){

			    if(mysqli_num_rows($result) > 0){

			        $sup_list = NULL;
			        while($opp = mysqli_fetch_array($result)){
			      			
			      			   $sup_list.="<option value =".$opp['issue_bodypart_id'].">".$opp['body']."</option>";
			                   
			        }
			        
			        // Close result set
			        mysqli_free_result($result);
			    } else{
			        echo "No records matching your query were found.";
			       }
			}else{

			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}




 

			//$conn2 = new mysqli("localhost","root","","be_fit");
		// CODE RUNS WHEN FORM SUBMIT


?>