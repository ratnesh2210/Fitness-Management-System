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
	<title>Admin Panel</title>
	<script src="../assets/jquery/jquery-3.1.1.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/javascript/chart.js"></script>
</head>
<body>
<?php
$email = '';
$name = '';
$image_name = '';
if (!empty($_SESSION["admin_email"]) && !empty($_SESSION["admin_password"])) {
	//has email and password
	$email = $_SESSION["admin_email"];
	$password = $_SESSION["admin_password"];
	//check with database
	if (!loginChecker($email,$password)) {
		header("Location: login.php");
	}else{
		$row = getAdminInfo($email);
		$email = $row['email'];
		$name = $row['name'];
		$image_name = $row['image_name'];
	}
}else{
	header("Location: login.php");
}
function loginChecker($email,$password){
	$admin_table_name = 'admin';
	$login = new DatabaseHelper();
	$result=$login->checkLogin($admin_table_name,$email,$password);
	if ($result) {
		return TRUE;
	}else{
		return FALSE;
	}
}
function getAdminInfo($email){
	$admin_info_table_name = 'admin_info';
	$get_admin_info = new DatabaseHelper();
	$result=$get_admin_info->retrieveData($admin_info_table_name,$email);/*return single rows arrey of admin data*/
	return $result;
}
if (isset($_GET['logout'])) {
	unset($_SESSION['admin_email']);
	unset($_SESSION['admin_password']);
	header("Location: login.php");
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
    			if ($page=='admin_profile') {
    				include 'pages/admin_profile_page.php';
    			}
    			if ($page=='member_list') {
					include 'pages/member_list_page.php';
    			}
    			if ($page=='gallery') {
					include 'pages/gallery_page.php';
    			}
    			if ($page=='delete_image') {
					include 'pages/delete_image_page.php';
    			}
    			if ($page=='account') {
					include 'pages/account_page.php';
    			}
    			if ($page=='message') {
					include 'pages/message_page.php';
    			}
    			if ($page=='read_message') {
					include 'pages/read_message_page.php';
    			}
    			if ($page=='send_message') {
					include 'pages/send_message_page.php';
    			}
    			if ($page=='trainer') {
					include 'pages/trainer_page.php';
    			}
    			if ($page=='add_trainer') {
					include 'pages/add_trainer_page.php';
    			}
    			if ($page=='user_view_profile') {
					include 'pages/user_profile_view_page.php';
    			}
    		}else{
    			include 'pages/account_page.php';
    		}
    	?>
    </div>

</div>
</body>
</html>
<?php
	$connection->close();
?>