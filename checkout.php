<?php include "./frontend/header.php" ?>

<!-- Checkout Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row m-b-n20">
            <div class="col-lg-6 col-12 m-b-20">

                <!-- Checkbox Form Start -->
                <div class="checkbox-form">
                    <!-- Checkbox Form Title Start -->
                    <h3 class="title">Hoá Đơn Chi Tiết</h3>
                    <!-- Checkbox Form Title End -->
                    <form action="#" method="POST">
                        <div class="row">
                            <?php
                            $user = $_SESSION['user'];
                            $sql = "SELECT * FROM `tb_customer` WHERE username = '$user'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $fullname = $row['fullname'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $address = $row['address'];

                            ?>
                            <!-- First Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="full-name">Họ và tên <span class="required">*</span></label>
                                    <input name="full-name" placeholder="Nhập họ và tên" type="text" value="<?php echo $fullname ?>">
                                </div>
                            </div>
                            <!-- First Name Input End -->

                            <!-- Last Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="phone">Điện Thoại <span class="required">*</span></label>
                                    <input name="phone" placeholder="Nhập số điện thoại" type="text" value="<?php echo $phone ?>">
                                </div>
                            </div>
                            <!-- Last Name Input End -->

                            <!-- Address Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="address">Địa chỉ <span class="required">*</span></label>
                                    <input name="address" placeholder="Nhập địa chỉ giao hàng" type="text" value="<?php echo $address ?>">
                                </div>
                            </div>
                            <!-- Address Input End -->

                            <!-- State or Country Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="province">Tỉnh <span class="required">*</span></label>
                                    <input placeholder="Nhập tỉnh thành" type="text" name="province">
                                </div>
                            </div>
                            <!-- State or Country Input End -->

                            <!-- Town or City Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="city">Thành Phố <span class="required">*</span></label>
                                    <input name="city" type="text" placeholder="Nhập thành phố">
                                </div>
                            </div>
                            <!-- Town or City Name Input End -->

                            <!-- Email Address Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input name="email" placeholder="Nhập email nhận thông báo" type="email" value="<?php echo $email ?>">
                                </div>
                            </div>
                            <!-- Email Address Input End -->

                        </div>
                        <!-- Different Address End -->
                        <div class="order-button-payment">
                            <button class="btn btn-primary btn-hover-dark rounded-0 w-100" type="submit" name="submit" id="clear-cart">Đặt Hàng</button>
                        </div>
                </div>
                </form>
                <!-- Checkbox Form End -->
            </div>

            <div class="col-lg-6 col-12 m-b-20">

                <!-- Your Order Area Start -->
                <div class="your-order-area border">

                    <!-- Title Start -->
                    <h3 class="title">Đơn hàng của bạn</h3>
                    <!-- Title End -->

                    <!-- Your Order Table Start -->
                    <div class="your-order-table table-responsive">
                        <table class="table">

                            <!-- Table Head Start -->
                            <thead>
                                <tr class="cart-product-head">
                                    <th class="cart-product-name text-start">Sản phẩm</th>
                                    <th class="cart-product-total text-end">Tổng tiền</th>
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
                                for ($i = 0; $i < $count; $i++) {
                                    $row = mysqli_fetch_assoc($result);
                                    $name = $row['name'];
                                    $price = $row['price'];
                                    $quantity = $row['quantity'];
                                    if ($row['discount'] > 0) {
                                        $total = $price * $quantity * (1 - $row['discount'] / 100);
                                    } else {
                                        $total = $price * $quantity;
                                    }
                                    $totalMoney += $total;
                                ?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-start ps-0"> <?php echo $name ?>
                                            <strong class="product-quantity"> × <?php echo $quantity ?></strong>
                                        </td>
                                        <td class="cart-product-total text-end pe-0">
                                            <span class="amount"><?php echo $total ?>$</span>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <!-- Table Body End -->

                            <!-- Table Footer Start -->
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th class="text-start ps-0">Tổng đơn hàng</th>
                                    <td class="text-end pe-0"><strong><span class="amount"><?php echo $totalMoney ?>$</span></strong></td>
                                </tr>
                            </tfoot>
                            <!-- Table Footer End -->

                        </table>
                    </div>
                    <!-- Your Order Table End -->

                    <!-- Payment Accordion Order Button Start -->
                    <div class="payment-accordion-order-button">
                        <div class="payment-accordion">
                            <div class="single-payment">
                                <h5 class="panel-title m-b-15">
                                    <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Thanh toán
                                    </a>
                                </h5>
                                <div class="collapse show" id="collapseExample">
                                    <div class="card card-body rounded-0">
                                        <p>Chức năng thanh toán online hiện chưa phát triển, bạn chỉ có thể sử dụng thanh toán COD</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Payment Accordion Order Button End -->
                </div>
                <!-- Your Order Area End -->
            </div>
        </div>
    </div>
</div>
<?php include "./frontend/footer.php" ?>
<!-- Checkout Section End -->
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['full-name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $order_date = date('Y-m-d');
    $status = 'pending';
    // tạo chuỗi ID ngẫu nhiên
    $length = 10;
    $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    $id_order = strtoupper(substr(str_shuffle($str), 0, $length));
    // ----
    $sql = "INSERT INTO `tb_order`
            (`id_order`, `username`, `name_customer`, `phone_customer`, `address_customer`, `email_customer`, `city_customer`, `province_customer`, `status`, `order_date`) 
            VALUES 
            ('$id_order', '$user', '$fullname', '$phone', '$address', '$email', '$city', '$province', '$status', '$order_date')";
    $result = mysqli_query($conn, $sql);
    include "./backend/clear_cart.php";
    $_SESSION['order'] = "<div class='alert-success text-center'>Đặt hàng thành công, vui lòng kiểm tra tại <a href='./account.php'></a></div>";
    echo "<script>window.location.href='/index.php';</script>";
}
?>
