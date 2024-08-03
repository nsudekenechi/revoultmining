<?php
error_reporting(0);
if (isset($_GET)) {

    switch ($_GET["auth"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Registration Successful', 'info', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Something went wrong', 'error', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;

    }

    switch ($_GET["login"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('You logged in successfully', 'info', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Incorrect email or password', 'error', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;

    }

    switch ($_GET["sendotp"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('OTP sent succesfully, check your email', 'info', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Failed to send OTP.', 'error', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;

    }

    switch ($_GET["updatepassword"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Your password was updated succesfully', 'info', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Failed to update password.', 'error', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;

    }

    switch ($_GET["verifyOTP"]) {

        case "f":
            ?>
            <script>
                NioApp.Toast('Incorrect code, verify code and try again.', 'error', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;

    }

    switch ($_GET["id"]) {

        case "f":
            ?>
            <script>
                NioApp.Toast('Incorrect code, verify code and try again.', 'error', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;

    }

    switch ($_GET["confirmdeposit"]) {
        case "s":
            ?>

            <script>
                NioApp.Toast('Deposit request sent, your balance would be updated after confirmation.', 'success', { timeOut: 5000, position: "top-right" });
            </script>

            <?php
            break;
    }

    switch ($_GET["balance"]) {
        case "f":
            ?>
            <script>
                NioApp.Toast(`You don't have enough funds to withdraw. Please deposit into your account.`, 'error', { timeOut: 5000, position: "top-right" });
            </script>
        <?php
    }

    switch ($_GET["withdraw"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Your withdrawal request was sent.', 'success', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Your withdrawal request failed.', 'error', { timeOut: 5000, position: "top-right" });
            </script>
        <?php
    }

    switch ($_GET["wallet_add"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Wallet added', 'success', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Wallet added failed', 'error', { timeOut: 5000, position: "top-right" });
            </script>
        <?php
    }

    switch ($_GET["wallet_update"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Wallet Updated', 'success', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Wallet updated failed', 'error', { timeOut: 5000, position: "top-right" });
            </script>
        <?php
    }

    switch ($_GET["update_profile"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Profile Updated', 'success', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Profile Updated Failed', 'error', { timeOut: 5000, position: "top-right" });
            </script>
        <?php
    }


    // admin alerts
    switch ($_GET["approve_withdraw"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Withdrawal Approved', 'success', { timeOut: 5000, position: "top-right" });
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Withdrawal Aprroved failed', 'error', { timeOut: 5000, position: "top-right" });
            </script>
        <?php
    }


}
