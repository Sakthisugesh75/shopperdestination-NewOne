<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Shoppers Destination</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- font -->
   <link rel="stylesheet" href="<?= url('/') ?>/frontassets/fonts/fonts.css">
   <!-- Icons -->
   <link rel="stylesheet" href="<?= url('/') ?>/frontassets/fonts/font-icons.css">
   <link rel="stylesheet" href="<?= url('/') ?>/frontassets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= url('/') ?>/frontassets/css/swiper-bundle.min.css">
   <link rel="stylesheet" href="<?= url('/') ?>/frontassets/css/animate.css">
   <link rel="stylesheet"type="text/css" href="<?= url('/') ?>/frontassets/css/styles.css"/>


    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="<?= url('/') ?>/frontassets/images/logo/favicon.png">
<link rel="apple-touch-icon-precomposed" href="<?= url('/') ?>/frontassets/images/logo/favicon.png">

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1740595333570247');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1740595333570247&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body class="preload-wrapper">

    <!-- RTL -->
    <!-- <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-hover-btn btn-fill">RTL</a> -->
    <!-- /RTL  -->
    <!-- preload -->
    {{-- <div class="preload preload-container">
        <div class="preload-logo">
            <img src="<?= url('/') ?>/frontassets/images/logo/preloader.png" alt="" style="width: 80%;">
        </div>
    </div> --}}

    <!-- /preload -->
    <div id="wrapper">

    @include('frontend.header')
    @yield('content')
    @include('frontend.footer')
</div>

<!-- gotop -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
    </svg>
</div>
<!-- /gotop -->

<!-- toolbar-bottom -->
<div class="tf-toolbar-bottom type-1150">
    <div class="toolbar-item">
        <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
            <div class="toolbar-icon">
                <i class="icon-shop"></i>
            </div>
            <div class="toolbar-label">Shop</div>
        </a>
    </div>

    <div class="toolbar-item">
        <a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
            <div class="toolbar-icon">
                <i class="icon-search"></i>
            </div>
            <div class="toolbar-label">Search</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="<?= url('/') ?>/user-login" >
            <div class="toolbar-icon">
                <i class="icon-account"></i>
            </div>
            <div class="toolbar-label">Account</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="<?= url('/') ?>/my-wishlist">
            <div class="toolbar-icon">
                <i class="icon-heart"></i>
                <div class="toolbar-count">0</div>
            </div>
            <div class="toolbar-label">Wishlist</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="#shoppingCart" data-bs-toggle="modal">
            <div class="toolbar-icon">
                <i class="icon-bag"></i>
                <div class="toolbar-count" id="cartcount1">1</div>
            </div>
            <div class="toolbar-label">Cart</div>
        </a>
    </div>
</div>
<!-- /toolbar-bottom -->

