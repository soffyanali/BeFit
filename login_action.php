<?php
// Start the session
session_start();



if(isset($_POST['submit'])){


$conn = new mysqli("localhost","root","","be_fit");

$email = mysqli_real_escape_string($conn,$_POST['email']);

$password = mysqli_real_escape_string($conn,$_POST['password']);







$sel_user = "select * from User_Detail where password='$password' AND email_address='$email'";

$run_user = mysqli_query($conn, $sel_user);

$check_user = mysqli_num_rows($run_user);

if($check_user>0){

$_SESSION['login_user']=$email;
header("location: dashboard.php");

}

else {

$error = "Username or Password is invalid";
$_SESSION['UNSUCCESS_MESSAGE']='Please enter correct usename or password ..!!';
header("location: login.php");

}

}
?>