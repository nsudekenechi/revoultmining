<?php
require_once "../dbase/config.php";
// creating wallet 
if (isset($_POST["createwallet"])) {
    extract($_POST);
    extract($_FILES);
    $displayPictureName = $wallet_name . "display_picture." . pathinfo($displayPicture["name"], PATHINFO_EXTENSION);
    $qrCodeName = $wallet_name . "qr_code." . pathinfo($qrCode["name"], PATHINFO_EXTENSION);
    if (
        move_uploaded_file($qrCode["tmp_name"], "../uploads/$qrCodeName") && move_uploaded_file($displayPicture["tmp_name"], "../uploads/$displayPictureName")
    ) {
        $query = "INSERT INTO wallet_address (name, acronym, address, img, qr_code) VALUES ('$wallet_name', '$wallet_acronym', '$wallet_address','$displayPictureName', '$qrCodeName')";
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