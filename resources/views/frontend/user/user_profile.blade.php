@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM MY ACCOUNT PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.account-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.account-premium-header::before {
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

.tf-page-title.account-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

.tf-page-title.account-premium-header .heading i {
    color: #667eea;
    margin-right: 12px;
}

/* Account Section */
.account-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 60px 0;
    min-height: 60vh;
}

/* Sidebar */
.account-sidebar {
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

/* Account Content */
.account-content {
    padding-left: 20px;
}

/* Welcome Card */
.welcome-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 24px;
    padding: 32px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
}

.welcome-card::before {
    content: '';
    position: absolute;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    top: -100px;
    right: -50px;
}

.welcome-card::after {
    content: '';
    position: absolute;
    width: 150px;
    height: 150px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    bottom: -50px;
    left: 50px;
}

.welcome-content {
    position: relative;
    z-index: 1;
}

.welcome-greeting {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 4px;
}

.welcome-name {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 12px;
}

.welcome-text {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

.welcome-text a {
    color: #fff;
    font-weight: 600;
    text-decoration: underline;
}

/* Stats Cards */
.stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-bottom: 24px;
}

.stat-card {
    background: #fff;
    border-radius: 16px;
    padding: 24px;
    text-align: center;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    text-decoration: none;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
    border-radius: 12px;
    font-size: 22px;
}

.stat-card.orders .stat-icon {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
}

.stat-card.wishlist .stat-icon {
    background: rgba(245, 87, 108, 0.1);
    color: #f5576c;
}

.stat-card.profile .stat-icon {
    background: rgba(118, 75, 162, 0.1);
    color: #764ba2;
}

.stat-label {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
}

/* Form Card */
.form-card {
    background: #fff;
    border-radius: 24px;
    padding: 32px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
}

.form-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.form-card-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
    margin-bottom: 24px;
}

.form-section-title {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a3e;
    margin-top: 24px;
    margin-bottom: 16px;
    padding-top: 24px;
    border-top: 1px solid #f0f2ff;
}

/* Form Fields */
.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.form-control-premium {
    width: 100%;
    padding: 14px 18px;
    background: #f8f9ff;
    border: 2px solid transparent;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #1a1a3e;
    transition: all 0.3s ease;
}

.form-control-premium:focus {
    outline: none;
    background: #fff;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.form-control-premium::placeholder {
    color: #999;
}

/* Submit Button */
.btn-save-changes {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 16px 32px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
}

.btn-save-changes:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
}

/* Responsive */
@media (max-width: 991.98px) {
    .account-content {
        padding-left: 0;
        margin-top: 24px;
    }
    
    .account-sidebar {
        position: static;
    }
    
    .stats-row {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 767.98px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .stats-row {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    
    .stat-card {
        display: flex;
        align-items: center;
        text-align: left;
        gap: 16px;
    }
    
    .stat-card .stat-icon {
        margin: 0;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.account-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.account-premium-header .heading {
        font-size: 32px !important;
    }
    
    .account-premium-section {
        padding: 40px 0;
    }
    
    .welcome-card,
    .form-card {
        padding: 24px;
    }
    
    .welcome-name {
        font-size: 24px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title account-premium-header">
    <div class="container-full">
        <div class="heading text-center">
            <i class="icon icon-account"></i>My Account
        </div>
    </div>
</div>
<!-- /page-title -->

<!-- account section -->
<section class="account-premium-section">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="account-sidebar">
                    <h3 class="sidebar-title">My Account</h3>
                    <ul class="sidebar-nav">
                        <li class="sidebar-nav-item">
                            <span class="sidebar-nav-link active">
                                <i class="icon icon-account"></i>
                                Dashboard
                            </span>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="<?= url('/') ?>/my-orders" class="sidebar-nav-link">
                                <i class="icon icon-bag"></i>
                                Orders
                            </a>
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
                <div class="account-content">
                    <!-- Welcome Card -->
                    <div class="welcome-card">
                        <div class="welcome-content">
                            <p class="welcome-greeting">Welcome back,</p>
                            <h2 class="welcome-name"><?php echo $users->first_name ?> <?php echo $users->last_name ?></h2>
                            <p class="welcome-text">
                                From your account dashboard you can view your <a href="<?= url('/') ?>/my-orders">recent orders</a> and manage your account settings.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Stats Row -->
                    <div class="stats-row">
                        <a href="<?= url('/') ?>/my-orders" class="stat-card orders">
                            <div class="stat-icon">
                                <i class="icon icon-bag"></i>
                            </div>
                            <span class="stat-label">My Orders</span>
                        </a>
                        <a href="<?= url('/') ?>/my-wishlist" class="stat-card wishlist">
                            <div class="stat-icon">
                                <i class="icon icon-heart"></i>
                            </div>
                            <span class="stat-label">Wishlist</span>
                        </a>
                        <a href="#editProfile" class="stat-card profile">
                            <div class="stat-icon">
                                <i class="icon icon-account"></i>
                            </div>
                            <span class="stat-label">Edit Profile</span>
                        </a>
                    </div>
                    
                    <!-- Edit Profile Form -->
                    <div class="form-card" id="editProfile">
                        <h3 class="form-card-title">Account Details</h3>
                        <p class="form-card-subtitle">Update your personal information and password</p>
                        
                        <form id="form-password-change" action="#">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control-premium" id="fName" name="fName" value="<?php echo $users->first_name ?>" placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control-premium" id="lName" name="lName" value="<?php echo $users->last_name ?>" placeholder="Enter last name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control-premium" id="email" name="email" value="<?php echo $users->email ?>" placeholder="Enter email address">
                            </div>
                            
                            <h4 class="form-section-title">Change Password</h4>
                            
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control-premium" id="currentPassword" name="currentPassword" placeholder="Enter current password">
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control-premium" id="newPassword" name="newPassword" placeholder="Enter new password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control-premium" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
                                </div>
                            </div>
                            
                            <div class="form-group" style="margin-top: 8px;">
                                <button type="submit" class="btn-save-changes">
                                    <i class="icon icon-check"></i>
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /account section -->

<script src="<?= url('/') ?>/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
document.getElementById('form-password-change').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Add your form submission logic here
    Swal.fire({
        title: 'Success!',
        text: 'Your account details have been updated.',
        icon: 'success',
        confirmButtonColor: '#667eea',
        confirmButtonText: 'OK'
    });
});
</script>

@endsection
