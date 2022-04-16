<?php include "./frontend/header.php" ?>

    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Tạo tài khoản</h2>
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Tạo tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Register Section Start -->
    <form method="POST">
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 m-auto">
                    <div class="login-wrapper">

                        <!-- Register Title & Content Start -->
                        <div class="section-content text-center m-b-30">
                            <h2 class="title m-b-10">Tạo tài khoản</h2>
                        </div>
                        <!-- Register Title & Content End -->

                        <!-- Form Action Start -->
                        <form action="#" method="post" autocomplete="">

                            <div class="single-input-item m-b-10">
                                <input type="text" placeholder="FullName">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="text" placeholder="Username">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="email" placeholder="Email">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="password" placeholder="Password">
                            </div>

                            <!-- Button/Forget Password Start -->
                            <div class="single-input-item">
                                <div class="login-reg-form-meta m-b-n15">
                                    <button type="submit" name="submit" class="btn btn btn-gray-deep btn-hover-primary m-b-15">Đăng ký</button>
                                </div>
                            </div>
                            <!-- Button/Forget Password End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Register Section End -->

<?php include "./frontend/footer.php" ?>

<?php 
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); //mã hoá chuẩn md5

        $sql = "INSERT INTO `tb_customer` (fullname, username, email, password) 
                VALUES ('$fullname', '$username', '$email', '$password')";

        $query = mysqli_query($conn, $sql)
            or die("Không thể thêm dữ liệu vào bảng người dùng");

        if($query){
            echo "<script>alert('Đăng ký thành công');</script>";
            header('location: login.php');
        }
        else{
            echo "<script>alert('Đăng ký thất bại');</script>";
            header('location: register.php');
        }
    }
?>