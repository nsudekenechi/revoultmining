<?php
session_start();
if (isset($_GET["ref"])) {
    $_SESSION["ref"] = $_GET["ref"];
}
require_once "./dbase/config.php";
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Experience unmatched investment opportunities with ZenixMining, the leading ROI platform for secure, transparent, and high-yield crypto returns. Maximize profits with our advanced technology and expert insights. Join ZenixMining today and transform your financial future.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title><?= $title; ?> | Zenixmining</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets-home/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets-home/css/theme.css?ver=3.1.3">
</head>

<body class="nk-body bg-white npc-landing ">

    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <header class="header has-header-main-s1 " id="home">
                <div class="header-main header-main-s1 is-sticky is-transparent ">
                    <div class="container header-container" style="position:relative;">

                        <div class="header-wrap">
                            <div class="header-logo">
                                <a href="./" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/revolutmining.png"
                                        srcset="./images/revolutmining.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/revolutmining.png"
                                        srcset="./images/revolutmining.png 2x" alt="logo-dark">
                                </a>
                            </div>
                            <?php
                            require_once "./googleTranslate.php";
                            ?>
                            <div class="header-toggle">
                                <button class="menu-toggler" data-target="mainNav">
                                    <em class="menu-on icon ni ni-menu"></em>
                                    <em class="menu-off icon ni ni-cross"></em>
                                </button>
                            </div><!-- .header-nav-toggle -->

                            <nav class="header-menu" data-content="mainNav">
                                <ul class="menu-list ms-lg-auto">


                                    <li class="menu-item"><a href="./index.php" class="menu-link nav-link">Home</a></li>
                                    <li class="menu-item"><a href="./aboutus.php" class="menu-link nav-link">About
                                            Us</a>
                                    </li>
                                    <li class="menu-item"><a href="./services.php"
                                            class="menu-link nav-link">Services</a>
                                    </li>
                                    <li class="menu-item"><a href="./faq.php" class="menu-link nav-link">FAQ</a></li>
                                </ul>
                                <ul class="menu-btns d-grid d-md-flex align-items-center gap-2 gap-md-0">
                                    <li>
                                        <a href="./auth/register.php" target="_blank"
                                            class="btn btn-primary btn-lg w-100 d-flex justify-content-center">Register</a>
                                    </li>
                                    <li>
                                        <a href="./auth/" target="_blank"
                                            class="btn btn-outline-primary btn-lg w-100 d-flex justify-content-center">Login</a>
                                    </li>
                                </ul>
                            </nav><!-- .nk-nav-menu -->
                        </div><!-- .header-warp-->

                    </div><!-- .container-->
                </div><!-- .header-main-->