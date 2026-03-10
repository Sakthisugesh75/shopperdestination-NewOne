@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM CART PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.cart-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.cart-premium-header::before {
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

.tf-page-title.cart-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Cart Section */
.cart-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 60px 0;
    min-height: 60vh;
}

/* Empty Cart */
.empty-cart-premium {
    text-align: center;
    padding: 100px 20px;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
}

.empty-cart-premium .empty-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 32px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-cart-premium .empty-icon i {
    font-size: 48px;
    color: #667eea;
}

.empty-cart-premium h3 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 16px;
}

.empty-cart-premium p {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: #666;
    margin-bottom: 32px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

.empty-cart-premium .btn-shop {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.empty-cart-premium .btn-shop:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    color: #fff;
}

/* Cart Layout */
.cart-layout {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 32px;
    align-items: flex-start;
}

/* Cart Items Card */
.cart-items-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.cart-items-header {
    padding: 24px 28px;
    border-bottom: 1px solid #f0f2ff;
    display: flex;
    align-items: center;
    gap: 12px;
}

.cart-items-header h3 {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #1a1a3e;
    margin: 0;
}

.cart-items-header .item-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 28px;
    height: 28px;
    padding: 0 8px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    border-radius: 50px;
}

/* Cart Item Row */
.cart-item {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 24px 28px;
    border-bottom: 1px solid #f8f9ff;
    transition: background 0.3s ease;
}

.cart-item:hover {
    background: #fafbff;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item-image {
    width: 100px;
    height: 120px;
    border-radius: 16px;
    overflow: hidden;
    flex-shrink: 0;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cart-item-details {
    flex: 1;
}

.cart-item-title {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
    text-decoration: none;
    display: block;
    margin-bottom: 6px;
    transition: color 0.3s ease;
}

.cart-item-title:hover {
    color: #667eea;
}

.cart-item-variant {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #888;
    margin-bottom: 12px;
}

.cart-item-remove {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #f5576c;
    cursor: pointer;
    transition: opacity 0.3s ease;
}

.cart-item-remove:hover {
    opacity: 0.7;
}

.cart-item-price {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    font-weight: 600;
    color: #1a1a3e;
    min-width: 100px;
    text-align: center;
}

/* Quantity Control */
.quantity-control {
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 12px;
    overflow: hidden;
}

.quantity-btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    color: #1a1a3e;
    cursor: pointer;
    transition: all 0.3s ease;
}

.quantity-btn:hover {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
}

.quantity-input {
    width: 50px;
    height: 40px;
    text-align: center;
    border: none;
    background: transparent;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #1a1a3e;
}

.cart-item-total {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    font-weight: 600;
    color: #1a1a3e;
    min-width: 110px;
    text-align: right;
}

/* Cart Summary Card */
.cart-summary-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 28px;
    position: sticky;
    top: 120px;
}

.summary-title {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid #f0f2ff;
}

/* Shipping Estimator */
.shipping-estimator {
    margin-bottom: 24px;
}

.shipping-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 20px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.shipping-toggle:hover {
    background: linear-gradient(135deg, #f0f2ff, #e8ebff);
}

.shipping-toggle h4 {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #1a1a3e;
    margin: 0;
}

.shipping-toggle .toggle-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 50%;
    transition: transform 0.3s ease;
}

.shipping-toggle[aria-expanded="true"] .toggle-icon {
    transform: rotate(180deg);
}

.shipping-form {
    padding: 20px;
    background: #fafbff;
    border-radius: 0 0 14px 14px;
    margin-top: -8px;
}

.shipping-form .field {
    margin-bottom: 16px;
}

.shipping-form .label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.shipping-form input {
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

.shipping-form input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.shipping-form .btn-estimate {
    width: 100%;
    padding: 14px;
    background: #1a1a3e;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.shipping-form .btn-estimate:hover {
    background: #2a2a5e;
}

/* Summary Rows */
.summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 0;
}

.summary-row .label {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
}

.summary-row .value {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    font-weight: 600;
    color: #1a1a3e;
}

.summary-row.total {
    padding-top: 20px;
    margin-top: 16px;
    border-top: 2px solid #f0f2ff;
}

.summary-row.total .label {
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
}

.summary-row.total .value {
    font-size: 28px;
    color: #667eea;
}

