<?php 
include('../inc/head.php');
?>



    <!-- Projects Section-->
    <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">User Registration</span></h1>
                       <a href="login.php"> <p>You Already have an account ? Login  </p></a>
                    </div>
                   
                       
                </div>


                <!-- Form start -->


                <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                        
            <form id="registrationForm" action="<?php echo BASE_URL; ?>/functions/register_process.php" method="POST" onsubmit="return validateRegistrationForm()">



                                   <!-- Usernames input-->
                                   <div class="form-floating mb-3">
                                        <input class="form-control" id="username" type="text" placeholder="username" data-sb-validations="required,username" data-sb-can-submit="no" name="username" required>
                                        <label for="username">Username</label>
                                        <div class="invalid-feedback" data-sb-feedback="username:required">A username is required.</div>
                                        <div class="invalid-feedback" data-sb-feedback="username:username">Username is not valid.</div>
                                    </div>


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
                                      <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit">Register</button></div>


    
           </form>
                                <a href="login.php"> <p>Login </p></a>
                            </div>
                            
                        </div>



                <!-- Form End -->

                
            </section>
            <!-- Call to action section-->
          
        </main>
        <!-- Footer-->
        <?php include('../inc/footer.php'); ?>
