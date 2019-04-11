<?php
include('configure.php'); //establish connection to the server
// Selecting Database
$db_name = mysqli_select_db($conn, "testdata");
session_start();// Starting Session
// Storing Session
$check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn, "select workEmail from empinfo where workEmail='$check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['workEmail'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: indexLog.php'); // Redirecting To Home Page
}
?>