<?php $__env->startSection('content'); ?>
<section class="banner-child relative">
    <div class="img">
        <a href="javascript:void(0)"><img src="<?php echo e(!empty($detail->image) ? (!empty(File::exists(base_path($detail->image)))?asset($detail->image):asset($fcSystem['banner_0'])) : asset($fcSystem['banner_0'])); ?>" alt="<?php echo e($detail->title); ?>" class="w-full" /></a>
    </div>
    <div class="text-center overlay-banner absolute w-full left-0 top-1/2" style="transform: translateY(-50%)">
        <div class="container mx-auto px-3">
            <div class="breadcrumb">
                <ul class="flex flex-wrap justify-center">
                    <li class="pr-[5px] text-white"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('index.home')); ?></a> /</li>
                    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-white"><a href="<?php echo route('routerURL', ['slug' => $v->slug]) ?>" class="text-gray-500 hover:text-gray-600"><?php echo e($v->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <h1 class="text-f25 md:text-f35 font-bold text-white relative z-10 my-[10px] md:my-[25px]">
                <?php echo e($detail->title); ?>

            </h1>
            <div class="desc text-f16 text-white"><?php echo $detail->description; ?></div>
        </div>
    </div>
</section>

<!-- end:box 1 -->

<div id="main" class="main-new py-[30px] md:py-[60px]">
    <div class="top-content-new">
        <div class="container mx-auto px-3">
            <div class="flex flex-wrap justify-between mx-[-15px]">
                <?php if($data): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($k==0): ?>
                <div class="w-full md:w-2/3 px-[15px]">
                    <div class="item-large bg-gray-50 mb-[10px] md:mb-0">
                        <div class="img hover-zoom">
                            <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>">
                                <img src="<?php echo e(asset($item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-full object-cover" style="height: 553px;">
                            </a>
                        </div>
                        <div class="nav-img p-[10px] md:p-[15px]">
                            <h3 class="title-2 text-f16  md:text-f20 font-bold">
                                <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>" class="hover:text-color_primary transition-all">
                                    <?php echo e($item->title); ?>

                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="w-full md:w-1/3 px-[15px] flex flex-col justify-between">
                    <?php if($data): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($k>0 && $k <= 2): ?> <div class="item-small bg-gray-50 mb-[20px]">
                        <div class="img hover-zoom">
                            <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>">
                                <img src="<?php echo e(asset($item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-full object-cover" style="height: 230px;">
                            </a>
                        </div>
                        <div class="nav-img p-[10px] md:p-[15px]">
                            <h3 class="title-2 text-f15 font-bold">
                                <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>" class="hover:text-color_primary transition-all">
                                    <?php echo e($item->title); ?>

                                </a>
                            </h3>
                        </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="second-content-new mt-5">
    <div class="container mx-auto px-3">
        <div class="flex flex-wrap mx-[-10px]">
            <?php if($data): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="w-full md:w-1/3 px-[10px]">
                <div class="item-small border border-gray-100 mb-[20px] h-full">
                    <div class="img hover-zoom">
                        <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>">
                            <img src="<?php echo e(asset($item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-full object-cover" style="height: 230px;">
                        </a>
                    </div>
                    <div class="nav-img p-[10px] md:p-[15px]">
                        <h3 class="title-2 text-f15 font-bold">
                            <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>" class="hover:text-color_primary transition-all">
                                <?php echo e($item->title); ?>

                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="mt-5 wow fadeInUp">
            <?php echo $data->links() ?>
        </div>
    </div>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/article/frontend/category/index.blade.php ENDPATH**/ ?>