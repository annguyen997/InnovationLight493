<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $host = 'dbinnovationlight.mysql.database.azure.com';
    $username = 'InnovationLight@dbinnovationlight';
    $password = '1nnovationLight';
    $db_name = 'testdata';
	
$conn = mysqli_init();
	mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
	if (mysqli_connect_errno($conn)) {
	die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
	echo "connected successufly!";
// Selecting Database
$db_name = mysqli_select_db($conn, "testdata");
session_start();// Starting Session
// Storing Session
$check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn, "select workEmail from empinfo where workEmail='$check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['workEmail'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: indexLog.php'); // Redirecting To Home Page
}
?>