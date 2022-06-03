<?php
include "./config/connect.php";
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); //mã hoá chuẩn md5

    // username, fullname, email, password
    $query = mysqli_query($conn, "CALL ADD_USER('$username', '$fullname', '$email', '$password')");
    if ($query) {
        $_SESSION['register'] = "<div class='alert-success text-center'>Đăng ký thành công, vui lòng đăng nhập</div>";
        header("Location: ../index.php#login");
        exit();
    } else {
        $_SESSION['register'] = "<div class='alert-warning text-center'>Đăng ký thất bại</div>";
        header("Location: ../index.php#register");
        exit();
    }
}
mysqli_close($conn);
