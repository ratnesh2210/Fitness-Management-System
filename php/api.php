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
if (!empty($_SESSION["user_email"])) {
	$email = $_SESSION["user_email"];
	$sql = "SELECT * FROM `user_activities` WHERE email = '$email'";
	$result = $connection->query($sql);
	$data = array();
	while($row=$result->fetch_array()){
		$val = array('date' => $row['date'], 'value' => calculateBMI($row));
		$data[] = $val;
	}
	print json_encode($data);
	$result->close();
	}else{
		echo "Access Denieted";
	}
		function calculateBMI($row){
		$bmi_height = ($row['height']/100);
		$bmi_weight = $row['weight'];
		$bmi_status = number_format((float)($bmi_weight/($bmi_height*$bmi_height)), 1, '.', '');
		return $bmi_status;
		}
$connection->close();
?>