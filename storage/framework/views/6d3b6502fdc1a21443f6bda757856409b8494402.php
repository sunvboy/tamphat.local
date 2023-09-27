
<?php $__env->startSection('content'); ?>
<?php echo htmlBreadcrumb('',$breadcrumb); ?>

<?php echo $__env->make('product.frontend.category.data',['module' => $module,'title' => $detail->title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childsplay/domains/childsplayclothing.vn/public_html/resources/views/product/frontend/category/index.blade.php ENDPATH**/ ?>