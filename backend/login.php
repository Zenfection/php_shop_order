<?php
    include "./config/connect.php";
    if (isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $password = mysqli_real_escape_string($conn, md5($_POST['pass']));
    
        $sql = "SELECT * FROM `tb_user` 
                WHERE (username = '$user' AND password = '$password')
                OR (email = '$user' AND password = '$password')";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $conn->close();
        if ($count == 1) {
            $_SESSION['user'] = $_POST['user'];
            $valid = true;
        } else {
            // xoá session user và id
            unset($_SESSION['user']);
            $valid = false;
        }
    }
    echo json_encode($valid);
    exit();
?>