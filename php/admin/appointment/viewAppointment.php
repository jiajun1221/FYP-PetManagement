<?php

include('../header.php');
$connect = mysqli_connect("localhost", "root", "", "riken") or die(mysqli_error($mysqli));
include('../../connect.php');

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM `order` WHERE orderID=$id");
    unset($_GET['delete']);

    $_SESSION['message'] = "Record has been Deleted";
    $_SESSION['msg_type'] = "danger";
}

$result = mysqli_query($connect, "SELECT * FROM `order`")
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
                                <h2 class="content-header-title float-left mb-0">Appointment</h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body" bis_skin_checked="1">
                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-12" bis_skin_checked="1">
                                <div class="card" bis_skin_checked="1">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1">
                                        <div class="card-header border-bottom p-1" bis_skin_checked="1">
                                            <div class="head-label" bis_skin_checked="1">
                                                <h4 class="mb-0">Appointments List</h4>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mx-0 row" bis_skin_checked="1">

                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label> 
                                                <a><i class="searchicon" data-feather="search"></i></a></li></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                <div class="dt-action-buttons text-right" bis_skin_checked="1"><a href="addAppointment.php"><button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                </svg>Add New Record</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 114px;" aria-label="Name: activate to sort column ascending">Service ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;" aria-label="Email: activate to sort column ascending">Customer ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;" aria-label="Date: activate to sort column ascending">Purchase Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;" aria-label="Salary: activate to sort column ascending">Service Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;" aria-label="Status: activate to sort column ascending">Install Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;" aria-label="Status: activate to sort column ascending">totalPrice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;" aria-label="Status: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($user_info = $result->fetch_assoc()) : {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $user_info['orderID']; ?></td>
                                                            <td><?php echo $user_info['userID']; ?></td>
                                                            <td><?php echo $user_info['purchaseDate']; ?></td>
                                                            <td><?php echo $user_info['serviceDate']; ?></td>
                                                            <td><?php echo $user_info['installDate']; ?></td>
                                                            <td><?php echo $user_info['totalPrice']; ?></td>
                                                            <td><a href="editOrder.php?edit=<?php echo $row['orderID']; ?>">
                                                                    <button class="btn-primary">Edit</button></a>
                                                                <a href="viewOrder.php?delete=<?php echo $row['orderID']; ?>">
                                                                    <button class="btn-outline-secondary">Delete</button></a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                endwhile; ?>
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