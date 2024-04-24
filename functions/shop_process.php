<?php
// Include the database connection
include 'db_connection.php';



// Function to get all displayProducts
function displayProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $products;
}




// Function to fetch products from the database
function fetchProducts() {
    global $conn; // Access the global connection variable
    
    // Retrieve products from the database
    $sql = "SELECT id, name, category, price, image_url FROM products";
    $result = $conn->query($sql);
    
    // Check if there are any products
    if ($result->num_rows > 0) {
        // Return the result set
        return $result;
    } else {
        return false; // Return false if no products found
    }
}




?>




