<?php include "./config/connect.php" ?>

<!-- Shop Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper flex-column flex-md-row p-2 m-b-40 border">

                    <!-- Shop Top Bar Left start -->
                    <div class="shop-top-bar-left">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i class="ti-layout-grid4-alt"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="ti-align-justify"></i></button>
                        </div>
                        <div class="shop-top-show">
                            <?php
                            $sql = "SELECT * FROM `tb_product`";
                            $result = $conn->query($sql);
                            $total = $result->num_rows;
                            echo "<span>Tổng cộng có $total sản phẩm</span>";
                            ?>
                        </div>

                    </div>
                    <!-- Shop Top Bar Left end -->

                    <!-- Shopt Top Bar Right Start -->
                    <div class="shop-top-bar-right">

                        <h4 class="title m-r-10">Short By: </h4>

                        <div class="shop-short-by">
                            <select class="nice-select" aria-label=".form-select-sm example">
                                <option selected>Short by Default</option>
                                <option value="1">Short by Popularity</option>
                                <option value="2">Short by Rated</option>
                                <option value="3">Short by Latest</option>
                                <option value="3">Short by Price</option>
                                <option value="3">Short by Price</option>
                            </select>
                        </div>
                    </div>
                    <!-- Shopt Top Bar Right End -->

                </div>
                <!--shop toolbar end-->

                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_4">
                    <?php
                    require_once "./class/paginator.php";
                    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 8;
                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                    $links = (isset($_GET['links'])) ? $_GET['links'] : 7;
                    $sql = "SELECT * FROM `tb_product`";
                    $paginator = new Paginator($conn, $sql);
                    $results = $paginator->getData($limit, $page);

                    if ($limit > 0) {
                        for ($i = 0; $i < $limit; $i++) {
                            $id = $results->data[$i]['id_product'];
                            $name = $results->data[$i]['name'];
                            $description = $results->data[$i]['description'];
                            $price = $results->data[$i]['price'];
                            $image = $results->data[$i]['image'];
                            $discount = $results->data[$i]['discount'];
                            $ranking = $results->data[$i]['ranking'];
                            $quantity = $results->data[$i]['quantity'];
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                                <div class="product-inner">
                                    <div class="thumb">
                                        <a href="/detail_product.php?id=<?php echo $id ?>" class="image">
                                            <img class="fit-image" src="assets/images/products/<?php echo $image ?>" alt="Product" width="270" height="270" />
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
                                        <div class="action-wrapper">
                                            <a href="#/" class="action quickview" id="quickview<?php echo $id?>" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quickview"><i class="ti-plus"></i></a>
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>
                                            <a href="/index.php#viewcart" class="action cart" title="Cart" onclick="$.ajax({
                                                type: 'post',
                                                url: '/viewcart.php',
                                                success: function(data){
                                                    $('#content').html(data);
                                                }
                                            });"><i class="ti-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="/detail_product.php?id=<?php echo $id ?>"><?php echo $name ?></a></h5>
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
                                        <?php
                                        echo "<p>$description</p>"
                                        ?>
                                        <!-- Cart Button Start -->
                                        <div class="cart-btn action-btn">
                                            <div class="action-cart-btn-wrapper d-flex">
                                                <div class="add-to_cart">
                                                    <a class="btn btn-primary btn-hover-dark rounded-0" href="/viewcart.php">Add to cart</a>
                                                </div>
                                                <a href="wishlist.html" title="Wishlist" class="action"><i class="ti-heart"></i></a>
                                                <a href="#/" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quickview"><i class="ti-plus"></i></a>
                                            </div>
                                        </div>
                                        <!-- Cart Button End -->
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
                                        <a class="page-link rounded-0" href="#shop" name="page=<?php echo $page?>" aria-label="Prev">
                                            <span aria-hidden="true">
                                                <i class="fa fa-arrow-left"></i>
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
                                    echo "<li class='page-item'><a class='page-link' id='page-choose' href='#shop' name='page=$i' >$i</a></li>'";
                                }
                                if ($page < $numPage) {
                                ?>
                                    <li class="page-item">
                                        <a class="page-link rounded-0" href="#shop" name="page=<?php echo $page?>" aria-label="Next">
                                            <span aria-hidden="true">
                                                <i class="fa fa-arrow-right"></i>
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