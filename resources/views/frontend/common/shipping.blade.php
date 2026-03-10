@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM SHIPPING & DELIVERY PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.shipping-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.shipping-premium-header::before {
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

.tf-page-title.shipping-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Shipping Section */
.shipping-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
    min-height: 60vh;
}

/* Content Card */
.shipping-card {
    max-width: 900px;
    margin: 0 auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 48px;
    position: relative;
    overflow: hidden;
}

.shipping-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.shipping-card .page-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 16px;
}

.shipping-card .page-intro {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: #666;
    line-height: 1.7;
    margin-bottom: 40px;
    padding-bottom: 24px;
    border-bottom: 1px solid #f0f2ff;
}

/* Section Styles */
.shipping-section {
    margin-bottom: 32px;
}

.shipping-section:last-child {
    margin-bottom: 0;
}

.shipping-section .section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 12px;
}

.shipping-section .section-icon {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.shipping-section .section-content {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #555;
    line-height: 1.8;
    padding-left: 48px;
}

.shipping-section .section-content ul {
    list-style: none;
    padding: 0;
    margin: 12px 0 0;
}

.shipping-section .section-content li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 10px;
}

.shipping-section .section-content li::before {
    content: '✓';
    color: #667eea;
    font-weight: bold;
}

/* Highlight Box */
.highlight-box {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 16px;
    padding: 24px 28px;
    margin-top: 32px;
    display: flex;
    align-items: center;
    gap: 20px;
}

.highlight-box .icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.highlight-box .content {
    color: #fff;
}

.highlight-box .content strong {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    display: block;
    margin-bottom: 4px;
}

.highlight-box .content span {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    opacity: 0.9;
}

/* Responsive */
@media (max-width: 767.98px) {
    .tf-page-title.shipping-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.shipping-premium-header .heading {
        font-size: 32px !important;
    }
    
    .shipping-premium-section {
        padding: 40px 0;
    }
    
    .shipping-card {
        padding: 28px 24px;
        border-radius: 20px;
    }
    
    .shipping-section .section-content {
        padding-left: 0;
        margin-top: 8px;
    }
    
    .highlight-box {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title shipping-premium-header">
    <div class="container-full">
        <div class="heading text-center">Shipping & Delivery</div>
    </div>
</div>
<!-- /page-title -->

<!-- main-page -->
<section class="shipping-premium-section">
    <div class="container">
        <div class="shipping-card">
            <h1 class="page-title">Shipping Policy</h1>
            <p class="page-intro">
                We deliver across India through trusted courier partners to ensure your order reaches you safely and on time.
            </p>
            
            <div class="shipping-section">
                <h2 class="section-title">
                    <span class="section-icon">⏱️</span>
                    Shipping Time
                </h2>
                <div class="section-content">
                    <ul>
                        <li>Orders are processed within 24-48 hours</li>
                        <li>Delivery time: 3-7 business days, depending on location</li>
                        <li>Remote areas may take 2-3 additional days</li>
                    </ul>
                </div>
            </div>
            
            <div class="shipping-section">
                <h2 class="section-title">
                    <span class="section-icon">💰</span>
                    Shipping Charges
                </h2>
                <div class="section-content">
                    <ul>
                        <li><strong>Free shipping</strong> on orders above ₹999</li>
                        <li>A flat fee of <strong>₹49</strong> for orders below ₹999</li>
                        <li>No hidden charges at checkout</li>
                    </ul>
                </div>
            </div>
            
            <div class="shipping-section">
                <h2 class="section-title">
                    <span class="section-icon">📍</span>
                    Order Tracking
                </h2>
                <div class="section-content">
                    Once your order is shipped, you will receive a tracking link via SMS and email. You can use this link to track your package in real-time until it arrives at your doorstep.
                </div>
            </div>
            
            <div class="highlight-box">
                <div class="icon">🚚</div>
                <div class="content">
                    <strong>Free Shipping on Orders Above ₹999!</strong>
                    <span>Shop now and enjoy complimentary delivery across India</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /main-page -->

@endsection
