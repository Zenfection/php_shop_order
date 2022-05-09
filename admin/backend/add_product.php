<?php 
    include "../../config/connect.php";
    if (isset($_POST['submit'])) {
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
    $_SESSION['addProduct'] = "<div class='alert border-0 border-start border-5 border-success alert-dismissible fade show py-2'>
    <div class='d-flex align-items-center'>
        <div class='font-35 text-success'><i class='bx bxs-check-circle'></i>
        </div>
        <div class='ms-3'>
            <h6 class='mb-0 text-success'>Thêm sản phẩm thành công</h6>
            <div>Bạn đã thêm ${title}</div>
        </div>
    </div>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    echo "<script>window.location.href = '/admin/index.php#product'</script>";
