<?php
    include "./config/connect.php";
    $user = $_SESSION['user'];
    $sql = "DELETE FROM `tb_cart` WHERE username = '$user'";
    $conn->query($sql);
    $conn->close();
?>