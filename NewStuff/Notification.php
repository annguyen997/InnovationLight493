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
//==========================SMS Texing===================================
$day = date("z");
echo $day;
if ($day == 150 or $day == 310) {
     //retrieve phone numbers from database
     $phone = array();
	 foreach($dbh->query('SELECT phone FROM empinfo') as $row)
	 {
		$phone[] = implode($row);
	 }
     //trim the string to get the 10 digit phone number
     $userPhone = "";
	 foreach($phone as $splitme) {
	   $s = $splitme;
	   $m = "|";
	   $split = preg_replace('/(.{'.ceil(strlen($s)/2).'})(.*)/', "$1$m$2", $s);
	   $length = (strlen($split)/2);
	   $store = mb_strimwidth($split, 0, $length);
	   $userPhone[] = $store;
	}	
	
	//send notification text message to all phone number.
	foreach($userPhone as $phoneNumber) {
		$to = ($phoneNumber);
	    $from = "pragmatics@gmail.com";
	    $message = "Greetings, \n\nPlease navigate to http://helios.ite.gmu.edu/~zlaflous/index.php/resetpass.php to confirm your personal email and phone number are correct. \n\nThank you, \nPragmatics Automated Password Reset System";
	    $headers = "From: $from\n";
		mail($to, $from, $message, $headers);
		//echo "sent";
		}
	
}
//==============================================================================================================================
//-------------------------------EMAIL------------------------------------------------------------------------------------------
//==============================================================================================================================
// Queries the Azure database and assembles the work emails into an array
$emailsDouble = array();
// CHANGE PERSONAL TO WORK!
	foreach($dbh->query('SELECT personalEmail FROM empinfo') as $row) {
		$emailsDouble[] = implode($row);
		}
	
// Since the array prints doubles for some reason, dividing the strings in half, so only a valid email is remaining
$emails = array();
foreach($emailsDouble as $splitme) {
	$s = $splitme;
	$m = "|";
	$split = preg_replace('/(.{'.ceil(strlen($s)/2).'})(.*)/', "$1$m$2", $s);
	$length = (strlen($split)/2);
	$store = mb_strimwidth($split, 0, $length);
	$emails[] = $store;
	}	
	
//==============================================================================================================================
//--------------------------SEND ALERT------------------------------------------------------------------------------------------
//==============================================================================================================================
// This next part uses the day number as an indicator if it is time to send an email. Notifications are sent every 30 days. day with parameter z gives the day number of the year.  
if ($day == 150 or $day == 310) {
	
	$message = "Greetings, \n\nPlease navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to confirm your personal email and phone number are correct. \n\nThank you, \nPragmatics Automated Password Reset System"; 
	
	$subject = "90 Day Notification: Please Confirm Information Is Correct";
	
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