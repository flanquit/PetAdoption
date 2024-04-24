<?php
  define('BASE_URL', 'http://localhost/petadoption');
  $base_url = 'http://localhost/petadoption';
//   include ('functions/db_connection.php');
  
  if (isset($_GET['user_id'])) {
   // Get user details from Get URK
    $email = $_GET['email'];
    $user_id = $_GET['user_id'];
    }else{

        $email = NULL;
        $user_id = NULL;

    }

   // Calculate total price of products in the cart
$total_price = 0;
if (isset($_SESSION['cart_products'])) {
    foreach ($_SESSION['cart_products'] as $product) {
        $total_price += $product['price'];
    }
}

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Little Haven System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
      

        <link href="<?php echo BASE_URL; ?>/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="<?php echo BASE_URL; ?>/index.php"><span class="fw-bolder text-primary">LITTLE HAVEN</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/browse_pets.php">Furry Friend</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/shop.php">Shop</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/blog.php">Blog</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/contact.php">Contact</a></li> -->




                
                            <li  class="nav-item">
                          
                               <a href="checkout.php"> 
                                <button class="btn btn-outline-dark">
                                    <i class="bi-cart-fill me-1"></i>
                                    Cart

                                    <?php if (isset($_SESSION['cart_products']) && count($_SESSION['cart_products']) > 0): ?>


                                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $total_price; ?></span>

                                    <?php endif; ?>
                                </button>
                               </a>


                               

      



                          
                            </li>




                            
                            <li class="nav-item"><a class="nav-link" href="#">
                                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                        <!-- <a class="btn btn-primary btn-lg px-3 py-3 me-sm-3 fs-6 fw-bolder" href="<?php echo BASE_URL; ?>/client/profile.php ?user_id=<?php echo $user['user_id']; ?>&email=<?php echo $user['email']; ?>">User Portal</a> -->


                                        <?php

                                            if ($email == NULL) {
                                                ?>

                                                <a class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-bolder" href="client/profile.php">Login </a>
    
                                                <?php
                                            }else{

                                                ?>

                                            <a class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-bolder" href="profile.php?user_id=<?php echo($user_id) ?>&email=<?php echo($email) ?>">Profile</a>

                                            <?php

                                            }

                                            ?>
                                            

                                       
                                     
                                    </div>
                            </a></li>
                               
                           
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->