<!-- announcement-bar -->
<div class="announcement-bar bg_dark">
    <div class="wrap-announcement-bar">
        <div class="box-sw-announcement-bar" id="scrollList" style="height: 50px;">
            <div class="announcement-bar-item">
                <p>FREE SHIPPING AND RETURNS</p>
            </div>
        </div>
    </div>
    <span class="icon-close close-announcement-bar"></span>
</div>
<!-- /announcement-bar -->

<style>
/* Modern Header Styles - Premium Light Theme */
.modern-header {
    background: #ffffff;
    position: relative;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08); /* Softer shadow for light mode */
}

/* Removed dark overlay */
.modern-header::before {
    display: none;
}

.modern-header .header-container {
    padding: 0.8rem 2rem;
    position: relative;
    z-index: 1;
}

/* Logo Styling */
.modern-header .logo-wrapper {
    position: relative;
}

.modern-header .logo-wrapper img {
    height: 55px;
    /* Removed heavy drop-shadow for cleaner light look */
    filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.05));
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.modern-header .logo-wrapper:hover img {
    transform: scale(1.05);
    filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.1));
}

/* Navigation Links */
.modern-header .nav-menu {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.modern-header .nav-link-item {
    position: relative;
    padding: 0.6rem 1.5rem;
    color: #3e322c; /* Brand Dark Brown */
    font-size: 0.95rem;
    font-weight: 500;
    letter-spacing: 0.5px;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.modern-header .nav-link-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(62, 50, 44, 0.05); /* Very light brown tint */
    border-radius: 50px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.modern-header .nav-link-item:hover {
    color: #c5a992; /* Gold on hover */
    transform: translateY(-2px);
}

.modern-header .nav-link-item:hover::before {
    opacity: 1;
}

.modern-header .nav-link-item::after {
    content: '';
    position: absolute;
    bottom: 8px;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    width: 20px;
    height: 2px;
    background: #c5a992; /* Gold Accent */
    border-radius: 2px;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.modern-header .nav-link-item:hover::after {
    transform: translateX(-50%) scaleX(1);
}

/* Icon Buttons */
.modern-header .icon-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.modern-header .icon-btn {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    color: #3e322c; /* Dark Brown */
    background: #f9f9f9; /* Light grey bg */
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.modern-header .icon-btn:hover {
    color: #fff;
    background: #3e322c; /* Brand Brown on hover */
    border-color: #3e322c;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(62, 50, 44, 0.2);
}

.modern-header .icon-btn i {
    font-size: 1.15rem;
}

/* Badge Styling */
.modern-header .icon-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    min-width: 20px;
    height: 20px;
    padding: 0 6px;
    font-size: 11px;
    font-weight: 600;
    line-height: 20px;
    text-align: center;
    color: #fff;
    background: linear-gradient(135deg, #c5a992 0%, #a67c52 100%); /* Gold Gradient */
    border-radius: 50px;
    box-shadow: 0 2px 10px rgba(197, 169, 146, 0.4);
    animation: pulse-badge 2s infinite;
}

@keyframes pulse-badge {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* Dropdown Menu */
.modern-header .account-dropdown {
    position: relative;
}

.modern-header .dropdown-content {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: 12px;
    min-width: 200px;
    padding: 0.5rem 0;
    background: #ffffff; /* White Dropdown */
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1000;
}

.modern-header .account-dropdown:hover .dropdown-content {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.modern-header .dropdown-content::before {
    content: '';
    position: absolute;
    top: -8px;
    right: 16px;
    width: 16px;
    height: 16px;
    background: #ffffff;
    border-left: 1px solid rgba(0, 0, 0, 0.08);
    border-top: 1px solid rgba(0, 0, 0, 0.08);
    transform: rotate(45deg);
}

.modern-header .dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1.25rem;
    color: #4a4a4a;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.modern-header .dropdown-item:hover {
    color: #3e322c;
    background: #f9f9f9;
}

.modern-header .dropdown-item.danger {
    color: #dc3545;
}

.modern-header .dropdown-item.danger:hover {
    background: rgba(220, 53, 69, 0.05);
}

.modern-header .dropdown-divider {
    height: 1px;
    margin: 0.5rem 0;
    background: rgba(0, 0, 0, 0.05);
}

/* Mobile Menu Button */
.modern-header .mobile-menu-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    color: #3e322c;
    background: #f9f9f9;
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.modern-header .mobile-menu-btn:hover {
    color: #fff;
    background: #3e322c;
}

/* Responsive Adjustments */
@media (max-width: 1199px) {
    .modern-header .header-container {
        padding: 0.75rem 1rem;
    }
}

@media (max-width: 767px) {
    .modern-header .header-container {
        padding: 0.6rem 0.75rem;
    }
    
    .modern-header .logo-wrapper {
        display: flex;
        justify-content: center;
    }
    
    .modern-header .logo-wrapper img {
        height: 40px;
        max-width: 120px;
        object-fit: contain;
    }
    
    .modern-header .mobile-menu-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #f9f9f9;
        border: none;
    }
    
    .modern-header .mobile-menu-btn svg {
        width: 20px;
        height: 20px;
    }
    
    .modern-header .icon-actions {
        gap: 12px;
    }
    
    .modern-header .icon-btn {
        width: 36px;
        height: 36px;
        background: #f9f9f9;
        border: none;
    }
    
    .modern-header .icon-btn i {
        font-size: 1rem;
    }
    
    .modern-header .icon-badge {
        min-width: 16px;
        height: 16px;
        font-size: 9px;
        line-height: 16px;
        top: -2px;
        right: -2px;
        padding: 0 4px;
    }
    
    /* Mobile: Only show Search and Cart icons */
    .modern-header .icon-btn[title="Wishlist"] {
        display: none !important;
    }
    
    .modern-header .account-dropdown {
        display: none !important;
    }
    
    .modern-header .icon-btn[title="Login"] {
        display: none !important;
    }
    
    .modern-header .icon-btn[title="Account"] {
        display: none !important;
    }
}

@media (max-width: 575px) {
    .modern-header .header-container {
        padding: 0.5rem;
    }
    
    .modern-header .logo-wrapper img {
        height: 35px;
        max-width: 100px;
    }
    
    .modern-header .mobile-menu-btn {
        width: 36px;
        height: 36px;
    }
    
    .modern-header .icon-btn {
        width: 34px;
        height: 34px;
    }
}
</style>

<header id="header" class="header-default modern-header">
    <div class="header-container">
        <div class="row align-items-center">

            <!-- Mobile Menu -->
            <div class="col-2 d-xl-none">
                <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="mobileMenu" class="mobile-menu-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
            </div>

            <!-- Logo -->
            <div class="col-xl-3 col-6 col-md-4">
                <a href="<?= url('/') ?>/" class="logo-wrapper">
                    <img src="<?= url('/') ?>/frontassets/images/logo/E-Logoedit.png" width="100px" alt="logo">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="col-xl-6 d-none d-xl-flex justify-content-center">
                <nav class="nav-menu">
                    <a href="<?= url('/') ?>/" class="nav-link-item">Home</a>
                    <a href="<?= url('/') ?>/user-product/czoxOiIwIjs" class="nav-link-item">Shop</a>
                    <a href="<?= url('/') ?>/about-us" class="nav-link-item">About Us</a>
                    <a href="<?= url('/') ?>/contact-us" class="nav-link-item">Contact</a>
                </nav>
            </div>

            <!-- Icons -->
            <div class="col-xl-3 col-md-4 col-4">
                <div class="icon-actions justify-content-end">

                    <!-- Search -->
                    <a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="canvasSearch" class="icon-btn" title="Search">
                        <i class="icon icon-search"></i>
                    </a>

                    <!-- Account -->
                    <?php if(session('logged_in') == true){ ?>
                    <div class="account-dropdown">
                        <a href="#" class="icon-btn" title="Account">
                            <i class="icon icon-account"></i>
                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="<?= url('/') ?>/my-profile">
                                <i class="icon icon-account"></i> Profile
                            </a>
                            <a class="dropdown-item" href="<?= url('/') ?>/my-wishlist">
                                <i class="icon icon-heart"></i> Wishlist
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item danger" href="<?= url('/') ?>/logout">
                                <i class="icon icon-close"></i> Logout
                            </a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <a href="<?= url('/') ?>/user-login" class="icon-btn" title="Login">
                        <i class="icon icon-account"></i>
                    </a>
                    <?php } ?>

                    <!-- Wishlist -->
                    <a href="<?= url('/') ?>/my-wishlist" class="icon-btn" title="Wishlist">
                        <i class="icon icon-heart"></i>
                        <span class="icon-badge">0</span>
                    </a>

                    <!-- Cart -->
                    <a href="#shoppingCart" data-bs-toggle="modal" class="icon-btn" title="Cart">
                        <i class="icon icon-bag"></i>
                        <span class="icon-badge" id="cartcount">0</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Search Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasSearch" aria-labelledby="canvasSearchLabel">
    <style>
        #canvasSearch {
            background: #ffffff;
            border-left: 1px solid rgba(0, 0, 0, 0.08);
        }
        #canvasSearch .offcanvas-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
        }
        #canvasSearch .offcanvas-title {
            color: #3e322c;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
        }
        #canvasSearch .btn-close {
            filter: none;
            opacity: 0.5;
        }
        #canvasSearch .btn-close:hover {
            opacity: 1;
        }
        #canvasSearch .offcanvas-body {
            padding: 2rem 1.5rem;
        }
        #canvasSearch .search-form {
            position: relative;
        }
        #canvasSearch .search-input {
            width: 100%;
            padding: 1rem 1.25rem;
            padding-right: 60px;
            background: #f9f9f9;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 50px;
            color: #3e322c;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        #canvasSearch .search-input::placeholder {
            color: #888;
        }
        #canvasSearch .search-input:focus {
            outline: none;
            border-color: #c5a992; /* Gold Accent */
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(197, 169, 146, 0.15);
        }
        #canvasSearch .search-btn {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #3e322c; /* Brand Dark Brown */
            border: none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        #canvasSearch .search-btn:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 5px 20px rgba(62, 50, 44, 0.2);
            background: #2a221f;
        }
        #canvasSearch .search-btn i {
            font-size: 1.1rem;
        }
        #canvasSearch .search-suggestions {
            margin-top: 2rem;
        }
        #canvasSearch .suggestions-title {
            color: #3e322c;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        #canvasSearch .suggestion-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        #canvasSearch .suggestion-tag {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #f9f9f9;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 50px;
            color: #666;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        #canvasSearch .suggestion-tag:hover {
            background: #3e322c;
            border-color: #3e322c;
            color: #fff;
        }
    </style>
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="canvasSearchLabel">Search</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="<?= url('/') ?>/user-product/czoxOiIwIjs" method="GET" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Search for products..." autocomplete="off">
            <button type="submit" class="search-btn">
                <i class="icon icon-search"></i>
            </button>
        </form>
        <div class="search-suggestions">
            <p class="suggestions-title">Popular Searches</p>
            <div class="suggestion-tags">
                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs?search=dress" class="suggestion-tag">Dress</a>
                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs?search=tops" class="suggestion-tag">Tops</a>
                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs?search=bags" class="suggestion-tag">Bags</a>
                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs?search=shoes" class="suggestion-tag">Shoes</a>
                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs?search=new" class="suggestion-tag">New Arrivals</a>
            </div>
        </div>
    </div>
