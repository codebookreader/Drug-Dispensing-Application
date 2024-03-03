<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pharmaid'], $_POST['pharmaname'], $_POST['pharmaemail'], $_POST['password'], $_POST['drugid'], $_POST['patientid'])) {
    $pharmaid = $_POST['pharmaid'];
    $pharmaname = $_POST['pharmaname'];
    $pharmaemail = $_POST['pharmaemail'];
    $password = $_POST['password'];
    $drugid = $_POST['drugid'];
    $patientid = $_POST['patientid'];

    $host = "localhost";
    $dbname = "drugdispensing";
    $username = "root";
    $databasePassword = "#1Rurilongstaff1";

    $conn = mysqli_connect($host, $username, $databasePassword, $dbname);

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("INSERT INTO pharmacist (pharmaid, pharmaname, pharmaemail, password, drugid, patientid) VALUES (?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("isssii", $pharmaid, $pharmaname, $pharmaemail, $password, $drugid, $patientid);

        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        } else {
            echo "Data inserted successfully!";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Missing required form fields.";
}
?>