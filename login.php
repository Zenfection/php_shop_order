<?php 
    require "./config/connect.php";
    echo "<script>window.location.href='./index.php#login'</script>";
?>
<!-- Login Section Start -->
<div class="section section-margin login" data-aos="zoom-in">
    <?php
    if (isset($_SESSION['user'])) {
        echo "<script>window.location.href='./index.php'</script>";
    }
    if (isset($_SESSION['no-login-message'])) {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    if (isset($_SESSION['register'])) {
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
                    <form action="./backend/login.php" method="POST" id="loginForm" class="has-validation">
                        <!-- Input Email  -->
                        <div class="single-input-item m-b-10">
                            <label for="description" class="form-label">Tài Khoản</label>
                            <input type="text" class="form-control" placeholder="Email / Username" name="user" id="user" required>
                        </div>

                        <!-- Input Password  -->
                        <div class="single-input-item m-b-10">
                            <label for="description" class="form-label">Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="pass" id="pass" required>
                        </div>
                        <!-- Input Password End -->

                        <!-- Button/Forget Password Start -->
                        <div class="single-input-item m-b-15">
                            <div class="login-reg-form-meta m-b-n15">
                                <button class="btn btn btn-gray-deep btn-hover-primary m-b-15" type="submit" name="submit">Đăng Nhập</button>
                                <!-- <a href="#" class="forget-pwd m-b-15">Quên mật khẩu?</a> -->

                            </div>
                        </div>
                        <!-- Button/Forget Password End -->

                        <!-- Lost Password & Creat New Account Start -->
                        
                        <div class="register cursor-pointer">
                            <a href="./index.php#register" id="register-account">Tạo tài khoản</a>
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

<script type="text/javascript">
    $(document).ready(() => {
        $('#loginForm').validate({
            rules: {
                user: {
                    required: true,
                    minlength: 3
                },
                pass: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                user: {
                    required: "Vui lòng nhập tên đăng nhập",
                    minlength: "Tên đăng nhập phải có ít nhất 3 ký tự"
                },
                pass: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 6 ký tự"
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