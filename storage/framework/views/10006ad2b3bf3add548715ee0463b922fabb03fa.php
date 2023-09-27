<?php $__env->startSection('content'); ?>
<?php echo htmlBreadcrumb($page->title); ?>

<main class="py-8 bg-gray-50 px-4 md:px-0">
    <div class=" container mx-auto">
        <h1 class="uppercase w-full text-center font-bold text-2xl md:text-4xl py-4"><?php echo e($page->title); ?></h1>
        <div class="text-center py-4">
            <?php echo $fcSystem['cart_1'] ?>
        </div>
        <div class="text-center flex justify-center py-4 space-x-2">
            <a href="<?php echo url('') ?>" class=" bg-red-600 text-white rounded-full px-6 py-2 w-auto"><?php echo e(trans('index.ContinueShopping')); ?></a>
        </div>
        <?php $cart = json_decode($detail->cart, TRUE); ?>
        <?php $coupon = json_decode($detail->coupon, TRUE); ?>
        <div class="py-4">
            <h2 class="text-3xl font-medium w-full text-center mb-6"><?php echo e(trans('index.InformationLine')); ?></h2>
            <div class="rounded-xl border border-red-300 p-4 md:w-[736px] mx-auto">
                <div class="grid grid-cols-7 gap-4 items-center">
                    <div class="col-start-3 col-span-3">
                        <div class="rounded-xl border border-red-300 p-2 text-center font-semibold uppercase">
                            <?php echo e(trans('index.ProductCode')); ?> #<?php echo e($detail->code); ?>

                        </div>
                    </div>
                    <div class="col-start-6 col-end-8 text-right">
                        <?php echo e($detail->created_at); ?>

                    </div>
                    <div class="col-start-1 col-end-8 overflow-x-auto">
                        <table class="table table-aut">
                            <thead>
                                <tr>
                                    <th><?php echo e(trans('index.TitleProduct')); ?></th>
                                    <th><?php echo e(trans('index.Amount')); ?></th>
                                    <th><?php echo e(trans('index.Price')); ?></th>
                                    <th class="text-right"><?php echo e(trans('index.intomoney')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($cart): ?>
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $slug = !empty($v['slug']) ? route('routerURL', ['slug' => $v['slug']]) : 'javascript:void(0)';
                                $options = !empty($v['options']) ? (!empty($v['options']['title_version']) ? $v['options']['title_version'] : '') : '';
                                $unit = !empty($v['unit']) ? $v['unit'] : '';
                                ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e($slug); ?>" target="_blank"><?php echo e($v['title']); ?></a><br>
                                        <?php if(!empty($options)): ?>
                                        <p><?php echo e(trans('index.Classify')); ?>: <?php echo e($options); ?> </p>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($v['quantity']); ?> <?php echo e($unit); ?></td>
                                    <td class="text-right"><?php echo e(number_format( $v['price'],0,'.',',')); ?>₫</td>
                                    <td class="text-right"><?php echo e(number_format($v['quantity'] * $v['price'],0,'.',',')); ?>₫</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr class="total_payment">
                                    <td colspan="3">
                                        <?php echo e(trans('index.Provisional')); ?>

                                    </td>
                                    <td colspan="2" class="text-right">
                                        <?php echo e(number_format($detail->total_price)); ?>₫
                                    </td>
                                </tr>
                                <tr class="total_payment">
                                    <td colspan="3">
                                        <?php echo e(trans('index.ShippingUnit')); ?>

                                    </td>
                                    </td>
                                    <td colspan="2" class="text-right">
                                        <?php echo e($detail->title_ship); ?>

                                    </td>
                                </tr>
                                <tr class="total_payment">
                                    <td colspan="3">
                                        <?php echo e(trans('index.TransportFee')); ?>

                                    </td>
                                    <td colspan="2" class="text-right">
                                        <?php echo e(number_format($detail->fee_ship)); ?>₫
                                    </td>
                                </tr>
                                <?php if(isset($coupon)): ?>
                                <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="3"><?php echo e(trans('index.Discount')); ?></span>
                                    </td>
                                    <td colspan="2" class="text-right">-<span class="amount cart-coupon-price"><?php echo e(number_format($v['price'])); ?>₫</span></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if($detail->payment == 'wallet'): ?>
                                <tr class="total_payment">
                                    <td colspan="3">
                                        <?php echo e(trans('index.TotalAmount')); ?>

                                    </td>
                                    <td colspan="2" class="text-right">
                                        <?php echo e(number_format($detail->total_price-$detail->total_price_coupon+$detail->fee_ship)); ?>₫
                                    </td>
                                </tr>
                                <tr class="total_payment">
                                    <td colspan="3">
                                        <?php echo e(trans('index.Paid')); ?>

                                    </td>
                                    <td colspan="2" class="text-right">
                                        <?php echo e(number_format($detail->wallet)); ?>₫
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr class="total_payment">
                                    <td colspan="3">
                                        <?php echo e(trans('index.TotalMoneyPayment')); ?>

                                    </td>
                                    <td colspan="2" class="text-right font-bold text-red-600">
                                        <?php echo e(number_format($detail->total_price-$detail->total_price_coupon+$detail->fee_ship-$detail->wallet)); ?>₫
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        <div class="py-4">
            <h2 class="text-3xl font-medium w-full text-center mb-6"><?php echo e(trans('index.DeliveryInformation')); ?></h2>

            <div class="rounded-xl border border-red-300 p-4 md:w-[736px] mx-auto">
                <p>
                    <?php echo e(trans('index.Fullname')); ?>: <strong><?php echo e($detail->fullname); ?></strong>
                </p>
                <p>
                    Email: <strong><?php echo e($detail->email); ?></strong>
                </p>
                <p>
                    <?php echo e(trans('index.Phone')); ?>: <strong><?php echo e($detail->phone); ?></strong>
                </p>
                <p>
                    <?php echo e(trans('index.Payments')); ?>: <strong><?php echo e(config('cart')['payment'][$detail->payment]); ?></strong>
                </p>
                <p>
                    <?php echo e(trans('index.DeliveryAddress')); ?>: <strong><?php echo e($detail->address); ?></strong>
                </p>
                <p>
                    <?php echo e(trans('index.Ward')); ?>: <strong><?php echo e(!empty($detail->ward_name)?$detail->ward_name->name:''); ?></strong>
                </p>
                <p>
                    <?php echo e(trans('index.District')); ?>: <strong><?php echo e(!empty($detail->district_name)?$detail->district_name->name:''); ?></strong>
                </p>
                <p>
                    <?php echo e(trans('index.City')); ?>: <strong><?php echo e(!empty($detail->city_name)?$detail->city_name->name:''); ?></strong>
                </p>


            </div>

        </div>
    </div>
</main>
<style>
    .table {
        width: 100%;
        border-spacing: 0;
        background: #d9d9d9;
        border-radius: 16px;
    }

    .thank-box .table {
        margin: 1rem 0;
    }

    .table td,
    .table th {
        padding: 10px 20px !important;
    }

    .table thead>tr th {
        color: #fff;
        background-color: #2f5acf;
        font-weight: 500;
    }

    .table thead>tr th:last-child {
        border-radius: 0 16px 16px 0;
    }

    .table thead>tr th:first-child {
        border-radius: 16px 0 0 16px;
    }

    .text--left {
        text-align: left;
    }

    .table tbody tr:nth-child(2n) td {
        background-color: #eee;
    }

    .table th,
    .table tr:last-child td {
        border: 0px !important;
    }

    .table tfoot td {
        background-color: #fff !important;
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/cart/success.blade.php ENDPATH**/ ?>