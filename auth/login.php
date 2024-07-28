<?php
$title = "Login";
require_once "./header.php";
?>

<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h5 class="nk-block-title">Sign-In</h5>
        <div class="nk-block-des">
            <p>Log in with your details</p>
        </div>
    </div>
</div><!-- .nk-block-head -->
<form action="./handler/script.php" method="POST" class="form-validate is-alter" autocomplete="off">
    <div class="form-group">
        <div class="form-label-group">
            <label class="form-label" for="email-address">Email</label>
        </div>
        <div class="form-control-wrap">
            <input autocomplete="off" type="text" class="form-control form-control-lg" required id="email-address"
                placeholder="Enter your email address" name="email">
        </div>
    </div><!-- .form-group -->
    <div class="form-group">
        <div class="form-label-group">
            <label class="form-label" for="password">Passcode</label>
            <a class="link link-primary link-sm" tabindex="-1" href="./auth/forgotpassword.php">Forgot
                Password?</a>
        </div>
        <div class="form-control-wrap">
            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            </a>
            <input autocomplete="new-password" type="password" class="form-control form-control-lg" required
                id="password" placeholder="Enter your passcode" name="password">
        </div>
    </div><!-- .form-group -->
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" name="login">Sign in</button>
    </div>
</form><!-- form -->
<div class="form-note-s2 pt-4"> New on our platform? <a href="./auth/register.php">Create an
        account</a>
</div>



<?php
require_once "./footer.php";
?>