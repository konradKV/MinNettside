<?php
// Starter en ny sesjon eller gjenoppretter en eksisterende sesjon
session_start();

// Inkluderer databasen for å koble til MySQL
require_once '../php-crash/database.php';

// Sjekker om brukeren er logget inn ved å se etter user_id i sesjonen
if (!isset($_SESSION['user_id'])) {
    // Hvis ikke, omdirigerer vi til logg-inn siden
    header("Location: /Html/logg.php");
    exit();
}

// Hvis det er en POST-forespørsel (brukeren sender skjemaet)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Henter og rensker det nye brukernavnet fra skjemaet
    $newUsername = $mysqli->real_escape_string($_POST['new_username']);
    // Henter brukerens ID fra sesjonen
    $userId = $_SESSION['user_id'];

    // SQL-spørring for å oppdatere brukernavnet i databasen
    $sql = "UPDATE users SET username = ? WHERE id = ?";
    // Forbereder SQL-spørringen
    $stmt = $mysqli->prepare($sql);
    // Binder parametrene til spørringen (nytt brukernavn og brukerens ID)
    $stmt->bind_param("si", $newUsername, $userId);

    // Utfører spørringen og sjekker om den er vellykket
    if ($stmt->execute()) {
        // Oppdaterer brukernavnet i sesjonen og viser en suksessmelding
        $_SESSION['username'] = $newUsername;
        $message = "Brukernavn oppdatert!";
    } else {
        // Hvis noe gikk galt, vises en feilmelding
        $error = "Noe gikk galt.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Rediger profil</title></head>
<body>
<h2>Rediger brukernavn</h2>
<!-- Vist melding hvis brukernavnet ble oppdatert -->
<?php if (isset($message)) echo "<p style='color:green;'>$message</p>"; ?>
<!-- Vist feilmelding hvis noe gikk galt -->
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<!-- Skjema for å oppdatere brukernavnet -->
<form method="POST">
    <label for="new_username">Nytt brukernavn:</label>
    <input type="text" name="new_username" required>
    <button type="submit">Oppdater</button>
</form>

<!-- Link tilbake til hjemmesiden -->
<a href="/index.php">Tilbake</a>
</body>
</html>
