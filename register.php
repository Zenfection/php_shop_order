    

    <!-- Register Section Start -->
    <?php
        if(isset($_SESSION['user'])){
            echo "<script>window.location.href='/index.php'</script>";
        }
        if(isset($_SESSION['register'])){
            echo $_SESSION['register'];
            unset($_SESSION['register']);
        }
    ?>
    <form method="POST" action="./backend/register.php">
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
