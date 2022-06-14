<?php
include "./config/connect.php";
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $user = $_SESSION['user'];
    $sql = "UPDATE `tb_user` 
            SET fullname = '$fullname', phone = '$phone', email = '$email' 
            WHERE username = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $valid = true;
    } else {
        $valid = false;
    }
    mysqli_close($conn);
    echo json_encode($valid);
    exit();
}
?>