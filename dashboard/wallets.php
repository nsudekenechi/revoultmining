<?php
$title = "Wallets";
require_once "./includes/header.php";
?>
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <!-- .nk-block-head-sub -->
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">Your wallets</h2>
                        <div class="nk-block-des">
                            <p>Here is the list of your wallets available for withdrawals</p>
                        </div>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="nk-block-tools gx-3">

                            <li><a href="./dashboard/withdraw.php" class="btn btn-primary"><span>Withdraw</span> <em
                                        class="icon ni ni-arrow-long-right"></em></a></li>

                        </ul>
                    </div>
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <?php
                $query = "SELECT users_wallet.id, users_wallet.address, name, img  FROM users_wallet JOIN wallet_address ON wallet_address.id = users_wallet.wallet WHERE users_wallet.user='$user_id'";
                $res = mysqli_query($conn, $query);
                ?>
                <div class="row g-gs">
                    <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                        <div class="card card-bordered dashed h-100" data-bs-toggle="modal" data-bs-target="#modalForm">
                            <div class="nk-wgw-add">
                                <div class="nk-wgw-inner">
                                    <a>
                                        <div class="add-icon">
                                            <em class="icon ni ni-plus"></em>
                                        </div>
                                        <h6 class="title">Add New Wallet</h6>
                                    </a>
                                    <?php
                                    if ($res->num_rows == 0) {
                                        ?>
                                        <span class="sub-text">Currently, you don't have a wallet address.</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="sub-text">Click to add more wallets and manage your funds
                                            seamlessly.</span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                            <div class="card card-bordered is-dark h-100">
                                <div class="nk-wgw">
                                    <div class="nk-wgw-inner">
                                        <a class="nk-wgw-name">
                                            <div class="nk-wgw-icon is-default">
                                                <img src="./uploads/<?= $row['img']; ?>" alt=""
                                                    style="object-fit:contain;width:100%;height:100%;">
                                            </div>
                                            <h5 class="nk-wgw-title title "><?= $row['name']; ?> Wallet</h5>
                                        </a>
                                        <div class="nk-wgw-balance">
                                            <div class="text-white">
                                                <h4> <?= $row['address']; ?></h4>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="nk-wgw-more dropdown">
                                        <a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                                class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                            <ul class="link-list-plain sm">
                                                <li><a href="../dashboard/wallet.php?edit=<?= $row['id']; ?>">Edit</a></li>
                                                <li><a href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <?php
                    }
                    ?>



                </div>



                <!-- .row -->
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create wallet</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="./handler/script.php" method="POST" class="form-validate is-alter">
                    <div class="form-group">
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label">Choose wallet</label>
                            </div>
                            <input type="hidden" value="btc" name="bs-currency" id="buysell-choose-currency">
                            <div class="dropdown buysell-cc-dropdown">

                                <a class="buysell-cc-choosen dropdown-indicator" data-bs-toggle="dropdown">
                                    <?php
                                    $query = "SELECT * FROM wallet_address ORDER BY id LIMIT 1";
                                    $res = mysqli_query($conn, $query);
                                    $row = $res->fetch_assoc();
                                    ?>
                                    <input type="text" hidden id="xx" name="wallet" value="<?= $row['id']; ?>">
                                    <div class="coin-item coin-btc">
                                        <div class="coin-icon">
                                            <img src="./uploads/<?= $row['img']; ?>" width="30" alt="">
                                        </div>
                                        <div class="coin-info">
                                            <span class="coin-name"><?= $row['name']; ?>
                                                (<?= $row['acronym']; ?>)</span>

                                        </div>
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                    <ul class="buysell-cc-list">
                                        <?php
                                        $query = "SELECT * FROM wallet_address";
                                        $res = mysqli_query($conn, $query);
                                        while ($row = $res->fetch_assoc()) {
                                            ?>
                                            <li class="buysell-cc-item ">
                                                <a class="buysell-cc-opt" data-currency="<?= $row['acronym']; ?>"
                                                    data-id="<?= $row['id']; ?>">
                                                    <div class="coin-item coin-btc">
                                                        <div class="coin-icon">
                                                            <img src="./uploads/<?= $row['img']; ?>" alt="" width="20">
                                                        </div>
                                                        <div class="coin-info">
                                                            <span class="coin-name"><?= $row['name']; ?>
                                                                <span class="text-uppercase">
                                                                    (<?= $row['acronym']; ?>)
                                                                </span>
                                                            </span>

                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>


                                    </ul>
                                </div>
                                <!-- .dropdown-menu -->
                                <!-- .dropdown -->


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Wallet Address</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" required name="wallet_address">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" value="<?= $user_id; ?>" hidden name="user">
                            <button type="submit" class="btn btn-lg btn-primary" name="add_wallet">Add Wallet</button>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    let wallets = document.querySelectorAll(".buysell-cc-item");
    let choosen = document.querySelector(".buysell-cc-choosen")
    let xx = document.querySelector("#xx");

    wallets.forEach(wallet => {
        wallet.onclick = () => {
            xx.value = wallet.children[0].dataset.id
            choosen.querySelector("img").src = wallet.querySelector("img").src
            choosen.querySelector(".coin-name").innerHTML = wallet.querySelector(".coin-name").innerHTML
        }
    })
</script>
<?php
require_once "./includes/footer.php";
?>