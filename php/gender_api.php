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
	$sql = "SELECT COUNT(*) AS total FROM `users_information`";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('total' => $row['total']);
	$data[] = $val;

	$sql = "SELECT COUNT(*) AS male FROM `users_information` WHERE gender = 'Male'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('male' => $row['male']);
	$data[] = $val;

	$sql = "SELECT COUNT(*) AS female FROM `users_information` WHERE gender = 'Female'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('female' => $row['female']);
	$data[] = $val;

	$sql = "SELECT COUNT(*) AS other FROM `users_information` WHERE gender = 'Other'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	$val = array('other' => $row['other']);
	$data[] = $val;
	
	print json_encode($data);
	$result->close();
	}else{
		echo "Access Denieted";
	}
$connection->close();
?>