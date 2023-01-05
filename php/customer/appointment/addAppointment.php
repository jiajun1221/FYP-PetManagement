<?php

include '../../connect.php';

$current_status_type = $_GET['type'];

if (isset($_POST['submit'])) {
    $appointmentID = $_POST['appointmentID'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $serviceType = $_POST['serviceType'];
    $petID = $_POST['petID'];
    $staffID = $_POST['staffID'];
    $status = 'pending';

    mysqli_query($conn, "INSERT INTO `appointment`(appointmentID,appointmentDate,appointmentTime,serviceType,petID,staffID,status) VALUES('$appointmentID','$appointmentDate','$appointmentTime','$serviceType','$petID','$staffID','$status')");
    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "Success";

    header('location:viewAppointment.php');
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
                        <h2 class="content-header-title float-left mb-0">Appointment Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Appointment</a>
                                </li>
                                <li class="breadcrumb-item active">Add Appointment</a>
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
                                <h4 class="card-title">Add Appointment</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="addAppointment.php">
                                    <div class="row">

                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="petID">Pet ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="petID" class="form-control" name="petID" placeholder="25"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="staffID">Staff ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="staffID" class="form-control" name="staffID" placeholder="25"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="serviceType">Service Type</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="custom-select" name="serviceType" id="customSelect">
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
                                                    <label for="appointmentDate">Appointment Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="appointmentDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="appointmentTime">Appointment Time</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input name="appointmentTime" type="time" id="fp-time" class="form-control flatpickr-time text-left flatpickr-input" placeholder="HH:MM" min="09:00" max="18:00" required>
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