<?php 
include '../../connect.php';

if (isset($_POST['signup'])) {
    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    //$userType = $_POST['userType'];
    //$userPhone = $_POST['userPhone'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    mysqli_query($connect, "INSERT INTO user(userID,userName,userEmail,password) VALUES('$userID','$userName','$userEmail','$password')")
        or die($mysqli->error);

    header("Location: verify.php");
} 
include 'headerlogin.php';
?>

<!-- Register-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title font-weight-bold mb-1">Let's Create An Account</h2>
        <p class="card-text mb-2">Your Pets Are In Good Paws With Us!</p>
        <form class="auth-register-form mt-2" action="register.php" method="POST">
            <div class="form-group">
                <label class="form-label" for="register-username">Username</label>
                <input class="form-control" id="register-username" type="text" name="userName" placeholder="user" aria-describedby="register-username" autofocus="" tabindex="1" />
            </div>
            <div class="form-group">
                <label class="form-label" for="register-email">Email</label>
                <input class="form-control" id="register-email" type="text" name="userEmail" placeholder="user123@example.com" aria-describedby="register-email" tabindex="2" />
            </div>
            <div class="form-group">
                <label class="form-label" for="register-password">Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="register-password" type="password" name="password" placeholder="············" aria-describedby="register-password" tabindex="3" />
                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                    <label class="custom-control-label" for="register-privacy-policy">I agree to<a href="javascript:void(0);">&nbsp;privacy policy & terms</a></label>
                </div>
            </div>
            <button class="btn btn-primary btn-block" tabindex="5" name="signup">Sign up</button>
        </form>
        <p class="text-center mt-2"><span>Already have an account?</span><a href="login.php"><span>&nbsp;Sign in instead</span></a></p>
        <div class="divider my-2">
            <div class="divider-text">or</div>
        </div>
        <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>
    </div>
</div>
<!-- /Register-->
</div>
</div>
</div>
</div>
</div>
<!-- END: Content-->

</body>

</html>