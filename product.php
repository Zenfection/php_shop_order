<div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40 product">
    <div class="product-inner" id="product<?php echo $id ?>">
        <div class="thumb">
            <a href="/detail_product.php?id=<?php echo $id ?>" class="image">
                <img class="fit-image p-10" id="img-product<?php echo $id ?>" src="assets/images/products/<?php echo $image ?>" alt="Product" />
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
                <a href="/index.php#shop" class="action" id="plus_product" title="Thêm sản phẩm"><i class="ti-plus"></i></a>
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
            <h5 class="title"><a class="product-title" href="/detail_product.php?id=<?php echo $id ?>"><?php echo $name ?></a></h5>
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
    </div>
</div>