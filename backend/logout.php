<?php 
    include('../config/connect.php');
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']
?>