

<?php
    if(isset($_GET['user'])){
        echo "<script>window.location.href='/dashboard/index.php'</script>";
    }
    else {
        echo $_SESSION['user'];
        $_SESSION['no-login-message'] = "<div class='alert-warning text-center'>Bạn hãy đăng nhập</div>";
        echo "<script>window.location.href='/login.php'</script>";
    }
?>

