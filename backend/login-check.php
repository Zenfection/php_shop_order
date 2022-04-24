<?php
    $user = $_GET['user'];
    if(is_null($user)){
        $_SESSION['no-login-message'] = "<div class='alert-warning text-center'>Bạn hãy đăng nhập</div>";
        echo "<script>window.location.href='/login.php'</script>";
    }
    else {
        echo "<script>window.location.href='/account.php'</script>";
    }
?>