<!-- modalDemo -->
<div class="modal fade modalDemo" id="modalDemo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <h5 class="demo-title">Ultimate HTML Theme</h5>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="mega-menu">
                <div class="row-demo">
                    <div class="demo-item">
                        <a href="index.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-01.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-01.jpg" alt="home-01">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                    <span>Trend</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Fashion 01</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-multi-brand.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-multi-brand.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-multi-brand.jpg" alt="home-multi-brand">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Multi Brand</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-02.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-02.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-02.jpg" alt="home-02">
                                <div class="demo-label">
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Fashion 02</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-03.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-03.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-03.jpg" alt="home-03">
                            </div>
                            <span class="demo-name">Home Fashion 03</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-04.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-04.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-04.jpg" alt="home-04">
                            </div>
                            <span class="demo-name">Home Fashion 04</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-05.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-05.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-05.jpg" alt="home-05">
                            </div>
                            <span class="demo-name">Home Fashion 05</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-06.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-06.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-06.jpg" alt="home-06">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Fashion 06</span>
                        </a>
                    </div>
                    <div class="demo-item position-relative">
                        <a href="home-personalized-pod.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-personalized-pod.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-personalized-pod.jpg" alt="home-personalized-pod">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Personalized Pod</span>
                        </a>
                    </div>
                    <div class="demo-item position-relative">
                        <a href="home-pickleball.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-pickleball.png" src="<?= url('/') ?>/frontassets/images/demo/home-pickleball.png" alt="home-pickleball">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Pickleball</span>
                        </a>
                    </div>
                    <div class="demo-item position-relative">
                        <a href="home-ceramic.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-ceramic.png" src="<?= url('/') ?>/frontassets/images/demo/home-ceramic.png" alt="home-ceramic">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Ceramic</span>
                        </a>
                    </div>
                    <div class="demo-item position-relative">
                        <a href="home-food.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-food.png" src="<?= url('/') ?>/frontassets/images/demo/home-food.png" alt="home-food">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Food</span>
                        </a>
                    </div>
                    <div class="demo-item position-relative">
                        <a href="home-camp-and-hike.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-camp-and-hike.png" src="<?= url('/') ?>/frontassets/images/demo/home-camp-and-hike.png" alt="home-camp-and-hike">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Camp And Hike</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-07.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-07.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-07.jpg" alt="home-07">
                            </div>
                            <span class="demo-name">Home Fashion 07</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-08.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-08.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-08.jpg" alt="home-08">
                            </div>
                            <span class="demo-name">Home Fashion 08</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-skincare.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-skincare.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-skincare.jpg" alt="home-skincare">
                            </div>
                            <span class="demo-name">Home Skincare</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-headphone.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-headphone.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-headphone.jpg" alt="home-headphone">
                            </div>
                            <span class="demo-name">Home Headphone</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-giftcard.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-giftcard.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-giftcard.jpg" alt="home-gift-card">
                            </div>
                            <span class="demo-name">Home Gift Card</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-furniture.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-furniture.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-furniture.jpg" alt="home-furniture">
                            </div>
                            <span class="demo-name">Home Furniture</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-furniture-02.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-furniture2.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-furniture2.jpg" alt="home-furniture-2">
                            </div>
                            <span class="demo-name">Home Furniture 2</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-skateboard.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-skateboard.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-skateboard.jpg" alt="home-skateboard">
                            </div>
                            <span class="demo-name">Home Skateboard</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-stroller.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-stroller.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-stroller.jpg" alt="home-stroller">
                            </div>
                            <span class="demo-name">Home Stroller</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-decor.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-decor.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-decor.jpg" alt="home-decor">
                            </div>
                            <span class="demo-name">Home Decor</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-electronic.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-electronic.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-electronic.jpg" alt="home-electronic">
                            </div>
                            <span class="demo-name">Home Electronic</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-setup-gear.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-setup-gear.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-setup-gear.jpg" alt="home-setup-gear">
                            </div>
                            <span class="demo-name">Home Setup Gear</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-dog-accessories.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-dog-accessories.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-dog-accessories.jpg" alt="home-dog-accessories">
                            </div>
                            <span class="demo-name">Home Dog Accessories</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-kitchen-wear.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-kitchen.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-kitchen.jpg" alt="home-kitchen-wear">
                            </div>
                            <span class="demo-name">Home Kitchen Wear</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-phonecase.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-phonecase.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-phonecase.jpg" alt="home-phonecase">
                            </div>
                            <span class="demo-name">Home Phonecase</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-paddle-boards.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home_paddle_board.jpg" src="<?= url('/') ?>/frontassets/images/demo/home_paddle_board.jpg" alt="home-paddle_board">
                            </div>
                            <span class="demo-name">Home Paddle Boards</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-glasses.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-glasses.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-glasses.jpg" alt="home-glasses">
                            </div>
                            <span class="demo-name">Home Glasses</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-pod-store.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-pod-store.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-pod-store.jpg" alt="home-pod-store">
                            </div>
                            <span class="demo-name">Home POD Store</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-activewear.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-activewear.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-activewear.jpg" alt="home-activewear">
                            </div>
                            <span class="demo-name">Activewear</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-handbag.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-handbag.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-handbag.jpg" alt="home-handbag">
                            </div>
                            <span class="demo-name">Home Handbag</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-tee.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-tee.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-tee.jpg" alt="home-tee">
                            </div>
                            <span class="demo-name">Home Tee</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-sock.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-socks.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-socks.jpg" alt="home-sock">
                            </div>
                            <span class="demo-name">Home Sock</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-jewerly.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-jewelry.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-jewelry.jpg" alt="home-jewelry">
                            </div>
                            <span class="demo-name">Home Jewelry</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-sneaker.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-sneaker.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-sneaker.jpg" alt="home-sneaker">
                            </div>
                            <span class="demo-name">Home Sneaker</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-accessories.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-accessories.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-accessories.jpg" alt="home-accessories">
                            </div>
                            <span class="demo-name">Home Accessories</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-grocery.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-gocery.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-gocery.jpg" alt="home-grocery">
                            </div>
                            <span class="demo-name">Home Grocery</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-baby.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-baby.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-baby.jpg" alt="home-baby">
                            </div>
                            <span class="demo-name">Home Baby</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-cosmetic.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-cosmetic.png" src="<?= url('/') ?>/frontassets/images/demo/home-cosmetic.png" alt="home-cosmetic">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Cosmetic</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-plant.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-plant.png" src="<?= url('/') ?>/frontassets/images/demo/home-plant.png" alt="home-plant">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Plant</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-swimwear.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-swimwear.png" src="<?= url('/') ?>/frontassets/images/demo/home-swimwear.png" alt="home-swimwear">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Swimwear</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-electric-bike.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-electric-bike.png" src="<?= url('/') ?>/frontassets/images/demo/home-electric-bike.png" alt="home-electric-bike">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Electric Bike</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-footwear.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-footwear.jpg" src="<?= url('/') ?>/frontassets/images/demo/home-footwear.jpg" alt="home-footwear">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Footwear</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-book-store.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-bookstore.png" src="<?= url('/') ?>/frontassets/images/demo/home-bookstore.png" alt="home-bookstore">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Bookstore</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-gaming-accessories.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="<?= url('/') ?>/frontassets/images/demo/home-gaming-accessories.png" src="<?= url('/') ?>/frontassets/images/demo/home-gaming-accessories.png" alt="home-gaming-accessories">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Home Gaming Accessories</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /modalDemo -->







