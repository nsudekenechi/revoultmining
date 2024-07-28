<?php
session_start();
if (isset($_GET["ref"])) {
    $_SESSION["ref"] = $_GET["ref"];
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
        content="Discover unparalleled investment opportunities with Zenixmining, the premier ROI platform dedicated to delivering secure, transparent, and high-yield crypto returns. Leverage our advanced technology and expert insights to maximize your profits in the dynamic world of cryptocurrencies. Join Zenixmining today and take a decisive step towards revolutionizing your financial future.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title> <?= $title; ?> | Zenixmining</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content  nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                                        class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.php" class="logo-link">
                                        <img class="logo-light logo-img logo-img-md" src="./images/revolutmining.png"
                                            srcset="./images/revolutmining.png" alt="logo">
                                        <img class="logo-dark logo-img logo-img-md" src="./images/revolutmining.png"
                                            srcset="./images/revolutmining.png" alt="logo-dark">
                                    </a>
                                </div>