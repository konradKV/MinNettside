<?php
//login check
require_once '/xampp/htdocs/php-crash/Logincheck.php';
requireLogin();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Tic-Tac-Toe</title>
  <script src="../Javascript/Tiktaktoe.js"></script>
  <link rel="stylesheet" href="../Css/TikTakToe.css">
  <link rel="stylesheet" href="../Css/Styles.css">
  
      
</head>


<body>
<?php
        include("../Include/navbar.php");
    ?>


  <h1>Tic-Tac-Toe</h1>
  <div id="winner"></div>
  <div class="board" id="board"></div>
  <button onclick="resetGame()">Restart Game</button>
  <script src="script.js"></script>
</body>
</html>