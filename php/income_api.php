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
	$sql = "SELECT SUM(amount) AS total, payment_month FROM `payment` GROUP BY payment_month";
	$result = $connection->query($sql);
	$data = array();
	while($row=$result->fetch_array()){
		$date = new DateTime($row['payment_month']);
		$val = array('date' => $date->format("F-Y"), 'value' => $row['total'] );
		$data[] = $val;
	}
	print json_encode($data);
	$result->close();
	}else{
		echo "Access Denieted";
	}

$connection->close();
?>