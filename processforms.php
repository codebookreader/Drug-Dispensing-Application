<?php
// require_once("registration.html");
print_r('User Registered Successfully!');

// Use isset to check if the key exists in the $_POST array
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminid'], $_POST['name'], $_POST['ssn'], $_POST['email'], $_POST['password'])) {
   $adminid = $_POST['adminid'];
    $name = $_POST['name'];
    $ssn = $_POST['ssn'];
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
        $stmt = $conn->prepare("INSERT INTO patient ( adminid, name, ssn, email, password) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("isiss", $adminid, $name, $ssn, $email, $Password); // Use the new variable

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