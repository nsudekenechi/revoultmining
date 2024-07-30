<?php
require_once "./includes/header.php";
$query = "SELECT *, wallet.name as walletName, users.name as user_name, deposits.id as depositID FROM deposits 
                                JOIN users ON users.id = deposits.user 
                                   JOIN wallet_address as wallet on wallet.id=deposits.wallet
                                   WHERE deposits.proof != ''";
$res = mysqli_query($conn, $query);
?>


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Users Deposits</h3>
                        <div class="nk-block-des text-soft">
                            <p><?= $res->num_rows; ?> <?= $res->num_rows > 1 ? "users" : "user"; ?> have made deposit.
                            </p>
                        </div>
                    </div><!-- .nk-block-head-content -->

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
                                    $query = "SELECT *, wallet.name as walletName, users.name as user_name, deposits.id as depositID FROM deposits 
                                JOIN users ON users.id = deposits.user 
                                   JOIN wallet_address as wallet on wallet.id=deposits.wallet
                                   WHERE deposits.proof != ''
                                   ";
                                    $res = mysqli_query($conn, $query);
                                    if ($res->num_rows > 0) {
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
                                                            class="badge badge-sm badge-dim bg-outline-success d-md-inline-flex">Completed</span>
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
                                                    <ul class="d-flex gap-3">
                                                        <?php
                                                        if (!$row['approved']) {
                                                            ?>
                                                            <li class="">
                                                                <a href="./handler/adminscript.php?approve_deposit=<?= $row['depositID']; ?>"
                                                                    class="bg-white btn btn-sm btn-outline-light btn-icon"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    aria-label="Approve" data-bs-original-title="Approve"><em
                                                                        class="icon ni ni-done"></em></a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                        <li class="">

                                                            <a href="#tranxDetails" data-bs-toggle="modal"
                                                                data-bs-target="#modalDefault"
                                                                class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip viewProof"
                                                                aria-label="Details" data-bs-original-title="View Proof"
                                                                data-src="<?= $row['proof']; ?>">
                                                                <em class="icon ni ni-eye"></em>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5">
                                                <p class="text-center p-3">No user have made any deposit yet</p>
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

<div class="modal fade" tabindex="-1" id="modalDefault" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body" id="modal-body">
                <img src="" alt="" id="proof_img">
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Proof of deposit</span>
            </div>
        </div>
    </div>
</div>

<style>
    #modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 400px;
    }

    #modal-body img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    #container {
        overflow: auto;
    }

    @media screen and (max-width: 765px) {
        #container #container-table {
            width: 800px;
        }

    }
</style>

<script>
    let viewProofs = document.querySelectorAll(".viewProof")
    let proofImg = document.querySelector("#proof_img")
    viewProofs.forEach(viewProof => {
        viewProof.onclick = () => {
            proofImg.src = `./uploads/${viewProof.dataset.src}`;
        }
    })
</script>

<?php

require_once "./includes/footer.php";
?>