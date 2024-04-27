<?php
// Include database connection and pet functions
include 'inc/head.php';
include '../functions/db_connection.php';
include '../functions/pet_functions.php';

// Check if pet ID is provided in the URL
if (isset($_GET['id'])) {
    $pet_id = $_GET['id'];
    // Fetch pet details by ID
    $pet = getPetById($pet_id);
} else {
    // Redirect to browse pets page if no pet ID is provided
   echo ('<h1 style="color:red">Deleted Pet</h1>');
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
    $gender = $_POST['gender'];

    // Update pet details
    if (updatePet($pet_id, $name, $species, $breed, $age, $description, $gender)) {
        echo "<h1>Pet details updated successfully.</h1>";
    } else {
        echo "Error updating pet details.";
    }
}


// Check if form is submitted (to confirm pet deletion)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    // Delete the pet
    if (deletePet($pet_id)) {
        // Redirect to browse pets page after successful deletion
        header("Location: admin/view_pet.php");
        exit();
    } else {
        echo "Error deleting pet.";
    }
}
?>


       <!-- Begin Page Content -->
       <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update details for <?php echo $pet['name']; ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> </a>
</div>

<!-- Content Row -->
<div class="row">


      
            <form id="updatePetForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $pet_id; ?>" method="POST">

            
        <div class="row">
            
            <div class="col-6">
            <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $pet['name']; ?>" required><br>
            </div>
    
            <div class="col-6">
            <label for="species">Species:</label><br>
                <input type="text" id="species" name="species" value="<?php echo $pet['species']; ?>" required><br>
            </div>
    
            </div>


            
        <div class="row">
            
            <div class="col-6">
            <label for="breed">Breed:</label><br>
                <input type="text" id="breed" name="breed" value="<?php echo $pet['breed']; ?>"><br>
            </div>
    
            <div class="col-6">
            <label for="gender">Gender:</label><br>
                <input type="text" id="gender" name="gender" value="<?php echo $pet['gender']; ?>"><br>

            </div>
    
            </div>



            
        <div class="row">
            
            <div class="col-6">
            <label for="age">Age:</label><br>
                <input type="number" id="age" name="age" value="<?php echo $pet['age']; ?>" required><br>
            </div>
    
            <div class="col-6">
            <label for="description">Description:</label><br>
                <textarea id="description" name="description" required><?php echo $pet['description']; ?></textarea><br><br>
            </div>
    
            </div>


               
               
                

               
                
               
                <button type="submit" class="btn btn-primary">Update Pet Details</button>


            

             
            </form>


          
            <form id="deletePetForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $pet_id; ?>" method="POST">
                <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete Pet</button>
                <a href="browse_pets.php">No, Go Back</a>
            </form>
            

          


            




            </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



    <?php
include('inc/footer.php');
?>
