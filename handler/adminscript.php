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

// approving deposit
if (isset($_GET["approve_deposit"])) {
    $id = $_GET["approve_deposit"];

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

    // checking if this is user's first deposit so that we can credit their ref if they have any
    $query = "SELECT * FROM deposits WHERE user = '$user_id' AND approved = true";
    $res = mysqli_query($conn, $query);
    if ($res->num_rows == 1) {

        // getting ref id 
        $query = "SELECT ref from users WHERE id = '$user_id'";
        $res = mysqli_query($conn, $query);
        $ref = $res->fetch_column();
        if ($ref > 0) {
            $refAmount = $amount * (10 / 100);
            // updating balance and ref_balance of ref
            $query = "UPDATE users SET balance = balance + $refAmount, ref_balance = ref_balance + $refAmount WHERE id = '$ref'";
            $res = mysqli_query($conn, $query);

            // sending referral a mail that they got credited
            $query = "SELECT * FROM users WHERE id ='$ref'";
            $res = mysqli_query($conn, $query);
            $row = $res->fetch_assoc();
            $refName = $row["name"];
            $refEmail = $row["email"];
            $refAmount = number_format($refAmount, 2);
            $greeting = "Hi $refName,";
            $body = "<p style='margin-bottom: 5px;'>We are excited to inform you that your account has just been credited!
    Thanks to your recent activity and participation, you've received a credit of $refAmount GBP to your account. We appreciate your engagement and are thrilled to see you benefit from our services. </p>";

            $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "You've Been Credited!", $refEmail);
            if ($send) {
                header("Location: ../admin/deposits.php?approve_deposit=s");
            } else {
                header("Location: ../admin/deposits.php?approve_deposit=f");
            }
        }

    }

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
            header("Location: ../admin/deposits.php?approve_deposit=s");
        } else {
            header("Location: ../admin/deposits.php?approve_deposit=f");
        }
    }

}

// approving withdraw
if (isset($_GET["approve_withdraw"])) {
    $withdrawId = $_GET["approve_withdraw"];
    $query = "UPDATE withdraws SET approved = true WHERE id = '$withdrawId'";
    $res = mysqli_query($conn, $query);

    // sending withdrawal email to user 
    $query = "SELECT email,  users.name, rate, amount, acronym FROM withdraws 
    JOIN users ON users.id = withdraws.user 
    JOIN  wallet_address ON wallet_address.id = withdraws.id  
    WHERE withdraws.id = '$withdrawId'";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    $email = $row["email"];
    $name = $row["name"];
    $amount = $row['amount'];
    $rate = $row['rate'] * $row['amount'];
    $acronym = strtoupper($row['acronym']);
    $greeting = "Hello $name,";

    $body = "<p style='margin-bottom: 5px;'>Your withdrawal of £$amount ($rate $acronym) have been confirmed.</p>";
    $send = sendEmail("./welcome.html", ["{greeting}", "{body}"], [$greeting, $body], "Withdrawal Request Received", $email);

    if ($send) {
        header("Location: ../admin/withdrawals.php?approve_withdraw=s");
    } else {
        header("Location: ../admin/withdrawals.php?approve_withdraw=f");
    }

}

// updating user balance
if (isset($_POST["update_balance"])) {
    extract($_POST);
    if (!$balance) {
        $balance = 0;
    } else if (!$ref_balance) {
        $ref_balance = 0;
    }
    $query = "UPDATE users SET balance = balance + $balance, ref_balance = ref_balance + $ref_balance WHERE id = '$user'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: ../admin/index.php?update_balance=s");
    } else {
        header("Location: ../admin/index.php?update_balance=f");
    }
}

if (isset($_POST["deduct_balance"])) {
    extract($_POST);
    if (!$balance) {
        $balance = 0;
    } else if (!$ref_balance) {
        $ref_balance = 0;
    }
    $query = "UPDATE users SET balance = balance - $balance, ref_balance = ref_balance - $ref_balance WHERE id = '$user'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: ../admin/index.php?update_balance=s");
    } else {
        header("Location: ../admin/index.php?update_balance=f");
    }
}

if (isset($_POST["suspend_user"])) {
    extract($_POST);
    $query = "UPDATE users SET  suspend = !suspend WHERE id = '$user'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: ../admin/index.php?suspend=s");
    } else {
        header("Location: ../admin/index.php?suspend=f");
    }
}