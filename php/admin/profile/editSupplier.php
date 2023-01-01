<?php

include '../../connect.php';
if (isset($_POST['update'])) {
    $supplierID = $_GET['edit'];
    $supplierName = $_POST['supplierName'];
    $contactName = $_POST['contactName'];
    $contactNo = $_POST['contactNo'];
    $address = $_POST['address'];

    mysqli_query($connect, "UPDATE supplier SET supplierName='$supplierName',contactName='$contactName', contactNo = '$contactNo', address = '$address' WHERE supplierID = '$supplierID' ")
        or die($connect->error);

    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "success";

    header('location:viewSupplier.php');
}

if (isset($_GET['edit'])) {
    $supplierID = $_GET['edit'];
    $result = mysqli_query($connect, "SELECT * FROM supplier WHERE supplierID='$supplierID'");
    unset($_GET['edit']);
    $row = $result->fetch_array();
    $supplierName = $row['supplierName'];
    $contactName = $row['contactName'];
    $contactNo = $row['contactNo'];
    $address = $row['address'];


    $_SESSION['message'] = "Record has been Saved";
    $_SESSION['msg_type'] = "success";
}


include '../header.php';
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Supplier Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Supplier</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Supplier</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-contactName.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Supplier</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST"><br>
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="supplierName">Supplier Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="supplierName" class="form-control" name="supplierName" value="<?php echo $supplierName ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="contactName">Contact Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="contactName" class="form-control" name="contactName" value="<?php echo $contactName ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="contactNo">Contact</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="contactNo" class="form-control" name="contactNo" value="<?php echo $contactNo ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="address">Address</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="address" class="form-control" name="address" value="<?php echo $address ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="update" type="submit" class="btn btn-primary mr-1">Update</button>
                                            <a href="viewSupplier.php"><button name="back" type="button" class="btn btn-primary mr-1">Back</button></a>
                                        </div>
                                    </div>
                                </form>
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
    <!--  -->
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

</html>