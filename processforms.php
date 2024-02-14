<?php
// require_once("registration.html");
print_r('User Registered Successfully!');
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $patientid = $_POST['patientid'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $userPassword = $_POST['password']; // Use a different variable name
}

$host = "localhost";
$dbname = "drugdispensing";
$username = "root";
$databasePassword = "#1Rurilongstaff1"; // Rename the variable

$conn = mysqli_connect($host, $username, $databasePassword, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
} else {
    $stmt = $conn->prepare("INSERT INTO patient (patientid, name, age, email, password) VALUES (?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("isiss", $patientid, $name, $age, $email, $userPassword); // Use the new variable
    
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>