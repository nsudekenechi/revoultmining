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
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users WHERE name != 'admin' ";
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
                                                <p class="tb-lead amount"><?= $row['verified'] ?></p>
                                            </td>


                                            <td>

                                                <div class="d-flex align-items-center " style="column-gap: 2px;font-size:12px">
                                                    <?php
                                                    if ($row['verified'] == "Accepted") {
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
                                            <?php
                                            if ($row['verified'] == 'Not Verified') {
                                                ?>
                                                <td>
                                                    <ul class="d-flex gap-3 align-content-center">
                                                        <li class="">
                                                            <a href="./handler/adminscript.php?approve_user=<?= $row['id']; ?>"
                                                                class="bg-white btn btn-sm  btn-icon" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" aria-label="Approve"
                                                                data-bs-original-title="Approve"><em
                                                                    class="icon ni ni-done"></em></a>
                                                        </li>

                                                        <li>
                                                            <a href="./handler/adminscript.php?decline_user=<?= $row['id']; ?>"
                                                                class="bg-white btn btn-sm  btn-icon" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" aria-label="Decline"
                                                                data-bs-original-title="Decline"><em
                                                                    class="icon ni ni-cross"></em></a>
                                                            </button>
                                                        </li>

                                                    </ul>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>

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