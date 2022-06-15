<?php include "./config/connect.php";
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
?>

<!-- Shop Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12" id="shop-content" data-aos="fade-in" data-aos-duration="500">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper flex-column flex-md-row p-2 m-b-40 border">
                    <!-- Shop Top Bar Left start -->
                    <div class="shop-top-bar-left">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i class="fa-duotone fa-grid-dividers"></i></button>
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
                            } else $sql = "SELECT * FROM `tb_product`";
                            $result = mysqli_query($conn, $sql);
                            $total = $result->num_rows;
                            echo "<span>Tổng cộng có $total sản phẩm</span>";
                            ?>
                        </div>
                    </div>
                    <!-- Shopt Top Bar Right Start -->
                    <div class="shop-top-bar-right">
                        <h4 class="title m-r-10">Sắp Xếp: </h4>
                        <div class="shop-short-by">
                            <select class="nice-select" aria-label=".form-select-sm example">
                                <option selected value="default">Mặc Định</option>
                                <option value="selling">Bán chạy</option>
                                <option value="price_asc">Giá tăng dần</option>
                                <option value="price_desc">Giá giảm dần</option>
                                <option value="best_discount">Giảm giá nhiều</option>
                            </select>
                        </div>
                    </div>
                    <!-- Shopt Top Bar Right End -->
                    <!-- Shop Top Bar Left end -->
                </div>
                <!--shop toolbar end-->

                <!-- Shop Wrapper Start -->
                <div id="product-content">
                    <div class="row shop_wrapper grid_3">
                        <?php
                        require "./class/paginator.php";
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
                                <div class="col-lg-4 col-md-4 col-sm-6 product product-inner" id="product<?php echo $id ?>">
                                        <div class="thumb">
                                            <a class="load-product cursor-pointer image" id_product="<?php echo $id?>">
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
                                                <a class="nav-content cursor-pointer action cart" title="Cart" id="viewcart"><i class="fa-regular fa-cart-circle-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a class="load-product cursor-pointer product-title" id_product="<?php echo $id?>"><?php echo $name ?></a></h5>
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
                                                    <span class="new"><i class="fa-duotone fa-dollar-sign"></i><?php echo $discount_price ?></span>
                                                    <span class="old"><i class="fa-duotone fa-dollar-sign"></i><?php echo $price ?></span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class='new'><i class="fa-duotone fa-dollar-sign"></i><?php echo $price ?></span>
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
                </div>
                <!--shop toolbar end-->
            </div>
            <div class="col-lg-3 col-12">
                <!-- Sidebar Widget Start -->
                <aside class="sidebar_widget m-t-50 mt-lg-0">
                    <div class="widget_inner">
                        <div class="widget-list m-b-50">
                            <div class="search-box">
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Nhập tên sản phẩm" id="searchFilterProduct" style="font-size: 14px;">
                                <button class="search-icon" type="button">
                                    <i class="fa-duotone fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                        <div class="widget-list m-b-50">
                            <h3 class="widget-title m-b-30">Danh Mục</h3>
                            <div class="sidebar-body justify-content-start">
                                <ul class="sidebar-list">
                                    <li><a class="nav-content cursor-pointer" id="shop">
                                            <i class="fa-duotone fa-border-all fa-xl"></i> Tất cả sản phẩm</a>
                                    </li>
                                    <li><a class="cursor-pointer category-filter" id="cake">
                                            <?php
                                            $sql = "SELECT * FROM `tb_category` as c, `tb_product` as p
                                                        WHERE c.id_category = p.id_category 
                                                        AND c.id_category = 'cake'";
                                            $countCake = $conn->query($sql)->num_rows;
                                            ?>
                                            <i class="fa-duotone fa-cake-slice fa-xl"></i> Bánh (<?php echo $countCake ?>)</a>
                                    </li>
                                    <li><a class="cursor-pointer category-filter" id="candy">
                                            <?php
                                            $sql = "SELECT * FROM `tb_category` as c, `tb_product` as p
                                                        WHERE c.id_category = p.id_category 
                                                        AND c.id_category = 'candy'";
                                            $countCandy = $conn->query($sql)->num_rows;
                                            ?>
                                            <i class="fa-duotone fa-lollipop fa-xl"></i> Kẹo (<?php echo $countCandy ?>)</a>
                                    </li>
                                    <li><a class="cursor-pointer category-filter" id="fastfood">
                                            <?php
                                            $sql = "SELECT * FROM `tb_category` as c, `tb_product` as p
                                                        WHERE c.id_category = p.id_category 
                                                        AND c.id_category = 'fastfood'";
                                            $countFastFood = $conn->query($sql)->num_rows;
                                            ?>
                                            <i class="fa-duotone fa-burger-fries fa-xl"></i> Đồ chiên (<?php echo $countFastFood ?>)</a>
                                    </li>
                                    <li><a class="cursor-pointer category-filter" id="fruit">
                                            <?php
                                            $sql = "SELECT * FROM `tb_category` as c, `tb_product` as p
                                                        WHERE c.id_category = p.id_category 
                                                        AND c.id_category = 'fruit'";
                                            $countFruit = $conn->query($sql)->num_rows;
                                            ?>
                                            <i class="fa-duotone fa-cherries fa-xl"></i> Trái cây (<?php echo $countFruit ?>)</a>
                                    </li>
                                    <li><a class="cursor-pointer category-filter" id="icecream">
                                            <?php
                                            $sql = "SELECT * FROM `tb_category` as c, `tb_product` as p
                                                        WHERE c.id_category = p.id_category 
                                                        AND c.id_category = 'icecream'";
                                            $countIceCream = $conn->query($sql)->num_rows;
                                            ?>
                                            <i class="fa-duotone fa-ice-cream fa-xl"></i> Kem (<?php echo $countIceCream ?>)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php 
                        if(!isset($_SESSION['user'])){
                            return;
                        }
                        ?>
                        <div class="widget-list">
                            <h3 class="widget-title m-b-30">Sản phẩm đã xem</h3>
                            <div class="sidebar-body product-list-wrapper m-b-n30">
                                <!-- Single Product List Start -->
                                <?php
                                $sql = "SELECT * 
                                FROM `tb_recent_product` as r, `tb_product` as p
                                WHERE r.id_product = p.id_product 
                                AND r.username = '$user' ORDER BY r.id_recent DESC LIMIT 5";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_product'];
                                    $name = $row['name'];
                                    $price = (float)$row['price'];
                                    $image = $row['image'];
                                    $discount = (int)$row['discount'];
                                    $new_price = $price - ($price * $discount) / 100;
                                    $id_category = $row['id_category'];
                                ?>
                                    <div class="single-product-list m-b-30">
                                        <!-- Product List Thumb Start -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a class="load-product cursor-pointer image" id_product="<?php echo $id?>">
                                                    <img class="fit-image first-image p-10" src="./assets/images/products/<?php echo $image?>" id="img-product<?php echo $id ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Product List Thumb End -->
                                        <!-- Product List Content Start -->
                                        <div class="product-list-content">
                                            <h6 class="product-name">
                                                <a class="load-product cursor-pointer" id_product="<?php echo $id?>"><?php echo $name?></a>
                                            </h6>
                                            <span class="price">
                                                <span class="new"><i class="fa-duotone fa-dollar-sign"></i><?php echo $new_price?></span>
                                                <span class="old"><i class="fa-duotone fa-dollar-sign"></i><?php echo $price ?></span>
                                            </span>
                                        </div>
                                        <!-- Product List Content End -->
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- Single Product List End -->
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->