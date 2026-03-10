@extends('frontend.main')
@section('content')
{{-- <?php print_r($products);
exit;
?> --}}

<style>
/* ========================================
   PREMIUM PRODUCT DETAIL PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

:root {
    --primary: #667eea;
    --primary-dark: #764ba2;
    --accent: #f5576c;
    --success: #10b981;
    --dark: #1a1a3e;
    --dark-bg: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    --light-bg: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    --glass-bg: rgba(255, 255, 255, 0.95);
    --glass-border: rgba(255, 255, 255, 0.2);
}

/* Section Base */
.product-detail-section {
    background: var(--light-bg);
    position: relative;
    overflow: hidden;
    padding: 30px 0 60px;
}

.product-detail-section::before {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.08), rgba(118, 75, 162, 0.08));
    border-radius: 50%;
    top: -200px;
    right: -200px;
    filter: blur(80px);
    pointer-events: none;
}

.product-detail-section::after {
    content: '';
    position: absolute;
    width: 400px;
    height: 400px;
    background: linear-gradient(135deg, rgba(245, 87, 108, 0.06), rgba(240, 147, 251, 0.06));
    border-radius: 50%;
    bottom: -150px;
    left: -150px;
    filter: blur(80px);
    pointer-events: none;
}

/* Premium Breadcrumb */
.breadcrumb-premium {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 50px;
    padding: 12px 24px;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    border: 1px solid rgba(102, 126, 234, 0.1);
    margin-bottom: 30px;
}

.breadcrumb-premium a {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
}

.breadcrumb-premium a:hover {
    color: var(--primary);
}

.breadcrumb-premium .separator {
    color: var(--primary);
    font-size: 10px;
}

.breadcrumb-premium .current {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: var(--dark);
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Product Gallery Card */
.gallery-card {
    background: #fff;
    border-radius: 24px;
    padding: 20px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.06);
    position: sticky;
    top: 100px;
}

/* Thumbs Slider - Vertical Layout */
.thumbs-slider {
    display: flex;
    gap: 16px;
}

.tf-product-media-thumbs {
    width: 100px;
    flex-shrink: 0;
    order: -1;
}

.tf-product-media-thumbs .swiper-wrapper {
    flex-direction: column;
    gap: 12px;
}

.tf-product-media-thumbs .swiper-slide {
    width: 100% !important;
    height: 100px !important;
    margin: 0 !important;
}

.tf-product-media-main {
    flex: 1;
    border-radius: 20px;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
}

.tf-product-media-main .swiper-slide img {
    width: 100%;
    height: 500px;
    object-fit: contain;
    transition: transform 0.5s ease;
}

.tf-product-media-main .swiper-slide:hover img {
    transform: scale(1.05);
}

.thumb-item,
.tf-product-media-thumbs .item {
    width: 100%;
    height: 100px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
}

.thumb-item:hover,
.thumb-item.active,
.tf-product-media-thumbs .swiper-slide-thumb-active .item {
    border-color: var(--primary);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.25);
}

.thumb-item img,
.tf-product-media-thumbs .item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product Info Card */
.product-info-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 32px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(102, 126, 234, 0.08);
}

.product-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 16px;
    line-height: 1.3;
}

/* Best Seller Badge */
.badge-bestseller {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    border-radius: 50px;
    margin-bottom: 20px;
}

.badge-bestseller i {
    font-size: 12px;
}

/* Price Display */
.price-wrapper {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 28px;
    padding-bottom: 28px;
    border-bottom: 1px solid rgba(102, 126, 234, 0.1);
}

.current-price {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 700;
    color: var(--dark);
}

.original-price {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 500;
    color: #999;
    text-decoration: line-through;
}

.discount-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 6px 14px;
    background: linear-gradient(135deg, var(--accent), #ff8a5c);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 700;
    border-radius: 50px;
}

/* Color Selection */
.variant-section {
    margin-bottom: 24px;
}

