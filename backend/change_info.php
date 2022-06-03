<?php
include "./config/connect.php";
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $user = $_SESSION['user'];
    $sql = "UPDATE `tb_user` 
            SET fullname = '$fullname', phone = '$phone', email = '$email' 
            WHERE username = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['change_info'] = "<div class='alert-success text-center'>Đổi thông tin thành công</div>";
    } else {
        $_SESSION['change_info'] = "<div class='alert-danger text-center'>Đổi thông tin thất bại</div>";
    }
    mysqli_close($conn);
    header("Location: ../index.php#account");
    exit();
}
?>