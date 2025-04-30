
<ul>
    <div class="navbar">
        <a href="/index.php">Home</a>
        <a href="/Html/Tiktacktoe.php">TikTakToe</a>
        <a href="/Html/logg.php">Logg</a>
        <a href="/Html/Skisse.php">Skisse</a>
        <a href="/Html/Kommentarer.php">Kommentarer</a>
        <div class="dropdown">
            <button class="dropbtn">Mine projekter
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Html/Bilder.php">Bilde montasje.</a>
                <a href="/Australia/Australia.php">Australia</a>
                <a href="/Html/Peakpoint.php">Peakpoint</a>
            </div>
        </div>
        <?php if (isset($_SESSION['username'])): ?>
    <div class="dropdown user-dropdown" style="float: right;"> 
        <button class="dropbtn user-button">
    <i class="fa fa-user"></i> Rediger Bruker </button>

        <div class="dropdown-content dropdown-right">
            <a href="/Html/profile.php"> Endre navn</a>
            <a href="/php-crash/delete_user.php" onclick="return confirm('Er du sikker på at du vil slette brukeren?');"> Slett bruker</a>
            <a href="/php-crash/logout.php"> Logg ut</a>
        </div>
    </div>
<?php endif; ?>

</ul>
