<?php
require_once "./includes/header.php";
?>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add Wallet</h3>
                        <div class="nk-block-des text-soft">
                            <p>Create a wallet address</p>
                        </div>
                    </div><!-- .nk-block-head-content -->

                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered">
                        <div class="card-inner">

                            <form action="./handler/adminscript.php" method="POST" enctype="multipart/form-data">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Wallet Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="full-name-1"
                                                    placeholder="Enter wallet name" name="wallet_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email-address-1">Wallet acronym</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="email-address-1"
                                                    placeholder="Enter wallet acronym" name="wallet_acronym" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Wallet Address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="full-name-1"
                                                    placeholder="Enter wallet name" name="wallet_address" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Rate</label>
                                            <div class="form-control-wrap">
                                                <input type="number" class="form-control" id="full-name-1"
                                                    placeholder="0.0" name="rate" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no-1">Display Picture</label>
                                            <div class="form-control-wrap">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" id="customFile" required
                                                        accept=".png,.jpg,.jpeg" name="displayPicture">
                                                    <label class="form-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no-1">QR Code</label>
                                            <div class="form-control-wrap">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" id="customFile" required
                                                        accept=".png,.jpg,.jpeg" name="qrCode">
                                                    <label class="form-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"
                                                name="createwallet">Create wallet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    < </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>

    <?php
    require_once "./includes/footer.php";
    ?>