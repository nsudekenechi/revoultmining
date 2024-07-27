<?php
session_start();
require "../dbase/config.php";
if (!isset($_SESSION["user"])) {
    header("Location: ../auth/login.php");
}
$user_id = $_SESSION["user"];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$res = mysqli_query($conn, $query);
$userRow = $res->fetch_assoc();
$name = $userRow["name"];

if ($title == "Withdraw" && $userRow["balance"] < 10) {
    header("Location: ./deposit.php?balance=f");
}
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Discover unparalleled investment opportunities with RevoultMining, the premier ROI platform dedicated to delivering secure, transparent, and high-yield crypto returns. Leverage our advanced technology and expert insights to maximize your profits in the dynamic world of cryptocurrencies. Join RevoultMining today and take a decisive step towards revolutionizing your financial future.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title><?= $title; ?> | RevoultMining</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
</head>

<body class="nk-body npc-crypto bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/crypto/index.php" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                                alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png"
                                srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <!-- <span class="nio-version">Crypto</span> -->
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                                class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
                <!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body" data-simplebar>
                        <div class="nk-sidebar-content">

                            <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                                <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                                    <div class="user-card-wrap">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                <?php
                                                if (str_contains($userRow['name'], " ")) {
                                                    $split = explode(" ", $userRow['name']);
                                                    ?>
                                                    <span>
                                                        <?= strtoupper($split[0][0]) . strtoupper($split[1][0]); ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span> <?= strtoupper(substr($userRow["name"], 0, 2)); ?></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text"><?= $name; ?></span>
                                                <span class="sub-text"><?= $userRow['email']; ?></span>
                                            </div>
                                            <div class="user-action">
                                                <em class="icon ni ni-chevron-down"></em>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                    <div class="dropdown-inner user-account-info">
                                        <div class="user-balance">
                                            <span class="amount"><?= $userRow['balance']; ?> </span>
                                            <small class="currency currency-btc">GBP</small>
                                        </div>

                                        <a href="./dashboard/withdraw.php" class="link"><span>Withdraw
                                                Funds</span> <em class="icon ni ni-wallet-out"></em></a>
                                    </div>

                                    <ul class="link-list">
                                        <li><a href="./dashboard/profile.php"><em
                                                    class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>

                                    </ul>
                                    <ul class="link-list">
                                        <li><a href="./dashboard/signout.php"><em
                                                    class="icon ni ni-signout"></em><span>Sign out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- .nk-sidebar-widget -->

                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu">

                                    <li class="nk-menu-item">
                                        <a href="./dashboard/index.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item">
                                        <a href="./dashboard/deposit.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                            <span class="nk-menu-text">Deposit</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item">
                                        <a href="./dashboard/withdraw.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                            <span class="nk-menu-text">Withdraw</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item">
                                        <a href="./dashboard/wallets.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                            <span class="nk-menu-text">Wallets</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item">
                                        <a href="./dashboard/requests.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                                            <span class="nk-menu-text">Requests</span>
                                        </a>
                                    </li>





                                    <li class="nk-menu-item">
                                        <a href="./dashboard/profile.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em
                                                    class="icon ni ni-account-setting"></em></span>
                                            <span class="nk-menu-text">My Profile</span>
                                        </a>
                                    </li>
                                </ul><!-- .nk-menu -->
                            </div><!-- .nk-sidebar-menu -->

                        </div><!-- .nk-sidebar-content -->
                    </div><!-- .nk-sidebar-body -->
                </div>
                <!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fluid nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                        class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/crypto/index.php" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png"
                                        srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png"
                                        srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                    <span class="nio-version">Crypto</span>
                                </a>
                            </div>
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <a class="nk-news-item">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="">
                                            <p id="welcome-message">

                                            </p>
                                            <!-- <em class="icon ni ni-external"></em> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">

                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <?php
                                                $query = "SELECT * FROM users WHERE id = '$user_id'";
                                                $res = mysqli_query($conn, $query);
                                                $row = mysqli_fetch_assoc($res);
                                                ?>
                                                <div class="user-avatar sm">
                                                    <?= strtoupper(substr($row["name"], 0, 1)); ?>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status user-status-verified">Verified</div>
                                                    <div class="user-name dropdown-indicator"><?= $row['name']; ?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <?php
                                                        if (str_contains($row['name'], " ")) {
                                                            $split = explode(" ", $row['name']);
                                                            ?>
                                                            <span>
                                                                <?= strtoupper($split[0][0]) . strtoupper($split[1][0]); ?>
                                                            </span>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <span> <?= strtoupper(substr($row["name"], 0, 2)); ?></span>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"> <?= $row['name']; ?></span>
                                                        <span class="sub-text"> <?= $row['email']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner user-account-info">
                                                <div class="user-balance">
                                                    <span class="amount"><?= $row['balance']; ?> </span>
                                                    <small class="currency currency-btc">GBP</small>
                                                </div>

                                                <a href="./dashboard/withdraw.php" class="link"><span>Withdraw
                                                        Funds</span> <em class="icon ni ni-wallet-out"></em></a>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="./dashboard/profile.php"><em
                                                                class="icon ni ni-user-alt"></em><span>View
                                                                Profile</span></a></li>

                                                    <li><a class="dark-switch" href="#"><em
                                                                class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="./dashboard/signout.php"><em
                                                                class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>