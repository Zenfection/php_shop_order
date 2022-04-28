<!-- Login Section Start -->
<div class="section section-margin login">
    <?php
    session_start();
    if(isset($_SESSION['user'])){
        echo "<script>window.location.href='/index.php'</script>";
    }
    if (isset($_SESSION['no-login-message'])) {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    if (isset($_SESSION['register'])){
        echo $_SESSION['register'];
        unset($_SESSION['register']);
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 m-auto">
                <div class="login-wrapper">

                    <!-- Login Title & Content -->
                    <div class="section-content text-center m-b-30">
                        <h2 class="title m-b-10">Đăng nhập</h2>
                    </div>

                    <!-- Form Action  -->
                    <form action="./backend/login.php" method="POST">
                        <!-- Input Email  -->
                        <div class="single-input-item m-b-10">
                            <input type="text" placeholder="Email / Username" name="user" id="user">
                        </div>

                        <!-- Input Passwordv  -->
                        <div class="single-input-item m-b-10">
                            <input type="password" placeholder="Nhập mật khẩu" name="pass" id="pass">
                        </div>
                        <!-- Input Password End -->

                        <!-- Button/Forget Password Start -->
                        <div class="single-input-item m-b-15">
                            <div class="login-reg-form-meta m-b-n15">
                                <button class="btn btn btn-gray-deep btn-hover-primary m-b-15 " type="submit" name="submit">Sign In</button>
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
<!-- Login Section End -->