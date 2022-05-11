<?php
include "../config/connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE `tb_order` SET status = 'canceled' WHERE id_order = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['cancel_order'] = "<div class='alert-success text-center'>Đã huỷ thành công đơn ${id}</div>";
        echo "<script>window.location.href='/index.php#account'</script>";
    }
}