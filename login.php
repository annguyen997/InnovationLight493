<?php
    include('configure.php'); //establish connection to the server 
    session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
    if (empty($_POST['workEmail']) || empty($_POST['password'])) {
    $error = "1st error WorkEmail or password is invalid";
    }
    else
   {
     
   //The function adds an escape character, the backslash, \, before certain potentially dangerous characters in a string passed in to the function. The characters escaped are This can help prevent SQL injection attacks which are often performed by using the character to append malicious code to an SQL query
   $workEmailInput = mysqli_real_escape_string($conn, $_POST['workEmail']);
   $passwordInput = hash('sha256', $_POST['password']);

   //To protect MySQL injection for Security purpose
   //The stripslashes() function removes backslashes added by the addslashes() function
   $workEmailInput = stripslashes($workEmailInput);
   $passwordInput = stripslashes($passwordInput);

   // Selecting Database
   $db = mysqli_select_db($conn, "testdata");
   $dbh = new PDO("mysql:host=$host;dbname=$db_name", $username, $password1);
   $sql = mysqli_query($conn, "select password, workEmail from empinfo WHERE workEmail = '$workEmailInput' AND password = '$passwordInput'");
   
   //matching users inputs and database values to authenticate users. 
   $query = ("SELECT workEmail, password FROM empinfo WHERE workEmail = '$workEmailInput' AND password = '$passwordInput'
        ") or die("Query execution failed".mysqli_error());
		//Assign 
    $data = mysqli_query($conn, $query);
		//return num of rows from databse 1 is true 0 is false.
    $result = mysqli_num_rows($data);
    if ($result == 1) 
	    {
         //The log in has found the user
         $row = mysqli_fetch_array($data);
         $_SESSION['login_user'] = $workEmailInput;
         header("location: profile.php"); // Redirecting To Other Page
        } 
	else 
		{
            //the user email or password are incorrect
            echo "Wrong work email and password";
        }
mysqli_close($conn); // Closing Connection
}
}
?>
