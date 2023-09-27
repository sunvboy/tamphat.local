<?php $__env->startSection('content'); ?>
<section class="banner-child relative">
    <div class="img">
        <a href="javascript:void(0)"><img src="<?php echo e(!empty($page->image) ? (!empty(File::exists(base_path($page->image)))?asset($page->image):asset($fcSystem['banner_0'])) : asset($fcSystem['banner_0'])); ?>" alt="<?php echo e($page->title); ?>" class="w-full" /></a>
    </div>
    <div class="text-center overlay-banner absolute w-full left-0 top-1/2" style="transform: translateY(-50%)">
        <div class="container mx-auto px-3">
            <div class="breadcrumb">
                <ul class="flex flex-wrap justify-center">
                    <li class="pr-[5px] text-white"><a href="<?php echo e(!empty(config('app.locale') == 'vi') ? url('/') : url('/en')); ?>"><?php echo e(trans('index.home')); ?></a> /</li>
                    <li class="text-white"><?php echo e($page->title); ?></li>
                </ul>
            </div>
            <h1 class="text-f25 md:text-f35 font-bold text-white relative z-10 my-[10px] md:my-[25px]">
                <?php echo e($page->title); ?>

            </h1>
        </div>
    </div>
</section>
<!-- end:box 1 -->
<div id="main" class="sitemap main-info">
    <?php if(!empty($page->description)): ?>
    <section class="top-content-info pt-[30px] md:pt-[60px] wow fadeInUp">
        <div class="container mx-auto px-3">
            <div class="content-content">
                <?php echo $page->description; ?>

            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php if(!empty($fields['config_colums_json_why']->title)): ?>
    <section class="vision-mission bg-gray-50 py-[30px] md:py-[60px] mt-[30px] md:mt-[60px] wow fadeInUp">
        <div class="container mx-auto px-3">
            <div class="flex flex-wrap justify-between mx-[-10px] items-center">
                <?php $__currentLoopData = $fields['config_colums_json_why']->title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-full md:w-1/2 px-[10px]">
                    <div class="vision-item bg-white flex flex-wrap justify-between py-[20px] px-[15px] rounded-[4px] border border-color_primary mb-[10px] md:mb-0" style="box-shadow: 0px 0px 9px rgba(0, 0, 0, 0)">
                        <div class="icon" style="width: 100px">
                            <img src="<?php echo e(asset($fields['config_colums_json_why']->image[$key])); ?>" alt="<?php echo e($item); ?>" />
                        </div>
                        <div class="nav-icon pl-[10px]" style="width: calc(100% - 100px)">
                            <h3 class="title-2 text-f20 font-bold"><?php echo e($item); ?></h3>
                            <p class="desc mt-[15px]">
                                <?php echo e(!empty($fields['config_colums_json_why']->content[$key])?$fields['config_colums_json_why']->content[$key]:''); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php if(!empty($fields['config_colums_json_core']->title)): ?>
    <!-- start: box 3 -->
    <section class="value-info py-[30px] md:py-[60px] wow fadeInUp">
        <div class="container mx-auto px-3">
            <h2 class="title-primary text-f25 md:text-f30 font-bold text-center">
                <?php echo e($fcSystem['title_6']); ?>

            </h2>
            <div class="content-Services-home mt-[20px] md:mt-[30px]">
                <div class="flex flex-wrap mx-[-10px]">
                    <?php $__currentLoopData = $fields['config_colums_json_core']->title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="w-full md:w-1/3 px-[10px]">
                        <div class="item bg-white mb-[10px] md:mb-[15px] border border-color_primary shadow rounded-[4px]">
                            <div class="img hover-zoom">
                                <a href="javascript:void(0)">
                                    <img src="<?php echo e(asset($fields['config_colums_json_core']->image[$key])); ?>" alt="<?php echo e($item); ?>" class="w-full object-cover" style="height: 265px" />
                                </a>
                            </div>
                            <div class="nav-img p-[5px] md:p-[15px] inline-block w-full">
                                <h3 class="title-1 text-f16 font-bold">
                                    <a href="javascript:void(0)" class="text-color_primary"><?php echo e($item); ?></a>
                                </h3>
                                <div class="content-content mt-[10px]">
                                    <?php echo !empty($fields['config_colums_json_why']->content[$key])?$fields['config_colums_json_why']->content[$key]:''; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </section>
    <!-- end: box 3 -->
    <?php endif; ?>
    <?php echo $__env->make('homepage.common.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('homepage.common.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('homepage.common.subscribers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/page/frontend/aboutus.blade.php ENDPATH**/ ?>