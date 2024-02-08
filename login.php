<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>
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