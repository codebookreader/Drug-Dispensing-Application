<?php
// require_once("registration.html");
print_r('User Registered Successfully!');

// Use isset to check if the key exists in the $_POST array
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ssn'], $_POST['name'], $_POST['age'], $_POST['email'], $_POST['password'])) {
   $ssn = $_POST['ssn'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Use a different variable name

    $host = "localhost";
    $dbname = "drugdispensing";
    $username = "root";
    $databasePassword = "#1Rurilongstaff1"; // Rename the variable

    $conn = mysqli_connect($host, $username, $databasePassword, $dbname);

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("INSERT INTO patient ( ssn, name, age, email, password) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("isiss", $ssn, $name, $age, $email, $password); // Use the new variable

        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();
    }
} else {
    // Handle the case where not all required fields are provided in $_POST
    echo "Missing required form fields.";
}
?>