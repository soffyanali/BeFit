<?php

session_start();
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli("localhost","root","","be_fit");
// Selecting Database
//$db = mysql_select_db("be_fit", $connection);
//	session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql="select  from user_detail where email_address='$user_check'"

// $row = mysql_fetch_assoc($ses_sql);

// $login_session =$row['userid'];
// if(!isset($login_session)){
// mysql_close($connection); // Closing Connection
 //header('Location: index.php'); // Redirecting To Home Page
// }
?>