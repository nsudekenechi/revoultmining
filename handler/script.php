<?php
require_once "../dbase/config.php";
require_once "./email.php";
session_start();

// register-user
if (isset($_POST["register"])) {
    extract($_POST);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $res = mysqli_query($conn, $query);
    if ($res) {
        $greeting = "Hi $name";
        $body = "<p style='margin-bottom:10px'>Welcome aboard!</p>
        <p>We're thrilled to have you join our investment platform. To continue, log in with your details and explore the endless possibilities.
        If you have any questions or need assistance, our support team is here to help.
        </p>
        ";
        $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Welcome to Revoultmining", $email);

        if ($send) {
            header("location: ../auth/login.php?register=s");
        } else {
            header("location: ../auth/register.php?register=f");
        }
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
            // storing in email in session incase we want to resend OTP 
            $_SESSION["user_email"] = $email;
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
            <ol>
                <li>Visit our Login Page.</li>
                <li>Enter your username and password.</li>
                <li>When prompted, enter the OTP code provided above.</li>
            </ol>
            <p>If you did not request this OTP, please contact our support team immediately.</p>
            ";
            sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Your One-Time Password (OTP) for Secure Login", $email);

            header("Location: ../auth/otp.php");
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
        $query = "DELETE FROM send_otp WHERE otp = '$otp'";
        $res = mysqli_query($conn, $query);
        header("Location: ../dashboard/index.php");
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
        <a href='http://localhost/revoultmining/dashboard/resetpassword.php?token=$token' style='background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px;margin-top: 20px; '>Reset Password</a>
     
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