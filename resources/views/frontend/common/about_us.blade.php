@extends('frontend.main')
@section('content')

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* ========================================
   E-COMMERCE ABOUT US PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

:root {
    --primary: #667eea;
    --primary-dark: #764ba2;
    --accent: #f5576c;
    --dark: #1a1a3e;
}

/* Hero Banner */
.ecom-hero {
    position: relative;
    min-height: 55vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    overflow: hidden;
}

.ecom-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url('<?= url('/') ?>/frontassets/images/collections/collection-69.jpg') center/cover;
    opacity: 0.2;
}

.ecom-hero .hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(12, 12, 30, 0.95) 0%, rgba(12, 12, 30, 0.7) 50%, rgba(12, 12, 30, 0.4) 100%);
}

.ecom-hero .hero-content {
    position: relative;
    z-index: 2;
}

.ecom-hero .brand-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 20px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
    border: 1px solid rgba(102, 126, 234, 0.3);
    border-radius: 50px;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #fff;
    margin-bottom: 1.5rem;
}

.ecom-hero .hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 600;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 1.25rem;
}

.ecom-hero .hero-title span {
    background: linear-gradient(135deg, #667eea, #f5576c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.ecom-hero .hero-desc {
    font-family: 'Inter', sans-serif;
    font-size: 1.05rem;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.75);
    margin-bottom: 2rem;
    max-width: 500px;
}

.ecom-hero .hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 14px 32px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.ecom-hero .hero-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    color: #fff;
}

/* Stats Section */
.ecom-stats {
    background: #fff;
    margin-top: -60px;
    position: relative;
    z-index: 10;
}

.stats-card {
    background: #fff;
    border-radius: 20px;
    padding: 2.5rem 2rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
}

.stat-item {
    text-align: center;
    padding: 1rem;
}

.stat-item .stat-number {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-item .stat-label {
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    font-weight: 500;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Brand Story */
.ecom-story {
    background: linear-gradient(180deg, #fff 0%, #fafbff 100%);
}

.story-img-container {
    position: relative;
}

.story-img-main {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.12);
}

.story-img-main img {
    width: 100%;
    height: auto;
}

.story-img-floating {
    position: absolute;
    bottom: -30px;
    right: -30px;
    width: 50%;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    border: 4px solid #fff;
}

.story-img-floating img {
    width: 100%;
    height: auto;
}

.story-content .section-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--primary);
    margin-bottom: 1rem;
}

.story-content .section-badge::before {
    content: '';
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary), var(--primary-dark));
}

.story-content .section-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.5rem, 3vw, 2.25rem);
    font-weight: 600;
    color: var(--dark);
    line-height: 1.3;
    margin-bottom: 1.25rem;
}

.story-content .section-text {
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    line-height: 1.8;
    color: #666;
}

.story-content .feature-list {
    list-style: none;
    padding: 0;
    margin: 1.5rem 0 0 0;
}

.story-content .feature-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
    color: #444;
    margin-bottom: 0.75rem;
}

.story-content .feature-list li i {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
    border-radius: 50%;
    color: var(--primary);
    font-size: 10px;
}

/* Why Shop Section */
.ecom-features {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    position: relative;
    overflow: hidden;
}

.ecom-features .section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.ecom-features .section-badge {
    display: inline-block;
    padding: 8px 20px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 50px;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 1rem;
}

.ecom-features .section-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.5rem, 3vw, 2.25rem);
    font-weight: 600;
    color: #fff;
}

.feature-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    height: 100%;
    transition: all 0.4s ease;
}

.feature-card:hover {
    background: rgba(255, 255, 255, 0.06);
    border-color: rgba(102, 126, 234, 0.3);
    transform: translateY(-8px);
}

.feature-card .feature-icon {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
    border-radius: 20px;
    margin: 0 auto 1.25rem auto;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.feature-card .feature-icon i {
    font-size: 26px;
    color: #667eea;
    transition: color 0.3s ease;
}

.feature-card:hover .feature-icon i {
    color: #fff;
}

.feature-card .feature-title {
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 0.5rem;
}

.feature-card .feature-desc {
    font-family: 'Inter', sans-serif;
    font-size: 0.85rem;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 0;
}

/* Testimonials */
.ecom-testimonials {
    background: linear-gradient(180deg, #fafbff 0%, #fff 100%);
}

.ecom-testimonials .section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.ecom-testimonials .section-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--primary);
    margin-bottom: 1rem;
}

.ecom-testimonials .section-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.5rem, 3vw, 2.25rem);
    font-weight: 600;
    color: var(--dark);
}

.testimonial-card {
    background: #fff;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
    height: 100%;
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
}

.testimonial-card .stars {
    color: #ffc107;
    font-size: 14px;
    margin-bottom: 1rem;
}

.testimonial-card .testimonial-text {
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
    line-height: 1.7;
    color: #555;
    font-style: italic;
    margin-bottom: 1.5rem;
}

.testimonial-card .customer-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.testimonial-card .customer-avatar {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    font-weight: 600;
}

.testimonial-card .customer-name {
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 2px;
}

.testimonial-card .customer-location {
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    color: #888;
}

/* CTA Banner */
.ecom-cta {
    position: relative;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    overflow: hidden;
}

.ecom-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.ecom-cta .cta-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.ecom-cta .cta-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.5rem, 3vw, 2.25rem);
    font-weight: 600;
    color: #fff;
    margin-bottom: 0.75rem;
}

