<?php
    $host = 'dbinnovationlight.mysql.database.azure.com';
    $username = 'InnovationLight@dbinnovationlight';
    $password1 = '1nnovationLight';
    $db_name = 'testdata';
	
//Establishes the connection//
	$conn = mysqli_init();
	mysqli_real_connect($conn, $host, $username, $password1, $db_name, 3306);
	if (mysqli_connect_errno($conn)) {
		die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
	
	echo "connected successfully!\n";
    session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['workEmail']) || empty($_POST['password'])) {
			$error = "1st error WorkEmail or password is invalid";	
		}
		else {
		   // Define $workEmail and $password
		   
			/*
		   The function adds an escape character, the backslash, \, before certain potentially dangerous characters in a string passed in to the function. The characters escaped are This can help prevent SQL injection attacks which are often performed by using the character to append malicious code to an SQL query
		   */
	   
		   $workEmailInput = mysqli_real_escape_string($conn, $_POST['workEmail']);
		   $passwordInput = hash('sha256', $_POST['password']);
		   $workEmailInput = stripslashes($workEmailInput);
		   $passwordInput = stripslashes($passwordInput);
		   
		   // Selecting Database
			$db = mysqli_select_db($conn, "testdata");
			$dbh = new PDO("mysql:host=$host;dbname=$db_name", $username,$password1);
			
			//To get phone number from database via querying. 
			$data = mysqli_query($conn, "SELECT phone FROM empinfo WHERE workEmail = '$workEmailInput' AND password = '$passwordInput'") or die("Query execution failed".mysqli_error());
			$result = mysqli_num_rows($data);
			
			if ($result == 1) {
				//The log in has found the user
				$row = mysqli_fetch_array($data);
				$_SESSION['login_user'] = $workEmailInput;
				$_SESSION['phone'] = $row[0]; //Stores phone number into the SESSION phone variable. 
				header("location: index_test.php"); // Redirecting To Other Page
			} 
			else 
			{
				//the user name or password are incorrect
				echo "Wrong work email and password";
			}
		mysqli_close($conn); // Closing Connection
		}
	}
?>