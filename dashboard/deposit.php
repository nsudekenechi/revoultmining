<?php
$title = "Deposit";
require_once "./includes/header.php";
?>
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container my-5">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
            async>
                {
                    "symbols": [
                        {
                            "proName": "FOREXCOM:SPXUSD",
                            "title": "S&P 500 Index"
                        },
                        {
                            "proName": "FOREXCOM:NSXUSD",
                            "title": "US 100 Cash CFD"
                        },
                        {
                            "proName": "FX_IDC:EURUSD",
                            "title": "EUR to USD"
                        },
                        {
                            "proName": "BITSTAMP:BTCUSD",
                            "title": "Bitcoin"
                        },
                        {
                            "proName": "BITSTAMP:ETHUSD",
                            "title": "Ethereum"
                        }
                    ],
                        "showSymbolLogo": true,
                            "isTransparent": false,
                                "displayMode": "adaptive",
                                    "colorTheme": "light",
                                        "locale": "en"
                }
            </script>
    </div>

    <!-- TradingView Widget END -->
    <div class="container-xl wide-lg">
        <div class="nk-content-body">

            <?php
            if (!isset($_GET["plan_id"])) {
                ?>

                <div class="nk-block-head-content mb-5">
                    <h3 class="nk-block-title page-title">Pricing Plans</h3>
                    <div class="nk-block-des text-soft">
                        <p>Choose a pricing plan, before depositing.</p>
                    </div>
                </div>

                <!-- TradingView Widget END -->
                <div class="row g-gs">
                    <?php
                    $query = "SELECT * FROM plans";
                    $res = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($res)) {

                        ?>
                        <a href="./dashboard/deposit.php?plan_id=<?= $row['id']; ?>" class="col-md-6 col-xxl-3">
                            <div class="card card-bordered pricing">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="./images/icon/plan1.svg" alt="" width="100">
                                </div>
                                <div class="pricing-head">
                                    <div class="pricing-title">
                                        <h4 class="card-title title text-capitalize"><?= $row['name']; ?></h4>

                                    </div>
                                    <div class="card-text">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="h4 fw-500"><?= $row['daily_interest']; ?>%</span>
                                                <span class="sub-text">Daily Interest</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="h4 fw-500"><?= $row['days']; ?></span>
                                                <span class="sub-text">Term Days</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pricing-body">
                                    <ul class="pricing-features">
                                        <li><span class="w-50">Min Deposit</span> - <span
                                                class="ms-auto amount"><?= $row['min_deposit']; ?></span>
                                        </li>
                                        <li><span class="w-50">Max Deposit</span> - <span
                                                class="ms-auto amount"><?= $row['max_deposit']; ?></span>
                                        </li>

                                        <li><span class="w-50">Deposit Return</span> - <span class="ms-auto ">Yes</span>
                                        </li>

                                        <li><span class="w-50">Total Return</span> - <span
                                                class="ms-auto "><?= number_format($row['days'] * $row['daily_interest'], 2); ?>%</span>
                                        </li>


                                    </ul>

                                    <div class="pricing-action">
                                        <button class="btn btn-outline-light py-2 px-5">Choose this plan</button>
                                    </div>

                                </div>
                            </div>
                        </a>
                        <!-- .col -->
                        <?php
                    }
                    ?>



                </div>
                <?php
            } else {

                ?>

                <div class="buysell wide-xs m-auto">
                    <div class="buysell-title text-center">
                        <h2 class="title">Deposit to your account</h2>
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
                            <?php
                            $id = $_GET["plan_id"];
                            $query = "SELECT * FROM plans WHERE id='$id'";
                            $res = mysqli_query($conn, $query);
                            $row = $res->fetch_assoc();
                            ?>
                            <div class="buysell-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="buysell-amount">Amount to Deposit</label>
                                </div>
                                <div class="form-control-group">
                                    <input type="number" class="form-control form-control-lg form-control-number"
                                        id="buysell-amount" name="amount" placeholder="0.00" required
                                        min="<?= $row['min_deposit']; ?>">
                                    <div class="form-dropdown">
                                        <div class="currency">GBP</div>

                                    </div>
                                </div>
                                <div class="form-note-group">

                                    <span class="buysell-min form-note-alt">Minimum: <span
                                            class="amount"><?= $row['min_deposit']; ?></span></span>

                                </div>
                            </div><!-- .buysell-field -->

                            <div class="buysell-field form-action">
                                <input type="text" hidden name="plan" value="<?= $id; ?>">
                                <input type="text" hidden name="user" value="<?= $_SESSION['user']; ?>">
                                <input type="text" hidden name="rate" value="">
                                <button class="btn btn-lg btn-block btn-primary" href="#buy-coin" name="deposit">Continue
                                </button>
                            </div><!-- .buysell-field -->

                        </form>

                    </div><!-- .buysell-block -->
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
            }
            ?>


        </div>
    </div>
</div>



<?php
require_once "./includes/footer.php";
?>