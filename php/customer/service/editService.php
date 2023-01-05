<?php

include '../../connect.php';
if (isset($_POST['update'])) {
    $orderID= $_POST['orderID'];
    $userID = $_POST['userID'];
    $purchaseDate = $_POST['purchaseDate'];
    $serviceDate = $_POST['serviceDate'];
    $installDate = $_POST['installDate'];
    $totalPrice = $_POST['totalPrice'];
    mysqli_query($conn, "UPDATE 'order' SET userID='$userID', purchaseDate='$purchaseDate', serviceDate = '$serviceDate', installDate = '$installDate', totalPrice = '$totalPrice' WHERE orderID = '$orderID' ")
        or die($mysqli->error);

        echo "<script>alert('Record has been updated');</script>";

    header('location:viewOrder.php');
    }

    if(isset($_GET['edit'])){
        $orderID = $_GET['edit'];
        $result = mysqli_query($conn,"SELECT * FROM order WHERE orderID=$orderID");
        unset($_GET['edit']);
         $row = $result ->fetch_array();
            $userID = $row['userID'];
            $purchaseDate = $row['purchaseDate'];
            $serviceDate = $row['serviceDate'];
            $installDate = $row['installDate'];
            $media = $row['totalPrice'];
        
        
        $_SESSION['message']="Record has been Saved";
        $_SESSION['msg_type']="success";
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
                        <h2 class="content-header-title float-left mb-0">Order Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Order</a>
                                </li>
                                <li class="breadcrumb-item active">Add Order</a>
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
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
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
                                <h4 class="card-title">Add Order</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="userID">User ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="userID" class="form-control" name="userID" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="purchaseDate">Purchase Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input name="purchaseDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="serviceDate">Service Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input name="serviceDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="installDate">Install Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input name="installDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="totalprice">Total price</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="totalPrice" class="form-control" name="totalPrice" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="update" type="submit" class="btn btn-primary mr-1">Update</button>
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
    
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

</html>