@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM COMBO DETAIL PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Section */
.combo-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 60px 0;
    min-height: 100vh;
}

/* Breadcrumb */
.combo-breadcrumb {
    padding: 20px 0;
    margin-bottom: 20px;
}

.combo-breadcrumb ol {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0;
    margin: 0;
}

.combo-breadcrumb li {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #888;
}

.combo-breadcrumb li a {
    color: #667eea;
    text-decoration: none;
    transition: color 0.3s ease;
}

.combo-breadcrumb li a:hover {
    color: #764ba2;
}

.combo-breadcrumb li.active {
    color: #1a1a3e;
    font-weight: 500;
}

/* Main Content Card */
.combo-main-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    margin-bottom: 40px;
}

/* Gallery Section */
.combo-gallery {
    padding: 32px;
    background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
}

.combo-main-image {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 16px;
    background: #fff;
}

.combo-main-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}

.combo-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    padding: 8px 16px;
    background: linear-gradient(135deg, #f5576c, #ff6b6b);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 50px;
}

.combo-thumbnails {
    display: flex;
    gap: 12px;
    overflow-x: auto;
    padding-bottom: 8px;
}

.combo-thumb {
    flex-shrink: 0;
    width: 80px;
    height: 80px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    border: 3px solid transparent;
    transition: all 0.3s ease;
}

.combo-thumb.active,
.combo-thumb:hover {
    border-color: #667eea;
}

.combo-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Info Section */
.combo-info {
    padding: 40px;
}

.combo-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 16px;
}

/* Rating */
.combo-rating {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 24px;
}

.combo-stars {
    display: flex;
    gap: 4px;
    color: #ffc107;
    font-size: 16px;
}

.combo-reviews {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #888;
}

.combo-reviews a {
    color: #667eea;
    text-decoration: none;
}

/* Price */
.combo-price-box {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
    padding: 20px;
    background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
    border-radius: 16px;
}

.combo-current-price {
    font-family: 'Playfair Display', serif;
    font-size: 36px;
    font-weight: 700;
    color: #1a1a3e;
}

.combo-old-price {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    color: #999;
    text-decoration: line-through;
}

.combo-discount {
    padding: 6px 14px;
    background: linear-gradient(135deg, #28a745, #34ce57);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    border-radius: 50px;
}

/* Description */
.combo-description {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
    line-height: 1.7;
    margin-bottom: 32px;
    padding-bottom: 24px;
    border-bottom: 1px solid #f0f2ff;
}

/* Variants Section */
.combo-variants {
    margin-bottom: 32px;
}

.variant-title {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 20px;
}

.variant-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
    padding: 20px;
    background: #f8f9ff;
    border-radius: 12px;
}

.variant-row label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #555;
    margin-bottom: 8px;
    display: block;
}

.variant-select {
    width: 100%;
    padding: 12px 16px;
    background: #fff;
    border: 2px solid #e0e4f5;
    border-radius: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #1a1a3e;
    cursor: pointer;
    transition: all 0.3s ease;
}

.variant-select:focus {
    outline: none;
    border-color: #667eea;
}

.variant-item-number {
    font-family: 'Playfair Display', serif;
    font-size: 14px;
    font-weight: 600;
    color: #667eea;
    margin-bottom: 12px;
}

/* Action Buttons */
.combo-actions {
    display: flex;
    gap: 16px;
    margin-bottom: 24px;
}

.btn-combo-action {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 18px 32px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-combo-action.primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
}

.btn-combo-action.primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
}

.btn-combo-action.secondary {
    background: #1a1a3e;
    color: #fff;
}

.btn-combo-action.secondary:hover {
    background: #2d2d5a;
    transform: translateY(-3px);
}

/* Wishlist Link */
.combo-wishlist {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
    margin-bottom: 24px;
}

.combo-wishlist:hover {
    color: #f5576c;
}

/* Social Share */
.combo-share {
    display: flex;
    align-items: center;
    gap: 16px;
    padding-top: 24px;
    border-top: 1px solid #f0f2ff;
}

.combo-share span {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #888;
}

.combo-share-links {
    display: flex;
    gap: 12px;
}

.combo-share-links a {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f2ff;
    color: #666;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
}

.combo-share-links a:hover {
    background: #667eea;
    color: #fff;
}

/* Reviews Section */
.combo-reviews-section {
    background: #fff;
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
}

.reviews-title {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 32px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f0f2ff;
}

.review-card {
    display: flex;
    gap: 20px;
    padding: 24px 0;
    border-bottom: 1px solid #f0f2ff;
}

