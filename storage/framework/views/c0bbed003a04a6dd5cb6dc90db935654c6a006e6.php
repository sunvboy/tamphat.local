<?php $__env->startSection('content'); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if($slideHome && count($slideHome->slides) > 0): ?>
            <div class='position-relative home-slider'>
                <div class='position-relative site-slider'>
                    <?php $__currentLoopData = $slideHome->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class='text-white bg-cover align-items-center justify-content-end item' style='background-image: url("<?php echo e($slide->src); ?>")'>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-12'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
            <!-- ======================== Booking ======================== -->

            <?php if($with && count($with->slides) > 0): ?>
            <section class='bg-white'>
                <div class='position-relative'>
                    <div class='ripped-border-top-grey'></div>
                    <div class='pt-8'>
                        <div class='container text-center'>
                            <div class='text-center position-relative'>
                                <h2 class='font-family-secondary h1 text-primary mb-0'><?php echo e($with->title); ?></h2>
                            </div>
                            <!-- <div class='lh-body px-lg-5 mt-5 d-none'>
                                <div class='font-18'>Ready for an unforgettable time in Hanoi?
                                    Come over to Hanoi Backpackers Hostel + Rooftop Bar, stay in one of our
                                    beautiful dorm rooms, admire the views at our 11th floor rooftop bar, meet
                                    other travelers, party together, explore the beautiful city of Hanoi or just
                                    relax, play pool or try something from our western friendly restaurant.
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class='ptop-3'>
                    <div class='blog-home'>
                        <div class='container'>
                            <div class='row justify-content-center'>
                                <?php $__currentLoopData = $with->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class='col-12 col-md-3 px-4'>
                                    <div class='h-100 bg-white'>
                                        <div class='overflow-hidden p-4'>
                                            <a class='overflow-hidden' href='<?php echo e($slide->url); ?>'>
                                                <img src="<?php echo e($slide->src); ?>" class="" alt="<?php echo e($slide->title); ?>" style="border-radius: 100%" />
                                            </a>
                                        </div>
                                        <div class='p-3 bg-white'>
                                            <div class='text-center mb-3'><a class='font-family-secondary h4' href='<?php echo e($slide->url); ?>'><?php echo e($slide->title); ?></a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php if(!empty($ishomeCategoryRoom)): ?>
            <?php if(!empty($ishomeCategoryRoom->rooms) && count($ishomeCategoryRoom->rooms) > 0): ?>
            <section class='bg-white position-relative'>
                <div class='position-relative'>
                    <div class='ripped-border-top-grey'></div>
                    <div class='pt-8 pb-5'>
                        <div class='container text-center'>
                            <div class='text-center position-relative'>
                                <h2 class='font-family-secondary h1 text-primary mb-0'><?php echo e($ishomeCategoryRoom->title); ?></h2>
                            </div>
                            <!-- <div class='lh-body px-lg-5 mt-5 d-none'>
                                <div class='font-18'>With private and dorm rooms available, we have options for
                                    every kind of traveler. Our bright and spacious private rooms give you a
                                    quiet getaway from the craziness of the city. With our dorms giving you the
                                    best sleep in all of Vietnam, with outlets and privacy curtains in every
                                    bed. The best part of staying here though is the FREE breakfast buffet,
                                    something you can't miss!</div>
                            </div> -->
                        </div>
                    </div>
                    <div class='ripped-border-bottom-grey'></div>
                </div>
                <div class='rooms1 ptop-0 pbottom-0 col-12 home-rooms-list'>
                    <div class='row'>
                        <div class='owl-carousel single-new1'>
                            <?php $__currentLoopData = $ishomeCategoryRoom->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class='item room-box-home'>
                                <div class='overflow-hidden'>
                                    <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>">
                                        <span class='bg-cover d-block h-100 mh-2-8 zoom lazyload' data-bg='<?php echo e($item->image); ?>'></span>
                                    </a>
                                </div>
                                <div class='con'>
                                    <h6 class='font-family-secondary mb-0 h4'><a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>"><?php echo e(strip_tags($item->title)); ?></a>
                                    </h6>
                                    <div class='con-content'>
                                        <p class='mt-3 mb-0'>
                                            <?php echo e(strip_tags($item->description)); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(!empty($ishomeCategoryTour)): ?>
            <?php $__currentLoopData = $ishomeCategoryTour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($item->posts) && count($item->posts) > 0): ?>

            <section class=' position-relative'>
                <div class='position-relative'>
                    <div class='ripped-border-top-w'></div>
                    <div class='py-8 bg-white'>
                        <div class='container text-center'>
                            <div class='text-center position-relative'>
                                <h2 class='font-family-secondary h1 text-primary mb-0'><?php echo e($item->title); ?></h2>
                            </div>
                            <div class='lh-body px-lg-5 mt-5'>
                                <div class='font-18'><?php echo $item->description; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class='ripped-border-bottom-w'></div>
                </div>
                <div class='col-12 new1 ptop-0 pbottom-0'>
                    <div class='row'>
                        <?php $__currentLoopData = $item->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $price = '';
                        if (!empty($val->price)) {
                            $price = '$' . $val->price;
                        } else {
                            $price = "Contact";
                        }
                        ?>
                        <div class='col-12 col-lg-4 px-1 mb-2'>
                            <div class='new1-box'>
                                <a class='d-block' href="<?php echo e(route('routerURL',['slug' => $val->slug])); ?>">
                                    <span class='bg-cover d-block h-100 mh-2-8 zoom lazyload' data-bg='<?php echo e($val->image); ?>'></span>
                                    <span class='con1 bg-gradient-bottom p-3'>
                                        <h6 class='font-family-secondary mb-0 h5'><?php echo e($val->title); ?></h6>
                                        <div class='font-weight-semibold mt-3'>Price From: <span class='box-price'><?php echo e(!empty($price)?$price:''); ?></span></div>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <section class='bg-cover my-5' style='background-image:url("<?php echo e(asset($fcSystem['pdf_0'])); ?>")'>
                <div class='ptop-10 pbottom-10'>
                    <div class='blog-home'>
                        <div class='container'>
                            <div class='row justify-content-center'>
                                <div class='col-12 col-md-11 px-4'>
                                    <div class='h-100'>
                                        <div class='p-3'>
                                            <div class='text-center mb-3'><a class='font-family-secondary h2 text-white' href='#'><?php echo e($fcSystem['pdf_1']); ?></a></div>
                                            <div class='text-center mb-3 text-white'>
                                                <p><?php echo $fcSystem['pdf_2']; ?>

                                                </p>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-md-3 mb-2"><a class="btn  mt-3 d-block m-w-full bg-white text-primary" href="<?php echo e(asset($fcSystem['pdf_3'])); ?>" target="_blank">Food
                                                        Menu<i class="fal fa-arrow-right ml-2"></i></a></div>
                                                <div class="col-12 col-md-3 mb-2"><a class="btn mt-3 d-block m-w-full bg-white text-secondary" href="<?php echo e(asset($fcSystem['pdf_4'])); ?>" target="_blank">Drink
                                                        Menu<i class="fal fa-arrow-right ml-2"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php if($cars && count($cars->slides) > 0): ?>
            <section class="pt-5 pb-10">
                <div class="position-relative">
                    <div class="pb-5 bg-white">
                        <div class="container text-center">
                            <div class="text-center position-relative">
                                <h2 class="font-family-secondary h1 text-primary mb-0"><?php echo e($fcSystem['title_carts']); ?>

                                </h2>
                            </div>
                            <div class="lh-body px-lg-5 mt-5">
                                <div class="font-18"><?php echo e($fcSystem['title_carts_description']); ?>

                                </div>
                            </div>
                            <div class="text-center position-relative mt-3" style="z-index: 11;"><a class="small text-secondary btn-underline" href="<?php echo e($fcSystem['title_carts_link']); ?>">See more<i class="fal fa-long-arrow-right ml-2"></i></a></div>
                        </div>
                    </div>
                    <div class="ripped-border-bottom-w"></div>
                </div>
                <div class="container position-relative">
                    <div id="carouselSlide" class="carousel">
                        <?php $__currentLoopData = $cars->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id='item_<?php echo e($key+1); ?>' class="hideLeft">
                            <img src="<?php echo e(asset($slide->src)); ?>" alt="<?php echo e($slide->title); ?>">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="buttons">
                        <button id="prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button id="next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                </div>
            </section>
            <?php endif; ?>

        </main>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/homepage/home/index.blade.php ENDPATH**/ ?>