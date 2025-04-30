<?php
session_start();
require_once '../php-crash/Database.php';
require_once '../php-crash/CommentFunctions.php';

// Sjekk innlogging
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Ny kommentar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
    $content = trim($_POST['content']);
    $parent_id = isset($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

    if (!empty($content)) {
        addComment($mysqli, $_SESSION['user_id'], $content, $parent_id);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$comments = getComments($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kommentarsystem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Hovedstyle til nettsiden -->
    <link rel="stylesheet" href="/Css/Styles.css">

    <!-- Kommentarstil isolert -->
    <link rel="stylesheet" href="/Css/Kommentarer.css">
</head>
<body>

<?php include("../Include/navbar.php"); ?>

<div class="kommentarer-wrapper">
    <h1>Kommentarsystem</h1>

    <!-- Ny kommentar -->
    <div class="skriv-kommentar">
        <h2>Skriv en kommentar</h2>
        <form method="POST">
            <textarea name="content" rows="4" required placeholder="Skriv din kommentar her..."></textarea>
            <button type="submit">Send kommentar</button>
        </form>
    </div>

    <!-- Vise kommentarer -->
    <h2>Alle kommentarer</h2>

    <?php if (empty($comments)): ?>
        <p>Ingen kommentarer ennå. Vær den første til å kommentere!</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="kommentar" id="comment-<?php echo $comment['id']; ?>">
                <div class="hode">
                    <span><?php echo htmlspecialchars($comment['username']); ?></span>
                    <span class="dato"><?php echo formatDate($comment['created_at']); ?></span>
                </div>
                <div class="innhold">
                    <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
                </div>

                <button class="svar-knapp" onclick="toggleReplyForm(<?php echo $comment['id']; ?>)">Svar</button>

                <div class="svar-skjema" id="reply-form-<?php echo $comment['id']; ?>">
                    <form method="POST">
                        <input type="hidden" name="parent_id" value="<?php echo $comment['id']; ?>">
                        <textarea name="content" rows="3" required placeholder="Skriv ditt svar her..."></textarea>
                        <button type="submit">Send svar</button>
                    </form>
                </div>

                <?php if (!empty($comment['replies'])): ?>
                    <?php foreach ($comment['replies'] as $reply): ?>
                        <div class="svar">
                            <div class="hode">
                                <span><?php echo htmlspecialchars($reply['username']); ?></span>
                                <span class="dato"><?php echo formatDate($reply['created_at']); ?></span>
                            </div>
                            <div class="innhold">
                                <?php echo nl2br(htmlspecialchars($reply['content'])); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
function toggleReplyForm(commentId) {
    const form = document.getElementById('reply-form-' + commentId);
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
}
</script>

</body>
</html>
