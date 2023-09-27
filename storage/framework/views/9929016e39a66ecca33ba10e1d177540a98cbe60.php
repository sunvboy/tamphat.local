
<?php $__env->startSection('title'); ?>
<title>Chi tiết đơn hoàn trả <?php echo e($detail->code); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách đơn hoàn trả",
        "src" => route('product_purchases.index'),
    ],
    [
        "title" => "Chi tiết đơn hoàn trả " . $detail->code,
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content space-y-5">
    <div class="flex justify-between">
        <div>
            <h1 class="text-3xl font-bold mt-10">
                Mã đơn nhập hàng <?php echo e($detail->code); ?>

            </h1>
            <p><?php echo e($detail->created_at); ?></p>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-8 space-y-3">
            <!-- START: Nhà cung cấp -->
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thông tin nhà cung cấp
                    </h2>
                </div>
                <div class="p-5">
                    <div class="" id="loadDataInfoSuppliers">
                        <div class="flex items-center justify-between">
                            <div class="item flex items-center hover:text-danger cursor-pointer js_handleCloseInfoSuppliers">
                                <div class="w-10 h-10 rounded-full"><img src="https://ui-avatars.com/api/?name=<?php echo e($detail->suppliers_title); ?>" class="rounded-full w-full"></div>
                                <div class="flex items-center"><span class="mx-2 font-bold text-danger"><?php echo e($detail->suppliers_title); ?></span></div>
                            </div>
                            <div>Công nợ: <b><?php echo e(number_format($detail->suppliers_debt,'0',',','.')); ?>₫</b></div>
                        </div>
                        <div class="mt-3 border-t pt-3">
                            <h2 class="font-medium text-base mr-auto">Thông tin chi tiết:</h2>
                            <div class="space-y-1">
                                <p>Mã nhà cung cấp: <?php echo e($detail->suppliers_code); ?></p>
                                <p> Số điện thoại: <?php echo e($detail->suppliers_phone); ?></p>
                                <p>Email: <?php echo e($detail->suppliers_email); ?></p>
                                <p>Địa chỉ: <?php echo e($detail->suppliers_address); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Nhà cung cấp -->
        </div>
        <div class="col-span-12 lg:col-span-4 space-y-3">
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thông tin đơn nhập
                    </h2>
                </div>
                <div class="p-5 space-y-2">
                    <p><b>Chi nhánh:</b> <?php echo e($detail->address_title); ?></p>
                </div>
            </div>
        </div>

        <div class="col-span-12 space-y-3">
            <!-- START: Thông tin sản phẩm -->
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thông tin sản phẩm
                    </h2>
                </div>
                <div class="p-5">
                    <div class="overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Mã sản phẩm</th>
                                    <th class="whitespace-nowrap">Tên sản phẩm</th>
                                    <th class="text-center whitespace-nowrap">Đơn vị</th>
                                    <th class="text-center whitespace-nowrap">Số lượng </th>
                                    <th class="text-center whitespace-nowrap">Giá nhập</th>
                                    <th class="text-center whitespace-nowrap">Thành tiền</th>
                                </tr>
                            </thead>
                            <?php $products = json_decode($detail->products, TRUE); ?>
                            <?php if(!empty($products)): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $title_version = !empty($item['options']['title_version']) ? collect(json_decode($item['options']['title_version'], TRUE))->join('', ',') : '';
                            $quantity = $item['quantity'];
                            ?>
                            <tr class="">
                                <td class="" style="text-align:left"><?php echo e($item['code']); ?></td>
                                <td class="w-40">
                                    <div class="flex space-x-2">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="<?php echo e($item['title']); ?>" class="tooltip rounded-full" src="<?php echo e($item['image']); ?>">
                                            </div>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0)" class="font-medium whitespace-nowrap"><?php echo e($item['title']); ?></a><br>
                                            <i><?php echo e($title_version); ?></i>
                                            <?php
                                            $html = '';
                                            if ($item['taxes_type'] == 'tax') {
                                                $html .= '<div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Giá đã bao gồm thuế(' . $item['taxes_import'] . '%)</div>';
                                            } else if ($item['taxes_type'] == 'notax') {
                                                $html .= '<div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Giá chưa bao gồm thuế(' . $item['taxes_import'] . '%)</div>';
                                            }
                                            echo $html;
                                            ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-56 text-center">
                                    <?php echo e($item['unit']); ?>

                                </td>
                                <td class="w-56 text-center">
                                    <?php echo e($quantity); ?>

                                </td>
                                <td class="w-40 text-center">
                                    <?php echo e(number_format($item['price'], '0', ',', '.')); ?>đ
                                </td>
                                <td class="table-report__action w-56 text-center"> <?php echo e(number_format($item['price']*$quantity, '0', ',', '.')); ?>đ</td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>
                    </div>
                    <div>
                        <div class="flex justify-between p-2">
                            <span class="font-bold flex-1 text-right">Số lượng</span>
                            <span class="text-right w-32"><?php echo e($detail->quantity); ?></span>
                        </div>
                        <div class="flex justify-between p-2">
                            <span class="font-bold flex-1 text-right">Tổng tiền</span>
                            <span class="text-right w-32"><?php echo e(number_format($detail->price_provisional,'0',',','.')); ?>đ</span>
                        </div>
                        <?php if($detail->price_discount): ?>
                        <div class="flex justify-between p-2">
                            <span class="font-bold flex-1 text-right text-danger">Chiết khấu</span>
                            <span class="text-right w-32"> <?php echo e(number_format($detail->price_discount,'0',',','.')); ?>đ</span>
                        </div>
                        <?php endif; ?>
                        <div class="flex justify-between p-2">
                            <span class="font-bold flex-1 text-right text-danger">Chi phí</span>
                            <span class="text-right w-32"><?php echo e(number_format($detail->price_surcharge,'0',',','.')); ?>đ</span>
                        </div>
                        <div class="flex justify-between p-2">
                            <div class="font-bold flex-1 text-right text-danger">Tiền cần trả</div>
                            <div class="text-right w-32"><?php echo e(number_format($detail->price_total,'0',',','.')); ?>đ</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Thông tin sản phẩm -->



        </div>


    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/backend/purchases/return/show.blade.php ENDPATH**/ ?>