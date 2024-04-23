<?php
// Include database connection and pet functions
include 'functions/db_connection.php';
include 'functions/pet_functions.php';

// Check if pet ID is provided in the URL
if (isset($_GET['id'])) {
    $pet_id = $_GET['id'];
    // Fetch pet details by ID
    $pet = getPetById($pet_id);
    if (!$pet) {
        // If pet with the provided ID doesn't exist, handle accordingly (e.g., show error message or redirect)
        echo "Pet not found.";
        exit();
    }
} else {
    // Redirect to browse pets page if no pet ID is provided
    header("Location: browse_pets.php");
    exit();
}

// Check if form is submitted (to confirm pet deletion)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    // Delete the pet
    if (deletePet($pet_id)) {
        // Redirect to browse pets page after successful deletion
        header("Location: browse_pets.php");
        exit();
    } else {
        echo "Error deleting pet.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Pet</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Delete Pet</h1>
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
            <h2>Are you sure you want to delete <?php echo $pet['name']; ?>?</h2>
            <form id="deletePetForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $pet_id; ?>" method="POST">
                <button type="submit" name="confirm_delete">Yes, Delete Pet</button>
                <a href="browse_pets.php">No, Go Back</a>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Online Pet Adoption</p>
    </footer>
</body>
</html>
