<?php
// Include database connection and pet functions
include 'inc/head.php';
include '../functions/db_connection.php';
include '../functions/blog_functions.php';

// Check if pet ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch pet details by ID
    $blog = getBlogById($id);
} else {
    // Redirect to browse pets page if no pet ID is provided
   echo ('<h1 style="color:red">Deleted Blog</h1>');
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update pet details
    if (updateBlog($id, $title, $content)) {
        echo "<h1>Blog details updated successfully.</h1>";
    } else {
        echo "Error updating Blog details.";
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
    <h1 class="h3 mb-0 text-gray-800">Update details for <?php echo $blog['title']; ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> </a>
</div>

<!-- Content Row -->
<div class="row">


      
            <form id="updateBlogForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="POST">

            
        <div class="row">
            
            <div class="col-6">
            <label for="name">Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $blog['title']; ?>" required><br>



                <label for="Content">Content:</label><br>
                <textarea id="content" name="content" rows="10" required><?php echo $blog['content']; ?></textarea><br><br>

            </div>

       
    
           
            </div>


   



   
    
        
        


               
               
                

               
                
               
                <button type="submit" class="btn btn-primary">Update Blog Details</button>


            

             
            </form>


          
          

          


            




            </div>

            <br/>
            <form id="deleteBlogForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="POST">
                <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete Blog</button>
                <a href="view_blogs.php">No, Go Back</a>
            </form>
            

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->





    <?php
include('inc/footer.php');
?>
