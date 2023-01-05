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

if (isset($_POST['signup'])) {
    session_start();

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $cpassword = $_POST["cpassword"];
    $userGroup = "customer";
    $password = base64_encode($password);
    $cpassword = base64_encode($cpassword);



    if ($password == $cpassword) {
        $result = mysqli_query($conn, "SELECT * FROM user where publish = '1'");

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

            mysqli_query($conn, "INSERT INTO user(userName,userEmail,password,userGroup) VALUES('$userName','$userEmail','$password','$userGroup')")
                or die($conn->error);

            $cid = mysqli_query($conn, "SELECT max(userID) as userID FROM user");
            $crow = mysqli_fetch_assoc($cid);
            $userID = $crow['userID'];

            $subject = "Verification Code";
            $body = $verify;
            $headers = "From: Pet Care Management";

            //check if the email address is invalid $secure_check
            $secure_check = sanitize_my_email($userEmail);

            if ($secure_check == false) {
                echo "Invalid input";
            } else { //send email 
                mail($userEmail, $subject, $body, $headers);
            }

            $_SESSION["username"] = $username;
            $_SESSION['userid'] = $userID;
            header("Location: verify.php");
            ?>
            <script>
                typeSuccess.on('click', function() {
                    toastr['success']('👋 You have successfully registered.', 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: isRtl
                    });
                });
            </script>
        <?php
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
    header("Location: verify.php");
}
include '../authheader.php';

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
                <label class="form-label" for="register-password">Confirm Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="register-password" type="password" name="cpassword" placeholder="············" aria-describedby="register-password" tabindex="3" />
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