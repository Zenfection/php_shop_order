<?php 
    session_start();
    isset($_SESSION['user']) ? $valid = true : $valid = false;
    echo json_encode($valid);
    return;
?>