.variant-label {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.variant-value {
    font-weight: 500;
    color: var(--primary);
}

.color-options {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.color-swatch {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.color-swatch::before {
    content: '';
    position: absolute;
    inset: -4px;
    border-radius: 50%;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.color-swatch:hover::before,
.color-swatch.selected::before {
    border-color: var(--primary);
}

.color-swatch.selected {
    transform: scale(1.1);
}

.color-swatch.selected::after {
    content: '✓';
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

/* Size Selection */
.size-options {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.size-btn {
    min-width: 52px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 16px;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: var(--dark);
    cursor: pointer;
    transition: all 0.3s ease;
}

.size-btn:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.size-btn.selected {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-color: transparent;
    color: #fff;
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.35);
}

.find-size-link {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: var(--primary);
    text-decoration: underline;
    margin-left: auto;
    transition: color 0.3s ease;
}

.find-size-link:hover {
    color: var(--primary-dark);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
}

.btn-add-cart {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 16px 28px;
    background: linear-gradient(135deg, var(--dark), #2d2d5a);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    border: none;
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 8px 25px rgba(26, 26, 62, 0.25);
    text-decoration: none;
}

.btn-add-cart:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(26, 26, 62, 0.35);
    color: #fff;
}

.btn-wishlist {
    width: 56px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 14px;
    color: #999;
    font-size: 22px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-wishlist:hover {
    border-color: var(--accent);
    color: var(--accent);
    background: rgba(245, 87, 108, 0.05);
}

.btn-buy-now {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 16px 28px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    border: none;
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
    text-decoration: none;
    margin-bottom: 24px;
}

.btn-buy-now:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
    color: #fff;
}

/* Trust Section */
.trust-section {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
    border-radius: 16px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.trust-badge {
    display: flex;
    align-items: center;
    gap: 10px;
}

.trust-badge i {
    font-size: 24px;
    color: var(--success);
}

.trust-badge p {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: var(--dark);
    margin: 0;
    line-height: 1.4;
}

.payment-icons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-left: auto;
}

.payment-icons img {
    height: 28px;
    object-fit: contain;
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

.payment-icons img:hover {
    opacity: 1;
}

/* Tabs Section */
.tabs-section {
    background: #fff;
    position: relative;
    padding: 60px 0;
}


.tabs-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 150px;
    background: var(--light-bg);
    z-index: 0;
}

.tabs-container {
    position: relative;
    z-index: 1;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.06);
    overflow: hidden;
}

.tabs-nav-premium {
    display: flex;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    padding: 8px;
    gap: 8px;
    list-style: none;
    margin: 0;
    overflow-x: auto;
    scrollbar-width: none;
}

.tabs-nav-premium::-webkit-scrollbar {
    display: none;
}

.tab-item {
    flex: 1;
    min-width: 140px;
}

.tab-item .tab-link {
    display: block;
    padding: 16px 24px;
    background: transparent;
    color: #666;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tab-item .tab-link:hover {
    color: var(--primary);
    background: rgba(255, 255, 255, 0.5);
}

.tab-item.active .tab-link {
    background: #fff;
    color: var(--dark);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.tab-content-wrapper {
    padding: 32px;
}

.tab-pane,
.widget-content-inner {
    display: none;
}

.tab-pane.active,
.widget-content-inner.active {
    display: block;
    animation: fadeIn 0.4s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }

}

/* Description Content */
.description-content {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    line-height: 1.8;
    color: #555;
}

.description-content p {
    margin-bottom: 16px;
}

/* Additional Info Table */
.info-table {
    width: 100%;
    border-collapse: collapse;
}

.info-table tr {
    border-bottom: 1px solid #f0f0f0;
}

.info-table th {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: var(--dark);
    text-align: left;
    padding: 16px 0;
    width: 150px;
}

.info-table td {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
    padding: 16px 0;
}

/* Reviews Section */
.reviews-header {
    display: flex;
    align-items: flex-start;
    gap: 40px;
    flex-wrap: wrap;
    margin-bottom: 32px;
    padding-bottom: 32px;
    border-bottom: 1px solid #f0f0f0;
}

.rating-summary {
    text-align: center;
}

.rating-number {
    font-family: 'Playfair Display', serif;
    font-size: 48px;
    font-weight: 700;
    color: var(--dark);
    line-height: 1;
}

.rating-stars {
    display: flex;
    gap: 4px;
    justify-content: center;
    margin: 12px 0 8px;
}

.rating-stars i {
    color: #fbbf24;
    font-size: 18px;
}

.rating-count {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #888;
}

.rating-bars {
    flex: 1;
    max-width: 300px;
}

.rating-bar-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 8px;
}

.rating-bar-item span {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #666;
    min-width: 20px;
}

.rating-bar-item i {
    color: #fbbf24;
    font-size: 12px;
}

.bar-bg {
    flex: 1;
    height: 8px;
    background: #f0f0f0;
    border-radius: 4px;
    overflow: hidden;
}

.bar-fill {
    height: 100%;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-radius: 4px;
}

.rating-bar-item .count {
    min-width: 30px;
    text-align: right;
}

.review-actions {
    margin-left: auto;
}

.btn-write-review {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 28px;
    background: linear-gradient(135deg, var(--dark), #2d2d5a);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-write-review:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(26, 26, 62, 0.25);
}

/* Review Comments */
.review-item {
    padding: 24px 0;
    border-bottom: 1px solid #f0f0f0;
}

.review-item:last-child {
    border-bottom: none;
}

.review-user {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 12px;
}

.review-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
}

.review-meta h6 {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    color: var(--dark);
    margin: 0 0 4px;
}

.review-meta .date {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: #888;
}

.review-text {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    line-height: 1.7;
    color: #555;
    margin: 0;
}

.review-reply {
    margin-left: 64px;
    padding: 20px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
    border-radius: 16px;
    margin-top: 16px;
}

/* Review Form */
.review-form {
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 20px;
    padding: 32px;
    margin-top: 32px;
}

.review-form h5 {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 24px;
}

.star-rating {
    display: flex;
    gap: 8px;
    flex-direction: row-reverse;
    justify-content: flex-end;
    margin-bottom: 24px;
}

.star-rating input {
    display: none;
}

.star-rating label {
    font-size: 28px;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s ease;
}

.star-rating label::before {
    content: '★';
}

.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #fbbf24;
}

.form-field {
    margin-bottom: 20px;
}

.form-field label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 8px;
}

.form-field input,
.form-field textarea {
    width: 100%;
    padding: 14px 18px;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: var(--dark);
    transition: all 0.3s ease;
}

.form-field input:focus,
.form-field textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.form-field textarea {
    resize: vertical;
    min-height: 120px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.form-check {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 24px;
}

.form-check input {
    width: 20px;
    height: 20px;
    accent-color: var(--primary);
    margin-top: 2px;
}

.form-check label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #666;
    line-height: 1.5;
}

.btn-submit-review {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-submit-review:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.35);
}

