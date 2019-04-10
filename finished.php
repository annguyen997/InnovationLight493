<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title> 
	Pragmatics Reset Page 
</title>

<link rel="stylesheet" href="http://helios.ite.gmu.edu/~chong4/IT207/pragmatics.css" type="text/css"/>
</head>
<body>

<h2>
	Pragmatics Password Reset System <br />
</h2> 

<hr />
<hr />	


<div id='pressbutton'>

<?php
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
//echo "TEST PURPOSES<br/>New Password: ".$newPass."<br/>"; 
$reEnter = $_POST['reEnter'];
//echo "Re Entered: ".$reEnter."<br/><br/>"; //TESTING PURPOSES

// valid is the variable that is changed to N if any of the password conditions are not met. This is checked after everything and determines if the password will be reset or an error will be given. 
$valid = "Y";
$errorMessage = "Error:";

// First it checks if the password matches the one that was re-entered
if ($newPass != $reEnter) {
	$valid = "N";
	$errorMessage .= "<br/>Your passwords do not match";
	}

// The password is checked against the top 50 most common passwords to increase security. 
if ($newPass == "123456" or $newPass == "12345" or $newPass == "password" or $newPass == "qwerty" or $newPass == "12345678" or $newPass == "1234567" or $newPass == "abc123" or $newPass == "111111" or $newPass == "11111" or $newPass == "696969" or $newPass == "654321" or $newPass == "baseball" or $newPass == "football" or $newPass == "superman" or $newPass == "michael" or $newPass == "harley" or $newPass == "jackson" or $newPass == "mustang" or $newPass == "letmein" or $newPass == "monkey" or $newPass == "dragon" or $newPass == "soccer" or $newPass == "aaaaaa" or $newPass == "shadow" or $newPass == "iloveyou" or $newPass == "hockey" or $newPass == "daniel" or $newPass == "7777777" or $newPass == "andrew" or $newPass == "jordan" or $newPass == "jennifer" or $newPass == "buster" or $newPass == "charlie" or $newPass == "trustno1" or $newPass == "master" or $newPass == "george" or $newPass == "lucky" or $newPass == "bulldog" or $newPass == "tigers" or $newPass == "bailey" or $newPass == "sunshine" or $newPass == "hunter" or $newPass == "ranger" or $newPass == "whatever" or $newPass == "lover" or $newPass == "money") {
	$valid = "N";
	$errorMessage .= "<br/>Your password is too common and is susceptible to being guessed (matches top 50 most common passwords)";
	}

// Checks if the password is less than 8 characters
if (strlen($newPass) < 8) {
	$valid = "N";
	$errorMessage .= "<br/>Your password is less than 8 characters in length.";
	}

// Checks if there is a number present in the password
if (!preg_match('~[0-9]+~', $newPass)) {
	$valid = "N";
	$errorMessage .= "<br/>Your password must contain at least 1 number.";
	}	

// If the password is validated, it updates the database with the new one. 	
if ($valid == "Y") {
	$hashedPass = hash("sha256", $newPass); 
	//echo $hashedPass."<br/>"; //TESTING PURPOSES
	$hashedPassOld = hash("sha256", $oldPass);
	//echo $hashedPassOld; //TESTING PURPOSES
	
	$host = 'dbinnovationlight.mysql.database.azure.com';
	$username = 'InnovationLight@dbinnovationlight';
	$password = '1nnovationLight';
	$db_name = 'testdata';

	//Establishes the connection
	$conn = mysqli_init();
	mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
	if (mysqli_connect_errno($conn)) {
		die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
	
	$dbh = new PDO("mysql:host=$host;dbname=$db_name", $username, $password); 
	
	// Testing purposes 
	// Chris toor
	// An password
	// Zak 123456
	// wjohnson Ace
	
	$sql = 'UPDATE empinfo SET password = '.'"'.$hashedPass.'"'.' WHERE password = '.'"'.$hashedPassOld.'"'.';';
	echo $sql;

	$dbh->query($sql);
	$conn->close();
		echo "<h3> Password has been reset successfully. You may optionally review your personal information for verification purposes by pressing the button below. Otherwise, please exit this window in your browser for security purposes. </h3>";
	
} else {
	echo $errorMessage;
}
?>

<h3> 
<br /> <br /> <br /> 
</h3>

</div>
<div id='sidebar'>
<br /><a href="http://www.pragmatics.com/">Pragmatics Home</a> <br /><br /><a href="http://helios.vse.gmu.edu/~chong4/IT207/">Password Reset Home</a> <br /><br />  Help/FAQ <br /><br /> <img src="logo.jpg" alt="logo"> <br /> <img src="IL.jpg" alt="Innovation Light">
</div>

</body>
</html>
