<?php
session_start();
require_once '../php-crash/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /Html/logg.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $mysqli->real_escape_string($_POST['new_username']);
    $userId = $_SESSION['user_id'];

    $sql = "UPDATE users SET username = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $newUsername, $userId);

    if ($stmt->execute()) {
        $_SESSION['username'] = $newUsername;
        $message = "Brukernavn oppdatert!";
    } else {
        $error = "Noe gikk galt.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Rediger profil</title></head>
<body>
<h2>Rediger brukernavn</h2>
<?php if (isset($message)) echo "<p style='color:green;'>$message</p>"; ?>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    <label for="new_username">Nytt brukernavn:</label>
    <input type="text" name="new_username" required>
    <button type="submit">Oppdater</button>
</form>

<a href="/index.php">Tilbake</a>
</body>
</html>
