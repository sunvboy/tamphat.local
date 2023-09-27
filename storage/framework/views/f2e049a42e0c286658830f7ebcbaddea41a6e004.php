<?php
/*
List danh sách sản phẩm
*/ ?>
<div class="mt-5 space-y-2 scrollbar px-3" style="max-height:400px">
    <?php if(!$products->isEmpty()): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="border-b pb-2">
        <?php if(count($item->product_versions) > 0): ?>
        <div class="pl-0 lg:space-y-3 text-sm lg:text-base">
            <?php $__currentLoopData = $item->product_versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $title_version = collect(json_decode($val->title_version))->join(' - ', '');
            $price = !empty($val->price_import_version) ? $val->price_import_version : (!empty($item->price_import) ? $item->price_import : 0);
            $image = File::exists(base_path($val->image_version)) ? (!empty($val->image_version) ? asset($val->image_version) : (File::exists(base_path($item->image)) ? (!empty($item->image) ? asset($item->image) : asset('images/404.png')) : asset('images/404.png'))) : asset('images/404.png');
            ?>
            <div data-unit="<?php echo e($item->unit); ?>" data-image="<?php echo e($image); ?>" data-price="<?php echo e($price); ?>" data-id="<?php echo e($item->id); ?>" data-title-version="<?php echo e($title_version); ?>" data-id-version="<?php echo e($val->id); ?>" data-type="variable" class="text-sm lg:text-base grid space-x-2 lg:space-x-0 grid-cols-4 lg:grid-cols-12 items-center cursor-pointer js_handleSelectProducts">
                <div class="lg:col-span-1">
                    <img alt="<?php echo e($item->title); ?>" style="height:50px;width: 50px;object-fit: cover;" class="object-cover border" src="<?php echo e($image); ?>">
                </div>
                <div class="lg:col-span-6 ">
                    <span class="font-semibold"><?php echo e($item->title); ?></span><br>(<?php echo e($title_version); ?>)
                </div>
                <div class="lg:col-span-5 text-right">
                    <span class="text-danger font-semibold"><?php echo e(number_format($price,'0',',','.')); ?> đ</span><br>
                    <b>Số lượng:</b> <?php echo e($val->_stock); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div data-unit="<?php echo e($item->unit); ?>" data-image="<?php echo e(asset($item->image)); ?>" data-price="<?php echo e($item->price_import); ?>" data-id="<?php echo e($item->id); ?>" data-type="simple" class="text-sm lg:text-base grid space-x-2 lg:space-x-0 grid-cols-4 lg:grid-cols-12 items-center cursor-pointer js_handleSelectProducts">
            <div class="lg:col-span-1">
                <img alt="<?php echo e($item->title); ?>" style="height:50px;width: 50px;object-fit: cover;" class="object-cover border" src="<?php echo e(File::exists(base_path($item->image)) ? (!empty($item->image)?asset($item->image): asset('images/404.png')) : asset('images/404.png')); ?>">
            </div>
            <div class="lg:col-span-6 font-semibold">
                <?php echo e($item->title); ?>

            </div>
            <div class="lg:col-span-5 text-right">
                <span class="text-danger font-semibold"><?php echo e(number_format($item->price_import,'0',',','.')); ?> đ</span><br>
                <b>Số lượng: </b><?php echo e($item->inventoryQuantity); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<div class=" col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center justify-center paginationProducts">
    <?php echo e($products->links()); ?>

</div><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/backend/purchases/create/products.blade.php ENDPATH**/ ?>