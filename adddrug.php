<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $drugid = $_POST['drugid'];
        $drugname = $_POST['drugname'];
        $category = $_POST['category'];
        $provider = $_POST['provider'];
        $dosage = $_POST['dosage'];
        $image = $_FILES['image']['name'];

        $uploadDir = 'C:\xamppnew\htdocs\ADD\webimages/'; // Replace with your actual path
        $uploadFile = $uploadDir . $image; // Reassign the variable with the correct path

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // File was successfully uploaded
            echo "File uploaded successfully.";
        } else {
            // File upload failed
            echo "File upload failed.";
        }

        // Rest of your code for database connection and insertion
    } else {
        // Handle the error
        echo "File upload error: " . $_FILES['image']['error'];
    }



        $host = "localhost";
        $dbname = "drugdispensing";
        $username = "root";
        $password = "1Rurilongstaff1";
        
        $conn = mysqli_connect($host, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            die("Connection error: " . mysqli_connect_error());
        } else {
            $stmt = $conn->prepare("INSERT INTO drug (drugid, drugname, category, provider, dosage, image) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $drugid, $drugname, $category, $provider, $dosage, $image);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
    } else {
        // Handle the error
        echo "File upload error: " . $_FILES['image']['error'];
    }

?>