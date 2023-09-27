 <?php
    $menu_header = getMenus('menu-header');
    $menu_top = getMenus('menu-top');
    $wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'],TRUE) : NULL;
    ?>
 <div class="header-main-pc">
     <header class="hidden md:block header-pc bg-white">
         <div class="top-header bg-color_primary py-[10px]">
             <div class="container mx-auto px-3">
                 <div class="flex flex-wrap justify-between mx-[-10px]">
                     <div class="w-full md:w-4/12 px-[10px]">
                         <div class="menu-top">
                             <?php if($menu_top && count($menu_top->menu_items) > 0): ?>
                             <ul class="flex flex-wrap justify-start space-x-5">
                                 <?php $__currentLoopData = $menu_top->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li>
                                     <a href="<?php echo e(url($item->slug)); ?>" class="inline-block text-f14 text-white"><?php echo e($item->title); ?></a>
                                 </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </ul>
                             <?php endif; ?>
                         </div>
                     </div>
                     <div class="w-full md:w-8/12 px-[10px]">
                         <ul class="flex flex-wrap justify-end space-x-10">
                             <li class="text-f14 text-white ">
                                 <i class="fa-solid fa-clock mr-[5px]"></i><?php echo e($fcSystem['contact_time']); ?>

                             </li>
                             <li class="text-f14 text-white ">
                                 <i class="fa-solid fa-phone mr-[5px]"></i>Hotline:
                                 <?php echo e($fcSystem['contact_hotline']); ?>

                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <div class="logo-box py-[10px]">
             <div class="container mx-auto px-3">
                 <div class="flex flex-wrap justify-between items-center mx-[-15px]">
                     <div class="w-1/4 px-[15px]">
                         <form action="<?php echo e(route('homepage.search')); ?>" class="flex items-center space-x-3">
                             <button class="text-gray-600 text-f16">
                                 <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6">
                                     <path d="M10.909 17.83a6.92 6.92 0 1 0 0-13.841 6.92 6.92 0 0 0 0 13.84Zm0 .988a7.909 7.909 0 1 0 0-15.818 7.909 7.909 0 0 0 0 15.818Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                     <path d="M16.346 15.647 21 20.301l-.7.699-4.653-4.654.7-.699Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                 </svg>
                             </button>
                             <input type="text" placeholder="Tìm sản phẩm" name="keyword" class="w-full h-[40px] rounded-[25px] text-f15 border-0 outline-none focus:outline-none hover:outline-none" autocomplete="off"/>
                         </form>
                     </div>
                     <div class="w-1/4 px-[15px]">
                         <div class="main-logo text-center">
                             <a href="<?php echo e(getUrlHome()); ?>">
                                 <img src="<?php echo e(asset($fcSystem['homepage_logo'])); ?>" class="inline-block" alt="<?php echo e($fcSystem['homepage_company']); ?>" />
                             </a>
                         </div>
                     </div>
                     <div class="w-1/4 px-[15px]">
                         <div class="flex items-center space-x-5 justify-end">
                             <?php if(!empty(Auth::guard('customer')->user())): ?>
                             <a class="" href="<?php echo e(route('customer.dashboard')); ?>">
                                 <svg class="w-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M12 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM5.733 15.813C6.793 13.974 8.706 12.5 12 12.5v1c-2.928 0-4.515 1.276-5.4 2.812-.908 1.576-1.1 2.473-1.1 3.688h-1c0-1.285.197-2.388 1.233-4.187ZM18.267 15.813C17.207 13.974 15.294 12.5 12 12.5v1c2.928 0 4.515 1.276 5.4 2.812.908 1.576 1.1 2.473 1.1 3.688h1c0-1.285-.197-2.388-1.233-4.187Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                     <path d="M4.5 19.5h15v1h-15v-1Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                 </svg>
                             </a>
                             <?php else: ?>
                             <a class="" href="<?php echo e(route('customer.login')); ?>">
                                 <svg class="w-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M12 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM5.733 15.813C6.793 13.974 8.706 12.5 12 12.5v1c-2.928 0-4.515 1.276-5.4 2.812-.908 1.576-1.1 2.473-1.1 3.688h-1c0-1.285.197-2.388 1.233-4.187ZM18.267 15.813C17.207 13.974 15.294 12.5 12 12.5v1c2.928 0 4.515 1.276 5.4 2.812.908 1.576 1.1 2.473 1.1 3.688h1c0-1.285-.197-2.388-1.233-4.187Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                     <path d="M4.5 19.5h15v1h-15v-1Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                 </svg>
                             </a>
                             <?php endif; ?>
                             <a class="relative" href="<?php echo e(route('homepage.wishlist_index')); ?>">
                                 <svg class="w-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M7.695 4c-1.208 0-2.416.505-3.328 1.515-1.824 2.019-1.822 5.246 0 7.267l7.265 8.057a.493.493 0 0 0 .727 0l7.273-8.049c1.824-2.02 1.824-5.248 0-7.267-1.824-2.02-4.832-2.02-6.656 0L12 6.603l-.977-1.088C10.111 4.505 8.903 4 7.695 4Zm0 1.007c.934 0 1.864.401 2.594 1.209l1.351 1.49a.492.492 0 0 0 .727 0l1.343-1.474c1.46-1.615 3.736-1.615 5.196 0 1.459 1.615 1.459 4.242 0 5.857L12 19.735l-6.906-7.662c-1.458-1.617-1.46-4.242 0-5.858.73-.807 1.667-1.208 2.601-1.208Z" fill="#111"></path>
                                 </svg>
                                 <span class="absolute rounded-full -right-1 top-0 text-white text-[0.5625rem] w-3 h-3 bg-black flex items-center justify-center quantity-wishlist-header" aria-hidden="true"><?php echo $wishlist ? count($wishlist) : 0 ?></span>
                             </a>
                             <a class="relative tp-cart" href="javascript:void(0)">
                                 <svg class="w-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M5.76 9 4.17 19H19.83L18.24 9H5.76Zm13.334-1H4.906L3 20h18L19.094 8Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                     <path d="M15.36 8a3.36 3.36 0 0 1-6.72 0h6.72Z"></path>
                                     <path d="M12 4c-1.993 0-3.768 1.56-4.187 3.76h8.373C15.767 5.56 13.993 4 12 4Zm5.2 3.76c.053.325.08.659.08 1H6.72c0-.34.027-.675.08-1C7.232 5.056 9.395 3 12 3c2.603 0 4.767 2.056 5.2 4.76Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                 </svg>
                                 <span class="cart-quantity absolute rounded-full -right-1 top-0 text-white text-[0.5625rem] w-3 h-3 bg-black flex items-center justify-center" aria-hidden="true"><?php echo e($cart['quantity']); ?></span>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <?php if($menu_header && count($menu_header->menu_items) > 0): ?>
         <div class="main-logo-cart border-t border-b border-gray-300 relative">
             <div class="container mx-auto px-3">
                 <div class="main-menu flex flex-wrap">
                     <ul class="flex lg:flex-grow md:space-x-0 lg:space-x-4 flex-wrap justify-center">
                         <?php $__currentLoopData = $menu_header->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <li class="group relative">
                             <a href="<?php echo e(url($item->slug)); ?>" class="inline-block px-[10px] lg:px-[25px] uppercase py-[15px] text-f15 transition-all relative hover:opacity-80">
                                 <span class="lg:mt-0 hover:opacity-80 transition-all">
                                     <?php echo e($item->title); ?>

                                     <?php if(count($item->children) > 0): ?>
                                     <span class="text-f11 ml-[5px]"><i class="fa-solid fa-chevron-down"></i></span>
                                     <?php endif; ?>
                                 </span>
                             </a>
                             <?php if(count($item->children) > 0): ?>
                             <div class="absolute top-full left-0 bg-white p-[10px] w-[300px] shadow menu-header-child z-[999999] hidden group-hover:block">
                                 <ul class="">
                                     <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li class="border-b border-dashed border-primary w-full float-left">
                                         <a href="<?php echo e(url($child->slug)); ?>" class="py-2 w-full hover:text-primary float-left"><?php echo e($child->title); ?></a>
                                     </li>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                             </div>
                             <?php endif; ?>
                         </li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                 </div>
             </div>
         </div>
         <?php endif; ?>

     </header>
 </div>

 <!-- Modal toggle -->
 <div class="header-main-mobile relative">
     <header class="block md:hidden header-mobile">
         <div class="flex justify-center px-2 py-[5px] header-22">
             <div class="w-full text-center">
                 <div class="menu-toggle">
                     <!-- begin mobile -->
                     <div class="wrapper cf block lg:hidden">
                         <nav id="main-nav">

                             <style>
                                 #main-nav {

                                     display: none;

                                 }
                             </style>

                             <ul class="second-nav">

                                 <?php if($menu_header && count($menu_header->menu_items) > 0): ?>

                                 <?php $__currentLoopData = $menu_header->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                 <li class="menu-item">

                                     <a href="<?php echo e(url($item->slug)); ?>"><?php echo e($item->title); ?></a>

                                     <?php if(count($item->children) > 0): ?>

                                     <ul>

                                         <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                         <li>

                                             <a href="<?php echo e(url($child->slug)); ?>"><?php echo e($child->title); ?></a>

                                             <?php if(count($child->children) > 0): ?>

                                             <ul>

                                                 <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                 <li>

                                                     <a href="<?php echo e(url($c->slug)); ?>"><?php echo e($c->title); ?></a>

                                                 </li>

                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                             </ul>

                                             <?php endif; ?>

                                         </li>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                     </ul>

                                     <?php endif; ?>

                                 </li>

                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 <?php endif; ?>

                             </ul>

                         </nav>
                         <a class="toggle w-10 md:w-50px flex justify-center items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                             </svg>
                         </a>
                     </div>
                     <!-- end mobile -->
                 </div>
                 <a href="<?php echo e(getUrlHome()); ?>" class="logo">
                     <img src="<?php echo e(asset($fcSystem['homepage_logo'])); ?>" class="inline-block" alt="<?php echo e($fcSystem['homepage_company']); ?>" />
                 </a>
                 <div class="search-mobile absolute right-[15px] top-1/2 -translate-y-1/2">
                     <div class="relative">
                         <div class="click-mobile-search">
                             <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6">
                                 <path d="M10.909 17.83a6.92 6.92 0 1 0 0-13.841 6.92 6.92 0 0 0 0 13.84Zm0 .988a7.909 7.909 0 1 0 0-15.818 7.909 7.909 0 0 0 0 15.818Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                 <path d="M16.346 15.647 21 20.301l-.7.699-4.653-4.654.7-.699Z" fill-rule="evenodd" clip-rule="evenodd"></path>
                             </svg>
                         </div>
                         <div class="nav-search-mobile absolute top-[35px] right-0 z-10" style="display: none">
                             <form action="<?php echo e(route('homepage.search')); ?>" class="relative">
                                 <input autocomplete="off" type="text" placeholder="Tìm kiếm" name="keyword" style="width: 300px" class="h-[40px] border border-gray-200 text-f14" />
                                 <button type="submit" class="absolute top-[10px] right-[10px]">
                                     <i class="fa-solid fa-magnifying-glass text-f15"></i>
                                 </button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </header>
 </div>
<?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/homepage/common/header.blade.php ENDPATH**/ ?>