<?php
	session_start();
	include '../php/database_connection.php';
	$database_include = TRUE;
	include '../php/database_services.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/side-menu-web.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!--[if lte IE 8]>
            <link rel="stylesheet" href="../assets/css/side-menu-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="../assets/css/side-menu.css">
        <!--<![endif]-->
	<title>User Panel</title>
	<script src="../assets/jquery/jquery-3.1.1.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/javascript/chart.js"></script>
	<script src="../assets/javascript/chart.min.js"></script>
</head>
<body>
<?php
$email = '';
$name = '';
$image_name = '';
$user_info = '';
$gender = '';
$flag = FALSE;
$row = '';
if (!empty($_SESSION["user_email"]) && !empty($_SESSION["user_password"])) {
	//has email and password
	$email = $_SESSION["user_email"];
	$password = $_SESSION["user_password"];
	//check with database
	if (!loginChecker($email,$password)) {
		header("Location: ../log_in.php");
	}else{
		$row = getUserAdminInfo($email);
		if (!empty($row)) {
		$user_info = $row;
		$email = $row['email'];
		$name = $row['name'];
		$gender = $row['gender'];
		$image_name = $row['image_name'];
		if (!empty($image_name)) {
			$flag = TRUE;
		}
		
		}
	}
}else{
	header("Location: ../log_in.php");
}
function loginChecker($email,$password){
	$table_name = 'users';
	$login = new DatabaseHelper();
	$result=$login->checkLogin($table_name,$email,$password);
	if ($result) {
		return TRUE;
	}else{
		return FALSE;
	}
}
function getUserAdminInfo($email){
	$table_name = 'users_information';
	$get_user_admin_info = new DatabaseHelper();
	$result=$get_user_admin_info->retrieveData($table_name,$email);/*return single rows arrey of admin data*/
	return $result;
}
if (isset($_GET['logout'])) {
	unset($_SESSION['user_email']);
	unset($_SESSION['user_password']);
	header("Location: ../");
	exit;
 }
?>

<header>
<?php
	include 'header.php';
?>
</header>

<div id="main">
<!--main body-->
    <div class="content">
    	<?php
    		if (isset($page)) {
    			if ($page=='user_profile') {
    				include 'pages/user_profile_page.php';
    			}
    			if ($page=='user_activities') {
					include 'pages/user_activities_page.php';
    			}
    			if ($page=='add_activities') {
					include 'pages/add_activities_page.php';
    			}
    			if ($page=='message') {
					include 'pages/message_page.php';
    			}
    			if ($page=='send_message') {
					include 'pages/send_message_page.php';
    			}
    			if ($page=='read_message') {
					include 'pages/read_message_page.php';
    			}
    			if ($page=='payment') {
					include 'pages/payment_page.php';
    			}
    			if ($page=='feedback') {
					include 'pages/user_feedback_page.php';
    			}
    			if ($page=='plan') {
					include 'pages/plan_page.php';
    			}
    		}else{
    			include 'pages/user_activities_page.php';
    		}
    	?>
    </div>

</div>
</body>
</html>
<?php
	$connection->close();
?>