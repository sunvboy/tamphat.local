<?php
$brands =
    \App\Models\Brand::select('id', 'title', 'slug', 'image')
    ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
    ->orderBy('order', 'asc')
    ->orderBy('id', 'desc')
    ->limit(5)
    ->get();
?>
<?php if(!empty($brands) && count($brands) > 0): ?>
<!-- start: box 5 -->
<section class="why-section py-[30px] md:py-[70px] wow fadeInUp">
    <div class="container mx-auto px-3">
        <h2 class="title-primary text-f25 md:text-f30 font-bold text-center">
            <?php echo e($fcSystem['title_4']); ?>

        </h2>
        <div class="desc-title text-f16 text-center mt-[10px] md:mt-[15px] mb-[30px]">
            <p>
                <?php echo e($fcSystem['title_5']); ?>

            </p>
        </div>
        <ul class="tabs flex flex-wrap rounded-[10px] overflow-hidden" style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.07)">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($item->posts) && count($item->posts) > 0): ?>
            <li class="tab-link <?php if($key == 0): ?> current <?php endif; ?> py-[5px] md:py-[30px] w-1/2 md:w-1/5 border-r border-gray-100b text-center" data-tab="tab-<?php echo e($key+1); ?>">
                <img src="<?php echo e(asset($item->image)); ?>" alt="<?php echo e($item->title); ?>" class="inline-block h-[50px] object-cover" />
                <h5 class="text-f16 uppercase mt-[10px]"><?php echo e($item->title); ?></h5>
            </li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($item->posts) && count($item->posts) > 0): ?>
        <div id="tab-<?php echo e($key+1); ?>" class="tab-content <?php if($key == 0): ?> current <?php endif; ?> pt-[30px]">
            <?php $__currentLoopData = $item->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-wrap justify-between mx-[-15px] mb-5">
                <div class="w-full md:w-1/2 px-[15px]">
                    <div class="img">
                        <a href="<?php echo e(route('routerURL',['slug' => $v->slug])); ?>"><img src="<?php echo e(asset($v->image)); ?>" alt="<?php echo e($v->title); ?>" /></a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-[15px]">
                    <div class="img-nav">
                        <h3 class="text-f20 font-bold">
                            <a href="<?php echo e(route('routerURL',['slug' => $v->slug])); ?>"><?php echo e($v->title); ?></a>
                        </h3>
                        <p class="desc text-gray-700 text-f16 mt-[15px]">
                            <?php echo $v->description; ?>

                        </p>
                        <a class="button-link inline-block py-[10px] px-[25px] border rounded-[30px] text-white mt-[10px] md:mt-[20px] hover:bg-white hover:text-color_primary transition-all bg-color_primary border-color_primary" href="<?php echo e(route('routerURL',['slug' => $v->slug])); ?>">
                            <span><?php echo e(trans('index.ViewMore')); ?></span>
                            <i class="fa fa-angle-double-right text-f12" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<!-- end: box 5 -->
<?php endif; ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/brand.blade.php ENDPATH**/ ?>