<?php include "./frontend/header.php" ?>
    

    <!-- Register Section Start -->
    <?php
        if(isset($_SESSION['register'])){
            echo $_SESSION['register'];
            unset($_SESSION['register']);
        }
    ?>
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
                                <input type="text" placeholder="Họ và Tên" name="fullname">
                            </div>
                            
                            <div class="single-input-item m-b-10">
                                <input type="email" placeholder="Email" name="email">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="text" placeholder="Username" name="username">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="password" placeholder="Mật Khẩu" name="password">
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
        $password = mysqli_real_escape_string($conn, md5($_POST['password'])); //mã hoá chuẩn md5
        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_customer` WHERE username = '$username'"));  
        if($count > 0){
            $_SESSION['register'] = "<div class='alert-warning text-center'>Tài khoản đã tồn tại</div>";
            echo "<script>window.location.href='/register.php';</script>";
        } else{
            $sql = "INSERT INTO `tb_customer` (username, fullname, email, password) 
                    VALUES ('$username', '$fullname', '$email', '$password')";
            $query = mysqli_query($conn, $sql);
    
            if($query){
                $_SESSION['register'] = "<div class='alert-success text-center'>Đăng ký thành công, vui lòng đăng nhập</div>";
                echo "<script>window.location.href='/login.php';</script>";
            }
            else{
                $_SESSION['register'] = "<div class='alert-warning text-center'>Đăng ký thất bại</div>";
                echo "<script>window.location.href='/register.php';</script>";
            }
        }

    }
?>