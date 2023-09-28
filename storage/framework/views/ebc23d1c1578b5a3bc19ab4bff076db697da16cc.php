<?php
$menu_footer = getMenus('menu-footer');

?>
<footer id="colophon" class="site-footer">
    <div class="pt-6 pb-4 position-relative">
        <div class="ripped-border-footer-top"></div>
        <?php if($menu_footer && count($menu_footer->menu_items) > 0): ?>
        <div class="position-relative d-flex align-items-end justify-content-center mb-4">
            <div class="container">
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $menu_footer->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class='col-12 col-sm-3'>
                        <div class='mb-4 text-center'>
                            <a href='<?php echo e(url($item->slug)); ?>' title='<?php echo e($item->title); ?>' target='_parent'>
                                <h4 class='h3 text-uppercase mb-4'><?php echo e($item->title); ?></h4>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="container">
            <div class="small text-center mb-4 box-address">
                <p class='mb-0'><strong>Address: </strong><?php echo e($fcSystem['contact_address']); ?></p>
                <p class='mb-0'>
                    <span class='ml-2 mr-2'>
                        <strong>Phone: </strong>
                        <a href="tel:<?php echo e($fcSystem['contact_phone']); ?>" target='_blank'><?php echo e($fcSystem['contact_phone']); ?></a>
                    </span>
                </p>
                <p class='mb-0'>
                    <span class='ml-2 mr-2'>
                        <strong>Hotline:</strong>
                        <a href="tel:<?php echo e($fcSystem['contact_hotline']); ?>" target='_blank'><?php echo e($fcSystem['contact_hotline']); ?></a>
                    </span>
                </p>
                <p class='mb-0'>
                    <span class='ml-2 mr-2'>
                        <strong>Email: </strong>
                        <a href="mailto:<?php echo e($fcSystem['contact_email']); ?>" target='_blank'><?php echo e($fcSystem['contact_email']); ?>

                        </a>
                    </span>
                </p>
            </div>
            <div class="col-12 text-center">
                <ul class='list-unstyled text-center mb-0 footer-social d-flex align-items-center justify-content-center'>
                    <li><a class='Facebook' href="<?php echo e($fcSystem['social_facebook']); ?>" target='_blank'></a></li>
                    <li><a class='Instagram' href="<?php echo e($fcSystem['social_instagram']); ?>" target='_blank'></a></li>
                    <li><a class='Google-Plus' href="<?php echo e($fcSystem['social_google_plus']); ?>" target='_blank'></a></li>
                    <li><a class='Call' href="tel:<?php echo e($fcSystem['contact_hotline']); ?>" target='_blank'></a></li>
                    <li><a class='Youtube' href="<?php echo e($fcSystem['social_youtube']); ?>" target='_blank'></a></li>
                </ul>
            </div>
        </div>
        <div class=" ripped-border-footer-bottom">
        </div>
    </div>
    <div class="copyright py-2 text-center">
        <div class="container">
            <div class="d-inline-block">
                <p class='small text-center mb-0'>Copyright © <?php echo e(date('Y')); ?>. <?php echo e($fcSystem['homepage_brandname']); ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<div id='social' class='follow-scroll-social d-none d-lg-flex'>
    <div class='social-top'></div>
</div>
<script type='text/javascript' src="<?php echo e(asset('frontend/js/jquery-ui.js')); ?>"></script>
<script type='text/javascript' src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
<script type='text/javascript' src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<script type='text/javascript' src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
<script type='text/javascript' src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
<script type='text/javascript' src="<?php echo e(asset('frontend/js/jquery.fancybox.min.js')); ?>"></script>
<script type=' text/javascript' src="<?php echo e(asset('frontend/js/lazysizes.min.js')); ?>"></script>
<script type=' text/javascript' src="<?php echo e(asset('frontend/js/ls.unveilhooks.min.js')); ?>"></script>
<script type='text/javascript' src="<?php echo e(asset('frontend/js/map.js')); ?>"></script>
<script type=' text/javascript' src="<?php echo e(asset('frontend/js/site.js')); ?>"></script>
<script type=' text/javascript' src="<?php echo e(asset('frontend/js/web.min.js')); ?>"></script>
<style>
    #carouselSlide {
        position: relative;
        height: 400px;

        overflow: hidden;
    }

    #carouselSlide div {
        position: absolute;
        transition: transform 400ms, left 400ms, opacity 400ms, z-index 0s;
        opacity: 1;
    }

    #carouselSlide div img {
        width: 400px;
        transition: width 400ms;
        -webkit-user-drag: none;
    }

    #carouselSlide div.hideLeft {
        left: 0%;
        opacity: 0;
        transform: translateY(50%) translateX(-50%);
    }

    #carouselSlide div.hideLeft img {
        width: 200px;
    }

    #carouselSlide div.hideRight {
        left: 100%;
        opacity: 0;
        transform: translateY(50%) translateX(-50%);
    }

    #carouselSlide div.hideRight img {
        width: 200px;
    }

    #carouselSlide div.prev {
        z-index: 5;
        left: 30%;
        transform: translateY(50px) translateX(-50%);
    }

    #carouselSlide img:hover {
        cursor:
    }

    #carouselSlide div.prev img {
        width: 300px;
    }

    #carouselSlide div.prevLeftSecond {
        z-index: 4;
        left: 15%;
        transform: translateY(50%) translateX(-50%);
        opacity: 0.7;
    }

    #carouselSlide div.prevLeftSecond img {
        width: 200px;
    }

    #carouselSlide div.selected {
        z-index: 10;
        left: 50%;
        transform: translateY(0px) translateX(-50%);
    }

    #carouselSlide div.next {
        z-index: 5;
        left: 70%;
        transform: translateY(50px) translateX(-50%);
    }

    #carouselSlide div.next img {
        width: 300px;
    }

    #carouselSlide div.nextRightSecond {
        z-index: 4;
        left: 85%;
        transform: translateY(50%) translateX(-50%);
        opacity: 0.7;
    }

    #carouselSlide div.nextRightSecond img {
        width: 200px;
    }
</style><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/homepage/common/footer.blade.php ENDPATH**/ ?>