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
        					<h4>How To Reset Password </h4>
							<p><b>Instructions:</b> Due to your password expiring, we will require additional measures to authenticate and reset the password associated with your account. </br>
							<p></br>Please retrieve your mobile device and press the button below to send a 4-digit verification code to the device.
							</p>
							
						<form method="post" action="code.php">       
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
						<input type="hidden" name="pin" value=<?php echo $pin ?>>
						
						</br>
							<input type="submit" value="SEND A CODE" class="main_btn"/>	
							<input type="hidden" name="pin" value=<?php echo $pin ?>>
						</form>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Serve Area =================-->
    </body>
</html>