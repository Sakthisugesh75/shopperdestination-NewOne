@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM RETURN & REFUND POLICY PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.return-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.return-premium-header::before {
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

.tf-page-title.return-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Return Section */
.return-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
    min-height: 60vh;
}

/* Content Card */
.return-card {
    max-width: 900px;
    margin: 0 auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 48px;
    position: relative;
    overflow: hidden;
}

.return-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.return-card .page-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 16px;
}

.return-card .page-intro {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: #666;
    line-height: 1.7;
    margin-bottom: 40px;
    padding-bottom: 24px;
    border-bottom: 1px solid #f0f2ff;
}

/* Section Styles */
.return-section {
    margin-bottom: 32px;
}

.return-section:last-child {
    margin-bottom: 0;
}

.return-section .section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 12px;
}

.return-section .section-icon {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.return-section .section-content {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #555;
    line-height: 1.8;
    padding-left: 48px;
}

.return-section .section-content ul {
    list-style: none;
    padding: 0;
    margin: 12px 0 0;
}

.return-section .section-content li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 10px;
}

.return-section .section-content li::before {
    content: '✓';
    color: #667eea;
    font-weight: bold;
}

/* Contact Box */
.contact-box {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 16px;
    padding: 28px 32px;
    margin-top: 32px;
    display: flex;
    align-items: center;
    gap: 20px;
}

.contact-box .icon {
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

.contact-box .content {
    color: #fff;
    flex: 1;
}

.contact-box .content strong {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    display: block;
    margin-bottom: 4px;
}

.contact-box .content span {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    opacity: 0.9;
}

.contact-box .email-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #fff;
    color: #667eea;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.contact-box .email-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Responsive */
@media (max-width: 767.98px) {
    .tf-page-title.return-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.return-premium-header .heading {
        font-size: 32px !important;
    }
    
    .return-premium-section {
        padding: 40px 0;
    }
    
    .return-card {
        padding: 28px 24px;
        border-radius: 20px;
    }
    
    .return-section .section-content {
        padding-left: 0;
        margin-top: 8px;
    }
    
    .contact-box {
        flex-direction: column;
        text-align: center;
    }
    
    .contact-box .email-btn {
        margin-top: 12px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title return-premium-header">
    <div class="container-full">
        <div class="heading text-center">Return & Refund Policy</div>
    </div>
</div>
<!-- /page-title -->

<!-- main-page -->
<section class="return-premium-section">
    <div class="container">
        <div class="return-card">
            <h1 class="page-title">Returns & Exchanges</h1>
            <p class="page-intro">
                We want you to love your purchase! If you're not satisfied with your jeans or jeggings, we're here to help make it right.
            </p>
            
            <div class="return-section">
                <h2 class="section-title">
                    <span class="section-icon">↩️</span>
                    Return Policy
                </h2>
                <div class="section-content">
                    <ul>
                        <li>Returns accepted within <strong>7 days</strong> of delivery</li>
                        <li>Items must be unused, unwashed, and in original packaging</li>
                        <li>Refunds are issued after product inspection</li>
                        <li>Refund will be processed to original payment method</li>
                    </ul>
                </div>
            </div>
            
            <div class="return-section">
                <h2 class="section-title">
                    <span class="section-icon">🔄</span>
                    Exchange Policy
                </h2>
                <div class="section-content">
                    <ul>
                        <li>Exchanges allowed for size or color issues within <strong>7 days</strong></li>
                        <li>First exchange shipping is <strong>free</strong> per order</li>
                        <li>Subject to product availability</li>
                    </ul>
                </div>
            </div>
            
            <div class="return-section">
                <h2 class="section-title">
                    <span class="section-icon">📝</span>
                    How to Return/Exchange
                </h2>
                <div class="section-content">
                    <ul>
                        <li>Email us with your order number and reason for return</li>
                        <li>We'll provide the return shipping address and instructions</li>
                        <li>Pack the item securely and ship it back</li>
                        <li>Refund/exchange processed within 5-7 business days</li>
                    </ul>
                </div>
            </div>
            
            <div class="contact-box">
                <div class="icon">📧</div>
                <div class="content">
                    <strong>Need Help with a Return?</strong>
                    <span>Our support team is here to assist you</span>
                </div>
                <a href="mailto:contact@Shopper Destination.in" class="email-btn">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
<!-- /main-page -->

@endsection
