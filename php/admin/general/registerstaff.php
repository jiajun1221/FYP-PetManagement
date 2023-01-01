<?php

include '../../connect.php';

function sanitize_my_email($field)
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

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $cpassword = $_POST["cpassword"];
    $userGroup = "staff";
    $password = base64_encode($password);
    $cpassword = base64_encode($cpassword);


    
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

            mysqli_query($connect, "INSERT INTO user(userName,userEmail,password,userGroup) VALUES('$userName','$userEmail','$password','$userGroup')")
                or die($connect->error);

            $cid = mysqli_query($connect, "SELECT max(userID) as userID FROM user");
            $crow = mysqli_fetch_assoc($cid);
            $userID = $crow['userID'];

            // //verification
            // $subject = "Verification Code";
            // $body = $verify;
            // $headers = "From: Pet Care Management";

            // //check if the email address is invalid $secure_check
            // $secure_check = sanitize_my_email($userEmail);

            // if ($secure_check == false) {
            //     echo "Invalid input";
            // } else { //send email 
            //     mail($userEmail, $subject, $body, $headers);
            // }

            // $_SESSION["username"] = $username;
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
    header("Location: registerstaff.php");
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
                        <h2 class="content-header-title float-left mb-0">Register Staff</h2>

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
                                <h4 class="card-title">Add Staff</h4>
                            </div>
                            <div class="card-body"><br>
                                <form class="form form-horizontal" method="POST" action="registerStaff.php">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="customerName">Staff ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input class="form-control" id="register-staffid" type="text" name="staffID" placeholder="001" aria-describedby="register-staffid" autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="customerName">User Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input class="form-control" id="register-username" type="text" name="userName" placeholder="user" aria-describedby="register-username" autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="email">Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="register-email" type="text" name="userEmail" placeholder="user123@example.com" aria-describedby="register-email" tabindex="2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="contact">Password</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input class="form-control form-control-merge" id="register-password" type="password" name="password" placeholder="············" aria-describedby="register-password" tabindex="3" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="address">Comfirm Password </label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input class="form-control form-control-merge" id="register-password" type="password" name="cpassword" placeholder="············" aria-describedby="register-password" tabindex="3" />
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