<?php include '../header.php';

include '../../connect.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM product WHERE productID=$id");
    unset($_GET['delete']);

    $_SESSION['message'] = "Record has been Deleted";
    $_SESSION['msg_type'] = "danger";
}


$result = mysqli_query($connect, "SELECT * FROM product")
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
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Product Page</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Inventory</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Product</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="card-header border-bottom p-1" bis_skin_checked="1">
                                            <div class="head-label" bis_skin_checked="1">
                                                <h4 class="mb-0">Products List</h4>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mx-0 row" bis_skin_checked="1">

                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label>
                                                    <a><i class="searchicon" data-feather="search"></i></a></li>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                <div class="dt-action-buttons text-right" bis_skin_checked="1"><a href="addService.php"><button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
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
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 114px;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;">Category</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;">price</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;">quantity</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) :
                                                    $categoryID = $row['productType'];
                                                    $result2 = mysqli_query($connect, "SELECT * FROM category WHERE categoryID ='$categoryID'");
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['productID']; ?></td>
                                                        <td><?php echo $row['productName']; ?></td>
                                                        <td><?php while ($row2 = $result2->fetch_assoc()) {
                                                                echo $row2['categoryName'];
                                                            } ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <td><?php echo $row['quantity']; ?></td>
                                                        <td><a href="editProduct.php?edit=<?php echo $row['productID']; ?>">
                                                                <button class="btn-primary">Edit</button></a>
                                                            <a href="viewProduct.php?delete=<?php echo $row['productID']; ?>">
                                                                <button class="btn-outline-secondary">Delete</button></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endwhile; ?>
                                            </tbody>

                                        </table>

                                        <div class="d-flex justify-content-between mx-0 row">

                                            <div class="col-sm-12 col-md-6">

                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
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