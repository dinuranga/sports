<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
} else {
    // Redirect to login page after logged out
    session_destroy();
    header("Location: index.php");
    exit();
}
