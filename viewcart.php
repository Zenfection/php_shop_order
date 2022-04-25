<?php include "./frontend/header.php" ?>

<!-- Shopping Cart Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <div class="col-12">

                <!-- Cart Table Start -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">

                        <!-- Table Head Start -->
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <!-- Table Head End -->

                        <!-- Table Body Start -->
                        <tbody>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="assets/images/products/small-product/6.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Learn About Fish Farming</a></td>
                                <td class="pro-price"><span>$95.00</span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>$95.00</span></td>
                                <td class="pro-remove"><a href="#"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="assets/images/products/small-product/5.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Basic Birds Food</a></td>
                                <td class="pro-price"><span>$75.00</span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>$75.00</span></td>
                                <td class="pro-remove"><a href="#"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="assets/images/products/small-product/3.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Dog Trainning Center</a></td>
                                <td class="pro-price"><span>$28.00</span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>$56.00</span></td>
                                <td class="pro-remove"><a href="#"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="assets/images/products/small-product/4.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Animal Rescue Center</a></td>
                                <td class="pro-price"><span>$20.00</span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>$40.00</span></td>
                                <td class="pro-remove"><a href="#"><i class="ti-trash"></i></a></td>
                            </tr>
                        </tbody>
                        <!-- Table Body End -->

                    </table>
                </div>
                <!-- Cart Table End -->

                <!-- Cart Button Start -->
                <div class="cart-button-section m-b-n20">

                    <!-- Cart Button left Side Start -->
                    <div class="cart-btn-lef-side m-b-20">
                        <a href="#" class="btn btn btn-gray-deep btn-hover-primary">Continue Shopping</a>
                        <a href="#" class="btn btn btn-gray-deep btn-hover-primary">Update Shopping Cart</a>
                    </div>
                    <!-- Cart Button left Side End -->

                    <!-- Cart Button Right Side Start -->
                    <div class="cart-btn-right-right m-b-20">
                        <a href="#" class="btn btn btn-gray-deep btn-hover-primary">Clear Shopping Cart</a>
                    </div>
                    <!-- Cart Button Right Side End -->

                </div>
                <!-- Cart Button End -->

            </div>
        </div>

        <div class="row m-t-50">
            <div class="col-lg-6 me-0 ms-auto">

                <!-- Cart Calculation Area Start -->
                <div class="cart-calculator-wrapper">

                    <!-- Cart Calculate Items Start -->
                    <div class="cart-calculate-items">

                        <!-- Cart Calculate Items Title Start -->
                        <h3 class="title">Cart Totals</h3>
                        <!-- Cart Calculate Items Title End -->

                        <!-- Responsive Table Start -->
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>$230</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$70</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">$300</td>
                                </tr>
                            </table>
                        </div>
                        <!-- Responsive Table End -->

                    </div>
                    <!-- Cart Calculate Items End -->

                    <!-- Cart Checktout Button Start -->
                    <a href="checkout.html" class="btn btn btn-gray-deep btn-hover-primary m-t-30">Proceed To Checkout</a>
                    <!-- Cart Checktout Button End -->

                </div>
                <!-- Cart Calculation Area End -->

            </div>
        </div>

    </div>
</div>
<!-- Shopping Cart Section End -->

<?php include "./frontend/footer.php" ?>