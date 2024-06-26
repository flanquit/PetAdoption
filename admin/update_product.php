<?php
// Include database connection and product functions
include 'inc/head.php';
include '../functions/db_connection.php';
include '../functions/products_functions.php';

// Check if product ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch product details by ID
    $product = getProductById($id);
} else {
    // Redirect to browse products page if no product ID is provided
   echo ('<h1 style="color:red">Deleted Product</h1>');
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    // Update product details
    if (updateProduct($id, $name, $category, $price)) {
        echo "<h1>product details updated successfully.</h1>";
    } else {
        echo "Error updating product details.";
    }
}


// Check if form is submitted (to confirm product deletion)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    // Delete the product
    if (deleteProduct($id)) {
        // Redirect to browse products page after successful deletion
        header("Location: admin/view_product.php");
        exit();
    } else {
        echo "Error deleting product.";
    }
}
?>


       <!-- Begin Page Content -->
       <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update details for <?php echo $product['name']; ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> </a>
</div>

<!-- Content Row -->
<div class="row">


      
            <form id="updateproductForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="POST">

            
        <div class="row">
            
            <div class="col-6">
            <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" ><br>
            </div>
    
            <div class="col-6">
            <label for="species">Category:</label><br>
                <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>" ><br>
            </div>
    
            </div>


            
        <div class="row">
            
            <div class="col-6">
            <label for="breed">Price:</label><br>
                <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br>
            </div>
    
          
    
            </div>



    
               
               <br/>
                

               
                
               
                <button type="submit" class="btn btn-primary">Update product Details</button>


            

             
            </form>


          
            
            

          


            




            </div>

            <br/>

            <form id="deleteproductForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="POST">
                <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete product</button>
                <a href="view_products.php">No, Go Back</a>
            </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



    <?php
include('inc/footer.php');
?>
