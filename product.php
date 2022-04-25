<!-- Product Start -->
<div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
    <div class="product">
        <!-- Thumb Start  -->
        <div class="thumb">
            <a href="/frontend/detail_product.php" class="image">
                <img class="fit-image rounded" src="assets/images/products/<?php echo $image ?>" alt="Product" width="270" height="270" />
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
                <a href="#/" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quickview"><i class="ti-plus"></i></a>
                
                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>
                <a href="/viewcart.php" class="action cart" title="Cart"><i class="ti-shopping-cart"></i></a>
            </div>
        </div>
        <!-- Thumb End  -->

        <!-- Content Start  -->
        <div class="content">
            <h5 class="title"><a href="single-product.html"><?php echo $name ?></a></h5>
            <span class="rating">
                <?php
                for ($i = 0; $i < 5; $i++) {
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

