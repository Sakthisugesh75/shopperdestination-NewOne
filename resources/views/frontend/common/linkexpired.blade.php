@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM LINK EXPIRED PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Expired Section */
.expired-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 100px 0;
    min-height: 70vh;
    display: flex;
    align-items: center;
}

/* Expired Card */
.expired-card {
    max-width: 500px;
    margin: 0 auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 60px 48px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.expired-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.expired-card .card-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 28px;
    font-size: 50px;
}

.expired-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 12px;
}

.expired-card .card-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: #888;
    line-height: 1.7;
    margin-bottom: 36px;
}

/* Action Buttons */
.expired-actions {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.btn-shop {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 18px 32px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
}

.btn-shop:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
    color: #fff;
}

.btn-home {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 14px 24px;
    background: transparent;
    color: #667eea;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-home:hover {
    color: #764ba2;
    text-decoration: underline;
}

/* Help Text */
.help-text {
    margin-top: 32px;
    padding-top: 24px;
    border-top: 1px solid #f0f2ff;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #888;
}

.help-text a {
    color: #667eea;
    text-decoration: none;
}

.help-text a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 575.98px) {
    .expired-premium-section {
        padding: 60px 0;
    }
    
    .expired-card {
        padding: 40px 24px;
        margin: 0 15px;
    }
    
    .expired-card .card-icon {
        width: 80px;
        height: 80px;
        font-size: 40px;
    }
    
    .expired-card .card-title {
        font-size: 26px;
    }
}
</style>

<!-- Link Expired Page -->
<section class="expired-premium-section">
    <div class="container">
        <div class="expired-card">
            <div class="card-icon">⏰</div>
            <h1 class="card-title">Link Expired</h1>
            <p class="card-subtitle">
                Oops! The link you tried to access has expired. This usually happens when a reset link or verification link is used after its validity period.
            </p>
            
            <div class="expired-actions">
                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs" class="btn-shop">
                    Continue Shopping
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="<?= url('/') ?>/" class="btn-home">
                    ← Back to Home
                </a>
            </div>
            
            <div class="help-text">
                Need help? <a href="mailto:contact@Shopper Destination.in">Contact Support</a>
            </div>
        </div>
    </div>
</section>
<!-- /Link Expired Page -->

@endsection
