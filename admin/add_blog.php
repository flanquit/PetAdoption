<?php
include('inc/head.php');
?>





       <!-- Begin Page Content -->
       <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Blogs</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> </a>
</div>

<!-- Content Row -->
<div class="row">




    <form action="<?php echo BASE_URL; ?>/functions/add_blog_process.php" method="post" enctype="multipart/form-data">
       <div class="row">
        <div class="col-6">
            <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        </div><br/>



       

     
        <textarea name="content" class="form-control" id="content" type="text" placeholder="Enter your content here..." style="height: 10rem" data-sb-validations="required" data-sb-can-submit="no"></textarea>
                                      
        <div class="invalid-feedback" data-sb-feedback="content:required">A content is required.    
                                      </div>


                                     
       



        </div>

     
    
    




        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <button type="submit" name="submit" class="btn btn-primary">Add Blog</button>
        
    </form>



  
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



    <?php
include('inc/footer.php');
?>
