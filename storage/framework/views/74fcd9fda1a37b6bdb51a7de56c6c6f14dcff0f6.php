<?php
$categoryAside =  \App\Models\CategoryProduct::select('id', 'slug', 'title')
    ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'parentid' => 0])
    ->with(['children' => function ($q) {
        $q->with('countProduct');
    }])
    ->orderBy('order', 'ASC')->orderBy('id', 'desc')->get();
?>
<aside class="sidebar rounded-[5px] p-[20px] border border-gray-100 shadow-sm">
    <?php $__currentLoopData = $categoryAside; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="item-sb border-b border-gray-10 pb-[20px] mb-[20px]">
        <h2 class="uppercase font-bold text-[17px]"><?php echo e($item->title); ?></h2>
        <ul class="mt-4 space-y-2">
            <?php if(!empty($item->children)): ?>
            <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="relative pb-[6px] mb-[6px] text-f15 pl-[15px]">
                <a href="<?php echo e(route('routerURL',['slug' => $v->slug])); ?>" class="hover:text-d61c1f font-normal">
                    <?php echo e($v->title); ?><span> (<?php echo e(count($v->countProduct)); ?>)</span>
                </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</aside><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/category/aside.blade.php ENDPATH**/ ?>