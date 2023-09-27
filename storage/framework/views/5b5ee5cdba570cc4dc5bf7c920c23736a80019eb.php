<?php $__env->startSection('content'); ?>
<?php echo htmlBreadcrumb($page->title); ?>

<?php echo $__env->make('product.frontend.category.data',['module' => 'products','title' => $page->title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/product/frontend/category/products.blade.php ENDPATH**/ ?>