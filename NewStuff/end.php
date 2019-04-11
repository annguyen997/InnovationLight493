<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="favicon.png" type="image/png">
        <title>Profile Update</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="font-awesome.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="responsive.css">
		<link rel="stylesheet" type="text/css" href="util.css">
		<link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<a class="navbar-brand logo_h" href="index.html"><img src="logo.png" alt=""></a>
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="http://helios.ite.gmu.edu/~chong4/IT207/index.php">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="http://helios.ite.gmu.edu/~chong4/IT207/reset.php">Password Reset</a></li>  
								<li class="nav-item active"><a class="nav-link" href="http://helios.ite.gmu.edu/~chong4/IT207/profile.php">Update</a></li> 
								<li class="nav-item"><a class="nav-link" href="faq.html">Help/FAQ</a></li>
								<li class="nav-item"><a class="nav-link" href="http://helios.ite.gmu.edu/~scharoe2/Pragmatics/Login">Log-Out</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<a class="navbar-brand logo_h" href="http://helios.ite.gmu.edu/~chong4/IT207/index.php"><img src="logo.png" alt=""></a>
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="http://helios.ite.gmu.edu/~chong4/IT207/index.php">Home</a></li> 
								<li class="nav-item active"><a class="nav-link" href="http://helios.ite.gmu.edu/~chong4/IT207/reset.php">Password Reset</a></li>  
								<li class="nav-item"><a class="nav-link"  href="http://helios.ite.gmu.edu/~chong4/IT207/profile.php">Update</a></li>
								<li class="nav-item"><a class="nav-link" href="http://helios.ite.gmu.edu/~chong4/IT207/faq.php">Help/FAQ</a></li>
								<li class="nav-item"><a class="nav-link" href="http://helios.ite.gmu.edu/~chong4/IT207/login.php"> Log-Out</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<div class="page_link">
							<a href="http://helios.ite.gmu.edu/~chong4/IT207/index.php">Home</a>
							<a href="http://helios.ite.gmu.edu/~chong4/IT207/profile.php">Profile</a>
						</div>
						<h2>My Profile</h2>
					</div>
				</div>
            </div>
        </section>
		<!--================End Home Banner Area =================-->
		<section class="serve_area p_120">
        	<div class="container">
        		<div class="serve_inner row">
        			<div class="col-lg-6">
        				<div class="serve_img"><img class="img-fluid" src="profile.jpg" alt=""></div>
        			</div>
					<div class="col-lg-6">
        				<div class="serve_text">
        					<?php
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
echo "TEST PURPOSES<br/>New Password: ".$newPass."<br/>"; 
$reEnter = $_POST['reEnter'];
echo "Re Entered: ".$reEnter."<br/><br/>";

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
	echo $hashedPass."<br/>"; 
	$hashedPassOld = hash("sha256", $oldPass);
	echo $hashedPassOld;
	
//=====================================
//	|\      /|\   / /====  ___   |
//	| \    / | \ / |	  /   \  |
//	|  \__/  |  |	\===| |	  |  | 
//	|	     |  | 	____/ \___/\ |____
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
	
	// Testing purposes 
	// Chris toor
	// An password
	// Zak 123456
	// wjohnson Ace
	
	$sql = 'UPDATE empinfo SET password = '.'"'.$hashedPass.'"'.' WHERE password = '.'"'.$hashedPassOld.'"'.';';
	echo $sql;
	
	$dbh->query($sql);

	$conn->close();
		echo "<h3> Password has been reset. Please exit this window in your browser. </h3>";
		}
		else {
			echo $errorMessage;
			}
?>
						</div>
					</div>
				</div>
			</div>
	</body>
</html>