<?php include "./frontend/header.php" ?>

<!-- Single Product Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2">

                <!-- Product Details Image Start -->
                <div class="product-details-img">

                    <!-- Single Product Image Start -->
                    <div class="single-product-img swiper-container product-gallery-top">
                        <div class="swiper-wrapper popup-gallery">
                            <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `tb_product` WHERE id_product = $id";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $image = $row['image'];
                            $name = $row['name'];
                            $price = $row['price'];
                            $discount = $row['discount'];
                            $ranking = $row['ranking'];
                            $description = $row['description'];
                            $quantity = $row['quantity'];
                            $id_category = $row['id_category'];
                            ?>
                            <a class='swiper-slide w-100'>
                                <img class='w-100 rounded' id="img-product<?php echo $id ?>" src='./assets/images/products/<?php echo $image ?>' alt='Product'>
                            </a>";
                            ?>

                        </div>
                    </div>
                    <!-- Single Product Image End -->

                    <!-- Single Product Thumb Start -->
                    <div class="single-product-thumb swiper-container product-gallery-thumbs">
                        <!-- Next Previous Button Start -->
                        <div class="swiper-button-next swiper-nav-button"><i class="ti-arrow-right"></i></div>
                        <div class="swiper-button-prev swiper-nav-button"><i class="ti-arrow-left"></i></div>
                        <!-- Next Previous Button End -->
                    </div>
                    <!-- Single Product Thumb End -->

                </div>
                <!-- Product Details Image End -->

            </div>
            <div class="col-lg-7">

                <!-- Product Summery Start -->
                <div class="product-summery position-relative">

                    <!-- Product Head Start -->
                    <div class="product-head m-b-15">
                        <?php
                        echo "<h2 class='product-title'>$name</h2>";
                        ?>
                    </div>
                    <!-- Product Head End -->

                    <!-- Rating Start -->
                    <span class="rating justify-content-start m-b-10">
                        <?php
                        for ($j = 0; $j < 5; $j++) {
                            if ($ranking > 2) {
                                echo "<i class='fa fa-star'></i>";
                                $ranking -= 2;
                            } else if ($ranking > 0) {
                                echo "<i class='fa fa-star-half-o'></i>";
                                $ranking = 0;
                            } else {
                                echo "<i class='fa fa-star-o'></i>";
                            }
                        }
                        ?>
                    </span>
                    <!-- Rating End -->

                    <!-- Price Box Start -->
                    <span class="price-box m-b-10">
                        <?php
                        if ($discount > 0) {
                            $discount_price = $price - ($price * $discount / 100);
                        ?>
                            <span class="regular-price">$<?php echo $discount_price ?></span>
                            <span class="old-price">$<?php echo $price ?></span>
                        <?php
                        } else {
                        ?>
                            <span class='regular-price'>$<?php echo $price ?></span>
                        <?php
                        }
                        ?>
                    </span>
                    <!-- Price Box End -->

                    <!-- Product Inventory Start -->
                    <div class="product-inventroy m-b-15">
                        <?php
                        echo "<span class='inventroy-title'> <strong>Có sẵn:</strong></span>";
                        echo "<span class='inventory-varient'> $quantity trong kho</span>";
                        ?>
                    </div>
                    <!-- Product Inventory End -->

                    <!-- Description Start -->
                    <?php
                    echo "<p class='desc-content m-b-25'>$description.</p>";
                    ?>
                    <!-- Description End -->

                    <!-- Quantity Start -->
                    <div class="quantity d-flex align-items-center m-b-25">
                        <span class="m-r-10"><strong>Số lượng: </strong></span>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" value="1" type="text">
                            <div class="dec qtybutton"></div>
                            <div class="inc qtybutton"></div>
                        </div>
                    </div>
                    <!-- Quantity End -->

                    <!-- Cart Button Start -->
                    <div class="cart-btn action-btn m-b-30">
                        <div class="action-cart-btn-wrapper d-flex">
                            <div class="add-to_cart" id="product<?php echo $id ?>">
                                <a class="btn btn-primary btn-hover-dark rounded" style="width: 110%">Thêm Vào Giỏ</a>
                            </div>
                            <a href="#" title="Wishlist" class="action"><i class="ti-heart"></i></a>
                        </div>
                    </div>
                    <!-- Cart Button End -->

                    <!-- Social Shear Start -->
                    <div class="social-share">
                        <div class="widget-social justify-content-start m-b-30">
                            <a title="Twitter" href="#/"><i class="icon-social-twitter"></i></a>
                            <a title="Instagram" href="#/"><i class="icon-social-instagram"></i></a>
                            <a title="Linkedin" href="#/"><i class="icon-social-linkedin"></i></a>
                            <a title="Skype" href="#/"><i class="icon-social-skype"></i></a>
                            <a title="Dribble" href="#/"><i class="icon-social-dribbble"></i></a>
                        </div>
                    </div>
                    <!-- Social Shear End -->

                    <!-- Payment Option Start -->
                    <div class="payment-option m-t-20 d-flex">
                        <span><strong>Thanh Toán: </strong></span>
                        <a href="#">
                            <img class="fit-image m-l-5" src="./assets/images/payment/payment_large.png" alt="Payment Option Image">
                        </a>
                    </div>
                    <!-- Payment Option End -->

                </div>
                <!-- Product Summery End -->

            </div>

        </div>
    </div>
