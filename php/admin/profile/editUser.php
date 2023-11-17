<?php

include '../../connect.php';

if (isset($_POST['update'])) {
    $freelancerID = $_GET['edit'];
    $freelancerName = $_POST['freelancerName'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $hobby = $_POST['hobby'];
    $skillset = $_POST['skillset'];

    mysqli_query($conn, "UPDATE freelancer SET freelancerName='$freelancerName',gender='$gender', contact = '$contact', skillset = '$skillset' WHERE freelancerID = '$freelancerID' ")
        or die($conn->error);

        echo "<script>alert('Record has been updated');</script>";

    header('location:viewUser.php');
}

if (isset($_GET['edit'])) {
    $freelancerID = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM freelancer WHERE freelancerID='$freelancerID'");
    unset($_GET['edit']);
    $row = $result->fetch_array();
    // Assign values from the database to variables
    $freelancerName = isset($row['freelancerName']) ? $row['freelancerName'] : '';
    $gender = isset($row['gender']) ? $row['gender'] : '';
    $email = isset($row['email']) ? $row['email'] : '';
    $contact = isset($row["contact"]) ? $row["contact"] : '';
    $hobby = isset($row["hobby"]) ? $row["hobby"] : '';
    $skillset = isset($row["skilset"]) ? $row["skilset"] : '';

    $_SESSION['message'] = "Record has been Saved";
    $_SESSION['msg_type'] = "success";
}
   

include '../header.php';

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Form Wizard - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-wizard.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Register User</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Profile</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User</a>
                                </li>
                                <li class="breadcrumb-item active">Add User
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
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-userEmail.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Horizontal Wizard -->
            <section class="basic-horizontal-layouts">
                <div class="row">
                    <div class="content-header-left col-md-12 col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" form class="form form-horizontal" method="POST">
                                    <div class="card">
                                        <div class="content-header">
                                            <h5 class="mb-0">Personal Info</h5>
                                            <small>Enter Your Personal Info.</small>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="freelancerName">Full Name</label>
                                                <input type="text" name="freelancerName" id="freelancerName" class="form-control" value="<?php echo $freelancerName ?>"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="gender">Gender</label>
                                                <input type="text" name="gender" id="gender" class="form-control" value="<?php echo $gender ?>"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="contact">Contact</label>
                                                <input type="text" name="contact" id="contact" class="form-control"value="<?php echo $contact ?>"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="hobby">Hobby</label>
                                                <input type="text" name="hobby" id="hobby" class="form-control"value="<?php echo $hobby ?>"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                      
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="skillset">Skillset</label>
                                                <select class="select2 w-100" name="skillset" id="skillset" multiple>
                                                    <option>Active listening skills</option>
                                                    <option>Communication skills</option>
                                                    <option>Computer skills</option>
                                                    <option>Customer service skills<option>
                                                    <option>Interpersonal skills<option>
                                                    <option>Leadership skills<option>
                                                    <option>Management skills<option>
                                                    <option>Problem-solving skills<option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="text" name="email" id="email" class="form-control"value="<?php echo $email ?>"/>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row-reverse justify-content-right">
                                            <button name="update" type="update" style="float:right;" class="btn btn-primary mr-1">Update</button>
                                        </div>
                                        

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Horizontal Wizard -->

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


<!-- BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../../../app-assets/js/scripts/forms/form-wizard.js"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>