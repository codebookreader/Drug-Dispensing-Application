<?php
$host = "localhost";
$dbname = "drugdispensing";
$db_username = "root";
$db_password = "#1Rurilongstaff1";

// Create connection
$conn = new mysqli($host, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>