<?php
include('inc/head.php');
?>





       <!-- Begin Page Content -->
       <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Pet</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> </a>
</div>

<!-- Content Row -->
<div class="row">


    <form action="<?php echo BASE_URL; ?>/functions/add_pet_process.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="species">Species:</label><br>
        <input type="text" id="species" name="species" required><br><br>
        
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" min="0" required><br><br>
        
        <label for="color">Color:</label><br>
        <input type="text" id="color" name="color"><br><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <button type="submit" name="submit">Add Pet</button>
    </form>



  
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



    <?php
include('inc/footer.php');
?>
