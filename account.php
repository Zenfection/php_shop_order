<?php include "./frontend/header.php" ?>
<?php
if (!isset($_SESSION['user'])) {
    echo "<script>window.location.href='/login.php'</script>";
}
?>
<!-- My Account Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn Hàng</a>
                                <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Thanh Toán</a>
                                <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Chi Tiết</a>
                                <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-key"></i> Mật Khẩu</a>
                                <a href="./backend/logout.php"><i class="fa fa-sign-out"></i> Đăng Xuất</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Dashboard</h3>
                                        <div class="welcome">
                                            <?php
                                            $sql = "SELECT * FROM `tb_customer`
                                                    WHERE username =  '" . $_SESSION['user'] . "'";
                                            $result = $conn->query($sql);
                                            $row = $result->fetch_assoc();
                                            $fullname = $row['fullname'];
                                            $email = $row['email'];
                                            $phone = $row['phone'];
                                            echo "<p>Xin chào <strong>$fullname</strong></p>";
                                            ?>
                                        </div>

                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Pending</td>
                                                        <td>$3000</td>
                                                        <td><a href="/viewcart.php" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>July 22, 2018</td>
                                                        <td>Approved</td>
                                                        <td>$200</td>
                                                        <td><a href="/viewcart.php" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>June 12, 2019</td>
                                                        <td>On Hold</td>
                                                        <td>$990</td>
                                                        <td><a href="/viewcart.php" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Phương thức thanh toán</h3>
                                        <p class="saved-message">Hiện chưa phát triển tính năng này !!!</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title"><i class="fa fa-user-circle" aria-hidden="true"></i> Chi Tiết Tài Khoản</h3>
                                        <div class="account-details-form">
                                            <form action="#" method="POST">
                                                <div class="single-input-item m-b-15">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item m-b-15">
                                                                <label for="full-name" class="required m-b-10">Họ và Tên</label>
                                                                <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" value="<?php echo $fullname ?>" />

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item m-b-15">
                                                                <label for="last-name" class="required m-b-10">Số điện thoại</label>
                                                                <input type="text" id="phone" name="phone" placeholder="Chưa có số điện thoại" value="<?php echo $phone ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item m-b-15">
                                                    <label for="display-name" class="required m-b-10">UserName</label>
                                                    <input readonly type='text' id='display-name' placeholder='<?php echo $user ?>' />
                                                </div>
                                                <div class="single-input-item m-b-15">
                                                    <label for="email" class="required m-b-5">Địa chỉ Email</label>
                                                    <input type="email" name="email" id="email" placeholder="Nhập Email" value="<?php echo $email ?>" />
                                                </div>
                                                <div class="single-input-item single-item-button m-t-30">
                                                    <button type="submit" name="submit" class="btn btn btn-primary btn-hover-dark rounded-0">Lưu Thay Đổi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title"><i class="fa fa-key" aria-hidden="true"></i> Thay đổi mật khẩu</h3>
                                        <div class="account-details-form">
                                            <form action="#">
                                                <fieldset>
                                                    <div class="single-input-item m-b-15">
                                                        <label for="current-pwd" class="required m-b-10">Mật Khẩu Hiện tại</label>
                                                        <input type="password" name="current-pwd" id="current-pwd" placeholder="Nhập Mật Khẩu" />
                                                    </div>
                                                    <div class="row m-b-n15">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item m-b-15">
                                                                <label for="new-pwd" class="required m-b-10">Mật khẩu mới</label>
                                                                <input type="password" id="new-pwd" name="new-pwd" placeholder="Nhập Mật Khẩu" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item m-b-15">
                                                                <label for="confirm-pwd" class="required m-b-10">Xác Nhận Mật Khẩu</label>
                                                                <input type="password" id="confirm-pwd" name="confirm-pwd" placeholder="Nhập Mật Khẩu" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="single-input-item single-item-button m-t-30">
                                                    <button type="submit" name="submit2" class="btn btn btn-primary btn-hover-dark rounded-0">Lưu Thay Đổi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->

                    </div>
                </div>
                <!-- My Account Page End -->

            </div>
        </div>

    </div>
</div>
<!-- My Account Section End -->

<?php include "./frontend/footer.php" ?>

<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sql = "UPDATE `tb_customer` 
                SET fullname = '$fullname', phone = '$phone', email = '$email' 
                WHERE username = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Cập nhật thành công');</script>";
        echo "<script>window.location.href='/account.php';</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại');</script>";
    }
}
if(isset($_POST['submit2'])){
    $current_pwd = mysqli_real_escape_string($conn, md5($_POST['current-pwd']));
    $new_pwd = mysqli_real_escape_string($conn, md5($_POST['new-pwd']));
    $confirm_pwd = mysqli_real_escape_string($conn, md5($_POST['confirm-pwd']));
    if($new_pwd != $confirm_pwd){
        $_SESSION['change_pwd'] = "<div class='modal-content'>Xác nhận sai mật khẩu</div>";
    }else {
        
    }
}
?>