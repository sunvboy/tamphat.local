<?php
$asideCategoryArticle = Cache::remember('asideCategoryArticle', 600000, function () {
    $asideCategoryArticle = \App\Models\CategoryArticle::select('id', 'title', 'slug')
        ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
        ->with(['posts' => function ($query) {
            $query->limit(5);
        }])
        ->first();
    return $asideCategoryArticle;
});
$categoryProduct = Cache::remember('categoryProduct', 600000, function () {
    $categoryProduct = \App\Models\CategoryProduct::select('id', 'title', 'slug')
        ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'parentid' => 0])
        ->orderBy('order', 'asc')->orderBy('id', 'desc')
        ->get();
    return $categoryProduct;
});
?>
<div class="md:col-span-3 px-[10px] space-y-10 order-1 md:order-0 mt-10 md:mt-0">
    <?php if(!empty($categoryProduct) && count($categoryProduct) > 0): ?>
    <aside class="space-y-2">
        <h2 class="relative h2aside capitalize pb-[10px] font-bold text-lg">Danh mục sản phẩm</h2>
        <ul class="ulAside">
            <?php $__currentLoopData = $categoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="relative pl-5 py-[5px]">
                <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>" class="hover:text-global"><?php echo e($item->title); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </aside>
    <?php endif; ?>
    <?php if(!empty($asideCategoryArticle) && count($asideCategoryArticle->posts) > 0): ?>
    <aside class="space-y-2">
        <h2 class="relative h2aside capitalize pb-[10px] font-bold text-lg">Bài viết mới</h2>
        <ul class="ulAside">
            <?php $__currentLoopData = $asideCategoryArticle->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="relative pl-5 py-[5px]">
                <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>" class="hover:text-global"><?php echo e($item->title); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </aside>
    <?php endif; ?>

</div><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/article/frontend/aside.blade.php ENDPATH**/ ?>