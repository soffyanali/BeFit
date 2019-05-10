
<?php
include('session.php');
//session_start();

unset($_SESSION['access_token']);
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>