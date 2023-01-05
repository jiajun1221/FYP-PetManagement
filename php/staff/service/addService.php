<?php

include '../../connect.php';

if (isset($_POST['submit'])) {
    $servicePETID = $_POST['servicePETID'];
    $serviceType = $_POST['serviceType'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    mysqli_query($conn, "INSERT INTO `service`(serviceType,servicePETID,date,time) VALUES('$serviceType','$servicePETID','$date','$time')");
    $fp = fopen("testing.txt", "w");
    $write["result"] = $_POST;
    fwrite($fp, print_r($write, true));
    fclose($fp);

    $result2 = mysqli_query($conn, "SELECT * FROM  pet")
        or die($mysqli->error);


    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "Success";

    if ($serviceType == 'Grooming') {
        header("Location: addGrooming.php");
    } else if ($serviceType == 'Hotel') {
        header("Location: addHotel.php");
    } else if ($serviceType == 'Vet') {
        header("Location: addVet.php");
    } else {
    }
}
$result = mysqli_query($conn, "SELECT * FROM  pet")
    or die($mysqli->error);


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
                                <form class="form form-horizontal" method="POST">
                                    <div class="row">

                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="date">Pet ID</label>
                                                </div>

                                                <div class="col-sm-7">
                                                    <select id="servicePETID" class="form-control" name="servicePETID"">
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <option value=<?php echo $row['petID'] ?>>
                                                                [ <?php echo $row['petID'] ?> ] <?php echo $row['petName'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" col-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 col-form-label">
                                                                <label for="serviceType">Service Type</label>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <select name="serviceType" class="custom-select" id="customSelect">
                                                                    <option selected="">...</option>
                                                                    <option value="Grooming">Grooming</option>
                                                                    <option value="Hotel">Hotel</option>
                                                                    <option value="Vet">Vet</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="date">Service Date</label>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <input name="date" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="time">Service Time</label>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <input name="time" type="time" id="fp-time" class="form-control flatpickr-time text-left flatpickr-input" placeholder="HH:MM" min="09:00" max="18:00" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-9 offset-sm-3">
                                                    <div class="form-group">
                                                    </div>
                                                </div>
                                                <div class="col-sm-9 offset-sm-3">
                                                    <button name="submit" type="submit" class="btn btn-primary mr-1">Next <i data-feather='arrow-right'></i></button>
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
    document.getElementById("datefield").setAttribute(today);
</script>