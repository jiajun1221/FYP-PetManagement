<?php

include '../../connect.php';

function sanitize_my_userEmail($field)
{
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['submit'])) {
    session_start();

    $fp = fopen("testing.txt", "w");
    $write["result"] = $_POST;
    fwrite($fp, print_r($write, true));
    fclose($fp);

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $cpassword = $_POST["cpassword"];
    $userGroup = "staff";
    $password = base64_encode($password);
    $cpassword = base64_encode($cpassword);

    $staffName = $_POST['staffName'];
    $gender = $_POST['gender'];
    $userEmail = $_POST['userEmail'];
    $contact = $_POST["contact"];
    $speciality = $_POST["speciality"];

    mysqli_query($connect, "INSERT INTO user(userName,userEmail,password,userGroup) VALUES('$userName','$userEmail','$password','$userGroup')")
        or die($connect->error);

    // $fp = fopen("testing.txt", "w");
    // $write["query"] = "INSERT INTO user(userName,userEmail,password,userGroup) VALUES('$userName','$userEmail','$password','$userGroup')";
    // $write["result"] = $_POST;
    // fwrite($fp, print_r($write, true));
    // fclose($fp);

    $cid = mysqli_query($connect, "SELECT max(userID) as userID FROM user");
    $crow = mysqli_fetch_assoc($cid);
    $userID = $crow['userID'];

    mysqli_query($connect, "INSERT INTO staff(staffName,userID,gender,email,contact,speciality) VALUES('$staffName','$userID','$gender','$userEmail','$contact','$speciality')")
        or die($connect->error);


    if ($password == $cpassword) {
        $result = mysqli_query($connect, "SELECT * FROM user where publish = '1'");

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['userEmail'] == $userEmail) {
?>

                <script src="../../js/jquery.min.js"></script>
                <script>
                    jQuery(document).ready(function() {
                        jQuery("#error").text("*User Email Already Exist. Please try again");
                    });
                </script>

        <?php
                $check = 1;
            }
        }

        if (empty($check)) {
            //auto generate code
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $verify = '';
            for ($i = 0; $i < 6; $i++) {
                $verify .= $characters[rand(0, $charactersLength - 1)];
            }

            $_SESSION['verify'] = $verify;

            /*while ($row = mysqli_fetch_assoc($result)) {

                //if code duplicate then rerun again
                if ($row["verify"] == $verify) {
                    $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $verify = '';
                    for ($i = 0; $i < 6; $i++) {
                        $verify .= $characters[rand(0, $charactersLength - 1)];
                    }
                }
            }*/


            // //verification
            // $subject = "Verification Code";
            // $body = $verify;
            // $headers = "From: Pet Care Management";

            // //check if the userEmail address is invalid $secure_check
            // $secure_check = sanitize_my_userEmail($userEmail);

            // if ($secure_check == false) {
            //     echo "Invalid input";
            // } else { //send userEmail 
            //     mail($userEmail, $subject, $body, $headers);
            // }

            // $_SESSION["userName"] = $userName;
            // $_SESSION['userid'] = $userID;
            // header("Location: registerstaff.php");
        }
    } else {
        ?>

        <script src="../../js/jquery.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery("#error").text("*Your password is different with confirmed password");
            });
        </script>

<?php
    }
    header("Location: viewStaff.php");
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
                        <h2 class="content-header-title float-left mb-0">Register Staff</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Profile</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Staff</a>
                                </li>
                                <li class="breadcrumb-item active">Add Staff
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
                                                <label class="form-label" for="staffName">Full Name</label>
                                                <input type="text" name="staffName" id="staffName" class="form-control" placeholder="Kevin" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="gender">Gender</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="Male">
                                                        <label class="custom-control-label" for="customRadio1">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="Female">
                                                        <label class="custom-control-label" for="customRadio2">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="contact">Contact</label>
                                                <input type="text" name="contact" id="contact" class="form-control" placeholder="012-345678" />
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="speciality">Speciality</label>
                                                <select class="select2 w-100" name="speciality" id="speciality" multiple>
                                                    <option>Pet Grooming Servicing</option>
                                                    <option>Pet Hotel Management</option>
                                                    <option>Vet Doctoring</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="content-header"><br>
                                            <h5 class="mb-0">Account Details</h5>
                                            <small class="text-muted">Enter Your Account Details</small>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="userEmail">Email</label>
                                                <input type="text" name="userEmail" id="userEmail" class="form-control" placeholder="user123@gmail.com" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="userName">User Name</label>
                                                <input type="text" name="userName" id="userName" class="form-control" placeholder="User123 " aria-label="user" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group form-password-toggle col-md-6">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            </div>
                                            <div class="form-group form-password-toggle col-md-6">
                                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                                <input type="password" name="cpassword" id="confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            </div>
                                        </div><br>
                                        <div class="d-flex flex-row-reverse justify-content-right">
                                            <button name="submit" type="submit" style="float:right;" class="btn btn-primary mr-1">Submit</button>
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