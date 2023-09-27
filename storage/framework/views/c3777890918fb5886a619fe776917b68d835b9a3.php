<?php $__env->startSection('title'); ?>
<title>Chi tiết đơn nhập hàng <?php echo e($detail->code); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách đơn nhập hàng",
        "src" => route('product_purchases.index'),
    ],
    [
        "title" => "Chi tiết đơn nhập hàng " . $detail->code,
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
                <?php echo e($detail->code); ?>

            </h1>
            <p><?php echo e($detail->created_at); ?></p>
        </div>
        <!-- START: timeline -->
        <div class="mt-5 relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center">
            <div class="lg:text-center flex items-center lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary">1</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Đặt hàng</div>
                <div class="lg:w-32 lg:mt-3 ml-3 lg:mx-auto"><?php echo e($detail->created_at); ?></div>
            </div>
            <div class="lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary">2</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Duyệt</div>
                <div class="lg:w-32 lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400"><?php echo e($detail->created_at); ?></div>
            </div>
            <div class="lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <?php if(!empty($detail->created_stock_at)): ?>
                <button class="w-10 h-10 rounded-full btn btn-primary">3</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Nhập kho</div>
                <div class="lg:w-32 lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400"><?php echo e($detail->created_stock_at); ?></div>
                <?php else: ?>
                <button class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">3</button>
                <div class="lg:w-32 lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Nhập kho</div>
                <?php endif; ?>
            </div>
            <div class="lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <?php if(!empty($detail->created_completed_at)): ?>
                <button class="w-10 h-10 rounded-full btn btn-primary">4</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Hoàn thành</div>
                <div class="lg:w-32 lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400"><?php echo e($detail->created_completed_at); ?></div>
                <?php else: ?>
                <button class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">4</button>
                <div class="lg:w-32 lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Hoàn thành</div>
                <?php endif; ?>
            </div>

        </div>
        <!-- END: timeline -->
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
                                <div class="w-10 h-10 rounded-full"><img src="https://ui-avatars.com/api/?name=<?php echo e($detail->suppliers->title); ?>" class="rounded-full w-full"></div>
                                <div class="flex items-center"><span class="mx-2 font-bold text-danger"><?php echo e($detail->suppliers->title); ?></span>

                                </div>
                            </div>
                            <div>Công nợ: <b><?php echo e(number_format($detail->suppliers->debt,'0',',','.')); ?>₫</b></div>
                        </div>
                        <div class="mt-3 border-t pt-3">
                            <h2 class="font-medium text-base mr-auto">Thông tin chi tiết:</h2>
                            <div class="space-y-1">
                                <p>Mã nhà cung cấp: <?php echo e($detail->suppliers->code); ?></p>
                                <p> Số điện thoại: <?php echo e($detail->suppliers->phone); ?></p>
                                <p>Email: <?php echo e($detail->suppliers->email); ?></p>
                                <p>Địa chỉ: <?php echo e($detail->suppliers->address); ?></p>
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
                    <div>
                        <span class="<?php echo e(config('payment.statusColor')[$detail->status]); ?> font-bold"><?php echo e(config('payment.status')[$detail->status]); ?></span>
                    </div>
                </div>
                <div class="p-5 space-y-2">
                    <p><b>Chi nhánh:</b> <?php echo e($detail->address->title); ?></p>
                    <p><b>Ngày hẹn giao:</b> <?php echo e($detail->dueOn); ?></p>
                    <p><b>Tham chiếu:</b> <?php echo e(!empty($detail->reference)?$detail->reference:'---'); ?></p>
                </div>
            </div>
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Ghi chú
                    </h2>
                </div>
                <div class="p-5 space-y-2">
                    <?php echo e(!empty($detail->note)?$detail->note:'Chưa có ghi chú'); ?>

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

                            <?php if(!empty($products['cart'])): ?>
                            <?php $__currentLoopData = $products['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <span class="text-right w-32"><?php echo e($products['quantity']); ?></span>
                        </div>
                        <div class="flex justify-between p-2">
                            <span class="font-bold flex-1 text-right">Tổng tiền</span>
                            <span class="text-right w-32"><?php echo e(number_format($products['provisional'],'0',',','.')); ?>đ</span>
                        </div>
                        <?php if($products['priceDiscount']): ?>
                        <div class="flex justify-between p-2">
                            <span class="font-bold flex-1 text-right text-danger">Chiết khấu</span>
                            <span class="text-right w-32"> <?php echo e(number_format($products['priceDiscount'],'0',',','.')); ?>đ</span>
                        </div>
                        <?php endif; ?>
                        <div class="js_html_VAT">
                            <?php echo $products['htmlVAT'] ?>
                        </div>
                        <div class="flex justify-between p-2">
                            <span class="font-bold flex-1 text-right text-danger">Chi phí</span>
                            <span class="text-right w-32"><?php echo e(number_format($products['priceSurcharge'],'0',',','.')); ?>đ</span>
                        </div>
                        <div class="flex justify-between p-2">
                            <div class="font-bold flex-1 text-right text-danger">Tiền cần trả</div>
                            <div class="text-right w-32"><?php echo e(number_format($products['total'],'0',',','.')); ?>đ</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Thông tin sản phẩm -->
            <!-- START: Thanh toán -->
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thanh toán
                    </h2>
                    <div class="flex items-center gap-2">
                        <span>
                            Đã thanh toán: <b><?php echo e(number_format($detail->product_purchases_financials->sum('price'),'0',',','.')); ?>đ</b> - Còn phải trả: <b><?php echo e(number_format($price,'0',',','.')); ?></b>
                        </span>
                        <?php if(!empty($price)): ?>
                        <div class="text-center">
                            <div class="dropdown inline-block" data-tw-placement="bottom-start">
                                <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">
                                    Xác nhận thanh toán
                                    <i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="dropdown-content">
                                        <form id="paymentForm" method="" class="p-2">
                                            <?php echo csrf_field(); ?>
                                            <div class="">
                                                <div class="alert alert-danger-soft show flex items-center mb-2 print-error-msg" role="alert" style="display: none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="alert-octagon" data-lucide="alert-octagon" class="lucide lucide-alert-octagon w-6 h-6 mr-2">
                                                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                    </svg>
                                                    <span class=""></span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-xs">Phương thức thanh toán</div>
                                                <select class="form-control mt-2" name="method">
                                                    <?php $__currentLoopData = config('payment.method'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="mt-3">
                                                <div class="text-xs">Số tiền thanh toán</div>
                                                <input type="text" name="price" class="form-control mt-2 flex-1 int" placeholder="" value="<?php echo e(number_format($price,'0',',','.')); ?>" />
                                            </div>
                                            <div class="mt-3">
                                                <div class="text-xs">Tham chiếu</div>
                                                <input type="text" name="reference" class="form-control mt-2 flex-1 float" placeholder="" />
                                            </div>
                                            <div class="flex items-center mt-3">
                                                <button data-dismiss="dropdown" class="btn btn-secondary w-32 ml-auto" type="button">Đóng</button>
                                                <button class="btn btn-primary w-32 ml-2 btn-submit-payment" type="button">Áp dụng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(count($detail->product_purchases_financials) > 0): ?>
                <div class="p-5">
                    <!-- BEGIN: Timeline Wrapper -->
                    <div class="px-5 mt-5 -mb-5 pb-5 relative overflow-hidden before:content-[''] before:absolute before:w-px before:bg-slate-200/60 before:dark:bg-darkmode-400 before:mr-auto before:left-0 lg:before:right-0 before:ml-3 lg:before:ml-auto before:h-full before:mt-8 ">
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $detail->product_purchases_financials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++; ?>
                        <div class="relative z-10 bg-white dark:bg-darkmode-600 py-2 my-5 text-center text-slate-500 text-xs"><?php echo e($item->created_at); ?></div>
                        <?php if($i%2==0): ?>
                        <div class=" lg:mr-[51%] pl-6 lg:pl-0 lg:pr-[51px] before:content-[''] before:absolute before:w-20 before:h-px before:mt-8 before:right-[60px] before:bg-slate-200 before:dark:bg-darkmode-400 before:rounded-full before:inset-x-0 before:mx-auto before:z-[-1] ">
                            <div class=" bg-white dark:bg-darkmode-400 shadow-sm border border-slate-200 rounded-md p-5 flex flex-col sm:flex-row items-start gap-y-3 mt-10 before:content-[''] before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-x-0 before:ml-0.5 lg:before:ml-auto before:mr-auto before:dark:bg-darkmode-300 after:content-[''] after:absolute after:w-3 after:h-3 after:bg-slate-50 after:rounded-full after:inset-x-0 after:ml-1.5 lg:after:ml-auto after:mr-auto after:mt-1 after:dark:bg-darkmode-200 ">
                                <div>
                                    <span class="text-primary font-medium">
                                        Xác nhận thanh toán <b class="text-danger"><?php echo e(number_format($item->price,'0',',','.')); ?>đ</b> thành công
                                    </span>
                                    <div class="text-slate-500 text-xs mt-1.5">
                                        <p><b>Phương thức thanh toán:</b> <?php echo e(!empty($item->method)?config('payment.method')[$item->method]: '---'); ?></p>
                                        <p><b>Tham chiếu:</b> <?php echo e(!empty($item->reference)?$item->reference:'---'); ?></p>
                                        <p><b>Người thanh toán:</b> <?php echo e($item->users->name); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <!-- BEGIN: Timeline Content Latest -->
                        <div class=" lg:ml-[51%] pl-6 lg:pl-[51px] before:content-[''] before:absolute before:w-20 before:h-px before:mt-8 before:left-[60px] before:bg-slate-200 before:dark:bg-darkmode-400 before:rounded-full before:inset-x-0 before:mx-auto before:z-[-1] ">
                            <div class=" bg-white dark:bg-darkmode-400 shadow-sm border border-slate-200 rounded-md p-5 flex flex-col sm:flex-row items-start gap-y-3 mt-10 before:content-[''] before:absolute before:w-6 before:h-6 before:bg-primary/20 before:rounded-full before:inset-x-0 lg:before:ml-auto before:mr-auto lg:before:animate-ping after:content-[''] after:absolute after:w-6 after:h-6 after:bg-primary after:rounded-full after:inset-x-0 lg:after:ml-auto after:mr-auto after:border-4 after:border-white/60 after:dark:border-darkmode-300 ">
                                <div>
                                    <span class="text-primary font-medium">
                                        Xác nhận thanh toán <b class="text-danger"><?php echo e(number_format($item->price,'0',',','.')); ?>đ</b> thành công
                                    </span>
                                    <div class="text-slate-500 text-xs mt-1.5">
                                        <p><b>Phương thức thanh toán:</b> <?php echo e(!empty($item->method)?config('payment.method')[$item->method]: '---'); ?></p>
                                        <p><b>Tham chiếu:</b> <?php echo e(!empty($item->reference)?$item->reference:'---'); ?></p>
                                        <p><b>Người thanh toán:</b> <?php echo e($item->users->name); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- END: Timeline Content -->
                    </div>
                    <!-- END: Timeline Wrapper -->
                </div>
                <?php endif; ?>
            </div>
            <!-- END: Thanh toán -->
            <?php if($detail->receiveStatusValue == 0 ): ?>
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Nhập kho
                    </h2>
                    <div class="flex items-center gap-2">
                        <button type="button" class="btn btn-primary btn-receiveStatusValue">Nhập kho</button>
                    </div>
                </div>
            </div>
            <?php elseif($detail->receiveStatus != 'returned'): ?>
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Hoàn trả
                    </h2>
                    <div class="flex items-center gap-2">
                        <a href="<?php echo e(route('product_purchases.return_create',['id' => $detail->id])); ?>" class="btn btn-primary">Hoàn trả</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- START: Danh sách thông tin hoàn trả -->
        <?php if(!empty($detail->product_purchases_returns) && count($detail->product_purchases_returns) > 0): ?>
        <div class="col-span-12">
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thông tin hoàn trả
                    </h2>
                </div>
                <div class="p-5">
                    <div class="overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="whitespace-nowrap"> Ngày tạo</th>
                                    <th class="whitespace-nowrap">Số lượng hoàn</th>
                                    <th class="whitespace-nowrap">Giá trị hoàn trả</th>
                                    <th class="whitespace-nowrap">Nhân viên tạo</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $detail->product_purchases_returns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $taxesArr = [];
                                $products = json_decode($item->products, TRUE);
                                $collectCart = collect($products)->groupBy('taxes_import')->all();
                                if (!empty($collectCart)) {
                                    foreach ($collectCart as $keyTax => $itemTax) {
                                        if (!empty($itemTax)) {
                                            foreach ($itemTax as $k => $v) {
                                                $taxesArr[$keyTax][] = $v['taxes_value'] * $v['quantity_return'];
                                            }
                                        }
                                    }
                                }
                                ?>
                                <tr class="cursor-pointer trOne trOne7" onclick="showTd(<?php echo e($item->id); ?>)">
                                    <td>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                            <path d="m18.425 12-6.01 6.01L11 16.596 15.596 12 11 7.404l1.414-1.414 6.01 6.01Z" fill="currentColor"></path>
                                            <path d="m13 12-6.01 6.01-1.415-1.414L10.172 12 5.575 7.404 6.99 5.99 13 12Z" fill="currentColor"></path>
                                        </svg>
                                    </td>
                                    <td>
                                        <?php echo e($item->created_at); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->quantity); ?>

                                    </td>
                                    <td>
                                        <?php echo e(number_format($item->price_total,'0',',','.')); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->user->name); ?>

                                    </td>
                                </tr>
                                <tr class="trTwo<?php echo e($item->id); ?> hidden">
                                    <td colspan="6">
                                        <div class="w-full flex gap-2">
                                            <div class="w-1/2">
                                                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-3 mb-2">
                                                    <div class="font-medium text-base truncate">Thông tin đơn trả hàng nhà cung cấp</div>
                                                </div>
                                                <div class="text-left">

                                                    Chi nhánh: <?php echo e($detail->address->title); ?><br>

                                                    Nhà cung cấp: <a href="<?php echo e(route('suppliers.edit',['id' => $detail->suppliers->id])); ?>" target="_blank" class="text-primary font-bold"><?php echo e($detail->suppliers->title); ?></a><br>

                                                    <?php if(!empty($item->note)): ?>
                                                    Lý do hoàn trả: <?php echo e($item->note); ?><br>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="w-1/2">
                                                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-3 mb-2">
                                                    <div class="font-medium text-base truncate">Nhận hoàn tiền</div>
                                                </div>
                                                <div class="text-left">
                                                    Số tiền: <span class="text-danger font-bold"><?php echo e(number_format($item['price_total'],'0',',','.')); ?></span><br>
                                                    <?php if(!empty($item->method)): ?>
                                                    Phương thức thanh toán: <?php echo e(config('payment.method')[$item->method]); ?><br>
                                                    <?php endif; ?>
                                                    <?php if(!empty($item->reference)): ?>
                                                    Tham chiếu: <?php echo e($item->reference); ?><br>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(!empty($products) && count($products) > 0): ?>
                                        <div class="w-full mt-5">
                                            <div class="box p-5">
                                                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                                                    <div class="font-medium text-base truncate">Thông tin sản phẩm trả</div>
                                                </div>
                                                <div>
                                                    <?php
                                                    $provisional = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($val['quantity_return'] > 0): ?>
                                                    <?php
                                                    $provisional = $provisional + ((int)$val['quantity_return'] * (float)$val['price_taxes']);
                                                    ?>
                                                    <div class="flex flex-col md:flex-row items-center py-4 first:pt-0 last:border-0 last:pb-0 border-b border-dashed border-slate-200 dark:border-darkmode-400">
                                                        <div class="flex items-center md:mr-auto">
                                                            <div class="image-fit w-16 h-16">
                                                                <img alt="<?php echo e($val['title']); ?>" class="rounded-lg border-2 border-white shadow-md" src="<?php echo e(asset($val['image'])); ?>">
                                                            </div>
                                                            <div class="ml-5 text-left">
                                                                <div class="font-medium text-warning"><?php echo e($val['code']); ?></div>
                                                                <div class="font-medium"><?php echo e($val['title']); ?>

                                                                    <?php echo e(!empty($val['options']['title_version']) ? collect(json_decode($val['options']['title_version'], TRUE))->join('', ',') : ''); ?>

                                                                </div>
                                                                <div class="text-slate-500 mt-1"><?php echo e($val['quantity_return']); ?> x <?php echo e(number_format($val['price'],'0',',','.')); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="py-4 md:pl-12 md:pr-10 md:border-l text-center md:text-left border-dashed border-slate-200 dark:border-darkmode-400">
                                                            <div class="text-slate-500">Thành tiền</div>
                                                            <div class="font-medium mt-1"><?php echo e(number_format($val['quantity_return']*$val['price'],'0',',','.')); ?></div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div>
                                                    <div class="flex justify-between p-2">
                                                        <span class="font-bold flex-1 text-right">Số lượng</span>
                                                        <span class="text-right w-32"><?php echo e($item->quantity); ?></span>
                                                    </div>
                                                    <div class="flex justify-between p-2">
                                                        <span class="font-bold flex-1 text-right">Tạm tính</span>
                                                        <span class="text-right w-32"><?php echo e(number_format($provisional,'0',',','.')); ?></span>
                                                    </div>
                                                    <?php if(!empty($item['price_discount'])): ?>
                                                    <div class="flex justify-between p-2">
                                                        <span class="font-bold flex-1 text-danger text-right">Chiết khấu</span>
                                                        <div class="text-right w-32"><?php echo e(number_format($item['price_discount'],'0',',','.')); ?></div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(!empty($item['price_total_vat'])): ?>
                                                    <div class="flex justify-between p-2">
                                                        <span class="font-bold flex-1 text-danger text-right">Thuế</span>
                                                        <span class="text-right w-32"><?php echo e(number_format($item['price_total_vat'],'0',',','.')); ?></span>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(!empty($item['price_surcharge'])): ?>
                                                    <div class="flex justify-between p-2">
                                                        <span class="font-bold flex-1 text-danger text-right">Chi phí</span>
                                                        <div class="text-right w-32"><?php echo e(number_format($item['price_surcharge'],'0',',','.')); ?></div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="flex justify-between p-2">
                                                        <div class="font-bold flex-1 text-danger text-right">Tiền cần trả</div>
                                                        <div class="text-right w-32"><?php echo e(number_format($item['price_total'],'0',',','.')); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- END: Danh sách thông tin hoàn trả -->
    </div>
</div>
<style>
    .before\:bg-slate-100::before {
        background-color: #dddddd;
    }

    .html_deletePurchase a {
        display: none;
    }

    #htmlShowPurchase input {
        border: 0px !important;
        box-shadow: none;
        pointer-events: none;
    }

    .trOne.active svg {
        transform: rotate(90deg);
        color: rgb(0, 136, 255);
    }

    .trOne.active td {
        background-color: rgb(242, 249, 255) !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script>
    $(document).on('click', '.btn-submit-payment', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo route('product_purchases.storeFinancials') ?>",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                method: $("#paymentForm select[name='method']").val(),
                price: $("#paymentForm input[name='price']").val(),
                reference: $("#paymentForm input[name='reference']").val(),
                product_purchases_id: "<?php echo $detail->id ?>",
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $("#paymentForm .print-error-msg").css('display', 'none');
                    swal({
                        title: "Thông báo!",
                        text: data.success,
                        type: "success"
                    }, function() {
                        location.reload();
                    });
                } else {
                    $("#paymentForm .print-error-msg").css('display', 'flex');
                    $("#paymentForm .print-success-msg").css('display', 'none');
                    $("#paymentForm .print-error-msg span").html(data.error);
                }
            }
        });
        return false;
    })
    $(document).on('click', '.btn-receiveStatusValue', function(e) {
        let product_purchases_id = "<?php echo $detail->id ?>";
        swal({
                title: "Hãy chắc chắn rằng bạn muốn thực hiện thao tác này?",
                text: "Nhập kho tất cả sản phẩm trong đơn nhập hàng",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Thực hiện!",
                cancelButtonText: "Hủy bỏ!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo route('product_purchases.storeStocks') ?>",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: product_purchases_id
                        },
                        success: function(data) {
                            if ($.isEmptyObject(data.error)) {
                                swal({
                                    title: "Thông báo!",
                                    text: data.success,
                                    type: "success"
                                }, function() {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: data.error,
                                    text: "Vui lòng thử lại",
                                    type: "error"
                                });
                            }
                        }
                    });
                } else {
                    swal({
                        title: "Hủy bỏ",
                        text: "Thao tác bị hủy bỏ",
                        type: "error"
                    });
                }
            });
    })

    function showTd(id) {
        $('.trOne' + id).toggleClass('active')
        $('.trTwo' + id).toggleClass('hidden')
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/backend/purchases/show.blade.php ENDPATH**/ ?>