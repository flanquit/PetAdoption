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
function getAllProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $products;
}

// Function to get pet by ID
function getProductById($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Function to update pet details
function updateProduct($id, $name, $category, $price) {
    global $conn;
    $sql = "UPDATE products SET name='$name', category='$category', price='$price' WHERE id=$id";
    return mysqli_query($conn, $sql);
}


// Function to update pet details WITH IMAGE UPDATE
// function updatePet($pet_id, $name, $species, $breed, $age, $description, $image_url) {
//     global $conn;
//     $sql = "UPDATE pets SET name='$name', species='$species', breed='$breed', age=$age, description='$description', image_url='$image_url' WHERE pet_id=$pet_id";
//     return mysqli_query($conn, $sql);
// }

// Function to delete pet
function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM products WHERE id=$id";
    return mysqli_query($conn, $sql);
}
?>
