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

</body>
<?php
$enteredCode = $_POST['num1'].$_POST['num2'].$_POST['num3'].$_POST['num4'];
//echo "TEST PURPOSES<br/>You entered: ".$enteredCode."<br/>"; 
$validCode = $_POST['pin'];
//echo "Generated code: ".$validCode;
if ($enteredCode == $validCode) {
	echo "<h3> Code verified. Please reset your password. </h3>
	<form action='finished.php' method='post'>
	<h4>Enter previous/expired password: </h4><input type='password' name='oldPass' style='width: 300px; font-size: 20px; font: Courier;' /> <br />
	<h4>Enter new password: </h4><input type='password' name='newPass' style='width: 300px; font-size: 20px; font: Courier;' /> <br />
	<h4>Re-enter new password: </h4><input type='password' name='reEnter' style='width: 300px; font-size: 20px; font: Courier;' /> <br /><br />
	<body>
	<input type='submit' value='CONFIRM RESET' class='button'/>
	</form>";
	}
	else {
		echo "<h6> Error! The code you entered does not match the one sent to your mobile device. <br/><br/>Please try again. </h6>";
		}
?>

</div>
<div id='sidebar'>
<br /><a href="http://www.pragmatics.com/">Pragmatics Home</a> <br /><br /><a href="http://helios.vse.gmu.edu/~chong4/IT207/">Password Reset Home</a> <br /><br />  Help/FAQ <br /><br /> <img src="logo.jpg" alt="logo"> <br /> <img src="IL.jpg" alt="Innovation Light">
</div>


</body>
</html>