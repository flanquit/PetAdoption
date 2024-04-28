<?php
include('inc/head.php');
?>

      <!-- Begin Page Content -->
      <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Products</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> </a>
</div>


<!-- Content Row -->
<div class="row">


    <form action="<?php echo BASE_URL; ?>/functions/add_product_process.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">  
    <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        </div>

          <div class="col-6">  
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br><br>
          </div>
    </div>
        
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <button type="submit" name="submit">Add Product</button>
    </form>



      
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



    <?php
include('inc/footer.php');
?>
