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
