<?php
// Function to validate user login
function validateLogin($email, $password) {
    global $conn;

    // Prepare and bind parameters
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists and password is correct
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return true; // Login successful
        }
    }

    return false; // Login failed
}

// Function to retrieve user details by email
function getUserByEmail($email) {
    global $conn;

    // Prepare and bind parameters
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch user details
    $user = $result->fetch_assoc();

    return $user;
}
?>
