<?php  
session_start(); // Start the session

$ssnErr = '';
$passwordErr = '';
$errorMessage = '';
$formIsValid = false;

    // Include your database connection logic here
    require_once("loginconn.php");
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $ssn = isset($_POST["ssn"]) ? $_POST["ssn"] : '';
        $password = isset($_POST["password"]) ? $_POST["password"] : '';
        $name = isset($_POST["name"]) ? $_POST["name"] : '';

    
        // Validate the form data
        if (empty($ssn)) {
            $ssnErr = 'SSN is required.';
        }
        if (empty($password)) {
            $passwordErr = 'Password is required.';
        }
        if (empty($password)) {
            $passwordErr = 'Password is required.';
        }
    
        // If the form data is valid, set the formIsValid variable to true
        if (empty($passwordErr) && empty($ssnErr) && empty($nameErr)) {
            $formIsValid = true;
        }
    
        // After verifying login credentials, fetch user data from the database
        if ($formIsValid) {
            $sql = "SELECT Name FROM administrator WHERE ssn = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $ssn);
            $stmt->execute();
            $stmt->bind_result($Name);
    
            if ($stmt->fetch()) {
                $_SESSION['name'] = $name;
                    header("Location: administrator.php");
                exit();
            } else {
                echo("Invalid name, password or ssn.");
            }
                $stmt->close();
    }
}

?>