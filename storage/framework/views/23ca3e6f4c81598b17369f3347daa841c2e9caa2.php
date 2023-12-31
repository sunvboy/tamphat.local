<?php
$listAlbums = json_decode($detail->image_json, true);
$price = getPrice(array('price' => $detail->price, 'price_sale' => $detail->price_sale, 'price_contact' => $detail->price_contact));
if (count($detail->product_versions) > 0) {
    $type = 'variable';
} else {
    $type = 'simple';
}
$version = json_decode(base64_decode($detail->version_json), true);
$attribute_tmp = [];
$attributesID =  [];
if (!empty($version) && !empty($version[2])) {
    foreach ($version[2] as $item) {
        foreach ($item as $val) {
            $attributesID[] = $val;
        }
    }
    if (!empty($attributesID)) {
        $attribute_tmp = \App\Models\Attribute::whereIn('id', $attributesID)->select('id', 'title', 'catalogueid')->with('catalogue')->get();
    }
}
$attributes = [];
if (!empty($attribute_tmp)) {
    foreach ($attribute_tmp as $item) {
        $attributes[] = array(
            'id' => $item->id,
            'title' => $item->title,
            'titleC' => $item->catalogue->title,
        );
    }
}
$attributes = collect($attributes)->groupBy('titleC')->all();

//dd($attributes);

