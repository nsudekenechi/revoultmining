<?php
$title = "Dashboard";
require_once "./includes/header.php";
?>
<!-- content @s -->
<div class="nk-content nk-content-fluid">


    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-sub"><span>Welcome Back,</span>
                </div>

                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal"><?= $name ?></h2>
                        <!-- <div class="nk-block-des">
                            <p>At a glance summary of your account. Have fun!</p>
                        </div> -->
                    </div><!-- .nk-block-head-content -->

                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->

            <div class="nk-block-head-xs">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title title">Overview</h5>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block mb-5">
                <div class="row gy-gs">
                    <div class="col-lg-5 col-xl-4">
                        <div class="nk-block">
                            <div class="nk-block">
                                <div class="card card-bordered text-light is-dark h-100">
                                    <div class="card-inner">
                                        <div class="nk-wg7">
                                            <div class="nk-wg7-stats">
                                                <div class="nk-wg7-title" style="">Balance</div>
                                                <div class="number-lg amount"><?= $userRow['balance']; ?></div>
                                            </div>

                                            <!-- <div class="nk-wg7-foot">
                                                <span class="nk-wg7-note">Last activity at <span>19 Nov,
                                                        2019</span></span>
                                            </div> -->
                                        </div><!-- .nk-wg7 -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card -->
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .col -->
                    <div class="col-lg-5 col-xl-4">
                        <div class="nk-block">
                            <div class="card card-bordered text-light is-dark h-100">
                                <div class="card-inner">
                                    <div class="nk-wg7">
                                        <div class="nk-wg7-stats">
                                            <div class="nk-wg7-title" style="">Investment</div>
                                            <?php
                                            $query = "SELECT SUM(amount) as amount FROM deposits WHERE user = '$user_id'";
                                            $res = mysqli_query($conn, $query);

                                            ?>
                                            <div class="number-lg amount"><?= $res->fetch_column(); ?></div>
                                        </div>

                                        <!-- <div class="nk-wg7-foot">
                                                <span class="nk-wg7-note">Last activity at <span>19 Nov,
                                                        2019</span></span>
                                            </div> -->
                                    </div><!-- .nk-wg7 -->
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div><!-- .col -->
                    <div class="col-lg-5 col-xl-4">
                        <div class="nk-block">
                            <div class="card card-bordered text-light is-dark h-100">
                                <div class="card-inner">
                                    <div class="nk-wg7">
                                        <div class="nk-wg7-stats">
                                            <div class="nk-wg7-title" style="">Referral Bonus</div>
                                            <div class="number-lg amount"><?= $userRow['ref_balance']; ?></div>
                                        </div>

                                        <!-- <div class="nk-wg7-foot">
                                                <span class="nk-wg7-note">Last activity at <span>19 Nov,
                                                        2019</span></span>
                                            </div> -->
                                    </div><!-- .nk-wg7 -->
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .nk-block -->
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container mb-5">
                <div class="tradingview-widget-container__widget"></div>

                <script type="text/javascript"
                    src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                        {
                            "width": "100%",
                                "height": "300",
                                    "symbol": "NASDAQ:AAPL",
                                        "interval": "D",
                                            "timezone": "Etc/UTC",
                                                "theme": "light",
                                                    "style": "1",
                                                        "locale": "en",
                                                            "allow_symbol_change": true,
                                                                "calendar": false,
                                                                    "support_host": "https://www.tradingview.com"
                        }
                    </script>
            </div>
            <!-- TradingView Widget END -->
            <div class="nk-block nk-block-lg">
                <div class="row gy-gs">
                    <div class="col-md-12">
                        <div class="card-head">
                            <div class="card-title  mb-0">
                                <h5 class="title">Recent Deposits</h5>
                            </div>

                        </div><!-- .card-head -->
                        <div class="tranx-list card card-bordered">
                            <?php
                            $query = "SELECT * FROM deposits 
                            JOIN wallet_address ON wallet_address.id= deposits.wallet WHERE deposits.user = '$user_id' LIMIT 5";
                            $res = mysqli_query($conn, $query);
                            if ($res->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <div class="tranx-item">
                                        <div class="tranx-col">
                                            <div class="tranx-info">
                                                <div class="tranx-data">
                                                    <div class="tranx-label d-flex align-items-center gap-3">
                                                        <span>Deposited <?= $row['name']; ?></span>
                                                        <img src="./uploads/<?= $row['img']; ?>" width="20"
                                                            style="object-fit:contain;" alt="">
                                                    </div>
                                                    <div class="tranx-date"><?= $row['date']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tranx-col">
                                            <div class="tranx-amount">
                                                <div class="number"> <?= $row['amount'] * $row['rate']; ?> <span
                                                        class="currency currency-btc">BTC</span></div>
                                                <div class="number-sm"><?= number_format($row['amount'], 2); ?> <span
                                                        class="currency currency-usd">GBP</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .tranx-item -->
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="row">
                                    <div class="card card-bordered col-md-12">
                                        <div class="nk-refwg-invite card-inner">
                                            <div class="nk-refwg-head g-3">
                                                <div class="nk-refwg-title">
                                                    <h6 class="title">You don't have any deposit.</h6>
                                                    <div class="title-sub">
                                                        Your wallet is waiting for its first deposit. Please fund your
                                                        account.
                                                    </div>
                                                </div>
                                                <div class="nk-refwg-action">
                                                    <a href="./dashboard/deposit.php" class="btn btn-primary">Make
                                                        Deposit</a>
                                                </div>
                                            </div>

                                        </div><!-- .nk-refwg-invite -->
                                    </div>
                                </div>
                                <?php
                            }
                            ?>



                        </div><!-- .tranx-list -->
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .nk-block -->
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="nk-refwg">
                        <div class="nk-refwg-invite card-inner">
                            <div class="nk-refwg-head g-3">
                                <div class="nk-refwg-title">
                                    <h5 class="title">Refer Us & Earn</h5>
                                    <div class="title-sub">Use the below link to invite your friends.</div>
                                </div>

                            </div>
                            <div class="nk-refwg-url">
                                <div class="form-control-wrap">
                                    <div class="form-clip clipboard-init" data-clipboard-target="#refUrl"
                                        data-success="Copied" data-text="Copy Link"><em
                                            class="clipboard-icon icon ni ni-copy"></em> <span
                                            class="clipboard-text">Copy Link</span></div>
                                    <div class="form-icon">
                                        <em class="icon ni ni-link-alt"></em>
                                    </div>
                                    <input type="text" class="form-control copy-text" id="refUrl" value="">
                                    <input type="text" hidden value="<?= $user_id; ?>" id="user">
                                </div>
                            </div>
                        </div><!-- .nk-refwg-invite -->
                        <div class="nk-refwg-stats card-inner bg-lighter">
                            <div class="nk-refwg-group g-3">
                                <div class="nk-refwg-name">
                                    <h6 class="title">My Referral <em class="icon ni ni-info" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Referral Informations"></em></h6>
                                </div>
                                <div class="nk-refwg-info g-3">
                                    <div class="nk-refwg-sub">
                                        <?php
                                        $query = "SELECT * FROM users WHERE ref = '$user_id'";
                                        $res = mysqli_query($conn, $query);

                                        ?>
                                        <div class="title"><?= $res->num_rows; ?></div>
                                        <div class="sub-text">Total Joined</div>
                                    </div>
                                    <div class="nk-refwg-sub">
                                        <?php
                                        $query = "SELECT ref_balance FROM users WHERE id = '$user_id'";
                                        $res = mysqli_query($conn, $query);
                                        ?>
                                        <div class="title"><?= number_format($res->fetch_column(), 2); ?></div>
                                        <div class="sub-text">Referral Earn</div>
                                    </div>
                                </div>
                                <div class="nk-refwg-more dropdown mt-n1 me-n1">
                                    <a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                            class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                        <ul class="link-list-plain sm">
                                            <li><a href="#">7 days</a></li>
                                            <li><a href="#">15 Days</a></li>
                                            <li><a href="#">30 Days</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-refwg-ck">
                                <canvas class="chart-refer-stats" id="refBarChart"></canvas>
                            </div>
                        </div><!-- .nk-refwg-stats -->
                    </div><!-- .nk-refwg -->
                </div><!-- .card -->
            </div><!-- .nk-block -->


            <!-- .card-inner -->

            <!-- .card -->
            <!-- .nk-block -->
        </div>
    </div>
</div>
<script>
    let refUrl = document.querySelector("#refUrl");
    let user = document.querySelector("#user")
    refUrl.value = `${location.origin}/revoultmining/auth/register.php?ref=${user.value}`

</script>
<?php
require_once "./includes/footer.php";
?>