<?php
session_start();
require "../dbase/config.php";
if (!isset($_SESSION["user"])) {
    header("Location: ../auth/index.php");
}
$user_id = $_SESSION["user"];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$res = mysqli_query($conn, $query);
$userRow = $res->fetch_assoc();
$name = $userRow["name"];
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Home | Admin Panel</title>
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
                        <a href="./dashboard/index.php" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/revolutmining.png"
                                srcset="./images/revolutmining.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/revolutmining.png"
                                srcset="./images/revolutmining.png 2x" alt="logo-dark">
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
                                                <span>AB</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text"><?= $name; ?></span>
                                                <span class="sub-text">info@softnio.com</span>
                                            </div>
                                            <div class="user-action">
                                                <em class="icon ni ni-chevron-down"></em>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                    <div class="user-account-info between-center">
                                        <div class="user-account-main">
                                            <h6 class="overline-title-alt">Available Balance</h6>
                                            <div class="user-balance">2.014095 <small
                                                    class="currency currency-btc">BTC</small></div>
                                            <div class="user-balance-alt">18,934.84 <span
                                                    class="currency currency-btc">BTC</span></div>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-light"><em
                                                class="icon ni ni-line-chart"></em></a>
                                    </div>
                                    <ul class="user-account-data">
                                        <li>
                                            <div class="user-account-label">
                                                <span class="sub-text">Profits (7d)</span>
                                            </div>
                                            <div class="user-account-value">
                                                <span class="lead-text">+ 0.0526 <span
                                                        class="currency currency-btc">BTC</span></span>
                                                <span class="text-success ms-2">3.1% <em
                                                        class="icon ni ni-arrow-long-up"></em></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="user-account-label">
                                                <span class="sub-text">Deposit in orders</span>
                                            </div>
                                            <div class="user-account-value">
                                                <span class="sub-text text-base">0.005400 <span
                                                        class="currency currency-btc">BTC</span></span>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="user-account-links">
                                        <li><a href="#" class="link"><span>Withdraw Funds</span> <em
                                                    class="icon ni ni-wallet-out"></em></a></li>
                                        <li><a href="#" class="link"><span>Deposit Funds</span> <em
                                                    class="icon ni ni-wallet-in"></em></a></li>
                                    </ul>
                                    <ul class="link-list">
                                        <li><a href="html/crypto/./dashboard/profile.php"><em
                                                    class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                        <li><a href="html/crypto/profile-security.html"><em
                                                    class="icon ni ni-setting-alt"></em><span>Account Setting</span></a>
                                        </li>
                                        <li><a href="html/crypto/profile-activity.html"><em
                                                    class="icon ni ni-activity-alt"></em><span>Login Activity</span></a>
                                        </li>
                                    </ul>
                                    <ul class="link-list">
                                        <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- .nk-sidebar-widget -->

                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu">

                                    <li class="nk-menu-item">
                                        <a href="./admin/index.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item">
                                        <a href="./admin/usermanagement.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                            <span class="nk-menu-text">User management</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item">
                                        <a href="./admin/deposits.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                            <span class="nk-menu-text">Deposits</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item">
                                        <a href="./admin/withdrawals.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                            <span class="nk-menu-text">Withdrawals</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item has-sub">
                                        <a href="./admin/walletaddress_add.php" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span>
                                            <span class="nk-menu-text">Wallet Addresses</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="./admin/walletaddress_add.php" class="nk-menu-link"><span
                                                        class="nk-menu-text">Add</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="./admin/walletaddress_view.php" class="nk-menu-link"><span
                                                        class="nk-menu-text">View</span></a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="./admin/plans.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-coin-alt"></em></span>
                                            <span class="nk-menu-text">Plans</span>
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
                                    <a class="nk-news-item" href="#">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="nk-news-text">
                                            <p>Do you know the latest update of 2022? <span> A overview of our is now
                                                    available on YouTube</span></p>
                                            <em class="icon ni ni-external"></em>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="quick-icon border border-light">
                                                <img class="icon" src="./images/flags/english-sq.png" alt="">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/english.png" alt=""
                                                            class="language-flag">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/spanish.png" alt=""
                                                            class="language-flag">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/french.png" alt=""
                                                            class="language-flag">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/turkey.png" alt=""
                                                            class="language-flag">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status user-status-unverified">Unverified</div>
                                                    <div class="user-name dropdown-indicator">Abu Bin Ishityak</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Abu Bin Ishtiyak</span>
                                                        <span class="sub-text">info@softnio.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner user-account-info">
                                                <h6 class="overline-title-alt">Nio Wallet Account</h6>
                                                <div class="user-balance">12.395769 <small
                                                        class="currency currency-btc">BTC</small></div>
                                                <div class="user-balance-sub">Locked <span>0.344939 <span
                                                            class="currency currency-btc">BTC</span></span></div>
                                                <a href="#" class="link"><span>Withdraw Funds</span> <em
                                                        class="icon ni ni-wallet-out"></em></a>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/crypto/./dashboard/profile.php"><em
                                                                class="icon ni ni-user-alt"></em><span>View
                                                                Profile</span></a></li>
                                                    <li><a href="html/crypto/profile-security.html"><em
                                                                class="icon ni ni-setting-alt"></em><span>Account
                                                                Setting</span></a></li>
                                                    <li><a href="html/crypto/profile-activity.html"><em
                                                                class="icon ni ni-activity-alt"></em><span>Login
                                                                Activity</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em
                                                                class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown notification-dropdown me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                </div>
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>