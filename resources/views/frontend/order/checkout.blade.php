@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM CHECKOUT PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.checkout-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.checkout-premium-header::before {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
    border-radius: 50%;
    top: -250px;
    right: -100px;
    filter: blur(80px);
    pointer-events: none;
}

.tf-page-title.checkout-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Checkout Section */
.checkout-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 60px 0;
    min-height: 60vh;
}

/* Checkout Layout */
.checkout-layout {
    display: grid;
    grid-template-columns: 1fr 450px;
    gap: 32px;
    align-items: flex-start;
}

/* Billing Card */
.billing-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 32px;
}

.billing-card .section-title {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 28px;
    padding-bottom: 16px;
    border-bottom: 2px solid #f0f2ff;
}

/* Form Fields */
.premium-form .form-field {
    margin-bottom: 20px;
}

.premium-form .form-label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.premium-form .form-input,
.premium-form .form-select,
.premium-form .form-textarea {
    width: 100%;
    padding: 14px 18px;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #1a1a3e;
    transition: all 0.3s ease;
}

.premium-form .form-input:focus,
.premium-form .form-select:focus,
.premium-form .form-textarea:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.premium-form .form-textarea {
    min-height: 120px;
    resize: vertical;
}

.premium-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

/* Select Dropdown */
.premium-form .select-wrapper {
    position: relative;
}

.premium-form .select-wrapper::after {
    content: '';
    position: absolute;
    right: 18px;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #888;
    pointer-events: none;
}

/* Order Summary Card */
.order-summary-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 32px;
    position: sticky;
    top: 120px;
}

.order-summary-card .section-title {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid #f0f2ff;
}

/* Order Items */
.order-items {
    margin-bottom: 24px;
    max-height: 300px;
    overflow-y: auto;
    padding-right: 8px;
}

.order-items::-webkit-scrollbar {
    width: 4px;
}

.order-items::-webkit-scrollbar-thumb {
    background: #e5e7eb;
    border-radius: 2px;
}

.order-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 0;
    border-bottom: 1px solid #f8f9ff;
}

.order-item:last-child {
    border-bottom: none;
}

.order-item-image {
    position: relative;
    width: 70px;
    height: 80px;
    border-radius: 12px;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    flex-shrink: 0;
}

.order-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.order-item-qty {
    position: absolute;
    top: -6px;
    right: -6px;
    width: 22px;
    height: 22px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 600;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.order-item-details {
    flex: 1;
}

.order-item-name {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 4px;
}

.order-item-variant {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: #888;
}

.order-item-price {
    font-family: 'Playfair Display', serif;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
}

/* Coupon Box */
.coupon-box-premium {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
    padding: 16px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 14px;
}

.coupon-box-premium input {
    flex: 1;
    padding: 14px 18px;
    background: #fff;
    border: 2px solid transparent;
    border-radius: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #1a1a3e;
    transition: all 0.3s ease;
}

.coupon-box-premium input:focus {
    outline: none;
    border-color: #667eea;
}

.coupon-box-premium .btn-apply {
    padding: 14px 24px;
    background: #1a1a3e;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.coupon-box-premium .btn-apply:hover {
    background: #2a2a5e;
}

.coupon-error {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: #f5576c;
    margin-top: 8px;
    display: none;
}

/* Summary Rows */
.summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 0;
    border-bottom: 1px solid #f8f9ff;
}

.summary-row:last-of-type {
    border-bottom: none;
}

.summary-row .label {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: #666;
}

.summary-row .value {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
}

.summary-row.discount .value {
    color: #10b981;
}

.summary-row.total {
    padding-top: 20px;
    margin-top: 12px;
    border-top: 2px solid #f0f2ff;
}

.summary-row.total .label {
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
}

.summary-row.total .value {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    color: #667eea;
}

/* Place Order Button */
.btn-place-order {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    width: 100%;
    padding: 18px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
    margin-top: 24px;
}

