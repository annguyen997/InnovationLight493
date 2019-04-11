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
<form method="post" action="resetpass.php">

<?php
//=====================================
//	|\      /|\   / /---- ___   |
//	| \    / | \ / |	 /   \  |
//	|  \  /  |  |	\---||	 |  | 
//	|	\/   |  | 	____/\___/\	|____
//=====================================
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

//==============================================================================================================================
//-------------------------------EMAIL------------------------------------------------------------------------------------------
//==============================================================================================================================

// Queries the Azure database and assembles the work emails and dates of last expiration into an array
$emailDouble = array();

// CHANGE PERSONAL TO WORK!
	foreach($dbh->query('SELECT personalEmail FROM empinfo') as $row) {
		$emailDouble[] = implode($row);
		}

// Since the array prints doubles for some reason, dividing the strings in half, so only a valid email is remaining
$emails = array();
foreach($emailDouble as $splitme) {
	$s = $splitme;
	$m = "|";
	$split = preg_replace('/(.{'.ceil(strlen($s)/2).'})(.*)/', "$1$m$2", $s);
	$length = (strlen($split)/2);
	$store = mb_strimwidth($split, 0, $length);
	$emails[] = $store;
	}		
var_dump($emails); echo "<br/>"; echo "<br/>";
// Array now contains the emails from the query.		
		

//==============================================================================================================================
//--------------------------SEND ALERT------------------------------------------------------------------------------------------
//==============================================================================================================================

//__________________________________________________________________________________
//[[[[[[[[[[[[[[[[[[[[[[[[[   14 DAYS BEFORE EXPIRATION     ]]]]]]]]]]]]]]]]]]]]]]]]
//----------------------------------------------------------------------------------
$day = date("z");
if ($day == 163 or $day == 323) {
	
	$message = "Greetings, \n\nYour password expires in 7 days. Please navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to reset your password. \n\nThank you, \nPragmatics Automated Password Reset System"; 
	
	$subject = "!PASSWORD EXPIRES IN 7 DAYS, PLEASE RESET!";
	
	$to = "";
	
	foreach($emails as $emailAddress) {
		mail($emailAddress, $subject, $message);
		echo "sent";
		}
	}
//__________________________________________________________________________________
//[[[[[[[[[[[[[[[[[[[[[[[[[   7 DAYS BEFORE EXPIRATION     ]]]]]]]]]]]]]]]]]]]]]]]]]
//----------------------------------------------------------------------------------
$day = date("z");
if ($day == 170 or $day == 330) {
	
	$message = "Greetings, \n\nYour password expires in 7 days. Please navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to reset your password. \n\nThank you, \nPragmatics Automated Password Reset System"; 
	
	$subject = "!PASSWORD EXPIRES IN 7 DAYS, PLEASE RESET!";
	
	$to = "";
	
	foreach($emails as $emailAddress) {
		mail($emailAddress, $subject, $message);
		echo "sent";
		}
	}
//__________________________________________________________________________________
//[[[[[[[[[[[[[[[[[[[[[[[[[   3 DAYS BEFORE EXPIRATION     ]]]]]]]]]]]]]]]]]]]]]]]]]
//----------------------------------------------------------------------------------
$day = date("z");
if ($day == 177 or $day == 337) {
	
	$message = "Greetings, \n\nYour password expires in 3 days. Please navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to reset your password. \n\nThank you, \nPragmatics Automated Password Reset System"; 
	
	$subject = "!PASSWORD EXPIRES IN 3 DAYS, PLEASE RESET!";
	
	$to = "";
	
	foreach($emails as $emailAddress) {
		mail($emailAddress, $subject, $message);
		echo "sent";
		}
	}
//__________________________________________________________________________________
//[[[[[[[[[[[[[[[[[[[[[[[[[   2 DAYS BEFORE EXPIRATION     ]]]]]]]]]]]]]]]]]]]]]]]]]
//----------------------------------------------------------------------------------
$day = date("z");
if ($day == 178 or $day == 338) {
	
	$message = "Greetings, \n\nYour password expires in 2 days. Please navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to reset your password. \n\nThank you, \nPragmatics Automated Password Reset System"; 
	
	$subject = "!PASSWORD EXPIRES IN 2 DAYS, PLEASE RESET!";
	
	$to = "";
	
	foreach($emails as $emailAddress) {
		mail($emailAddress, $subject, $message);
		echo "sent";
		}
	}
//__________________________________________________________________________________
//[[[[[[[[[[[[[[[[[[[[[[[[[   1 DAY BEFORE EXPIRATION     ]]]]]]]]]]]]]]]]]]]]]]]]]]
//----------------------------------------------------------------------------------
$day = date("z");
if ($day == 179 or $day == 339) {
	
	$message = "Greetings, \n\nYour password expires tomorrow. Please navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to reset your password. \n\nThank you, \nPragmatics Automated Password Reset System"; 
	
	$subject = "!PASSWORD EXPIRING IN 1 DAY, PLEASE RESET!";
	
	$to = "";
	
	foreach($emails as $emailAddress) {
		mail($emailAddress, $subject, $message);
		echo "sent";
		}
	}
//__________________________________________________________________________________
//[[[[[[[[[[[[[[[[[[[[[[[[[   DAY OF EXPIRATION     ]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]
//----------------------------------------------------------------------------------
$day = date("z");
if ($day == 180 or $day == 340) {
	
	$message = "Greetings, \n\nPlease navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to reset your password. \n\nThank you, \nPragmatics Automated Password Reset System"; 
	
	$subject = "!PASSWORD EXPIRED, PLEASE RESET!";
	
	$to = "";
	
	foreach($emails as $emailAddress) {
		mail($emailAddress, $subject, $message);
		echo "sent";
		}
	}
	
//Close the connection
mysqli_close($conn);
?>

</body>
<body>


</form>

</div>
<div id='sidebar'>
<br /><a href="http://www.pragmatics.com/">Pragmatics Home</a> <br /><br /><a href="http://helios.vse.gmu.edu/~chong4/IT207/">Password Reset Home</a> <br /><br />  Help/FAQ <br /><br /> <img src="logo.jpg" alt="logo"> <br /> <img src="IL.jpg" alt="Innovation Light">
</div>


</body>
</html>