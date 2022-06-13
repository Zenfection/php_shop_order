<?php
if (session_status() != 2) {
    include "./config/connect.php";
}
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
if (isset($_SESSION['logout'])) {
    echo $_SESSION['logout'];
    unset($_SESSION['logout']);
}

?>

<!-- start hero -->
<section class="hero-1 bg-white position-relative d-flex align-items-center justify-content-center overflow-hidden">
    <div class="shapes" data-aos-duration="1000">
        <div class="shape-1"><img src="./assets/images/shapes/shape-1.svg" alt="shape"></div>
        <div class="shape-2"><img src="./assets/images/shapes/shape-2.svg" alt="shape"></div>
        <div class="shape-3"><img src="./assets/images/shapes/shape-3.svg" alt="shape"></div>
        <div class="shape-4"><img src="./assets/images/shapes/shape-4.svg" alt="shape"></div>
        <div class="shape-5"><img src="./assets/images/shapes/shape-5.svg" alt="shape"></div>
        <div class="shape-6"><img src="./assets/images/shapes/shape-6.svg" alt="shape"></div>
        <div class="shape-7"><img src="./assets/images/shapes/shape-7.svg" alt="shape"></div>
        <div class="shape-8"><img src="./assets/images/shapes/shape-8.svg" alt="shape"></div>
    </div>
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-6 mt-4 pt-2" data-aos="fade-in">
                <h6 class="text-primary mb-3 fw-hero">Được phát triển bởi
                    <a href="https://facebook.com/zenfection" target="_blank">
                        <u><i class="fa-duotone fa-at"></i>Zenfection</u>
                    </a>
                </h6>
                <h1 class="ml11 mb-2">
                    <span class="text-wrapper">
                        <span class="line line1"></span>
                        <span class="letters pb-0 fw-hero">Zen Shop Order</span>
                    </span>
                </h1>
                <h5 class="my-4 fw-hero"><i class="fa-duotone fa-phone-volume"></i> Liên hệ với tôi nếu bạn có ý tưởng</h5>

                <p class="text-muted mb-2 fw-hero">Sản phẩm được phát triển cả nhân nên có rất nhiều lỗi <br> nếu bạn phát hiện hãy liên hệ với tôi bên trên.</p>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <a class="nav-content btn btn-primary mt-4" id="shop">Mua Hàng
                        <i class="fa-duotone fa-cart-shopping-fast fa-xl"></i>
                    </a>
                <?php
                } else {
                ?>
                    <a class="nav-content btn btn-primary mt-4" id="login">Đăng Nhập
                        <i class="fa-duotone fa-arrow-right-to-bracket fa-xl"></i>
                    </a>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-6 mt-lg-4 pt-2 mt-5 d-lg-flex d-none" data-aos="fade-left">
                <img class="fit-image" src="./assets/images/home.png">
            </div>

        </div>
    </div>
    <!-- end container -->
</section>
<!-- end hero -->

<!-- start solution -->
<section class="service-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 mb-4">
                <h4 class="fw-semibold mb-3 fw-hero">Chức Năng Nổi Bật</h4>
                <h5 class="text-muted fw-normal fw-hero">Liệt kê các nổi bật trong trang web </h5>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="feature-slider">
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5 ">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-rabbit-running fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Tốc độ ưu việt</h5>
                                <a class="text-muted">Không cần phải <span class="fw-semibold fs-15 text-dark">refresh</span> lại trang khi sử dụng</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-users-viewfinder fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Sử dụng đơn giản</h5>
                                <a class="text-muted">Thiết kế sử dụng dựa trên<span class="fw-semibold fs-15 text-dark"> trải nghiệm thực tế</span></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-binary-lock fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Mã hóa mật khẩu</h5>
                                <a class="text-muted">Sử dụng hàm băm<span class="fw-semibold fs-15 text-dark"> SHA516</span> để mã hóa mật khẩu của người dùng</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-fork-knife fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Hàng hóa đa dạng</h5>
                                <a class="text-muted">Mua bán nhiều sản phẩm và có thể<span class="fw-semibold fs-15 text-dark"> thêm mới</span></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-filters fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Bộ lọc thông minh</h5>
                                <a class="text-muted">Bộ lọc sản phẩm do chính <span class="fw-semibold fs-15 text-dark"> Zen</span> phát triển</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-box-circle-check fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Xem lại đơn hàng</h5>
                                <a class="text-muted">Theo dõi <span class="fw-semibold fs-15 text-dark"> đơn hàng</span> cá nhân vừa đặt dễ dàng</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-basket-shopping fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Giỏ hàng thông minh</h5>
                                <a class="text-muted"><span class="fw-semibold fs-15 text-dark">Thêm, sửa, xóa</span> sản phẩm với hiệu suất nhanh chóng</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 pt-2">
                            <div class="solution border rounded position-relative px-4 py-5">
                                <div class="sw-1 mb-4 sol-icon">
                                    <i class="fa-duotone fa-eye-low-vision fa-3x"></i>
                                </div>
                                <h5 class="lh-base fs-16 mb-2">Không lấy dữ diệu</h5>
                                <a class="text-muted">Cam kết không lấy bất cứ<span class="fw-semibold fs-15 text-dark"> dữ liệu</span> của người dùng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end solution -->

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
                                <img class="fit-image p-10" src="./assets/images/category/<?php echo $image; ?>" alt="Banner Image" />
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
    let textWrapper = document.querySelector('.ml11 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

    anime.timeline({
            loop: true
        })
        .add({
            targets: '.ml11 .line',
            scaleY: [0, 1],
            opacity: [0.5, 1],
            easing: "easeOutExpo",
            duration: 700
        })
        .add({
            targets: '.ml11 .line',
            translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
            easing: "easeOutExpo",
            duration: 700,
            delay: 100
        }).add({
            targets: '.ml11 .letter',
            opacity: [0, 1],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=775',
            delay: (el, i) => 34 * (i + 1)
        }).add({
            targets: '.ml11',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
    // feature-slidier
    if (document.getElementsByClassName('feature-slider')[0] != undefined) {
        var slider = tns({
            container: '.feature-slider',
            loop: true,
            navPosition: "bottom",
            speed: 400,
            mouseDrag: true,
            controls: false,
            autoplay: true,
            autoplayButtonOutput: false,
            responsive: {
                640: {
                    edgePadding: 20,
                    gutter: 20,
                    items: 1
                },
                700: {
                    edgePadding: 20,
                    gutter: 30,
                    items: 2
                },
                900: {
                    edgePadding: 20,
                    items: 4
                }
            }
        });
    }
</script>