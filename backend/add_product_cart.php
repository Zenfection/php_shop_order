<?php
include "./config/connect.php";
if (isset($_POST['id']) && isset($_POST['qty'])) {
        $user = $_SESSION['user'];
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_cart` WHERE username = '$user' AND id_product = '$id'"));
        if ($count == 0) {
                // chưa có thêm vào
                $sql = "INSERT INTO `tb_cart`
                        (`username`, `id_product`, `amount`)
                        VALUES
                        ('$user', $id, $qty)";
        } else {
                // chỉ tăng số lượng
                $sql = "UPDATE `tb_cart` 
                        SET amount = amount + 1
                        WHERE username = '$user' 
                        AND id_product = '$id'";
        }
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        exit();
}
