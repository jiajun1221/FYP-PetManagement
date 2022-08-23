<?php

include '../../connect.php';

session_start();
if (isset($_POST['verify'])) {
    if ($_SESSION['verify'] == ($_POST['verify2'])) {
        $userName= $_SESSION['userName'];
        $userEmail= $_SESSION['userEmail'];
        $password= $_SESSION['password'];
        mysqli_query($connect, "INSERT INTO `user`(userName,userEmail,password) VALUES('$userName','$userEmail','$password')")
        or die($mysqli->error);
        unset($_SESSION);
        ?>


        <script>
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'Success'
            );
        </script>
<?php header("Location: login.php");
    }
}
include 'headerlogin.php';
$characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$verify2 = '';
for ($i = 0; $i < 6; $i++) {
    $verify2 .= $characters[rand(0, $charactersLength - 1)];
}

$_SESSION['verify'] = $verify2;
?>
<script>
    alert("<?php echo $verify2 ?>");
</script>



<!-- Forgot password-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title font-weight-bold mb-1">Verify Password</h2>
        <p class="card-text mb-2">Enter your verified code</p>
        <form class="auth-forgot-password-form mt-2" method="POST">
            <div class="form-group">
                <label class="form-label" for="forgot-password-email">Verify Code</label>
                <input class="form-control" id="forgot-password-email" type="text" name="verify2" placeholder="123456" aria-describedby="forgot-password-email" autofocus="" tabindex="1" />
            </div>
            <button class="btn btn-primary btn-block" tabindex="2" name="verify">Verify</button>
        </form>
        <p class="text-center mt-2"><a href="login.php"><i data-feather="chevron-left"></i>Back to login</a></p>
    </div>
</div>
<!-- /Forgot password-->
</div>
</div>
</div>
</div>
</div>
<!-- END: Content-->
</body>

</html>