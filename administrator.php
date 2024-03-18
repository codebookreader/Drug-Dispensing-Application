
<!DOCTYPE HTML> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrator</title>
        <link rel="stylesheet" type="text/css" href="user.css" />
    </head>
    <body>
        <h1 style="float: left;font-family:'Arial Rounded MT';font-size:28px">ADMINISTRATOR</h1>
        <!--<h2 style="float: right;font-family:'Arial Rounded MT';font-size:20px">echo $_SESSION['username']</h2>-->
        <div class="Menu">
            <div class=display>
            <?php
session_start(); // Start the session

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

if ($name !== '') {
    echo '<div class="login-content">';
    echo '<div class="login-message">Welcome, ' . $name . '.</div>';
    echo '<div class="logout-link"><a href="logout.php">Logout</a></div>';
    echo '</div>';
} else {
    echo '<div class="login-message">Please <a href="login.html">login</a> to access features.</div>';
}
?>
            </div>
                <ul>
                    <li><a class="active" href="#home">Add User</a></li>
                    <li><a href="#news">Remove User</a></li>
                    <li><a href="#contact">Edit user profile</a></li>
                    <li><a href="#about">Display Users</a></li>
                    <li><a href="#loginooptions">View Drugs</a></li>

                  </ul>
                  <div class = "termsandconditions">
                    <p>
                    These pages and the separate copyright works contained therein 
                        may be viewed on screen, downloaded onto a hard disk or printed for your personal 
                        use provided that you include this copyright notice on each copy and that you make
                         no alterations to any of the pages and do not use any of the pages in any other 
                         work or publication in whatever medium stored. Copyright works contained in these
                          pages may not be used, distributed or copied for any commercial purpose.</p>
                  </div>

            </div>
            <div>
            
        </div>
        </body>
</html>
