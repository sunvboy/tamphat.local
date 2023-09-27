<?php
$customers = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'customer'])->with('slides')->first();

?>
<?php if(!empty($customers) && count($customers->slides) > 0): ?>
<!-- start: box 4 -->
<section class="customer-section py-[30px] md:py-[60px] wow fadeInUp">
    <div class="container mx-auto px-3">
        <h2 class="title-primary text-f25 md:text-f30 font-bold text-center">
            <?php echo e($customers->title); ?>

        </h2>
        <div class="content-customer-section mt-[40px]">
            <div class="flex flex-wrap justify-center mx-[-10px]">
                <?php $__currentLoopData = $customers->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-1/2 md:w-1/4 px-[10px]">
                    <div class="item text-center mb-[15px] md:mb-0">
                        <div class="icon" style="height: 70px">
                            <img src="<?php echo e(asset($slide->src)); ?>" alt="<?php echo e($slide->title); ?>" style="width: 70px" class="inline-block" />
                        </div>
                        <div class="title-count text-f30 md:text-f60 text-color_primary mt-[30px]">
                            <span class="count"><?php echo e($slide->title); ?></span> +
                        </div>
                        <h4 class="uppercase mt-[25px] text-f16"><?php echo e($slide->description); ?></h4>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<!-- end: box 4 -->
<?php endif; ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/customer.blade.php ENDPATH**/ ?>