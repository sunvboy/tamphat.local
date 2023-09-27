 <?php
    $reviews = \App\Models\Comment::where(['parentid' => 0, 'module' => 'products', 'publish' => 0, 'rating' => 5])
        ->orderBy('id', 'desc')
        ->limit(30)
        ->get();
    if (!empty($reviews)) {
        foreach ($reviews as $key => $item) {
            $checkOrder = \App\Models\Orders_item::where(['product_id' => $item->module_id, 'customer_id' => $item->customerid])->first();
            $reviews[$key]['checkOrder'] = !empty($checkOrder) ? 1 : 0;
        }
    }
    ?>
 <?php if(count($reviews) > 0): ?>
 <div class="our-review py-5 md:py-[30px] wow fadeInUp">
     <div class="container mx-auto px-3">
         <h2 class="title-primary text-black text-f30 md:text-f40 font-black text-center leading-[35px] md:leading-[40px] relative">
             <?php echo e($fcSystem['about_12']); ?>

         </h2>
         <div class="slider-review owl-carousel pb-[30px] mt-[30px]">
             <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="item">
                 <div class="flex flex-wrap justify-between  mb-[10px]">
                     <div class="flex">
                         <?php for ($i = 1; $i <= $item->rating; $i++) { ?>
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                     <path d="M10 2.5L12.1832 7.34711L17.5 7.91118L13.5325 11.4709L14.6353 16.6667L10 14.0196L5.36474 16.6667L6.4675 11.4709L2.5 7.91118L7.81679 7.34711L10 2.5Z" stroke="#FFD52E" fill="#FFD52E"></path>
                                     <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99996 1.66675L12.4257 7.09013L18.3333 7.72127L13.925 11.7042L15.1502 17.5177L9.99996 14.5559L4.84968 17.5177L6.07496 11.7042L1.66663 7.72127L7.57418 7.09013L9.99996 1.66675ZM9.99996 3.57863L8.10348 7.81865L3.48494 8.31207L6.93138 11.426L5.97345 15.9709L9.99996 13.6554L14.0265 15.9709L13.0685 11.426L16.515 8.31207L11.8964 7.81865L9.99996 3.57863Z" fill="#FFD52E"></path>
                                 </svg>
                             </span>
                         <?php } ?>
                         <?php for ($i = 1; $i <= 5 - $item->rating; $i++) { ?>
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                     <path d="M10 2.5L12.1832 7.34711L17.5 7.91118L13.5325 11.4709L14.6353 16.6667L10 14.0196L5.36474 16.6667L6.4675 11.4709L2.5 7.91118L7.81679 7.34711L10 2.5Z" stroke="#dddddd" fill="#dddddd"></path>
                                     <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99996 1.66675L12.4257 7.09013L18.3333 7.72127L13.925 11.7042L15.1502 17.5177L9.99996 14.5559L4.84968 17.5177L6.07496 11.7042L1.66663 7.72127L7.57418 7.09013L9.99996 1.66675ZM9.99996 3.57863L8.10348 7.81865L3.48494 8.31207L6.93138 11.426L5.97345 15.9709L9.99996 13.6554L14.0265 15.9709L13.0685 11.426L16.515 8.31207L11.8964 7.81865L9.99996 3.57863Z" fill="#dddddd"></path>
                                 </svg>
                             </span>
                         <?php } ?>
                     </div>
                     <div class="">
                         <p class="date text-gray-600 text-f14 text-right">
                             <?php echo e($item->created_at); ?>

                         </p>
                     </div>
                 </div>
                 <h3 class="text-f16 font-bold text-gray-600 clamp clamp2">
                     <?php if(!empty($item->product)): ?>
                     <a href="<?php echo e(route('routerURL',['slug' => $item->product->slug])); ?>" class="text-blue-600 hover:text-red-600 transition-all">
                         <?php echo e(!empty($item->product->title)?$item->product->title:''); ?>

                     </a>
                     <?php endif; ?>
                 </h3>
                 <div class="flex flex-wrap justify-between  mt-[10px]">
                     <div class="w-1/4 px-[10px] space-y-2">
                         <div class="img hover-zoom">
                             <?php if(!empty($item->product)): ?>
                             <img src=" <?php echo e(!empty($item->product->image)?asset($item->product->image):''); ?>" alt="<?php echo e($item->product->title); ?>" />
                             <?php endif; ?>
                         </div>
                         <?php if(!empty($item->fullname)): ?>
                         <p class="text-f12 leading-[19px] text-gray-400">
                             <?php echo e($item->fullname); ?>

                         </p>
                         <?php endif; ?>
                     </div>
                     <div class="w-3/4 px-[10px] space-y-1">
                         <?php if(!empty($item->checkOrder)): ?>
                         <p class="text-f15 font-bold">
                             <span class="text-green-500">
                                 <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                 <?php echo e(trans('index.VerifiedBuyer')); ?>

                             </span>
                         </p>
                         <?php endif; ?>
                         <div class="desc text-f15 text-gray-500">
                             <?php echo $item->message; ?>

                         </div>

                     </div>
                 </div>
             </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
     </div>
 </div>
 <?php endif; ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/reviews.blade.php ENDPATH**/ ?>