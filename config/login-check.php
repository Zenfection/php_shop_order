<?php 
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "<div class='alert-warning text-center'>Bạn hãy đăng nhập</div>";
        header("location: /login.php");
    }
    else{
        header("location: /index.php");
    }
?>