<?php
session_start();
require_once '../php-crash/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /Html/logg.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Slett bruker
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();

// Logg ut og slett session
session_destroy();
header("Location: /Html/logg.php");
exit();
?>
