<?php
$servername = "localhost";
$username = "root";
$password = "1Rurilongstaff1";
$database = "drugdispensing";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT drugid, category, drugname, provider FROM drug";
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
        <h1>Drug List</h1>
    <table class="table table-striped">
        <thead style="background-color: #343a40; color: #fff;">
            <tr>
                <th>DrugID</th>
                <th>Category</th>
                <th>Drug Name</th>
                <th>Provider</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["drugid"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>" . $row["drugname"] . "</td>";
                echo "<td>" . $row["provider"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>