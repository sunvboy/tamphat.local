
<?php $__env->startSection('content'); ?>
<?php echo htmlBreadcrumb('',$breadcrumb); ?>

<main id="main" class="py-7 space-y-10">
    <!-- start: box 5 -->
    <div class="content-product-detail pt-[10px] md:pt-[40px]">
        <div class="container mx-auto px-4 md:px-0">
            <div class="grid grid-cols-1 -mx-[15px]">
                <div class="px-[15px]">
                    <?php echo $__env->make('product.frontend.product.common.detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="">
                        <div class="mt-[10px] md:mt-[35px]">
                            <ul class="ulTabProduct flex border-b border-gray-300 space-x-10">
                                <li class="text-f15 md:text-f18 text-gray-600 tab-link font-bold uppercase pb-[10px] relative cursor-pointer js_tabProduct current" data-tab="tab-1">
                                    <?php echo e(trans('index.ProductInformation')); ?>

                                </li>
                                <li class="text-f15 md:text-f18 text-gray-600 tab-link font-bold uppercase pb-[10px] relative cursor-pointer js_tabProduct" data-tab="tab-2">
                                    Video
                                </li>
                                <li class="text-f15 md:text-f18 text-gray-600 tab-link font-bold uppercase pb-[10px] relative cursor-pointer js_tabProduct" data-tab="tab-3">
                                    <?php echo e(trans('index.Comment')); ?>

                                </li>
                            </ul>
                        </div>
                        <div id="tab-1" class="tab-content current">
                            <div class="content-new-home mt-[20px] md:mt-[30px] box_content">
                                <?php echo $detail->content ?>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-content hidden">
                            <div class="box_content pt-5">
                                <?php echo !empty($fields['config_colums_editor_video']) ? $fields['config_colums_editor_video'] : ''; ?>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-content hidden">
                            <?php echo $__env->make('product.frontend.product.comment.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: box 5 -->
    <?php if(count($productSame) > 0): ?>
    <section>
        <div class="container mx-auto px-4 md:px-0">
            <h2 class="titleH2 text-global text-2xl hover:text-primary font-bold border-b border-gray-300 ">
                <a href="javascript:void(0)" class="relative">
                    <?php echo e(trans('index.RelatedProducts')); ?>

                </a>
            </h2>
            <div class="mt-5 -mx-[15px]">
                <div class="slider-product owl-carousel">
                    <?php $__currentLoopData = $productSame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <?php echo htmlItemProduct($key, $item); ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php echo $__env->make('homepage.common.recently', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/swiper-bundle.min.css')); ?>" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('javascript'); ?>
<script src="<?php echo e(asset('frontend/js/swiper-bundle.min.js')); ?>"></script>
<script>
    const sliderThumbs = new Swiper(".slider__thumbs .swiper-container", {
        direction: "horizontal",
        slidesPerView: 5,
        spaceBetween: 10,
        hashNavigation: {
            watchState: true,
        },
        navigation: {
            nextEl: ".slider__next",
            prevEl: ".slider__prev",
        },
        freeMode: true,
        breakpoints: {
            0: {
                direction: "horizontal",
                slidesPerView: 3,
            },
            768: {
                direction: "horizontal",
                slidesPerView: 4,
            },
        },
    });
    const sliderImages = new Swiper(".slider__images .swiper-container", {
        direction: "horizontal",
        slidesPerView: 1,
        spaceBetween: 0,
        mousewheel: true,
        hashNavigation: {
            watchState: true,
        },
        navigation: {
            nextEl: ".slider__next",
            prevEl: ".slider__prev",
        },
        grabCursor: true,
        thumbs: {
            swiper: sliderThumbs,
        },
        breakpoints: {
            0: {
                direction: "horizontal",
            },
            768: {
                direction: "horizontal",
            },
        },
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/product/index.blade.php ENDPATH**/ ?>