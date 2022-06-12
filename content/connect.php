<?php
    session_start();
    require ('../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();
    
    $DB_HOST = $_ENV['DB_HOST'];
    $DB_USER = $_ENV['DB_USER'];
    $DB_PASS = $_ENV['DB_PASS'];
    $DB_NAME = $_ENV['DB_NAME'];
    
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
        or die("Lỗi kết nối mySQL : " . mysqli_error($conn));

    mysqli_set_charset($conn,"utf8");
?>