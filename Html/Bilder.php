<?php
//login check
require_once '/xampp/htdocs/php-crash/Logincheck.php';
requireLogin();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/Styles.css">
    <title>Bildegalleri</title>
</head>
<body>
<?php
        include("../Include/navbar.html");
    ?>

    <div class="bildestyling">
        <img src="../Bilder/Bildeserie 1.png" alt="Bilde 1">
        <img src="../Bilder/Bildeserie 2.jpg" alt="Bilde 2">
        <img src="../Bilder/Bildeserie 3.jpg" alt="Bilde 3">
        <img src="../Bilder/Bildeserie 4.jpg" alt="Bilde 4">
        <img src="../Bilder/Bildeserie 5.jpg" alt="Bilde 5">
    </div>

    <style>

    </style>
</body>
</html>
