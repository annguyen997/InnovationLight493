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
<form method="post" action="entercode.php">

<h3> 
Instructions: Due to your password expiring, we will require additional measures to authenticate and reset the password associated with your account. Please retrieve your mobile device and press the button below to send a 4-digit verification code to the device. 
</br>
</br> 
	Please press the button below to generate a 4-digit code be sent to your mobile device.
</h3>

 <br />

<center><input type="submit" value="SEND A CODE" class="button"/></center>
<!-- 
Function below generates a random pin to use in verifying the user.
-->
<?php
function generatePIN(){
    $pin = ""; 
    $i = 0; 
    while($i < 4){        
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
$pin = generatePIN();
echo "TEST PURPOSES<br/>".$pin;
?>
<!-- 
Hidden input type sends the generated code to the next page to compare to the one that the user will input. 
-->
<input type="hidden" name="pin" value=<?php echo $pin ?>>
</form>

</div>
<div id='sidebar'>
<br /><a href="http://www.pragmatics.com/">Pragmatics Home</a> <br /><br /><a href="http://helios.vse.gmu.edu/~chong4/IT207/">Password Reset Home</a> <br /><br />  Help/FAQ <br /><br /> <img src="logo.jpg" alt="logo"> <br /> <img src="IL.jpg" alt="Innovation Light">
</div>


</body>
</html>
