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

<?php
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
?>

<div id='pressbutton'>

<h3> 
Check your mobile device. Please enter the 4-digit code received into the box below. 
</h3>
</body>
<table>
<tr> 
	<td><center>First Digit</center></td>
	<td><center>Second Digit </center></td>
	<td><center>Third Digit </center></td>
	<td><center>Fourth Digit </center></td>
</tr>
<form action="resetpassexpired.php" method="post">
<?php 
$pin = $_POST['pin'];

/* For Testing I commented out the database part, consider do we even need the database or are we hardcoding?
echo "TEST PURPOSES<br/>".$pin;
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
*/
	//send notification text message to all phone number.
	//foreach($userPhone as $phoneNumber) { Not using database here.
		//$to = ($phoneNumber);  Hardcoded phone number for testing purposes.
	    $from = "pragmatics@gmail.com";
	    $message = "Your four digit verifciation code: $pin";
	    $headers = "From: $from\n";
		mail("5714888325@txt.att.net", $from, $message, $headers); //using my phone number with the AT&T carrier, if you want to test you have to find your carriers domain
		//echo "sent";
//}
?>
 
<tr>
<td height="100" width = "20"> 
<center><select name="num1" size="10"> 
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select> </td>
		</center> 

<td height="100" width = "20"> 
<center><select name="num2" size="10"> 
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select> </td>
		</center>
		
<td height="100" width = "20"> 
<center><select name="num3" size="10"> 
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select> </td>
		</center>
		
<td height="100" width = "20"> 
<center><select name="num4" size="10"> 
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select> </td>
		</center>
		
</tr>

</table>
<body>
<br /><br />
<!-- 
Hidden input type sends the generated code to the next page to compare to the one that the user will input. 
-->
<input type="hidden" name="pin" value=<?php echo $pin ?>>
<center><input type="submit" value="SUBMIT CODE" class="button"/></center>

</form>

</div>
<div id='sidebar'>
<br /><a href="http://www.pragmatics.com/">Pragmatics Home</a> <br /><br /><a href="http://helios.vse.gmu.edu/~chong4/IT207/">Password Reset Home</a> <br /><br />  Help/FAQ <br /><br /> <img src="logo.jpg" alt="logo"> <br /> <img src="IL.jpg" alt="Innovation Light">
</div>


</body>
</html>
