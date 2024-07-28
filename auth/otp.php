<?php
$title = "OTP";
require_once "./header.php";
?>

<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h5 class="nk-block-title">Enter OTP</h5>
        <div class="nk-block-des">
            <p>Please enter the One-Time Password (OTP) sent to your email to proceed
                with the login.</p>
        </div>
    </div>
</div><!-- .nk-block-head -->
<form action="./handler/script.php" method="POST" class="form-validate is-alter" autocomplete="off">

    <div class="form-group">

        <div class="form-control-wrap">

            <input autocomplete="new-password" type="text" class="form-control form-control-lg" required id="password"
                placeholder="Enter 6-digit code" name="otp">
        </div>
    </div><!-- .form-group -->
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" name="verifyOTP">Verify
            OTP</button>
    </div>
</form><!-- form -->
<div class="form-note-s2 pt-4">
    <p>Didn't receive the code?</p>
    <li> Check your spam or junk folder.</li>
    <li> Ensure your email address is correct</li>
    <li id="resendOTP" style="text-decoration:underline; cursor: pointer;">
        Resend OTP
    </li>
</div>


<script>
    let isClicked = false;
    let resendOtp = document.querySelector("#resendOTP")
    resendOtp.onclick = () => {
        if (!isClicked) {
            isClicked = true;
            fetch("./handler/ajax.php?resend_otp").then(res => res.text()).then(data => {
                if (data) {
                    alert("Sent")
                }
            }).catch(err => {
                console.error(err);
            }).finally(() => {
                isClicked = false;
            })
        } else {
            alert("Please wait")
        }

    }
</script>
<?php
require_once "./footer.php";
?>