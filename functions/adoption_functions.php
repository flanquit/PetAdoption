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


// Function to approve adoption application
function approveAdoptionApplication($application_id) {
    global $conn;

    // Prepare and bind parameters
    $stmt = $conn->prepare("UPDATE adoption_applications SET status = 'approved' WHERE id = ?");
    $stmt->bind_param("i", $application_id);

    // Execute the statement
    $result = $stmt->execute();

    // Close statement
    $stmt->close();

    return $result;
}

// Function to reject adoption application
function rejectAdoptionApplication($application_id) {
    global $conn;

    // Prepare and bind parameters
    $stmt = $conn->prepare("UPDATE adoption_applications SET status = 'rejected' WHERE id = ?");
    $stmt->bind_param("i", $application_id);

    // Execute the statement
    $result = $stmt->execute();

    // Close statement
    $stmt->close();

    return $result;
}


// Function to fetch all adoption applications with pet names
function getAllAdoptionApplicationsWithPetNames() {
    global $conn;

    // Query to fetch all adoption applications with pet names
    $sql = "SELECT aa.*, p.name AS pet_name FROM adoption_applications aa JOIN pets p ON aa.pet_id = p.pet_id";

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

// Function to get adoption applications by user's email
function getAdoptionApplicationsByEmail($email) {
    global $conn;

    // Prepare and bind parameter
    $stmt = $conn->prepare("SELECT * FROM adoption_applications WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch adoption applications
    $applications = [];
    while ($row = $result->fetch_assoc()) {
        $applications[] = $row;
    }

    // Close statement
    $stmt->close();

    return $applications;
}



?>
