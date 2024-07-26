<?php
if (!isset($_GET["id"])) {
    header("location: ../dashboard/deposit.php");
}
$title = "Confirm Deposit";
require_once "./includes/header.php";
$id = $_GET["id"];
$query = "SELECT *, wallet.name as walletName, wallet.address as walletAddress FROM deposits  
JOIN wallet_address as wallet on wallet.id=deposits.wallet
JOIN users on users.id=deposits.user
 WHERE deposits.id = '$id'
";
$res = mysqli_query($conn, $query);
$row = $res->fetch_assoc();
?>

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="wide-xs m-auto">
                <div class="nk-block-head-content mb-5">
                    <h3 class="nk-block-title page-title">Confirm Deposit</h3>
                    <div class="nk-block-des text-soft">
                        <p>Scan the QR code or copy address to complete transaction</p>
                        <h6>You are about to deposit <?= $row['rate'] * $row['amount']; ?>
                            <?= strtoupper($row['acronym']); ?> for <span class="amount"><?= $row['amount']; ?></span>
                        </h6>
                    </div>
                </div>

                <div id="qrcode" class="mb-2">
                    <img src="./uploads/<?= $row['qr_code']; ?>" alt="">
                </div>
                <div class="dropdown buysell-cc-dropdown">
                    <a class="buysell-cc-chosen " data-bs-toggle="dropdown">
                        <div class="coin-item coin-btc">
                            <div class="coin-icon">
                                <img src="./uploads/<?= $row['img']; ?>" width="30" alt="">
                            </div>
                            <div class="coin-info">
                                <span class="coin-name"><?= $row['walletName']; ?> Wallet</span>
                                <span class="coin-text"><?= $row['walletAddress']; ?></span>
                            </div>
                        </div>
                    </a>

                </div>
                <form action="./handler/script.php" method="POST" enctype="multipart/form-data">
                    <input type="text" hidden value="<?= $id; ?>" name="id">
                    <div class="form-group mt-5">
                        <label class="form-label">Upload screenshot of deposit</label>
                        <div class="form-control-wrap">
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile" required name="proof">
                                <label class="form-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-primary p-3 text-capitalize w-100 " name="complete">Complete
                            deposit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<style>
    #qrcode {
        border: solid 1px #ccc;
        height: 200px;
        display: flex;
        justify-content: center;
    }

    #qrcode img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    button {
        text-align: center;
        justify-content: center;
    }
</style>
<?php
require_once "./includes/footer.php";
?>