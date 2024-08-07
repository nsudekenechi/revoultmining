<?php
$title = "Requests";
require_once "./includes/header.php";
?>
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body my-5">
            <div class="nk-block-head">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">Your Requests</h2>
                        <div class="nk-block-des">
                            <p>See full list of your deposits and withdrawal requests</p>
                        </div>
                    </div>

                </div>
            </div><!-- .nk-block-head -->

            <div class="nk-block nk-block-sm">

                <?php

                $query = "SELECT STR_TO_DATE(date,  '%d %a %b, %Y') as date, MONTH(STR_TO_DATE(date, '%d %a %b, %Y')) as month FROM deposits WHERE user = '$user_id' 
                GROUP BY MONTH(STR_TO_DATE(date, '%d %a %b, %Y'))
                ORDER BY date";
                $res = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                    $date = new DateTime($row['date']);
                    ?>
                    <h6 class="lead-text text-soft">
                        <?= $date->format('F, Y'); ?>
                    </h6>
                    <?php
                    $month = $date->format('M, Y');
                    $newquery = "SELECT * FROM deposits
                    JOIN wallet_address ON deposits.wallet = wallet_address.id  
                    WHERE deposits.user='$user_id' AND deposits.date LIKE '%$month%'";
                    $newres = mysqli_query($conn, $newquery);
                    while ($newrow = mysqli_fetch_assoc($newres)) {
                        ?>
                        <div class="tranx-list tranx-list-stretch card card-bordered">
                            <div class="tranx-item">
                                <div class="tranx-col">
                                    <div class="tranx-info">
                                        <div class="tranx-badge">
                                            <span class="tranx-icon" style="width:30px;height:30px;">
                                                <img src="./uploads/<?= $newrow['img']; ?>"
                                                    style="width:100%;height:100%;object-fit:contain;" alt="">
                                            </span>
                                        </div>
                                        <div class="tranx-data">
                                            <div class="tranx-label">Deposit</div>
                                            <!-- <div class="tranx-date"><?= $newrow['date']; ?></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tranx-col">
                                    <div class="tranx-amount">
                                        <div class="number"><?= $newrow['rate'] * $newrow['amount']; ?> <span
                                                class="currency-btc text-uppercase"><?= $newrow['acronym']; ?></span>
                                        </div>
                                        <div class="number-sm">
                                            <span class="amount">
                                                <?= number_format($newrow['amount'], 2); ?></span>
                                            <span class="currency currency-usd"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tranx-col">
                                    <?php
                                    if ($newrow['approved']) {
                                        ?>
                                        <span class="badge badge-sm badge-dim bg-outline-success d-md-inline-flex">Completed</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span
                                            class="badge badge-sm badge-dim bg-outline-warning d-md-inline-flex">Proccessing</span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div><!-- .nk-tranx-item -->

                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    $month = $date->format('M, Y');
                    $newquery = "SELECT * FROM withdraws
                    JOIN wallet_address ON withdraws.wallet = wallet_address.id  
                    WHERE withdraws.user='$user_id' AND withdraws.date LIKE '%$month%'";
                    $newres = mysqli_query($conn, $newquery);
                    while ($newrow = mysqli_fetch_assoc($newres)) {
                        ?>
                        <div class="tranx-list tranx-list-stretch card card-bordered">
                            <div class="tranx-item">
                                <div class="tranx-col">
                                    <div class="tranx-info">
                                        <div class="tranx-badge">
                                            <span class="tranx-icon" style="width:30px;height:30px;">
                                                <img src="./uploads/<?= $newrow['img']; ?>"
                                                    style="width:100%;height:100%;object-fit:contain;" alt="">
                                            </span>
                                        </div>
                                        <div class="tranx-data">
                                            <div class="tranx-label">Withdraw</div>
                                            <!-- <div class="tranx-date"><?= $newrow['date']; ?></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tranx-col">
                                    <div class="tranx-amount">
                                        <div class="number"><?= $newrow['rate'] * $newrow['amount']; ?> <span
                                                class=" currency-btc text-uppercase"><?= $newrow['acronym']; ?></span>
                                        </div>
                                        <div class="number-sm">
                                            <span class="amount"> <?= number_format($newrow['amount'], 2); ?></span>
                                            <span class="currency currency-usd"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tranx-col">
                                    <?php
                                    if ($newrow['approved']) {
                                        ?>
                                        <span class="badge badge-sm badge-dim bg-outline-success d-md-inline-flex">Completed</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span
                                            class="badge badge-sm badge-dim bg-outline-warning d-md-inline-flex">Proccessing</span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div><!-- .nk-tranx-item -->

                        </div>
                        <?php
                    }
                    ?>
                    <!-- .card -->
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>
<!-- content @e -->
<?php
require_once "./includes/footer.php";
?>