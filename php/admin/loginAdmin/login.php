<?php

include '../../connect.php';

if (isset($_POST['signin'])) {
    //$userID = $_POST['userID'];
    //$userName = $_POST['userName'];
    //$userType = $_POST['userType'];
    //$userPhone = $_POST['userPhone'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $result = mysqli_query($connect, "SELECT * FROM user WHERE userEmail='$userEmail' AND password='$password'")
        or die($mysqli->error);

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
        }
        header("location:../../admin/account/account.php");
    } else {
        // Swal.fire({
        //     icon: 'error',
        //     title: 'Please Try Again',
        //     text: 'Invalid email or password!',
        //   })
        echo "Invalid email or password";
    }
}

include 'headerlogin.php';
?>

<!-- Login-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title font-weight-bold mb-1">Welcome to<br> Pet Care Management Admin Login </h2>
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
</div>
</div>
</div>
</div>
</div>
<!-- END: Content-->



</body>
<!-- END: Body-->

</html>