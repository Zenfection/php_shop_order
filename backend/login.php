<?php
    include "./config/connect.php";
    if (isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $password = mysqli_real_escape_string($conn, md5($_POST['pass']));
    
        $sql = "SELECT * FROM `tb_user` 
                    WHERE (username = '$user' AND password = '$password')
                    OR (email = '$user' AND password = '$password')";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $conn->close();
        if ($count == 1) {
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['login'] = "<script>Lobibox.notify('success', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'fa-duotone fa-user-check',
            continueDelayOnInactiveTab: false,
            position: 'bottom left',
            width: 300,
            msg: 'Đăng nhập thành công'
            });</script>";
            header("Location: ../");
            exit();
        } else {
            $_SESSION['no-login-message'] = "<script>Lobibox.notify('error', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'fa-duotone fa-user-xmark',
            continueDelayOnInactiveTab: false,
            position: 'bottom left',
            msg: 'Đăng nhập thất bại, vui lòng đăng nhập lại'
            });</script>";
            // xoá session user và id
            unset($_SESSION['user']);
            header("Location: ../login");
            exit();
        }
    }
?>