<?php
include "./config/connect.php";
if(isset($_POST['submit'])){
    $user = $_SESSION['user'];
    $current_pwd = mysqli_real_escape_string($conn, md5($_POST['current_pwd']));
    $new_pwd = mysqli_real_escape_string($conn, md5($_POST['new_pwd']));
    
    $sql = "UPDATE `tb_user`
            SET password = '$new_pwd'
            WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $valid = true;
    }else{
        $valid = false;
    }
    mysqli_close($conn);
    echo json_encode($valid);
    exit();
}
