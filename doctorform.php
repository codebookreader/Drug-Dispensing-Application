<?php
// require_once("registration.html");
print_r('User Registered Successfully!');

// Use isset to check if the key exists in the $_POST array
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['docid'], $_POST['docname'], $_POST['docemail'], $_POST['password'], $_POST['drugid'], $_POST['patientid'])) {
    $docid = $_POST['docid'];
    $docname = $_POST['docname'];
    $docemail = $_POST['docemail'];
    $docpassword = $_POST['password'];
    $drugid = $_POST['drugid'];
    $patientid = $_POST['patientid'];
     // Use a different variable name

    $host = "localhost";
    $dbname = "drugdispensing";
    $username = "root";
    $databasePassword = "#1Rurilongstaff1"; // Rename the variable

    $conn = mysqli_connect($host, $username, $databasePassword, $dbname);

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("INSERT INTO patient (docid, docname, docemail, password, drugid, patientid) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("isssii", $docid, $docname, $docemail, $docpassword, $drugid, $patientid); // Use the new variable

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