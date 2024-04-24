<?php 

include('inc/head.php');
// Include database connection and pet functions
include 'functions/db_connection.php';
include 'functions/pet_functions.php';
// Fetch all pets from the database
$pets = getAllPets();

?>
            <!-- Projects Section-->
            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Pets Available for Adoption</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Project Card 1-->      
                           
                            <?php foreach ($pets as $pet) : ?>
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-5">


                                     

                                      <?php 

                                      if ($pet['available'] == 1 ) {
                                      ?> <alert style="color:green">Available</alert>
                                      <?php
                                      } else {
                                        ?> <alert style="color:red">Not Available</alert>
                                          <?php
                                      }
                                      
                                      
                                      ?>
                                           
                                            <h2 class="fw-bolder"><?php echo $pet['name']; ?></h2>

                                           
                                            <strong>Species:</strong> <?php echo $pet['species']; ?><br/>
                                            <strong>Gender:</strong> <?php echo $pet['gender']; ?><br/>
                                            gender
                                               <!-- <strong>Breed:</strong>  -->
                                               <?php 
                                            //    echo $pet['breed']; 
                                               ?>
                                               <!-- <br/> -->
                                               <strong>Age:</strong> <?php echo $pet['age']; ?><br/><br/>

                                              

                                               <?php 

                                                if ($pet['available'] == 1 ) {
                                                ?> <a href="view_pet.php?id=<?php  echo ($pet['pet_id']); ?>"> 
                                                <button class="btn btn-primary">View Details</button></a>
                                                <?php
                                                } else {
                                                ?> <a href="#"> 
                                                <button class="btn btn-primary" disabled>View Details</button></a>
                                                    <?php
                                                }


                                                ?>
                                               
                                              
                                           

                                            <!-- <p> <?php echo $pet['description']; ?></p> -->
                                        </div>
                                        <img class="img-fluid" src="<?php echo $pet['image_url']; ?>" alt="<?php echo $pet['name']; ?>" />
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
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