<!-- toolbarShopmb -->
<div class="offcanvas offcanvas-start canvas-mb toolbar-shop-mobile" id="toolbarShopmb">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate1.jpg" alt="">
                        </div>
                        <span>Accessories</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate2.jpg" alt="">
                        </div>
                        <span>Dog</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate3.jpg" alt="">
                        </div>
                        <span>Grocery</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate4.png" alt="">
                        </div>
                        <span>Handbag</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-one" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-one">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate5.jpg" alt="">
                        </div>
                        <span>Fashion</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-one" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation">
                            <li>
                                <a href="#cate-shop-one" class="tf-category-link has-children sub-nav-link collapsed"  data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-shop-one">
                                    <div class="image">
                                        <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate6.jpg" alt="">
                                    </div>
                                    <span>Mens</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="cate-shop-one" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate1.jpg" alt="">
                                                </div>
                                                <span>Accessories</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate8.jpg" alt="">
                                                </div>
                                                <span>Shoes</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#cate-shop-two" class="tf-category-link has-children sub-nav-link collapsed"  data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-shop-two">
                                    <div class="image">
                                        <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate9.jpg" alt="">
                                    </div>
                                    <span>Womens</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="cate-shop-two" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate4.png" alt="">
                                                </div>
                                                <span>Handbag</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate7.jpg" alt="">
                                                </div>
                                                <span>Tee</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-two" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-two">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate6.jpg" alt="">
                        </div>
                        <span>Men</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-two" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation1">
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate1.jpg" alt="">
                                    </div>
                                    <span>Accessories</span>
                                </a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate8.jpg" alt="">
                                    </div>
                                    <span>Shoes</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate7.jpg" alt="">
                        </div>
                        <span>Tee</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate8.jpg" alt="">
                        </div>
                        <span>Shoes</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-three" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-three">
                        <div class="image">
                            <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate9.jpg" alt="">
                        </div>
                        <span>Women</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-three" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation2">
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate4.png" alt="">
                                    </div>
                                    <span>Handbag</span>
                                </a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="<?= url('/') ?>/frontassets/images/shop/cate/cate7.jpg" alt="">
                                    </div>
                                    <span>Tee</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-bottom">
            <a href="shop-default.html" class="tf-btn fw-5 btn-line">View all collection<i class="icon icon-arrow1-top-left"></i></a>
        </div>
    </div>
</div>
<!-- /toolbarShopmb -->









<!-- modal find_size -->
<div class="modal fade modalDemo tf-product-modal" id="find_size">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Size chart</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-rte">
                <div class="tf-table-res-df">
                    <h6>Size guide</h6>
                    <table class="tf-sizeguide-table">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>US</th>
                                <th>Bust</th>
                                <th>Waist</th>
                                <th>Low Hip</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>XS</td>
                                <td>2</td>
                                <td>32</td>
                                <td>24 - 25</td>
                                <td>33 - 34</td>
                            </tr>
                            <tr>
                                <td>S</td>
                                <td>4</td>
                                <td>34 - 35</td>
                                <td>26 - 27</td>
                                <td>35 - 26</td>
                            </tr>
                            <tr>
                                <td>M</td>
                                <td>6</td>
                                <td>36 - 37</td>
                                <td>28 - 29</td>
                                <td>38 - 40</td>
                            </tr>
                            <tr>
                                <td>L</td>
                                <td>8</td>
                                <td>38 - 29</td>
                                <td>30 - 31</td>
                                <td>42 - 44</td>
                            </tr>
                            <tr>
                                <td>XL</td>
                                <td>10</td>
                                <td>40 - 41</td>
                                <td>32 - 33</td>
                                <td>45 - 47</td>
                            </tr>
                            <tr>
                                <td>XXL</td>
                                <td>12</td>
                                <td>42 - 43</td>
                                <td>34 - 35</td>
                                <td>48 - 50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tf-page-size-chart-content">
                    <div>
                        <h6>Measuring Tips</h6>
                        <div class="title">Bust</div>
                        <p>Measure around the fullest part of your bust.</p>
                        <div class="title">Waist</div>
                        <p>Measure around the narrowest part of your torso.</p>
                        <div class="title">Low Hip</div>
                        <p class="mb-0">With your feet together measure around the fullest part of your hips/rear.
                        </p>
                    </div>
                    <div>
                        <img class="sizechart lazyload" data-src="<?= url('/') ?>/frontassets/images/shop/products/size_chart2.jpg" src="<?= url('/') ?>/frontassets/images/shop/products/size_chart2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal find_size -->






 <!-- Javascript -->
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/swiper-bundle.min.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/carousel.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/bootstrap-select.min.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/lazysize.min.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/count-down.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/wow.min.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/nouislider.min.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/shop.js?v=2"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/multiple-modal.js"></script>
 <script type="text/javascript" src="<?= url('/') ?>/frontassets/js/main.js"></script>



</body>

</html>
