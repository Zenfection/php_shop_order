<?php include "./config/connect.php" ?>
<?php
$root = $_SERVER['REQUEST_URI'];
$path = preg_replace('/[^a-zA-Z0-9 ]/i', '', $root);
echo "<script>window.history.replaceState('$path', '$path'.toUpperCase(), '/$path');</script>";
?>
<?php include "./frontend/header.php" ?>

<div id="content">

</div>

<?php include "./frontend/footer.php" ?>