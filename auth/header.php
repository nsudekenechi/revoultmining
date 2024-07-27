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
        content="Discover unparalleled investment opportunities with RevoultMining, the premier ROI platform dedicated to delivering secure, transparent, and high-yield crypto returns. Leverage our advanced technology and expert insights to maximize your profits in the dynamic world of cryptocurrencies. Join RevoultMining today and take a decisive step towards revolutionizing your financial future..">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title> <?= $title; ?> | Revoultmining</title>
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