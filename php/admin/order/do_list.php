<?php include '../header.php';

include 'connect.php';

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     mysqli_query($connect, "DELETE FROM inventory WHERE itemID=$id");
//     unset($_GET['delete']);

//     $_SESSION['message'] = "Record has been Deleted";
//     $_SESSION['msg_type'] = "danger";
// }


// $result = mysqli_query($connect, "SELECT * FROM inventory")
//     or die($mysqli->error);


//pre_r($result);
//pre_r($result->fetch_assoc());

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
                                <h2 class="content-header-title float-left mb-0">Delivery Order</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Inventory</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Delivery Order</a>
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
                                                <h4 class="mb-0">Delivery Order List</h4>
                                            </div>
                                        </div><br>
                                        <div class="content-header-center col-12">
                                            <div class="d-flex justify-content-between align-items-center mx-0 row" bis_skin_checked="1">

                                                <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                    <br>
                                                </div>
                                                <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                    <div class="dt-action-buttons text-right" bis_skin_checked="1"><a href="addDO.php"><button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
                                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    </svg>Create Delivery Order</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-bordered" id="do_table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>
                                                        <th width="1%">
                                                            PO Number
                                                        </th>
                                                        <th>
                                                            Supplier
                                                        </th>
                                                        <th>
                                                            PO date
                                                        </th>
                                                        <th>
                                                            Status
                                                        </th>
                                                        <th width="15%">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $i = 0;
                                                    //  include 'connect.php';

                                                    $sql = "SELECT * FROM `delivery_order` WHERE `status` = 1 ORDER BY `delivery_order`.`ID` DESC";
                                                    //  $quantity = "SELECT COUNT(`product`) AS total FROM `delivery_order_detail` WHERE `DID`";
                                                    $result = $conn->query($sql);
                                                    //  $result1 = $conn->query($quantity);
                                                    //  $row1 = $result1 -> fetch_array(MYSQLI_ASSOC);
                                                    // 	$a = $row1;
                                                    while ($row = $result->fetch_assoc()) {

                                                        echo "<tr>
								 	<td>" . ++$i . "</td>
								 	<td>" . $row["ID"] . "</td>
								 	<td>" . $row["supplier"] . "</td>
									<td>" . date("d/m/Y", strtotime($row["do_date"])) . "</td>
									<td>";
                                                        if ($row["status"] == 0) {
                                                    ?><span class="badge badge-pill badge-secondary mr-1">Processing</span> <?php
                                                                                                                    } elseif ($row["status"] == 1) {
                                                                                                                        ?><span class="badge badge-pill badge-info mr-1">Preparing</span> <?php
                                                                                                                                                                                                } elseif ($row["status"] == 2) {
                                                                                                                                                                                                    ?><span class="badge badge-pill badge-success mr-1">Completed</span> <?php
                                                                                                                                                                                                    # code...
                                                                                                                                                                                                }
                                                                                                                                                                                                echo "</td>
									<td><a class='text-white btn btn-primary' style='text-decoration: none;' href='view_do.php?ID=" . $row["ID"] . "'>View</a>
									</td>";
                                                                                                                                                                                                echo "</tr>";
                                                                                                                                                                                                # code...
                                                                                                                                                                                            }
                                                                                                                                                                                            echo "</table>";
                                                                                                                                                                                                    ?>
                                                </tbody>



                                                <div class="d-flex justify-content-between mx-0 row">
                                                    <br>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                            <ul class="pagination">

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </table>
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
                "targets": [0, 2, 3, 4, 5],
                "orderable": false,
            }, ],
        });

    });
</script>