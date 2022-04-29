<?php 
    include "../config/connect.php";
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = mysqli_real_escape_string($conn, md5($_POST['password'])); //mã hoá chuẩn md5
        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_user` WHERE username = '$username'"));  
        if($count > 0){
            $_SESSION['register'] = "<div class='alert-warning text-center'>Tài khoản đã tồn tại</div>";
            echo "<script>window.location.href='/register.php';</script>";
        } else{
            $sql = "INSERT INTO `tb_user` (username, fullname, email, password) 
                    VALUES ('$username', '$fullname', '$email', '$password')";
            $query = mysqli_query($conn, $sql);
    
            if($query){
                $_SESSION['register'] = "<div class='alert-success text-center'>Đăng ký thành công, vui lòng đăng nhập</div>";
                echo "<script>window.location.href='/index.php#login';</script>";
            }
            else{
                $_SESSION['register'] = "<div class='alert-warning text-center'>Đăng ký thất bại</div>";
                echo "<script>window.location.href='/index.php#register';</script>";
            }
        }

    }
?>