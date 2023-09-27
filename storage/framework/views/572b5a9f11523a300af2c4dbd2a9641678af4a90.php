<main class="py-[30px]">
    <div class="container px-4 md:px-0">
        <div class="grid grid-cols-4">
            <div class="col-span-4">
                <h1 class="titleH2 text-global text-2xl hover:text-primary font-bold border-b border-gray-300 ">
                    <a href="javascript:void(0)" class="relative">
                        <?php echo e($page->title); ?>

                    </a>
                </h1>
                <div class="mt-5 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 -mx-[5px] md:-mx-[15px]">
                    <?php if(!empty($data) && count($data) > 0): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo htmlItemProduct($key, $item) ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/category/data.blade.php ENDPATH**/ ?>