.review-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
}

.review-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.review-content {
    flex: 1;
}

.review-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
}

.review-name {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    color: #1a1a3e;
}

.review-stars {
    display: flex;
    gap: 4px;
    color: #ffc107;
    font-size: 14px;
}

.review-text {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
    line-height: 1.7;
}

/* Review Form */
.review-form-card {
    background: #f8f9ff;
    border-radius: 16px;
    padding: 24px;
    margin-top: 32px;
}

.review-form-title {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 20px;
}

.review-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}

.review-input {
    width: 100%;
    padding: 14px 18px;
    background: #fff;
    border: 2px solid transparent;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    transition: all 0.3s ease;
}

.review-input:focus {
    outline: none;
    border-color: #667eea;
}

.review-textarea {
    width: 100%;
    padding: 14px 18px;
    background: #fff;
    border: 2px solid transparent;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    min-height: 120px;
    resize: vertical;
    transition: all 0.3s ease;
    margin-bottom: 16px;
}

.review-textarea:focus {
    outline: none;
    border-color: #667eea;
}

.btn-submit-review {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 28px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-submit-review:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

/* Responsive */
@media (max-width: 991.98px) {
    .combo-info {
        padding: 32px;
    }
    
    .combo-title {
        font-size: 28px;
    }
}

@media (max-width: 767.98px) {
    .combo-premium-section {
        padding: 40px 0;
    }
    
    .combo-gallery,
    .combo-info {
        padding: 24px;
    }
    
    .combo-main-image img {
        height: 350px;
    }
    
    .combo-title {
        font-size: 24px;
    }
    
    .combo-current-price {
        font-size: 28px;
    }
    
    .combo-actions {
        flex-direction: column;
    }
    
    .variant-row {
        grid-template-columns: 1fr;
    }
    
    .review-form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Combo Section -->
<section class="combo-premium-section">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="combo-breadcrumb">
            <ol>
                <li><a href="<?= url('/') ?>/">Home</a> •</li>
                <li><a href="<?= url('/') ?>/user-product/czoxOiIwIjs">Products</a> •</li>
                <li class="active">Combo Details</li>
            </ol>
        </nav>

        <!-- Main Content -->
        <div class="combo-main-card">
            <div class="row g-0">
                <!-- Gallery -->
                <div class="col-lg-6">
                    <div class="combo-gallery">
                        <div class="combo-main-image">
                            <span class="combo-badge">Combo Deal</span>
                            <?php if(!empty($images) && isset($images[0])){ ?>
                            <img id="mainImage" src="<?= url('/') ?>/<?=$images[0]->image_url?>" alt="<?php echo $products->combo_name ?>">
                            <?php } ?>
                        </div>
                        <div class="combo-thumbnails">
                            <?php if(!empty($images)){
                                foreach ($images as $key => $value) { ?>
                            <div class="combo-thumb <?= $key == 0 ? 'active' : '' ?>" onclick="changeImage(this, '<?= url('/') ?>/<?=$value->image_url?>')">
                                <img src="<?= url('/') ?>/<?=$value->image_url?>" alt="thumbnail">
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="col-lg-6">
                    <div class="combo-info">
                        <h1 class="combo-title"><?php echo $products->combo_name ?></h1>

                        <div class="combo-rating">
                            <div class="combo-stars">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <span class="combo-reviews">5.0 (1 review) • <a href="#reviews">Write a review</a></span>
                        </div>

                        <div class="combo-price-box">
                            <span class="combo-current-price" id="price">₹<?php echo $products->price; ?></span>
                            <span class="combo-old-price" id="old_price">₹<?php echo $products->mrp; ?></span>
                            <?php $profit = (($products->mrp - $products->price) / $products->mrp) * 100; ?>
                            <span class="combo-discount" id="save-badge">Save <?php echo round($profit); ?>%</span>
                        </div>

                        <p class="combo-description"><?php echo $products->combo_name; ?></p>

                        <!-- Variants -->
                        <div class="combo-variants">
                            <h3 class="variant-title">Select Options for Each Item</h3>
                            <form id="sizeDt" action="#" method="POST">
                                <input type="hidden" id="combo" name="combo" value="1">
                                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $products->id ?>">
                                
                                <?php
                                $count = 0;
                                for($i = 0; $i < $products->qty; $i++){
                                    $count = $count + 1;
                                ?>
                                <div class="variant-row">
                                    <div class="variant-item-number">Item <?=$count?></div>
                                    <div></div>
                                    <div>
                                        <label for="color_<?=$i?>">Color</label>
                                        <select class="variant-select" name="color[]" id="color_<?=$i?>">
                                            <option value="">Select Color</option>
                                            <?php if(!empty($color)){
                                                foreach ($color as $data) { ?>
                                            <option value="<?=$data->id?>"><?=$data->color?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="size_<?=$i?>">Size</label>
                                        <select class="variant-select" name="size[]" id="size_<?=$i?>">
                                            <option value="">Select Size</option>
                                            <?php if(!empty($size)){
                                                foreach ($size as $data) { ?>
                                            <option value="<?=$data->id?>"><?=$data->size?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                            </form>
                        </div>

                        <!-- Actions -->
                        <div class="combo-actions">
                            <button class="btn-combo-action primary" onclick="addtocart(<?php echo $products->id ?>)">
                                <i class="icon icon-bag"></i>
                                Add to Cart
                            </button>
                            <button class="btn-combo-action secondary" onclick="buyNow(<?php echo $products->id ?>)">
                                <i class="icon icon-cart"></i>
                                Buy Now
                            </button>
                        </div>

                        <a href="javascript:void(0);" onclick="addToWishlist(<?php echo $products->id ?>)" class="combo-wishlist">
                            <i class="icon icon-heart"></i>
                            Add to Wishlist
                        </a>

                        <div class="combo-share">
                            <span>Share:</span>
                            <div class="combo-share-links">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                                <a href="#"><i class="ion-social-pinterest"></i></a>
                                <a href="#"><i class="ion-social-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="combo-reviews-section" id="reviews">
            <h2 class="reviews-title">Customer Reviews</h2>

            <div class="review-card">
                <div class="review-avatar">
                    <img src="<?= url('/') ?>/frontassets/img/testimonial-image/1.png" alt="reviewer">
                </div>
                <div class="review-content">
                    <div class="review-header">
                        <span class="review-name">White Lewis</span>
                        <div class="review-stars">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                    </div>
                    <p class="review-text">Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.</p>
                </div>
            </div>

            <!-- Review Form -->
            <div class="review-form-card">
                <h3 class="review-form-title">Add a Review</h3>
                <form action="#">
                    <div class="combo-rating" style="margin-bottom: 20px;">
                        <span style="font-size: 14px; color: #666;">Your Rating:</span>
                        <div class="combo-stars" style="cursor: pointer;">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                    </div>
                    <div class="review-form-row">
                        <input type="text" class="review-input" placeholder="Your Name">
                        <input type="email" class="review-input" placeholder="Your Email">
                    </div>
                    <textarea class="review-textarea" placeholder="Your Review"></textarea>
                    <button type="submit" class="btn-submit-review">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="<?= url('/') ?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
// Image gallery
function changeImage(thumb, src) {
    document.getElementById('mainImage').src = src;
    document.querySelectorAll('.combo-thumb').forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
}

// Add to cart
function addtocart(id) {
    var formInstance = document.getElementById('sizeDt');
    event.preventDefault();
    
    var headers = new Headers();
    headers.set('Accept', 'application/json');
    var formData = new FormData();
    let data = {};

    for (var i = 0; i < formInstance.length; ++i) {
        var fieldName = formInstance[i].name;
        var fieldValue = formInstance[i].value;
        data[fieldName] = fieldValue;
    }

    $.ajax({
        type: 'POST',
        url: '<?php echo url('/'); ?>/api/v1/order/add-cart',
        data: { 'id': id },
        success: function(data) {
            if (data.status == "SUCCESS") {
                Swal.fire({
                    title: 'Added to Cart!',
                    text: 'Combo has been added to your cart',
                    icon: 'success',
                    confirmButtonColor: '#667eea'
                }).then(() => {
                    window.location.href = "<?php echo url('/'); ?>/cart";
                });
            } else {
                Swal.fire('Error', data.message, 'error');
            }
        }
    });
}

// Buy now
function buyNow(id) {
    addtocart(id);
}

// Add to wishlist
function addToWishlist(id) {
    $.ajax({
        type: 'POST',
        url: '<?php echo url('/'); ?>/api/v1/products/add-wishlist',
        data: { 'prod_id': id },
        success: function(data) {
            if (data.status == "SUCCESS") {
                Swal.fire({
                    title: 'Added to Wishlist!',
                    text: 'Combo has been added to your wishlist',
                    icon: 'success',
                    confirmButtonColor: '#667eea'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire('Error', data.message, 'error');
            }
        }
    });
}
</script>

@endsection
