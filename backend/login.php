<?php
    include "../config/connect.php";
    if (isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $password = mysqli_real_escape_string($conn, md5($_POST['pass']));
    
        $sql = "SELECT * FROM `tb_user` 
                    WHERE (username = '$user' AND password = '$password')
                    OR (email = '$user' AND password = '$password')";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row['username'];
            $_SESSION['login'] = "<div class='alert-success text-center'>Chào mừng đã đăng nhập</div>";
            echo "<script>window.location.href='/index.php'</script>";
        } else {
            $_SESSION['no-login-message'] = "<div class='alert-danger text-center'>Tài khoản hoặc mật khẩu không đúng</div>";
            // xoá session user và id
            unset($_SESSION['user']);
            echo "<script>window.location.href = '/login.php';</>";
        }
    }
?>