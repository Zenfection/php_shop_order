<?php include "./frontend/header.php" ?>

<?php
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
if (isset($_SESSION['no-login-message'])) {
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}
?>
<!-- Login Section Start -->
<div class="section section-margin login">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 m-auto">
                <div class="login-wrapper">

                    <!-- Login Title & Content -->
                    <div class="section-content text-center m-b-30">
                        <h2 class="title m-b-10">Đăng nhập</h2>
                    </div>

                    <!-- Form Action  -->
                    <form action="#" method="POST">
                        <!-- Input Email  -->
                        <div class="single-input-item m-b-10">
                            <input type="email" placeholder="Email / Username">
                        </div>

                        <!-- Input Passwordv  -->
                        <div class="single-input-item m-b-10">
                            <input type="password" placeholder="Nhập mật khẩu">
                        </div>
                        <!-- Input Password End -->

                        <!-- Button/Forget Password Start -->
                        <div class="single-input-item m-b-15">
                            <div class="login-reg-form-meta m-b-n15">

                                <button class="btn btn btn-gray-deep btn-hover-primary m-b-15" type="submit" name="submit">Sign In</button>
                                <!-- <a href="#" class="forget-pwd m-b-15">Quên mật khẩu?</a> -->

                            </div>
                        </div>
                        <!-- Button/Forget Password End -->

                        <!-- Lost Password & Creat New Account Start -->
                        <div class="lost-password">
                            <a href="/register.php">Tạo tài khoản</a>
                        </div>
                        <!-- Lost Password & Creat New Account End -->

                    </form>
                    <!-- Form Action End -->

                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM `tb_customer` 
                WHERE username = '$user' 
                OR email = '$user' 
                AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login'] = "Xin chào " . $row['name'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: index.php");
        }else{
            $_SESSION['no-login-message'] = "Tên đăng nhập hoặc mật khẩu không đúng";
            header("Location: login.php");
        }
    }
?>
<!-- Login Section End -->
<?php include "./frontend/footer.php" ?>