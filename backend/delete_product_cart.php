<?php 
        include "../config/connect.php";
        if(isset($_GET['id_product'])){
                $user = $_SESSION['user'];
                $id = $_GET['id_product'];
                $sql = "DELETE FROM `tb_cart`
                        WHERE username = '$user'
                        AND id_product = '$id'";
                $conn->query($sql);
                header("location: /index.php");
        }
?>