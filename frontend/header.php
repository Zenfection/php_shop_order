<?php 
if (session_status() != 2) {
    include "connect.php";
}
?>
<!-- Header Action Start -->

<!-- Header Action Search Button Start -->
<div class="header-action-btn header-action-btn-search d-none d-md-flex">
    <div class="action-execute">
        <a class="action-search-open" href="javascript:void(0)"><i class="fa-duotone fa-magnifying-glass fa-xl"></i></a>
        <a class="action-search-close" href="javascript:void(0)"><i class="fa-duotone fa-xmark fa-xl"></i></a>
    </div>
    <!-- Search Form and Button Start -->
    <div class="header-search-form" id="searchProduct">
        <input type="text" class="header-search-input" placeholder="Tìm kiếm" style="width: 200px !important">
        <button class="header-search-button"><i class="fa-duotone fa-magnifying-glass"></i></button>
    </div>
    <!-- Search Form and Button End -->
</div>
<!-- Header Action Search Button End -->

<!-- account login -->
<?php
if (isset($_SESSION['user'])) {
    echo "<a id='account' class='nav-content cursor-pointer header-action-btn header-action-btn-wishlist'>
                                    <i class='fa-duotone fa-user-gear fa-xl'></i></a>";
} else {
    echo "<a  id='login' class='nav-content cursor-pointer header-action-btn header-action-btn-wishlist'><i class='fa-duotone fa-user fa-xl'></i></a>";
}
?>

<?php include "cart.php" ?>

<!-- Mobile Menu Hambarger Action Button Start -->
<a href="javascript:void(0)" class="header-action-btn header-action-btn-menu d-lg-none d-md-flex">
    <i class="fa-duotone fa-bars fa-xl"></i>
</a>
<!-- Mobile Menu Hambarger Action Button End -->