<?php
// Include database connection and adoption functions
include 'db_connection.php';
include 'adoption_functions.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $pet_id = $_POST['pet_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    // Process adoption application
    if (submitAdoptionApplication($pet_id, $name, $email, $phone, $address, $message)) {
        echo "Adoption application submitted successfully.";
    } else {
        echo "Error submitting adoption application.";
    }
}
?>
