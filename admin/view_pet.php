<?php
// Include authentication functions
include '../functions/auth.php';
include 'inc/head.php';
// Include database connection and adoption functions
include '../functions/db_connection.php';
// Restrict access to admin-only page
restrictToAdmin();

include '../functions/pet_functions.php';
// Fetch all pets from the database
$pets = getAllPets();

?>


<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Pets</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Pets</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 191.883px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">name</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 290.883px;" aria-label="Position: activate to sort column ascending">breed</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 138.883px;" aria-label="Office: activate to sort column ascending">color</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 64.8833px;" aria-label="Age: activate to sort column ascending">gender</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 130.883px;" aria-label="Start date: activate to sort column ascending">species</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 117.883px;" aria-label="Salary: activate to sort column ascending"> age</th>

                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 117.883px;" aria-label="Salary: activate to sort column ascending"> adoption_fee</th>


                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 117.883px;" aria-label="Salary: activate to sort column ascending"> Status</th>

                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 117.883px;" aria-label="Salary: activate to sort column ascending"> Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Breed</th><th rowspan="1" colspan="1">Color</th><th rowspan="1" colspan="1">Gender</th><th rowspan="1" colspan="1">Species</th><th rowspan="1" colspan="1">Age</th>
                    <th rowspan="1" colspan="1">adoption_fee</th>
                    <th rowspan="1" colspan="1">status</th>
                    <th rowspan="1" colspan="1">ACTION</th>
                </tr>
                </tfoot>
                <tbody>


                



                <?php foreach ($pets as $pet): ?>
                <tr  class="odd">
                    <td  class="sorting_1"><?php echo $pet['name']; ?></td>
                    <td><?php echo $pet['breed']; ?></td>
                    <td><?php echo $pet['color']; ?></td>
                    <td><?php echo $pet['gender']; ?></td>
                    <td><?php echo $pet['species']; ?></td>
                    <td><?php echo $pet['age']; ?></td>
                    <td><?php echo $pet['adoption_fee']; ?></td>
                    <?php
                    if ($pet['available'] == '1') {
                            ?> <td class="alert-success">Available</td><?php
                            } 
                            else {
                                ?> <td class="alert-danger">Not Available</td><?php
                    } 
                          
                       ?>     
                  
                 
                    <td><a href="../admin/update_pet.php?id=<?php echo $pet['pet_id']; ?>">edit</a></td>
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






















