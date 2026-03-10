@extends('frontend.main')
@section('content')

@include('frontend.banner')

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* ========================================
   PREMIUM INDEX PAGE - MOBILE OPTIMIZED
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

:root {
    --primary: #667eea;
    --primary-dark: #764ba2;
    --accent: #f5576c;
    --dark: #1a1a3e;
    --dark-bg: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    --light-bg: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
}

/* Section Base */
.section-premium {
    position: relative;
    overflow: hidden;
}

.section-premium.bg-dark-gradient {
    background: var(--dark-bg);
}

.section-premium.bg-light-gradient {
    background: var(--light-bg);
}

/* Floating Shapes */
.floating-shapes {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
}

.floating-shapes .shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.4;
}

.floating-shapes .shape-1 {
    width: 400px;
    height: 400px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.3), rgba(118, 75, 162, 0.3));
    top: -150px;
    right: -150px;
}

.floating-shapes .shape-2 {
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, rgba(245, 87, 108, 0.2), rgba(240, 147, 251, 0.2));
    bottom: -100px;
    left: -100px;
}

/* Section Header */
.section-header-premium {
    text-align: center;
}

.section-header-premium .badge-label {
    display: inline-block;
    padding: 8px 20px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    border-radius: 50px;
    margin-bottom: 1rem;
}

.bg-light-gradient .section-header-premium .badge-label {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
    color: var(--primary);
    border: 1px solid rgba(102, 126, 234, 0.2);
}

.bg-dark-gradient .section-header-premium .badge-label {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.section-header-premium .section-title {
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    letter-spacing: -0.5px;
    line-height: 1.2;
}

.bg-light-gradient .section-header-premium .section-title {
    color: var(--dark);
}

.bg-dark-gradient .section-header-premium .section-title {
    color: #fff;
}

.section-header-premium .section-desc {
    font-family: 'Inter', sans-serif;
    font-weight: 400;
    line-height: 1.7;
}

.bg-light-gradient .section-header-premium .section-desc {
    color: #666;
}

.bg-dark-gradient .section-header-premium .section-desc {
    color: rgba(255, 255, 255, 0.6);
}

/* Category Card */
.category-card-premium {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.5s ease;
}

.category-card-premium:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 60px rgba(102, 126, 234, 0.2);
}

.category-card-premium .card-img-wrapper {
    position: relative;
    overflow: hidden;
}

.category-card-premium .card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.category-card-premium:hover .card-img-wrapper img {
    transform: scale(1.1);
}

.category-card-premium .card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 50%, rgba(26, 26, 62, 0.85) 100%);
}

.category-card-premium .card-body-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 2;
}

.category-card-premium .category-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    background: rgba(255, 255, 255, 0.95);
    color: var(--dark);
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.category-card-premium .category-link:hover {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
}

/* Product Card */
.product-card-premium {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    transition: all 0.4s ease;
}

.product-card-premium:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
}

.product-card-premium .product-img-wrapper {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
}

.product-card-premium .product-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.product-card-premium:hover .product-img-wrapper img {
    transform: scale(1.08);
}

.product-card-premium .product-actions {
    position: absolute;
    top: 12px;
    right: 12px;
    opacity: 0;
    transform: translateX(15px);
    transition: all 0.3s ease;
}

.product-card-premium:hover .product-actions {
    opacity: 1;
    transform: translateX(0);
}

.product-card-premium .action-btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 50%;
    color: var(--dark);
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.product-card-premium .action-btn:hover {
    background: var(--accent);
    color: #fff;
    transform: scale(1.1);
}

.product-card-premium .quick-add-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 12px;
    background: linear-gradient(180deg, transparent, rgba(26, 26, 62, 0.9));
    opacity: 0;
    transform: translateY(100%);
    transition: all 0.4s ease;
}

.product-card-premium:hover .quick-add-overlay {
    opacity: 1;
    transform: translateY(0);
}

