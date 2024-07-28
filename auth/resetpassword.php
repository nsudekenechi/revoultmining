<?php
$title = "Reset Password";
require_once "./header.php";
if (isset($_GET["token"])) {
    $token = $_GET["token"];
} else {
    header("Location: ./auth/login.php");
}
?>


<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h5 class="nk-block-title">Update Your Password</h5>
        <div class="nk-block-des">
            <p>Keep your account secure with a strong password! Take a moment to update
                your password below.</p>
        </div>
    </div>
</div><!-- .nk-block-head -->
<form action="./handler/script.php" method="POST" class="form-validate is-alter" autocomplete="off">

    <div class="form-group">
        <div class="form-label-group">
            <label class="form-label" for="password">Passcode</label>

        </div>
        <div class="form-control-wrap">
            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            </a>
            <input autocomplete="new-password" type="password" class="form-control form-control-lg" required
                id="password" placeholder="Enter your passcode" name="password">
            <input type="text" hidden name="token" value="<?= $token; ?>" id="">
        </div>
    </div><!-- .form-group -->
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" name="updatePassword">Update</button>
    </div>
</form><!-- form -->




<?php
require_once "./footer.php";
?>