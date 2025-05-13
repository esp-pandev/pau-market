<?php
function ensureAuthenticated() {
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        // Store current URL for redirect back after login
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        
        // Redirect to login page
        header('Location: ' . BASE_URL . 'auth/login');
        exit;
    }
    
    // Additional role-based checks can be added here if needed
}
?>