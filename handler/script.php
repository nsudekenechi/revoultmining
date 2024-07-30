<?php
require_once "../dbase/config.php";
require_once "./email.php";
$url = "http://localhost/Zenixmining";
session_start();

// register-user
if (isset($_POST["register"])) {
    extract($_POST);
    print_r($_POST);
    $password = password_hash($password, PASSWORD_DEFAULT);
    if (isset($_SESSION["ref"])) {
        $ref = $_SESSION["ref"];
        $query = "INSERT INTO users (name, username,email, password, phone_number, country, state, address, account_type, ref) VALUES ('$name', '$username','$email', '$password', '$phone_number', '$country', '$state', '$address', '$account_type', '$ref')";
    } else {
        $query = "INSERT INTO users (name, username,email, password, phone_number, country, state, address, account_type) VALUES ('$name', '$username','$email', '$password', '$phone_number', '$country', '$state', '$address', '$account_type')";
    }

    $res = mysqli_query($conn, $query);
    if ($res) {
        $_SESSION["otp_email"] = $email;
        // creating OTP in DB
        $OTP = rand(100000, 999999);
        // removing already existing otp,  so that otp can't be used twice
        $query = "SELECT * FROM send_otp WHERE email = '$email'";
        $res = mysqli_query($conn, $query);

        if ($res->num_rows > 0) {
            $query = "DELETE FROM send_otp WHERE email = '$email'";
            $res = mysqli_query($conn, $query);
        }

        $query = "INSERT INTO send_otp (email, otp) VALUES ('$email', $OTP)";
        $res = mysqli_query($conn, $query);

        // sending user OTP
        $greeting = "Hi $name,";
        $body = "<p style='margin-bottom: 5px;'>Welcome to Zenixmining! To complete your registration and verify your account, please use the One-Time Password (OTP) below:</p>
    <p style='margin-bottom: 5px;'>Your OTP: $OTP.</p>
    ";
        sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Verify Your Account - Welcome to Zenixmining!", $email);
        header("Location: ../auth/otp.php");
    } else {
        header("Location: ./auth/register.php?auth=f");
    }
}

// login user
if (isset($_POST["login"])) {
    extract($_POST);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $hashPassword = $row["password"];
        $name = $row["name"];
        if (password_verify($password, $hashPassword)) {
            if ($row["name"] != "admin") {
                // storing in email in session incase we want to resend OTP 
                $_SESSION["otp_email"] = $email;
                // creating OTP in DB
                $OTP = rand(100000, 999999);
                // removing already existing otp,  so that otp can't be used twice
                $query = "SELECT * FROM send_otp WHERE email = '$email'";
                $res = mysqli_query($conn, $query);
                if ($res->num_rows > 0) {
                    $query = "DELETE FROM send_otp WHERE email = '$email'";
                    $res = mysqli_query($conn, $query);
                }
                $query = "INSERT INTO send_otp (email, otp) VALUES ('$email', $OTP)";
                $res = mysqli_query($conn, $query);
                // sending user OTP
                $greeting = "Hi $name,";
                $body = "<p style='margin-bottom: 5px;'>To ensure the security of your account, please use the following One-Time Password (OTP) to complete your login:</p>
            <p style='margin-bottom: 5px;'>Your OTP: $OTP.  Please do not share this code with anyone.</p>
            ";
                sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Your One-Time Password (OTP) for Secure Login", $email);

                header("Location: ../auth/otp.php");
            } else {
                // authentication for admin
                $query = "SELECT id FROM users WHERE name = 'admin'";
                $res = mysqli_query($conn, $query);
                $_SESSION["user"] = $res->fetch_column();
                header("Location: ../admin/index.php");
            }

        } else {
            header("Location: ../auth/login.php?login=f");
        }
    } else {
        header("Location: ../auth/login.php?login=f");
    }
}

