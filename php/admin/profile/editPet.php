<?php

include '../../connect.php';
if (isset($_POST['update'])) {
    $petID = $_GET['edit'];
    $petName = $_POST['petName'];
    $gender = $_POST['gender'];
    $species = $_POST['species'];
    $birthdate = $_POST['birthdate'];
    $color = $_POST['color'];
    $weight = $_POST['weight'];
    mysqli_query($connect, "UPDATE pet SET petName='$petName', gender='$gender', species = '$species', birthdate = '$birthdate', color='$color', weight = '$weight' WHERE petID = '$petID' ")
        or die($mysqli->error);

    $_SESSION['message']="Record has been Saved!";
    $_SESSION['msg_type']="success";

    header('location:viewPet.php');
    }

    if(isset($_GET['edit'])){
        $petID = $_GET['edit'];
        $result = mysqli_query($connect,"SELECT * FROM pet WHERE petID=$petID");
        unset($_GET['edit']);
         $row = $result ->fetch_array();
            $petName = $row['petName'];
            $gender = $row['gender'];
            $species = $row['species'];
            $birthdate = $row['birthdate'];
            $color = $row['color'];
            $weight = $row['weight'];
        
        
        $_SESSION['message']="Record has been Saved";
        $_SESSION['msg_type']="success";
    }


include '../header.php';
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Pet Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
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
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
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
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST"><br>
                                    <div class="row">
                                   

                                    <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="petName">Pet Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="petName" class="form-control" name="petName" value="<?php echo $petName ?>" />
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
                                                    <input type="text" id="species" class="form-control" name="species" value="<?php echo $species ?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="birthdate">Birth Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="birthdate" id="datefield" type='date' min='1899-01-01' value="<?php echo $birthdate ?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="color">Color</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="color" class="form-control" name="color" value="<?php echo $color ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="weight">Weight(KG)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="weight" class="form-control" name="weight" value="<?php echo $weight ?>" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="update" type="submit" class="btn btn-primary mr-1">Update</button>
                                        </div>
                                    </div>
                                </form>
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
    <!-- <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p> -->
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

</html>