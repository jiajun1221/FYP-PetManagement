<?php include '../header.php'; 

include '../../connect.php';


    
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connect,"DELETE FROM category WHERE categoryID=$id");
    unset($_GET['delete']);
    }

    if (isset($_POST['submit'])) {
        $categoryID = $_POST['categoryID'];
        $categoryName = $_POST['categoryName'];
        mysqli_query($connect, "INSERT INTO category(categoryID,categoryName) VALUES('$categoryID','$categoryName')");   
    }
    
    $result = mysqli_query($connect, "SELECT * FROM category")
or die($mysqli->error);


//pre_r($result);
//pre_r($result->fetch_assoc());

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>

<!-- BEGIN: Content-->
<div class="app-content content " bis_skin_checked="1">
    <div class="content-overlay" bis_skin_checked="1"></div>
    <div class="header-navbar-shadow" bis_skin_checked="1"></div>
    <div class="content-wrapper" bis_skin_checked="1">
        <div class="content-body" bis_skin_checked="1">
            <!-- Basic Horizontal form layout section start -->
            <div class="content-wrapper" bis_skin_checked="1">
                <div class="content-header row" bis_skin_checked="1">
                    <div class="content-header-left col-md-9 col-12 mb-2" bis_skin_checked="1">
                        <div class="row breadcrumbs-top" bis_skin_checked="1">
                            <div class="col-12" bis_skin_checked="1">
                                <h2 class="content-header-title float-left mb-0">Category Page</h2>
                                <div class="breadcrumb-wrapper" bis_skin_checked="1">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>

                                        <li class="breadcrumb-item active">Category</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-12" bis_skin_checked="1">
                            <p>Read full documentation <a href="https://datatables.net/" target="_blank">here</a></p>
                        </div>
                    </div>
                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-12" bis_skin_checked="1">
                                <div class="card" bis_skin_checked="1">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1">
                                        <div class="card-header border-bottom p-1" bis_skin_checked="1">
                                            <div class="head-label" bis_skin_checked="1">
                                                <h6 class="mb-0">Category List</h6>
                                            </div>
                                            <div class="dt-action-buttons text-right" bis_skin_checked="1">
                                                <div class="dt-buttons d-inline-flex" bis_skin_checked="1"> <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle mr-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share font-small-4 mr-50">
                                                                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                                <polyline points="16 6 12 2 8 6"></polyline>
                                                                <line x1="12" y1="2" x2="12" y2="15"></line>
                                                            </svg>Export</span></button> <a href="#basic-horizontal-layouts"><button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>Add New Record</span></button> </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mx-0 row" bis_skin_checked="1">
                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                <div class="dataTables_length" id="DataTables_Table_0_length" bis_skin_checked="1"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select form-control">
                                                            <option value="7">7</option>
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="75">75</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label>Search:<input type="search" class="form-control " placeholder="" aria-controls="DataTables_Table_0"></label></div>
                                            </div>
                                        </div>
                                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column ascending">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 184px;" aria-label="Email: activate to sort column ascending">Name</th>



                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 90px;" aria-label="Status: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($row = $result->fetch_assoc()) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['categoryID']; ?></td>
                                                        <td><?php echo $row['categoryName']; ?></td>                                                    
                                                        <td>
                                                            <a href="category.php?delete=<?php echo $row['categoryID'];?>">
                                                            <button class="btn-outline-secondary">Delete</button></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endwhile; ?>
                                                </tr>

                                            </tbody>

                                        </table>

                                        <div class="d-flex justify-content-between mx-0 row" bis_skin_checked="1">

                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">

                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" bis_skin_checked="1">Showing 0 to 0 of 0 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate" bis_skin_checked="1">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">&nbsp;</a></li>
                                                        <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">&nbsp;</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <section id="basic-horizontal-layouts">
                <div class="row" bis_skin_checked="1">
                    <div class="content-header-left col-md-9 col-12 mb-2" bis_skin_checked="1">
                        <div class="card" bis_skin_checked="1">
                            <div class="card-header" bis_skin_checked="1">
                                <h4 class="card-title">Add Category</h4>
                            </div>
                            <div class="card-body" bis_skin_checked="1">
                                <form class="form form-horizontal" method="POST">
                                    <div class="row" bis_skin_checked="1">                                    
                                        <div class="col-12" bis_skin_checked="1">
                                            <div class="form-group row" bis_skin_checked="1">
                                                <div class="col-sm-3 col-form-label" bis_skin_checked="1">
                                                    <label for="categoryName">Category Name</label>
                                                </div>
                                                <div class="col-sm-9" bis_skin_checked="1">
                                                    <input type="text" id="productName" class="form-control" name="categoryName">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-3" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3" bis_skin_checked="1">
                                            <button name="submit" class="btn btn-primary mr-1" style="float:right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

</html>