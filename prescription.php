<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientid = $_POST['patientid'];
    $patientname = $_POST['patientname'];
    $drugid = $_POST['drugid'];
    $drugname = $_POST['drugname'];
    $frequency = $_POST['frequency'];
    $dosage = $_POST['dosage'];

    $host = "localhost";
    $dbname = "drugdispensing";
    $username = "root";
    $password = "1Rurilongstaff1";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("INSERT INTO prescription (patientid, patientname, drugid, drugname, frequency, dosage) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isiss", $patientid, $patientname, $drugid, $drugname, $frequency, $dosage);

        if ($stmt->execute()) {
            echo "Prescription added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>