<?php
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
                NioApp.Toast('Incorrect email or password', 'error');
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


}
