<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to home page or wherever you want after logout
header("Location: /");
exit;
?>
