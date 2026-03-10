@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM FAQ PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.faq-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.faq-premium-header::before {
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

.tf-page-title.faq-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* FAQ Section */
.faq-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
    min-height: 70vh;
}

/* FAQ Layout */
.faq-container {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 48px;
    max-width: 1100px;
    margin: 0 auto;
}

/* Sidebar Navigation */
.faq-sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.faq-nav {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.faq-nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 18px 24px;
    color: #1a1a3e;
    text-decoration: none;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 500;
    border-bottom: 1px solid #f0f2ff;
    transition: all 0.3s ease;
}

.faq-nav-item:last-child {
    border-bottom: none;
}

.faq-nav-item:hover,
.faq-nav-item.active {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
}

.faq-nav-item .nav-icon {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    transition: all 0.3s ease;
}

.faq-nav-item:hover .nav-icon,
.faq-nav-item.active .nav-icon {
    background: rgba(255, 255, 255, 0.2);
}

/* FAQ Content */
.faq-content {
    max-width: 750px;
}

/* Category Section */
.faq-category {
    margin-bottom: 48px;
}

.faq-category:last-child {
    margin-bottom: 0;
}

.category-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid #f0f2ff;
}

/* Accordion Item */
.faq-item {
    background: #fff;
    border-radius: 16px;
    margin-bottom: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-item:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

.faq-question {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.faq-question:hover {
    background: #fafbff;
}

.faq-question h3 {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
    margin: 0;
    flex: 1;
    padding-right: 16px;
}

.faq-question .toggle-icon {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.faq-item.active .faq-question .toggle-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    transform: rotate(180deg);
}

.faq-answer {
    display: none;
    padding: 0 24px 24px;
}

.faq-item.active .faq-answer {
    display: block;
}

.faq-answer p {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
    line-height: 1.8;
    margin: 0;
}

/* Contact CTA */
.contact-cta {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 32px;
    text-align: center;
    margin-top: 48px;
}

.contact-cta h3 {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 12px;
}

.contact-cta p {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 24px;
}

.contact-cta .btn-contact {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 28px;
    background: #fff;
    color: #667eea;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.contact-cta .btn-contact:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

/* Responsive */
@media (max-width: 991.98px) {
    .faq-container {
        grid-template-columns: 1fr;
    }
    
    .faq-sidebar {
        position: static;
    }
    
    .faq-nav {
        display: flex;
        overflow-x: auto;
        border-radius: 16px;
    }
    
    .faq-nav-item {
        flex-shrink: 0;
        border-bottom: none;
        border-right: 1px solid #f0f2ff;
    }
    
    .faq-nav-item:last-child {
        border-right: none;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.faq-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.faq-premium-header .heading {
        font-size: 32px !important;
    }
    
    .faq-premium-section {
        padding: 40px 0;
    }
    
    .category-title {
        font-size: 24px;
    }
    
    .faq-question h3 {
        font-size: 15px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title faq-premium-header">
    <div class="container-full">
        <div class="heading text-center">Frequently Asked Questions</div>
    </div>
</div>
<!-- /page-title -->

<!-- FAQ -->
<section class="faq-premium-section">
    <div class="container">
        <div class="faq-container">
            <!-- Sidebar -->
            <div class="faq-sidebar">
                <nav class="faq-nav">
                    <a href="#shopping-information" class="faq-nav-item active">
                        <span class="nav-icon">🛒</span>
                        Shopping Info
                    </a>
                    <a href="#payment-information" class="faq-nav-item">
                        <span class="nav-icon">💳</span>
                        Payment Info
                    </a>
                    <a href="#order-returns" class="faq-nav-item">
                        <span class="nav-icon">↩️</span>
                        Order Returns
                    </a>
                    <a href="<?=url('/')?>/contact" class="faq-nav-item">
                        <span class="nav-icon">📧</span>
                        Contact Us
                    </a>
                </nav>
            </div>
            
            <!-- Content -->
            <div class="faq-content">
                <!-- Shopping Information -->
                <div class="faq-category" id="shopping-information">
                    <h2 class="category-title">Shopping Information</h2>
                    
                    <div class="faq-item active">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>How do I place an order on shoppers Destination</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Simply browse our collection, select your preferred items, add them to your cart, and proceed to checkout. You can create an account or checkout as a guest. Follow the steps to enter your shipping details and complete the payment.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>How much is shipping and how long will it take?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Shipping is free for orders above ₹999. For orders below ₹999, a flat shipping fee of ₹49 applies. Delivery typically takes 3-7 business days depending on your location. Remote areas may take 2-3 additional days.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>How can I track my order?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Once your order is shipped, you will receive a tracking link via SMS and email. You can use this link to track your package in real-time. You can also log in to your account and check the order status there.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>Can I modify or cancel my order?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>You can modify or cancel your order within 24 hours of placing it by contacting our customer support. Once the order is shipped, modifications are not possible, but you can initiate a return after receiving the product.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Information -->
                <div class="faq-category" id="payment-information">
                    <h2 class="category-title">Payment Information</h2>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>What payment methods do you accept?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>We accept all major payment methods including Credit Cards, Debit Cards, UPI, Net Banking, and popular wallets like Paytm and PhonePe. All payments are securely processed through Razorpay.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>Is my payment information secure?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Absolutely! All payments are processed through Razorpay's secure payment gateway with SSL encryption. We never store your card details on our servers. Your financial information is completely safe.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>Do you offer Cash on Delivery (COD)?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Currently, we only accept prepaid orders to ensure faster processing and delivery. We recommend using UPI or cards for a seamless checkout experience.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>My payment failed. What should I do?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>If your payment failed but money was deducted, it will be automatically refunded within 5-7 business days. If the issue persists, please contact our support team with your order details.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Order Returns -->
                <div class="faq-category" id="order-returns">
                    <h2 class="category-title">Order Returns</h2>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>What is your return policy?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>We accept returns within 7 days of delivery. Items must be unused, unwashed, and in their original packaging. Refunds are processed after product inspection and credited to your original payment method.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>How do I initiate a return or exchange?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Email us at contact@Shopper Destination.in with your order number and reason for return. Our team will provide you with the return shipping address and instructions within 24 hours.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>How long does it take to process a refund?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Once we receive and inspect your returned item, refunds are processed within 5-7 business days. The amount will be credited to your original payment method.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>Can I exchange for a different size?</h3>
                            <span class="toggle-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Yes! Exchanges are allowed for size or color issues within 7 days of delivery. The first exchange shipping is free per order. Subsequent exchanges may incur shipping charges.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Contact CTA -->
                <div class="contact-cta">
                    <h3>Still Have Questions?</h3>
                    <p>Our support team is here to help you 24/7</p>
                    <a href="mailto:contact@Shopper Destination.in" class="btn-contact">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /FAQ -->

<script>
function toggleFaq(element) {
    const faqItem = element.parentElement;
    const allItems = document.querySelectorAll('.faq-item');
    
    // Close others in same category
    const category = faqItem.closest('.faq-category');
    category.querySelectorAll('.faq-item').forEach(item => {
        if (item !== faqItem) {
            item.classList.remove('active');
        }
    });
    
    // Toggle current
    faqItem.classList.toggle('active');
}

// Smooth scroll to sections
document.querySelectorAll('.faq-nav-item').forEach(link => {
    link.addEventListener('click', function(e) {
        if (this.getAttribute('href').startsWith('#')) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            
            // Update active state
            document.querySelectorAll('.faq-nav-item').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    });
});
</script>

@endsection