//verify OTP
if (isset($_POST["verifyOTP"])) {
    extract($_POST);
    $query = "SELECT * FROM send_otp WHERE otp = '$otp'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        // destroying otp sessions
        session_destroy();
        // creating login session
        session_start();
        $email = $res->fetch_assoc()["email"];
        $query = "SELECT id FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $query);
        $_SESSION["user"] = $res->fetch_column();
        $query = "DELETE FROM send_otp WHERE otp = '$otp'";
        $res = mysqli_query($conn, $query);
        header("Location: ../dashboard/index.php?auth=s");
    } else {
        header("Location: ../auth/otp.php?verifyOTP=f");
    }
}

// send reset link
if (isset($_POST["sendLink"])) {
    extract($_POST);
    $token = rand(100000, 999999);
    $query = "SELECT * FROM reset_password WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    if ($res->num_rows > 0) {
        $query = "DELETE FROM reset_password WHERE email = '$email'";
        $res = mysqli_query($conn, $query);
    }

    $query = "INSERT INTO reset_password (token, email) VALUES ($token, '$email')";
    $res = mysqli_query($conn, $query);

    // sending user OTP
    $query = "SELECT name from users WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    $name = $res->fetch_column();
    $greeting = "Hi $name,";
    $body = "<p style='margin-bottom: 5px;'>We received a request to reset your password for your account associated with this email address. If you made this request, please click the link below to reset your password:</p>
        <a href='$url/auth/resetpassword.php?token=$token' style='background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px;margin-top: 20px; '>Reset Password</a>
     
      ";
    $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Password Reset", $email);
    if ($send) {
        header("Location: ../auth/forgotpassword.php?send=s");
    } else {
        header("Location: ../auth/forgotpassword.php?send=f");
    }
}

// update password
if (isset($_POST["updatePassword"])) {
    extract($_POST);
    // getting email from reset password
    $query = "SELECT email FROM reset_password WHERE token='$token'";
    $res = mysqli_query($conn, $query);
    $email = $res->fetch_column();
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    // updating password 
    $query = "UPDATE users SET password = '$hashPassword' WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    // removing token from reset password
    $query = "DELETE FROM reset_password WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: ../auth/login.php?update=s");
    }
}

// deposit 
if (isset($_POST["deposit"])) {
    extract($_POST);
    print_r($_POST);
    $date = date("d D M, Y");
    $query = "INSERT INTO deposits (user, amount, wallet, date, plan) VALUES ('$user', '$amount', '$wallet', '$date', '$plan')";
    $res = mysqli_query($conn, $query);
    if ($res) {
        // getting deposit id so we can access all details on modal
        $query = "SELECT  id FROM deposits WHERE user='$user' ORDER BY id DESC LIMIT 1";
        $res = mysqli_query($conn, $query);
        $id = $res->fetch_column();
        header("Location: ../dashboard/confirmdeposit.php?id=$id");
    } else {
        header("Location: ../dashboard/deposit.php?plan_id=$plan&deposit=f");
    }
}

