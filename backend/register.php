<?php
include "./config/connect.php";
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); //mã hoá chuẩn md5

    // username, fullname, email, password
    $query = mysqli_query($conn, "CALL ADD_USER('$username', '$fullname', '$email', '$password')");
    $conn->close();
    if ($query) {
        $valid = true;
    } else {
        $valid = false;
    }
    echo json_encode($valid);
    exit();
}
