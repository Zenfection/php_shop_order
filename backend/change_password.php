<?php
include "./config/connect.php";
if(isset($_POST['submit'])){
    $user = $_SESSION['user'];
    $current_pwd = mysqli_real_escape_string($conn, md5($_POST['current_pwd']));
    $new_pwd = mysqli_real_escape_string($conn, md5($_POST['new_pwd']));
    $comfirm_pwd = mysqli_real_escape_string($conn, md5($_POST['comfirm_pwd']));

    if($new_pwd != $comfirm_pwd){
        echo json_encode('wrong_comfirm');
        exit();
    } 
    $checkPass = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE username = '$user' AND password = '$current_pwd'");
    $checkPass = mysqli_num_rows($checkPass);
    if($checkPass == 0){
        echo json_encode('wrong_pwd');
        exit();
    } else {
        $sql = "UPDATE `tb_user`
                SET password = '$new_pwd'
                WHERE username = '$user'";
        $result = mysqli_query($conn, $sql);
        $result == 0 ? $valid = false : $valid = true;
        mysqli_close($conn);
        echo json_encode($valid);
        exit();
    }
}
