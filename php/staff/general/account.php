<?php

include '../../connect.php';
include '../header.php';

if (isset($_GET['update'])) {
    $userID = $_GET['userID'];
    $userName = $_GET['userName'];
    $name = $_GET['name'];
    mysqli_query($conn, "UPDATE user SET userName='$userName', image='$image' WHERE userID = '$userID'")
        or die($mysqli->error);

        echo "<script>alert('Record has been updated');</script>";
    unset($_GET);
    header('location:account.php');
}

$userID = $_SESSION['userID'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE userID='$userID'");
unset($_GET['edit']);
$row = $result->fetch_array();

$fp = fopen("testing.txt", "w");
$write["result"] = $result;
$write["row"] = $row;
$write["query"] = "SELECT * FROM user WHERE userID='$userID'";
fwrite($fp, print_r($write, true));
fclose($fp);

$userID = $row['userID'];
$userName = $row['userName'];
$userEmail = $row['userEmail'];
$userGroup = $row['userGroup'];
$password = base64_decode($row['password']);



if (isset($_GET['update2'])) {
    if ($password == $_GET['oldpassword']) {
        $newpassword = $_GET['newpassword'];
        $cnewpassword = $_GET['confirm-newpassword'];

        if ($newpassword == $cnewpassword) {
            $newpassword = base64_encode($newpassword);
            mysqli_query($conn, "UPDATE user SET password='$newpassword' WHERE userID=$userID")
                or die($mysqli->error);

            $_SESSION['message'] = "Password has been updated!";
            $_SESSION['msg_type'] = "success";
            header('location:account.php?#account-vertical-password');

            unset($_GET);
        } else {
            echo "Comfirm password must be same as New Password";
        }
    } else {
        echo "Invalid old password";
    }
}

?>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> Account Settings
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                            <!-- general -->
                            <li class="nav-item">
                                <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-3 mr-1">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="font-weight-bold">General</span>
                                </a>
                            </li>
                            <!-- change password -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock font-medium-3 mr-1">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <span class="font-weight-bold">Change Password</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                        <!-- header media -->
                                        <div class="media">
                                            <a href="javascript:void(0);" class="mr-25">
                                                <img src="../../../app-assets/img/user.png" id="account-upload-img" class="rounded mr-50" alt="profile image" height="80" width="80">
                                            </a>
                                            <!-- upload and reset button -->
                                            <div class="media-body mt-75 ml-1">
                                                <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75 waves-effect waves-float waves-light">Upload</label>
                                                <input type="file" id="account-upload" hidden="" accept="image/*">
                                                <button class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                                <p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
                                            </div>
                                            <!--/ upload and reset button -->
                                        </div>
                                        <!--/ header media -->

                                        <!-- form -->
                                        <form class="validate-form mt-2" novalidate="novalidate" method="GET">
                                            <input type="hidden" name="userID" value="<?php echo $userID ?>">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">Username</label>
                                                        <input type="text" class="form-control" id="account-username" name="userName" placeholder="Username" value="<?php echo $userName ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input readonly type="email" class="form-control" id="account-e-mail" name="userEmail" placeholder="Email" value="<?php echo $userEmail ?>">
                                                    </div>
                                                </div>
                                                <div class=" col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-usertype">User Type</label>
                                                        <input readonly type="text" class="form-control" id="userGroup" name="userGroup" placeholder="UserType" value="<?php echo $userGroup ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" name="update" class="btn btn-primary mt-2 mr-1 waves-effect waves-float waves-light">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-2 waves-effect">Cancel</button>
                                                    <button type="logout" style="float:right;" class="btn btn-outline-secondary mt-2 waves-effect"><a href="../../authentication/authentication/login.php">Log Out</button></a>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ general tab -->

                                    <!-- change password -->
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-old-password">Old Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="account-old-password" name="oldpassword" placeholder="Old Password">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                        <circle cx="12" cy="12" r="3"></circle>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-new-password">New Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" id="account-new-password" name="newpassword" class="form-control" placeholder="New Password">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                        <circle cx="12" cy="12" r="3"></circle>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-retype-new-password">Retype New Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="account-retype-new-password" name="confirm-newpassword" placeholder="New Password">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                        <circle cx="12" cy="12" r="3"></circle>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" name="update2" class="btn btn-primary mr-1 mt-1 waves-effect waves-float waves-light">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ change password -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->

        </div>
    </div>
</div>