</div>
<!-- Single Product Section End -->

<!-- Single Product Tab Start -->
<div class="section section-padding bg-name-bright">
    <div class="container">
        <div class="row">

            <!-- Single Product Tab Start -->
            <div class="col-lg-12 single-product-tab">
                <ul class="nav nav-tabs m-b-n15" id="myTab" role="tablist">
                    <li class="nav-item m-b-15">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Mô Tả</a>
                    </li>
                    <li class="nav-item m-b-15">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Đánh Giá</a>
                    </li>
                    <li class="nav-item m-b-15">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Chính sách vận chuyển</a>
                    </li>
                </ul>

                <div class="tab-content mb-text" id="myTabContent">
                    <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                        <div class="desc-content">
                            <p class="m-b-15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt vel hic iusto repellat odio. Rem distinctio, consectetur officia vitae ut quae sint velit, deserunt nesciunt cumque, repellat id iste earum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae atque voluptatibus sit molestiae cum laborum neque, facilis explicabo eum aliquam est similique inventore minus commodi sed, autem optio vero officiis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad facere sunt aspernatur repellat earum maiores magni, autem obcaecati minus necessitatibus quis consequuntur pariatur. Sed neque impedit at similique. Dolorem, perspiciatis.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                        <h4 class="title m-b-20">Tính năng chưa phát triển</h4>
                    </div>
                    <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- Shipping Policy Start -->
                        <div class="shipping-policy m-t-40 m-b-n15">
                            <h4 class="title m-b-20">Shipping policy for our store</h4>
                            <p class="m-b-15">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate</p>
                            <ul class="policy-list m-b-15">
                                <li>1-2 business days (Typically by end of day)</li>
                                <li><a href="#">30 days money back guaranty</a></li>
                                <li>24/7 live support</li>
                                <li>odio dignissim qui blandit praesent</li>
                                <li>luptatum zzril delenit augue duis dolore</li>
                                <li>te feugait nulla facilisi.</li>
                            </ul>
                            <p class="m-b-15">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
                            <p class="m-b-15">claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per</p>
                            <p class="m-b-15">seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                        </div>
                        <!-- Shipping Policy End -->
                    </div>
                </div>

            </div>
            <!-- Single Product Tab End -->

        </div>
    </div>
</div>
<!-- Single Product Tab End -->

<!-- Product Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm tương tự</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col">

                <div class="product-carousel arrow-outside-container">
                    <div class="swiper-container">

                        <div class="swiper-wrapper">

                            <?php
                            $sql = "SELECT * FROM `tb_product` WHERE id_category = '$id_category'";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            for ($i = 0; $i < $count; $i++) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_product'];
                                    $name = $row['name'];
                                    $price = $row['price'];
                                    $discount = $row['discount'];
                                    $ranking = $row['ranking'];
                                    $image = $row['image'];
                            ?>
                                    <div class="swiper-slide">
                                        <!-- Product Start -->
                                        <div class="product-wrapper">
                                            <div class="product">
                                                <!-- Thumb Start  -->
                                                <div class="thumb">
                                                    <a href="./detail_product.php?id=<?php echo $id ?>" class="image">
                                                        <img class="fit-image rounded" src="./assets/images/products/<?php echo $image ?>" alt="Product" />
                                                    </a>
                                                    <?php
                                                    if ($discount > 0) {
                                                        $discount_price = $price - ($price * $discount / 100);
                                                    ?>
                                                        <span class="badges">
                                                            <span class='sale'>-<?php echo (int)$discount ?>%</span>
                                                        </span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="action-wrapper" id="wrapper<?php echo $id ?>">
                                                        <a class="action" id="plus_product" title="Thêm sản phẩm"><i class="ti-plus"></i></a>
                                                        <a class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>
                                                        <a href="./index.php#viewcart" class="action cart" title="Cart" onclick="$.ajax({
                                                type: 'post',
                                                url: './viewcart.php',
                                                success: function(data){
                                                    $('#content').html(data);
                                                }
                                            });"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <!-- Thumb End  -->

                                                <!-- Content Start  -->
                                                <div class="content">
                                                    <h5 class="title"><a href="./detail_product.php?id=<?php echo $id ?>"><?php echo $name ?></a></h5>
                                                    <span class="rating">
                                                        <?php
                                                        for ($j = 0; $j < 5; $j++) {
                                                            if ($ranking > 2) {
                                                                echo "<i class='fa fa-star'></i>";
                                                                $ranking -= 2;
                                                            } else if ($ranking > 0) {
                                                                echo "<i class='fa fa-star-half-o'></i>";
                                                                $ranking = 0;
                                                            } else {
                                                                echo "<i class='fa fa-star-o'></i>";
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class="price">
                                                        <?php
                                                        if ($discount > 0) {
                                                        ?>
                                                            <span class="new">$<?php echo $discount_price ?></span>
                                                            <span class="old">$<?php echo $price ?></span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class='new'>$<?php echo $price ?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                                <!-- Content End  -->
                                            </div>
                                        </div>
                                        <!-- Product End -->
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>

                        <div class="swiper-pagination d-block d-md-none"></div>
                        <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="ti-angle-left"></i></div>
                        <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i class="ti-angle-right"></i></div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Product Section End -->
<?php include "./frontend/footer.php" ?>