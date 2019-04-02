
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
//Catch Post Data and Process
if(isset($_POST['workEmail'])){
    $personEmail = $_POST['personalEmail'];
    $personPhone = $_POST['phone'];
    //Check if content is present
    if(!empty($personEmail)  && !empty($personPhone)){
        //Update DB
        $q = mysqli_query($conn, "UPDATE empinfo SET personalEmail='$personEmail', phone='$personPhone'");
        //Create Debug Message
        if(!$q){
            die("Failed to update database check query string or input values ".mysqli_error());
        }
        //If query is good, head back to desired page.
        header("Location: indexLog.php");
        exit;
    }else{
        //Create Empty Error Message
        $error = "Error! No Changes Made";
    }
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
<form action="" method="post">
     <label>Personal Email :</label>
     <input id = "personal Email" name="personalEmail" type="text" value='<?php echo $pemail;?>'/>
     <label>phone</label>
     <input id ="phone" name="phone" type="text" value='<?php echo $pnumber;?>'/>
     <input name="update" type="submit" value=" Update ">
	 
     <span><?php if(isset($error) != NULL):?>
        <p><?php echo $error; ?></p>
      <?php endif; ?></span>
</form>
</div>
</div>
</body>
</html>
