<?php
// Include user functions
include 'user_functions.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verify user login
    $user = verifyUser($email, $password);
    if ($user) {
        // User login successful, redirect to dashboard or homepage
        // Example: header("Location: dashboard.php");
        echo "Login successful.";
    } else {
        echo "Invalid email or password.";
    }
}
?>
