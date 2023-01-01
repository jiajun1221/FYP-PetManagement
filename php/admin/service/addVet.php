<?php

include '../../connect.php';

if (isset($_POST['submit'])) {
    $result2 = mysqli_query($connect, "SELECT MAX(`serviceID`) as `id` FROM `service`")
        or die($mysqli->error);

    while ($row = $result2->fetch_assoc()) {
        $serviceID = $row['id'];
    }
  
    $vetID = $_POST['vetID'];
    $vetInfo = $_POST['vetInfo'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $vetDesc = $_POST['vetDesc'];
    $petType = $_POST['petType'];

    if ($petType == "Dog") {
        if ($vetInfo == "Vet Checkout") {
            $price = '130';
        } else if ($vetInfo == "Injuries Threatment") {
            $price = '200';
        } else if ($vetInfo == "Diseases Threatment") {
            $price = '200';
        } else if ($vetInfo == "Vaccination") {
            $price = '60';
        }
    } else if ($petType == "Cat") {
        if ($vetInfo == "Vet Checkout") {
            $price = '150';
        } else if ($vetInfo == "Injuries Threatment") {
            $price = '210';
        } else if ($vetInfo == "Diseases Threatment") {
            $price = '200';
        } else if ($vetInfo == "Vaccination") {
            $price = '80';
        }
    }

    mysqli_query($connect, "INSERT INTO `vet`(VserviceID,vetInfo,status,remark,vetDesc) VALUES('$serviceID','$vetInfo','$status','$remark','$vetDesc')");
    mysqli_query($connect, "UPDATE `service` SET price='$price' WHERE serviceID = '$serviceID' ")
        or die($connect->error);
    $fp = fopen("testing.txt", "w");
    $write["post"] = $_POST;
    $write["serviceID"] = $serviceID;
    $write["price"] = $price;
    $write["date"] = $date;
    
    $write["query"] = "UPDATE `service` SET price='$price' WHERE serviceID = '$serviceID' ";
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
                                <li class="breadcrumb-item active">Add Vet Service</a>
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
                                <h4 class="card-title">Add Vet Service</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST">
                                    <div class="row">
                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="vetInfo">Pet Type</label>
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
                                                    <label for="vetInfo">Vet Info</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="vetInfo" class="custom-select" id="customSelect">
                                                        <option selected="">...</option>
                                                        <option value="Vet Checkout">Vet Checkout</option>
                                                        <option value="Injuries Threatment">Injuries Threatment</option>
                                                        <option value="Diseases Threatment">Diseases Threatment</option>
                                                        <option value="Vaccination">Vaccination</option>
                                                    </select>
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
                                                    <textarea name="vetDesc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                                                    <select name="status" class="custom-select" id="customSelect">
                                                        <option selected="">...</option>
                                                        <option value="Healthy">Healthy</option>
                                                        <option value="Slightly Injured">Slightly Injured</option>
                                                        <option value="Injured">Seriously Injured</option>
                                                        <option value="Slightly Sick">Slightly Sick</option>
                                                        <option value="Seriously Sick">Seriously Sick</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="vetDesc">Health Description</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="remark" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
    document.getElementById("statusfield").setAttribute("max", today);
</script>

<script>
    function toggle(source) {
        checkboxes = document.getElementsByName('basic');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function toggle(source) {
        checkboxes = document.getElementsByName('advance');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>