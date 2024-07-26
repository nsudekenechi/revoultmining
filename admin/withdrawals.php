<?php
require_once "./includes/header.php";
$query = "SELECT * FROM withdraws";
$res = mysqli_query($conn, $query);
?>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Users Withdrawals</h3>
                        <div class="nk-block-des text-soft">
                            <p>You have <?= $res->num_rows; ?> withdrawal requests. </p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div id="container">
                    <div class="">
                        <div class="card-inner card card-bordered card-preview" id="container-table">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Wallet</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT *, wallet.name as walletName, users.name as user_name, withdraws.address as withdrawAddress,withdraws.id as withdrawId FROM withdraws 
                                JOIN users ON users.id = withdraws.user 
                                   JOIN wallet_address as wallet on wallet.id=withdraws.wallet
                                   ";
                                    $res = mysqli_query($conn, $query);
                                    while ($row = $res->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $row['date']; ?></th>
                                            <td>
                                                <div class="">
                                                    <p class="tb-lead"><?= $row['user_name'] ?></p>

                                                </div>
                                            </td>
                                            <td>
                                                <div style="display: flex; align-items:center; gap:5px;">
                                                    <img src="./uploads/<?= $row['img']; ?>" width="20" alt="">
                                                    <span
                                                        class="tb-lead-sub"><?= $row['walletName']; ?>(<?= strtoupper($row['acronym']); ?>)</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div>
                                                        <span class="tb-amount"><?= $row['rate'] * $row['amount']; ?>
                                                            <span><?= strtoupper($row['acronym']); ?></span></span>
                                                    </div>
                                                    <span class="tb-amount-sm amount"
                                                        style="font-size: 12px;"><?= $row['amount']; ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dot dot-success d-none d-md-none"></div>
                                                <?php
                                                if ($row['approved']) {
                                                    ?>
                                                    <span
                                                        class="badge badge-sm badge-dim bg-outline-success d-md-inline-flex">Approved</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span
                                                        class="badge badge-sm badge-dim bg-outline-warning  d-md-inline-flex">Pending</span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <ul class="d-flex gap-3 align-content-center">
                                                    <?php
                                                    if (!$row['approved']) {
                                                        ?>
                                                        <li class="">
                                                            <a href="./handler/adminscript.php?approve_withdraw=<?= $row['withdrawId']; ?>"
                                                                class="bg-white btn btn-sm btn-outline-light btn-icon"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                aria-label="Approve" data-bs-original-title="Approve"><em
                                                                    class="icon ni ni-done"></em></a>
                                                        </li>

                                                        <li>
                                                            <button type="button"
                                                                class="btn btn-sm btn-icon btn-clipboard clipboard-init clipboard-text"
                                                                data-clip-success="<em class='ni ni-done text-lg'></em>"
                                                                data-clip-text="<em class='icon ni ni-copy'></em>"
                                                                data-clipboard-text="<?= $row['withdrawAddress']; ?>">
                                                                <em class="icon ni ni-copy"></em>
                                                            </button>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- .nk-block -->

        </div>
    </div>
</div>
<style>
    #container {
        overflow: auto;
    }

    .text-lg {
        font-size: 1.5em;
    }


    @media screen and (max-width: 765px) {
        #container #container-table {
            width: 800px;
        }

    }
</style>

<?php
require_once "./includes/footer.php";
?>