<?php

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display error message
    header("Location: login.php");
}



include('../inc/head.php');
// Include database connection and adoption functions
include '../functions/db_connection.php';
include '../functions/user_functions.php';
include '../functions/adoption_functions.php'; // You need to create this file with adoption-related functions

// Check if user is logged in (you need to implement authentication)
// For demonstration purposes, let's assume the user is already authenticated

// Get user ID (you need to get the user ID from the session or URL parameter)
$email = $_GET['email'];
$user_id = $_GET['user_id'];


// Get user's adoption applications
$applications = getAdoptionApplicationsByEmail($email);
?>
            <!-- Projects Section-->
            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">My Applications</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Project Card 1-->      
                           
                            <section>
                                <h2>Details</h2>
                                <table class="table">       
                                    <th>Username</th>   
                                    <th>Email</th>   
                                    <th>Status</th>         
                                    
                                <?php foreach ($applications as $application): ?>
                                    <tr>
                    <td><?php echo $application['name']; ?></td>
                    <td><?php echo $application['email']; ?></td>
                  

                <?php


                    if ($application['status'] == 'approved') {
                        ?> <td style="color:green">Approved</td><?php
                        } 
                        elseif($application['status'] == 'pending') {
                            ?> <td style="color:orange">Pending</td><?php
                        } 
                        elseif($application['status'] == 'rejected') {
                            ?> <td style="color:red">Rejected</td><?php
                    }


                    ?>



                </tr>
                <?php endforeach; ?>
                </table>

                              
                                <!-- Add other personal details as needed -->
                            </section>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Call to action section-->
            <section class="py-5 bg-gradient-primary-to-secondary text-white">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="display-4 fw-bolder mb-4">My Profile </h2>
                        <?php

                        if ($email == NULL) {
                           echo('null');
                        }else{

                            ?>

                        <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="profile.php?user_id=<?php echo($user_id) ?>&email=<?php echo($email) ?>">View All</a>

                        <?php

                        }

                        ?>
                       
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php include('../inc/footer.php'); ?>







