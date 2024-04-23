<?php
// Include database connection and pet functions
include 'functions/db_connection.php';
include 'functions/pet_functions.php';

// Check if pet ID is provided in the URL
if (isset($_GET['id'])) {
    $pet_id = $_GET['id'];
    // Fetch pet details by ID
    $pet = getPetById($pet_id);
} else {
    // Redirect to browse pets page if no pet ID is provided
    header("Location: browse_pets.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $description = $_POST['description'];

    // Update pet details
    if (updatePet($pet_id, $name, $species, $breed, $age, $description)) {
        echo "Pet details updated successfully.";
    } else {
        echo "Error updating pet details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pet Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Update Pet Details</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="browse_pets.php">Browse Pets</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.html">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Update details for <?php echo $pet['name']; ?>:</h2>
            <form id="updatePetForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $pet_id; ?>" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $pet['name']; ?>" required>
                <label for="species">Species:</label>
                <input type="text" id="species" name="species" value="<?php echo $pet['species']; ?>" required>
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" value="<?php echo $pet['breed']; ?>">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo $pet['age']; ?>" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?php echo $pet['description']; ?></textarea>
                <button type="submit">Update Pet Details</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Online Pet Adoption</p>
    </footer>
</body>
</html>
