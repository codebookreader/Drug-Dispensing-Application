<?php
//require_once("registration.html");
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$email = $_POST['email'];
$password = $_POST['password'];

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

