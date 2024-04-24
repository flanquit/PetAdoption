<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Database connection
    include 'db_connection.php';

    // Escape user inputs to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $species = $conn->real_escape_string($_POST['species']);
    $age = $_POST['age']; // No need to escape, but validate if necessary
    $color = $conn->real_escape_string($_POST['color']);

    // File upload handling
    $target_dir = "uploads/pets/"; // Directory where uploaded images will be saved
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            // Insert pet details into database
            $sql = "INSERT INTO pets (name, species, age, color, image_url) VALUES ('$name', '$species', $age, '$color', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    // Close database connection
    $conn->close();
}
?>
