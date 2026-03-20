<section class="tf-slideshow slider-home-2 slider-effect-fade position-relative overflow-hidden">
    <div dir="ltr" class="swiper tf-sw-slideshow" 
         data-preview="1" 
         data-tablet="1" 
         data-mobile="1" 
         data-centered="false" 
         data-space="0" 
         data-loop="true" 
         data-auto-play="true" 
         data-delay="2000" 
         data-speed="1000">
        <div class="swiper-wrapper">
            <?php
            if (!empty($banner)) {
                foreach ($banner as $key => $banners) {
                    if ($banners->page == 'home') {
            ?>
            <div class="swiper-slide">
                <div class="position-relative vh-100 w-100">
                    <img class="lazyload position-absolute w-100 h-100" 
                         style="object-fit: cover; z-index: -1; filter: brightness(0.65);"
                         data-src="<?= url('/') ?>/<?= $banners->image_url ?>" 
                         src="<?= url('/') ?>/<?= $banners->image_url ?>" 
                         alt="AURA Collection">

                    <div class="container h-100 d-flex align-items-center justify-content-center">
                        <div class="text-center text-white fade-in">
                            <h1 class="display-1 fw-bold mb-3 tracking-tight" style="font-family: 'Oswald', sans-serif;">
                                WEAR THE<br>CONFIDENCE
                            </h1>
                            <p class="fs-5 mb-5 opacity-75 mx-auto px-2" style="max-width: 600px;">
                                Premium essentials designed for the modern individual.
                            </p>
                            <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                                <a href="<?= url('/') ?>/user-product/czoxOiIwIjs" class="btn btn-light btn-lg rounded-0 fw-bold px-5 py-3 shadow-sm transition-all">
                                    SHOP NEW ARRIVALS
                                </a>
                                <a href="<?= url('/') ?>/trending" class="btn btn-outline-light btn-lg rounded-0 fw-bold px-5 py-3 transition-all border-2">
                                    EXPLORE COLLECTION
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }}} ?>
        </div>
    </div>
    
    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4 z-3">
        <div class="sw-dots sw-pagination-slider d-flex justify-content-center gap-2"></div>
    </div>
</section>

<style>
    /* Framework tweaks for smoothness */
    .vh-100 { height: 90vh !important; } /* Maintains your original height preference */
    .tracking-tight { letter-spacing: -2px; }
    .transition-all { transition: all 0.3s ease; }
    
    /* Button Hover Interaction */
    .btn-outline-light:hover {
        background-color: white !important;
        color: #1a1a1a !important;
    }
</style>