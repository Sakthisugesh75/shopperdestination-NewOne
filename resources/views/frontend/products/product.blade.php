@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM PRODUCT LISTING PAGE - FIXED
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Title Premium */
.tf-page-title.premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.premium-header::before {
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

.tf-page-title.premium-header::after {
    content: '';
    position: absolute;
    width: 400px;
    height: 400px;
    background: linear-gradient(135deg, rgba(245, 87, 108, 0.1), rgba(240, 147, 251, 0.1));
    border-radius: 50%;
    bottom: -200px;
    left: -100px;
    filter: blur(80px);
    pointer-events: none;
}

.tf-page-title.premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    margin-bottom: 12px;
    position: relative;
    z-index: 1;
}

.tf-page-title.premium-header .text-2 {
    font-family: 'Inter', sans-serif !important;
    font-size: 16px !important;
    color: rgba(255, 255, 255, 0.7) !important;
    position: relative;
    z-index: 1;
}

/* Shop Section Premium Background */
.flat-spacing-1.premium-shop {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 40px 0 60px;
    min-height: 60vh;
}

/* Shop Controls Premium */
.tf-shop-control.premium-controls {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    padding: 16px 24px;
    margin-bottom: 32px;
}

.tf-shop-control.premium-controls .tf-btn-filter {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff !important;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.25);
}

.tf-shop-control.premium-controls .tf-btn-filter:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.35);
}

.tf-shop-control.premium-controls .tf-control-layout {
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 12px;
    padding: 6px;
    gap: 6px;
    list-style: none;
    margin: 0;
}

.tf-shop-control.premium-controls .tf-view-layout-switch {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border-radius: 10px;
    color: #888;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tf-shop-control.premium-controls .tf-view-layout-switch:hover {
    color: #667eea;
}

.tf-shop-control.premium-controls .tf-view-layout-switch.active {
    background: #fff;
    color: #1a1a3e;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.tf-shop-control.premium-controls .btn-select {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: #1a1a3e;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tf-shop-control.premium-controls .btn-select:hover {
    border-color: #667eea;
}

/* Premium Product Card Styles */
.wrapper-shop .card-product {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    transition: all 0.4s ease;
}

.wrapper-shop .card-product:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
}

.wrapper-shop .card-product-wrapper {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
}

.wrapper-shop .card-product.grid .card-product-wrapper {
    aspect-ratio: 3/4;
}

.wrapper-shop .card-product-wrapper .product-img {
    display: block;
    width: 100%;
    height: 100%;
}

.wrapper-shop .card-product-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease, opacity 0.3s ease;
}

.wrapper-shop .card-product-wrapper .img-hover {
    position: absolute;
    inset: 0;
    opacity: 0;
}

.wrapper-shop .card-product:hover .img-product {
    opacity: 0;
}

.wrapper-shop .card-product:hover .img-hover {
    opacity: 1;
    transform: scale(1.05);
}

/* Card Action Buttons */
.wrapper-shop .list-product-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.3s ease;
    z-index: 5;
}

.wrapper-shop .card-product:hover .list-product-btn {
    opacity: 1;
    transform: translateX(0);
}

.wrapper-shop .list-product-btn .box-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 50%;
    color: #1a1a3e;
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.wrapper-shop .list-product-btn .box-icon:hover {
    background: #f5576c;
    color: #fff;
    transform: scale(1.1);
}

/* Quick Add Overlay */
.wrapper-shop .quick-add-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 16px;
    background: linear-gradient(180deg, transparent, rgba(26, 26, 62, 0.9));
    opacity: 0;
    transform: translateY(100%);
    transition: all 0.4s ease;
    z-index: 4;
}

.wrapper-shop .card-product:hover .quick-add-overlay {
    opacity: 1;
    transform: translateY(0);
}

/* GSM Badge Overlay */
.wrapper-shop .card-product-wrapper .badge-bestseller {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 6px 12px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    z-index: 10;
}

/* Hide badge inside quick-add-overlay to avoid duplicates */
.wrapper-shop .quick-add-overlay .badge-bestseller {
    display: none;
}

