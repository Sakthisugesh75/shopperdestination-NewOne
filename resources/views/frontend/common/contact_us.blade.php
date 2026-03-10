@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM CONTACT US PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.contact-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.contact-premium-header::before {
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

.tf-page-title.contact-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Map Section */
.map-section {
    position: relative;
}

.map-section iframe {
    filter: grayscale(20%) contrast(1.1);
}

/* Contact Section */
.contact-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
}

/* Contact Layout */
.contact-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    max-width: 1100px;
    margin: 0 auto;
}

/* Info Card */
.contact-info-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 40px;
    position: relative;
    overflow: hidden;
}

.contact-info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.contact-info-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 28px;
}

/* Info Items */
.info-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 24px;
}

.info-item:last-of-type {
    margin-bottom: 32px;
}

.info-item .info-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

.info-item .info-content {
    flex: 1;
}

.info-item .info-label {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 6px;
}

.info-item .info-text {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #1a1a3e;
    line-height: 1.7;
}

.info-item .info-text a {
    color: #667eea;
    text-decoration: none;
}

.info-item .info-text a:hover {
    text-decoration: underline;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 12px;
    padding-top: 24px;
    border-top: 1px solid #f0f2ff;
}

.social-link {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #667eea;
    text-decoration: none;
    font-size: 18px;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    transform: translateY(-3px);
}

/* Form Card */
.contact-form-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 40px;
    position: relative;
    overflow: hidden;
}

.contact-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.contact-form-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.contact-form-card .card-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #888;
    margin-bottom: 28px;
}

/* Form Styles */
.premium-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}

.premium-form .form-group {
    margin-bottom: 16px;
}

.premium-form .form-input,
.premium-form .form-textarea {
    width: 100%;
    padding: 16px 20px;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #1a1a3e;
    transition: all 0.3s ease;
}

.premium-form .form-textarea {
    min-height: 150px;
    resize: vertical;
}

.premium-form .form-input:focus,
.premium-form .form-textarea:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.premium-form .form-input::placeholder,
.premium-form .form-textarea::placeholder {
    color: #aaa;
}

/* Submit Button */
.btn-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
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
}

.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
}

/* Responsive */
@media (max-width: 991.98px) {
    .contact-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.contact-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.contact-premium-header .heading {
        font-size: 32px !important;
    }
    
    .contact-premium-section {
        padding: 40px 0;
    }
    
    .contact-info-card,
    .contact-form-card {
        padding: 28px 24px;
    }
    
    .premium-form .form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title contact-premium-header">
    <div class="container-full">
        <div class="heading text-center">Contact Us</div>
    </div>
</div>
<!-- /page-title -->

<!-- map -->
<div class="map-section w-100">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7830.763148773701!2d77.350326!3d11.084913!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba9078e39146cf7%3A0xfc29dffdf340b72e!2sMe-Exports!5e0!3m2!1sen!2sin!4v1763462106278!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- /map -->

<!-- form -->
<section class="contact-premium-section">
    <div class="container">
        <div class="contact-container">
            <!-- Info Card -->
            <div class="contact-info-card">
                <h2 class="card-title">Visit Our Store</h2>
                
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div class="info-content">
                        <div class="info-label">Address</div>
                        <div class="info-text">
                            24A, RS Puram Palayakadu,<br>
                            North Uthukuli Road,<br>
                            Tiruppur 641607
                        </div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div class="info-content">
                        <div class="info-label">Phone</div>
                        <div class="info-text">
                            <a href="tel:+919500267516">(+91)934 214 2087</a>
                        </div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">📧</div>
                    <div class="info-content">
                        <div class="info-label">Email</div>
                        <div class="info-text">
                            <a href="mailto:Mail id: shopperdestinationcare@gmail.com">Mail id: shopperdestinationcare@gmail.com</a>
                        </div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">🕐</div>
                    <div class="info-content">
                        <div class="info-label">Store Hours</div>
                        <div class="info-text">
                            Monday - Sunday<br>
                            10:00 AM - 9:00 PM
                        </div>
                    </div>
                </div>
                
                <div class="social-links">
                    <a href="https://www.facebook.com/share/1C1LYpQDDq/?mibextid=wwXIfr" class="social-link" title="Facebook">
                        <i class="icon icon-fb"></i>
                    </a>
                    {{-- <a href="#" class="social-link" title="Twitter">
                        <i class="icon icon-Icon-x"></i>
                    </a> --}}
                    <a href="https://www.instagram.com/shopper.destination" class="social-link" title="Instagram">
                        <i class="icon icon-instagram"></i>
                    </a>
                    {{-- <a href="#" class="social-link" title="TikTok">
                        <i class="icon icon-tiktok"></i>
                    </a>
                    <a href="#" class="social-link" title="Pinterest">
                        <i class="icon icon-pinterest-1"></i>
                    </a> --}}
                </div>
            </div>
            
            <!-- Form Card -->
            <div class="contact-form-card">
                <h2 class="card-title">Get in Touch</h2>
                <p class="card-subtitle">Have questions or want to work with us? Drop us a message!</p>
                
                <form class="premium-form" id="contactform" action="./contact/contact-process.php" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" required placeholder="Your Name *">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" required placeholder="Your Email *">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-textarea" name="message" id="message" required placeholder="Your Message *"></textarea>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <span>Send Message</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /form -->

@endsection
