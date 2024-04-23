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

                // After successful login
       $user_id =$user["user_id"];
       $email =$user["email"];


        if ($user["role_id"] == 1) {
        //    echo('Admin');
        //    header("Location: ../admin/index.php");
           header("Location: ../admin/index.php?user_id=$user_id&email=$email");
        } else {
            // echo('Client');
            // header("Location: ../client/profile.php");
            header("Location: ../client/profile.php?user_id=$user_id&email=$email");
        }
        // Error
        // header("Location: login.php");

    } else {
        echo "Invalid email or password.";
    }
}
?>
