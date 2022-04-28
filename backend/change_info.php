<?php
include "../config/connect.php";
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sql = "UPDATE `tb_user` 
                SET fullname = '$fullname', phone = '$phone', email = '$email' 
                WHERE username = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Cập nhật thành công');</script>";
        echo "<script>window.location.href='/account.php';</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại');</script>";
    }
}
?>