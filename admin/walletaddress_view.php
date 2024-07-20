<?php
require_once "./includes/header.php";

?>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">

            <div class="nk-block">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h5 class="title">Wallet Addresses</h5>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <ul class="btn-toolbar gx-1">
                                                <li>
                                                    <a href="#" class="search-toggle toggle-search btn btn-icon"
                                                        data-target="search"><em class="icon ni ni-search"></em></a>
                                                </li><!-- li -->
                                                <li class="btn-toolbar-sep"></li><!-- li -->

                                            </ul><!-- .btn-toolbar -->
                                        </div><!-- .card-tools -->
                                        <div class="card-search search-wrap" data-search="search">
                                            <div class="search-content">
                                                <a href="#" class="search-back btn btn-icon toggle-search"
                                                    data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                <input type="text"
                                                    class="form-control border-transparent form-focus-none"
                                                    placeholder="Quick search by transaction">
                                                <button class="search-submit btn btn-icon"><em
                                                        class="icon ni ni-search"></em></button>
                                            </div>
                                        </div><!-- .card-search -->
                                    </div><!-- .card-title-group -->
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list nk-tb-tnx">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span>Wallet Name</span></div>

                                            <div class="nk-tb-col nk-tb-col-status"><span
                                                    class="sub-text d-none d-md-block">Wallet Address</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools"></div>
                                        </div><!-- .nk-tb-item -->
                                        <?php
                                        $query = "SELECT * FROM wallet_address";
                                        $res = mysqli_query($conn, $query);
                                        if ($res->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon ">
                                                                <img src="./uploads/<?= $row['img']; ?>" alt=""
                                                                    style="width:100%; height:100%; object-fit:cover;">
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead"><?= $row["name"]; ?>
                                                                    (<?= $row["acronym"]; ?>)</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub"><?= $row["address"]; ?></span>
                                                    </div>


                                                    <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-2">
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="./handler/adminScript.php?deletewallet=<?= $row['id']; ?>"
                                                                    class="bg-white btn btn-sm btn-outline-light btn-icon"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    aria-label="Delete" data-bs-original-title="Delete"><em
                                                                        class="icon ni ni-cross"></em></a>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </div><!-- .nk-tb-item -->

                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <!-- <div class="row bg-primary">
                                                <div class="nk-tb-item lg:col-12"
                                                    style="display: flex; justify-content:center;">


                                                    <div class="nk-tb-col nk-tb-col-status"><span
                                                            class="sub-text d-none d-md-block">No wallet addresses...</span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-tools"></div>
                                                </div>
                                            </div> -->
                                            <?php
                                        }
                                        ?>
                                    </div><!-- .nk-tb-list -->
                                </div><!-- .card-inner -->

                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>
</div>

<?php
require_once "./includes/footer.php";
?>