.btn-place-order:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
}

/* Security Badge */
.security-badge {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 20px;
    padding: 14px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 12px;
}

.security-badge i {
    color: #10b981;
}

.security-badge span {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #666;
}

/* Responsive */
@media (max-width: 991.98px) {
    .checkout-layout {
        grid-template-columns: 1fr;
    }
    
    .order-summary-card {
        position: static;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.checkout-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.checkout-premium-header .heading {
        font-size: 32px !important;
    }
    
    .checkout-premium-section {
        padding: 30px 0;
    }
    
    .billing-card,
    .order-summary-card {
        padding: 20px;
        border-radius: 20px;
    }
    
    .premium-form .form-row {
        grid-template-columns: 1fr;
    }
    
    .coupon-box-premium {
        flex-direction: column;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title checkout-premium-header">
    <div class="container-full">
        <div class="heading text-center">Check Out</div>
    </div>
</div>
<!-- /page-title -->

<!-- page-cart -->
<section class="flat-spacing-11 checkout-premium-section">
    <div class="container">
        <div class="checkout-layout tf-page-cart-wrap layout-2">
            <!-- Billing Details -->
            <div class="billing-card tf-page-cart-item">
                <h2 class="section-title fw-5 mb_20">Billing Details</h2>
                <form class="premium-form form-checkout">
                    <div class="form-field box fieldset">
                        <label class="form-label" for="fullname">Full Name</label>
                        <input type="text" class="form-input" id="fullname" name="fullname" placeholder="Enter your full name">
                    </div>
                    <div class="form-field box fieldset">
                        <label class="form-label" for="mobile">Phone Number</label>
                        <input type="number" class="form-input" id="mobile" name="mobile" placeholder="Enter phone number">
                    </div>
                    <div class="form-field box fieldset">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" class="form-input" id="email" name="email" placeholder="Enter email address">
                    </div>
                    <div class="form-field box fieldset">
                        <label class="form-label" for="address">Street Address</label>
                        <input type="text" class="form-input" id="address" name="address" placeholder="House number and street name">
                    </div>
                    <div class="form-row box grid-2">
                        <div class="form-field box fieldset">
                            <label class="form-label" for="state">State/Region</label>
                            <div class="select-wrapper select-custom">
                                <select class="form-select tf-select w-100" id="state" name="state" onchange="getCity()">
                                    <option value="">Select State</option>
                                    @foreach ($state as $item)
                                        <option value="{{ $item->state_id }}">{{ $item->state_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-field box fieldset">
                            <label class="form-label" for="city">Town/City</label>
                            <div class="select-wrapper select-custom">
                                <select class="form-select tf-select w-100" id="city" name="city">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row box grid-2">
                        <div class="form-field fieldset">
                            <label class="form-label" for="landmark">Landmark</label>
                            <input type="text" class="form-input" id="landmark" name="landmark" placeholder="Nearby landmark">
                        </div>
                        <div class="form-field fieldset">
                            <label class="form-label" for="postcode">Pincode</label>
                            <input type="text" class="form-input" id="postcode" name="postcode" placeholder="Enter pincode">
                        </div>
                    </div>
                    <div class="form-field box fieldset">
                        <label class="form-label" for="order_notes">Order Notes (optional)</label>
                        <textarea class="form-textarea" name="order_notes" id="order_notes" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                    </div>
                </form>
            </div>

            @php
                $subtotal = collect($cart)->sum('price');
                $deliverycharge = 50.00;
                $net = $subtotal + $deliverycharge;
            @endphp

            <!-- Order Summary -->
            <div class="order-summary-card tf-page-cart-footer">
                <div class="tf-cart-footer-inner">
                    <h3 class="section-title fw-5 mb_20">Your Order</h3>
                    <input type="hidden" id="coupon_discount" name="coupon_discount" value="0">
                    <input type="hidden" id="applied_coupon_code" name="applied_coupon_code" value="">
                    <input type="hidden" id="amtcurrency" value="INR">
                    <input type="hidden" id="shipping" name="shipping" value="<?=$deliverycharge?>">

                    <form class="tf-page-cart-checkout widget-wrap-checkout">
                        <!-- Order Items -->
                        <div class="order-items wrap-checkout-product">
                            @foreach ($cart as $item)
                            <div class="order-item checkout-product-item">
                                <figure class="order-item-image img-product">
                                    <img src="{{ url('/') }}/{{ $item->image_url }}" alt="product">
                                    <span class="order-item-qty quantity">{{ $item->quantity }}</span>
                                </figure>
                                <div class="order-item-details content">
                                    <div class="info">
                                        <p class="order-item-name name">{{ $item->product_name }}</p>
                                        <span class="order-item-variant variant">{{ $item->color_name }} / {{ $item->size }}</span>
                                    </div>
                                </div>
                                <span class="order-item-price price">Rs.{{ $item->price }}</span>
                            </div>
                            @endforeach
                        </div>

                        <!-- Coupon -->
                        <div class="coupon-box-premium coupon-box">
                            <input type="text" placeholder="Enter discount code" id="coupon_code" name="coupon_code">
                            <a href="#" class="btn-apply tf-btn btn-sm radius-3 btn-fill coupon">Apply</a>
                        </div>
                        <div id="error" class="coupon-error">
                            <span id="errormessage"></span>
                        </div>

                        <!-- Summary -->
                        <div class="summary-row d-flex justify-content-between line pb_20">
                            <span class="label fw-5">Subtotal</span>
                            <span class="value total fw-5">Rs.{{ $subtotal }}</span>
                        </div>
                        <div class="summary-row discount d-flex justify-content-between line pb_20" id="discount-row" style="display:none;">
                            <span class="label fw-5">Discount</span>
                            <span class="value total fw-5 text-success">- Rs.<span id="discount-amount">0</span></span>
                        </div>
                        <div class="summary-row d-flex justify-content-between line pb_20">
                            <span class="label fw-5">Shipping</span>
                            <span class="value total fw-5">Rs.{{ $deliverycharge }}</span>
                        </div>
                        <div class="summary-row total d-flex justify-content-between line pb_20">
                            <span class="label fw-5">Total</span>
                            <span class="value total fw-5" id="final-total">Rs.{{ $net }}</span>
                        </div>

                        <button type="button" class="btn-place-order tf-btn radius-3 btn-fill btn-icon justify-content-center" onclick="paynow()">
                            <i class="icon icon-bag"></i>
                            Place Order
                        </button>

                        <div class="security-badge">
                            <i class="icon icon-check"></i>
                            <span>Secure Checkout - SSL Encrypted</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= url('/') ?>/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
$(document).on("click", ".coupon", function(e) {
    e.preventDefault();
    var ccode = $('#coupon_code').val().trim();
    if (!ccode) return alert("Please enter a coupon code.");

    $.post("{{ url('/api/v1/coupon/get-coupon-by-code') }}", { ccode }, function(data) {
        if (data.status === "SUCCESS") {
            let type = parseInt(data.list.coupon_type);
            let value = parseFloat(data.list.coupon_value);
            let subtotal = {{ $subtotal }};
            let shipping = {{ $deliverycharge }};
            let discount = type === 0 ? value : (subtotal * value / 100);
            if (discount > (subtotal + shipping)) discount = subtotal + shipping;
            let newTotal = (subtotal + shipping - discount).toFixed(2);

            $('#discount-amount').text(discount.toFixed(2));
            $('#discount-row').show();
            $('#final-total').text('Rs.' + newTotal);
            $('#coupon_discount').val(discount.toFixed(2));
            $('#applied_coupon_code').val(ccode);
            $('#error').hide();
        } else {
            $('#error').show();
            $('#errormessage').text(data.message);
        }
    }).fail(function() {
        alert("Something went wrong while applying the coupon.");
    });
});

function paynow() {


let fullname = $('#fullname').val();
let mobile = $('#mobile').val();
let email = $('#email').val();
let city = $('#city').val();
let state = $('#state').val();
let country = '101';
let postcode = $('#postcode').val();
let address = $('#address').val();
let order_notes = $('#order_notes').val();
let landmark = $('#landmark').val();
let shipping = $('#shipping').val();
let coupon_discount = $('#coupon_discount').val();
let applied_coupon_code = $('#applied_coupon_code').val();

if (fullname != "" && address != "" && postcode != "" && city != "" && state != "" && country != "" && mobile !=
    "" && email != "") {

    $.ajax({
        type: 'POST',
        url: '<?php echo url('/'); ?>/api/v1/order/checkout',
        data: {
            'fullname': fullname,
            'mobile': mobile,
            'email': email,
            'city': city,
            'state': state,
            'country': country,
            'postcode': postcode,
            'address': address,
            'order_notes': order_notes,
            'landmark': landmark,
            'coupon_discount': coupon_discount,
            'applied_coupon_code': applied_coupon_code,
            'shipping': shipping,
        },
        success: function(data) {
            console.log(data);
            if (data.status == "SUCCESS") {


                var order_id = data["order_id"];
                var user_id = data["user_id"];
                var payment_id = data["payment_id"];
                var amount = data["amount"];
                console.log("amt:" + amount);
                var total_amount = (amount * 100).toFixed(2);
                console.log("t_amt:" + total_amount);
                // alert("1");
                var options = {
                    "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
                    "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": $('#amtcurrency').val(),
                    "name": "Shoppers Destination",
                    "description": "Purchase Payment",
                    "image": "<?php echo url('/'); ?>/images/logo/favicon.png",
                    "order_id": payment_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function(response) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('razorpay-payment') }}",
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                amount: amount
                            },
                            success: function(data) {
                                 // alert("successfully ordered");
                                             console.log(data);

                                             window.location.href =
                                                 "<?php echo url('/'); ?>/my-profile";

                                                        // Swal.fire({
                                                        //     title: "Thanks for your purchase! We've emailed your order details to you.",
                                                        //     body:"Thanks for your purchase! We've emailed your order details to you.",
                                                        //     icon: 'success',
                                                        //     confirmButtonColor: '#3085d6',
                                                        //     confirmButtonText: 'Ok'
                                                        //     }).then((result) => {
                                                        //     if (result.isConfirmed) {
                                                        //         window.location.href = "<?=url('/');?>/";
                                                        //     }});

                            }
                        });
                    },
                    "prefill": {
                        "name": name,
                        "email": email,
                        "contact": mobile
                    },
                    "notes": {
                        "address": address,
                        "merchant_order_id": order_id
                    },
                    "theme": {
                        "color": "#667eea"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();


            }
        },
        error: function(request, error) {
            alert("Request: " + JSON.stringify(request));
            // $("#staticBackdrop").modal("show");
            // alert("failed data")
        },
    });
} else {

    // $("#staticBackdrop").modal("show");
    Swal.fire({
        title: 'Missing Information',
        text: 'Please fill in all required fields',
        icon: 'warning',
        confirmButtonColor: '#667eea'
    });

}





// }
}




function getCity() {
var state = $('#state').val();
$.ajax({
    type: 'GET',
    url: '<?php echo url('/'); ?>/api/v1/state/getCityByState',
    data: {
        'id': state
    },
    success: function(data) {
        console.log(data);
        if (data.status == "SUCCESS") {
            $("#city").empty();
            $("#city").append("<option value=''>Select City</option>");
            console.log(data.list.length);
            for (var i = 0; i < data.list.length; i++) {
                $("#city").append("<option value='" + data.list[i].city_id + "'>" + data.list[i]
                    .city_name + '</option>');
            }
        }
    }
});

}






</script>

@endsection
