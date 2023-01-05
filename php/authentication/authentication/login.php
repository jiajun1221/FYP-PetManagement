<?php

include '../../connect.php';
session_start();
unset($_SESSION['userName']);
unset( $_SESSION['userEmail']);
unset($_SESSION['password']);
unset($_SESSION['userID']);

if (isset($_POST['signin'])) {
    $userEmail = $_POST['userEmail'];
    $password = base64_encode($_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM user WHERE userEmail='$userEmail' AND password='$password'")
        or die($mysqli->error);

    $fp = fopen("testing.txt", "w");
    $write["post"] = $_POST;
    $write["query"] = "SELECT * FROM user WHERE userEmail='$userEmail' AND password='$password'";
    $write["result"] = $result;
    fwrite($fp, print_r($write, true));
    fclose($fp);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userName = $row['userName'];
            $userEmail = $row['userEmail'];
            $password = $row['password'];
            session_start();
            $_SESSION['userName'] = $userName;
            $_SESSION['userEmail'] = $userEmail;
            $_SESSION['password'] = $password;
            $_SESSION['userID'] = $row['userID'];

            if ($row['userGroup'] == 'admin') {
                header("Location: ../../admin/general/account.php");
            } else if ($row['userGroup'] == 'staff') {
                header("Location: ../../staff/general/account.php");
            } else if ($row['userGroup'] == 'customer') {
                header("Location: ../../customer/general/account.php");
            } else {
                echo "Your not logged in";
            }
        }
    } else {
        
        echo '<script>alert("Invalid Information")</script>';

        
        // <script> 
        // swal({
        //     icon: 'error',
        //     title: 'Please Try Again',
        //     text: 'Invalid email or password!',
        //   }) </script>
        
    }
}

include '../authheader.php';
?>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>

<!-- Login-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title font-weight-bold mb-1">Welcome to<br> Pet Care Management Login Page </h2>
        <p class="card-text mb-2">Please sign-in to your account </p>
        <form class="auth-login-form mt-2" method="POST">
            <div class="form-group">
                <label class="form-label" for="login-email">Email</label>
                <input class="form-control" id="login-email" type="text" name="userEmail" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label for="login-password">Password</label><a href="forgetpassword.php"><small>Forgot Password?</small></a>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                    <label class="custom-control-label" for="remember-me"> Remember Me</label>
                </div>
            </div>
            <button name="signin" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
        </form>
        <p class="text-center mt-2"><span>New on our platform?</span><a href="register.php"><span>&nbsp;Create an account</span></a></p>

    </div>
</div>
<!-- /Login-->

<!-- END: Content-->



</body>
<!-- END: Body-->

</html>