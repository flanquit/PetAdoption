<?php
// Include user functions
include 'user_functions.php';

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to get user role
function getUserRole() {
    if (isLoggedIn()) {
        $user_id = $_SESSION['user_id'];
        $user = getUserById($user_id);
        return $user['role_id'];
    } else {
        return null;
    }
}

// Function to check if user is admin
function isAdmin() {
    $role_id = getUserRole();
    return $role_id = 1; // Assuming 'admin' role has role_id = 1
}

// Function to restrict access to admin-only pages
function restrictToAdmin() {
    if (!isAdmin()) {
        // Redirect to homepage or show error message
        header("Location: ../client/login.php");
        exit();
    }
}

// Function to restrict access to authenticated users
function restrictToLoggedIn() {
    if (!isLoggedIn()) {
        // Redirect to login page or show error message
        header("Location: ../client/login.php");
        exit();
    }
}
?>