/* Reposition badge from overlay to wrapper */
.wrapper-shop .card-product-wrapper {
    position: relative;
}

.wrapper-shop .card-product-info .badge-bestseller {
    position: static;
    display: inline-block;
    margin-bottom: 8px;
}

/* Grid Column Layout Fixes - High Specificity */
#gridLayout.tf-grid-layout {
    display: grid !important;
    gap: 30px;
}

#gridLayout.tf-grid-layout.tf-col-2 {
    grid-template-columns: repeat(2, 1fr) !important;
}

#gridLayout.tf-grid-layout.tf-col-3 {
    grid-template-columns: repeat(3, 1fr) !important;
}

#gridLayout.tf-grid-layout.tf-col-4 {
    grid-template-columns: repeat(4, 1fr) !important;
}

#gridLayout.tf-grid-layout.tf-col-5 {
    grid-template-columns: repeat(5, 1fr) !important;
}

#gridLayout.tf-grid-layout.tf-col-6 {
    grid-template-columns: repeat(6, 1fr) !important;
}

.wrapper-shop .quick-add-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 14px;
    background: #fff;
    color: #1a1a3e;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.wrapper-shop .quick-add-btn:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
}

/* Card Info */
.wrapper-shop .card-product-info {
    padding: 20px;
}

.wrapper-shop .card-product-info .title {
    font-family: 'Inter', sans-serif !important;
    font-size: 15px !important;
    font-weight: 600 !important;
    color: #1a1a3e !important;
    text-decoration: none;
    display: block;
    margin-bottom: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: color 0.3s ease;
}

.wrapper-shop .card-product-info .title:hover {
    color: #667eea !important;
}

.wrapper-shop .card-product-info .price {
    font-family: 'Playfair Display', serif !important;
    font-size: 20px !important;
    font-weight: 600 !important;
    color: #1a1a3e !important;
}

/* List Layout Premium */
.wrapper-shop.premium-list .card-product {
    display: flex;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    margin-bottom: 20px;
}

.wrapper-shop.premium-list .card-product:hover {
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.wrapper-shop.premium-list .card-product-wrapper {
    width: 280px;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
}

.wrapper-shop.premium-list .card-product-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.wrapper-shop.premium-list .card-product:hover .card-product-wrapper img {
    transform: scale(1.05);
}

.wrapper-shop.premium-list .card-product-info {
    flex: 1;
    padding: 28px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.wrapper-shop.premium-list .card-product-info .title {
    font-family: 'Inter', sans-serif !important;
    font-size: 18px !important;
    font-weight: 600 !important;
    color: #1a1a3e !important;
    text-decoration: none;
    margin-bottom: 12px;
    display: block;
    transition: color 0.3s ease;
}

.wrapper-shop.premium-list .card-product-info .title:hover {
    color: #667eea !important;
}

.wrapper-shop.premium-list .card-product-info .price {
    display: block;
}

.wrapper-shop.premium-list .card-product-info .brand-text {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #888;
    margin-bottom: 8px;
    display: block;
}

.wrapper-shop.premium-list .card-product-info .price {
    font-family: 'Playfair Display', serif !important;
    font-size: 22px !important;
    font-weight: 700 !important;
    color: #0c0c1e !important;
    margin-bottom: 16px;
    display: block;
}

.wrapper-shop.premium-list .card-product-info .description {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    line-height: 1.7;
    color: #666;
    margin-bottom: 20px;
}

.wrapper-shop.premium-list .list-product-btn {
    display: flex;
    gap: 12px;
}

.wrapper-shop.premium-list .list-product-btn .box-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 12px;
    color: #1a1a3e;
    text-decoration: none;
    transition: all 0.3s ease;
}

.wrapper-shop.premium-list .list-product-btn .box-icon:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
}

/* Premium Pagination */
.wg-pagination.premium-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 48px;
    list-style: none;
    padding: 0;
}

.wg-pagination.premium-pagination li a,
.wg-pagination.premium-pagination li .pagination-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 44px;
    padding: 0 16px;
    background: #fff;
    color: #1a1a3e;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 12px;
    text-decoration: none;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    transition: all 0.3s ease;
}

