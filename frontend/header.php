<?php
include "./config/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Vendor CSS (Icon Font) -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/themify-icons-min.css" /> -->


    <!-- Plugins CSS (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" /> -->

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <title>Shop Order</title>
</head>

<body>
    <div class="header-bottom">
        <div class="header-sticky">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- Header Logo Start -->
                    <div class="col-lg-3 col-md-4 col-6" data-aos="fade-in" data-aos-duration="500">
                        <div class="header-logo">
                            <a href="/index.php"><img src="/assets/images/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Menu Start -->
                    <div class="col-lg-5 d-none d-lg-block" data-aos="fade-in" data-aos-duration="500">
                        <div class="main-menu">
                            <ul>
                                <li><a style="cursor:pointer" id="nav-home" href="/index.php#home">Trang Chủ</a></li>
                                <li><a style="cursor:pointer" id="nav-about" href="/index.php#about">Giới Thiệu</a></li>
                                <li><a style="cursor:pointer" id="nav-shop" href="/index.php#shop">Shop</a></li>
                                <li><a style="cursor:pointer" id="nav-contact" href="/index.php#contact">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Menu End -->

                    <!-- Header Action Start -->
                    <div class="col-lg-4 col-md-8 col-6">
                        <div class="header-actions">
                            <?php include "./frontend/search.php" ?>
                            <!-- account login -->
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo "<a href='/index.php#account' id='account' class='header-action-btn header-action-btn-wishlist'>
                                    <i class='icon-user icons'></i> " . $_SESSION['user'] . "</a>";
                            } else {
                                echo "<a href='#login' id='login' class='header-action-btn header-action-btn-wishlist'><i class='icon-user icons'></i> Login</a>";
                            }
                            ?>
                            <?php include "./frontend/cart.php" ?>
                            <!-- Scroll Top Start -->
                            <a href="#" class="scroll-top show rounded" id="scroll-top">
                                <i class="arrow-top ti-angle-double-up"></i>
                                <i class="arrow-bottom ti-angle-double-up"></i>
                            </a>
                            <!-- Scroll Top End -->
                            <!-- Mobile Menu Hambarger Action Button Start -->
                            <a href="javascript:void(0)" class="header-action-btn header-action-btn-menu d-lg-none d-md-flex">
                                <i class="icon-menu"></i>
                            </a>
                            <!-- Mobile Menu Hambarger Action Button End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>