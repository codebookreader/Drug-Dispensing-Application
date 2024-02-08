<?php

$user = 'root';
$pass = '1Rurilongstaff1';
$db = 'drugdispensing';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

echo "Connection made!";

?>