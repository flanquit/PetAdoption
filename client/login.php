<?php 

include('../inc/head.php');
?>
    <!-- Projects Section-->
    <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Log In</span></h1>
                       <a href="register.php"> <p>You Dont have an account ? Register Now </p></a>
                    </div>
                   
                       
                </div>


                <!-- Form start -->


                <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                        
                            <form id="loginForm" action="<?php echo BASE_URL; ?>/functions/login_process.php" method="POST" onsubmit="return validateLoginForm()">

                           
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" data-sb-can-submit="no" name="email" required>
                                        <label for="email">Email </label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                    </div>
                                    
                                     <!-- password input-->
                                     <div class="form-floating mb-3">
                                        <input class="form-control" id="password" type="password" placeholder="Enter your password..." data-sb-validations="required" data-sb-can-submit="no" name="password" required>
                                        <label for="password">Password</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">password is required.</div>
                                    </div>
                                   
                         
                        
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit">Login</button></div>
                                </form>
                                <a href="register.php"> <p>Create New Account </p></a>
                            </div>
                            
                        </div>



                <!-- Form End -->

                
            </section>
            <!-- Call to action section-->
          
        </main>
        <!-- Footer-->
        <?php include('../inc/footer.php'); ?>






