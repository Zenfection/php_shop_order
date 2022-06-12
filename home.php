<?php
if(session_status() != 2){
    include "./config/connect.php";
}
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
if (isset($_SESSION['logout'])){
    echo $_SESSION['logout'];
    unset($_SESSION['logout']);
}

?>

<!-- Hero/Intro Slider Start -->
<div class="section">
    <div class="hero-slider swiper-container">
        <div class="swiper-wrapper">

            <div class="hero-slide-item swiper-slide">
                <div class="hero-slide-bg">
                    <img src="./assets/images/slider/1.png" alt="Slider Image" />
                </div>
                <div class="container">
                    <div class="hero-slide-content text-start">
                        <h5 class="sub-title">Thực phẩm đa dạng.</h5>
                        <h2 class="title m-0">KHÔNG CHẤT BẢO QUẢN</h2>
                        <p class="ms-0">Tất cả được làm bằng 100% thiên nhiên không chất phụ gia.</p>
                        <a id="shop" class="nav-content btn btn-dark btn-hover-primary">Mua Ngay</a>
                    </div>
                </div>
            </div>

            <div class="hero-slide-item swiper-slide">
                <div class="hero-slide-bg">
                    <img src="./assets/images/slider/2.png" alt="Slider Image" />
                </div>
                <div class="container">
                    <div class="hero-slide-content text-center text-md-end">
                        <h5 class="sub-title">Giao nhận nhanh chóng.</h5>
                        <h2 class="title m-0">FREESHIP TOÀN HÀNG</h2>
                        <p>Các đơn hàng có giá trị trên 200k sẽ được freeship.</p>
                        <a id="shop" class="nav-content btn btn-dark btn-hover-primary">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Swiper Navigation Start -->
        <div class="home-slider-prev swiper-button-prev main-slider-nav d-lg-flex d-none rounded"><i class="fa-duotone fa-angle-left fa-xl"></i></div>
        <div class="home-slider-next swiper-button-next main-slider-nav d-lg-flex d-none rounded"><i class="fa-duotone fa-angle-right fa-xl"></i></div>

        <!-- Swiper Pagination Start -->
        <div class="swiper-pagination d-lg-none"></div>
        <!-- Swiper Pagination End -->
        <!-- Swiper Navigation End -->


    </div>
</div>
<!-- Hero/Intro Slider End -->

<div class="section section-padding">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 m-b-n30" data-aos="fade-out" data-aos-duration="600">

            <div class="col m-b-30">
                <!-- Single CTA Wrapper Start -->
                <div class="single-cta-wrapper">
                    <div class="cta-icon">
                        <i class="fa-duotone fa-truck-fast"></i>
                    </div>
                    <div class="cta-content">
                        <h4 class="title">Miễn phí vận chuyển</h4>
                        <p>Áp dụng cho tất cả đơn hàng</p>
                    </div>
                </div>
                <!-- Single CTA Wrapper End -->
            </div>

            <div class="col m-b-30">
                <!-- Single CTA Wrapper Start -->
                <div class="single-cta-wrapper">
                    <div class="cta-icon">
                        <i class="fa-duotone fa-headset"></i>
                    </div>
                    <div class="cta-content">
                        <h4 class="title">Hỗ trợ 24/7</h4>
                        <p>Gọi Hotline hoặc Email</p>
                    </div>
                </div>
                <!-- Single CTA Wrapper End -->
            </div>

            <div class="col m-b-30">
                <!-- Single CTA Wrapper Start -->
                <div class="single-cta-wrapper">
                    <div class="cta-icon">
                        <i class="fa-duotone fa-money-bill-transfer"></i>
                    </div>
                    <div class="cta-content">
                        <h4 class="title">Hoàn tiền</h4>
                        <p>Hoàn tiền nếu bạn chưa nhận</p>
                    </div>
                </div>
                <!-- Single CTA Wrapper End -->
            </div>

        </div>
    </div>
</div>

