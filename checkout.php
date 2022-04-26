<?php include "./frontend/header.php" ?>

<!-- Checkout Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row m-b-n20">
            <div class="col-lg-6 col-12 m-b-20">

                <!-- Checkbox Form Start -->
                <form action="#">
                    <div class="checkbox-form">

                        <!-- Checkbox Form Title Start -->
                        <h3 class="title">Hoá Đơn Chi Tiết</h3>
                        <!-- Checkbox Form Title End -->

                        <div class="row">

                            <!-- First Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- First Name Input End -->

                            <!-- Last Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- Last Name Input End -->

                            <!-- Address Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input placeholder="Street address" type="text">
                                </div>
                            </div>
                            <!-- Address Input End -->

                            <!-- Optional Text Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                </div>
                            </div>
                            <!-- Optional Text Input End -->

                            <!-- Town or City Name Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Thành Phố <span class="required">*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <!-- Town or City Name Input End -->

                            <!-- State or Country Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Tỉnh <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- State or Country Input End -->

                            <!-- Email Address Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email <span class="required">*</span></label>
                                    <input placeholder="" type="email">
                                </div>
                            </div>
                            <!-- Email Address Input End -->

                            <!-- Phone Number Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Điện Thoại <span class="required">*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <!-- Phone Number Input End -->

                        </div>
                        <!-- Different Address End -->
                    </div>
                </form>
                <!-- Checkbox Form End -->

            </div>

            <div class="col-lg-6 col-12 m-b-20">

                <!-- Your Order Area Start -->
                <div class="your-order-area border">

                    <!-- Title Start -->
                    <h3 class="title">Your order</h3>
                    <!-- Title End -->

                    <!-- Your Order Table Start -->
                    <div class="your-order-table table-responsive">
                        <table class="table">

                            <!-- Table Head Start -->
                            <thead>
                                <tr class="cart-product-head">
                                    <th class="cart-product-name text-start">Product</th>
                                    <th class="cart-product-total text-end">Total</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name text-start ps-0"> Some Winter Collections<strong class="product-quantity"> × 2</strong></td>
                                    <td class="cart-product-total text-end pe-0"><span class="amount">£145.00</span></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name text-start ps-0"> Small Scale Style<strong class="product-quantity"> × 4</strong></td>
                                    <td class="cart-product-total text-end pe-0"><span class="amount">£204.00</span></td>
                                </tr>
                            </tbody>
                            <!-- Table Body End -->

                            <!-- Table Footer Start -->
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th class="text-start ps-0">Cart Subtotal</th>
                                    <td class="text-end pe-0"><span class="amount">£349.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th class="text-start ps-0">Order Total</th>
                                    <td class="text-end pe-0"><strong><span class="amount">£349.00</span></strong></td>
                                </tr>
                            </tfoot>
                            <!-- Table Footer End -->

                        </table>
                    </div>
                    <!-- Your Order Table End -->

                    <!-- Payment Accordion Order Button Start -->
                    <div class="payment-accordion-order-button">
                        <div class="payment-accordion">
                            <div class="single-payment">
                                <h5 class="panel-title m-b-15">
                                    <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Direct Bank Transfer.
                                    </a>
                                </h5>
                                <div class="collapse show" id="collapseExample">
                                    <div class="card card-body rounded-0">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-payment">
                                <h5 class="panel-title m-b-15">
                                    <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample-2">
                                        Cheque Payment.
                                    </a>
                                </h5>
                                <div class="collapse" id="collapseExample-2">
                                    <div class="card card-body rounded-0">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-payment">
                                <h5 class="panel-title m-b-15">
                                    <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-3" aria-expanded="false" aria-controls="collapseExample-3">
                                        Paypal.
                                    </a>
                                </h5>
                                <div class="collapse" id="collapseExample-3">
                                    <div class="card card-body rounded-0">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-button-payment">
                            <button class="btn btn-primary btn-hover-dark rounded-0 w-100">Place Order</button>
                        </div>
                    </div>
                    <!-- Payment Accordion Order Button End -->
                </div>
                <!-- Your Order Area End -->
            </div>
        </div>
    </div>
</div>
<!-- Checkout Section End -->

<?php include "./frontend/footer.php" ?>