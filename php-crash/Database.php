<?php
$host = 'localhost';
$db = 'php_crash';     // <-- bruk navnet på databasen du faktisk har laget i phpMyAdmin
$user = 'root';
$pass = '';            // (tomt passord, standard i XAMPP)

$charset = 'utf8mb4';

// lag connection
$mysqli = new mysqli($host, $user, $pass, $db);

// sjekk for errors
if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}
?>
