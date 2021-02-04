<?php
session_start();
include 'php/database_connection.php';
$database_include = TRUE;
include 'php/database_services.php';
?>
<!DOCTYPE html>
 <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gym Plus | Gym, Fit and Fitness.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="sobuj_talukder" />
	<meta name="keywords" content="sobuj_talukder" />
	<meta name="author" content="sobuj_talukder" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="assets/front_end_assets/images/favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="assets/front_end_assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="assets/front_end_assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="assets/front_end_assets/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="assets/front_end_assets/css/flexslider.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="assets/front_end_assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/front_end_assets/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="assets/front_end_assets/css/style.css">
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<!-- Modernizr JS -->
	<script src="assets/front_end_assets/js/modernizr-2.6.2.min.js"></script>
	
	</head>
	<body>
	<?php
	$name = '';
	$email = '';
	$image_name = '';
	$flag = FALSE;
	if(!empty($_SESSION["user_email"])&&!empty($_SESSION["user_password"])){
			$email = $_SESSION["user_email"];
			$password = $_SESSION["user_password"];
			//check pass
			$check_user = new DatabaseHelper();
			$table_name = 'users';
			$result = $check_user->checkLogin($table_name,$email,$password);
			if ($result) {
				//loged in
				$flag = TRUE;
				$table_name = 'users_information';
				$result = $check_user->retrieveData($table_name,$email);
				if($result){
				$name = $result['name'];
				$email = $result['email'];
				$image_name = $result['image_name'];
				}else{
					$name = 'Mr. X';
					$email = 'info@mail.com';
					$image_name = 'default.png';
				}
			}else{
				//logout
				$flag = FALSE;
				
			}
	}else{
		//jumpto("index.php");	
	}
	if (isset($_GET['logout'])) {
	unset($_SESSION['user_email']);
	unset($_SESSION['user_password']);
	header("Location: ./index.php");
	exit;
 	}
	?>
	
	<div id="fh5co-page">
	
		<?php include'./includes/header_top.php'; ?>

		<?php 
			if (isset($pages)) {

			if ($pages=='contact') {
				include './pages/contact_content.php';
			}
			if ($pages=='login') {
				include './pages/log_in_content.php';
			}
			if ($pages=='about') {
				include './pages/about_content.php';
			}
			if ($pages=='plan') {
				include './pages/plan_content.php';
			}
			 if ($pages=='trainer') {
			 	include './pages/trainer_content.php';
			}
			if ($pages=='gallary') {
				include './pages/gallary_content.php';
			}
			if ($pages=='registration') {
				include './pages/registration_content.php';
			}
			 // if ($pages=='user_profile') {
			 // 	include './pages/user_profile_content.php';
			 // }
			 // if ($pages=='payment') {
			 // 	include './pages/payment_content.php';
			 // }
	
		}else{
			include'./pages/home_content.php';
		}

	?>







		<?php include'./includes/footer_bottom.php'; ?>

	</div>
	
	
	<!-- jQuery -->
	<script src="assets/front_end_assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/front_end_assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/front_end_assets/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/front_end_assets/js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="assets/front_end_assets/js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="assets/front_end_assets/js/jquery.flexslider-min.js"></script>

	<!-- MAIN JS -->
	<script src="assets/front_end_assets/js/main.js"></script>

	</body>
</html>