<!-- Category Section Start -->
<div class="section section-margin">
    <div class="container">
        <h2>Loại Đồ Ăn</h2>
        <!-- Banners Start -->
        <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 m-b-n30">
            <?php
            $sql = "SELECT * FROM `tb_category` WHERE active = 1 LIMIT 3";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_category'];
                    $title = $row['title'];
                    $image = $row['image'];
            ?>
                    <div class="col m-b-30" data-aos="fade-in">
                        <a href="#" class="banner hover-style">
                            <?php
                            if ($image == "") {
                                echo "<div class='error'>Image not Available</div>";
                            } else {
                            ?>
                                <img class="fit-image p-10" src="./assets/images/category/<?php echo $image; ?>" alt="Banner Image"/>
                            <?php
                            }
                            ?>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <!-- Banners End -->
    </div>
</div>
<!-- Category Section End -->

<!-- Product Section Start -->
<div class="section position-relative">
    <div class="container">

        <!-- Section Title & Tab Start -->
        <div class="row" data-aos="fade-out" data-aos-duration="600">
            <!-- Tab Start -->
            <div class="col-12">
                <ul class="product-tab-nav nav justify-content-center m-b-n15 p-b-40 title-border-bottom">
                    <li class="nav-item m-b-15"><a class="nav-link active" data-bs-toggle="tab" href="#top-product-ranking">Đánh giá cao</a></li>
                    <li class="nav-item m-b-15"><a class="nav-link" data-bs-toggle="tab" href="#top-product-discount">Giảm giá nhiều</a></li>
                    <li class="nav-item m-b-15"><a class="nav-link" data-bs-toggle="tab" href="#top-product-seller">Sản phẩm mua nhiều</a></li>
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <!-- Section Title & Tab End -->

        <!-- Products Tab Start -->

        <div class="row">
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="top-product-ranking">
                        <div class="row m-b-n40">
                            <?php
                            $sql = "SELECT * FROM `tb_product` ORDER BY `tb_product`.`ranking` DESC LIMIT 8";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_product'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $discount = $row['discount'];
                                    $image = $row['image'];
                                    $ranking = $row['ranking'];
                                    $quantity = $row['quantity'];
                            ?>
                                    <?php include "./product.php" ?>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="top-product-discount">
                        <div class="row m-b-n40">
                            <?php
                            $sql = "SELECT * FROM `tb_product` ORDER BY `tb_product`.`discount` DESC LIMIT 8";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_product'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $discount = $row['discount'];
                                    $image = $row['image'];
                                    $ranking = $row['ranking'];
                                    $quantity = $row['quantity'];
                            ?>
                                    <?php include "./product.php" ?>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="top-product-seller">
                        <div class="row m-b-n40">
                            <?php
                            $sql = "SELECT p.*, COUNT(od.amount) as total_amount
                            FROM `tb_order_details` as od, `tb_product` as p
                            WHERE od.id_product = p.id_product
                            GROUP BY p.id_product
                            ORDER BY total_amount DESC
                            LIMIT 8";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_product'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $discount = $row['discount'];
                                    $image = $row['image'];
                                    $ranking = $row['ranking'];
                                    $quantity = $row['quantity'];
                            ?>
                                    <?php include "./product.php" ?>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Products Tab End -->

            </div>
        </div>
    </div>
</div>
<!-- Product Section End -->

<script>
/* Hero Slider Activation */
var swiper = new Swiper('.hero-slider.swiper-container', {
    loop: true,
    speed: 1150,
    spaceBetween: 30,
    slidesPerView: 1,
    effect: 'fade',
    pagination: true,
    navigation: true,

    // Navigation arrows
    navigation: {
        nextEl: '.hero-slider .home-slider-next',
        prevEl: '.hero-slider .home-slider-prev'
    },
    pagination: {
        el: '.hero-slider .swiper-pagination',
        type: 'bullets',
        clickable: 'true'
    },
});

</script>