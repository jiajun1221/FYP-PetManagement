<?php 
include('../header.php');
$conn = mysqli_connect("localhost", "root", "", "petcare") or die(mysqli_error($mysqli));
include('../../connect.php');



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM category WHERE categoryID=$id");
   
    unset($_GET['delete']);

    echo "<script>alert('Record has been deleted');</script>";
}

$fp = fopen("testing.txt", "w");
    $write["categoryID"] = $_POST;
    $write["query"] = "DELETE FROM category WHERE categoryID=$id";
    $write["result"] = $_POST;
    $write["del"] = $_GET;
    fwrite($fp, print_r($write, true));
    fclose($fp);



if (isset($_POST['submit'])) {
    $categoryID = $_POST['categoryID'];
    $categoryName = $_POST['categoryName'];
    mysqli_query($conn, "INSERT INTO category(categoryID,categoryName) VALUES('$categoryID','$categoryName')");
}

$result = mysqli_query($conn, "SELECT * FROM category")
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
                                        <li class="breadcrumb-item"><a href="">Inventory</a>
                                        </li>

                                        <li class="breadcrumb-item active">Category</li>
                                    </ol>
                                </div>
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
                                                <h4 class="mb-0">Category List</h4>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mx-0 row" bis_skin_checked="1">

                                            <div class="col-sm-12 col-md-12" bis_skin_checked="1">
                                                <div class="card-body" bis_skin_checked="1"><br>
                                                    <form class="form form-horizontal" method="POST">
                                                        <div class="row" bis_skin_checked="1">
                                                            <div class="col-6" bis_skin_checked="1">
                                                                <div class="form-group row" bis_skin_checked="1">
                                                                    <div class="col-sm-3 col-form-label" bis_skin_checked="1">
                                                                        <label for="categoryName">Category Name</label>
                                                                    </div>
                                                                    <div class="col-sm-6" bis_skin_checked="1">
                                                                        <input type="text" id="categoryName" class="form-control" name="categoryName">

                                                                    </div>
                                                                    <div class="col-sm-3" bis_skin_checked="1">
                                                                        <button name="submit" class="btn btn-primary mr-1" style="float:right">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6" bis_skin_checked="1">

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
                                                        while ($user_info = $result->fetch_assoc()) :{
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $user_info['categoryID']; ?></td>
                                                                <td><?php echo $user_info['categoryName']; ?></td>
                                                                <td>
                                                                    <a href="category.php?delete=<?php echo $user_info['categoryID']; ?>">
                                                                        <button type="button" class="btn-outline-secondary">Delete</button></a>
                                                                        
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        endwhile; ?>
                                                        </tr>

                                                    </tbody>

                                                </table>

                                                <div class="d-flex justify-content-between mx-0 row" bis_skin_checked="1">

                                                    <div class="col-sm-12 col-md-6" bis_skin_checked="1">

                                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" bis_skin_checked="1"></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6" bis_skin_checked="1">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate" bis_skin_checked="1">

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

            <!-- <section id="basic-horizontal-layouts">
                <div class="row" bis_skin_checked="1">
                    <div class="content-header-left col-md-9 col-12 mb-2" bis_skin_checked="1">
                        <div class="card" bis_skin_checked="1">
                            <div class="card-header" bis_skin_checked="1">
                                <h4 class="card-title">Add Category</h4>
                            </div>
                            <div class="card-body" bis_skin_checked="1"><br>
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
            </section> -->
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