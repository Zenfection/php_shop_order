<?php 
    include "../../config/connect.php";
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = (float)$_POST['price'];
    $quantity = (int)$_POST['quantity'];
    $discount = (int)$_POST['discount'];
    $type = $_POST['type'];
    $ranking = (int)$_POST['ranking'];
    $image = $_FILES['fileUpload']['name'];
    $tempImage = $_FILES['fileUpload']['tmp_name'];
    //* quy tắc đặt đường dẫn của ảnh: PATH . $type . $image
    //!check session admin sau này, giờ chưa có

    //* Lấy id_product mới nhất
    $sql = "INSERT INTO `tb_product` (name, description, price, image, discount, ranking, quantity, id_category) 
    VALUES ('$title', '$description', $price, '$image',$discount, $ranking, $quantity, '$type')";
    $result = mysqli_query($conn, $sql);
    move_uploaded_file($tempImage, '../../assets/images/products/' . $image);
    echo "<script>alert('Thêm sản phẩm thành công');</script>";
    echo "<script>window.location.href='/admin/index.php#product';</script>";
?>