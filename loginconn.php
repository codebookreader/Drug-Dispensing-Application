<?php
//require_once("registration.html");
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$ssn = $_POST['ssn'];
$password = $_POST['password'];
$name = $_POST['name'];

}

$host = "localhost";
$dbname = "drugdispensing";
$username = "root";
$password = "#1Rurilongstaff1";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

                       if (mysqli_connect_errno()) {
                        die("Connection error: " . mysqli_connect_error());
                    
}

