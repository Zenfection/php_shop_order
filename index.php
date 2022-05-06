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
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="header-logo">
                            <a href="/index.php"><img src="/assets/images/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Menu Start -->
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="main-menu">
                            <ul>
                                <li><a id="nav-home" href="/index.php#home">Trang Chủ</a></li>
                                <li><a id="nav-about" href="/index.php#about">Giới Thiệu</a></li>
                                <li><a id="nav-shop" href="/index.php#shop">Shop</a></li>
                                <li><a id="nav-contact" href="/index.php#contact">Liên Hệ</a></li>
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
                                echo "<a href='#account' id='account' class='header-action-btn header-action-btn-wishlist'>
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

    <div id="content">
        
    </div>
    <!-- Footer Section Start -->
    <footer class="section footer-section">
        <!-- Footer Top Start -->
        <div class="footer-top bg-name-bright section-padding">
            <div class="container">
                <div class="row m-b-n40">
                    <div class="col-12 col-sm-6 col-lg-3 m-b-40">
                        <div class="single-footer-widget">
                            <h1 class="widget-title">Giới Thiệu</h1>
                            <p class="desc-content">ZenShop - Đặt đồ ăn vặt online nhanh chóng và tiện lợi hơn các trang web khác</p>
                            <!-- Soclial Link Start -->
                            <div class="widget-social justify-content-start m-b-n10">
                                <a title="Twitter" href="#/"><i class="icon-social-twitter"></i></a>
                                <a title="Instagram" href="#/"><i class="icon-social-instagram"></i></a>
                                <a title="Linkedin" href="#/"><i class="icon-social-linkedin"></i></a>
                                <a title="Skype" href="#/"><i class="icon-social-skype"></i></a>
                                <a title="Dribble" href="#/"><i class="icon-social-dribbble"></i></a>
                            </div>
                            <!-- Social Link End -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 m-b-40">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Tính Năng</h2>
                            <ul class="widget-list">
                                <li><a href="/index.php#shop" id="nav-shop">Mua Hàng</a></li>
                                <li><a href="/index.php#account" id="account">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 m-b-40">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Hỗ Trợ</h2>
                            <ul class="widget-list">
                                <li><a href="#">Phí Giao hàng</a></li>
                                <li><a href="#">Tra cứu đơn hàng</a></li>
                                <li><a href="#">Hoàn trả hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 m-b-40">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Thao Tác Nhanh</h2>
                            <ul class="widget-list">
                                <li><a href="/index.php#login" id="login">Đăng nhập</a></li>
                                <li><a href="/index.php#register" id="register-account">Đăng ký</a></li>
                                <li><a href="/index.php#viewcart" id="nav-viewcart">Xem Giỏ Hàng</a></li>
                                <li><a href="/index.php#checkout" id="nav-checkout">Thanh Toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom bg-name-light p-t-20 p-b-20">
            <div class="container">
                <div class="row align-items-center m-b-n20">
                    <div class="col-md-6 text-center text-md-start order-2 order-md-1 m-b-20">
                        <div class="copyright-content">
                            <p class="mb-0">© 2022 <a href="https://github.com/zenfection/php_shop_order">Php_Shop_Order</a> Made with <i class="fa fa-heart text-danger"></i> by <a href="https://github.com/zenfection">Zenfection.</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end order-1 order-md-2 m-b-20">
                        <div class="payment">
                            <a href="#/">
                                <img src="assets/images/payment/payment_large.png" alt="Payment">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </footer>
    <!-- Footer Section End -->
    <div id="modal-product">
        
    </div>
    
    <script src="/assets/js/vendor.min.js"></script>
    <script src="/assets/js/plugins.min.js"></script>

    <!--Main JS-->
    <script src="/assets/js/main.js"></script>

</body>

</html>