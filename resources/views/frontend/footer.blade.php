<!-- Footer -->
<style>
/* ========================================
   PREMIUM FOOTER STYLES (LIGHT THEME)
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

.premium-footer {
    position: relative;
    background: #ffffff;
    color: #3e322c; /* Brand Dark Brown */
    overflow: hidden;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

/* Floating Shapes */
.footer-shapes {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
}

.footer-shapes .shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    opacity: 0.4;
}

.footer-shapes .shape-1 {
    width: 400px;
    height: 400px;
    background: linear-gradient(135deg, rgba(197, 169, 146, 0.15), rgba(62, 50, 44, 0.05)); /* Gold/Brown tint */
    top: -200px;
    right: -100px;
}

.footer-shapes .shape-2 {
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, rgba(62, 50, 44, 0.05), rgba(197, 169, 146, 0.1));
    bottom: -150px;
    left: -50px;
}

/* Newsletter Section */
.footer-newsletter {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.newsletter-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.75rem;
    font-weight: 600;
    color: #3e322c;
    margin-bottom: 0.5rem;
}

.newsletter-title span {
    background: linear-gradient(135deg, #3e322c, #c5a992); /* Brown to Gold */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.newsletter-desc {
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
    color: #666;
}

.newsletter-form {
    position: relative;
    max-width: 450px;
}

.newsletter-input {
    width: 100%;
    padding: 1rem 1.5rem;
    padding-right: 140px;
    background: #f9f9f9;
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: 60px;
    color: #3e322c;
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.newsletter-input::placeholder {
    color: #888;
}

.newsletter-input:focus {
    outline: none;
    border-color: #c5a992; /* Gold Accent */
    background: #fff;
    box-shadow: 0 0 0 4px rgba(197, 169, 146, 0.2);
}

.newsletter-btn {
    position: absolute;
    right: 6px;
    top: 50%;
    transform: translateY(-50%);
    padding: 0.75rem 1.5rem;
    background: #3e322c; /* Brand Dark Brown */
    border: none;
    border-radius: 50px;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.newsletter-btn:hover {
    transform: translateY(-50%) scale(1.02);
    box-shadow: 0 8px 25px rgba(62, 50, 44, 0.3);
    background: #2a221f;
}

/* Footer Main */
.footer-main {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

/* Brand Column */
.footer-brand .footer-logo {
    display: inline-block;
    margin-bottom: 1.25rem;
}

.footer-brand .footer-logo img {
    height: 45px;
    transition: all 0.3s ease;
}

.footer-brand .footer-logo:hover img {
    transform: scale(1.05);
}

.footer-brand .brand-desc {
    font-family: 'Inter', sans-serif;
    font-size: 0.9rem;
    line-height: 1.7;
    color: #666;
    margin-bottom: 1.5rem;
}

/* Contact List */
.footer-contact-list {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem 0;
}

.footer-contact-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 1rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    color: #555;
}

.footer-contact-list li i {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(62, 50, 44, 0.08); /* Light Brown tint */
    border-radius: 10px;
    color: #3e322c;
    font-size: 1rem;
    flex-shrink: 0;
}

.footer-contact-list li a {
    color: #555;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-contact-list li a:hover {
    color: #3e322c;
}

/* Social Icons */
.footer-social {
    display: flex;
    gap: 10px;
}

.social-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f9f9f9;
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 12px;
    color: #555;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #3e322c;
    border-color: transparent;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(62, 50, 44, 0.2);
}

/* Footer Links */
.footer-widget-title {
    font-family: 'Inter', sans-serif;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #3e322c;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.75rem;
}

.footer-widget-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 2px;
    background: #c5a992;
    border-radius: 2px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.875rem;
}

.footer-links a {
    font-family: 'Inter', sans-serif;
    font-size: 0.9rem;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
}

.footer-links a::before {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 1px;
    background: #c5a992;
    transition: width 0.3s ease;
}

.footer-links a:hover {
    color: #3e322c;
    transform: translateX(5px);
}

.footer-links a:hover::before {
    width: 100%;
}

/* Footer Bottom */
.footer-bottom {
    background: #f9f9f9;
}

.footer-bottom-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.copyright {
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    color: #666;
}

.copyright a {
    color: #3e322c;
    text-decoration: none;
    transition: color 0.3s ease;
}

.copyright a:hover {
    color: #c5a992;
}

.payment-methods {
    display: flex;
    align-items: center;
    gap: 12px;
}

.payment-methods img {
    height: 28px;
    opacity: 0.8;
    transition: opacity 0.3s ease;
    filter: none; /* No inversion for light mode */
}

.payment-methods img:hover {
    opacity: 1;
}

/* Mobile Accordion */
@media (max-width: 767.98px) {
    .footer-widget-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        margin-bottom: 0;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    }
    
    .footer-widget-title::after {
        display: none;
    }
    
    .footer-widget-title .toggle-icon {
        display: block;
        font-size: 0.75rem;
        transition: transform 0.3s ease;
    }
    
    .footer-widget-title.active .toggle-icon {
        transform: rotate(180deg);
    }
    
    .footer-links {
        display: none;
        padding: 1rem 0;
    }
    
    .footer-links.show {
        display: block;
    }
    
    .newsletter-form {
        max-width: 100%;
    }
    
    .newsletter-input {
        padding-right: 1rem;
    }
    
    .newsletter-btn {
        position: relative;
        right: auto;
        top: auto;
        transform: none;
        width: 100%;
        margin-top: 1rem;
        padding: 1rem;
    }
    
    .newsletter-btn:hover {
        transform: none;
    }
}

