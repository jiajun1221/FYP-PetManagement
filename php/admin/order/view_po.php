<?php include '../header.php';

include '../../connect.php';

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     mysqli_query($conn, "DELETE FROM inventory WHERE itemID=$id");
//     unset($_GET['delete']);

//     $_SESSION['message'] = "Record has been Deleted";
//     $_SESSION['msg_type'] = "danger";
// }


// $result = mysqli_query($conn, "SELECT * FROM inventory")
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
                                        <div class="card-header     border-bottom p-1" bis_skin_checked="1">
                                            <div class="head-label" bis_skin_checked="1">
                                                <h4 class="mb-0">Products List</h4>
                                            </div>

                                        </div><br>


                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Purchase Order Number
                                                    </th>
                                                    <th>
                                                        Purchase Order Date
                                                    </th>
                                                    <th>
                                                        Supplier
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>
                                                        Grand Total
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include '../../connect.php';
                                                if (isset($_GET['ID'])) {
                                                    $ID = (int)$_GET['ID'];

                                                    $sql = "SELECT * FROM purchase_order WHERE ID=" . $ID;
                                                    $result = $conn->query($sql);

                                                    while ($row = $result->fetch_assoc()) {
                                                        $po_ID = $row['ID'];
                                                        $po_date = date("d/m/Y", strtotime($row["po_date"]));
                                                        $supplier = $row['supplier'];
                                                        // $status = $row['status']; 
                                                        $grand_total = $row['total'];

                                                        if ($row['status'] == 2) {
                                                            $stat = "Paid";
                                                            # code...
                                                        } else {
                                                            $stat = "Pending payment";
                                                            # code...
                                                        }
                                                    }
                                                    echo "
                                <tr>
                                <td>" . $po_ID . "</td>
                                <td>" . $po_date . "</td>
                                <td>" . $supplier . "</td>
                                <td>" . $stat . "</td>
                                <td>" . "RM" . " " . $grand_total . "</td>
                                </tr>";
                                                }
                                                echo "</table>";
                                                ?>
                                            </tbody>
                                        </table>

                                        <div class="container-fluid">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        #
                                                                    </th>
                                                                    <th>
                                                                        Product Name
                                                                    </th>
                                                                    <th>
                                                                        Quantity
                                                                    </th>
                                                                    <th>
                                                                        Price
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $i = 1;
                                                                include '../../connect.php';

                                                                if (isset($_GET['ID'])) {

                                                                    $ID = (int)$_GET['ID'];

                                                                    $sql = "SELECT * FROM purchase_order 
                INNER JOIN purchase_order_detail ON purchase_order_detail.po_ID = purchase_order.ID WHERE purchase_order_detail.po_ID=" . $ID;
                                                                    $result = $conn->query($sql);
                                                                    while ($row = $result->fetch_assoc()) {

                                                                        $product_name = $row['product'];
                                                                        $quantity = $row['quantity'];
                                                                        $price = $row['price'];
                                                                        $status = $row['status'];

                                                                        echo "
                <tr>
                <td>" . $i++ . "</td>
                <td>" . $product_name . "</td>
                <td>" . $quantity . "</td>
                <td>" . "RM" . " " . $price . "</td>
                </tr>";
                                                                    }



                                                                    echo "</table>";
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?php
                                                        if ($status == '2') {
                                                        ?>
                                                            <a href="addItemPO.php?ID=<?php echo $ID; ?>"><button class="btn btn-primary" disabled>Item received</button></a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="po_list.php"><button class="btn btn-primary float-left">Back</button></a>
                                                            <a href="addItemPO.php?ID=<?php echo $ID; ?>"><button class="btn btn-primary">Paid</button></a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


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
                "targets": [0, 2, 3, 4, 5],
                "orderable": false,
            }, ],
        });

    });
</script>