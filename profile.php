
<?php
    include ('sessionLog.php');
    include ('configure.php');
//Select DB
   $db = mysqli_select_db($conn, "testdata");
   $dbh = new PDO("mysql:host=$host;dbname=$db_name", $username, $password1);
//define variables
     $personEmail = $personPhone = $foneCarrier = "";
	 $emailErr = $phoneErr = $carrierErr = "";
    
    //Check if content is present
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	$personEmail = test_input($_POST['personalEmail']);
    $personPhone = test_input($_POST['phone']);
	$foneCarrier = test_input($_POST['selectCarrier']);
	}//end if
	//check user input
    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
	if (empty($_POST['personalEmail']) && empty($_POST['phone']) && empty($_POST['personalEmail'])) {
		echo $phoneErr = "phone number is required";
		echo $carrierErr = "phone Carrier is required";
		echo $emailErr = "Email is required";
	}
	else {
    if (empty($_POST['personalEmail'])) {
       $emailErr = "Email is required";
    } //end if
    else
	{
       $personEmail = test_input($_POST['personalEmail']);
    // check if e-mail address is well-formed
    if (!filter_var($personEmail, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
    }//end if
    }
    if (empty($_POST['phone'])) {
       $phoneErr = "Phone number is required";
    } //end if
	else 
	{
         $personPhone = test_input($_POST['phone']);
    // check if phone number is well-formed
    if(!preg_match('/^[\+0-9\-\(\)\s]*$/', $personPhone))
		{
         $phoneErr = "Invalid phone number format";
    }
    }
    if (isset($_POST['selectCarrier']) && $_POST['selectCarrier'] == '' )
	{
         $carrierErr = "Phone Carrier is required";
    } 
    $check = $_SESSION['login_user'];
    if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    // Attempt update query execution
    $sql = "UPDATE empinfo SET personalEmail = '$personEmail', phone = '$personPhone$foneCarrier' WHERE workEmail = '$check'";
    if(mysqli_query($conn, $sql)){
         echo "Records were updated successfully.";
    } 
    else
    {
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
	}
mysqli_close($conn); // Closing Connection
?>



<!DOCTYPE html>
<html>
<head>
<title>User update Record Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<h1>update User page</h1>
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="LogoutLog.php">Log Out</a></b>
<div id="Update">
<p><span class="error">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
     
     Personal Email<input id = "personal Email" name="personalEmail" type="text" placeholder ="***@example.com" />
	 <span class="error">* <?php echo $emailErr;?></span>
	 <p>
	 <br><br>
     Phone Number<input id ="phone" name="phone" type="text" placeholder ="5712749876"/>
	 <span class="error">* <?php echo $phoneErr;?></span>
	 <p>
	 Phone Carrier?
    <select name="selectCarrier" * <?php echo $carrierErr;?> > 
       <option value="">Please Select</option>
       <option value="@vtext.com">verizon</option>
       <option value="@pm.sprint.com">Sprint</option>
       <option value="@tmomail.net">Tmobile</option>
       <option value="@mms.att.net">AT&T </option>
       <option value="@mms.mycricket.com">Cricket</option>
       <option value="@mymetropcs.com">MetroPCS</option>
       <option value="@smtext.com">Simple Mobile</option>
       <option value="@mms.uscc.net">US Cellular</option>
   </select>
    </p>
	 <br><br>
     <input name="update" type="submit" value=" Update ">
	 
     <span><?php if(isset($error) != NULL):?>
        <p><?php echo $error; ?></p>
      <?php endif; ?></span>
</form>

<?php
echo "<h2>Here is your new records:</h2>";
echo "New Personal Email\n";
echo $personEmail;
echo "<br>";
echo "New Phone Number\n";
echo $personPhone;
echo "<br>";
echo $foneCarrier;
echo "<br>";

?>
</div>
</div>
</body>
</html>
