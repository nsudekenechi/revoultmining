<?php
require_once "./includes/header.php";
?>
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
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div id="container" class="py-5 my-5">
                <div class="">
                    <div class="card-inner card card-bordered card-preview" id="container-table">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Referral Balance</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users WHERE name != 'admin'";
                                $res = mysqli_query($conn, $query);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        ?>
                                        <tr data-bs-toggle="modal" data-bs-target="#modalDefault<?= $row['id']; ?>">
                                            <th scope="row"><?= $row['name']; ?></th>
                                            <td>
                                                <div class="">
                                                    <p class="tb-lead"><?= $row['email'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="tb-lead"><?= $row['address'] ?></p>
                                            </td>
                                            <td>
                                                <p class="tb-lead amount"><?= $row['balance'] ?></p>
                                            </td>

                                            <td>
                                                <p class="tb-lead amount"><?= $row['ref_balance'] ?></p>
                                            </td>
                                            <td>

                                                <div class="d-flex align-items-center " style="column-gap: 2px;font-size:12px">
                                                    <?php
                                                    if (!$row['suspend']) {
                                                        ?>
                                                        <div class="dot dot-success "></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="dot dot-danger   "></div>

                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>

                                        </tr>
                                        <div class="modal fade" tabindex="-1" id="modalDefault<?= $row['id'] ?>"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update User</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body align-items-start" id="modal-body">
                                                        <form action="./handler/adminscript.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <input type="text" hidden value="<?= $row['id']; ?>" name="user">
                                                            <div class="row g-4">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="full-name-1">User's
                                                                            Balance</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control"
                                                                                id="full-name-1"
                                                                                placeholder="<?= number_format($row['balance'], 2); ?>"
                                                                                name="balance" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="email-address-1">User's
                                                                            Referral Balance</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control"
                                                                                id="email-address-1"
                                                                                placeholder="<?= number_format($row['ref_balance'], 2); ?>"
                                                                                name="ref_balance" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                            class="w-100 d-flex justify-content-center btn btn-lg btn-primary"
                                                                            name="update_balance">
                                                                            Update Balance
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                            class="w-100 d-flex justify-content-center btn btn-lg btn-danger"
                                                                            name="deduct_balance">
                                                                            Deduct Balance
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <?php
                                                                        if (!$row['suspend']) {
                                                                            ?>
                                                                            <button type="submit"
                                                                                class="w-100 d-flex justify-content-center btn btn-lg btn-danger"
                                                                                name="suspend_user">
                                                                                Suspend User
                                                                            </button>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <button type="submit"
                                                                                class="w-100 d-flex justify-content-center btn btn-lg btn-success"
                                                                                name="suspend_user">
                                                                                Unsuspend User
                                                                            </button>
                                                                            <?php
                                                                        }
                                                                        ?>
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

                                    <?php
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            <p class="text-center p-3">No user have registered.</p>
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
        </div>
    </div>
</div>
<!-- content @e -->

<?php
require_once "./includes/footer.php";
?>