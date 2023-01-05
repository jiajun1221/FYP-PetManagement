<?php

include '../../connect.php';


$current_service_type = $_GET['type'];

if (isset($_POST['update'])) {
    $serviceType = $_POST['serviceType'];
    $servicePETID = $_POST['servicePETID'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $price = $_POST['price'];

    mysqli_query($conn, "UPDATE `service` SET serviceType='$serviceType',servicePETID='$servicePETID', date='$date', time = '$time', price = '$price'WHERE serviceID = '$serviceID' ")
        or die($mysqli->error);

        echo "<script>alert('Record has been updated');</script>";

    header('location:viewService.php');
}

$result = mysqli_query($conn, "SELECT * FROM `service`")
    or die($mysqli->error);


if (isset($_GET['edit'])) {
    $serviceID = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM `service` WHERE serviceID='$serviceID'");
    $row = $result->fetch_array();
    $serviceType = $row['serviceType'];
    $servicePETID = $row['servicePETID'];
    $date = $row['date'];
    $time = $row['time'];
    $price = $row['price'];

    $petID = $row['servicePETID'];
    $result2 = mysqli_query($conn, "SELECT * FROM pet WHERE petID=$petID");
    $row = $result2->fetch_array();
    $petName = $row['petName'];
    $gender = $row['gender'];
    $species = $row['species'];
    $birthdate = $row['birthdate'];
    $color = $row['color'];
    $weight = $row['weight'];
    $remark = $row['remark'];
    $status = $row['status'];
    $image = $row['image'];

    if ($serviceType == "Grooming") {
        $result3 = mysqli_query($conn, "SELECT * FROM `grooming` WHERE GserviceID='$serviceID'");
        $row = $result3->fetch_array();
        $groomingID = $row['groomingID'];
        $groomingInfo = $row['groomingInfo'];
        $groomingDesc = $row['groomingDesc'];
    } else if ($serviceType == "Hotel") {
        $result4 = mysqli_query($conn, "SELECT * FROM `hotel` WHERE HserviceID='$serviceID'");
        $row = $result4->fetch_array();
        $hotelID = $row['hotelID'];
        $startDate = $row['startDate'];
        $hotelDesc = $row['hotelDesc'];
        $endDate = $row['endDate'];
        $duration = $row['duration'];
    } else if ($serviceType == "Vet") {
        $result5 = mysqli_query($conn, "SELECT * FROM `vet` WHERE VserviceID='$serviceID'");
        $row = $result5->fetch_array();
        $vetID = $row['vetID'];
        $vetInfo = $row['vetInfo'];
        $vetDesc = $row['vetDesc'];
        $status = $row['status'];
        $remark = $row['remark'];
        
    }

    $fp = fopen("testing.txt", "w");
    $write["result"] = $result2;
    $write["query"] = "SELECT * FROM pet WHERE petID=$petID";
    $write["post"] = $_POST;
    fwrite($fp, print_r($write, true));
    fclose($fp);

    $_SESSION['message'] = "Record has been Saved";
    $_SESSION['msg_type'] = "success";
}

$result2 = mysqli_query($conn, "SELECT * FROM `pet`")
    or die($mysqli->error);




include '../header.php';
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Service Info</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="addService.php">
                                    <div class="row">

                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="date">Service ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="serviceID" class="form-control" name="serviceID" value="<?php echo $serviceID ?>" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="serviceType">Service Type</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="serviceType" class="form-control" name="serviceType" value="<?php echo $serviceType ?>" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="date">Service Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="date" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="<?php echo $date ?>"></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="time">Service Time</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="time" type="time" id="fp-time" class="form-control flatpickr-time text-left flatpickr-input" placeholder="HH:MM" min="09:00" max="18:00" value="<?php echo $time ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="price">Total price (RM)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="price" class="form-control" name="price" placeholder="99.99" value="<?php echo $price ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <?php if ($current_service_type == 'Grooming') { ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Grooming Info</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" method="POST" action="addService.php">
                                        <div class="row">

                                            <div class="col-12"><br>
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="groomingID">Grooming ID</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="groomingID" class="form-control" name="groomingID" value="<?php echo $groomingID ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="groomingInfo">Grooming Info</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="groomingInfo" class="form-control" name="groomingInfo" value="<?php echo $groomingInfo ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="groomingDesc">Grooming Description</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="groomingDesc" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $groomingDesc ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    <?php } else if ($current_service_type == 'Hotel') { ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Hotel Service</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" method="POST">
                                        <div class="row">

                                            <div class="col-12"><br>
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="hotelID">Hotel ID</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="hotelID" class="form-control" name="hotelID" value="<?php echo $hotelID ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="startDate">Start Date</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input name="startDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="<?php echo $date ?>" readonly></input>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="endDate">End Date</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input name="endDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="<?php echo $endDate ?>" readonly></input>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="duration">Duration (Days)</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="duration" class="form-control" name="duration" placeholder="1-3" value="<?php echo $duration ?>" readonly></input>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="hotelDesc">Remark</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="hotelDesc" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $hotelDesc ?></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Vet Service</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" method="POST">
                                        <div class="row">

                                            <div class="col-12"><br>
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="vetID">Vet ID</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="vetID" class="form-control" name="vetID" value="<?php echo $vetID ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="vetInfo">Vet Info</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" id="vetInfo" class="form-control" name="vetInfo" value="<?php echo $vetInfo ?>" readonly />
                                                   
                                                        <!-- <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="basicall" >
                                                            <label class="custom-control-label"for="Bath" >All of above</label>
                                                        </div>
                                                    </div> -->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="vetDesc">Vet Description</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="vetDesc" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $vetDesc?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="vetDesc">Medicine Used (per unit)</label>
                                                </div>
                                                <div class="col-sm-4">

                                                    <select id="itemType" name="itemType">
                                                      
                                                    </select>

                                                </div>
                                                <div class="col-sm-0">
                                                    <form action="/action_page.php">
                                                        <label for="qty">Quantity:</label>
                                                        <input type="number" id="qty" name="qty" min="1" max="30">
                                                    </form>
                                                </div>
                                            </div>
                                        </div> -->

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="status">Status</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <input type="text" id="status" class="form-control" name="status" value="<?php echo $status ?>" readonly />
                                                   
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="remark">Health Description</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="remark" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $remark ?></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>


                <div class="content-body">
                    <!-- app e-commerce details start -->
                    <section class="app-ecommerce-details">
                        <div class="card">
                            <!-- Product Details starts -->
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST">
                                    <div class="row my-2">
                                        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="../../../app-assets/img/pet/<?php echo $image ?>" class="img-fluid petpic" alt="product image">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-7">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-9">
                                                            <h3><?php echo $petName ?><h3></h3>
                                                        </div>



                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="petID">Pet ID</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" id="petID" readonly class="form-control" name="petID" value="<?php echo $petID ?>" />
                                                        </div>
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="birthdate">Birth Date</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input name="birthdate" id="datefield" readonly type='date' min='1899-01-01' value="<?php echo $birthdate ?>" />
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="gender">Gender</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" id="gender" readonly class="form-control" name="gender" value="<?php echo $gender ?>" />
                                                        </div>
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="species">Species</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" id="species" readonly class="form-control" name="species" value="<?php echo $species ?>" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="color">Color</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" id="color" readonly class="form-control" name="color" value="<?php echo $color ?>" />
                                                        </div>
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="weight">Weight(KG)</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" id="weight" readonly class="form-control" name="weight" value="<?php echo $weight ?>" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="status">Status</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="status" readonly class="form-control" name="status" value="<?php echo $status ?>" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="remark">Remark</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <textarea name="remark" readonly class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $remark ?>"></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                </form>

                            </div>
                        </div>

                    </section>
                </div>
        </div>
    </div>
    </section>
    <section id="basic-horizontal-layouts">
        <div class="row">

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