<?php 
    include "./config/connect.php";
    mysqli_close($conn);
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        $_SESSION['logout'] = "<div class='alert-success text-center'>Đăng xuất thành công</div>";  
        header("Location: ../index.php");
        exit();
    }else{
        echo "Lỗi đăng xuất";
    }
?>