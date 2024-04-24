<?php
session_start();

include 'inc/head.php';

// Retrieve cart products from session
$cart_products = isset($_SESSION['cart_products']) ? $_SESSION['cart_products'] : [];

// Calculate total price
$total_price = 0;
foreach ($cart_products as $product) {
    $total_price += $product['price'];
}
?>


            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Checkout Pay Online</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Project Card 1-->      
                           
                        


                                     

                            <ul>
                <?php foreach ($cart_products as $product): ?>
                <li> <h5  class="text-left mb-5"><?php echo $product['name']; ?> - $<?php echo $product['price']; ?></h5></li>
                <?php endforeach; ?>
            </ul>
            <h1  class="text-left mb-5">Total Price: $<?php echo $total_price; ?></h1>
            <form method="post" action="https://www.paynow.co.zw/payment/link/customer@gmail.com?q=c2VhcmNoPWNvbXBhbnlAZ21haWwuY29tJmFtb3VudD0xMi41MCZyZWZlcmVuY2U9QUJDMTIzJmw9MQ%3D%3D">
                <!-- Add user details fields here (e.g., name, address, etc.) -->
                <button type="submit" name="place_order" class="btn btn-success ">Pay Online </button>
            </form>
                                    

                        </div>
                    </div>
                </div>
            </section>
            <!-- Call to action section-->
            <section class="py-5 bg-gradient-primary-to-secondary text-white">
                <div class="container px-5 my-5">
                  
                </div>
            </section>
        </main>








<?php
include 'inc/footer.php';
?>