.product-card-premium .quick-add-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 12px;
    background: #fff;
    color: var(--dark);
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.product-card-premium .quick-add-btn:hover {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
}

.product-card-premium .product-info {
    padding: 16px;
}

.product-card-premium .product-name {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: var(--dark);
    text-decoration: none;
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: color 0.3s ease;
}

.product-card-premium .product-name:hover {
    color: var(--primary);
}

.product-card-premium .product-price {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    font-weight: 600;
    color: var(--dark);
}

/* Story Section */
.story-img-wrapper {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.12);
}

.story-img-wrapper img {
    width: 100%;
    height: auto;
    display: block;
}

.story-content .story-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--primary);
}

.story-content .story-badge::before {
    content: '';
    width: 30px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary), var(--primary-dark));
}

.story-content .story-title {
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    line-height: 1.2;
    color: var(--dark);
}

.story-content .story-title span {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.story-content .story-text {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    line-height: 1.8;
    color: #666;
}

.story-content .story-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 32px;
    background: var(--dark-bg);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(26, 26, 62, 0.3);
}

.story-content .story-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(26, 26, 62, 0.4);
}

/* Video Card */
.video-card-premium {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25);
    transition: all 0.4s ease;
}

.video-card-premium:hover {
    transform: scale(1.03);
    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35);
}

.video-card-premium video {
    width: 100%;
    object-fit: cover;
    display: block;
}

.video-card-premium::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 60%, rgba(0, 0, 0, 0.4) 100%);
    pointer-events: none;
}

/* Feature Card */
.feature-card-premium {
    padding: 28px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
    transition: all 0.4s ease;
    height: 100%;
}

.feature-card-premium:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 50px rgba(102, 126, 234, 0.12);
}

.feature-card-premium .feature-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
    border-radius: 16px;
    transition: all 0.3s ease;
}

.feature-card-premium .feature-icon i {
    font-size: 26px;
    color: var(--primary);
}

.feature-card-premium:hover .feature-icon {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
}

.feature-card-premium:hover .feature-icon i {
    color: #fff;
}

.feature-card-premium .feature-title {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: var(--dark);
}

.feature-card-premium .feature-desc {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #888;
    line-height: 1.6;
}

/* Swiper Navigation */
.nav-btn-premium {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    color: var(--dark);
    transition: all 0.3s ease;
    z-index: 10;
}

.nav-btn-premium:hover {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    transform: scale(1.1);
}

.bg-dark-gradient .nav-btn-premium {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
}

.bg-dark-gradient .nav-btn-premium:hover {
    background: rgba(255, 255, 255, 0.2);
}

