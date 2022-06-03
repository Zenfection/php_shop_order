<?php 
include "./config/connect.php";
if($_GET['email']){
    $email = $_GET['email'];
    $sql = "SELECT * FROM `tb_user` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        $valid = true;
    } else{
        $valid = false;
    }
}
mysqli_close($conn);
echo json_encode($valid);
exit();
?>