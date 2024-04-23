<?php
// Include the database connection
include 'db_connection.php';

// Function to create a new user
function createUser($username, $email, $password, $role_id) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password, role_id) VALUES ('$username', '$email', '$hashedPassword', $role_id)";
    return mysqli_query($conn, $sql);
}

// Function to check if a username or email already exists
function checkUserExists($username, $email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Function to verify user login
function verifyUser($email, $password) {
    $user = getUserByEmail($email);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

// Function to get user by email
function getUserByEmail($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}


// Function to get user information by user ID
function getUserById($user_id) {
    global $conn;

    // Prepare and bind parameter
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch user information
    $user = $result->fetch_assoc();

    // Close statement
    $stmt->close();

    return $user;
}

?>


