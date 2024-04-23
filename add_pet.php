<?php
// Include database connection and pet functions
include 'functions/db_connection.php';
include 'functions/pet_functions.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $description = $_POST['description'];

    // Image upload handling
    $targetDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // Allow certain file formats
        $allowedTypes = array('jpg','jpeg','png','gif');
        if(in_array($fileType, $allowedTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                $image_url = $targetFilePath;

                // Add the new pet with image URL
                if (createPet($name, $species, $breed, $age, $description, $image_url)) {
                    echo "Pet added successfully.";
                } else {
                    echo "Error adding pet.";
                }
            } else{
                echo "Error uploading file.";
            }
        } else{
            echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Pet</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add New Pet</h1>
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
            <h2>Fill in the details to add a new pet:</h2>
            <form id="addPetForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="species">Species:</label>
                <input type="text" id="species" name="species" required>
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button type="submit">Add Pet</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Online Pet Adoption</p>
    </footer>
</body>
</html>
