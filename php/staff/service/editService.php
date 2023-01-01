<?php

include '../../connect.php';
if (isset($_POST['update'])) {
    $serviceType = $_POST['serviceType'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $price = $_POST['price'];

    

    mysqli_query($connect, "UPDATE service SET serviceType='$serviceType', date='$date', time = '$time', price = '$price'WHERE serviceID = '$serviceID' ")
        or die($mysqli->error);

    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "success";

    header('location:viewService.php');
}

if (isset($_GET['edit'])) {
    $serviceID = $_GET['edit'];
    $result = mysqli_query($connect, "SELECT * FROM service WHERE serviceID='$serviceID'");
    unset($_GET['edit']);

    $fp = fopen("testing.txt","w");
    $write["result"] = $result;
    $write["query"] = "SELECT * FROM service WHERE serviceID='$serviceID'";
    fwrite($fp,print_r($write,true));
    fclose($fp);

    $row = $result->fetch_array();
    $serviceType = $row['serviceType'];
    $date = $row['date'];
    $time = $row['time'];
    $price = $row['price'];


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
            <div class="conten t-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Service Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Service</a>
                                </li>
                                <li class="breadcrumb-item active">Add Service</a>
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
                                <h4 class="card-title">Add Service</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="addService.php">
                                    <div class="row">

                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="date">Pet ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input type="text" id="petID" class="form-control" name="petID" placeholder="001" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="serviceType">Service Type</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select name="serviceType" class="custom-select" id="customSelect">
                                                        <option selected="">...</option>
                                                        <option value="Grooming">Grooming Service</option>
                                                        <option value="Hotel">Hotel Service</option>
                                                        <option value="Vet">Vet Service</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="date">Service Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="date" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="time">Service Time</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="time" type="time" id="fp-time" class="form-control flatpickr-time text-left flatpickr-input" placeholder="HH:MM" min="09:00" max="18:00" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="price">Total price (RM)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="price" class="form-control" name="price" placeholder="99.99" />
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