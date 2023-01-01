<?php

include '../../connect.php';

if (isset($_POST['submit'])) {
    $petID = $_POST['petID'];
    $serviceID = $_POST['serviceID'];
    $serviceType = $_POST['serviceType'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $price = $_POST['price'];

    mysqli_query($connect, "INSERT INTO `service`(serviceID,serviceType,date,time,price) VALUES('$serviceID','$serviceType','$date','$time','$price')");
    $fp = fopen("testing.txt", "w");
    $write["userID"] = $_POST;
    $write["result"] = $_POST;
    fwrite($fp, print_r($write, true));
    fclose($fp);

    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "Success";

    header('location:viewService.php');
}
$result = mysqli_query($connect, "SELECT * FROM  inventory")
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
                                <li class="breadcrumb-item active">Add Grooming Service</a>
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
                                <h4 class="card-title">Add Grooming Service</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="addService.php">
                                    <div class="row">
                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="serviceType">Pet Type</label>
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
                                                    <label for="serviceType">Grooming Info</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="demo-inline-spacing">
                                                        <p class="card-text mb-0">
                                                            Basic Grooming:
                                                        </p>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="basic" type="checkbox" class="custom-control-input" onClick="toggle(this)" id="All">
                                                            <label class="custom-control-label" for="All">Select All</label>
                                                        </div>
                                                    </div>
                                                    <div class="demo-inline-spacing">
                                                        

                                                        <div class="custom-control custom-checkbox">
                                                            <input name="basic" type="checkbox" class="custom-control-input" id="Bath">
                                                            <label class="custom-control-label" for="Bath">Bath</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="basic" type="checkbox" class="custom-control-input" id="Brushing">
                                                            <label class="custom-control-label" for="Brushing">Brushing</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="basic" type="checkbox" class="custom-control-input" id="Eye & Ear Cleaning">
                                                            <label class="custom-control-label" for="Eye & Ear Cleaning">Eye & Ear Cleaning</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="basic" type="checkbox" class="custom-control-input" id="Teeth Brushing">
                                                            <label class="custom-control-label" for="Teeth Brushing">Teeth Brushing</label>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="basicall" >
                                                            <label class="custom-control-label"for="Bath" >All of above</label>
                                                        </div>
                                                    </div> -->
                                                    <br>
                                                    <div class="demo-inline-spacing">
                                                        <p class="card-text mb-0">
                                                            Advance Treatment :
                                                        </p>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="advance" type="checkbox" class="custom-control-input" onClick="toggle(this)" id="All2">
                                                            <label class="custom-control-label" for="All2">Select All</label>
                                                        </div>
                                                    </div>
                                                    <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="advance" type="checkbox" class="custom-control-input" id="Spa">
                                                            <label class="custom-control-label" for="Spa">Spa</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="advance" type="checkbox" class="custom-control-input" id="De-shedding">
                                                            <label class="custom-control-label" for="De-shedding">De-shedding</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="advance" type="checkbox" class="custom-control-input" id="Anal gland expression">
                                                            <label class="custom-control-label" for="Anal gland expression">Anal gland expression</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="advance" type="checkbox" class="custom-control-input" id="Dematting">
                                                            <label class="custom-control-label" for="Dematting">Dematting</label>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" >
                                                            <label class="custom-control-label" for="customCheck1">All of above</label>
                                                        </div>
                                                    </div> -->
                                                    <br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="price">Item Used (per unit)</label>
                                                </div>
                                                <div class="col-sm-6">

                                                    <select id="itemType" name="itemType">
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['itemID'] ?>">
                                                                <?php echo $row['itemName'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>

                                                </div>
                                                <div class="col-sm-0">
                                                    <form action="/action_page.php">
                                                        <label for="quantity">Quantity:</label>
                                                        <input type="number" id="quantity" name="quantity" min="1" max="30">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="price">Grooming Description</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="remark" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="price">Total price (RM)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="price" class="form-control" name="price" placeholder="99.99" readonly />
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
