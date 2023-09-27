 <?php if($data): ?>
 <div class="grid grid-cols-1 md:grid-cols-4 -mx-[15px]">
     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <?php echo htmlArticle($item) ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>
 <div class="mt-5" style="visibility: visible; animation-name: fadeInUp">
     <?php echo $data->links() ?>
 </div>
 <?php endif; ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/article/frontend/category/data.blade.php ENDPATH**/ ?>