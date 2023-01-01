<?php

include '../../connect.php';


$result2 = mysqli_query($connect, "SELECT MAX(`serviceID`) as `id` FROM `service`")
or die($mysqli->error);

while ($row = $result2->fetch_assoc()) { 
    $serviceID = $row['id'];
}

$result3 = mysqli_query($connect, "SELECT * FROM `service` Where serviceID = '$serviceID'")
or die($mysqli->error);

while ($row = $result3->fetch_assoc()) {
    $service_result = $row;
}

if (isset($_POST['submit'])) {
   
    // $hotelID = $_POST['hotelID'];
    $petType = $_POST['petType'];
    $startDate = $_POST['date'];
    $hotelDesc = $_POST['hotelDesc'];
    $endDate = $_POST['endDate'];
    $duration = $_POST['duration'];

    $fp = fopen("testing.txt", "w");
    $write["post"] = $_POST;
    fwrite($fp, print_r($write, true));
    fclose($fp);


    if ($petType == "Dog") {
        $price= $duration * 40 ;
    } else if ($petType == "Cat") {
        $price = $duration * 35;
    }

    mysqli_query($connect, "INSERT INTO `hotel`(HserviceID,hotelDesc,startDate,endDate,duration) VALUES('$serviceID','$hotelDesc','$startDate','$endDate','$duration')");
    mysqli_query($connect, "UPDATE `service` SET price='$price' WHERE serviceID = '$serviceID' ")
        or die($connect->error);
    
    $fp = fopen("testing.txt", "w");
    $write["userID"] = $_POST;
    $write["query"] = "INSERT INTO `hotel`(HserviceID,hotelDesc,startDate,endDate,duration) VALUES('$serviceID','$hotelDesc','$startDate','$endDate','$duration')";
    $write["result"] = $_POST;
    fwrite($fp, print_r($write, true));
    fclose($fp);


    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "Success";

    header('location:viewService.php');
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
                                <li class="breadcrumb-item active">Add Hotel Service</a>
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
                                <h4 class="card-title">Add Hotel Service</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST">
                                    <div class="row">

                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="hotelType">Pet Type</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="petType" class="custom-control-input" value="Dog">
                                                            <label class="custom-control-label" for="customRadio1">Dog</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="petType" class="custom-control-input" value="Cat">
                                                            <label class="custom-control-label" for="customRadio2">Cat</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="date">Start Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="date" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="<?php echo $service_result['date'] ?>" readonly></input>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="endDate">End Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="endDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="duration">Duration (Days)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="duration" class="form-control" name="duration" placeholder="1-3"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="hotelDesc">Remark</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="hotelDesc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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

<!-- <script>
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
</script> -->