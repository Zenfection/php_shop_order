<?php include "../config/connect.php" ?>
<?php echo "<script>window.location.href='/admin/index.php#product'</script>" ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <?php 
            if(isset($_SESSION['addProduct'])) {
                echo $_SESSION['addProduct'];
                unset($_SESSION['addProduct']);
            }
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="#add_product" id="sidebar-add-product" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Thêm Sản Phẩm Mới</a>
                            </div>
                            <div class="col-lg-9 col-xl-10">
                                <div class="float-lg-end">
                                    <div class="row row-cols-lg-auto g-2">
                                        <div class="col-12">
                                            <div class="position-relative">
                                                <input type="text" id="searchProduct" class="form-control ps-5" placeholder="Tìm Sản Phẩm..." value="<?php echo $_POST['search']?>"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid" data-aos="zoom-in-down">
            <?php
            $search = $_POST['search'];
            if(isset($_POST['search'])) {
                $sql = "SELECT * FROM `tb_product` WHERE LOWER(name) LIKE CONCAT('%', LOWER(CONVERT('$search', BINARY)), '%') ORDER BY id_product DESC";
            } else {
                $sql = "SELECT * FROM `tb_product` ORDER BY id_product DESC";
            }
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_product'];
                $name = $row['name'];
                $price = (float)$row['price'];
                $image = $row['image'];
                $description = $row['description'];
                $quantity = (int)$row['quantity'];
                $discount = (int)$row['discount'];
                $discount_price = $price - ($price * $discount / 100);
                $ranking = (float)$row['ranking'];
            ?>
                <div class="col">
                    <div class="card">
                        <?php if($quantity == 0) 
                            echo "<div class='ribbon bg-danger'>Đã bán hết</div>";
                            echo "<script>$('.ribbon').parent().css('opacity', '0.5')</script>";
                            ?>
                        <img src="/assets/images/products/<?php echo $image ?>" class="card-img-top p-20">
                        <?php
                        if ($discount > 0) {
                            echo "<div class='position-absolute top-0 end-0 m-3 product-discount'>
                            <span>-$discount%</span>
                            </div>";
                        }
                        ?>
                        <div class="card-body">
                            <h6 class="card-title cursor-pointer"><?php echo $name ?></h6>
                            <div class="clearfix">
                                <p class="mb-0 float-start">Còn <strong><?php echo $quantity ?></strong></p>
                                <p class="mb-0 float-end fw-bold">
                                    <?php
                                    if ($discount > 0) {
                                        echo "<span class='me-2 text-decoration-line-through text-secondary'>$price$</span>";
                                    }
                                    ?>
                                    <span><?php echo $discount_price ?>$</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center mt-3 fs-6">
                                <div class="cursor-pointer">
                                    <?php
                                    $tempRank = $ranking;
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($tempRank > 2) {
                                            echo "<i class='bx bxs-star text-warning'></i>";
                                            $tempRank -= 2;
                                        } else if ($tempRank > 0) {
                                            echo "<i class='bx bxs-star-half text-warning'></i>";
                                            $tempRank = 0;
                                        } else {
                                            echo "<i class='bx bxs-star text-secondary'></i>";
                                        }
                                    }
                                    ?>
                                </div>
                                <p class="mb-0 ms-auto"><?php echo $ranking / 2 ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <!--end row-->


    </div>
</div>
<!--end page wrapper -->