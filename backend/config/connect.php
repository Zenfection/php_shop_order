<?php
    session_start();
    require ('../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
    $dotenv->load();
    
    $DB_HOST = $_ENV['DB_HOST'];
    $DB_USER = $_ENV['DB_USER'];
    $DB_PASS = $_ENV['DB_PASS'];
    $DB_NAME = $_ENV['DB_NAME'];
    $DB_PORT = $_ENV['DB_PORT'];
    
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT)
        or die("Lỗi kết nối mySQL : " . mysqli_error($connect));

?>