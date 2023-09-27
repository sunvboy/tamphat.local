<?php $__env->startSection('content'); ?>

<?php echo htmlBreadcrumb('',$breadcrumb); ?>


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

<?php



$policyProduct = Cache::remember('policyProduct', 10000, function () {

    $policyProduct = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'policy-detail-product'])->with('slides')->first();

    return $policyProduct;
});

$fields = \App\Models\ConfigPostmeta::select('meta_value')->where('meta_key', 'config_colums_json_policy')->first();

$fields = json_decode($fields->meta_value, TRUE);

$wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'], TRUE) : NULL;

$i_class = 'fa-regular';
if (!empty($wishlist)) {
    if (in_array($detail->id, $wishlist)) {
        $i_class = 'fa-solid';
    }
}

?>

<input type="hidden" value="<?php echo $detail->id ?>" id="detailProductID">

<div id="main" class="sitemap main-product-detail">



    <div class="content-detail-product pt-0 md:pt-[20px]">

        <div class="top-detail-product">

            <div class="">

                <div class="grid grid-cols-1 md:grid-cols-12 gap-0 md:gap-2 lg:gap-5">

                    <div class="md:col-span-7">

                        <div class="top-detail-left">

                            <div class="flex flex-wrap justify-start mx-[-1px]">

                                <?php if(!empty($listAlbums)): ?>

                                <?php $__currentLoopData = $listAlbums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="w-1/2 px-[1px]">

                                    <div class="img mb-[2px]">

                                        <img src="<?php echo e($item); ?>" alt="<?php echo e($detail->title); ?>" class="w-full object-cover">

                                    </div>

                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                    <div class="md:col-span-5 p-4 lg:p-0">

                        <div class="top-detail-right pr-4">
                            <?php if(!empty($detail['getTags'])): ?>
                            <?php $__currentLoopData = $detail['getTags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kt => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($kt == 0): ?>


                            <h3 class="title-2 text-f25 font-bold"><a href="<?php echo e(route('tagURL', ['slug' => $tag['slug']])); ?>"><?php echo e($tag['title']); ?></a>
                                <a href="javascript:void(0)" data-id="<?php echo e($detail->id); ?>" class="js_add_wishlist mobile-dpwl" style="float: right;"><i class="<?php echo e($i_class); ?> fa-heart js_add_wishlist_<?php echo e($detail->id); ?>"></i></a>
                            </h3>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>


                            <div class="description mt-[10px]">

                                <p><?php echo e($detail->title); ?></p>

                            </div>

                            <p class="price text-red-600 text-f15 font-bold mt-[10px]">

                                <span class="text-f20 md:text-f30 font-bold"><?php echo e($price['price_final']); ?></span>

                                <del class="text-f14 text-gray-400 font-medium ml-[5px]"><?php echo e($price['price_old']); ?></del>

                            </p>

                            <div class="size-detail mt-[15px]">

                                <!--START: product version -->


                                <?php if($type == 'variable' && !empty($attributes)): ?>

                                <?php $i = 0;
                                ?>

                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php $i++; ?>

                                <?php if(count($item) > 0): ?>

                                <div class="box-variable mb-3">

                                    <div class="font-bold text-base mb-1"><?php echo e($key); ?></div>

                                    <div class="flex flex-wrap">

                                        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <a href="javascript:void(0)" class="tp_item_variable variable_<?php echo e($i); ?> tp_item_variable_<?php echo e($val['id']); ?> py-1 px-5 border mb-2 mr-2 <?php if($k == 0): ?> checked <?php endif; ?>" data-id="<?php echo e($val['id']); ?>" data-stt="<?php echo !empty($i == count($attributes)) ? 0 : 1 ?>">

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

                            <div class="hidden custom-number-input h-10 w-32 flex flex-row rounded-lg relative bg-transparent mt-1">

                                <button class="card-dec bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none leading-[50px]">

                                    <span class="m-auto text-2xl font-thin">−</span>

                                </button>

                                <input type="number" class="tp_cardQuantity outline-none focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number" value="1" />

                                <button class="card-inc bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer leading-[50px]">

                                    <span class="m-auto text-2xl font-thin">+</span>

                                </button>

                            </div>

                            <div class="add-to-cart mt-[15px]">

                                <button data-quantity="1" data-id="<?php echo e($detail->id); ?>" data-title="<?php echo e($detail->title); ?>" data-price="<?php echo !empty($price['price_final_none_format']) ? $price['price_final_none_format'] : 0 ?>" data-cart="0" data-src="" data-type="<?php echo e($type); ?>" class="tp_addToCart addtocart border border-black bg-black p-[10px]  w-full text-white uppercase transition-all hover:bg-white hover:text-black">Thêm vào giỏ hàng</button>

                            </div>
                            <div class="add-to-wishlist mt-[15px]">

                                <button data-id="<?php echo e($detail->id); ?>" class="js_add_wishlist border p-[10px]  w-full text-black uppercase transition-all">
                                    <i class="<?php echo $i_class ?> fa-heart js_add_wishlist_<?php echo e($detail->id); ?>"></i>
                                    Thêm vào danh sách yêu thích
                                </button>

                            </div>

                            <?php if(!empty($policyProduct->slides) && count($policyProduct->slides) > 0): ?>



                            <div class="box-detail mt-[20px]">

                                <div class="grid grid-cols-2 gap-4 flex-wrap justify-start">

                                    <?php $__currentLoopData = $policyProduct->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="">

                                        <div class="item  mb-[10px] md:mb-0 text-center border border-gray-200 p-[15px]">

                                            <div class="icon">

                                                <img src="<?php echo e(asset($slide->src)); ?>" alt="" class="inline-block">

                                            </div>

                                            <div class="nav-icon mt-[5px]">

                                                <h3 class="title-2 text-f15"><?php echo e($slide->title); ?></h3>



                                            </div>

                                        </div>

                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>



                            </div>

                            <?php endif; ?>



                            <div class="acc mt-[20px]">

                                <div class="acc__card relative border-b border-gray-200 py-[15px]">

                                    <div class="acc__title text-f15 font-bold relative active">

                                        Chi tiết sản phẩm

                                    </div>

                                    <div class="acc__panel pt-[20px]" style="display: block;">

                                        <?php echo $detail->description ?>

                                    </div>

                                </div>



                                <?php if(!empty($fields['content'])): ?>

                                <?php $__currentLoopData = $fields['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if(!empty($item)): ?>

                                <div class="acc__card relative border-b border-gray-200 py-[15px]">

                                    <div class="acc__title text-f15 font-bold">

                                        <?php echo e($fields['title'][$key]); ?>


                                    </div>

                                    <div class="acc__panel pt-[20px]">

                                        <?php echo $item; ?>


                                    </div>

                                </div>

                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <section class="product-home  pt-[20px]  md:pt-[80px] wow fadeInUp">

            <div class="">

                <div class="relative mb-[20px] md:mb-[30px]">

                    <ul class="tabs flex flex-wrap justify-center mt-[15px] md:mt-0">

                        <li class="tab current cursor-pointer inline-block py-[8px] px-[15px] border mx-[2px]" data-tab="tab-1">

                            Sản phẩm cùng loại

                        </li>

                        <li class="tab cursor-pointer inline-block py-[8px] px-[15px] border mx-[2px]" data-tab="tab-2">

                            <?php echo e($fcSystem['title_2']); ?>


                        </li>

                    </ul>

                </div>

                <div id="tab-1" class="tab-content current">

                    <?php if(!empty($productSame)): ?>

                    <div class="slider-product owl-carousel">

                        <?php $__currentLoopData = $productSame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php echo htmlItemProduct($key, $item); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <?php endif; ?>

                </div>

                <div id="tab-2" class="tab-content">

                    <?php if(!empty($ishomeProduct)): ?>

                    <div class="slider-product owl-carousel">

                        <?php $__currentLoopData = $ishomeProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php echo htmlItemProduct($key, $item); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <?php endif; ?>

                </div>



            </div>

        </section>

        <?php echo $__env->make('homepage.common.recently', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascript'); ?>

<script type="text/javascript" src="<?php echo e(asset('product/rating/bootstrap-rating.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/library/js/common.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('frontend/library/css/products.css')); ?>" />

<script>
    var module = 'product';
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/product/frontend/product/index.blade.php ENDPATH**/ ?>