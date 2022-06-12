<?php 
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        $_SESSION['logout'] = "<script>Lobibox.notify('success', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'fa-duotone fa-right-from-bracket',
            continueDelayOnInactiveTab: false,
            position: 'right',
            width: 300,
            msg: 'Đăng Xuất Thành Công'
            });</script>";  
        header("Location: ../");
        exit();
    }else{
        echo "Lỗi đăng xuất";
    }
?>