/* Tax Note */
.tax-note {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #888;
    margin-bottom: 20px;
}

.tax-note a {
    color: #667eea;
    text-decoration: none;
}

.tax-note a:hover {
    text-decoration: underline;
}

/* Terms Checkbox */
.terms-check {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 24px;
}

.terms-check input[type="checkbox"] {
    width: 20px;
    height: 20px;
    accent-color: #667eea;
    margin-top: 2px;
}

.terms-check label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #666;
    line-height: 1.5;
}

.terms-check label a {
    color: #667eea;
    text-decoration: none;
}

.terms-check label a:hover {
    text-decoration: underline;
}

/* Checkout Button */
.btn-checkout {
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
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
}

.btn-checkout:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
    color: #fff;
}

/* Payment Trust */
.payment-trust {
    margin-top: 28px;
    padding-top: 24px;
    border-top: 1px solid #f0f2ff;
    text-align: center;
}

.payment-trust .trust-title {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 16px;
}

.payment-icons {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
}

.payment-icons svg {
    height: 28px;
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

.payment-icons svg:hover {
    opacity: 1;
}

/* Responsive */
@media (max-width: 991.98px) {
    .cart-layout {
        grid-template-columns: 1fr;
    }
    
    .cart-summary-card {
        position: static;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.cart-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.cart-premium-header .heading {
        font-size: 32px !important;
    }
    
    .cart-premium-section {
        padding: 30px 0;
    }
    
    .cart-item {
        flex-wrap: wrap;
        gap: 16px;
        padding: 20px;
    }
    
    .cart-item-image {
        width: 80px;
        height: 100px;
    }
    
    .cart-item-details {
        flex: 1;
        min-width: 150px;
    }
    
    .cart-item-price,
    .cart-item-total {
        width: 50%;
        text-align: left;
    }
    
    .quantity-control {
        width: 100%;
        justify-content: center;
    }
    
    .cart-summary-card {
        padding: 20px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title cart-premium-header">
    <div class="container-full">
        <div class="heading text-center">Shopping Cart</div>
    </div>
</div>
<!-- /page-title -->

<!-- page-cart -->
<section class="flat-spacing-11 cart-premium-section">
    <div class="container">
        <?php
            // print_r($record);
            if(empty($record)){ ?>
        <!-- Empty Cart State -->
        <div class="empty-cart-premium tf-page-cart text-center">
            <div class="empty-icon">
                <i class="icon icon-bag"></i>
            </div>
            <h3 class="mb_24">Your cart is empty</h3>
            <p class="mb_24">You may check out all the available products and buy some in the shop</p>
            <a href="<?= url('/') ?>/" class="btn-shop tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">
                Return to shop
                <i class="icon icon-arrow1-top-left"></i>
            </a>
        </div>
        <?php } ?>

        <?php if(!empty($record)){ ?>
        <div class="cart-layout tf-page-cart-wrap">
            <!-- Cart Items -->
            <div class="cart-items-card tf-page-cart-item">
                <div class="cart-items-header">
                    <h3>Cart Items</h3>
                    <span class="item-count"><?= count($record) ?></span>
                </div>
                <form>
                    <?php foreach ($record as $key => $item) { ?>
                    <div class="cart-item tf-cart-item file-delete">
                        <a href="<?= url('/') ?>/product/<?= $item->slug ?>/<?= $item->prod_color ?>" class="cart-item-image img-box">
                            <img src="<?= url('/') ?>/<?= $item->image_url ?>" alt="img-product">
                        </a>
                        <div class="cart-item-details cart-info">
                            <a href="<?= url('/') ?>/product/<?= $item->slug ?>/<?= $item->prod_color ?>" class="cart-item-title cart-title link"><?= $item->product_name ?></a>
                            <div class="cart-item-variant cart-meta-variant"><?= $item->color_name ?> / <?= $item->size ?></div>
                            <span class="cart-item-remove remove-cart" id="<?= $item->session_id ?>" data-hash="<?= $item->product_id ?>">Remove</span>
                        </div>
                        <div class="cart-item-price tf-cart-item_price tf-variant-item-price" cart-data-title="Price">
                            <div class="cart-price price">Rs.<?= $item->price ?></div>
                        </div>
                        <div class="quantity-control wg-quantity tf-cart-item_quantity" cart-data-title="Quantity">
                            <span class="quantity-btn btn-quantity btndecrease remove-qty" data-hash="<?=$item->product_id?>" id="<?=$item->cart_id?>">
                                <svg width="9" height="1" viewBox="0 0 9 1" fill="currentColor"><path d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z"></path></svg>
                            </span>
                            <input type="text" class="quantity-input" name="number" value="1">
                            <span class="quantity-btn btn-quantity btnincrease add-qty" data-hash="<?=$item->product_id?>" id="<?=$item->cart_id?>">
                                <svg width="9" height="9" viewBox="0 0 9 9" fill="currentColor"><path d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z"></path></svg>
                            </span>
                        </div>
                        <div class="cart-item-total tf-cart-item_total tf-variant-item-total" cart-data-title="Total">
                            <div class="cart-total price">Rs.<?= $item->quantity_price ?></div>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>

            <!-- Cart Summary -->
            <div class="cart-summary-card tf-page-cart-footer">
                <?php
                    $total = 0;
                    $net = 0;
                    foreach ($record as $key => $item) {
                        $total += $item->quantity_price;
                    }
                    $net = $total;
                ?>
                <div class="tf-cart-footer-inner">
                    <h3 class="summary-title">Order Summary</h3>
                    
                    <!-- Shipping Estimator -->
                    <div class="shipping-estimator shipping-calculator">
                        <summary class="shipping-toggle accordion-shipping-header d-flex justify-content-between align-items-center collapsed" data-bs-target="#shipping" data-bs-toggle="collapse" aria-controls="shipping">
                            <h4 class="shipping-calculator-title">Estimate Shipping</h4>
                            <span class="toggle-icon shipping-calculator_accordion-icon">
                                <i class="icon icon-arrow-down"></i>
                            </span>
                        </summary>
                        <div class="collapse" id="shipping">
                            <div class="shipping-form accordion-shipping-content">
                                <fieldset class="field">
                                    <label class="label">Pin code/Zip code</label>
                                    <input type="text" name="text" placeholder="Enter your pincode">
                                </fieldset>
                                <button class="btn-estimate tf-btn btn-fill animate-hover-btn radius-3 justify-content-center">
                                    <span>Estimate</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tf-page-cart-checkout">
                        <div class="summary-row tf-cart-totals-discounts">
                            <span class="label">Subtotal</span>
                            <span class="value total-value">Rs.<?php echo number_format($net,2); ?></span>
                        </div>
                        
                        <p class="tax-note tf-cart-tax">
                            Taxes and <a href="shipping-delivery.html">shipping</a> calculated at checkout
                        </p>
                        
                        <div class="terms-check cart-checkbox">
                            <input type="checkbox" class="tf-check" id="check-agree" checked>
                            <label for="check-agree" class="fw-4">
                                I agree with the <a href="terms-conditions.html">terms and conditions</a>
                            </label>
                        </div>
                        
                        <div class="cart-checkout-btn">
                            <a href="<?= url('/') ?>/checkout" class="btn-checkout tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                <i class="icon icon-bag"></i>
                                <span>Proceed to Checkout</span>
                            </a>
                        </div>
                        
                        <div class="payment-trust tf-page-cart_imgtrust">
                            <p class="trust-title text-center fw-6">Guaranteed Safe Checkout</p>
                            <div class="payment-icons cart-list-social">
                                <div class="payment-item">
                                    <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-visa"><title id="pi-visa">Visa</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><path d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z" fill="#142688"></path></svg>
                                </div>
                                <div class="payment-item">
                                    <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" width="38" height="24" role="img" aria-labelledby="pi-paypal"><title id="pi-paypal">PayPal</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><path fill="#003087" d="M23.9 8.3c.2-1 0-1.7-.6-2.3-.6-.7-1.7-1-3.1-1h-4.1c-.3 0-.5.2-.6.5L14 15.6c0 .2.1.4.3.4H17l.4-3.4 1.8-2.2 4.7-2.1z"></path><path fill="#3086C8" d="M23.9 8.3l-.2.2c-.5 2.8-2.2 3.8-4.6 3.8H18c-.3 0-.5.2-.6.5l-.6 3.9-.2 1c0 .2.1.4.3.4H19c.3 0 .5-.2.5-.4v-.1l.4-2.4v-.1c0-.2.3-.4.5-.4h.3c2.1 0 3.7-.8 4.1-3.2.2-1 .1-1.8-.4-2.4-.1-.5-.3-.7-.5-.8z"></path><path fill="#012169" d="M23.3 8.1c-.1-.1-.2-.1-.3-.1-.1 0-.2 0-.3-.1-.3-.1-.7-.1-1.1-.1h-3c-.1 0-.2 0-.2.1-.2.1-.3.2-.3.4l-.7 4.4v.1c0-.3.3-.5.6-.5h1.3c2.5 0 4.1-1 4.6-3.8v-.2c-.1-.1-.3-.2-.5-.2h-.1z"></path></svg>
                                </div>
                                <div class="payment-item">
                                    <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-master"><title id="pi-master">Mastercard</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><circle fill="#EB001B" cx="15" cy="12" r="7"></circle><circle fill="#F79E1B" cx="23" cy="12" r="7"></circle><path fill="#FF5F00" d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z"></path></svg>
                                </div>
                                <div class="payment-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="pi-american_express" viewBox="0 0 38 24" width="38" height="24"><title id="pi-american_express">American Express</title><path fill="#000" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3Z" opacity=".07"></path><path fill="#006FCF" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32Z"></path><path fill="#FFF" d="M22.012 19.936v-8.421L37 11.528v2.326l-1.732 1.852L37 17.573v2.375h-2.766l-1.47-1.622-1.46 1.628-9.292-.02Z"></path><path fill="#006FCF" d="M23.013 19.012v-6.57h5.572v1.513h-3.768v1.028h3.678v1.488h-3.678v1.01h3.768v1.531h-5.572Z"></path><path fill="#006FCF" d="m28.557 19.012 3.083-3.289-3.083-3.282h2.386l1.884 2.083 1.89-2.082H37v.051l-3.017 3.23L37 18.92v.093h-2.307l-1.917-2.103-1.898 2.104h-2.321Z"></path><path fill="#FFF" d="M22.71 4.04h3.614l1.269 2.881V4.04h4.46l.77 2.159.771-2.159H37v8.421H19l3.71-8.421Z"></path><path fill="#006FCF" d="m23.395 4.955-2.916 6.566h2l.55-1.315h2.98l.55 1.315h2.05l-2.904-6.566h-2.31Zm.25 3.777.875-2.09.873 2.09h-1.748Z"></path><path fill="#006FCF" d="M28.581 11.52V4.953l2.811.01L32.84 9l1.456-4.046H37v6.565l-1.74.016v-4.51l-1.644 4.494h-1.59L30.35 7.01v4.51h-1.768Z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<!-- page-cart -->

<script src="<?= url('/') ?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
    $(document).on("click", ".remove-cart", function(e) {


        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure, you want to Remove this Product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                var product_id = $(this).attr('data-hash');
                var session_id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo url('/'); ?>/api/v1/order/remove-cart',
                    data: {
                        'product_id': product_id,
                        'session_id': session_id
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status == "SUCCESS") {
                            window.location.href = "<?= url('/') ?>/cart";
                        } else {
                            alert(data.message);
                        }

                    }
                });
            }
        });

    });

    $(document).on("click", ".remove-qty", function(e) {

var prod_id = $(this).attr('data-hash');
var cart_id = $(this).attr('id');



$.ajax({
        type: 'POST',
        url: '<?php echo url('/'); ?>/api/v1/order/remove-qty',
        data: {
            'cart_id': cart_id,'prod_id':prod_id
        },
        success: function(data) {
            console.log(data);
            if (data.status == "SUCCESS") {
                window.location.href = "<?php echo url('/'); ?>/cart";

            } else {
                $("#error").show();
                $("#errormessage").text(data.message);
            }

        }
    });

});

$(document).on("click", ".add-qty", function(e) {
var prod_id = $(this).attr('data-hash');
var cart_id = $(this).attr('id');

$.ajax({
        type: 'POST',
        url: '<?php echo url('/'); ?>/api/v1/order/add-qty',
        data: {
            'cart_id': cart_id,'prod_id':prod_id
        },
        success: function(data) {
            console.log(data);
            if (data.status == "SUCCESS") {
                window.location.href = "<?php echo url('/'); ?>/cart";

            } else {
                $("#error").show();
                $("#errormessage").text(data.message);
            }

        }
    });

});
</script>
@endsection
