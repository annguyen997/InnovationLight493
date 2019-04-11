<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
//header("location: profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V17</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form">
					<span class="login100-form-title p-b-34">
						<h3>Welcome to Pragmatics</h3> Account Login
					</span>
					
					<form action="" method="post">
					<div class="wrap-input100 rs1-wrap-input100 m-b-20" >
						<input id="Work Email" class="input100" type="text" name="workEmail" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 m-b-20">
						<input id="password" class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<a class="login100-form-btn" href="http://helios.ite.gmu.edu/~scharoe2/Pragmatics/homepage/index.html">Log in</a>	
					</div>
					
					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Work Email / password?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="#" class="txt3">
							
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
</body>
</html>