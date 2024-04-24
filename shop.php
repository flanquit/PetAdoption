<?php

session_start();
include 'inc/head.php';
include 'functions/shop_process.php';

$products = fetchProducts();

// Define pet food products


// Check if an product is added to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    
    // Check if the product is already in the cart
    if (!isset($_SESSION['cart_products'])) {
        $_SESSION['cart_products'] = [];
    }
    
    $product_found = false;
    foreach ($_SESSION['cart_products'] as $product) {
        if ($product['id'] == $product_id) {
            $product_found = true;
            break;
        }
    }
    
    // If the product is not in the cart, add it
    if (!$product_found) {
        foreach ($products as $product) {
            if ($product['id'] == $product_id) {
                $_SESSION['cart_products'][] = $product;
                break;
            }
        }
    }
}

// Calculate total price of products in the cart
$total_price = 0;
if (isset($_SESSION['cart_products'])) {
    foreach ($_SESSION['cart_products'] as $product) {
        $total_price += $product['price'];
    }
}


// Clear cart items
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart_products']);
}

?>

<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">LIttle Haven Shop</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Buy Something Special for your Pet</p>

<hr/>
                    
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button type="submit" name="clear_cart" class="btn btn-danger">Clear Cart</button>
            </form>




       
                </div>
                
            </div>
        </header>

        



        <div class="container px-4 px-lg-5 mt-5">


               
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


                <?php foreach ($products as $product): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"> <?php echo $product['category']; ?></div>
                            <!-- Product image-->
                            <!-- https://dummyimage.com/450x300/dee2e6/6c757d.jpg -->

                            
                            <img class="card-img-top" src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $product['name']; ?></h5>
                                    <!-- Product reviews-->
                                   
                                    <!-- Product price-->
                                   
                                    $<?php echo $product['price']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">

                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="submit" name="add_to_cart" value="Add to Cart"  class="btn btn-outline-dark mt-auto">
                                </form>
                                                
                               
                            
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

             
               
                
                </div>





            </div>


            <?php include('inc/footer.php'); ?>




