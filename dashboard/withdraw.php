<?php
$title = "Withdraw";
require_once "./includes/header.php";
?>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="buysell wide-xs m-auto">
                <div class="buysell-title text-center">
                    <h2 class="title">Withdraw to your wallet</h2>
                </div><!-- .buysell-title -->
                <div class="buysell-block">

                    <form action="./handler/script.php" class="buysell-form" method="POST">
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
                            </div><!-- .dropdown -->
                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">Wallet Address</label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control form-control-lg form-control-number"
                                    name="wallet_address" placeholder="xxxx-xxxx-xxxx-xxx" required id="wallet_address">

                            </div>

                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-group">
                            <?php
                            $query = "SELECT balance FROM users WHERE id='$user_id'";
                            $res = mysqli_query($conn, $query);
                            $balance = $res->fetch_column();
                            ?>
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">Amount to Withdraw</label>
                            </div>
                            <div class="form-control-group">
                                <input type="number" class="form-control form-control-lg form-control-number"
                                    id="buysell-amount" name="amount" placeholder="0.00" required min="10"
                                    max="<?= $balance; ?>">
                                <div class="form-dropdown">
                                    <div class="currency">GBP</div>

                                </div>
                            </div>
                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-action">
                            <input type="text" hidden name="user" value="<?= $_SESSION['user']; ?>" id="user">
                            <button class="btn btn-lg btn-block btn-primary" name="withdraw">Continue
                            </button>
                        </div><!-- .buysell-field -->



                    </form>

                </div><!-- .buysell-block -->
            </div>

            <script>
                let wallets = document.querySelectorAll(".buysell-cc-item");
                let choosen = document.querySelector(".buysell-cc-choosen")
                let xx = document.querySelector("#xx");
                let user = document.querySelector("#user");
                let wallet_address = document.querySelector("#wallet_address");
                wallets.forEach(wallet => {
                    wallet.onclick = () => {
                        xx.value = wallet.children[0].dataset.id
                        choosen.querySelector("img").src = wallet.querySelector("img").src
                        choosen.querySelector(".coin-name").innerHTML = wallet.querySelector(".coin-name").innerHTML
                        getWalletAddress(xx.value);
                    }
                })

                getWalletAddress(xx.value);

                function getWalletAddress(wallet) {
                    fetch(`./handler/ajax.php?wallet=${wallet}&user=${user.value}`).then(res => res.text()).then(data => {
                        wallet_address.value = data;
                    });

                }


            </script>
        </div>
    </div>
</div>


<?php
require_once "./includes/footer.php";
?>