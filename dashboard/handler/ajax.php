<?php
session_start();
require_once "../dbase/config.php";
require_once "./email.php";
$user_email = $_SESSION["user_email"];

// resending OTP
if (isset($_GET["resend_otp"])) {
    // removing already existing otp,  so that otp can't be used twice
    $query = "SELECT * FROM send_otp WHERE email = '$user_email'";
    $res = mysqli_query($conn, $query);
    if ($res->num_rows > 0) {
        $query = "DELETE FROM send_otp WHERE email = '$user_email'";
        $res = mysqli_query($conn, $query);
    }
    // creating OTP in DB
    $OTP = rand(100000, 999999);
    $query = "INSERT INTO send_otp (email, otp) VALUES ('$user_email', $OTP)";
    $res = mysqli_query($conn, $query);

    // getting user's name
    $query = "SELECT name FROM users WHERE email = '$user_email'";
    $res = mysqli_query($conn, $query);
    $name = $res->fetch_column();
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
    $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Your One-Time Password (OTP) for Secure Login", $user_email);
    if ($send) {
        echo true;
    } else {
        echo false;
    }
}

// verifyingemail 
if (isset($_GET["verifyemail"])) {
    $email = $_GET["verifyemail"];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    if ($res->num_rows > 0) {
        echo true;
    } else {
        echo false;
    }
}