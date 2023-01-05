<?php include '../header.php';

include '../../connect.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM inventory WHERE itemID=$id");
    unset($_GET['delete']);

   echo "<script>alert('Record has been deleted');</script>";
}


$result = mysqli_query($conn, "SELECT * FROM inventory")
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
                                <h2 class="content-header-title float-left mb-0">Inventory Page</h2>
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
                                                <div class="dt-action-buttons text-right" bis_skin_checked="1"><a href="updateInventory.php"><button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span> <i data-feather='database'></i>
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                Update Inventory</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80px;">Item ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;">Item Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;">Item Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80px;">Quantity</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;">Expiry Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;">sellingprice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;">Unit Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($user_info = $result->fetch_assoc()) :
                                                    $categoryID = $user_info['itemType'];
                                                    $result2 = mysqli_query($conn, "SELECT * FROM category WHERE categoryID ='$categoryID'");
                                                ?>
                                                    <tr>
                                                        <td><?php echo $user_info['itemID']; ?></td>
                                                        <td><?php echo $user_info['itemName']; ?></td>
                                                        <td><?php while ($user_info2 = $result2->fetch_assoc()) {
                                                                echo $user_info2['categoryName'];
                                                            } ?></td>
                                                        <td><?php echo $user_info['quantity']; ?></td>
                                                        <td><?php echo $user_info['expiryDate']; ?></td>
                                                        <td><?php echo $user_info['sellingprice']; ?></td>
                                                        <td><?php echo $user_info['unitprice']; ?></td>


                                                    </tr>
                                                <?php
                                                endwhile; ?>
                                            </tbody>

                                        </table>

                                        <div class="d-flex justify-content-between mx-0 row">

                                            <div class="col-sm-12 col-md-6">


                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">

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

</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

</html>