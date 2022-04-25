<?php include "./frontend/header.php" ?>

<!-- Shopping Cart Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <div class="col-12">

                <!-- Cart Table Start -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">

                        <!-- Table Head Start -->
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Ảnh</th>
                                <th class="pro-title">Sản Phẩm</th>
                                <th class="pro-price">Giá Tiền</th>
                                <th class="pro-quantity">Số Lượng</th>
                                <th class="pro-subtotal">Tổng Tiền</th>
                                <th class="pro-remove">Xoá</th>
                            </tr>
                        </thead>
                        <!-- Table Head End -->

                        <!-- Table Body Start -->
                        <tbody>
                            <?php
                            $sql = "SELECT * 
                                            FROM `tb_cart` as c, `tb_product` as p
                                            WHERE username = '$user'
                                            AND c.id_product = p.id_product";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            $totalMoney = 0;
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_product'];
                                    $name = $row['name'];
                                    $quantity = $row['amount'];
                                    $image = $row['image'];
                                    $discount = $row['discount'];
                                    if ($discount > 0) {
                                        $price = $row['price'] - ($row['price'] * $discount / 100);
                                    } else {
                                        $price = $row['price'];
                                    }
                                    $totalMoney += $price * $quantity;
                            ?>
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <img class="fit-image rounded" src="assets/images/products/<?php echo $image ?>" alt="Product" />
                                        </td>
                                        <td class="pro-title">
                                            <a href="/detail_product.php?id=<?php echo $id ?>"><?php echo $name ?></a>
                                        </td>
                                        <td class="pro-price"><span><?php echo $price ?>$</span></td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="<?php echo $quantity?>" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal">
                                            <span><?php echo $price * $quantity?>$</span>
                                        </td>
                                        <td class="pro-remove">
                                            <a href="#">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                        <!-- Table Body End -->

                    </table>
                </div>
                <!-- Cart Table End -->

                <!-- Cart Button Start -->
                <div class="cart-button-section m-b-n20">

                    <!-- Cart Button left Side Start -->
                    <div class="cart-btn-lef-side m-b-20">
                        <a href="/index.php" class="btn btn btn-gray-deep btn-hover-primary">Tiếp tục mua</a>
                        <a href="#" class="btn btn btn-gray-deep btn-hover-primary">Cập Nhật Trạng Thái</a>
                    </div>
                    <!-- Cart Button left Side End -->

                    <!-- Cart Button Right Side Start -->
                    <div class="cart-btn-right-right m-b-20">
                        <a href="#" class="btn btn btn-gray-deep btn-hover-primary">Xoá Hết Giỏ Hàng</a>
                    </div>
                    <!-- Cart Button Right Side End -->

                </div>
                <!-- Cart Button End -->

            </div>
        </div>

        <div class="row m-t-50">
            <div class="col-lg-6 me-0 ms-auto">

                <!-- Cart Calculation Area Start -->
                <div class="cart-calculator-wrapper">

                    <!-- Cart Calculate Items Start -->
                    <div class="cart-calculate-items">

                        <!-- Cart Calculate Items Title Start -->
                        <h3 class="title">Tổng Giỏ Hàng</h3>
                        <!-- Cart Calculate Items Title End -->

                        <!-- Responsive Table Start -->
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Tổng Tiền</td>
                                    <td><?php echo $totalMoney?>$</td>
                                </tr>
                                <tr>
                                    <td>Phí Ship</td>
                                    <td>0$</td>
                                </tr>
                                <tr class="total">
                                    <td>Tổng</td>
                                    <td class="total-amount"><?php echo $totalMoney?>$</td>
                                </tr>
                            </table>
                        </div>
                        <!-- Responsive Table End -->

                    </div>
                    <!-- Cart Calculate Items End -->

                    <!-- Cart Checktout Button Start -->
                    <a href="/checkout.php" class="btn btn btn-gray-deep btn-hover-primary m-t-30">Tiến Hành Thanh Toán</a>
                    <!-- Cart Checktout Button End -->

                </div>
                <!-- Cart Calculation Area End -->

            </div>
        </div>

    </div>
</div>
<!-- Shopping Cart Section End -->

<?php include "./frontend/footer.php" ?>