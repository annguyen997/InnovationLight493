<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Password</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="font-awesome.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
    </head>
    <body>
        
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
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<div class="page_link">
							<a href="http://helios.ite.gmu.edu/~chong4/IT207/index.php">Home</a>
							<a href="http://helios.ite.gmu.edu/~chong4/IT207/reset.php">Password Reset</a>
						</div>
						<h2>Password Reset</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Serve Area =================-->
        <section class="serve_area p_120">
        	<div class="container">
        		<div class="serve_inner row">
        			<div class="col-lg-6">
        				<div class="serve_img"><img class="img-fluid" src="about-1.jpg" alt=""></div>
        			</div>
        			<div class="col-lg-6">
        				<div class="serve_text">
        					<h4>Reset Password </h4>
							<p>Check your mobile device. Please enter the 4-digit code received into the box below. </br>
                            </p>
                        </br>
						<?php 
$pin = $_POST['pin'];
echo "TEST PURPOSES<br/>".$pin; 

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

$phone = array();
	 foreach($dbh->query('SELECT phone FROM empinfo') as $row)
	 {
		$phone[] = implode($row);
	 }
     //trim the string to get the 10 digit phone number
     $userPhone = array();
	 foreach($phone as $splitme) {
	   $s = $splitme;
	   $m = "|";
	   $split = preg_replace('/(.{'.ceil(strlen($s)/2).'})(.*)/', "$1$m$2", $s);
	   $length = (strlen($split)/2);
	   $store = mb_strimwidth($split, 0, $length);
	   $userPhone[] = $store;
	}	
	
	//send notification text message to all phone number.
	//foreach($userPhone as $phoneNumber) { 
		//$to = ($phoneNumber); 
	    $from = "pragmatics@gmail.com";
	    $message = "Your four digit verification code is: $pin";
	    $headers = "From: $from\n";
		mail("7036792121@tmomail.net", $from, $message); 
	//}
?>
<form action="resetpass.php" method="post">
<table>
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
                        </div>
						</br>
						<input type="hidden" name="pin" value=<?php echo $pin ?>>
						<center><input type="submit" value="SUBMIT CODE" class="main_btn"/></center>						
        			</div>
        			</div>
        		</div>
        	</div>
        </section>
		</form>
        <!--================End Serve Area =================-->
    </body>
</html>