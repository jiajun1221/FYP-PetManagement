<?php

include '../../connect.php';

if (isset($_POST['submit'])) {
    // $customerID = $_POST['customerID'];
    $customerName = $_POST['customerName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    

    mysqli_query($connect, "INSERT INTO `customer`(customerName,gender,email,contact,address) VALUES('$customerName','$gender','$email','$contact','$address')") or die(mysqli_error($connect)); 
    // $fp = fopen("testing.txt","w");
    // $write["customerID"] = $customerID;
    // $write["customerName"] = $customerName;
    // $write["gender"] = $gender;
    // $write["email"] = $email;
    // $write["contact"] = $contact;
    // $write["address"] = $address;
    // $write["query"] = "INSERT INTO `customer`(customerID,customerName,gender,email,contact,address) VALUES('$customerID','$customerName','$gender','$email','$contact','$address')";
    // $write["connect"] = $connect;
    // fwrite($fp,print_r($write,true));
    // fclose($fp);
    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "Success";

    header('location:viewCustomer.php');
}


include '../header.php';
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
<div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="conten t-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Customer Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Profile</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Customer</a>
                                </li>
                                <li class="breadcrumb-item active">Add customer</a>
                                </li>
                            </ol>
                        </div>
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
                                <h4 class="card-title">Add Customer</h4>
                            </div>
                            <div class="card-body"><br> 
                                <form class="form form-horizontal" method="POST" action="addCustomer.php">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="customerName">Customer Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="customerName" class="form-control" name="customerName" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="gender">Gender</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="Male" >
                                                            <label class="custom-control-label" for="customRadio1">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="Female">
                                                            <label class="custom-control-label" for="customRadio2">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="email">Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="email" class="form-control" name="email" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="contact">Contact</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="contact" class="form-control" name="contact" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="address">Address</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="address" class="form-control" name="address" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="submit" type="submit" class="btn btn-primary mr-1">Submit</button>
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
    <!-- <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p> -->
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

</html>

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("max", today);
</script>