</div>
<!-- /Search Offcanvas -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Mobile Menu Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <style>
        #mobileMenu {
            background: #ffffff;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            max-width: 320px;
            width: 85%;
        }
        #mobileMenu .offcanvas-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
        }
        #mobileMenu .offcanvas-title {
            color: #3e322c;
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
        }
        #mobileMenu .btn-close {
            filter: none;
            opacity: 0.5;
        }
        #mobileMenu .btn-close:hover {
            opacity: 1;
        }
        #mobileMenu .offcanvas-body {
            padding: 1.5rem;
        }
        #mobileMenu .mobile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        #mobileMenu .mobile-nav-item {
            margin-bottom: 0.5rem;
        }
        #mobileMenu .mobile-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.875rem 1rem;
            color: #444;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        #mobileMenu .mobile-nav-link:hover,
        #mobileMenu .mobile-nav-link.active {
            color: #3e322c;
            background: rgba(62, 50, 44, 0.05);
        }
        #mobileMenu .mobile-nav-link i {
            font-size: 1.1rem;
            opacity: 0.7;
        }
        #mobileMenu .mobile-divider {
            height: 1px;
            background: rgba(0, 0, 0, 0.05);
            margin: 1rem 0;
        }
        #mobileMenu .mobile-nav-secondary .mobile-nav-link {
            color: #888;
            font-size: 0.9rem;
        }
        #mobileMenu .mobile-nav-secondary .mobile-nav-link:hover {
            color: #3e322c;
        }
    </style>
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="mobile-nav">
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/" class="mobile-nav-link">
                    <i class="icon icon-home"></i>
                    Home
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs" class="mobile-nav-link">
                    <i class="icon icon-shop"></i>
                    Shop
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/about-us" class="mobile-nav-link">
                    <i class="icon icon-user"></i>
                    About Us
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/contact-us" class="mobile-nav-link">
                    <i class="icon icon-mail"></i>
                    Contact
                </a>
            </li>
        </ul>
        
        <div class="mobile-divider"></div>
        
        <ul class="mobile-nav mobile-nav-secondary">
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/my-wishlist" class="mobile-nav-link">
                    <i class="icon icon-heart"></i>
                    Wishlist
                </a>
            </li>
            <?php if(session('logged_in') == true){ ?>
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/my-profile" class="mobile-nav-link">
                    <i class="icon icon-account"></i>
                    My Profile
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/logout" class="mobile-nav-link">
                    <i class="icon icon-close"></i>
                    Logout
                </a>
            </li>
            <?php } else { ?>
            <li class="mobile-nav-item">
                <a href="<?= url('/') ?>/user-login" class="mobile-nav-link">
                    <i class="icon icon-account"></i>
                    Login / Register
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!-- /Mobile Menu Offcanvas -->
