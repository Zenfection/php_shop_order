<?php 
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }else{
        echo "Lỗi đăng xuất";
    }
?>