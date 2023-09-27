<?php $__env->startSection('content'); ?>
    <?php echo htmlBreadcrumb($seo['meta_title']); ?>


    <div id="main" class="sitemap main-product">
        <div class="content-main-new pt-0 md:pt-[20px]" id="scrollTop">
            <h1 class="title-primary text-center text-f28 uppercase font-bold">
                <?php echo e($seo['meta_title']); ?>

            </h1>
            <div class="content-content-product pt-[30px]">
                <div class=" mx-auto">
                    <div class="flex flex-wrap justify-start" id="js_data_product_filter">
                        <?php if(!empty($data) && count($data) > 0): ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="w-1/2 md:w-1/4 px-[5px] md:px-[2px] box_wishlist_<?php echo $item->id?>">
                                    <?php echo htmlItemProduct($key, $item, 'item item-product mb-[15px] md:mb-[30px]') ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('javascript'); ?>
        <style>
            select {
                -webkit-appearance: none;
                -moz-appearance: none;
                text-indent: 1px;
                text-overflow: '';
            }
        </style>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childsplay/domains/childsplayclothing.vn/public_html/resources/views/homepage/home/wishlist.blade.php ENDPATH**/ ?>