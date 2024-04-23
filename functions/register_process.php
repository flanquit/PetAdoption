<?php
// Include user functions
include 'user_functions.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if username or email already exists
    if (checkUserExists($username, $email)) {
        echo "Username or email already exists.";
    } else {
        // Create new user
        if (createUser($username, $email, $password, 2)) { // Assuming 'client' role has role_id = 2
            echo "User registered successfully.";
        } else {
            echo "Error registering user.";
        }
    }
}
?>
