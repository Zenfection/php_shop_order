<?php
include "./config/connect.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE `tb_order` SET status = 'canceled' WHERE id_order = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $valid = true;
    } else {
        $valid = false;
    }
    echo json_encode($valid);
    mysqli_close($conn);
    exit();
}