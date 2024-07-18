<?php
$title = "Forgot Password";
require "./header.php";
?>
<div class="nk-split-content  nk-block-area-column nk-auth-container bg-white">
    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
        <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                class="icon ni ni-info"></em></a>
    </div>
    <div class="nk-block nk-block-middle nk-auth-body">
        <div class="brand-logo pb-5">
            <a href="html/index.php" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                    alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png"
                    srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Forgot Your Password?</h5>
                <div class="nk-block-des">
                    <p>No worries! It happens to the best of us. Just enter your email address
                        below, and we'll send you a link to reset your password.</p>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <form action="./handler/script.php" method="POST" class="form-validate is-alter" autocomplete="off">
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="email-address">Email</label>
                </div>
                <div class="form-control-wrap">
                    <input autocomplete="off" type="email" class="form-control form-control-lg" required
                        id="email-address" placeholder="Enter your email address" name="email">
                </div>
                <span class="text-danger" id="errMsg"></span>
            </div><!-- .form-group -->

            <div class="form-group">

                <button disabled class="btn btn-lg btn-primary btn-block" name="sendLink">Send
                    Reset
                    Link</button>
            </div>
        </form><!-- form -->
        <div class="form-note-s2 pt-4"> Already a member? <a href="./auth/login.php">Login</a>
        </div>


    </div><!-- .nk-block -->

</div>

<script>
    let email = document.querySelector("input[type='email']");
    let button = document.querySelector("button");
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let errMsg = document.querySelector("#errMsg");
    email.onkeyup = async () => {
        if (emailRegex.test(email.value)) {
            try {
                const req = await fetch(`./handler/ajax.php?verifyemail=${email.value}`);
                const resp = await req.text();
                if (resp) {
                    button.disabled = false;
                    errMsg.innerHTML = "";
                } else {
                    button.disabled = true;
                    errMsg.innerHTML = "We couldn't find this email.";
                }
            } catch (err) {
                console.error(err)
            }
        } else {
            errMsg.innerHTML = "";
        }
    }
</script>

<?php
require "./footer.php";
?>