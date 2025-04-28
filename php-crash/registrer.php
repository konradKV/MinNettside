<?php
session_start();
require_once 'database.php';

// håndter registrering
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // registrer ny bruker i databasen
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header('Location: login.php');
        exit();
    } else {
        $error = "Brukernavn finnes allerede i databasen";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
    <div class="auth-container">
        <h2>Registrer deg</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Brukernavn:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Passord:</label>
                <input type="password" name="password" required>
            </div>
    
            <button id="submit" type="submit">Registrer</button>
        </form>
        <p>Har du allerede bruker? <a href="login.php">Logg inn her</a></p>
    </div>
</body>
</html>