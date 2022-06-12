<?php include "./config/connect.php" ?>
<?php
    $root = $_SERVER['REQUEST_URI'];
    $path = preg_replace('/[^a-zA-Z0-9 ?=_]/i', '', $root);
    echo "<script>window.history.replaceState('$path', '$path'.toUpperCase(), '/$path');</script>";
?>

<?php include "./frontend/header.php" ?>

<script src="./assets/js/vendor.min.js"></script>
<script src="./assets/js/plugins.min.js"></script>
<script src="./assets/js/tiny-slider.js"></script>
<script src="./assets/js/feather.js"></script>
<!--  -->

<script src="./assets/js/custom.js"></script>
<script src="./assets/js/main.js"></script>

<div id="content">
    <?php 
        if($path == '') 
            include "./home.php";
    ?>
</div>

<?php include "./frontend/footer.php" ?>