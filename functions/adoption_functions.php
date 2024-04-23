<?php
// Include the database connection file
include 'db_connection.php';

// Function to submit adoption application
function submitAdoptionApplication($pet_id, $name, $email, $phone, $address, $message) {
    global $conn;

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO adoption_applications (pet_id, name, email, phone, address, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $pet_id, $name, $email, $phone, $address, $message);

    // Execute the statement
    $result = $stmt->execute();

    // Close statement
    $stmt->close();

    return $result;
}

// Function to fetch all adoption applications
function getAllAdoptionApplications() {
    global $conn;

    // Query to fetch all adoption applications
    $sql = "SELECT * FROM adoption_applications";

    // Execute query
    $result = $conn->query($sql);

    // Fetch result as an associative array
    $applications = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $applications[] = $row;
        }
    }

    // Free result set
    $result->free_result();

    return $applications;
}
?>
