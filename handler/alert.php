<?php
error_reporting(0);
if (isset($_GET)) {

    switch ($_GET["register"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Registration Successful', 'info');
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Something went wrong', 'error');
            </script>
            <?php
            break;

    }

    switch ($_GET["login"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('You logged in successfully', 'info');
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Incorrect email or password', 'error', { position: "top-right" });
            </script>
            <?php
            break;

    }

    switch ($_GET["verifyOTP"]) {

        case "f":
            ?>
            <script>
                NioApp.Toast('Incorrect code, verify code and try again.', 'error');
            </script>
            <?php
            break;

    }

    switch ($_GET["id"]) {

        case "f":
            ?>
            <script>
                NioApp.Toast('Incorrect code, verify code and try again.', 'error');
            </script>
            <?php
            break;

    }

    switch ($_GET["confirmdeposit"]) {
        case "s":
            ?>

            <script>
                NioApp.Toast('Deposit request sent, your balance would be updated after confirmation.', 'success');
            </script>

            <?php
            break;
    }

    switch ($_GET["balance"]) {
        case "f":
            ?>
            <script>
                NioApp.Toast(`You don't have enough funds to withdraw. Please deposit into your account.`, 'error', { position: "top-right" });
            </script>
        <?php
    }

    switch ($_GET["withdraw"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Your withdrawal request was sent.', 'success');
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Your withdrawal request failed.', 'error');
            </script>
        <?php
    }

    switch ($_GET["wallet_add"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Wallet added', 'success');
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Wallet added failed', 'error');
            </script>
        <?php
    }

    switch ($_GET["wallet_update"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Wallet Updated', 'success');
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Wallet updated failed', 'error');
            </script>
        <?php
    }


    // admin alerts
    switch ($_GET["approve_withdraw"]) {
        case "s":
            ?>
            <script>
                NioApp.Toast('Withdrawal Approved', 'success');
            </script>
            <?php
            break;
        case "f":
            ?>
            <script>
                NioApp.Toast('Withdrawal Aprroved failed', 'error');
            </script>
        <?php
    }


}
