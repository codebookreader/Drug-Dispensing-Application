<?php
// Start the session
/*session_start();

// Check if the patient is logged in
if (isset($_SESSION['patient_username'])) {
    // Patient is logged in
    $welcomeMessage = "Welcome " . $_SESSION['patient_username'];
} else {
    // Patient is not logged in, redirect to login page or perform other actions
    header("Location: login.php"); // Replace 'login.php' with the actual login page
    exit();
}*/
?>

<!DOCTYPE html>
<html lang="us">
<head>
    <meta charset="UTF-8">
    <title>Your Title Here</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
      .bg-light {
    --bs-bg-opacity: 0;
    background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
}
      /* Custom style to remove the rectangle around the text */
      .navbar-brand {
            outline: none !important; /* Remove the default outline */
            border: none !important;  /* Remove the default border */
            font-size: 40px;
        }
  </style>
</head>
<body>    
    <!-- As a heading -->
    <nav class="navbar navbar-light" style="background-color: #821de0;">
    <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 h1 text-white">Patient</span>
    </nav>

      <div class="container">
       <div class="card">
       <div class="front"></div>
       <div class="back>
       <h1>Front of Card</h1>




    <!-- Bootstrap JavaScript and Popper.js (order matters) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-vf5UQw1Cqz3Zp2qLzZw+3ltf1Z9K9j9mO8qD3i6FhAqEMZMZ4A1OhxlEDa6P5Na" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyJ8QC4NlHfwB1N4tktAq8EdZ5PmstA6Gm" crossorigin="anonymous"></script>
</body>
</html>