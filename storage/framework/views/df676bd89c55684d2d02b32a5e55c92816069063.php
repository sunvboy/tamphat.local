 <?php
    $menu_header = getMenus('menu-header');
    $menu_top = getMenus('menu-top');
    $wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'], TRUE) : NULL;
    ?>
 <header id="masthead" class="site-header">
     <div class="col-12 main-header">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12 col-lg-3 d-flex align-items-center justify-content-start">
                     <div class='mb-0 site-logo'><a href='<?php echo e(url("/")); ?>'><img class='logo logo-1' src='<?php echo e(asset($fcSystem["homepage_logo"])); ?>' alt="<?php echo e($fcSystem['homepage_company']); ?>" /></a></div>
                 </div>
                 <div class="col-12 col-lg-9 d-none d-lg-flex align-items-center justify-content-end">
                     <div>
                         <div class="d-flex justify-content-end site-contact">
                             <a class='ml-4' href="tel:<?php echo e($fcSystem['contact_hotline']); ?>"><i class='fa fa-phone'></i> <?php echo e($fcSystem['contact_hotline']); ?></a>
                             <a class='ml-4' href="mailto:<?php echo e($fcSystem['contact_email']); ?>"><i class='fa fa-envelope'></i><?php echo e($fcSystem['contact_email']); ?></a>
                         </div>
                         <nav class="site-nav site-nav-right d-none d-lg-flex justify-content-end">
                             <ul id='menu-site-navigation-left' class='menu justify-content-end'>

                                 <?php if($menu_header && count($menu_header->menu_items) > 0): ?>
                                 <?php $__currentLoopData = $menu_header->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-<?php echo e($item->id); ?>'>
                                     <a href='<?php echo e(url($item->slug)); ?>' title='<?php echo e($item->title); ?>' target='_parent'><?php echo e($item->title); ?>

                                         <?php if(count($item->children) > 0): ?>
                                         <i class='fal fa-chevron-down small ml-2'></i>
                                         <?php endif; ?>
                                     </a>
                                     <?php if(count($item->children) > 0): ?>
                                     <ul class='sub-menu'>
                                         <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <li class='menu-item menu-item-type-post_type menu-item-object-room'>
                                             <a href='<?php echo e(url($child->slug)); ?>' title='<?php echo e($child->title); ?>'><?php echo e($child->title); ?></a>
                                         </li>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </ul>
                                     <?php endif; ?>
                                 </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                             </ul>
                         </nav>
                     </div>
                 </div>
                 <a class="h4 d-lg-none mb-0 position-absolute aside-nav-toggler" href="javascript:void();" style="top: 50%;right: 20px;transform: translateY(-50%);font-size: 2rem;"><i class="fal fa-align-justify"></i></a>
             </div>
         </div>
         <div class="ripped-border-bottom-b"></div>
     </div>
 </header>
 <nav class="aside-nav">
     <a class="modal-close aside-nav-closer" href="javascript:void();"></a>
     <ul id='menu-site-navigation' class='menu'>
         <?php if($menu_header && count($menu_header->menu_items) > 0): ?>
         <?php $__currentLoopData = $menu_header->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children'>
             <a href='<?php echo e(url($item->slug)); ?>' title='<?php echo e($item->title); ?>' target='_parent'><?php echo e($item->title); ?></a>
             <?php if(count($item->children) > 0): ?>
             <ul class='sub-menu'>
                 <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class='menu-item menu-item-type-post_type menu-item-object-room'>
                     <a href='<?php echo e(url($child->slug)); ?>' title='<?php echo e($child->title); ?>'><?php echo e($child->title); ?></a>
                 </li>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
             <?php endif; ?>
         </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>

     </ul>
 </nav><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/homepage/common/header.blade.php ENDPATH**/ ?>