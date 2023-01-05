<?php

include '../../connect.php';

if (isset($_POST['submit'])) {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $gender = $_POST['gender'];
    $species = $_POST['species'];
    $birthdate = $_POST['birthdate'];
    $color = $_POST['color'];
    $weight = $_POST['weight'];
    $owner = $_POST['owner'];
    $image =  $_FILES["image"]["name"];

    $target_dir = "../../../app-assets/img/pet/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["image"]["tmp_name"]);



    // Check if file already exists
    if (file_exists($target_file)) {
        $error = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $error = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    $fp = fopen("testing.txt", "w");
    $write["target_file"] = $target_file;
    $write["move_uploaded_file"] =  $_FILES["image"]["tmp_name"];
    fwrite($fp, print_r($write, true));
    fclose($fp);

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    mysqli_query($conn, "INSERT INTO `pet`(petName,petType,gender,species,birthdate,color,weight,owner,image) VALUES('$petName','$petType','$gender','$species','$birthdate','$color','$weight','$owner','$image')");
    echo '<script>alert("New Record has been Added")</script>';
    echo "<script>window.location.assign('viewPet.php');</script>";
}
$result = mysqli_query($conn, "SELECT * FROM  customer")
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
                        <h2 class="content-header-title float-left mb-0">Pet Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Profile</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pet</a>
                                </li>
                                <li class="breadcrumb-item active">Add Pet</a>
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
                                <h4 class="card-title">Add Pet</h4>
                            </div>
                            <div class="card-body"><br>
                                <form class="form form-horizontal" method="POST" action="addPet.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="petName">Pet Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="petName" class="form-control" name="petName" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="petType">Pet Type</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio3" name="petType" class="custom-control-input" value="Dog">
                                                            <label class="custom-control-label" for="customRadio3">Dog</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio4" name="petType" class="custom-control-input" value="Cat">
                                                            <label class="custom-control-label" for="customRadio4">Cat</label>
                                                        </div>
                                                    </div>
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
                                                    <label for="species">Species</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="species" class="form-control" name="species" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="birthdate">Birth Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="birthdate" id="datefield" type='date' min='1899-01-01' max='2000-13-13'></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="color">Color</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="color" class="form-control" name="color" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="weight">Weight</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="weight" class="form-control" name="weight" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="category">Owner</label>
                                                </div>
                                                <div class="col-sm-9 col-form-label">
                                                    <select id="owner" name="owner">
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <option value=<?php echo $row['customerID'] ?>>
                                                                [ <?php echo $row['customerID'] ?> ] <?php echo $row['customerName'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="image">Images</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="image" name="image" required accept="image/jpg, image/png, image/gif, image/jpeg">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="submit" type="submit" class="btn btn-primary mr-1">Submit</button>
                                            <a href="viewPet.php"><button name="back" type="button" class="btn btn-primary mr-1">Back</button></a>
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