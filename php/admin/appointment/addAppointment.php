<?php

include '../../connect.php';

$located_time = [];
$date = "";
if (isset($_POST['submit'])) {

    if (!empty($_POST['appointmentDate']) && empty($_POST['appointmentTime'])) {
        $date = $_POST['appointmentDate'];
        $result = mysqli_query($connect, "SELECT * FROM appointment where appointmentDate = '$date'")
            or die($mysqli->error);

        $row = $result->fetch_all();

        if (!empty($row)) {
            foreach ($row as $r) {
                array_push($located_time, $r[3]);
            }
        }
    } else {
        $appointmentID = $_POST['appointmentID'];
        $appointmentDate = $_POST['appointmentDate'];
        $appointmentTime = $_POST['appointmentTime'];
        $serviceType = $_POST['serviceType'];
        $petID = $_POST['petID'];
        $appointmentDesc = $_POST['appointmentDesc'];

        mysqli_query($connect, "INSERT INTO `appointment`(appointmentID,appointmentDate,appointmentTime,serviceType,petID,appointmentDesc) VALUES('$appointmentID','$appointmentDate','$appointmentTime','$serviceType','$petID','$appointmentDesc')");
        $_SESSION['message'] = "Record has been Saved!";
        $_SESSION['msg_type'] = "Success";

        header('location:viewAppointment.php');
    }
}

$result = mysqli_query($connect, "SELECT * FROM  pet")
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
                                <form class="form form-horizontal" id="appoinmentform" method="POST" action="addAppointment.php">
                                    <div class="row">

                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="petID">Pet ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select id="servicePETID" class="form-control" name="petID">
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <option value=<?php echo $row['petID'] ?>>
                                                                [ <?php echo $row['petID'] ?> ] <?php echo $row['petName'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
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
                                                    <input name="appointmentDate" value="<?php echo $date;?>" id="datefield" type='date'></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row"><br>
                                                <div class="col-sm-3 col-form-label">

                                                    <label for="appointmentTime">Appointment Time</label>
                                                    <input type="hidden" name="appointmentTime" id="appointment">
                                                </div>
                                                <div class="col-sm-auto"><button type="button" id="appoint_btn1" class="btn btn-gradient-success" value="10AM" value="10AM">10:00AM</button>
                                                </div>
                                                <div class="col-sm-auto"><button type="button" id="appoint_btn2" class="btn btn-gradient-success" value="12AM">12:00AM</button>
                                                </div>
                                                <div class="col-sm-auto"><button type="button" id="appoint_btn3" class="btn btn-gradient-success" value="10PM">3:00PM</button>
                                                </div>
                                                <div class="col-sm-auto"><button type="button" id="appoint_btn4" class="btn btn-gradient-success" value="5PM">5:00PM</button>
                                                </div>
                                                <div class="col-sm-auto"><button type="button" id="appoint_btn5" class="btn btn-gradient-success" value="7PM">7:00PM</button>
                                                </div>




                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-sm-9 offset-sm-3">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button name="submit" id="appoint_submit" type="submit" class="btn btn-primary mr-1">Submit</button>
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

    var located_time = <?php echo json_encode($located_time); ?>;
    var len = located_time.length;

    console.log(len);

    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    //document.getElementById("datefield").setAttribute("max", today);

    $(document).ready(function() {
        jQuery("#appoint_btn1").click(function() {
            jQuery("#appointment").val("10:00AM");
        });
        jQuery("#appoint_btn2").click(function() {
            jQuery("#appointment").val("12:00PM");
        });
        jQuery("#appoint_btn3").click(function() {
            jQuery("#appointment").val("3:00PM");
        });
        jQuery("#appoint_btn4").click(function() {
            jQuery("#appointment").val("5:00PM");
        });
        jQuery("#appoint_btn5").click(function() {
            jQuery("#appointment").val("7:00PM");
        });

        jQuery("#datefield").change(function() {
            jQuery("#appoint_submit").trigger("click");
        });

        if (len != 0) {
            for (var i = 0; i < len; i++) {
                if (located_time[i] == '10:00AM') {
                    jQuery("#appoint_btn1").attr("disabled", "true");
                } else if (located_time[i] == '12:00PM') {
                    jQuery("#appoint_btn2").attr("disabled", "true");
                } else if (located_time[i] == '3:00PM') {
                    jQuery("#appoint_btn3").attr("disabled", "true");
                } else if (located_time[i] == '5:00PM') {
                    jQuery("#appoint_btn4").attr("disabled", "true");
                } else if (located_time[i] == '7:00PM') {
                    jQuery("#appoint_btn5").attr("disabled", "true");
                }
            }
        }
    });
</script>