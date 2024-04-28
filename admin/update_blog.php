<?php
// Include database connection and pet functions
include 'inc/head.php';
include '../functions/db_connection.php';
// include '../functions/blog_functions.php';


// Check if blog ID is provided
if (!isset($_GET['id'])) {
    echo "Blog ID not provided.";
    exit();
}

// Retrieve blog post details from database
$id = $_GET['id'];
$sql = "SELECT * FROM blogs WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $content = $row['content'];
    $image = $row['image'];
} else {
    echo "Blog post not found.";
    exit();
}

// Update blog post if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Escape user inputs to prevent SQL injection
    $new_title = $conn->real_escape_string($_POST['title']);
    $new_content = $conn->real_escape_string($_POST['content']);

    // Check if new image is uploaded
    if ($_FILES['image']['size'] > 0) {
        $target_dir = "../functions/uploads/blogs/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Update blog post with new image
            $sql = "UPDATE blogs SET title='$new_title', content='$new_content', image_url='$target_file' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Blog post updated successfully.";
                // Redirect to view updated blog post
                header("Location: view_blog.php?id=$id");
                exit();
            } else {
                echo "Error updating blog post: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Update blog post without changing image
        $sql = "UPDATE blogs SET title='$new_title', content='$new_content' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Blog post updated successfully.";
            // Redirect to view updated blog post
            header("Location: view_blog.php?id=$id");
            exit();
        } else {
            echo "Error updating blog post: " . $conn->error;
        }
    }
}


?>
       <!-- Begin Page Content -->
       <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update details for <?php echo $title ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> </a>
</div>

<!-- Content Row -->
<div class="row">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post" enctype="multipart/form-data">
     
         
        <div class="row">
            
            <div class="col-6">
            <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required><?php echo $content; ?></textarea><br><br>


        <label for="image">Image:</label><br>
        <img src="../functions/uploads/blogs<?php echo $image; ?>" alt="Current Image"><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        
        

            </div>

            </div>
 
                <button type="submit" class="btn btn-primary">Update Blog Details</button>

            </form>

            </div>

            <br/>
            <!-- <form id="deleteBlogForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$id; ?>" method="POST">
                <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete Blog</button>
                <a href="view_blogs.php">No, Go Back</a>
            </form>
             -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

    <?php
include('inc/footer.php');
?>
