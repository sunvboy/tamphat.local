<?php $__env->startSection('content'); ?>
<section class="banner-child relative">
    <div class="img">
        <a href="javascript:void(0)"><img src="<?php echo e(!empty($page->image) ? (!empty(File::exists(base_path($page->image)))?asset($page->image):asset($fcSystem['banner_0'])) : asset($fcSystem['banner_0'])); ?>" alt="<?php echo e($seo['meta_title']); ?>" class="w-full" /></a>
    </div>
    <div class="text-center overlay-banner absolute w-full left-0 top-1/2" style="transform: translateY(-50%)">
        <div class="container mx-auto px-3">
            <div class="breadcrumb">
                <ul class="flex flex-wrap justify-center">
                    <li class="pr-[5px] text-white"><a href="<?php echo e(!empty(config('app.locale') == 'vi') ? url('/') : url('/en')); ?>"><?php echo e(trans('index.home')); ?></a> /</li>
                    <li class="text-white"><a href="javascript:void(0)" class="text-white"><?php echo e($seo['meta_title']); ?></a></li>
                </ul>
            </div>
            <h1 class="text-f25 md:text-f35 font-bold text-white relative z-10 my-[10px] md:my-[25px]">
                <?php echo e($seo['meta_title']); ?>

            </h1>
        </div>
    </div>
</section>
<!-- end:box 1 -->
<div id="main" class="main-product py-[30px] md:py-[60px]">
    <div class="container mx-auto px-3">
        <div class="flex flex-wrap justify-center -mx-[5px] md:-mx-3">

            <div class="w-full md:w-1/4 px-[5px] md:px-3 mb-[15px] order-2 md:order-1 md:mb-6 wow fadeInUp">
                <div>
                    <?php echo $__env->make('product.frontend.category.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="w-full md:w-3/4 px-[5px] md:px-3 mb-[15px]  order-1 md:order-2 md:mb-6 wow fadeInUp">
                <div class="content-product">
                    <h2 class="title-primary text-f25 md:text-f30 font-bold mb-[20px]">
                        <?php echo e($seo['meta_title']); ?>

                    </h2>
                    <div class="flex flex-wrap justify-start -mx-[5px] md:-mx-3">
                        <?php if($data): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $field = !empty($item->field) ? json_decode($item->field->meta_value, TRUE) : [];

                        ?>
                        <div class="w-full md:w-1/3 px-[5px] md:px-3 mb-[15px] md:mb-7">
                            <div class="item mb-[20px] p-[10px] border border-white hover:border-color_primary transition-all flex flex-col h-full">
                                <div class="img hover-zoom flex-shrink-0">
                                    <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>">
                                        <img src="<?php echo e(asset($item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-full object-cover" style="height: 270px" />
                                    </a>
                                </div>
                                <div class="nav-img p-[5px] md:p-[15px] mt-[10px] md:mt-0 flex flex-col flex-1 justify-between">
                                    <h3 class="title-2 text-f16 font-bold text-center">
                                        <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>"><?php echo e($item->title); ?> </a>
                                    </h3>
                                    <div class="description-product-list">
                                        <?php if(!empty($field['title']) && count($field['title']) > 0): ?>
                                        <?php $__currentLoopData = $field['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span>
                                            <?php echo e($item); ?>

                                        </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="pagenavi wow fadeInUp" style="visibility: visible; animation-name: fadeInUp">
                        <?php echo e($data->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/search/index.blade.php ENDPATH**/ ?>