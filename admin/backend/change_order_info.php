<?php 
    include "../../config/connect.php";
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $name = $_POST['name_customer'];
        $email = $_POST['email_customer'];
        $phone = $_POST['phone_customer'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        //!check session admin sau này, giờ chưa có
        // UPDATE_ORDER(id, name, email, phone, province, city, address, status);
        $result = mysqli_query($conn, "CALL UPDATE_ORDER('$id', '$name', '$email', '$phone', '$province', '$city', '$address', '$status')");
    $_SESSION['change_order_info'] = "<div class='alert border-0 border-start border-5 border-success alert-dismissible fade show py-2'>
    <div class='d-flex align-items-center'>
        <div class='font-35 text-success'><i class='bx bxs-check-circle'></i>
        </div>
        <div class='ms-3'>
            <h6 class='mb-0 text-success'>Cập Nhật Đơn Hàng</h6>
            <div>Bạn đã cập nhật đơn <strong>${id}</strong></div>
        </div>
    </div>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    echo "<script>window.location.href = '/admin/index.php#order'</script>";
