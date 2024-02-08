<?php
// Start or resume the session
session_start();

// Check if the user is already logged out (session doesn't exist)
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or any other appropriate page
    header('Location: landingpage.html');
    exit();
}

// Unset all of the session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '',
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Redirect to the login page or any other appropriate page after logging out
header('Location: landingpage.html');
exit();
?>