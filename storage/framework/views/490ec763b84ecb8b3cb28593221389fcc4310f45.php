
<?php $__env->startSection('title'); ?>
<title>Danh sách trả hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách trả hàng",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="mt-10 space-y-3 box p-5">
        <div class="flex justify-between ">
            <h1 class=" text-lg font-medium ">
                Danh sách trả hàng
            </h1>

        </div>
        <div class="">
            <form action="" class="" id="search" style="margin-bottom: 0px;">
                <div class="grid grid-cols-12 gap-2 flex-wrap">
                    <?php if(!empty($listUsers)): ?>
                    <div class="flex-auto col-span-2">
                        <?php echo Form::select('user_id', $listUsers, request()->get('user_id'), ['class' => 'form-control tom-select tom-select-custom', 'data-placeholder' => "Select your favorite actors", 'style' => 'height:42px']); ?>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($listAddress)): ?>
                    <div class="flex-auto col-span-3">
                        <?php echo Form::select('user_id', $listAddress, request()->get('address_id'), ['class' => 'form-control tom-select tom-select-custom', 'data-placeholder' => "Select your favorite actors", 'style' => 'height:42px']); ?>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($listSuppliers)): ?>
                    <div class="flex-auto col-span-3">
                        <?php echo Form::select('suppliers_id', $listSuppliers, request()->get('suppliers_id'), ['class' => 'form-control tom-select tom-select-custom', 'data-placeholder' => "Select your favorite actors", 'style' => 'height:42px']); ?>
                    </div>
                    <?php endif; ?>
                    <div class="flex col-span-4 justify-between gap-2">
                        <input type="search" name="keyword" class="keyword form-control" placeholder="Tìm kiếm theo mã, tên, email, số điện thoại nhà cung cấp ..." autocomplete="off" value="<?php echo request()->get('keyword') ?>">
                        <button class="btn btn-primary">
                            <i data-lucide="search"></i>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-3">

        <!-- BEGIN: Data List -->
        <div class=" col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th style="width:40px;">
                            <input type="checkbox" id="checkbox-all">
                        </th>
                        <th class="whitespace-nowrap">STT</th>
                        <th class="whitespace-nowrap">Mã đơn</th>
                        <th class="whitespace-nowrap">Tên nhà cung cấp</th>
                        <th class="whitespace-nowrap">Chi nhánh</th>
                        <th class="whitespace-nowrap">Số lượng hoàn</th>
                        <th class="whitespace-nowrap">Tổng tiền hoàn</th>
                        <th class="whitespace-nowrap">Nhân viên tạo</th>
                        <th class="whitespace-nowrap">Ngày tạo</th>
                        <th class="whitespace-nowrap">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd " id="post-<?php echo $v->id; ?>">
                        <td>
                            <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                        </td>
                        <td>
                            <?php echo e($data->firstItem()+$loop->index); ?>

                        </td>
                        <td>
                            <a target="_blank" href="<?php echo e(route('product_purchases.show',['id'=>$v->product_purchases_id])); ?>" class="text-danger font-bold"><?php echo e($v->code); ?></a>
                        </td>
                        <td>
                            <?php echo e($v->suppliers); ?>

                        </td>
                        <td>
                            <?php echo e($v->address_title); ?>

                        </td>
                        <td>
                            <?php echo e($v->quantity); ?>

                        </td>
                        <td>
                            <?php echo e(number_format($v->price_total,'0',',','.')); ?>

                        </td>
                        <td>
                            <?php echo e($v->name); ?>

                        </td>
                        <td>
                            <?php echo e($v->created_at); ?>

                        </td>
                        <td>
                            <a class="flex items-center mr-3" href="">
                                <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Xem chi tiết
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class=" col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center justify-center">
            <?php echo e($data->links()); ?>

        </div>
        <!-- END: Pagination -->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script type="text/javascript" src="<?php echo e(asset('library/datetimepicker/jquery.datetimepicker.full.min.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('library/datetimepicker/jquery.datetimepicker.min.css')); ?>" />
<script type="text/javascript">
    $.datetimepicker.setLocale('vi');
    $('.datetimepicker').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        minDate: 0
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/backend/purchases/return.blade.php ENDPATH**/ ?>