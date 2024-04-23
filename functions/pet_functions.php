<?php
// Include the database connection
include 'db_connection.php';

// Function to create a new pet
function createPet($name, $species, $breed, $age, $description, $image_url) {
    global $conn;
    $sql = "INSERT INTO pets (name, species, breed, age, description, image_url) VALUES ('$name', '$species', '$breed', $age, '$description', '$image_url')";
    return mysqli_query($conn, $sql);
}

// Function to get all pets
function getAllPets() {
    global $conn;
    $sql = "SELECT * FROM pets";
    $result = mysqli_query($conn, $sql);
    $pets = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $pets;
}

// Function to get pet by ID
function getPetById($pet_id) {
    global $conn;
    $sql = "SELECT * FROM pets WHERE pet_id=$pet_id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Function to update pet details
function updatePet($pet_id, $name, $species, $breed, $age, $description) {
    global $conn;
    $sql = "UPDATE pets SET name='$name', species='$species', breed='$breed', age=$age, description='$description' WHERE pet_id=$pet_id";
    return mysqli_query($conn, $sql);
}


// Function to update pet details WITH IMAGE UPDATE
// function updatePet($pet_id, $name, $species, $breed, $age, $description, $image_url) {
//     global $conn;
//     $sql = "UPDATE pets SET name='$name', species='$species', breed='$breed', age=$age, description='$description', image_url='$image_url' WHERE pet_id=$pet_id";
//     return mysqli_query($conn, $sql);
// }

// Function to delete pet
function deletePet($pet_id) {
    global $conn;
    $sql = "DELETE FROM pets WHERE pet_id=$pet_id";
    return mysqli_query($conn, $sql);
}
?>
