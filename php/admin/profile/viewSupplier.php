<?php include '../header.php';

include '../../connect.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM supplier WHERE supplierID=$id");
    unset($_GET['delete']);

    echo "<script>alert('Record has been deleted');</script>";
}

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">


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
                                <h2 class="content-header-title float-left mb-0">Supplier Page</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Profile</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Supplier</a>
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
                                                <h4 class="mb-0">Supplier List</h4>
                                            </div>

                                        </div><br>
                                        <!-- table  starts-->
                                        <div class="content-header-center col-12">
                                             <div class="d-flex justify-content-between align-items-center mx-0 row" bis_skin_checked="1">

                                                <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                    <br>
                                                </div>
                                                <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                    <div class="dt-action-buttons text-right" bis_skin_checked="1"><a href="addSupplier.php"><button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
                                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    </svg>Add New Record</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="do_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Supplier Name</th>
                                                        <th scope="col">Contact Name</th>
                                                        <th scope="col">Contact No</th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    // include '../../connect.php';
                                                    $i = 1;
                                                    $sql    = "SELECT * FROM supplier";
                                                    $result = $conn->query($sql);

                                                    while ($row = $result->fetch_assoc()) {

                                                        $name     = $row['supplierName'];
                                                        $contactName = $row['contactName'];
                                                        $contactNo = $row['contactNo'];
                                                        $address = $row['address'];
                                                        

                                                        # code...


                                                        echo "
        <tr>
        <td>  " . $i++ . "</td>
        <td>  " . $name . "</td>
        <td>  " . $contactName . "</td>
        <td>  " . $contactNo . "</td>
        <td>  " . $address . "</td>
        <td>" . "<a  href='editSupplier.php?edit=".$row["supplierID"] . "'<span class='btn-sm btn-outline-primary waves-effect material-icons-outlined'></span> Edit</a>" . "
               <a  href='viewSupplier.php?delete=".$row["supplierID"] . "'<span class='btn-sm btn-danger waves-effect material-icons-outlined'></span> Delete</a>" . "
        </td>";

                                                        // <td>"."<a  href='product_view.php? ID=".$row["itemID "] ."'<span class='btn-sm btn-primary waves-effect material-icons-outlined'></span> View</a>"."</td>";

                                                        "</tr>";
                                                    }
                                                    echo "</table>"

                                                    ?>



                                        </div>
</div>
                                        <!-- table ends -->
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

<script>
    $(document).ready(function() {
        $('#do_table').DataTable({

            "bInfo": false,
            "order": [],
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5],
                "orderable": true,
            }, ],
        });

    });
</script>