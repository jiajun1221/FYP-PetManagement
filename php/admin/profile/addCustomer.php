<?php

include '../../connect.php';

if (isset($_POST['submit'])) {
    $customerName = $_POST['customerName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    mysqli_query($connect, "INSERT INTO customer(customerName,gender,email,contact,address) VALUES('$customerName','$gender','$email','$contact','$address')");

?><script>
        toastr['success']('New Record has been successfully added', 'Success!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
        });
    </script>
<?php
    $fp = fopen("testing.txt", "w");
    $write["userID"] = $_POST;
    $write["error"] = mysqli_error($connect);
    $write["query"] = "INSERT INTO `customer`(customerName,gender,email,contact,address) VALUES('$customerName',$gender','$email','$contact','$address')";
    fwrite($fp, print_r($write, true));
    fclose($fp);

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
                                <li class="breadcrumb-item active">Add Customer</a>
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
                                                    <input type="text" id="customerName" class="form-control" placeholder="John Smith" name="customerName" />
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
                                                            <input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="Male">
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
                                                    <input type="text" id="email" class="form-control" name="email" placeholder="john@example.com" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="contact">Contact</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="contact" class="form-control" name="contact" placeholder="012-3456789" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="address">Address</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="address" class="form-control" name="address" placeholder="No 3,Jalan Dedap" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="submit" type="submit" class="btn btn-primary mr-1">Submit</button>
                                            <a href="viewCustomer.php"><button name="back" type="button" class="btn btn-primary mr-1">Back</button></a>
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
    <!--  -->
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