.wg-pagination.premium-pagination li a:hover,
.wg-pagination.premium-pagination li .pagination-link:hover {
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    color: #667eea;
}

.wg-pagination.premium-pagination li.active a,
.wg-pagination.premium-pagination li.active .pagination-link {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

/* Meta Filter Premium */
.meta-filter-shop.premium-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 24px;
}

.meta-filter-shop.premium-meta .count-text {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
}

.meta-filter-shop.premium-meta .remove-all-filters {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: rgba(245, 87, 108, 0.1);
    color: #f5576c;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.meta-filter-shop.premium-meta .remove-all-filters:hover {
    background: #f5576c;
    color: #fff;
}

/* Responsive */
@media (max-width: 991.98px) {
    .tf-page-title.premium-header .heading {
        font-size: 32px !important;
    }
    
    .wrapper-shop.premium-list .card-product-wrapper {
        width: 200px;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.premium-header .heading {
        font-size: 28px !important;
    }
    
    .tf-shop-control.premium-controls {
        padding: 16px;
        border-radius: 12px;
    }
    
    .tf-shop-control.premium-controls .tf-control-layout {
        display: none !important;
    }
    
    .wrapper-shop.premium-grid .card-product {
        border-radius: 16px;
    }
    
    .wrapper-shop.premium-grid .card-product-info {
        padding: 12px;
    }

    .wrapper-shop .card-product-wrapper {
        height: 220px !important;
    }
    
    .wrapper-shop.premium-grid .card-product-info .title {
        font-size: 13px !important;
        white-space: normal;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        line-height: 1.3;
    }
    
    .wrapper-shop.premium-grid .card-product-info .price {
        font-size: 16px !important;
    }

    .wrapper-shop .card-product-wrapper .badge-bestseller {
        font-size: 9px;
        padding: 5px 10px;
    }
    
    .wrapper-shop.premium-list .card-product {
        flex-direction: column;
    }
    
    .wrapper-shop.premium-list .card-product-wrapper {
        width: 100%;
        height: 250px;
    }
    
    .wrapper-shop.premium-list .card-product-info {
        padding: 20px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title premium-header">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">New Arrival</div>
                <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p>
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->


<section class="flat-spacing-1 premium-shop">
    <div class="container-full">
        <div class="tf-shop-control align-items-center premium-controls d-flex justify-content-center">
            <ul class="tf-control-layout d-flex justify-content-center">
                <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                    <div class="item"><span class="icon icon-list"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                    <div class="item"><span class="icon icon-grid-2"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3" data-value-layout="tf-col-3">
                    <div class="item"><span class="icon icon-grid-3"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-4 active" data-value-layout="tf-col-4">
                    <div class="item"><span class="icon icon-grid-4"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-5" data-value-layout="tf-col-5">
                    <div class="item"><span class="icon icon-grid-5"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-6" data-value-layout="tf-col-6">
                    <div class="item"><span class="icon icon-grid-6"></span></div>
                </li>
            </ul>
        </div>
        <div class="wrapper-control-shop">
            <div class="tf-list-layout wrapper-shop premium-list" id="listLayout" style="display:none">
                <?php
                if(!empty($products)){
                    foreach ($products as $key => $data) { 
                        if($category == '0' || $category == $data->category_name){
                ?>
                <!-- card product 1 -->
                <div class="card-product list-layout" data-availability="In stock" data-brand="Ecomus">
                    <div class="card-product-wrapper">
                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="product-img">
                            <?php if($data->image_url == null){ ?>
                                 <span class="badge-bestseller"><?= $data->sub_category_name?></span>
                            <img class="lazyload img-product" data-src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" alt="image-product">
                            <img class="lazyload img-hover" data-src="<?= url('/') ?>/frontassets/images/products/white-1.jpg" src="<?= url('/') ?>/frontassets/images/products/white-1.jpg" alt="image-product">
                            <?php }else{ ?>
                                <img class="lazyload img-product" data-src="<?= url('/') ?>/<?= $data->image_url ?>" src="<?= url('/') ?>/<?= $data->image_url ?>" alt="image-product">
                            <img class="lazyload img-hover" data-src="<?= url('/') ?>/<?= $data->image_url ?>" src="<?= url('/') ?>/<?= $data->image_url ?>" alt="image-product">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="card-product-info">
                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="title link"><?=$data->color_name ?> <?= $data->product_name ?></a>
                        <span class="brand-text"><?= $data->sub_category_name ?></span>
                        <span class="price current-price">Rs.<?= $data->price ?></span>
                        <p class="description"><?= $data->short_desc ?></p>
                        <div class="list-product-btn">
                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add style-3 hover-tooltip"><span class="icon icon-bag"></span><span class="tooltip">Quick add</span></a>
                            <a href="javascript:void(0);" onclick="addToWishlist(<?= $data->id ?>)" class="box-icon wishlist style-3 hover-tooltip"><span class="icon icon-heart"></span> <span class="tooltip">Add to Wishlist</span></a>
                        </div>
                    </div>
                </div>
                <?php }}} ?>
            </div>
            <div class="tf-grid-layout wrapper-shop tf-col-4 premium-grid" id="gridLayout" style="display:grid">
                <?php
                if(!empty($products)){
                    foreach ($products as $key => $data) { 
                        if($category == '0' || $category == $data->category_name){
                ?>
                <!-- card product 1 -->
                <div class="card-product grid" data-availability="In stock" data-brand="Ecomus">
                    <div class="card-product-wrapper">
                        <div class="badge-bestseller"><?= $data->sub_category_name?></div>
                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="product-img">
                            <?php if($data->image_url == null){ ?>
                             <span class="badge-bestseller"><?= $data->sub_category_name?></span>
                            <img class="lazyload img-product" data-src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" alt="image-product">
                            <img class="lazyload img-hover" data-src="<?= url('/') ?>/frontassets/images/products/white-1.jpg" src="<?= url('/') ?>/frontassets/images/products/white-1.jpg" alt="image-product">
                            <?php }else{ ?>
                                <img class="lazyload img-product" data-src="<?= url('/') ?>/<?= $data->image_url ?>" src="<?= url('/') ?>/<?= $data->image_url ?>" alt="image-product">
                            <img class="lazyload img-hover" data-src="<?= url('/') ?>/<?= $data->image_url ?>" src="<?= url('/') ?>/<?= $data->image_url ?>" alt="image-product">
                            <?php } ?>
                        </a>
                        <div class="list-product-btn absolute-2">
                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                <span class="icon icon-bag"></span>
                                <span class="tooltip">Quick Add</span>
                            </a>
                            <a href="javascript:void(0);" onclick="addToWishlist(<?= $data->id ?>)" class="box-icon bg_white wishlist btn-icon-action">
                                <span class="icon icon-heart"></span>
                                <span class="tooltip">Add to Wishlist</span>
                                <span class="icon icon-delete"></span>
                            </a>
                        </div>
                        <div class="quick-add-overlay">
                             <div class="badge-bestseller"><?= $data->sub_category_name?></div>
                            <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="quick-add-btn">
                                <span class="icon icon-bag"></span>
                                Quick Shop
                            </a>
                        </div>
                    </div>
                    <div class="card-product-info">
                        <a href="<?= url('/') ?>/product/<?= $data->slug ?>/<?=$data->color ?>" class="title link"><?=$data->color_name ?> <?= $data->product_name ?></a>
                        <span class="price current-price">Rs.<?= $data->price ?></span>
                    </div>
                </div>
                <?php }}} ?>
            </div> <!-- end gridLayout -->

            <!-- consolidated pagination -->
            <ul class="wg-pagination tf-pagination-list premium-pagination justify-content-center mt-5">
                <li class="active">
                    <a href="#" class="pagination-link">1</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">2</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">3</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">4</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">
                        <span class="icon icon-arrow-right"></span>
                    </a>
                </li>
            </ul>
        </div> <!-- end wrapper-control-shop -->

        </div>
    </div>
</section>

<script src="<?= url('/') ?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
    function addtocart(id) {


        $.ajax({
            type: 'POST',
            url: '<?php echo url('/'); ?>/api/v1/order/add-cart',
            data: {
                'id': id,
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
</script>
@endsection