.ecom-cta .cta-desc {
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 1.5rem;
}

.ecom-cta .cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 14px 32px;
    background: #fff;
    color: var(--dark);
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.ecom-cta .cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}
</style>

<!-- Hero Section -->
<section class="ecom-hero py-5">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-content py-5">
                    <span class="brand-badge wow fadeInDown" data-wow-delay="0s">
                        <i class="fas fa-store"></i> Est. 2020
                    </span>
                    <h1 class="hero-title wow fadeInUp" data-wow-delay="0.1s">
                        Welcome to <span>Shopper destination</span>
                    </h1>
                    <p class="hero-desc wow fadeInUp" data-wow-delay="0.2s">
                        Your premium destination for stylish, high-quality fashion wear. We combine fashion-forward designs with unbeatable comfort to empower every woman's unique style.
                    </p>
                    <a href="<?= url('/') ?>/user-product/czoxOiIwIjs" class="hero-btn wow fadeInUp" data-wow-delay="0.3s">
                        <span>Explore Collection</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="ecom-stats">
    <div class="container">
        <div class="stats-card wow fadeInUp" data-wow-delay="0s">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Products</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Cities Served</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">4.9</div>
                        <div class="stat-label">Customer Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brand Story -->
<section class="ecom-story py-5 py-lg-6">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="story-img-container wow fadeInLeft" data-wow-delay="0s">
                    <div class="story-img-main">
                        <img class="lazyload" 
                             data-src="<?= url('/') ?>/frontassets/images/collections/collection-69.jpg" 
                             src="<?= url('/') ?>/frontassets/images/collections/collection-69.jpg" 
                             alt="Our Story">
                    </div>
                    <div class="story-img-floating d-none d-md-block">
                        <img class="lazyload" 
                             data-src="<?= url('/') ?>/frontassets/images/collections/collection-71.jpg" 
                             src="<?= url('/') ?>/frontassets/images/collections/collection-71.jpg" 
                             alt="Our Products">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="story-content ps-lg-4 wow fadeInRight" data-wow-delay="0.2s">
                    <span class="section-badge">Our Story</span>
                    <h2 class="section-title">Everyday essentials, elevated</h2>
                    <p class="section-text">
                        Shoppers Destination is more than just a fashion brand — it's a celebration of style, comfort, and confidence. Founded with a passion for fashion, we're dedicated to offering high-quality pieces that complement every woman's unique personality.
                    </p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Premium quality fashion fabrics</li>
                        <li><i class="fas fa-check"></i> Perfect fit for every body type</li>
                        <li><i class="fas fa-check"></i> Latest fashion-forward designs</li>
                        <li><i class="fas fa-check"></i> Affordable luxury pricing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Shop Features -->
<section class="ecom-features py-5 py-lg-6">
    <div class="container">
        <div class="section-header wow fadeInUp" data-wow-delay="0s">
            <span class="section-badge">Why Choose Us</span>
            <h2 class="section-title">The Shopper Destination  Advantage</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-6 col-lg-3">
                <div class="feature-card wow fadeInUp" data-wow-delay="0s">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="feature-title">Free Shipping</h3>
                    <p class="feature-desc">Free delivery on orders above ₹999</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="feature-card wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-icon">
                        <i class="fas fa-undo-alt"></i>
                    </div>
                    <h3 class="feature-title">Easy Returns</h3>
                    <p class="feature-desc">7-day hassle-free return policy</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="feature-card wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Secure Payment</h3>
                    <p class="feature-desc">100% secure payment gateway</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="feature-card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="feature-title">24/7 Support</h3>
                    <p class="feature-desc">Dedicated customer support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="ecom-testimonials py-5 py-lg-6">
    <div class="container">
        <div class="section-header wow fadeInUp" data-wow-delay="0s">
            <span class="section-badge">Testimonials</span>
            <h2 class="section-title">What Our Customers Say</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card wow fadeInUp" data-wow-delay="0s">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Amazing quality jeans! The fit is perfect and the fabric is so comfortable. Will definitely order again!"</p>
                    <div class="customer-info">
                        <div class="customer-avatar">P</div>
                        <div>
                            <div class="customer-name">Priya S.</div>
                            <div class="customer-location">Chennai</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card wow fadeInUp" data-wow-delay="0.1s">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Fast delivery and excellent customer service. The jeggings are super stretchy and look great!"</p>
                    <div class="customer-info">
                        <div class="customer-avatar">A</div>
                        <div>
                            <div class="customer-name">Anjali M.</div>
                            <div class="customer-location">Mumbai</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card wow fadeInUp" data-wow-delay="0.2s">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Best fashion brand I've found online. Great prices for such premium quality. Highly recommend!"</p>
                    <div class="customer-info">
                        <div class="customer-avatar">R</div>
                        <div>
                            <div class="customer-name">Ritu K.</div>
                            <div class="customer-location">Delhi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="ecom-cta py-5">
    <div class="container">
        <div class="cta-content wow fadeInUp" data-wow-delay="0s">
            <h2 class="cta-title">Ready to Upgrade Your Wardrobe?</h2>
            <p class="cta-desc">Discover the perfect fashion that fits your style and budget</p>
            <a href="<?= url('/') ?>/user-product/czoxOiIwIjs" class="cta-btn">
                <span>Shop Now</span>
                <i class="fas fa-shopping-bag"></i>
            </a>
        </div>
    </div>
</section>

@endsection
