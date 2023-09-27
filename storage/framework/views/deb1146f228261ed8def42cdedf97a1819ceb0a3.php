<?php
$CategoryProduct = \App\Models\CategoryProduct::select('id', 'title', 'slug', 'banner')
    ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'highlight' => 1])
    ->first();

?>
<?php if(!empty($CategoryProduct)): ?>
<?php if(count($CategoryProduct->posts) > 0): ?>
<div class="py-[30px] wow fadeInUp">
    <div class="container mx-auto px-3">
        <h2 class="title-primary text-black text-f30 md:text-f50 font-black text-center leading-[30px] md:leading-[50px] relative">
            <?php echo e($CategoryProduct->title); ?>

        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 justify-center mt-8 -mx-[5px] md:-mx-[10px]">
            <?php $__currentLoopData = $CategoryProduct->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo htmlItemProduct($key, $item, 'px-[5px] md:px-[10px]') ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/wholesale.blade.php ENDPATH**/ ?>