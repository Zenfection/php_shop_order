<?php 
        include "./config/connect.php";
        if(isset($_POST['delete_id'])){
                $user = $_SESSION['user'];
                $id = $_POST['delete_id'];
                $sql = "DELETE FROM `tb_cart`
                        WHERE username = '$user'
                        AND id_product = '$id'";
                $conn->query($sql);
                $conn->close();
        }
?>