/* Responsive */
@media (max-width: 991.98px) {
    .product-title {
        font-size: 24px;
    }
    
    .current-price {
        font-size: 28px;
    }
    
    .gallery-card {
        position: static;
        margin-bottom: 24px;
    }
    
    .tf-product-media-main .swiper-slide img {
        height: 400px;
    }
    
    .tf-product-media-thumbs {
        width: 80px;
    }
    
    .tf-product-media-thumbs .swiper-slide {
        height: 80px !important;
    }
    
    .reviews-header {
        flex-direction: column;
        gap: 24px;
    }
    
    .review-actions {
        margin-left: 0;
    }
}

@media (max-width: 575.98px) {
    .product-detail-section {
        padding: 20px 0 40px;
    }
    
    .breadcrumb-premium {
        padding: 10px 16px;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .breadcrumb-premium a,
    .breadcrumb-premium .current {
        font-size: 12px;
    }
    
    .product-info-card {
        padding: 20px;
        border-radius: 20px;
    }
    
    .product-title {
        font-size: 20px;
    }
    
    .current-price {
        font-size: 24px;
    }
    
    /* Mobile gallery - horizontal thumbnails below */
    .thumbs-slider {
        flex-direction: column-reverse;
    }
    
    .tf-product-media-thumbs {
        width: 100%;
        order: 0;
    }
    
    .tf-product-media-thumbs .swiper-wrapper {
        flex-direction: row;
        gap: 8px;
    }
    
    .tf-product-media-thumbs .swiper-slide {
        width: 70px !important;
        height: 70px !important;
    }
    
    .tf-product-media-main .swiper-slide img {
        height: 300px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn-wishlist {
        width: 100%;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .tab-content-wrapper {
        padding: 20px;
    }
    
    .review-reply {
        margin-left: 0;
    }
}
</style>

<!-- Breadcrumb -->
<section class="product-detail-section">
    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb-premium">
            <a href="<?= url('/') ?>/">Home</a>
            <i class="icon icon-arrow-right separator"></i>
            <a href="#">Products</a>
            <i class="icon icon-arrow-right separator"></i>
            <span class="current"><?php echo $products->color_name ?> <?php echo $products->product_name ?></span>
           
        </div>
        
        <div class="row g-4">
            <!-- Gallery Column -->
            <div class="col-lg-6">
                <div class="gallery-card tf-product-media-wrap sticky-top">
                    <div class="thumbs-slider">
                        <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical">
                            <div class="swiper-wrapper stagger-wrap">
                                <?php
                                if(!empty($images)){
                                foreach ($images as $key => $value) { ?>
                                <!-- beige -->
                                <div class="swiper-slide stagger-item" data-color="<?php echo $products->color_name ?>">
                                    <?php if($value->image_url == null){ ?>
                                    <div class="item">
                                        <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/shop/products/hmgoepprod31.jpg" src="<?= url('/') ?>/frontassets/images/shop/products/hmgoepprod31.jpg" alt="img-product">
                                    </div>
                                    <?php }else{ ?>
                                    <div class="item">
                                        <img class="lazyload" data-src="<?= url('/') ?>/<?=$value->image_url?>" alt="img-product">
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                            <div class="swiper-wrapper">
                                <?php
                                if(!empty($images)){
                                foreach ($images as $key => $value) { ?>
                                <!-- beige -->
                                <div class="swiper-slide" data-color="<?php echo $products->color_name ?>">
                                    <?php if($value->image_url == null){ ?>
                                    <a href="images/shop/products/p-d1.png" target="_blank" class="item" data-pswp-width="770px" data-pswp-height="1075px">
                                        <img class="tf-image-zoom lazyload" data-zoom="images/shop/products/hmgoepprod31.jpg" data-src="<?= url('/') ?>/frontassets/images/shop/products/hmgoepprod31.jpg" src="<?= url('/') ?>/frontassets/images/shop/products/hmgoepprod31.jpg" alt="">
                                    </a>
                                    <?php }else{ ?>
                                    <a href="<?= url('/') ?>/<?=$value->image_url?>" target="_blank" class="item" data-pswp-width="770px" data-pswp-height="1075px">
                                        <img class="tf-image-zoom lazyload" data-zoom="<?= url('/') ?>/<?=$value->image_url?>" data-src="<?= url('/') ?>/<?=$value->image_url?>" src="<?= url('/') ?>/frontassets/images/shop/products/hmgoepprod31.jpg" alt="">
                                    </a>
                                    <?php } ?>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product Info Column -->
            <div class="col-lg-6">
                <div class="product-info-card">
                    <div class="tf-zoom-main"></div>
                    
                    <!-- Badge -->
                    <div class="badge-bestseller">
                        <i class="icon icon-star"></i>
                        <?php echo $products->sub_category_name?>
                    </div>

                     {{-- <span class="bg bg-success"><?php echo $products->sub_category_name?></span> --}}
                    
                    <!-- Title -->
                    <h1 class="product-title"><?php echo $products->color_name ?> <?php echo $products->product_name ?></h1>
                    
                    <!-- Price -->
                    <div class="price-wrapper">
                        <span class="current-price">Rs.<?php echo $products->price ?></span>
                        <span class="original-price">Rs.<?php echo $products->old_price ?></span>
                        @php
                            $discount = round((($products->old_price - $products->price) / $products->old_price) * 100);
                        @endphp
                        <span class="discount-badge">{{ $discount }}% OFF</span>
                    </div>
                    
                    <!-- Color Selection -->
                    <div class="variant-section">
                        <div class="variant-label">
                            Color: <span class="variant-value">{{ $products->color_name }}</span>
                        </div>
                        <div class="color-options" id="color-options">
                            @foreach($color as $price)
                            <a href="<?= url('/') ?>/product/<?= $products->slug ?>/<?= $price->color ?>">
                                <div class="color-swatch <?php if($price->color == $products->color){ ?> selected <?php } ?>"
                                     style="background-color: {{ $price->color_code }}"
                                     title="{{ $price->color_name }}"
                                     data-color="{{ $price->color_name }}">
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Size Selection -->
                    <div class="variant-section">
                        <div class="variant-label" style="justify-content: space-between;">
                            <span>Size:</span>
                            <a href="#find_size" data-bs-toggle="modal" class="find-size-link">Find your size</a>
                        </div>
                        <div class="size-options" id="size-options">
                            <?php $sizes = explode(",",$products->size_name); ?>
                            @foreach($sizes as $size)
                            <div class="size-btn" data-size="{{ $size }}">
                                {{ $size }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    

                    <!-- Hidden Form -->
                    <form action="#" id="sizeDt" method="POST">
                        <input type="hidden" id="combo" name="combo" value="0">
                        <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $products->id ?>">
                        <input type="hidden" id="size" name="size" value="">
                        <input type="hidden" id="color" name="color" value="{{ $products->color }}">
                    </form>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="javascript:void(0);" class="btn-add-cart" onclick="addtocart(<?php echo $products->id ?>)">
                            <i class="icon icon-bag"></i>
                            Add to Cart
                        </a>
                        <a href="javascript:void(0);" class="btn-wishlist" onclick="addToWishlist(<?php echo $products->id ?>)">
                            <i class="icon icon-heart"></i>
                        </a>
                    </div>
                    
                    <a href="javascript:void(0);" class="btn-buy-now" onclick="addtocart(<?php echo $products->id ?>)">
                        <i class="fas fa-bolt"></i>
                        Buy Now
                    </a>
                    
                    <!-- Trust Section -->
                    <div class="trust-section">
                        <div class="trust-badge">
                            <i class="icon-safe"></i>
                            <p>Guarantee Safe<br>Checkout</p>
                        </div>
                        <div class="payment-icons">
                            <img src="<?= url('/') ?>/frontassets/images/payments/visa.png" alt="Visa">
                            <img src="<?= url('/') ?>/frontassets/images/payments/img-1.png" alt="Payment">
                            <img src="<?= url('/') ?>/frontassets/images/payments/img-2.png" alt="Payment">
                            <img src="<?= url('/') ?>/frontassets/images/payments/img-3.png" alt="Payment">
                            <img src="<?= url('/') ?>/frontassets/images/payments/img-4.png" alt="Payment">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabs Section -->
<section class="tabs-section">
    <div class="container">
        <div class="tabs-container">
            <!-- Tab Navigation -->
            <ul class="tabs-nav-premium widget-menu-tab">
                <li class="tab-item item-title active">
                    <span class="tab-link inner">Description</span>
                </li>
                <li class="tab-item item-title">
                    <span class="tab-link inner">Additional Information</span>
                </li>
                <li class="tab-item item-title">
                    <span class="tab-link inner">Reviews</span>
                </li>
            </ul>
            
            <!-- Tab Content -->
            <div class="tab-content-wrapper widget-content-tab">
                <!-- Description Tab -->
                <div class="tab-pane active widget-content-inner">
                    <div class="description-content">
                        <?php echo $products->detail ?>
                    </div>
                </div>
                
                <!-- Additional Info Tab -->
                <div class="tab-pane widget-content-inner">
                    <table class="info-table">
                        <tbody>
                            <tr>
                                <th>Color</th>
                                <td>White, Pink, Black</td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>S, M, L, XL</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Reviews Tab -->
                <div class="tab-pane widget-content-inner">
                    <div class="tab-reviews write-cancel-review-wrap">
                        <!-- Reviews Header -->
                        <div class="reviews-header tab-reviews-heading">
                            <div class="rating-summary top">
                                <div class="rating-number number fw-6">4.8</div>
                                <div class="rating-stars list-star">
                                    <i class="icon icon-star"></i>
                                    <i class="icon icon-star"></i>
                                    <i class="icon icon-star"></i>
                                    <i class="icon icon-star"></i>
                                    <i class="icon icon-star"></i>
                                </div>
                                <p class="rating-count">(168 Ratings)</p>
                            </div>
                            
                            <div class="rating-bars rating-score">
                                <div class="rating-bar-item item">
                                    <span class="number-1 text-caption-1">5</span>
                                    <i class="icon icon-star"></i>
                                    <div class="bar-bg line-bg">
                                        <div class="bar-fill" style="width: 94.67%;"></div>
                                    </div>
                                    <span class="count number-2 text-caption-1">59</span>
                                </div>
                                <div class="rating-bar-item item">
                                    <span class="number-1 text-caption-1">4</span>
                                    <i class="icon icon-star"></i>
                                    <div class="bar-bg line-bg">
                                        <div class="bar-fill" style="width: 60%;"></div>
                                    </div>
                                    <span class="count number-2 text-caption-1">46</span>
                                </div>
                                <div class="rating-bar-item item">
                                    <span class="number-1 text-caption-1">3</span>
                                    <i class="icon icon-star"></i>
                                    <div class="bar-bg line-bg">
                                        <div class="bar-fill" style="width: 0%;"></div>
                                    </div>
                                    <span class="count number-2 text-caption-1">0</span>
                                </div>
                                <div class="rating-bar-item item">
                                    <span class="number-1 text-caption-1">2</span>
                                    <i class="icon icon-star"></i>
                                    <div class="bar-bg line-bg">
                                        <div class="bar-fill" style="width: 0%;"></div>
                                    </div>
                                    <span class="count number-2 text-caption-1">0</span>
                                </div>
                                <div class="rating-bar-item item">
                                    <span class="number-1 text-caption-1">1</span>
                                    <i class="icon icon-star"></i>
                                    <div class="bar-bg line-bg">
                                        <div class="bar-fill" style="width: 0%;"></div>
                                    </div>
                                    <span class="count number-2 text-caption-1">0</span>
                                </div>
                            </div>
                            
                            <div class="review-actions">
                                <div class="tf-btn btn-outline-dark fw-6 btn-comment-review btn-cancel-review" style="display: none;">Cancel Review</div>
                                <button class="btn-write-review tf-btn btn-comment-review">
                                    <i class="fas fa-pen"></i>
                                    Write a Review
                                </button>
                            </div>
                        </div>
                        
                        <!-- Review Comments -->
                        <div class="reply-comment cancel-review-wrap">
                            <div class="d-flex mb_24 gap-20 align-items-center justify-content-between flex-wrap">
                                <h5>03 Comments</h5>
                                <div class="d-flex align-items-center gap-12">
                                    <div class="text-caption-1">Sort by:</div>
                                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                        <div class="btn-select">
                                            <span class="text-sort-value">Most Recent</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div class="dropdown-menu">
                                            <div class="select-item active">
                                                <span class="text-value-item">Most Recent</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Oldest</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Most Popular</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="reply-comment-wrap">
                                <div class="review-item reply-comment-item">
                                    <div class="review-user user">
                                        <img src="<?= url('/') ?>/frontassets/images/collections/collection-circle-9.jpg" alt="" class="review-avatar image">
                                        <div class="review-meta">
                                            <h6><a href="#" class="link">Superb quality apparel that exceeds expectations</a></h6>
                                            <span class="date day text_black-2">1 days ago</span>
                                        </div>
                                    </div>
                                    <p class="review-text text_black-2">Great theme - we were looking for a theme with lots of built in features and flexibility and this was perfect. We expected to need to employ a developer to add a few finishing touches. But we actually managed to do everything ourselves. We did have one small query and the support given was swift and helpful.</p>
                                </div>
                                
                                <div class="review-reply reply-comment-item type-reply">
                                    <div class="review-user user">
                                        <img src="<?= url('/') ?>/frontassets/images/collections/collection-circle-10.jpg" alt="" class="review-avatar image">
                                        <div class="review-meta">
                                            <h6><a href="#" class="link">Reply from Modave</a></h6>
                                            <span class="date day text_black-2">1 days ago</span>
                                        </div>
                                    </div>
                                    <p class="review-text text_black-2">We love to hear it! Part of what we love most about Modave is how much it empowers store owners like yourself to build a beautiful website without having to hire a developer :) Thank you for this fantastic review!</p>
                                </div>
                                
                                <div class="review-item reply-comment-item">
                                    <div class="review-user user">
                                        <img src="<?= url('/') ?>/frontassets/images/collections/collection-circle-9.jpg" alt="" class="review-avatar image">
                                        <div class="review-meta">
                                            <h6><a href="#" class="link">Superb quality apparel that exceeds expectations</a></h6>
                                            <span class="date day text_black-2">1 days ago</span>
                                        </div>
                                    </div>
                                    <p class="review-text text_black-2">Great theme - we were looking for a theme with lots of built in features and flexibility and this was perfect. We expected to need to employ a developer to add a few finishing touches. But we actually managed to do everything ourselves. We did have one small query and the support given was swift and helpful.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Review Form -->
                        <form class="review-form form-write-review write-review-wrap">
                            <h5 class="heading">Write a Review</h5>
                            
                            <div class="star-rating list-rating-check">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="5 stars"></label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="4 stars"></label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="3 stars"></label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="2 stars"></label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="1 star"></label>
                            </div>
                            
                            <div class="form-content">
                                <div class="form-field box-field">
                                    <label class="label">Review Title</label>
                                    <input type="text" placeholder="Give your review a title" name="text" tabindex="2" value="" aria-required="true" required="">
                                </div>
                                
                                <div class="form-field box-field">
                                    <label class="label">Review</label>
                                    <textarea rows="4" placeholder="Write your comment here" tabindex="2" aria-required="true" required=""></textarea>
                                </div>
                                
                                <div class="form-row box-field group-2">
                                    <div class="form-field">
                                        <input type="text" placeholder="Your Name (Public)" name="text" tabindex="2" value="" aria-required="true" required="">
                                    </div>
                                    <div class="form-field">
                                        <input type="email" placeholder="Your email (private)" name="email" tabindex="2" value="" aria-required="true" required="">
                                    </div>
                                </div>
                                
                                <div class="form-check box-check">
                                    <input type="checkbox" name="availability" class="tf-check" id="check1">
                                    <label for="check1">Save my name, email, and website in this browser for the next time I comment.</label>
                                </div>
                            </div>
                            
                            <div class="button-submit">
                                <button class="btn-submit-review tf-btn btn-fill animate-hover-btn" type="submit">
                                    Submit Review
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?= url('/') ?>/frontassets/js/drift.min.js"></script>
<script type="text/javascript" src="<?= url('/') ?>/frontassets/js/wow.min.js"></script>
<script type="module" src="<?= url('/') ?>/frontassets/js/model-viewer.min.js"></script>
<script type="module" src="<?= url('/') ?>/frontassets/js/zoom.js"></script>
<script src="<?= url('/') ?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>

<script type="text/javascript">
function addtocart(id) {
    var combo = $('#combo').val();
    var prod_id = $('#prod_id').val();
    var color = $('#color').val();
    var size = $('#size').val();

    if(color !="" && size != ""){
        $.ajax({
            type: 'POST',
            url: '<?php echo url('/'); ?>/api/v1/order/add-cart',
            data: {
                'id': id,
                'color' : color,
                'size' : size,
                'combo' : combo
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
    } else {
        Swal.fire(
            'Failed!',
            'Please Select Any Size!..',
            'error'
        );
    }
}

function addToWishlist(id) {
    var login = "<?php echo session('logged_in'); ?>";
    if (login == true) {
        var prod_id = id;
        console.log(prod_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo url('/'); ?>/api/v1/products/add-wishlist',
            data: {
                'prod_id': prod_id,
            },
            success: function(data) {
                console.log(data);
                if (data.status == "SUCCESS") {
                    Swal.fire({
                        title: 'Product Add to Wishlist Successfully',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                } else {
                    $("#error").show();
                    $("#errormessage").text(data.message);
                }
            }
        });
    } else {
        window.location.href = "<?= url('/') ?>/user-login";
    }
}

// Handle color selection
document.querySelectorAll('.color-swatch').forEach(box => {
    box.addEventListener('click', () => {
        document.querySelectorAll('.color-swatch').forEach(b => b.classList.remove('selected'));
        box.classList.add('selected');
        console.log('Selected Color:', box.dataset.color);
        $('#color').val(box.dataset.color);
    });
});

// Handle size selection
document.querySelectorAll('.size-btn').forEach(option => {
    console.log(option);
    option.addEventListener('click', () => {
        document.querySelectorAll('.size-btn').forEach(o => o.classList.remove('selected'));
        option.classList.add('selected');
        console.log('Selected Size:', option.dataset.size);
        $('#size').val(option.dataset.size);
    });
});

// Handle Tab Navigation
document.querySelectorAll('.tabs-nav-premium .tab-item').forEach((tab, index) => {
    tab.addEventListener('click', () => {
        // Remove active from all tabs
        document.querySelectorAll('.tabs-nav-premium .tab-item').forEach(t => t.classList.remove('active'));
        // Add active to clicked tab
        tab.classList.add('active');
        
        // Hide all tab panes
        document.querySelectorAll('.tab-content-wrapper .widget-content-inner').forEach(pane => {
            pane.classList.remove('active');
            pane.style.display = 'none';
        });
        
        // Show selected tab pane
        const panes = document.querySelectorAll('.tab-content-wrapper .widget-content-inner');
        if (panes[index]) {
            panes[index].classList.add('active');
            panes[index].style.display = 'block';
        }
    });
});

// Initialize first tab as active
document.addEventListener('DOMContentLoaded', function() {
    const firstPane = document.querySelector('.tab-content-wrapper .widget-content-inner');
    if (firstPane) {
        firstPane.classList.add('active');
        firstPane.style.display = 'block';
    }
});
</script>
@endsection
