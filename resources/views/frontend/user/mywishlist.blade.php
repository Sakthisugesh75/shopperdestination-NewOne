@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM WISHLIST PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.wishlist-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.wishlist-premium-header::before {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    background: linear-gradient(135deg, rgba(245, 87, 108, 0.15), rgba(240, 147, 251, 0.15));
    border-radius: 50%;
    top: -250px;
    right: -100px;
    filter: blur(80px);
    pointer-events: none;
}

.tf-page-title.wishlist-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

.tf-page-title.wishlist-premium-header .heading i {
    color: #f5576c;
    margin-right: 12px;
}

/* Wishlist Section */
.wishlist-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 60px 0;
    min-height: 60vh;
}

/* Sidebar */
.wishlist-sidebar {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    padding: 24px;
    position: sticky;
    top: 100px;
}

.sidebar-title {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f0f2ff;
}

.sidebar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-nav-item {
    margin-bottom: 8px;
}

.sidebar-nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    color: #666;
    text-decoration: none;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 500;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.sidebar-nav-link:hover {
    color: #1a1a3e;
    background: #f8f9ff;
}

.sidebar-nav-link.active {
    color: #fff;
    background: linear-gradient(135deg, #667eea, #764ba2);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.sidebar-nav-link i {
    font-size: 18px;
}

/* Wishlist Content */
.wishlist-content {
    padding-left: 20px;
}

.wishlist-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

.wishlist-count {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
}

.wishlist-count span {
    font-weight: 600;
    color: #1a1a3e;
}

/* Wishlist Grid */
.wishlist-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

/* Wishlist Card */
.wishlist-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    transition: all 0.4s ease;
}

.wishlist-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
}

.wishlist-card-image {
    position: relative;
    aspect-ratio: 3/4;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
}

.wishlist-card-image a {
    display: block;
    width: 100%;
    height: 100%;
}

.wishlist-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.wishlist-card:hover .wishlist-card-image img {
    transform: scale(1.05);
}

.wishlist-card-actions {
    position: absolute;
    top: 12px;
    right: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.wishlist-action-btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 50%;
    color: #666;
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
}

.wishlist-action-btn:hover {
    transform: scale(1.1);
}

.wishlist-action-btn.delete:hover {
    background: #f5576c;
    color: #fff;
}

.wishlist-action-btn.cart:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
}

.wishlist-card-info {
    padding: 20px;
}

.wishlist-card-title {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    color: #1a1a3e;
    text-decoration: none;
    display: block;
    margin-bottom: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.wishlist-card-title:hover {
    color: #667eea;
}

.wishlist-card-price {
    display: flex;
    align-items: center;
    gap: 10px;
}

.wishlist-current-price {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    font-weight: 600;
    color: #1a1a3e;
}

.wishlist-old-price {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #999;
    text-decoration: line-through;
}

/* Empty Wishlist */
.wishlist-empty {
    text-align: center;
    padding: 60px 20px;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
}

.wishlist-empty-icon {
    font-size: 64px;
    margin-bottom: 20px;
}

.wishlist-empty h3 {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 12px;
}

.wishlist-empty p {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
    margin-bottom: 24px;
}

.btn-shop-now {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
}

.btn-shop-now:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
    color: #fff;
}

/* Responsive */
@media (max-width: 991.98px) {
    .wishlist-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .wishlist-content {
        padding-left: 0;
        margin-top: 24px;
    }
    
    .wishlist-sidebar {
        position: static;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.wishlist-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.wishlist-premium-header .heading {
        font-size: 32px !important;
    }
    
    .wishlist-premium-section {
        padding: 40px 0;
    }
    
    .wishlist-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .wishlist-card-info {
        padding: 16px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title wishlist-premium-header">
    <div class="container-full">
        <div class="heading text-center">
            <i class="icon icon-heart"></i>My Wishlist
        </div>
    </div>
</div>
<!-- /page-title -->

<!-- wishlist section -->
<section class="wishlist-premium-section">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="wishlist-sidebar">
                    <h3 class="sidebar-title">My Account</h3>
                    <ul class="sidebar-nav">
                        <li class="sidebar-nav-item">
                            <a href="<?= url('/') ?>/my-profile" class="sidebar-nav-link">
                                <i class="icon icon-account"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="<?= url('/') ?>/my-orders" class="sidebar-nav-link">
                                <i class="icon icon-bag"></i>
                                Orders
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <span class="sidebar-nav-link active">
                                <i class="icon icon-heart"></i>
                                Wishlist
                            </span>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="<?= url('/') ?>/logout" class="sidebar-nav-link">
                                <i class="icon icon-close"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Content -->
            <div class="col-lg-9">
                <div class="wishlist-content">
                    <?php if(!empty($wishlist)){ ?>
                    <div class="wishlist-header">
                        <div class="wishlist-count">
                            <span><?= count($wishlist) ?></span> items in your wishlist
                        </div>
                    </div>
                    
                    <div class="wishlist-grid">
                        <?php foreach ($wishlist as $key => $item) { ?>
                        <div class="wishlist-card">
                            <div class="wishlist-card-image">
                                <a href="<?= url('/') ?>/product/<?= $item->slug ?>/<?=$item->color ?>">
                                    <?php if($item->image_url == null){ ?>
                                    <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" src="<?= url('/') ?>/frontassets/images/products/orange-1.jpg" alt="<?= $item->product_name ?>">
                                    <?php }else{ ?>
                                    <img class="lazyload" data-src="<?= url('/') ?>/<?=$item->image_url ?>" src="<?= url('/') ?>/<?=$item->image_url ?>" alt="<?= $item->product_name ?>">
                                    <?php } ?>
                                </a>
                                <div class="wishlist-card-actions">
                                    <button class="wishlist-action-btn delete delete-value" data-hash="<?= $item->id ?>" title="Remove">
                                        <i class="icon icon-delete"></i>
                                    </button>
                                    <a href="<?= url('/') ?>/product/<?= $item->slug ?>/<?=$item->color ?>" class="wishlist-action-btn cart" title="View Product">
                                        <i class="icon icon-bag"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="wishlist-card-info">
                                <a href="<?= url('/') ?>/product/<?= $item->slug ?>/<?=$item->color ?>" class="wishlist-card-title">
                                    <?= $item->product_name ?>
                                </a>
                                <div class="wishlist-card-price">
                                    <span class="wishlist-current-price">Rs.<?= $item->price ?></span>
                                    <span class="wishlist-old-price">Rs.<?= $item->old_price ?></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } else { ?>
                    <div class="wishlist-empty">
                        <div class="wishlist-empty-icon">💔</div>
                        <h3>Your Wishlist is Empty</h3>
                        <p>Save your favorite items here to buy them later</p>
                        <a href="<?= url('/') ?>/user-product/czoxOiIwIjs" class="btn-shop-now">
                            <i class="icon icon-shop"></i>
                            Start Shopping
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /wishlist section -->

<script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
$(document).on("click", ".delete-value", function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Remove from Wishlist?',
        text: "This item will be removed from your wishlist",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#667eea',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('data-hash');
            $.ajax({
                type:'DELETE',
                url:'<?php echo url('/');?>/api/v1/products/remove-wishlist',
                data:{'id': id},
                success:function(data) {
                    console.log(data);
                    if(data.status =="SUCCESS") {
                        Swal.fire({
                            title: 'Removed!',
                            text: 'Item has been removed from your wishlist.',
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
    });
});
</script>

@endsection