.badge-bestseller {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 5;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    border-radius: 30px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.badge-bestseller i {
    font-size: 10px;
}

/* Responsive Utilities */
@media (max-width: 575.98px) {
    .section-header-premium .section-title {
        font-size: 1.75rem !important;
    }
    .section-header-premium .section-desc {
        font-size: 0.9rem !important;
    }
    .category-card-premium .category-link {
        padding: 10px 18px;
        font-size: 13px;
    }
    .story-content .story-title {
        font-size: 1.75rem !important;
    }
    .story-content .story-btn {
        padding: 14px 24px;
        font-size: 13px;
    }
    
    /* Larger Product Cards on Mobile */
    .product-card-premium .product-img-wrapper {
        height: 220px !important;
    }
    
    .product-card-premium .product-info {
        padding: 12px;
    }
    
    .product-card-premium .product-name {
        font-size: 13px;
        line-height: 1.3;
        white-space: normal;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .product-card-premium .product-price {
        font-size: 16px;
    }
    
    .badge-bestseller {
        font-size: 9px;
        padding: 5px 10px;
    }
    
    /* Larger Category Cards on Mobile */
    .category-card-premium .card-img-wrapper {
        height: 200px !important;
    }
}
</style>

<!-- ========================================
     CATEGORIES SECTION
     ======================================== -->
<section class="section-premium bg-light-gradient py-5 py-lg-6">
    <div class="floating-shapes d-none d-lg-block">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="section-header-premium mb-4 mb-lg-5 wow fadeInUp" data-wow-delay="0s">
            <span class="badge-label">Explore</span>
            <h2 class="section-title fs-2 fs-md-1 mb-3">Categories You'll Love</h2>
            <p class="section-desc fs-6 mx-auto px-3 px-md-0" style="max-width: 550px;">
                Discover our expertly curated collection of premium fashion categories
            </p>
        </div>

        <!-- Categories Swiper -->
        <div class="hover-sw-nav position-relative px-2 px-lg-4">
            <div dir="ltr" class="swiper tf-sw-collection" 
                 data-preview="4" 
                 data-tablet="2" 
                 data-mobile="2" 
                 data-space-lg="24" 
                 data-space-md="16" 
                 data-space="12" 
                 data-loop="false" 
                 data-auto-play="false">
                
                <div class="swiper-wrapper">
                    <?php if(!empty($categoryCnt)): ?>
                        <?php foreach ($categoryCnt as $key => $item): ?>
                            <div class="swiper-slide">
                                <div class="category-card-premium wow fadeInUp" data-wow-delay="<?= ($key * 0.1) ?>s">
                                    <div class="card-img-wrapper" style="height: 280px; height: clamp(220px, 40vw, 380px);">
                                        <?php if($item->categoryimage == null): ?>
                                            <img class="lazyload" 
                                                 data-src="<?= url('/') ?>/frontassets/images/collections/collection-42.jpg" 
                                                 src="<?= url('/') ?>/frontassets/images/collections/collection-42.jpg" 
                                                 alt="<?= $item->category_name ?>">
                                        <?php else: ?>
                                            <img class="lazyload" 
                                                 data-src="<?= url('/') ?>/<?= $item->categoryimage ?>" 
                                                 src="<?= url('/') ?>/<?= $item->categoryimage ?>" 
                                                 alt="<?= $item->category_name ?>">
                                        <?php endif; ?>
                                        <div class="card-overlay"></div>
                                    </div>
                                    <div class="card-body-overlay p-3 p-md-4">
                                        <a href="<?= url('/') ?>/user-product/<?= $item->cat_name ?>" class="category-link">
                                            <span><?= $item->category_name ?></span>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Navigation -->
            <div class="nav-sw nav-next-slider nav-btn-premium position-absolute top-50 start-0 translate-middle-y d-none d-lg-flex" style="left: -24px !important;">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="nav-sw nav-prev-slider nav-btn-premium position-absolute top-50 end-0 translate-middle-y d-none d-lg-flex" style="right: -24px !important;">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="sw-dots style-2 sw-pagination-collection d-flex justify-content-center mt-4"></div>
        </div>
    </div>
</section>

<!-- ========================================
     OUR STORY SECTION
     ======================================== -->
<section class="section-premium bg-white py-5 py-lg-6">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Image -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="story-img-wrapper wow fadeInLeft" data-wow-delay="0s">
                    <img class="lazyload" 
                         data-src="<?= url('/') ?>/frontassets/images/collections/collection-71.jpg" 
                         src="<?= url('/') ?>/frontassets/images/collections/collection-71.jpg" 
                         alt="Our Story">
                </div>
            </div>
            
            <!-- Content -->
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="story-content ps-lg-4 wow fadeInRight" data-wow-delay="0.2s">
                    <span class="story-badge mb-3 d-inline-flex">Our Story</span>
                    <h2 class="story-title fs-1 mb-3 mb-lg-4">
                        Redefining Fashion<br><span>Excellence</span>
                    </h2>
                    <p class="story-text mb-4">
                        Your chance to upgrade your wardrobe with styles that speak. We believe in quality craftsmanship, sustainable practices, and designs that stand the test of time.
                    </p>
                    <a href="<?= url('/') ?>/about-us" class="story-btn">
                        <span>Discover Our Journey</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     NEW ARRIVALS SECTION
     ======================================== -->
<section class="section-premium bg-light-gradient py-5 py-lg-6">
    <div class="floating-shapes d-none d-lg-block">
        <div class="shape shape-2"></div>
    </div>
    
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="section-header-premium mb-4 mb-lg-5 wow fadeInUp" data-wow-delay="0s">
            <span class="badge-label">Fresh Drops</span>
            <h2 class="section-title fs-2 fs-md-1 mb-3">New Arrivals</h2>
            <p class="section-desc fs-6 mx-auto px-3 px-md-0" style="max-width: 550px;">
                The latest fashion must-haves curated just for you
            </p>
        </div>

        <!-- Products Swiper -->
        <div class="hover-sw-nav hover-sw-2 position-relative px-2 px-lg-4">
            <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" 
                 data-preview="4" 
                 data-tablet="3" 
                 data-mobile="2" 
                 data-space-lg="24" 
                 data-space-md="16" 
                 data-space="12">
                <div class="swiper-wrapper">
                    <?php if(!empty($products)): ?>
                        <?php foreach ($products as $key => $data): ?>
                            <div class="swiper-slide" lazy="true">
                                <div class="product-card-premium">
                                    <div class="product-img-wrapper" style="height: 220px; height: clamp(180px, 35vw, 320px);">
                                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="d-block h-100">
                                            <span class="badge-bestseller"><?= $data->sub_category_name?></span>
                                            <?php if($data->image_url == null): ?>
                                              
                                                <img class="lazyload" 
                                                     data-src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" 
                                                     src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" 
                                                     alt="<?=$data->product_name ?>">
                                            <?php else: ?>
                                             
                                                <img class="lazyload" 
                                                     data-src="<?= url('/') ?>/<?=$data->image_url ?>" 
                                                     src="<?= url('/') ?>/<?=$data->image_url ?>" 
                                                     alt="<?=$data->product_name ?>">
                                            <?php endif; ?>
                                        </a>
                                        
                                        <!-- Wishlist Button -->
                                        <div class="product-actions">
                                            <a href="javascript:void(0);" onclick="addToWishlist('<?=$data->id ?>')" class="action-btn" title="Add to Wishlist">
                                                <i class="icon icon-heart"></i>
                                            </a>
                                        </div>
                                        
                                        <!-- Quick Add (Hidden on Mobile) -->
                                        <div class="quick-add-overlay d-none d-md-block">
                                            <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="quick-add-btn">
                                                <i class="icon icon-bag"></i>
                                                <span>Quick Shop</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="product-name mb-2">
                                            <?=$data->color_name ?> <?=$data->product_name ?>
                                        </a>
                                        <span class="product-price">Rs. <?=$data->price ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="nav-sw nav-next-slider nav-btn-premium position-absolute top-50 start-0 translate-middle-y d-none d-lg-flex" style="left: -24px !important;">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="nav-sw nav-prev-slider nav-btn-premium position-absolute top-50 end-0 translate-middle-y d-none d-lg-flex" style="right: -24px !important;">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="sw-dots style-2 sw-pagination-product justify-content-center mt-4"></div>
        </div>
    </div>
</section>

<!-- ========================================
     SHOPPABLE VIDEOS SECTION
     ======================================== -->
<section class="section-premium bg-dark-gradient py-5 py-lg-6">
    <div class="floating-shapes d-none d-lg-block">
        <div class="shape shape-1" style="opacity: 0.3;"></div>
    </div>
    
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="section-header-premium mb-4 mb-lg-5 wow fadeInUp" data-wow-delay="0s">
            <span class="badge-label">Watch & Shop</span>
            <h2 class="section-title fs-2 fs-md-1 mb-3">Shoppable Videos</h2>
            <p class="section-desc fs-6 mx-auto px-3 px-md-0" style="max-width: 500px;">
                Experience our products in action
            </p>
        </div>

        <!-- Videos Swiper -->
        <div class="wrap-carousel position-relative px-2 px-lg-4">
            <div dir="ltr" class="swiper tf-sw-collection" 
                 data-preview="3" 
                 data-tablet="2" 
                 data-mobile="1" 
                 data-space-lg="24" 
                 data-space-md="16" 
                 data-space="12" 
                 data-loop="false" 
                 data-auto-play="false">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="video-card-premium wow fadeInUp" data-wow-delay="0s">
                            <video autoplay playsinline muted loop style="height: 350px; height: clamp(280px, 50vw, 450px);">
                                <source src="<?= url('/') ?>/frontassets/images/video/cosmetic1.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="video-card-premium wow fadeInUp" data-wow-delay="0.1s">
                            <video autoplay playsinline muted loop style="height: 350px; height: clamp(280px, 50vw, 450px);">
                                <source src="<?= url('/') ?>/frontassets/images/video/cosmetic2.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="video-card-premium wow fadeInUp" data-wow-delay="0.2s">
                            <video autoplay playsinline muted loop style="height: 350px; height: clamp(280px, 50vw, 450px);">
                                <source src="<?= url('/') ?>/frontassets/images/video/cosmetic3.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="video-card-premium wow fadeInUp" data-wow-delay="0.3s">
                            <video autoplay playsinline muted loop style="height: 350px; height: clamp(280px, 50vw, 450px);">
                                <source src="<?= url('/') ?>/frontassets/images/video/cosmetic4.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="nav-sw nav-next-slider nav-btn-premium position-absolute top-50 start-0 translate-middle-y d-none d-lg-flex" style="left: -24px !important;">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="nav-sw nav-prev-slider nav-btn-premium position-absolute top-50 end-0 translate-middle-y d-none d-lg-flex" style="right: -24px !important;">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="sw-dots style-2 sw-pagination-collection d-flex justify-content-center mt-4"></div>
        </div>
    </div>
</section>

<!-- ========================================
     TRENDING PRODUCTS SECTION
     ======================================== -->
<section class="section-premium bg-light-gradient py-5 py-lg-6">
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="section-header-premium mb-4 mb-lg-5 wow fadeInUp" data-wow-delay="0s">
            <span class="badge-label">Trending Now</span>
            <h2 class="section-title fs-2 fs-md-1 mb-3">Trending Products</h2>
            <p class="section-desc fs-6 mx-auto px-3 px-md-0" style="max-width: 550px;">
                Discover what's hot and trending in fashion
            </p>
        </div>

        <!-- Products Swiper -->
        <div class="hover-sw-nav hover-sw-2 position-relative px-2 px-lg-4">
            <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" 
                 data-preview="4" 
                 data-tablet="3" 
                 data-mobile="2" 
                 data-space-lg="24" 
                 data-space-md="16" 
                 data-space="12">
                <div class="swiper-wrapper">
                    <?php if(!empty($products)): ?>
                        <?php foreach ($products as $key => $data): ?>
                            <div class="swiper-slide" lazy="true">
                                <div class="product-card-premium">
                                    <div class="product-img-wrapper" style="height: 220px; height: clamp(180px, 35vw, 320px);">
                                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="d-block h-100">
                                            <span class="badge-bestseller"><?= $data->sub_category_name?></span>
                                            <?php if($data->image_url == null): ?>
                                                <img class="lazyload" 
                                                     data-src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" 
                                                     src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" 
                                                     alt="<?=$data->product_name ?>">
                                            <?php else: ?>
                                                <img class="lazyload" 
                                                     data-src="<?= url('/') ?>/<?=$data->image_url ?>" 
                                                     src="<?= url('/') ?>/<?=$data->image_url ?>" 
                                                     alt="<?=$data->product_name ?>">
                                            <?php endif; ?>
                                        </a>
                                        
                                        <!-- Wishlist Button -->
                                        <div class="product-actions">
                                            <a href="javascript:void(0);" onclick="addToWishlist('<?=$data->id ?>')" class="action-btn" title="Add to Wishlist">
                                                <i class="icon icon-heart"></i>
                                            </a>
                                        </div>
                                        
                                        <!-- Quick Add (Hidden on Mobile) -->
                                        <div class="quick-add-overlay d-none d-md-block">
                                            <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="quick-add-btn">
                                                <i class="icon icon-bag"></i>
                                                <span>Quick Shop</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="product-name mb-2">
                                            <?=$data->color_name ?> <?=$data->product_name ?>
                                        </a>
                                        <span class="product-price">Rs. <?=$data->price ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="nav-sw nav-next-slider nav-btn-premium position-absolute top-50 start-0 translate-middle-y d-none d-lg-flex" style="left: -24px !important;">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="nav-sw nav-prev-slider nav-btn-premium position-absolute top-50 end-0 translate-middle-y d-none d-lg-flex" style="right: -24px !important;">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="sw-dots style-2 sw-pagination-product justify-content-center mt-4"></div>
        </div>
    </div>
</section>

<!-- ========================================
     FEATURES SECTION
     ======================================== -->
<section class="section-premium bg-white py-5">
    <div class="container">
        <div class="row g-3 g-lg-4">
            <div class="col-6 col-lg-3">
                <div class="feature-card-premium text-center text-lg-start wow fadeInUp" data-wow-delay="0s">
                    <div class="feature-icon mx-auto mx-lg-0 mb-3">
                        <i class="icon-shipping"></i>
                    </div>
                    <h4 class="feature-title fs-6 mb-2">Free Shipping</h4>
                    <p class="feature-desc mb-0 d-none d-md-block">Free shipping on all orders over $120</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="feature-card-premium text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-icon mx-auto mx-lg-0 mb-3">
                        <i class="icon-payment"></i>
                    </div>
                    <h4 class="feature-title fs-6 mb-2">Secure Payment</h4>
                    <p class="feature-desc mb-0 d-none d-md-block">Multiple payment options available</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="feature-card-premium text-center text-lg-start wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-icon mx-auto mx-lg-0 mb-3">
                        <i class="icon-return"></i>
                    </div>
                    <h4 class="feature-title fs-6 mb-2">Easy Returns</h4>
                    <p class="feature-desc mb-0 d-none d-md-block">14-day hassle-free returns</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="feature-card-premium text-center text-lg-start wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-icon mx-auto mx-lg-0 mb-3">
                        <i class="icon-suport"></i>
                    </div>
                    <h4 class="feature-title fs-6 mb-2">24/7 Support</h4>
                    <p class="feature-desc mb-0 d-none d-md-block">Round-the-clock customer support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="<?= url('/') ?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
    function addToWishlist(id) {
        var login = "<?php echo session('logged_in'); ?>";
        if (login == true) {
            $.ajax({
                type: 'POST',
                url: '<?php echo url('/'); ?>/api/v1/products/add-wishlist',
                data: { 'prod_id': id },
                success: function(data) {
                    if (data.status == "SUCCESS") {
                        Swal.fire({
                            title: 'Added to Wishlist!',
                            icon: 'success',
                            confirmButtonColor: '#667eea',
                            confirmButtonText: 'Continue'
                        }).then((result) => {
                            if (result.isConfirmed) location.reload();
                        });
                    } else {
                        Swal.fire({ title: 'Oops!', text: data.message, icon: 'error', confirmButtonColor: '#667eea' });
                    }
                }
            });
        } else {
            window.location.href = "<?= url('/') ?>/user-login";
        }
    }

    function addtocart(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo url('/'); ?>/api/v1/order/add-cart',
            data: { 'id': id },
            success: function(data) {
                if (data.status == "SUCCESS") {
                    window.location.href = "<?php echo url('/'); ?>/cart";
                } else {
                    Swal.fire({ title: 'Oops!', text: data.message, icon: 'error', confirmButtonColor: '#667eea' });
                }
            }
        });
    }
</script>
@endsection
