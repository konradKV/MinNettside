<?php
// comment_functions.php - Contains all functions for the commenting system

// Function to add a new comment
function addComment($mysqli, $user_id, $content, $parent_id = null) {
    $stmt = $mysqli->prepare("INSERT INTO comments (user_id, content, parent_id) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $user_id, $content, $parent_id);
    
    if ($stmt->execute()) {
        return $mysqli->insert_id;
    } else {
        return false;
    }
}

// Function to get all top-level comments (no parent)
function getComments($mysqli) {
    $sql = "SELECT c.id, c.content, c.created_at, c.parent_id, u.username 
            FROM comments c
            JOIN users u ON c.user_id = u.id
            WHERE c.parent_id IS NULL
            ORDER BY c.created_at DESC";
    
    $result = $mysqli->query($sql);
    $comments = [];
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['replies'] = getReplies($mysqli, $row['id']);
            $comments[] = $row;
        }
    }
    
    return $comments;
}

// Function to get replies for a specific comment
function getReplies($mysqli, $parent_id) {
    $stmt = $mysqli->prepare("SELECT c.id, c.content, c.created_at, c.parent_id, u.username 
                             FROM comments c
                             JOIN users u ON c.user_id = u.id
                             WHERE c.parent_id = ?
                             ORDER BY c.created_at ASC");
    $stmt->bind_param("i", $parent_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $replies = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $replies[] = $row;
        }
    }
    
    return $replies;
}

// Function to format the date in a more readable way
function formatDate($date) {
    $commentDate = new DateTime($date);
    $now = new DateTime();
    $interval = $commentDate->diff($now);
    
    if ($interval->y > 0) {
        return $interval->y . ' år siden';
    } elseif ($interval->m > 0) {
        return $interval->m . ' måneder siden';
    } elseif ($interval->d > 0) {
        return $interval->d . ' dager siden';
    } elseif ($interval->h > 0) {
        return $interval->h . ' timer siden';
    } elseif ($interval->i > 0) {
        return $interval->i . ' minutter siden';
    } else {
        return 'nå nettopp';
    }
}
?>