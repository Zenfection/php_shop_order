<?php echo "<script>window.location.href='/admin/index.php#order'</script>" ?>
<?php include "../config/connect.php" ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <?php 
            if(isset($_SESSION['change_order_info'])){
                echo $_SESSION['change_order_info'];
                unset($_SESSION['change_order_info']);
            }
        ?>
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" id="searchOrder" class="form-control ps-5 radius-30" placeholder="Tìm đơn hàng" value="<?php echo $_POST['search']?>"> 
                        <span class="position-absolute top-50 product-show translate-middle-y">
                            <i class="bx bx-search"></i>
                        </span>
                    </div>
                </div>
                <div class="table-responsive"  data-aos="fade-zoom-in" data-aos-duration="1000">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã Đơn#</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Trạng Thái</th>
                                <th>Tổng Tiền</th>
                                <th>Ngày Đặt</th>
                                <th>Xem Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $phone = $_POST['search'];
                            if(isset($_POST['search'])){
                                $sql = "SELECT * FROM `tb_order` WHERE LOWER(phone_customer) LIKE CONCAT('%', LOWER(CONVERT('$phone', BINARY)), '%')";
                            } else {
                                $sql = "SELECT * FROM `tb_order` ORDER BY `tb_order`.`order_date` DESC";
                            }
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['id_order'];
                                $name = $row['name_customer'];
                                $phone = $row['phone_customer'];
                                $status = $row['status'];
                                // pending, shipping, delivered, canceled
                                $total = (float)$row['total_money'];
                                $date = $row['order_date'];
                                $statusVie = ["Đang xử lý", "Đang giao hàng", "Đã giao hàng", "Đã hủy"];
                            ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14"><?php echo $id?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $phone?></td>
                                    <td>
                                        <?php 
                                        if (($status == 'pending')){
                                            ?>
                                            <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                <i class="bx bxs-circle me-1"></i><?php echo $statusVie[0]?>
                                            </div>
                                            <?php
                                        }
                                        else if (($status == 'shipping')){
                                            ?>
                                            <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
                                                <i class="bx bxs-circle me-1"></i><?php echo $statusVie[1]?>
                                            </div>
                                            <?php
                                        }
                                        else if (($status == 'delivered')){
                                            ?>
                                            <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class="bx bxs-circle me-1"></i><?php echo $statusVie[2]?>
                                            </div>
                                            <?php
                                        }
                                        else if (($status == 'canceled')){
                                            ?>
                                            <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                <i class="bx bxs-circle me-1"></i><?php echo $statusVie[3]?>
                                            </div>
                                            <?php
                                        }
                                        ?>  
                                    </td>
                                    <td><?php echo $total?>$</td>
                                    <td><?php echo $date?></td>
                                    <td>
                                        <a class="viewOrderDetails" id="<?php echo $id?>">
                                            <button type="button" class="btn btn-primary btn-sm radius-30 px-4">Xem</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->