@media (min-width: 768px) {
    .toggle-icon {
        display: none !important;
    }
}
</style>

<footer id="footer" class="premium-footer">
    <!-- Background Shapes -->
    <div class="footer-shapes d-none d-lg-block">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <!-- Newsletter Section -->
    <div class="footer-newsletter position-relative py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h3 class="newsletter-title">Join Our <span>Newsletter</span></h3>
                    <p class="newsletter-desc mb-lg-0">Subscribe to get special offers, exclusive drops & updates.</p>
                </div>
                <div class="col-lg-6">
                    <form class="newsletter-form ms-lg-auto">
                        <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                        <button type="submit" class="newsletter-btn d-none d-md-block">Subscribe</button>
                        <button type="submit" class="newsletter-btn d-block d-md-none">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <div class="footer-main position-relative py-5">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <!-- Brand Column -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand">
                        <a href="<?= url('/') ?>/" class="logo-wrapper">
                             <img src="<?= url('/') ?>/frontassets/images/logo/E-Logoedit.png" alt="logo" width="50%">
                        </a>
                        <p class="brand-desc">
                            Your premier destination for quality fashion. We believe in quality craftsmanship and designs that stand the test of time.
                        </p>
                        <ul class="footer-contact-list">
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <span>24A, RS Puram Palayakadu, North Uthukuli Road, Tiruppur 641607</span>
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <a href="mailto:shopperdestinationcare@gmail.com">shopperdestinationcare@gmail.com</a>
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <a href="tel:+919500267516">(+91) 950 026 7516</a>
                            </li>
                        </ul>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/share/1C1LYpQDDq/?mibextid=wwXIfr" class="social-link" title="Facebook">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            </a>
                            {{-- <a href="#" class="social-link" title="Twitter">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
                            </a> --}}
                            <a href="https://www.instagram.com/shopper.destination" class="social-link" title="Instagram">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </a>
                            {{-- <a href="#" class="social-link" title="Pinterest">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0a12 12 0 0 0-4.37 23.17c-.1-.94-.2-2.4.04-3.44l1.39-5.89s-.35-.7-.35-1.74c0-1.63.95-2.85 2.13-2.85 1 0 1.49.76 1.49 1.66 0 1.01-.65 2.53-.98 3.94-.28 1.17.59 2.12 1.74 2.12 2.09 0 3.7-2.2 3.7-5.38 0-2.81-2.02-4.78-4.9-4.78-3.34 0-5.3 2.5-5.3 5.09 0 1.01.39 2.09.87 2.68.1.12.11.22.08.34l-.33 1.32c-.05.21-.17.26-.39.16-1.46-.68-2.37-2.82-2.37-4.54 0-3.7 2.69-7.09 7.75-7.09 4.07 0 7.23 2.9 7.23 6.77 0 4.04-2.55 7.29-6.09 7.29-1.19 0-2.31-.62-2.69-1.35l-.73 2.79c-.26 1.01-.97 2.28-1.45 3.05A12 12 0 1 0 12 0z"></path></svg>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-6 col-lg-2 col-md-6">
                    <h6 class="footer-widget-title" onclick="this.classList.toggle('active'); this.nextElementSibling.classList.toggle('show');">
                        Quick Links
                        <span class="toggle-icon">▼</span>
                    </h6>
                    <ul class="footer-links">
                        <li><a href="<?= url('/') ?>/user-product/czoxOiIwIjs">Shop All</a></li>
                        <li><a href="<?= url('/') ?>/about-us">Our Story</a></li>
                        <li><a href="<?= url('/') ?>/contact-us">Contact Us</a></li>
                        <li><a href="<?= url('/') ?>/contact-us">Store Locator</a></li>
                    </ul>
                </div>

                <!-- Help -->
                <div class="col-6 col-lg-2 col-md-6">
                    <h6 class="footer-widget-title" onclick="this.classList.toggle('active'); this.nextElementSibling.classList.toggle('show');">
                        Help
                        <span class="toggle-icon">▼</span>
                    </h6>
                    <ul class="footer-links">
                        <li><a href="<?= url('/') ?>/shipping">Shipping Info</a></li>
                        <li><a href="<?= url('/') ?>/return-policy">Returns & Exchanges</a></li>
                        <li><a href="<?= url('/') ?>/privacy-policy">Privacy Policy</a></li>
                        <li><a href="<?= url('/') ?>/terms-condition">Terms & Conditions</a></li>
                    </ul>
                </div>

                <!-- My Account -->
                <div class="col-6 col-lg-2 col-md-6">
                    <h6 class="footer-widget-title" onclick="this.classList.toggle('active'); this.nextElementSibling.classList.toggle('show');">
                        Account
                        <span class="toggle-icon">▼</span>
                    </h6>
                    <ul class="footer-links">
                        <li><a href="<?= url('/') ?>/user-login">Login</a></li>
                        <li><a href="<?= url('/') ?>/user-register">Register</a></li>
                        <li><a href="<?= url('/') ?>/my-profile">My Account</a></li>
                        <li><a href="<?= url('/') ?>/my-wishlist">Wishlist</a></li>
                    </ul>
                </div>

                <!-- Connect -->
                <div class="col-6 col-lg-2 col-md-6 d-none d-lg-block">
                    <h6 class="footer-widget-title">Connect</h6>
                    <ul class="footer-links">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Pinterest</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom py-4">
        <div class="container">
            <div class="footer-bottom-content">
                <p class="copyright mb-0">
                    © 2025 <a href="<?= url('/') ?>/">Shoppers Destination</a>. All Rights Reserved
                </p>
                <div class="payment-methods">
                    <img src="<?= url('/') ?>/frontassets/images/payments/img.png" alt="Payment Methods">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->

    <style>
.whatsapp-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

.whatsapp-button img {
    width: 40px;
    height: 40px;
}
</style>
<a href="https://wa.me/+919345099157" class="whatsapp-button" target="_blank">
    <img src="<?= url('/') ?>/frontassets/images/logo/WhatsApp.svg" alt="WhatsApp">
</a>
<script>
    $(document).ready(function () {
        $('.whatsapp-button').css('bottom', '70px');
    });
</script>

