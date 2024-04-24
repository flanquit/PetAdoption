<?php
// Start session
session_start();

// Destroy session
session_destroy();

// Redirect to the login page or any other desired page
header("Location: client/login.php");
exit();
?>
