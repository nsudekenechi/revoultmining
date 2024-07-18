<?php
require_once "./header.php";
?>
<div class="nk-split-content  nk-block-area-column nk-auth-container bg-white">
    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
        <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                class="icon ni ni-info"></em></a>
    </div>
    <div class="nk-block nk-block-middle nk-auth-body">
        <div class="brand-logo pb-5">
            <a href="html/index.html" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                    alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png"
                    srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>
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

                    <input autocomplete="new-password" type="text" class="form-control form-control-lg" required
                        id="password" placeholder="Enter 6-digit code" name="otp">
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


    </div><!-- .nk-block -->

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