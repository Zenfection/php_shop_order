<?php 
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login'] = "<div class='alert-success'>Bạn hãy đăng nhập</div>";
        header("location: /login.php");
    }
?>