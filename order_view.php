<?php 
    include "./config/connect.php";
    $statusVie = ["Đang xử lý", "Đang giao hàng", "Đã giao hàng", "Đã hủy"];
    $id_order = $_GET['id'];
?>

<div id="content">
<!-- Shopping Cart Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row" data-aos="fade-down">
            <div class="col-12">

                <!-- Cart Table Start -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <h3 class="text-center">Chi tiết đơn hàng <?php echo $id_order ?></h3>
                        <!-- Table Head Start -->
                        <thead>
                            <tr>
                                <th scope="col" class="pro-thumbnail">Ảnh</th>
                                <th scope="col" class="pro-title">Sản Phẩm</th>
                                <th scope="col" class="pro-price">Giá</th>
                                <th scope="col" class="pro-subtotal">Tổng tiền</th>
                            </tr>
                        </thead>
                        <!-- Table Head End -->

                        <!-- Table Body Start -->
                        <tbody>
                            <?php
                            $user = $_SESSION['user'];
                            $sql = "SELECT * 
                                        FROM `tb_user` as u, `tb_order` as o, `tb_order_details` as od, `tb_product` as p
                                        WHERE u.username = o.username
                                        AND o.id_order = od.id_order
                                        AND od.id_product = p.id_product
                                        AND u.username = '$user'
                                        AND o.id_order = '$id_order'";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id_product = $row['id_product'];
                                    $name = $row['name'];
                                    $price = (float)$row['price'];
                                    $image = $row['image'];
                                    $amount = (int)$row['amount'];
                                    $total_price = $price * $amount;
                                    $total_money = (float)$row['total_money'];
                                    $order_date = $row['order_date'];
                                    $status = $row['status'];
                            ?>
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="#">
                                                <img class="fit-image rounded" src="./assets/images/products/<?php echo $image ?>" alt="Product<?php echo $id_product ?>" style="width:80%" />
                                            </a>
                                        </td>
                                        <td class="pro-title">
                                            <a href="#"><?php echo $name ?></a>
                                        </td>
                                        <td class="pro-price">
                                            <span><?php echo $price ?>$ x <?php echo $amount?></span>
                                        </td>
                                        <td class="pro-subtotal"><span><?php echo $total_price ?>$</span></td>
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

            </div>
        </div>

        <div class="row m-t-50" data-aos="fade-up">
            <div class="col-lg-6 me-0 ms-auto">

                <!-- Cart Calculation Area Start -->
                <div class="cart-calculator-wrapper">

                    <div class="cart-calculate-items">
                        <h3 class="title text-center">Thông tin đơn hàng</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td><?php echo $order_date ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td><?php 
                                        if($status == 'pending'){
                                            echo $statusVie[0];
                                        }
                                        else if($status == 'shipping'){
                                            echo $statusVie[1] . ' (không thể huỷ hàng)'; 
                                        }
                                        else if($status == 'delivered'){
                                            echo $statusVie[2] . ' (không thể huỷ hàng)';
                                        }
                                        else if($status == 'canceled'){
                                            echo $statusVie[3] . ' (không thể huỷ hàng)';
                                        }
                                    ?></td>
                                </tr>
                                <tr class="total">
                                    <td>Tổng tiền</td>
                                    <td class="total-amount"><?php echo $total_money ?>$</td>
                                </tr>
                            </table>
                        </div>
                        <!-- Responsive Table End -->

                    </div>
                    <?php if($status == 'pending'){
                        ?>
                        <a id="cancelOrder" class="btn btn btn-gray-deep btn-hover-primary m-t-30" id_order="<?php echo $id_order?>">Huỷ Hàng</a>
                        <?php
                    }
                    ?>
                </div>
                <!-- Cart Calculation Area End -->
            </div>
        </div>
    </div>
</div>
<!-- Shopping Cart Section End -->
</div>