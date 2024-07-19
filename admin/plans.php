<?php
require_once "./includes/header.php";

?>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Update Plans</h3>
                        <div class="nk-block-des text-soft">
                            <p>Make changes to already existing plans</p>
                        </div>
                    </div><!-- .nk-block-head-content -->

                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <?php
            if (!isset($_GET["plan_id"])) {
                ?>
                <div class="nk-block py-5">
                    <div class="row g-gs">
                        <?php
                        $query = "SELECT * FROM plans";
                        $res = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($res)) {

                            ?>
                            <div class="col-md-6 col-xxl-3">
                                <div class="card card-bordered pricing">
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


                                        </ul>
                                        <div class="pricing-action">
                                            <a href="./admin/plans.php?plan_id=<?= $row['id']; ?>"> <button
                                                    class="btn btn-outline-light">Change</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <?php
                        }
                        ?>



                    </div>
                </div>
                <?php
            } else {
                $id = $_GET["plan_id"];
                $query = "SELECT * FROM plans WHERE id = '$id'";
                $res = mysqli_query($conn, $query);
                $row = $res->fetch_assoc();
                ?>
                <div class="nk-block">
                    <div class="nk-block nk-block-lg">

                        <div class="card card-bordered">
                            <div class="card-inner">

                                <form action="./handler/adminscript.php" method="POST">
                                    <div class="row g-4">
                                        <input type="text" value="<?= $id; ?>" hidden name="id">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="email-address-1">Plan Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="email-address-1"
                                                        placeholder="Enter plan name" name="plan_name" required=""
                                                        value="<?= $row['name']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1">Plan Interest</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="full-name-1"
                                                        placeholder="0.00" name="plan_interest" required=""
                                                        value="<?= $row['daily_interest']; ?>">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1"> Days</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="full-name-1"
                                                        placeholder="Enter Term Days" name="plan_days" required=""
                                                        value="<?= $row['days']; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1">Minimum Deposit</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="full-name-1"
                                                        placeholder="0.00" name="min_deposit" required=""
                                                        value="<?= $row['min_deposit']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1">Maximum Deposit</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="full-name-1"
                                                        placeholder="" name="max_deposit" required=""
                                                        value="<?= $row['max_deposit']; ?>">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary"
                                                    name="update_plan">Update Plan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>
<?php
require_once "./includes/footer.php";

?>