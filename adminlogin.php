<?php
// Start the session
session_start();

if (isset($_SESSION["user"])) {
   header("Location: administrator.php");
   exit();
}

// Include your database connection logic here
require_once("adminconn.php");

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
            header("Location: administrator.php");
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

<!DOCTYPE html>
<html lang="en">
<head>
    <!--<img src="adminimage.jpg" alt="Description for image" width="1200" height="600" class="example">-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="registration.css" />
</head>
<body>

<div class="form" id="form" name="form">
    <form method="post" action="adminlogin.php">
        <h1 class="h1">Login</h1>
        <div class="email"><ul>Email: <input type="email" name="email" placeholder="Enter your email"/> <br/></ul></div>
        <div class="ssn"><ul>Password: <input type="password" name="password" placeholder="Enter your password"/> <br/></ul></div>
        <input class="form_button" type="Submit"/></br>
        <div class="others">
            Not registered yet? Click <a href="registration.html">here</a> to register
        </div>
    </form>
</div>

</body>
</html>