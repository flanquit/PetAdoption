<?php
// Include authentication functions
include '../functions/auth.php';
include 'inc/head.php';
// Include database connection and adoption functions
include '../functions/db_connection.php';
include '../functions/adoption_functions.php';


// Restrict access to admin-only page
restrictToAdmin();



// Check if user is logged in and is an admin (you need to implement authentication and authorization)
// For demonstration purposes, let's assume the user is already authenticated and authorized as an admin

// Fetch all adoption applications
$applications = getAllAdoptionApplicationsWithPetNames();


// Process action buttons (approve, reject)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        // Handle approval logic (you need to implement this)
        // For demonstration purposes, let's assume the application is updated in the database
        $application_id = $_POST['application_id'];
        if (approveAdoptionApplication($application_id)) {
            echo '<div class="col-lg-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Application Approved
                    <div class="text-white-50 small">#1cc88a</div>
                </div>
            </div>
        </div>';

            
            // Redirect or refresh the page as needed
        } else {
              echo '<div class="col-lg-6 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Error Approving 
                    <div class="text-white-50 small">#1cc88a</div>
                </div>
            </div>
        </div>';
        }
    } elseif (isset($_POST['reject'])) {
        // Handle rejection logic (you need to implement this)
        // For demonstration purposes, let's assume the application is updated in the database
        $application_id = $_POST['application_id'];
        if (rejectAdoptionApplication($application_id)) {
            echo '<div class="col-lg-6 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Application Rejected Succesfully
                    <div class="text-white-50 small">#1cc88a</div>
                </div>
            </div>
        </div>';
        } else {
            echo '<div class="col-lg-6 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Error Rejecting 
                    <div class="text-white-50 small">#1cc88a</div>
                </div>
            </div>
        </div>';
        }
    }
}
?>


<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manage Applications</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Applications</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 191.883px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 290.883px;" aria-label="Position: activate to sort column ascending">Address</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 138.883px;" aria-label="Office: activate to sort column ascending">Phone</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 64.8833px;" aria-label="Age: activate to sort column ascending">Email</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 130.883px;" aria-label="Start date: activate to sort column ascending">Status</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 117.883px;" aria-label="Salary: activate to sort column ascending">Pet Name</th>

                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 117.883px;" aria-label="Salary: activate to sort column ascending"> Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Phone</th><th rowspan="1" colspan="1">Address</th><th rowspan="1" colspan="1">Status</th><th rowspan="1" colspan="1">Pet Name</th>
                    <th rowspan="1" colspan="1">Action</th>
                </tr>
                </tfoot>
                <tbody>


                



                <?php foreach ($applications as $application): ?>
                <tr  class="odd">
                    <td  class="sorting_1"><?php echo $application['name']; ?></td>
                    <td><?php echo $application['address']; ?></td>
                    <td><?php echo $application['phone']; ?></td>
                    <td><?php echo $application['email']; ?></td>
                    <?php
                    if ($application['status'] == 'approved') {
                            ?> <td class="alert-success">Approved</td><?php
                            } 
                            elseif($application['status'] == 'pending') {
                                ?> <td class="alert-warning">Pending</td><?php
                            } 
                            elseif($application['status'] == 'rejected') {
                                ?> <td class="alert-danger">Rejected</td><?php
                        }
                       ?>     
                   
                    <td><?php echo $application['pet_name']; ?></td>
                    <td>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="application_id" value="<?php echo $application['id']; ?>">
                            <?php



                            ?>
                            <button type="submit" name="approve">Approve</button>
                            <button type="submit" name="reject">Reject</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
              




                    
                    
                    
                    
    
                </tbody>
            </table>
        
        </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
        </div>
    </div>
</div>

</div>


 <?php include 'inc/footer.php';






















