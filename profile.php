
<?php
    include ('sessionLog.php');
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
	echo "connected successufly!\n";
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
	}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (empty($_POST['personalEmail'])) {
    $emailErr = "Email is required";
  } else {
    $personEmail = test_input($_POST['personalEmail']);
    // check if e-mail address is well-formed
    if (!filter_var($personEmail, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST['phone'])) {
    $phoneErr = "Phone number is required";
  } else {
    $personPhone = test_input($_POST['phone']);
    // check if e-mail address is well-formed
    if(!preg_match('/^[\+0-9\-\(\)\s]*$/', $personPhone)) {
      $phoneErr = "Invalid phone number format";
    }
  }
  //https://kb.sandisk.com/app/answers/detail/a_id/17056/~/list-of-mobile-carrier-gateway-addresses phone carrier website
  if (isset($_POST['selectCarrier']) && $_POST['selectCarrier'] == '' ) {
   $carrierErr = "Phone Carrier is required";
  } 
mysqli_close($conn); // Closing Connection
?>


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
	echo "connected successufly!\n";
//Select DB
$db = mysqli_select_db($conn, "testdata");
$dbh = new PDO("mysql:host=$host;dbname=$db_name", $username, $password1);

$check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn, "select personalEmail, phone from empinfo where workEmail='$check'");
 
$sql = "SELECT * FROM empinfo WHERE workEmail='$check'";
$result = mysqli_query($conn, $sql);
while($rowValue = mysqli_fetch_array($result))
{
	  $pemail = $rowValue['personalEmail'];
      $pnumber = $rowValue['phone'];
}
mysqli_close($conn);
?>*/


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
     Phone Number<input id ="phone" name="phone" type="text" placeholder ="571 274 9876"/>
	 <span class="error">* <?php echo $phoneErr;?></span>
	 <p>
	 Phone Carrier?
    <select name="selectCarrier" * <?php echo $carrierErr;?> > 
       <option value="">Please Select</option>
       <option value="verizon">verizon</option>
       <option value="Sprint">Sprint</option>
       <option value="Tmobile">Tmobile</option>
       <option value="AT&T">AT&T</option>
       <option value="Cricket">Cricket</option>
       <option value="MetroPCS">MetroPCS</option>
       <option value="Simple Mobile">Simple Mobile</option>
       <option value="Straight Talk">Straight Talk</option>
       <option value="US Cellular">US Cellular</option>
   </select>
    </p>
	 <br><br>
     <input name="update" type="submit" value=" Update ">
	 
     <span><?php if(isset($error) != NULL):?>
        <p><?php echo $error; ?></p>
      <?php endif; ?></span>
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $personEmail;
echo "<br>";
echo $personPhone;
echo "<br>";
echo $foneCarrier;
echo "<br>";

?>
</div>
</div>
</body>
</html>
