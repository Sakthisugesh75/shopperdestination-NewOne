@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM MY ORDERS PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.orders-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.orders-premium-header::before {
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

.tf-page-title.orders-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

.tf-page-title.orders-premium-header .heading i {
    color: #667eea;
    margin-right: 12px;
}

/* Orders Section */
.orders-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 60px 0;
    min-height: 60vh;
}

/* Sidebar */
.orders-sidebar {
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

/* Orders Content */
.orders-content {
    padding-left: 20px;
}

.orders-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

.orders-count {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
}

.orders-count span {
    font-weight: 600;
    color: #1a1a3e;
}

/* Order Card */
.order-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.order-card:hover {
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.order-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
    border-bottom: 1px solid #eef1ff;
}

.order-info {
    display: flex;
    align-items: center;
    gap: 24px;
}

.order-number {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #1a1a3e;
}

.order-number span {
    color: #667eea;
}

.order-date {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #888;
}

/* Status Badge */
.order-status {
    padding: 8px 16px;
    border-radius: 50px;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.order-status.pending {
    background: rgba(255, 193, 7, 0.15);
    color: #d68910;
}

.order-status.processing {
    background: rgba(102, 126, 234, 0.15);
    color: #667eea;
}

.order-status.shipped {
    background: rgba(23, 162, 184, 0.15);
    color: #17a2b8;
}

.order-status.delivered {
    background: rgba(40, 167, 69, 0.15);
    color: #28a745;
}

.order-status.cancelled {
    background: rgba(220, 53, 69, 0.15);
    color: #dc3545;
}

/* Order Body */
.order-card-body {
    padding: 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.order-details {
    display: flex;
    gap: 40px;
}

.order-detail-item {
    text-align: center;
}

.order-detail-label {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: #888;
    margin-bottom: 4px;
    display: block;
}

.order-detail-value {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
}

.order-detail-value.price {
    font-family: 'Playfair Display', serif;
    color: #667eea;
}

/* Order Actions */
.order-actions {
    display: flex;
    gap: 12px;
}

.btn-order-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-order-action.view {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.btn-order-action.view:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    color: #fff;
}

.btn-order-action.track {
    background: #fff;
    color: #667eea;
    border: 2px solid #667eea;
}

.btn-order-action.track:hover {
    background: #667eea;
    color: #fff;
}

.btn-order-action.cancel {
    background: #fff;
    color: #dc3545;
    border: 2px solid #dc3545;
}

.btn-order-action.cancel:hover {
    background: #dc3545;
    color: #fff;
}

/* Empty Orders */
.orders-empty {
    text-align: center;
    padding: 60px 20px;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
}

.orders-empty-icon {
    font-size: 64px;
    margin-bottom: 20px;
}

.orders-empty h3 {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 12px;
}

.orders-empty p {
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
    .orders-content {
        padding-left: 0;
        margin-top: 24px;
    }
    
    .orders-sidebar {
        position: static;
    }
    
    .order-card-body {
        flex-direction: column;
        gap: 20px;
    }
    
    .order-actions {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 767.98px) {
    .order-card-header {
        flex-direction: column;
        gap: 12px;
        align-items: flex-start;
    }
    
    .order-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .order-details {
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    
    .order-actions {
        flex-wrap: wrap;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.orders-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.orders-premium-header .heading {
        font-size: 32px !important;
    }
    
    .orders-premium-section {
        padding: 40px 0;
    }
    
    .order-card-header,
    .order-card-body {
        padding: 16px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title orders-premium-header">
    <div class="container-full">
        <div class="heading text-center">
            <i class="icon icon-bag"></i>My Orders
        </div>
    </div>
</div>
<!-- /page-title -->

<!-- orders section -->
<section class="orders-premium-section">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="orders-sidebar">
                    <h3 class="sidebar-title">My Account</h3>
                    <ul class="sidebar-nav">
                        <li class="sidebar-nav-item">
                            <a href="<?= url('/') ?>/my-profile" class="sidebar-nav-link">
                                <i class="icon icon-account"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <span class="sidebar-nav-link active">
                                <i class="icon icon-bag"></i>
                                Orders
                            </span>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="<?= url('/') ?>/my-wishlist" class="sidebar-nav-link">
                                <i class="icon icon-heart"></i>
                                Wishlist
                            </a>
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
                <div class="orders-content">
                    <?php if(!empty($record)){ ?>
                    <div class="orders-header">
                        <div class="orders-count">
                            <span><?= count($record) ?></span> orders found
                        </div>
                    </div>
                    
                    <?php 
                    $i = 0;
                    foreach ($record as $key => $item) { 
                        $i++;
                        $statusClass = strtolower($item->order_status);
                        if(strpos($statusClass, 'pending') !== false) $statusClass = 'pending';
                        elseif(strpos($statusClass, 'process') !== false) $statusClass = 'processing';
                        elseif(strpos($statusClass, 'ship') !== false) $statusClass = 'shipped';
                        elseif(strpos($statusClass, 'deliver') !== false) $statusClass = 'delivered';
                        elseif(strpos($statusClass, 'cancel') !== false) $statusClass = 'cancelled';
                        else $statusClass = 'pending';
                    ?>
                    <div class="order-card">
                        <div class="order-card-header">
                            <div class="order-info">
                                <div class="order-number">Order #<span><?= $item->invoice_number ?></span></div>
                                <div class="order-date">Placed on <?= $item->created_date ?></div>
                            </div>
                            <span class="order-status <?= $statusClass ?>"><?= $item->order_status ?></span>
                        </div>
                        <div class="order-card-body">
                            <div class="order-details">
                                <div class="order-detail-item">
                                    <span class="order-detail-label">Items</span>
                                    <span class="order-detail-value"><?= $item->total_quantity ?></span>
                                </div>
                                <div class="order-detail-item">
                                    <span class="order-detail-label">Total</span>
                                    <span class="order-detail-value price">₹<?= $item->net_amount ?></span>
                                </div>
                            </div>
                            <div class="order-actions">
                                <a href="<?= url('/') ?>/user-invoice/<?= $item->id ?>" target="_blank" class="btn-order-action view">
                                    <i class="icon icon-view"></i>
                                    View Invoice
                                </a>
                                <?php if($item->awb_no != null){ ?>
                                <a href="https://www.delhivery.com/track-v2/package/<?= $item->awb_no ?>" target="_blank" class="btn-order-action track">
                                    <i class="icon icon-search"></i>
                                    Track Order
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php } else { ?>
                    <div class="orders-empty">
                        <div class="orders-empty-icon">📦</div>
                        <h3>No Orders Yet</h3>
                        <p>You haven't placed any orders yet. Start shopping now!</p>
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
<!-- /orders section -->

<script src="<?= url('/') ?>/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>
<script>
$(document).on("click", ".update-status", function (e) {
    e.preventDefault();
    var id = $(this).attr('data-hash');
    var status = 'CANCEL';
    
    Swal.fire({
        title: 'Cancel Order?',
        text: "Are you sure you want to cancel this order?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#667eea',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, cancel it'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:'POST',
                url:'<?php echo url('/');?>/api/v1/order/update-orderstus',
                data:{'order_id': id,'order_status':status},
                success:function(data) {
                    if(data.status =="SUCCESS") {
                        Swal.fire({
                            title: 'Cancelled!',
                            text: 'Your order has been cancelled.',
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
