<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link rel="stylesheet" type="text/css" href="registration.css" />
</head>
<body>
    <div class="container">
        <h2>Administrator Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>

<?php
// Start the session
session_start();

// Check if the user is already logged in, redirect to index.php if true
if (isset($_SESSION["user"])) {
   header("Location: index.php");
   exit();
}

// Include your database connection logic here
require_once("loginconn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Validate the form data (you may add more validation as needed)
    if (!empty($email) && !empty($password)) {
        // Perform your login authentication logic here (e.g., querying the database)
        // Example:
        $sql = "SELECT * FROM administrator WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            // User authenticated successfully, set session variable and redirect
            $_SESSION["user"] = $email;
            header("Location: index.php");
            exit();
        } else {
            // Invalid credentials, display error message
            echo "<div class='error'>Invalid email or password.</div>";
        }
    } else {
        // Username or password is empty, display error message
        echo "<div class='error'>Email and password are required.</div>";
    }
}
?>