<?php include "../config/connect.php";
$province_data = ["An Giang","Bà rịa – Vũng tàu","Bắc Giang","Bắc Kạn","Bạc Liêu","Bắc Ninh","Bến Tre","Bình Định","Bình Dương","Bình Phước","Bình Thuận","Cà Mau","Cần Thơ","Cao Bằng","Đà Nẵng","Đắk Lắk","Đắk Nông","Điện Biên","Đồng Nai","Đồng Tháp","Gia Lai","Hà Giang","Hà Nam","Hà Nội","Hà Tĩnh","Hải Dương","Hải Phòng","Hậu Giang","Hòa Bình","Hưng Yên","Khánh Hòa","Kiên Giang","Kon Tum","Lai Châu","Lâm Đồng","Lạng Sơn","Lào Cai","Long An","Nam Định","Nghệ An","Ninh Bình","Ninh Thuận","Phú Thọ","Phú Yên","Quảng Bình","Quảng Nam","Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh","Thái Bình","Thái Nguyên","Thanh Hóa","Thừa Thiên Huế","Tiền Giang","Thành phố Hồ Chí Minh","Trà Vinh","Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái"];
?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Chi Tiết Đơn <?php echo $_POST['id'] ?></h5>
                <hr />
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-4 d-flex">
                                <div class="card radius-10 w-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="font-weight-bold mb-0">Sản phẩm trong đơn hàng</h6>
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="best-selling-products p-3 mb-3">
                                        <?php
                                        $id_order = $_POST['id'];
                                        $sql = "SELECT * 
                                                FROM `tb_order_details` as od, `tb_product` as p
                                                WHERE od.id_product = p.id_product
                                                AND od.id_order = '$id_order'";
                                        $result = mysqli_query($conn, $sql);
                                        $countProduct = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id = $row['id_product'];
                                            $name = $row['name'];
                                            $price = (float)$row['price'];
                                            $image = $row['image'];
                                            $description = $row['description'];
                                            $amount = (int)$row['amount'];
                                            $discount = (int)$row['discount'];
                                            $discount_price = $price - ($price * $discount / 100);
                                            $ranking = (float)$row['ranking'];
                                            $total = $amount * $discount_price;
                                        ?>
                                            <div class="d-flex align-items-center">
                                                <div class="product-img">
                                                    <img src="/assets/images/products/<?php echo $image ?>" class="p-1" />
                                                </div>
                                                <div class="ps-3">
                                                    <h6 class="mb-0 font-weight-bold"><?php echo $name ?></h6>
                                                    <p class="mb-0 text-secondary"><?php echo $discount_price ?>$ / Mua <?php echo $amount ?> cái</p>
                                                </div>
                                                <p class="ms-auto mb-0 text-purple"><?php echo $total ?>$</p>
                                                <hr>
                                            </div>
                                            <hr />
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form action="backend/change_order_info.php?id=<?php echo $id_order?>" method="post" id="changeOrderForm" novalidate>
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">
                                        <?php
                                        $sql = "SELECT * FROM `tb_order` WHERE id_order = '$id_order'";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        $name = $row['name_customer'];
                                        $email = $row['email_customer'];
                                        $phone = $row['phone_customer'];
                                        $address = $row['address_customer'];
                                        $province = $row['province_customer'];
                                        $city = $row['city_customer'];
                                        $status = $row['status'];
                                        $totalMoney = $row['total_money'];
                                        $statusEng = ["pending", "shipping", "delivered", "canceled"];
                                        $statusVie = ["Đang xử lý", "Đang giao hàng", "Đã giao hàng", "Đã hủy"];
                                        ?>
                                        <div class="col-md-4">
                                            <label for="name_customer" class="form-label">Tên Khách Hàng</label>
                                            <input type="text" class="form-control" id="name_customer" name="name_customer" placeholder="Nhập tên khách hàng" value="<?php echo $name ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email_customer" class="form-label">Email Khách Hàng</label>
                                            <input type="text" class="form-control" id="email_customer" name="email_customer" placeholder="Nhập Email" value="<?php echo $email ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone_customer" class="form-label">SĐT Khách Hàng</label>
                                            <input type="text" class="form-control" id="phone_customer" name="phone_customer" placeholder="Nhập SĐT" value="<?php echo $phone ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="province" class="form-label">Tỉnh Thành</label>
                                            <select class="form-select" id="province" name="province">
                                            <?php 
                                            echo "<option value='".$province."'>".$province."</option>";
                                            for($i = 0; $i < count($province_data); $i++){
                                                echo "<option value='".$province_data[$i]."'>".$province_data[$i]."</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="city" class="form-label">Thành phố</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Nhập thành phố" value="<?php echo $city?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="address" class="form-label">Địa Chỉ Giao Hàng</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Nhập Địa Chỉ Giao Hàng" value="<?php echo $address?>">    
                                        </div>
                                        <div class="col-12">
                                            <label for="status" class="form-label">Cập Nhật Trạng Thái</label>
                                            <select class="form-select" id="status" name="status">
                                                <?php
                                                for ($i = 0; $i < count($statusEng); $i++) {
                                                    if ($status == $statusEng[$i]) {
                                                        echo "<option value='" . $statusEng[$i] . "' selected>" . $statusVie[$i] . "</option>";
                                                        continue;
                                                    }
                                                    echo "<option value='" . $statusEng[$i] . "'>" . $statusVie[$i] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <div class="card radius-10">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <p class="mb-0 text-secondary">Tổng Sản Phẩm</p>
                                                            <h4 class="my-1"><?php echo $countProduct?> món hàng</h4>
                                                        </div>
                                                        <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class="bx bxs-shopping-bag"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card radius-10">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <p class="mb-0 text-secondary">Tổng Tiền</p>
                                                            <h4 class="my-1"><?php echo $totalMoney?>$</h4>
                                                        </div>
                                                        <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="<?php echo $id_order?>" class="btn btn-primary" name="submit">Lưu Thay Đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<script>
    new PerfectScrollbar('.best-selling-products');
    $(document).ready(() => {
        $('#changeOrderForm').validate({
            rules: {
                name_customer: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                email_customer: {
                    required: true,
                    email: true,
                },
                phone_customer: {
                    required: true,
                    minlength: 10,
                    maxlength: 11
                },
                city: {
                    required: true,
                    minlength: 3,
                },
                address: {
                    required: true,
                    minlength: 10,
                },
            },
            messages: {
                name_customer: {
                    required: "Vui lòng nhập tên khách hàng",
                    minlength: "Tên khách hàng phải có ít nhất 3 ký tự",
                    maxlength: "Tên khách hàng phải có tối đa 50 ký tự"
                },
                email_customer: {
                    required: "Vui lòng nhập email khách hàng",
                    email: "Email không đúng định dạng"
                },
                phone_customer: {
                    required: "Vui lòng nhập số điện thoại khách hàng",
                    minlength: "Số điện thoại phải có ít nhất 10 số",
                    maxlength: "Số điện thoại phải có tối đa 11 số"
                },
                city: {
                    required: "Vui lòng nhập thành phố",
                    minlength: "Thành phố phải có ít nhất 3 ký tự",
                },
                address: {
                    required: "Vui lòng nhập địa chỉ giao hàng",
                    minlength: "Địa chỉ giao hàng phải có ít nhất 10 ký tự",
                }
            },
            errorElement: 'div',
            errorPlacement: (error, element) => {
                error.addClass('invalid-feedback');
                if (element.prop('type') === 'checkbox') {
                    error.insertAfter(element.siblings('label'));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: (element, errorClass, validClass) => {
                $(element).addClass('is-invalid').removeClass('is-valid').show();
            },
            unhighlight: (element, errorClass, validClass) => {
                $(element).addClass('is-valid').removeClass('is-invalid').show();
            }
        })
    });
</script>