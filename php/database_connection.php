<?php
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
//$connection->close();
?>