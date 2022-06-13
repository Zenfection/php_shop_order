<?php include "./config/connect.php" ?>
<?php
    $root = $_SERVER['REQUEST_URI'];
    $path = preg_replace('/[^a-zA-Z0-9 ?=_]/i', '', $root);
    echo "<script>window.history.replaceState('$path', '$path'.toUpperCase(), '/$path');</script>";
?>

<?php include "./frontend/header.php" ?>

<!-- vendor: 
1. popper.min.js          : 2.11.5
2. bootstrap.min.js       : 5.1.3
3. jquery.min.js          : 3.6.0
4. jquery-migrate.min.js  : 3.4.0
5. modernizr.min.js       : 3.11.2
-->

<script src="./assets/js/vendor/popper.min.js"></script>
<script src="./assets/js/vendor/bootstrap.min.js"></script>
<script src="./assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="./assets/js/vendor/jquery-migrate-3.4.0.min.js"></script>
<script src="./assets/js/vendor/modernizr-3.11.2.min.js"></script>   


<script src="./assets/js/plugins/aos.min.js"></script>
<script src="./assets/js/plugins/jquery.validate.js"></script>
<script src="./assets/js/plugins/jquery-ui.min.js"></script>
<script src="./assets/js/plugins/nice-select.min.js"></script>
<script src="./assets/js/plugins/lobibox.min.js"></script>  
<script src="./assets/js/plugins/notifications.min.js"></script>  
<script src="./assets/js/plugins/tiny-slider.js"></script>
<script src="./assets/js/plugins/feather.min.js"></script>

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