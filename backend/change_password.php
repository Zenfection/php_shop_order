<?php
include "../config/connect.php";
if(isset($_POST['submit'])){
    $user = $_SESSION['user'];
    $current_pwd = mysqli_real_escape_string($conn, md5($_POST['current-pwd']));
    $new_pwd = mysqli_real_escape_string($conn, md5($_POST['new-pwd']));
    $confirm_pwd = mysqli_real_escape_string($conn, md5($_POST['confirm-pwd']));
    if($new_pwd != $confirm_pwd){
        $_SESSION['change_pwd'] = "<div class='modal-content'>Xác nhận sai mật khẩu</div>";
        echo "<script>window.location.href='/index.php#account';</script>";
    }else {
        $sql = "UPDATE `tb_user`
                SET password = '$new_pwd'
                WHERE username = '$user'";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION['change_pwd'] = "<div class='modal-content text-center'>Đổi mật khẩu thành công</div>";
            echo "<script>window.location.href='/index.php#account';</script>";
        }else{
            $_SESSION['change_pwd'] = "<div class='modal-content text-center'>Đổi mật khẩu thất bại</div>";
            echo "<script>window.location.href='/index.php#account';</script>";
        }
    }
}
?>