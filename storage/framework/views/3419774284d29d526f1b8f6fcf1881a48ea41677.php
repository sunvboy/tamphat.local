<div class="overflow-auto h-full">
    <div class="flex items-center justify-between pb-2">
        <div class="flex items-center space-x-1">

            <span class="font-black text-black  text-f25 mb-[0px] lg:mb-[20px]"><?php echo e(trans('index.Filter')); ?></span>
        </div>
        <div class="cursor-pointer js_close_filter_mobile block lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <div class="acc">
        <div class="flex flex-col border-b w-full py-5 acc__card">
            <div class="flex justify-between items-center cursor-pointer acc__title">
                <h4 class="text-base font-bold uppercase"><?php echo e(trans('index.PriceRange')); ?></h4>
                <span class="pr-2">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </div>
            <div class="acc__panel pt-5">
                <input type="text" class="js-range-slider" name="my_range" value="" />
                <div class="mt-1">
                    <div class="flex  gap-4">
                        <div class="w-1/2">
                            <label class=""><?php echo e(trans('index.Start')); ?> (tr)</label>
                            <input placeholder=".000" type="text" value="" class="filter border w-full h-11 px-2 focus:outline-none  hover:outline-none" name="price_start">
                        </div>
                        <div class="w-1/2">
                            <label class=""><?php echo e(trans('index.End')); ?> (tr)</label>
                            <input placeholder=".000" type="text" value="" class="filter border w-full h-11 px-2 focus:outline-none  hover:outline-none " name="price_end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($brandFilter) && count($brandFilter) > 0): ?>
        <div class="flex flex-col border-b w-full py-5 acc__card">
            <div class="flex justify-between items-center cursor-pointer acc__title">
                <h4 class="text-base font-bold uppercase"><?php echo e(trans('index.Brands')); ?></h4>
                <span class="pr-2">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </div>
            <div class="acc__panel pt-5 space-x-2">
                <div class="flex flex-wrap">
                    <?php if($module == 'category'): ?>
                    <?php $__currentLoopData = $brandFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label for="brand-<?php echo e($item->brands->id); ?>" class="js_brand float-left mb-2 mr-2 relative px-4 py-2 text-center bg-white hover:bg-red-100 hover:border-red-100 rounded-md cursor-pointer border">
                        <input id="brand-<?php echo e($item->brands->id); ?>" type="checkbox" data-title="<?php echo e($item->brands->title); ?>" value="<?php echo e($item->brands->id); ?>" class="js_input_brand filter hidden" name="brands[]">
                        <span class=""><?php echo e($item->brands->title); ?></span>
                        <div class="product-filter-tick">
                            <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">
                                <g>
                                    <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                </g>
                            </svg>
                        </div>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <?php $__currentLoopData = $brandFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label for="brand-<?php echo e($item->id); ?>" class="js_brand float-left mb-2 mr-2 relative px-4 py-2 text-center bg-white hover:bg-red-100 hover:border-red-100 rounded-md cursor-pointer border">
                        <input id="brand-<?php echo e($item->id); ?>" type="checkbox" data-title="<?php echo e($item->title); ?>" value="<?php echo e($item->id); ?>" class="js_input_brand filter hidden" name="brands[]">
                        <span class=""><?php echo e($item->title); ?></span>
                        <div class="product-filter-tick">
                            <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">
                                <g>
                                    <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                </g>
                            </svg>
                        </div>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(!empty($attributes) && count($attributes) > 0): ?>
        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($item) > 0): ?>
        <div class="flex flex-col border-b w-full py-5 acc__card">
            <div class="flex justify-between items-center cursor-pointer acc__title">
                <h4 class="text-base uppercase font-bold"><?php echo e($key); ?></h4>
                <span class="pr-2">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </div>
            <div class="acc__panel pt-5 space-x-2">
                <div class="flex flex-wrap">
                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label for="attr-<?php echo e($val['id']); ?>" class="js_attr float-left mr-2 mb-2 relative px-4 py-2 text-center bg-white hover:bg-red-100 hover:border-red-100 rounded-md cursor-pointer border">
                        <input id="attr-<?php echo e($val['id']); ?>" type="checkbox" value="<?php echo e($val['id']); ?>" data-title="<?php echo e($val['title']); ?>" data-keyword="<?php echo e($val['keyword']); ?>" class="js_input_attr filter hidden" name="attr[]">
                        <span><?php echo e($val['title']); ?></span>
                        <div class="product-filter-tick">
                            <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">
                                <g>
                                    <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                </g>
                            </svg>
                        </div>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <input id="choose_attr" class="w-full hidden" type="text" name="attr">
    </div>
</div>
<?php echo $__env->make('product.frontend.category.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/product/frontend/category/filter.blade.php ENDPATH**/ ?>