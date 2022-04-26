<?php
    include '../config/connect.php';
    session_start();
    $user = $_SESSION['user'];
    $sql = "DELETE FROM `tb_cart` WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
?>