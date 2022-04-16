<?php include "./frontend/header.php" ?>

<!-- Login Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 m-auto">
                <div class="login-wrapper">

                    <!-- Login Title & Content Start -->
                    <div class="section-content text-center m-b-30">
                        <h2 class="title m-b-10">Đăng nhập</h2>
                    </div>
                    <!-- Login Title & Content End -->

                    <!-- Form Action Start -->
                    <form action="#" method="POST">

                        <!-- Input Email Start -->
                        <div class="single-input-item m-b-10">
                            <input type="email" placeholder="Email / Username">
                        </div>
                        <!-- Input Email End -->

                        <!-- Input Password Start -->
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

?>
<!-- Login Section End -->
<?php include "./frontend/footer.php" ?>