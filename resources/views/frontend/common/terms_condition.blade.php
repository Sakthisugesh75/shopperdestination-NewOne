@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM TERMS & CONDITIONS PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.terms-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.terms-premium-header::before {
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

.tf-page-title.terms-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Terms Section */
.terms-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
    min-height: 60vh;
}

/* Content Card */
.terms-card {
    max-width: 900px;
    margin: 0 auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 48px;
    position: relative;
    overflow: hidden;
}

.terms-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.terms-card .page-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 16px;
}

.terms-card .page-intro {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: #666;
    line-height: 1.7;
    margin-bottom: 40px;
    padding-bottom: 24px;
    border-bottom: 1px solid #f0f2ff;
}

/* Section Styles */
.terms-section {
    margin-bottom: 32px;
}

.terms-section:last-child {
    margin-bottom: 0;
}

.terms-section .section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 12px;
}

.terms-section .section-icon {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.terms-section .section-content {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #555;
    line-height: 1.8;
    padding-left: 48px;
}

/* Responsive */
@media (max-width: 767.98px) {
    .tf-page-title.terms-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.terms-premium-header .heading {
        font-size: 32px !important;
    }
    
    .terms-premium-section {
        padding: 40px 0;
    }
    
    .terms-card {
        padding: 28px 24px;
        border-radius: 20px;
    }
    
    .terms-section .section-content {
        padding-left: 0;
        margin-top: 8px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title terms-premium-header">
    <div class="container-full">
        <div class="heading text-center">Terms & Conditions</div>
    </div>
</div>
<!-- /page-title -->

<!-- main-page -->
<section class="terms-premium-section">
    <div class="container">
        <div class="terms-card">
            <h1 class="page-title">Terms and Conditions</h1>
            <p class="page-intro">
                Welcome to Shoppers Destination! By using our website and purchasing products, you agree to the following terms and conditions. Please read them carefully.
            </p>
            
            <div class="terms-section">
                <h2 class="section-title">
                    <span class="section-icon">💳</span>
                    Orders & Payments
                </h2>
                <div class="section-content">
                    All prices are listed in INR and include applicable taxes. Orders are confirmed only after successful payment processing. We reserve the right to cancel orders if payment cannot be verified.
                </div>
            </div>
            
            <div class="terms-section">
                <h2 class="section-title">
                    <span class="section-icon">📦</span>
                    Product Information
                </h2>
                <div class="section-content">
                    We aim for 100% accuracy in our product descriptions. However, please note that colors may slightly vary due to lighting conditions during photography or variations in screen settings.
                </div>
            </div>
            
            <div class="terms-section">
                <h2 class="section-title">
                    <span class="section-icon">©️</span>
                    Intellectual Property
                </h2>
                <div class="section-content">
                    All content, images, logos, and branding materials on this website are owned by shoppers destination and are protected by intellectual property laws. They may not be used, reproduced, or distributed without prior written permission.
                </div>
            </div>
            
            <div class="terms-section">
                <h2 class="section-title">
                    <span class="section-icon">⚖️</span>
                    Limitation of Liability
                </h2>
                <div class="section-content">
                    shoppers Destination shall not be held liable for any indirect, incidental, or consequential damages arising from the use of our products or services. Our liability is limited to the amount paid for the specific product in question.
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /main-page -->

@endsection
