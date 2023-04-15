<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> SMART.P.G</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">


	<script type="text/javascript">
		function isNumber(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}	

function onlychar(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key >= 97 && key<= 122);

}
	</script>
</head>
<body>
	<div class="top">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col">
					<p class="social d-flex">
						<!--<a href="#"><span class="icon-facebook"></span></a>
						<a href="#"><span class="icon-twitter"></span></a>
						<a href="#"><span class="icon-google"></span></a>
						<a href="#"><span class="icon-pinterest"></span></a>!-->

					</p>
				</div>
				
			</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php"><span>SMART P.G </span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="property.php" class="nav-link">P.G</a></li>
					<li class="nav-item"><a href="tiffin.php" class="nav-link">Tiffin Service</a></li>
					<li class="nav-item"><a href="laundry.php" class="nav-link">Laundry Service</a></li>
					<li class="nav-item"><a href="contact_us.php" class="nav-link">Contact US</a></li>
					<li class="nav-item"><a href="about_us.php" class="nav-link">About US</a></li>
					<li class="nav-item"><a href="feedback.php" class="nav-link">Feed Back</a></li>

					<!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->

					<?php 
					session_start();
					if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]))
					{

						?>

						<li class="nav-item cta "><a href="profile.php" class="nav-link" >Profile</a></li>
						<li class="nav-item cta cta-colored"><a href="login.php" class="nav-link" >Logout</a></li>
						<?php
					}else{
						?>
						<li class="nav-item cta"><a href="login.php" class="nav-link ml-lg-2"><span class="icon-user"></span> Sign-In</a></li>
						<li class="nav-item cta cta-colored"><a href="sing-up.php" class="nav-link"><span class="icon-pencil"></span></span> Sign-up</a></li>
					<?php } ?>

				</ul>
			</div>
		</div>
	</nav>
	
	<!-- END nav -->