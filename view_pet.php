<?php
// Include database connection and pet functions
include('inc/head.php');
include 'functions/db_connection.php';
include 'functions/pet_functions.php';

// Check if pet ID is provided in the URL
if (isset($_GET['id'])) {
    $pet_id = $_GET['id'];
    // Fetch pet details by ID
    $pet = getPetById($pet_id);
} else {
    // Redirect to browse pets page if no pet ID is provided
    header("Location: browse_pets.php");
    exit();
}
?>

            <!-- Projects Section-->
            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Adopt Your Pet</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Project Card 1-->      
                           
                          
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-5">
                                           
                                            <h2 class="fw-bolder"><?php echo $pet['name']; ?></h2>

                                           
                                            <strong>Species:</strong> <?php echo $pet['species']; ?><br/>

                                            <strong>Gender:</strong> <?php echo $pet['gender']; ?><br/>
                                            
                                           
                                               
                                               <strong>Breed:</strong> 
                                               <?php 
                                               echo $pet['breed']; 
                                               ?>
                                               <br/>
                                               <strong>Age:</strong> <?php echo $pet['age']; ?><br/>
                                               <hr>

                                               <strong>$:</strong> <?php echo $pet['adoption_fee']; ?><br/>
                                               <hr/>
                                               
                                         
                                           

                                            <p> <?php echo $pet['description']; ?></p>
                                        </div>
                                        <img class="img-fluid" src="<?php echo $pet['image_url']; ?>" alt="<?php echo $pet['name']; ?>" />
                                    </div>
                                </div>
                            </div>
                       

                        </div>




                    </div>
                </div>


                <!-- Form start -->


                <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                <form id="adoptionForm" action="functions/process_adoption.php" method="POST">
                                    
                                <input type="hidden" name="pet_id" value="<?php   echo htmlentities($_GET['id']); ?>">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" data-sb-can-submit="no" name="name" required>
                                        <label for="name">Full name</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" data-sb-can-submit="no" name="email" required>
                                        <label for="email">Email address</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                    </div>
                                    
                                     <!-- Address input-->
                                     <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your address..." data-sb-validations="required" data-sb-can-submit="no" name="address" required>
                                        <label for="address">Address</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Address is required.</div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" data-sb-can-submit="no" name="phone" required>
                                        <label for="phone">Phone number</label>
                                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea name="message" class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required" data-sb-can-submit="no"></textarea>
                                        <label for="message">Message</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br>
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit">Submit</button></div>
                                </form>
                            </div>
                        </div>



                <!-- Form End -->

                
            </section>
            <!-- Call to action section-->
            <section class="py-5 bg-gradient-primary-to-secondary text-white">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="display-4 fw-bolder mb-4">Adopt Your Pet </h2>
                        <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="contact.html">Contact Us</a>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php include('inc/footer.php'); ?>