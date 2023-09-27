<?php $__env->startSection('content'); ?>
<section class="banner-child relative">
    <div class="img">
        <a href="javascript:void(0)"><img src="<?php echo e(!empty($catalogues->image) ? (!empty(File::exists(base_path($catalogues->image)))?asset($catalogues->image):asset($fcSystem['banner_0'])) : asset($fcSystem['banner_0'])); ?>" alt="<?php echo e($catalogues->title); ?>" class="w-full" /></a>
    </div>
    <div class="text-center overlay-banner absolute w-full left-0 top-1/2" style="transform: translateY(-50%)">
        <div class="container mx-auto px-3">
            <div class="breadcrumb">
                <ul class="flex flex-wrap justify-center">
                    <li class="pr-[5px] text-white"><a href="<?php echo e(!empty(config('app.locale') == 'vi') ? url('/') : url('/en')); ?>"><?php echo e(trans('index.home')); ?></a> /</li>
                    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-white"><a href="<?php echo route('routerURL', ['slug' => $v->slug]) ?>" class="text-white"><?php echo e($v->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <h1 class="text-f25 md:text-f35 font-bold text-white relative z-10 my-[10px] md:my-[25px]">
                <?php echo e($catalogues->title); ?>

            </h1>
        </div>
    </div>
</section>
<div id="main" class="main-new-detail py-[30px] md:py-[60px]">
    <div class="container mx-auto px-3">
        <div class="content-new-detail">
            <h1 class="text-f20 md:text-f25 font-bold mb-[20px]">
                <?php echo e($detail->title); ?>

            </h1>
            <p class="date text-gray-600 my-[5px]">
                <i class="fa-solid fa-calendar-days mr-[5px]"></i><?php echo e($detail->created_at); ?>

            </p>
            <div class="content-content box_content">
                <?php echo $detail->content ?>
            </div>
        </div>
        <?php if(!$sameArticle->isEmpty()): ?>
        <div class="new-other mt-[30px] md:mt-[60px]">
            <h2 class="title-primary text-f25 md:text-f30 font-bold text-center">
                <?php echo e(trans('index.RelatedPosts')); ?>

            </h2>
            <div class="slider-other-new owl-carousel mt-[20px] md:mt-[30px]">
                <?php $__currentLoopData = $sameArticle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-small border border-gray-100 mb-[20px]">
                    <div class="img hover-zoom">
                        <a href="<?php echo e(route('routerURL',['slug' => $v->slug])); ?>">
                            <img src="<?php echo e(asset($v->image)); ?>" alt="<?php echo e($v->title); ?>" class="w-full object-cover" style="height: 230px" />
                        </a>
                    </div>
                    <div class="nav-img p-[10px] md:p-[15px]">
                        <h3 class="title-2 text-f15 font-bold">
                            <a href="<?php echo e(route('routerURL',['slug' => $v->slug])); ?>" class="hover:text-color_primary transition-all">
                                <?php echo e($v->title); ?>

                            </a>
                        </h3>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<style>
    .box_content img {
        max-width: 100%;
        height: auto !important;
    }

    .box_content>* {
        margin-bottom: 10px;
    }

    .box_content h2,
    .box_content h3,
    .box_content h4,
    .box_content h5 {
        color: #040621;
        margin-bottom: 10px;
    }

    .box_content iframe {
        max-width: 100% !important;
    }

    .box_content h2 {
        font-size: 18px;
        font-weight: bold;
    }

    .box_content h3 {
        font-size: 16px;
        font-weight: 600;
    }

    .box_content h4,
    .box_content h5 {
        font-weight: 500;
    }

    .box_content ul {
        list-style: disc;
        padding-left: 20px;
        margin-bottom: 10px;
        font-style: 16px
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/article/frontend/article/index.blade.php ENDPATH**/ ?>