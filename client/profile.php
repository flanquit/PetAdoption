<?php 

session_start();


// Get user details from Get URK
$email = $_GET['email'];
$user_id = $_GET['user_id'];

// After successful login
$_SESSION['user_id'] = $user_id; // Store user ID in session
$_SESSION['email'] = $email; // Store email in session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display error message
    header("Location: login.php");
}

// var_dump($user_id);

$email = $_GET['email'];
$user_id = $_GET['user_id'];


// Include authentication functions
include('../inc/head.php');
// Include database connection and pet functions
include '../functions/db_connection.php';
// include '../functions/user_functions.php';
include '../functions/auth.php';
// isLoggedIn();

// Get user ID (you need to get the user ID from the session or URL parameter)
// Get user details from URL parameters



// Get user information
$user = getUserById($user_id);
// var_dump($user);

?>
            <!-- Projects Section-->
            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">User Profile</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Project Card 1-->      
                           
                            <section>
                                <h2>Details</h2>
                                <p><strong>Name:</strong> <?php echo $user['username']; ?></p>
                                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                               
                              
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
                        <h2 class="display-4 fw-bolder mb-4">My Applications </h2>
                        <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="application_status.php?user_id=<?php echo $user['user_id']; ?>&email=<?php echo $user['email']; ?>">View All</a>
                        
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php include('../inc/footer.php'); ?>