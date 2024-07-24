<?php
require_once "../dbase/config.php";
require_once "./email.php";
// creating wallet 
if (isset($_POST["createwallet"])) {
    extract($_POST);
    extract($_FILES);
    $displayPictureName = $wallet_name . "display_picture." . pathinfo($displayPicture["name"], PATHINFO_EXTENSION);
    $qrCodeName = $wallet_name . "qr_code." . pathinfo($qrCode["name"], PATHINFO_EXTENSION);
    if (
        move_uploaded_file($qrCode["tmp_name"], "../uploads/$qrCodeName") && move_uploaded_file($displayPicture["tmp_name"], "../uploads/$displayPictureName")
    ) {
        $query = "INSERT INTO wallet_address (name, acronym, address, img, qr_code,rate) VALUES ('$wallet_name', '$wallet_acronym', '$wallet_address','$displayPictureName', '$qrCodeName', '$rate')";
        $res = mysqli_query($conn, $query);
        if ($res) {
            header("Location: ../admin/walletaddress_view.php?addwallet=s");
        } else {
            header("Location: ../admin/walletaddress_add.php?addwallet=f");
        }
    }

}

// deleting wallet 
if (isset($_GET["deletewallet"])) {
    $id = $_GET["deletewallet"];
    $query = "SELECT * FROM wallet_address WHERE id = '$id'";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    $displayPicture = $row['img'];
    $qrCode = $row['qr_code'];
    // deleting images for address
    if (unlink("../uploads/$displayPicture") && unlink("../uploads/$qrCode")) {
        $query = "DELETE FROM wallet_address WHERE id='$id'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            header("Location: ../admin/walletaddress_view.php?delete=s");
        } else {
            header("Location: ../admin/walletaddress_view.php?delete=f");
        }
    }
}

// updating plan
if (isset($_POST["update_plan"])) {
    extract($_POST);
    $query = "UPDATE plans SET name='$plan_name', min_deposit='$min_deposit', max_deposit='$max_deposit', days='$plan_days', daily_interest = '$plan_interest' WHERE id = '$id'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: ../admin/plans.php?update=s");

    } else {
        header("Location: ../admin/plans.php?plan_id=$id");
    }
}

if (isset($_GET["approve"])) {
    $id = $_GET["approve"];
    // approving user 
    $query = "UPDATE deposits SET approved = true WHERE id='$id'";
    $res = mysqli_query($conn, $query);
    // updating balance
    $query = "SELECT users.id, amount FROM deposits JOIN users ON users.id = deposits.user WHERE deposits.id ='$id'";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    $user_id = $row["id"];
    $amount = $row["amount"];
    $query = "UPDATE users SET balance = balance + $amount WHERE id = '$user_id'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        $query = "SELECT *, users.name as user_name, users.id as user_id FROM deposits 
        JOIN users ON users.id = deposits.user 
        JOIN wallet_address as wallet ON wallet.id = deposits.wallet
        WHERE deposits.id = '$id'";
        $res = mysqli_query($conn, $query);
        $row = $res->fetch_assoc();
        $name = $row['user_name'];
        $email = $row['email'];
        $amount = $row['rate'] * $row['amount'];
        $coin = strtoupper($row['acronym']);
        $date = $row['date'];
        $greeting = "Hi $name,";
        $body = "<p style='margin-bottom: 5px;'>We are pleased to inform you that your recent deposit request has been successfully verified.</p>
        <h4>Details of Your Deposit</h4>
        <ul>
            <li>Amount: $amount $coin</li>
            <li>Date Of Request: $date</li>
        </ul>
        ";
        $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Deposit Confirmation", $email);
        if ($send) {
            header("Location: ../admin/deposits.php?approve=s");
        } else {
            header("Location: ../admin/deposits.php?approve=f");
        }
    }

}