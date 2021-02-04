<?php
session_start();
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "gym";

// Create connection
$connection = new mysqli($servername, $username, $password, $database_name);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if (!empty($_SESSION["admin_email"])) {
	$data = array();
	$sql = "SELECT COUNT(*) AS total FROM `users_plan`";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('total' => $row['total']);
	$data[] = $val;

	$sql = "SELECT COUNT(*) AS starter FROM `users_plan` WHERE plan = 'starter'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('starter' => $row['starter']);
	$data[] = $val;

	$sql = "SELECT COUNT(*) AS basic FROM `users_plan` WHERE plan = 'basic'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('basic' => $row['basic']);
	$data[] = $val;

	$sql = "SELECT COUNT(*) AS pro FROM `users_plan` WHERE plan = 'pro'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('pro' => $row['pro']);
	$data[] = $val;

	$sql = "SELECT COUNT(*) AS unlimited FROM `users_plan` WHERE plan = 'unlimited'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('unlimited' => $row['unlimited']);
	$data[] = $val;
	
	print json_encode($data);
	$result->close();
	}else{
		echo "Access Denieted";
	}
$connection->close();
?>