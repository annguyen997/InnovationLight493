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
        					<h4>Contact Info</h4>
							<p>Please ensure your contact information is update to date. </br>
                            </p>
						</br>
						<form action="" method="post">
							My Personal Email Address:<br>
							<input id="personal email" class="input100" type="text" name="personalEmail" placeholder="*****@example.com">
							</br></br>
							My Cellular Number:<br>
							<input id="phone" class="input100" type="text" name="phone" placeholder="571 234 9873">
							</br></br>
							My Phone Carrier:<br>
							<select name="selectCarrier"> 
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
						</br></br>
							<a class="main_btn" href="http://helios.ite.gmu.edu/~chong4/IT207/profile.php">Update</a>
						</form>
						</div>
					</div>
				</div>
			</div>
	</body>
</html>