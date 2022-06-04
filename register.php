<!-- Register Section Start -->
<?php
include "./config/connect.php";
if (isset($_SESSION['register'])) {
    echo $_SESSION['register'];
    unset($_SESSION['register']);
}
?>
<form method="POST" action="./backend/register.php" id="registerForm" class="has-validation" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
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
                                <input type="text" placeholder="Họ và Tên" name="fullname" class="form-control">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="email" placeholder="Email" name="email" class="form-control">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="text" placeholder="Username" name="username" class="form-control">
                            </div>

                            <div class="single-input-item m-b-10">
                                <input type="password" placeholder="Mật Khẩu" name="password" class="form-control">
                            </div>

                            <!-- Button/Forget Password Start -->
                            <div class="single-input-item single-input-item m-b-15">
                                <div class="login-reg-form-meta m-b-n15">
                                    <button type="submit" name="submit" class="btn btn btn-gray-deep btn-hover-primary m-b-15">Đăng ký</button>
                                </div>
                            </div>
                            <!-- Button/Forget Password End -->
                                <div class="cursor-pointer">
                                    <a class="nav-content" id="login">Đăng Nhập</a>
                                </div>
                        </form>
                        <!-- Form Action End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Register Section End -->
<script type="text/javascript">
    $(document).ready(() => {
        $('#registerForm').validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 5,
                },
                email: {
                    required: true,
                    email: true,
                    remote: './backend/check_email.php'
                },
                username: {
                    required: true,
                    minlength: 5,
                    maxlength: 50,
                    remote: './backend/check_user.php'
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                }
            },
            messages: {
                fullname: {
                    required: "Vui lòng nhập họ và tên",
                    minlength: "Họ và tên phải có ít nhất 5 ký tự"
                },
                email: {
                    required: "Vui lòng nhập email",
                    email: "Email không đúng định dạng",
                    remote: jQuery.validator.format('{0} đã tồn tại')
                },
                username: {
                    required: "Vui lòng nhập username",
                    minlength: "Username phải có ít nhất 5 ký tự",
                    maxlength: "Username không được vượt quá 50 ký tự",
                    remote: jQuery.validator.format('{0} đã tồn tại')
                },
                password: {
                    required: "Vui lòng nhập password",
                    minlength: "Password phải có ít nhất 5 ký tự",
                    maxlength: "Password không được vượt quá 50 ký tự"
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