?>
<?php if ($type == 'simple') { ?>
    <?php
    $hiddenAddToCart = 0;
    $quantityStock = '';
    $simpleStock = $detail->product_stocks->sum('value');
    if ($detail->inventory == 1) {
        if ($detail->inventoryPolicy == 0) {
            if ($simpleStock == 0) {
                $hiddenAddToCart = 1;
                $product_stock_title =  '<span class="product_stock">' . trans('index.OutOfStock') . '</span>';
            } else {
                $quantityStock = $simpleStock;
                $product_stock_title = '<span class="product_stock">' . $simpleStock . '</span> ' . trans('index.InOfStock');
            }
        } else {
            $product_stock_title = '<span class="product_stock"></span> ' . trans('index.InOfStock');
        }
    } else {
        $product_stock_title = '<span class="product_stock"></span> ' . trans('index.InOfStock');
    }
    ?>
<?php } ?>
<div class="grid grid-cols-1 lg:grid-cols-2 -mx-4 space-y-5 lg:space-y-0">
    <div class="wow fadeInLeft px-4">
        <input type="hidden" value="<?php echo $detail->id ?>" id="detailProductID">
        <div class="slider">
            <div class="slider__flex ">
                <div class="slider__images w-full">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slider__image">
                                    <img src="<?php echo e($detail->image); ?>" alt="<?php echo e($detail->title); ?>" class="w-full h-[300px] md:h-[400px] lg:h-[300px] object-contain" />
                                </div>
                            </div>
                            <?php if(!empty($listAlbums)): ?>
                            <?php $__currentLoopData = $listAlbums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="slider__image">
                                    <img src="<?php echo e($item); ?>" alt="<?php echo e($detail->title); ?>" class="w-full h-[300px] md:h-[400px] lg:h-[300px] object-contain" />
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="slider__col relative w-full mt-2">
                    <div class="slider__prev z-30 flex items-center justify-center cursor-pointer text-[#333] focus:outline-none absolute top-1/2 left-0 -translate-y-1/2 rounded-full bg-white w-[30px] h-[30px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </div>
                    <div class="slider__thumbs">
                        <div class="swiper-container w-full h-full">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider__image">
                                        <img src="<?php echo e($detail->image); ?>" alt="<?php echo e($detail->title); ?>" class="w-full object-contain h-[96px] border" />
                                    </div>
                                </div>
                                <?php if(!empty($listAlbums)): ?>
                                <?php $__currentLoopData = $listAlbums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="slider__image">
                                        <img src="<?php echo e($item); ?>" alt="<?php echo e($detail->title); ?>" class="w-full object-contain h-[96px] border" />
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="slider__next z-30 flex items-center justify-center cursor-pointer text-[#333] focus:outline-none absolute top-1/2 right-0 -translate-y-1/2 rounded-full bg-white w-[30px] h-[30px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper JS -->
        <!-- END: slide product image PC-->
    </div>
    <div class="wow fadeInRight px-4">
        <h1 class="text-f20 lg:text-f30 font-black mb-[15px]">
            <?php echo e($detail->title); ?>

        </h1>
        <p class="text-f14 mb-[3px]">
            <?php echo e(trans('index.Code')); ?>: <span class="text-blue_primary tp_product_code"><?php echo e($detail->code); ?></span>
        </p>
        <p class="text-f14">
            <?php if(!empty($brand)): ?>
            <?php echo e(trans('index.Brands')); ?>: <a href="<?php echo e(route('brandURL',['slug' => $brand->slug])); ?>" class="text-blue_primary text-red-600"><?php echo e($brand->title); ?></a> &nbsp;|&nbsp;
            <?php endif; ?>
            <?php echo e(trans('index.status')); ?>: <span class="text-blue_primary">
                <?php if($type == 'simple'): ?>
                <?php
                echo $product_stock_title;
                ?>
                <?php else: ?>
                <span class="js_product_stock"><?php echo e(trans('index.InOfStock')); ?></span>
                <?php endif; ?>
            </span>
        </p>
        <p class="price mt-[10px] border-b-[1px] pb-[10px]">
            <span class="text-f25 font-bold text-red-600 tp_product_price_final"><?php echo e($price['price_final']); ?></span>
            <del class="text-f16 text-gray-400 pl-[10px] tp_product_price_old"><?php echo e($price['price_old']); ?></del>

            <span class="percent tp_product_percent" style="background: #dc2626;border-radius: 10px;margin: 0 0 0 5px;position: relative;top: -3px;color: #fff;font-size: 13px;">
                <?php if( $price['percent'] != '' ): ?>
                <span style="padding: 4px 10px;"><?php echo e($price['percent']); ?></span>
                <?php endif; ?>
            </span>
        </p>
        <div class="desc text-f14 mt-[15px]">
            <?php echo $detail->description ?>
        </div>
        <div class="mt-3">
            <!--START: product version -->
            <?php if($type == 'variable' && !empty($attributes)): ?>
            <?php $i = 0; ?>
            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $i++; ?>
            <?php if(count($item) > 0): ?>
            <div class="box-variable mb-3">
                <div class="font-bold text-base mb-1"><?php echo e($key); ?></div>
                <div class="flex flex-wrap">
                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#swiper-slide-<?php echo e($val['id']); ?>" class="tp_item_variable variable_<?php echo e($i); ?> tp_item_variable_<?php echo e($val['id']); ?> py-1 px-5 border mb-2 mr-2 <?php if($k == 0): ?> checked <?php endif; ?>" data-id="<?php echo e($val['id']); ?>" data-stt="<?php echo !empty($i == count($attributes)) ? 0 : 1 ?>">
                        <?php echo e($val['title']); ?>

                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <!--END: product version -->
        </div>
        <div class="w-full py-4">
            <div class="font-black mb-2"><?php echo e(trans('index.Amount')); ?></div>
            <div class="custom-number-input h-10 w-32 flex flex-row rounded-lg relative bg-transparent mt-1">
                <button class="card-dec bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none leading-[50px]">
                    <span class="m-auto text-2xl font-thin">−</span>
                </button>
                <input type="number" class="tp_cardQuantity outline-none focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number" value="1" />
                <button class="card-inc bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer leading-[50px]">
                    <span class="m-auto text-2xl font-thin">+</span>
                </button>
            </div>
            <div class="mt-5 flex items-center w-full space-x-2">
                <button data-quantity="1" data-id="<?php echo e($detail->id); ?>" data-title="<?php echo e($detail->title); ?>" data-price="<?php echo !empty($price['price_final_none_format']) ? $price['price_final_none_format'] : 0 ?>" data-cart="0" data-src="" data-type="<?php echo e($type); ?>" class="tp_addToCart uppercase font-black h-12 w-1/2 text-white bg-red-600 flex-1 cursor-pointer items-center inline-flex rounded-md px-6 justify-center">
                    <?php echo e(trans('index.AddToCart')); ?>

                </button>
                <button data-quantity="1" data-id="<?php echo e($detail->id); ?>" data-title="<?php echo e($detail->title); ?>" data-price="<?php echo !empty($price['price_final_none_format']) ? $price['price_final_none_format'] : 0 ?>" data-cart="1" data-src="" data-type="<?php echo e($type); ?>" class="tp_addToCart uppercase font-black h-12 w-1/2 text-white bg-global flex-1 cursor-pointer items-center inline-flex rounded-md px-6 justify-center">
                    <?php echo e(trans('index.BuyNow')); ?>

                </button>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('javascript'); ?>
<script type="text/javascript" src="<?php echo e(asset('product/rating/bootstrap-rating.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/library/js/common.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/library/css/products.css')); ?>" />
<script>
    var module = 'product';
</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/product/common/detail.blade.php ENDPATH**/ ?>