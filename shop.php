<?php include "./config/connect.php"; ?>

<!-- Shop Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-in" data-aos-duration="500">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper flex-column flex-md-row p-2 m-b-40 border">

                    <!-- Shop Top Bar Left start -->
                    <div class="shop-top-bar-left">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i class="fa-duotone fa-grid-dividers"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa-duotone fa-align-justify"></i></button>
                        </div>
                        <div class="shop-top-show">
                            <?php
                            if (isset($_POST['search'])) {
                                $search = $_POST['search'];
                                $sql = "SELECT * FROM `tb_product` 
                                        WHERE LOWER(name) 
                                        COLLATE UTF8_GENERAL_CI 
                                        LIKE CONCAT('%', LOWER(CONVERT('$search', BINARY)), '%')";
                            } else {
                                $sql = "SELECT * FROM `tb_product`";
                            }
                            $result = $conn->query($sql);
                            $total = $result->num_rows;
                            echo "<span>Tổng cộng có $total sản phẩm</span>";
                            ?>
                        </div>

                    </div>
                    <!-- Shop Top Bar Left end -->

                </div>
                <!--shop toolbar end-->

                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_4">
                    <?php
                    require_once "./class/paginator.php";
                    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 8;
                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                    $links = (isset($_GET['links'])) ? $_GET['links'] : 7;
                    $paginator = new Paginator($conn, $sql);
                    $results = $paginator->getData($limit, $page);

                    //$limit > $total ? $limit = $total : $limit;
                    $check = $total - ($limit * ($page - 1));
                    $limit > $check ? $limit = $check : $limit;
                    if ($check > 0) {
                        for ($i = 0; $i < $limit; $i++) {
                            $id = $results->data[$i]['id_product'];
                            $name = $results->data[$i]['name'];
                            $description = $results->data[$i]['description'];
                            $price = (float)$results->data[$i]['price'];
                            $image = $results->data[$i]['image'];
                            $discount = (int)$results->data[$i]['discount'];
                            $ranking = (int)$results->data[$i]['ranking'];
                            $quantity = (int)$results->data[$i]['quantity'];
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                                <div class="product-inner" id="product<?php echo $id ?>">
                                    <div class="thumb">
                                        <a class="nav-content cursor-pointer image" id="detail_product">
                                            <img class="fit-image p-10" id="img-product<?php echo $id ?>" src="./assets/images/products/<?php echo $image ?>" alt="Product" />
                                        </a>
                                        <?php
                                        if ($discount > 0) {
                                            $discount_price = $price - ($price * $discount / 100);
                                        ?>
                                            <span class="badges">
                                                <span class="sale"><?php echo (int)$discount ?> %</span>
                                            </span>
                                        <?php
                                        }
                                        ?>
                                        <div class="action-wrapper" id="wrapper<?php echo $id ?>">
                                            <a class="action" id="plus_product" title="Thêm sản phẩm"><i class="fa-regular fa-plus-large"></i></a>
                                            <a class="action wishlist" title="Wishlist"><i class="fa-regular fa-heart"></i></a>
                                            <a class="nav-content cursor-pointer action cart" id="viewcart" title="Cart"><i class="fa-regular fa-cart-circle-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a class="nav-content cursor-pointer product-title" id="detail_product"><?php echo $name ?></a></h5>
                                        <span class="rating">
                                            <?php
                                            $temp = $ranking;
                                            for ($j = 0; $j < 5; $j++) {
                                                if ($temp > 2) {
                                                    echo "<i class='fa-solid fa-star' style='color: #ffad42'></i>";
                                                    $temp -= 2;
                                                } else if ($temp > 0) {
                                                    echo "<i class='fa-solid fa-star-half' style='color: #ffad42'></i>";
                                                    $temp = 0;
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
                                        <?php
                                        echo "<p>$description</p>"
                                        ?>
                                        <!-- Cart Button Start -->
                                        <div class="cart-btn action-btn">
                                            <div class="action-cart-btn-wrapper d-flex">
                                                <div class="add-to_cart">
                                                    <a class="btn btn-primary btn-hover-dark rounded-0" href="./viewcart.php" style="width: 110%">Thêm Vào Giỏ</a>
                                                </div>
                                                <a href="#" title="Wishlist" class="action"><i class="fa-regular fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Cart Button End -->
                                        <?php if ($quantity == 0) {
                                            echo "<div class='ribbon bg-danger' style='top: -20px'>Đã Bán Hết</div>";
                                            echo "<script>
                                        $('.ribbon').parents('.product-inner').css('opacity', '0.5');
                                        $('.ribbon').parents('.product-inner').find('.action-wrapper').remove();
                                        $('.ribbon').parents('.product-inner').find('a.image').removeAttr('href');
                                        </script>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- Shop Wrapper End -->

                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper justify-content-center m-t-50">
                    <!-- Shopt Top Bar Right Start -->
                    <div class="shop-top-bar-right">
                        <nav>
                            <ul class="pagination">
                                <?php
                                $numPage = ceil($total / 8);
                                if ($page > 1) {
                                ?>
                                    <li class="page-item">
                                        <a class="page-link rounded-0 cursor-pointer" name="page=<?php echo $page ?>" aria-label="Prev">
                                            <span aria-hidden="true">
                                                <i class="fa-solid fa-arrow-left" style="padding-top: 5px"></i>
                                            </span>
                                        </a>
                                    </li>
                                <?php
                                }
                                for ($i = 1; $i <= $numPage; $i++) {
                                    if ($page == $i) {
                                        echo "<li class='page-item'><a class='page-link active'>$i</a></li>";
                                        continue;
                                    }
                                    echo "<li class='page-item'><a class='page-link cursor-pointer' id='page-choose' name='page=$i' >$i</a></li>'";
                                }
                                if ($page < $numPage) {
                                ?>
                                    <li class="page-item">
                                        <a class="page-link rounded-0 cursor-pointer" name="page=<?php echo $page ?>" aria-label="Next">
                                            <span aria-hidden="true">
                                                <i class="fa-solid fa-arrow-right" style="padding-top: 5px"></i>
                                            </span>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- Shopt Top Bar Right End -->
                </div>
                <!--shop toolbar end-->

            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->