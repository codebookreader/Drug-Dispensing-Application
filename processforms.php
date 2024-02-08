<?php
//require_once("registration.html");
print_r('User Registered Successfully!');
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$ssn = $_POST['ssn'];
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];
}

$host = "localhost";
$dbname = "drugdispensing";
$username = "root";
$password = "1Rurilongstaff1";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

                       if (mysqli_connect_errno()) {
                        die("Connection error: " . mysqli_connect_error());
                    
}else{
    $stmt = $conn->prepare("insert into patient(ssn, name, age, email, password)
    values(?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $ssn, $name, $age, $email, $password);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}