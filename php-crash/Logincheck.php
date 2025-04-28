<?php
/**
 * Authentication functions for use across the site
 */

// Function to check if user is logged in and redirect if not
function requireLogin() {
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Add cache control headers to prevent caching
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: 0");

    $isLoggedIn = false;

    // Check session first
    if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
        $isLoggedIn = true;
    } 
    // If not in session, check for remember_me cookie
    else if (isset($_COOKIE['remember_me'])) {
        require_once 'database.php';
        
        global $mysqli;
        $token = $mysqli->real_escape_string($_COOKIE['remember_me']);
        
        // Check if token exists and is valid
        $sql = "SELECT s.*, u.username FROM sessions s 
                JOIN users u ON s.user_id = u.id 
                WHERE s.token = ? AND s.expires_at > NOW()";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($session = $result->fetch_assoc()) {
            // Set session variables
            $_SESSION['user_id'] = $session['user_id'];
            $_SESSION['username'] = $session['username'];
            $isLoggedIn = true;
        }
    }

    // If not logged in, redirect
    if (!$isLoggedIn) {
        header('Location: /login.php');
        exit();
    }
    
    return true;
}
?>