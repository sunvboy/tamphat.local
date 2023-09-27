<?php $__env->startSection('content'); ?>
<div id="main" class="sitemap">
    <?php if(!empty($slideHome->slides) && count($slideHome->slides) > 0): ?>
    <div class="main-banner">
        <div id="slider-home" class="owl-carousel">
            <?php $__currentLoopData = $slideHome->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <a href="<?php echo e(url($slide->link)); ?>">
                    <img class="w-full" src="<?php echo e(asset($slide->src)); ?>" alt="banner">
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if(!empty($cpOne->slides) && count($cpOne->slides) > 0): ?>
    <section class="top-content md:pt-10 wow fadeInUp">
        <div class="flex flex-wrap justify-start">
            <?php $__currentLoopData = $cpOne->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="w-1/2 md:w-1/4 px-[1px]">
                <div class="item hover-zoom relative mb-[2px] md:mb-0">
                    <div class="img">
                        <a href="<?php echo e(url($slide->link)); ?>"><img src="<?php echo e(asset($slide->src)); ?>" alt="<?php echo e($slide->title); ?>" class="w-full object-cover md:h-[430px] 2xl:h-[630px]" /></a>
                    </div>
                    <div class="gateway-blocks__overlay h-full absolute top-0 w-full left-0" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%,#00000033 100%);"></div>
                    <?php if(!empty($slide->title)): ?>
                    <div class="nav-img absolute bottom-0 left-0 w-full p-[10px] md:p-[20px] z-10 text-center">
                        <h3 class="text-f16 md:text-f23 font-bold uppercase leading-[20px] md:leading-[26px]">
                            <a href="<?php echo e(url($slide->link)); ?>" class="text-white"> <?php echo e($slide->title); ?> </a>
                        </h3>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if(!empty($partner->slides) && count($partner->slides) > 0): ?>
    <!-- start: box 4 -->
    <section class="partner-home py-12 wow fadeInUp">
        <div class="container mx-auto px-3">
            <h2 class="title-primary text-f22 text-center uppercase font-bold">
                <?php echo e($partner->title); ?>

            </h2>
        </div>
        <div class="slider-logo owl-carousel mt-[30px]">
            <?php $__currentLoopData = $partner->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <a href="<?php echo e($item->link); ?>"><img src="<?php echo e(asset($item->src)); ?>" alt="<?php echo e($item->title); ?>" class="h-[27px] object-contain" style="vertical-align:bottom" /></a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>


    <?php if(!empty($ishomeCategoryProduct)): ?>
    <section class="product-home pt-[20px] md:pt-16 wow fadeInUp">
        <div class="">
            <div class="relative mb-[20px] md:mb-[30px] px-4">
                <h2 class="title-primary text-center text-f22 uppercase font-bold static md:absolute top-1/2 -translate-y-1/2 left-3">
                    <?php echo e($fcSystem['title_1']); ?>

                </h2>
                <ul class="tabs flex flex-wrap justify-center mt-[15px] md:mt-0">
                    <?php $__currentLoopData = $ishomeCategoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="tab <?php echo e(!empty($key == 0) ? 'current' : ''); ?> cursor-pointer inline-block py-[8px] px-[15px] border mx-[2px] font-medium uppercase" data-tab="tab-<?php echo e($item->id); ?>">
                        • <?php echo e($item->title); ?>

                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php $__currentLoopData = $ishomeCategoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="tab-<?php echo e($item->id); ?>" class="tab-content <?php echo e(!empty($key == 0) ? 'current' : ''); ?>">
                <div class="slider-product owl-carousel">
                    <?php if(!empty($item->posts)): ?>
                    <?php $__currentLoopData = $item->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo htmlItemProduct($k, $v); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if(!empty($cpTwo->slides) && count($cpTwo->slides) > 0): ?>
    <section class="top-content top-content-2 py-[30px] md:py-[80px] wow fadeInUp" style="visibility: visible; animation-name: fadeInUp">
        <div class=" mx-auto">
            <h2 class="title-primary text-f22 text-center uppercase font-bold">
                <?php echo e($cpTwo->title); ?>

            </h2>
            <div class="flex flex-wrap justify-start mt-[30px]">
                <?php $__currentLoopData = $cpTwo->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-1/2 md:w-1/4 px-[1px]">
                    <div class="item hover-zoom relative mb-[2px] md:mb-0">
                        <div class="img">
                            <a href="<?php echo e(url($slide->link)); ?>"><img src="<?php echo e(asset($slide->src)); ?>" alt="<?php echo e($slide->title); ?>" class="w-full object-cover md:h-[430px] 2xl:h-[630px]" /></a>
                        </div>
                        <div class="gateway-blocks__overlay h-full absolute top-0 w-full left-0" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%,#00000033 100%);"></div>
                        <?php if(!empty($slide->title)): ?>
                        <div class="nav-img absolute bottom-0 left-0 w-full p-[10px] md:p-[20px] z-10 text-center">
                            <h3 class="text-f16 md:text-f23 font-bold uppercase leading-[20px] md:leading-[26px]">
                                <a href="<?php echo e(url($slide->link)); ?>" class="text-white"> <?php echo e($slide->title); ?> </a>
                            </h3>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(!empty($cpThree->slides) && count($cpThree->slides) > 0): ?>
    <section class="other-shops wow fadeInUp">
        <div class="container mx-auto px-3">
            <div class="flex flex-wrap justify-between mx-[-100px]">
                <?php $__currentLoopData = $cpThree->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-full md:w-1/2 px-[100px]">
                    <div class="item mb-[15px] md:mb-[50px] relative">
                        <div class="img relative">
                            <a href="<?php echo e(url($slide->link)); ?>"><img src="<?php echo e(asset($slide->src)); ?>" alt="<?php echo e($slide->title); ?>" class="w-full" /></a>

                        </div>
                        <div class="readmore text-center mt-[15px]">
                            <a href="<?php echo e(url($slide->link)); ?>" class="underline text-f16 font-bold transition-all hover:pl-[10px] hover:opacity-75 tracking-wider">
                                <?php echo e($slide->title); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    $jsonHome = !empty($fields['config_colums_json_home']) ? $fields['config_colums_json_home'] : '';
    ?>
    <?php if(!empty($jsonHome->title)): ?>
    <?php $__currentLoopData = $jsonHome->title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="banner-shop banner-shop1 wow fadeInUp">
        <div class="img-banner-shop hover-zoom">
            <a href="<?php echo e(!empty($jsonHome->link_button[$key]) ? $jsonHome->link_button[$key] :''); ?>">
                <img src="<?php echo e(!empty($jsonHome->image[$key]) ? $jsonHome->image[$key] :''); ?>" alt="<?php echo e($item); ?>" class="w-full" />
            </a>
        </div>
        <div class="container mx-auto px-3 py-12">
            <div class="content-banner-shop text-center space-y-4">
                <h2 class="title-primary text-center text-f24 uppercase font-bold mb-0">
                    <?php echo e($item); ?>

                </h2>
                <?php if(!empty($jsonHome->description[$key])): ?>
                <h4 class="text-f18 "><?php echo e(!empty($jsonHome->description[$key]) ? $jsonHome->description[$key] :''); ?></h4>
                <?php endif; ?>
                <a href="<?php echo e(!empty($jsonHome->link_button[$key]) ? $jsonHome->link_button[$key] :''); ?>" class="inline-flex uppercase px-[30px] py-[14px] bg-color_primary text-white border border-color_primary transition-all hover:bg-white hover:text-color_primary">
                    <?php echo e(!empty($jsonHome->title_button[$key]) ? $jsonHome->title_button[$key] :''); ?>

                </a>
            </div>
        </div>
    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(!empty($cpFour->slides) && count($cpFour->slides) > 0): ?>
    <section class="top-content top-content-2 pb-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp">
        <div class=" mx-auto">
            <h2 class="title-primary text-f22 text-center uppercase font-bold">
                <?php echo e($cpFour->title); ?>

            </h2>
            <div class="flex flex-wrap justify-start mt-[30px]">
                <?php $__currentLoopData = $cpFour->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-1/2 md:w-1/4 px-[1px]">
                    <div class="item hover-zoom relative mb-[2px] md:mb-0">
                        <div class="img">
                            <a href="<?php echo e(url($slide->link)); ?>"><img src="<?php echo e(asset($slide->src)); ?>" alt="<?php echo e($slide->title); ?>" class="w-full object-cover md:h-[430px] 2xl:h-[630px]" /></a>
                        </div>
                        <div class="gateway-blocks__overlay h-full absolute top-0 w-full left-0" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%,#00000033 100%);"></div>
                        <?php if(!empty($slide->title)): ?>
                        <div class="nav-img absolute bottom-0 left-0 w-full p-[10px] md:p-[20px] z-10 text-center">
                            <h3 class="text-f16 md:text-f23 font-bold uppercase leading-[20px] md:leading-[26px]">
                                <a href="<?php echo e(url($slide->link)); ?>" class="text-white"> <?php echo e($slide->title); ?> </a>
                            </h3>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <?php /*<section class="banner-shop banner-shop1 wow fadeInUp">
        <div class="img-banner-shop hover-zoom">
            <a href=""><img src="frontend/img/brbie_d.webp" alt="" class="w-full" /></a>
        </div>
        <div class="container mx-auto px-3 py-12">
            <div class="content-banner-shop text-center">
                <h2 class="title-primary text-center text-f24 uppercase font-bold">
                    BARBIE GIRL IN A DESIGNER WORLD
                </h2>
                <h4 class="text-f18 pt-[15px]">NEW: THE BARBIE COLLECTION</h4>
                <button class="mt-[20px] uppercase px-[30px] h-[45px] bg-color_primary text-white border border-color_primary transition-all hover:bg-white hover:text-color_primary">
                    THE PINK SHOP
                </button>
            </div>
        </div>
    </section>*/ ?>


    <?php echo $__env->make('homepage.common.recently', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childsplay/domains/childsplayclothing.vn/public_html/resources/views/homepage/home/index.blade.php ENDPATH**/ ?>