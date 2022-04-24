<?php include "../frontend/header.php" ?>

    <!-- Page Title Start -->
    <div class="page-title-area bg-2 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                    ?>
                    <h1 class="page-title">Dashboard</h1>
                    <span>Welcome to our Dashboard</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Dashboard Start -->
    <div class="dashboard-area bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Dashboard Sidebar Start -->
                    <div class="dashboard-sidebar">
                        <!-- Dashboard Sidebar Profile Start -->
                        <div class="dashboard-sidebar-profile">
                            <div class="dashboard-sidebar-profile-image">
                                <img src="/assets/images/user/user-1.jpg" alt="Profile Image" />
                            </div>
                            <div class="dashboard-sidebar-profile-content">
                                <h4>John Doe</h4>
                                <span>
