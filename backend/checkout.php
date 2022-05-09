<?php
include "../config/connect.php";
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $order_date = date('d/m/Y');
    $status = 'pending';
    $user = $_SESSION['user'];
    // tạo chuỗi ID ngẫu nhiên
    $length = 10;
    $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    $id_order = strtoupper(substr(str_shuffle($str), 0, $length));
    // ----
    $sql = "INSERT INTO `tb_order`
            (`id_order`, `username`, `name_customer`, `phone_customer`, `address_customer`, `email_customer`, `city_customer`, `province_customer`, `status`, `order_date`) 
            VALUES 
            ('$id_order', '$user', '$fullname', '$phone', '$address', '$email', '$city', '$province', '$status', '$order_date')";
    $result = mysqli_query($conn, $sql); 

    $sql2 = "SELECT * 
            FROM `tb_cart` as c, `tb_product` as p
            WHERE username = '$user'
            AND c.id_product = p.id_product";
    $result2 = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result2);
    $totalMoney = 0;
    for($i = 0; $i < $count; $i++){
        $row = mysqli_fetch_assoc($result2);
        $id_product = $row['id_product'];
        $price = (float)$row['price'];
        $amount = (int)$row['amount'];
        $discount_price = $price * (100 - (float)$row['discount']) / 100;
        $total = $discount_price * $amount;
        $totalMoney += $total;
        // thêm vào bảng order_details
        $conn->query("INSERT INTO `tb_order_details` 
                    (`id_order`, `id_product`, `amount`)
                    VALUES ('$id_order', '$id_product', $amount)");
    }
    $conn->query("UPDATE tb_order
                SET total_money = $totalMoney
                WHERE id_order = '$id_order'");
    if($result){
        $conn->query("DELETE FROM `tb_cart` WHERE username = '$user'");
        $_SESSION['order'] = "<div class='alert-success text-center'>Đặt hàng thành công, vui lòng kiểm tra tại dashboard</div>";
    }  
    echo "<script>window.location.href='/index.php';</script>";
}
?>