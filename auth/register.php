<?php
$title = "Register";
require_once "./header.php";
?>

<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h5 class="nk-block-title">Register</h5>
        <div class="nk-block-des">
            <p>Create New Zenixmining Account</p>
        </div>
    </div>
</div><!-- .nk-block-head -->
<form action="./handler/script.php" method="POST">
    <div class="form-group">
        <label class="form-label" for="name">Name</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name"
                required>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label" for="email">Email</label>
        <div class="form-control-wrap">
            <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter your email address"
                name="email" required>
            <span class="text-danger" id="errMsg"></span>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label" for="password">Passcode</label>
        <div class="form-control-wrap">
            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            </a>
            <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode"
                name="password" required minlength="8">
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-control-xs custom-checkbox checked">
            <input type="checkbox" class="custom-control-input" id="checkbox" required>
            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a tabindex="-1" href="#">Privacy
                    Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" name="register">Register</button>
    </div>
    <div class="form-note-s2 pt-4"> Already a member? <a href="./auth/login.php">Login</a>
    </div>
</form><!-- form -->



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
                    button.disabled = true;
                    errMsg.innerHTML = "Email already exists.";

                } else {
                    button.disabled = false;
                    errMsg.innerHTML = "";
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
require_once "./footer.php";
?>