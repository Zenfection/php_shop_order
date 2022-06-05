<?php
include "./config/connect.php";
if(isset($_POST['submit'])){
    $user = $_SESSION['user'];
    $current_pwd = mysqli_real_escape_string($conn, md5($_POST['current-pwd']));
    $new_pwd = mysqli_real_escape_string($conn, md5($_POST['new-pwd']));
    $sql = "UPDATE `tb_user`
            SET password = '$new_pwd'
            WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['change_pwd'] = "<div class='alert-success text-center'>Đổi mật khẩu thành công</div>";
    }else{
        $_SESSION['change_pwd'] = "<div class='alert-danger text-center'>Đổi mật khẩu thất bại</div>";
    }
    mysqli_close($conn);
    header("Location: ../account");
    exit();
}
