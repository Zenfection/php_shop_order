<?php include "./frontend/header.php" ?>

<!-- My Account Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                                <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment Method</a>
                                <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> Địa Chỉ</a>
                                <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Chi Tiết</a>
                                <a href="/backend/logout.php"><i class="fa fa-sign-out"></i> Đăng Xuất</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong>Alex Aya</strong> (If Not <strong>Aya !</strong><a href="login.php" class="logout"> Logout</a>)</p>
                                        </div>
                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Pending</td>
                                                        <td>$3000</td>
                                                        <td><a href="cart.html" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>July 22, 2018</td>
                                                        <td>Approved</td>
                                                        <td>$200</td>
                                                        <td><a href="cart.html" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>June 12, 2019</td>
                                                        <td>On Hold</td>
                                                        <td>$990</td>
                                                        <td><a href="cart.html" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="download" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Downloads</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Date</th>
                                                        <th>Expire</th>
                                                        <th>Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Haven - Free Real Estate PSD Template</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Yes</td>
                                                        <td><a href="#" class="btn btn btn-dark btn-hover-primary rounded-0"><i class="fa fa-cloud-download m-r-5"></i> Download File</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>TechWorld - Profolio Business Template</td>
                                                        <td>Sep 12, 2018</td>
                                                        <td>Never</td>
                                                        <td><a href="#" class="btn btn btn-dark btn-hover-primary rounded-0"><i class="fa fa-cloud-download m-r-5"></i> Download File</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Payment Method</h3>
                                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Billing Address</h3>
                                        <address>
                                            <p><strong>Alex Aya</strong></p>
                                            <p>1234 Market ##, Suite 900 <br>Lorem Ipsum, ## 12345</p>
                                            <p>Mobile: (123) 123-456789</p>
                                        </address>
                                        <a href="#" class="btn btn btn-dark btn-hover-primary rounded-0"><i class="fa fa-edit m-r-10"></i>Edit Address</a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Account Details</h3>
                                        <div class="account-details-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item m-b-15">
                                                            <label for="first-name" class="required m-b-10">First Name</label>
                                                            <input type="text" id="first-name" placeholder="First Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item m-b-15">
                                                            <label for="last-name" class="required m-b-10">Last Name</label>
                                                            <input type="text" id="last-name" placeholder="Last Name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item m-b-15">
                                                    <label for="display-name" class="required m-b-10">Display Name</label>
                                                    <input type="text" id="display-name" placeholder="Display Name" />
                                                </div>
                                                <div class="single-input-item m-b-15">
                                                    <label for="email" class="required m-b-5">Email Addres</label>
                                                    <input type="email" id="email" placeholder="Email Address" />
                                                </div>
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="single-input-item m-b-15">
                                                        <label for="current-pwd" class="required m-b-10">Current Password</label>
                                                        <input type="password" id="current-pwd" placeholder="Current Password" />
                                                    </div>
                                                    <div class="row m-b-n15">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item m-b-15">
                                                                <label for="new-pwd" class="required m-b-10">New Password</label>
                                                                <input type="password" id="new-pwd" placeholder="New Password" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item m-b-15">
                                                                <label for="confirm-pwd" class="required m-b-10">Confirm Password</label>
                                                                <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="single-input-item single-item-button m-t-30">
                                                    <button class="btn btn btn-primary btn-hover-dark rounded-0">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->

                            </div>
                        </div>
                        <!-- My Account Tab Content End -->

                    </div>
                </div>
                <!-- My Account Page End -->

            </div>
        </div>

    </div>
</div>
<!-- My Account Section End -->

<?php include "./frontend/footer.php" ?>