// confirming deposit
if (isset($_POST["complete"])) {
    extract($_POST);
    extract($_FILES);
    $query = "SELECT proof FROM deposits WHERE id = '$id'";
    $res = mysqli_query($conn, $query);
    if (!$res->fetch_column()) {


        $proofName = "deposit_$id." . pathinfo($proof["name"], PATHINFO_EXTENSION);
        if (move_uploaded_file($proof['tmp_name'], "../uploads/$proofName")) {
            // updating proof value
            $query = "UPDATE deposits SET proof='$proofName' WHERE id='$id'";
            $res = mysqli_query($conn, $query);
            // sending user confirmation email
            $query = "SELECT *, users.name as user_name, wallet.name as wallet_name FROM deposits 
    JOIN users on users.id= deposits.user
    JOIN plans on plans.id = deposits.plan
    JOIN wallet_address as wallet on wallet.id=deposits.wallet
    WHERE deposits.id='$id' 
    ";
            $res = mysqli_query($conn, $query);
            $row = $res->fetch_assoc();
            $amount = $row['amount'];
            $toCoin = $row['rate'] * $row['amount'];
            $coinType = strtoupper($row['acronym']);
            $walletName = $row['wallet_name'];
            $user_name = $row['user_name'];
            $greeting = "Hi  $user_name,";
            $body = "<p style='margin-bottom: 5px;'>We are writing to inform you that we have received your recent deposit request. Our team is currently processing it, and we will confirm the transaction shortly.</p>
  ";

            $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Deposit Request Received", $row['email']);

            if ($send) {
                // alerting admin of deposit
                $query = "SELECT email FROM users WHERE name='admin'";
                $res = mysqli_query($conn, $query);
                $adminEmail = $res->fetch_column();
                $greeting = "Hello admin, ";
                $body = "<p style='margin-bottom: 5px;'>A user, $user_name made a deposit request of  $toCoin $coinType on your $walletName wallet. Please verify the deposit.</p>";
                $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Withdrawal Request Received", $adminEmail);
                if ($send) {
                    header("Location: ../dashboard/index.php?confirmdeposit=s");
                } else {
                    header("Location: ../dashboard/confirmdeposit.php?confirmdeposit=f");
                }

            } else {
                header("Location: ../dashboard/confirmdeposit.php?confirmdeposit=f");
            }
        }
    } else {
        header("location: ../dashboard/index.php?confirmdeposit=a");
    }
}



if (isset($_POST["withdraw"])) {
    extract($_POST);
    $date = date('d D M, Y');
    // deducting user's amount
    $query = "UPDATE users SET balance = balance - $amount WHERE id = '$user'";
    $res = mysqli_query($conn, $query);

    $query = "INSERT INTO withdraws (user, address, amount, wallet, date) VALUES ('$user', '$wallet_address', '$amount',  '$wallet','$date')";
    $res = mysqli_query($conn, $query);

    // sending withdrawal email to user
    $query = "SELECT * FROM users WHERE id ='$user'";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];
    $amount = number_format($amount, 2);
    $greeting = "Hello $name,";
    $body = "<p style='margin-bottom: 5px;'>We received your request of £$amount, your wallet would be credited in 24 hours</p>";
    $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Withdrawal Request", $email);

    // sending withdrawal email to admin
    $query = "SELECT email FROM users WHERE name='admin'";
    $res = mysqli_query($conn, $query);
    $adminEmail = $res->fetch_column();
    $greeting = "Hello admin,";

    $body = "<p style='margin-bottom: 5px;'>$name made a withdrawal request of £$amount, check your dashboard for more information</p>";
    $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Deposit Request Received", $adminEmail);

    if ($send) {
        header("Location: ../dashboard/index.php?withdraw=s");
    } else {
        header("Location: ../dashboard/index.php?withdraw=f");
    }
}

if (isset($_POST["add_wallet"])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
    $query = "SELECT * FROM users_wallet WHERE user = '$user' AND wallet = '$wallet'";
    $res = mysqli_query($conn, $query);
    if ($res->num_rows < 1) {
        $query = "INSERT INTO users_wallet (wallet, user, address) VALUES ('$wallet', '$user', '$wallet_address')";
        $res = mysqli_query($conn, $query);
        if ($res) {
            header("Location: ../dashboard/wallets.php?wallet_add=s");
        } else {
            header("Location: ../dashboard/wallets.php?wallet_add=f");
        }
    } else {
        $query = "UPDATE users_wallet SET address='$wallet_address' WHERE  user = '$user' AND wallet = '$wallet'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            header("Location: ../dashboard/wallets.php?wallet_update=s");
        } else {
            header("Location: ../dashboard/wallets.php?wallet_update=f");
        }
    }

}

// update user profile 
if (isset($_POST["update_profile"])) {
    extract($_POST);
    print_r($_POST);
    $query = "UPDATE users SET name='$name', phone_number='$phone_number', country='$country', state='$state', address = '$address', account_type = '$account_type' WHERE id = '$user'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        header("Location: ../dashboard/profile.php?update_profile=s");
    } else {
        header("Location: ../dashboard/profile.php?update_profile=f");
    }

}