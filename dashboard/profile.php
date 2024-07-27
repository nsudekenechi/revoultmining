<!-- content @s -->
<?php
$title = "Confirm Deposit";
require_once "./includes/header.php";
?>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span>Account Setting</span></div>
                    <h2 class="nk-block-title fw-normal">My Profile</h2>
                    <div class="nk-block-des">
                        <p>You have full control to manage your own account setting. <span class="text-primary"><em
                                    class="icon ni ni-info" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Tooltip on right"></em></span></p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->

            <!-- NK-Block @s -->
            <div class="nk-block">


                <div class="nk-data data-list">
                    <?php
                    $query = "SELECT * FROM users WHERE id = '$user_id'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($res);
                    ?>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Full Name</span>
                            <span class="data-value"><?= $row['name']; ?></span>
                        </div>
                        <div class="data-col data-col-end">
                            <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Username</span>
                            <span class="data-value"><?= $row['username']; ?></span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em
                                    class="icon ni ni-lock-alt"></em></span></div>
                    </div>
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Email</span>
                            <span class="data-value"><?= $row['email']; ?></span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em
                                    class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Phone Number</span>
                            <span class="data-value text-soft"><?= $row['phone_number']; ?></span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Country</span>
                            <span class="data-value"><?= $row['country']; ?></span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                        data-tab-target="#address">
                        <div class="data-col">
                            <span class="data-label">State</span>
                            <span class="data-value"><?= $row['state']; ?></span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->

                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                        data-tab-target="#address">
                        <div class="data-col">
                            <span class="data-label">Address</span>
                            <span class="data-value"><?= $row['address']; ?></span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div>

                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                        data-tab-target="#address">
                        <div class="data-col">
                            <span class="data-label">Account Type</span>
                            <span class="data-value"><?= $row['account_type']; ?></span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div>


                </div><!-- .nk-data -->

            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>
</div>


<div class="modal fade" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <form action="./handler/script.php" method="POST">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Full Name</label>
                                        <input type="text" class="form-control form-control-lg" id="full-name"
                                            value="<?= $row['name']; ?>" placeholder="Enter Full name" name="name"
                                            required>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Phone Number</label>
                                        <input type="text" class="form-control form-control-lg" id="display-name"
                                            value="<?= $row['phone_number']; ?>" placeholder="Enter Phone Number"
                                            name="phone_number" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-county">Country</label>
                                        <select class="form-select js-select2" id="address-county" data-ui="lg"
                                            required name="country">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">State</label>
                                        <input type="text" class="form-control form-control-lg " id=""
                                            placeholder=" Enter your State" value="<?= $row['state']; ?>" name="state"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Address</label>
                                        <input type="text" class="form-control form-control-lg "
                                            id="birth-day" placeholder="Enter your address"
                                            value="<?= $row['address']; ?>" name="address" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Account type</label>
                                        <select class="form-select js-select2" id="account-type" data-ui="lg"
                                            required name="account_type">
                                                <option value="Forex Trading">Forex Trading</option>
                                                <option value="Forex Trading">Stock Trading</option>
                                                <option value="Forex Trading">Binary Option Trading</option>
                                                <option value="Forex Trading">CryptoCurrency  Investment</option>
                                                <option value="Forex Trading">Bitcoin  Mining</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <input type="text" hidden value="<?= $user_id; ?>" name="user">
                                            <button class="btn btn-lg btn-primary" name="update_profile">Update
                                                Profile
                                            </button>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->

                    </div>
                </form>

                <!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->

<script>
    fetch("./assets/country.json").then(res => res.json()).then(data => {
        const { country } = data;
        let addressCountry = document.querySelector("#address-county")
        country.forEach(item => {
            addressCountry.innerHTML += `<option>${item}</option>`
        })
    })
</script>
<?php
require_once "./includes/footer.php";

?>