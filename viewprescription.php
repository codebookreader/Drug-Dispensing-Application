<?php
$servername = "localhost";
$username = "root";
$password = "1Rurilongstaff1";
$database = "drugdispensing";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['prescribe_button'])) {
    // Assuming you have a column 'id' to uniquely identify each row
    $id = $_POST['prescribe_button'];

    // Update the status to 'Prescribed'
    $sql = "UPDATE prescriptions SET status = 'Prescribed' WHERE id = $id";
    $conn->query($sql);
}

$sql = "SELECT patientid, patientname, drugid, drugname, frequency, dosage, prescription_status FROM prescriptions";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>drug</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="container text-center">
        <h1>Prescriptions</h1>
    <table class="table table-striped">
        <thead style="background-color: #343a40; color: #fff;">
            <tr>
                <th>PatientID</th>
                <th>Patient</th>
                <th>DrugID</th>
                <th>Drug Name</th>
                <th>Frequency</th>
                <th>Dosage</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["patientid"] . "</td>";
                echo "<td>" . $row["patientname"] . "</td>";
                echo "<td>" . $row["drugid"] . "</td>";
                echo "<td>" . $row["drugname"] . "</td>";
                echo "<td>" . $row["frequency"] . "</td>";
                echo "<td>" . $row["dosage"] . "</td>";
                echo "<td>" . $row["prescription_status"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>