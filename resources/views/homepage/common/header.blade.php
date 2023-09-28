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
                     <div class='mb-0 site-logo'><a href='{{url("/")}}'><img class='logo logo-1' src='{{asset($fcSystem["homepage_logo"])}}' alt="{{$fcSystem['homepage_company']}}" /></a></div>
                 </div>
                 <div class="col-12 col-lg-9 d-none d-lg-flex align-items-center justify-content-end">
                     <div>
                         <div class="d-flex justify-content-end site-contact">
                             <a class='ml-4' href="tel:{{$fcSystem['contact_hotline']}}"><i class='fa fa-phone'></i> {{$fcSystem['contact_hotline']}}</a>
                             <a class='ml-4' href="mailto:{{$fcSystem['contact_email']}}"><i class='fa fa-envelope'></i>{{$fcSystem['contact_email']}}</a>
                         </div>
                         <nav class="site-nav site-nav-right d-none d-lg-flex justify-content-end">
                             <ul id='menu-site-navigation-left' class='menu justify-content-end'>

                                 @if($menu_header && count($menu_header->menu_items) > 0)
                                 @foreach($menu_header->menu_items as $key=>$item)
                                 <li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-{{$item->id}}'>
                                     <a href='{{url($item->slug)}}' title='{{$item->title}}' target='_parent'>{{$item->title}}
                                         @if (count($item->children) > 0)
                                         <i class='fal fa-chevron-down small ml-2'></i>
                                         @endif
                                     </a>
                                     @if (count($item->children) > 0)
                                     <ul class='sub-menu'>
                                         @foreach($item->children as $child)
                                         <li class='menu-item menu-item-type-post_type menu-item-object-room'>
                                             <a href='{{url($child->slug)}}' title='{{$child->title}}'>{{$child->title}}</a>
                                         </li>
                                         @endforeach
                                     </ul>
                                     @endif
                                 </li>
                                 @endforeach
                                 @endif
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
         @if($menu_header && count($menu_header->menu_items) > 0)
         @foreach($menu_header->menu_items as $key=>$item)
         <li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children'>
             <a href='{{url($item->slug)}}' title='{{$item->title}}' target='_parent'>{{$item->title}}</a>
             @if (count($item->children) > 0)
             <ul class='sub-menu'>
                 @foreach($item->children as $child)
                 <li class='menu-item menu-item-type-post_type menu-item-object-room'>
                     <a href='{{url($child->slug)}}' title='{{$child->title}}'>{{$child->title}}</a>
                 </li>
                 @endforeach
             </ul>
             @endif
         </li>
         @endforeach
         @endif

     </ul>
 </nav>