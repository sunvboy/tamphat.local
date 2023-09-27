<?php $__env->startSection('title'); ?>
<title>Cập nhập phiếu thu</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách phiếu thu",
        "src" => route('receipt_vouchers.index'),
    ],
    [
        "title" => "Cập nhập",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class=" flex items-center mt-8">
        <h1 class="text-lg font-medium mr-auto">
            Cập nhập phiếu thu
        </h1>
    </div>
    <form class="grid grid-cols-12 gap-6 mt-5" role="form" action="<?php echo e(route('receipt_vouchers.update', ['id' => $detail->id])); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class=" col-span-12 lg:col-span-8">
            <!-- BEGIN: Form Layout -->
            <div class="box p-5 grid grid-cols-2 gap-2">
                <div class="col-span-2">
                    <?php echo $__env->make('components.alert-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php echo csrf_field(); ?>
                <div class="col-span-2 md:col-span-1">
                    <label class="form-label text-base font-semibold">Nhóm người nhận<span style="color:red">*</span></label>
                    <?php echo Form::select('module', $table, $detail->module, ['class' => 'form-control w-full', 'disabled']); ?>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label class="form-label text-base font-semibold">Tên người nhận</label>
                    <select class="form-control w-full" data-placeholder="Tìm kiếm..." name="module_id" disabled>
                        <option value="0">Chọn khách hàng</option>
                        <?php if(!empty($data)): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $selected = !empty(old('module_id')) ? old('module_id') : (!empty($detail->module_id) ? $detail->module_id : '');
                        ?>
                        <option value="<?php echo e($item->id); ?>" <?php echo e(!empty($selected == $item->id)?'selected':''); ?>><?php echo e($item->title); ?> <?php if (!empty($item->phone)) { ?>- <?php echo e($item->phone); ?> <?php } ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label class="form-label text-base font-semibold">Loại phiếu thu</label>
                    <?php echo Form::select('group_id', $categories, !empty(old('group_id')) ? old('group_id') : (!empty($detail->group_id) ? $detail->group_id : ''), ['class' => 'form-control w-full', 'disabled' => "disabled"]); ?>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label class="form-label text-base font-semibold">Mã phiếu<span style="color:red">*</span></label>
                    <?php echo Form::text('code', !empty(old('code')) ? old('code') : (!empty($detail->code) ? $detail->code : CodeRender('receipt_vouchers')), ['class' => 'form-control w-full']); ?>
                </div>


            </div>
            <div class="box mt-3">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Giá trị ghi nhận
                    </h2>
                </div>
                <div class="p-5 grid grid-cols-2 gap-2">
                    <div class="col-span-2 md:col-span-1">
                        <label class="form-label text-base font-semibold">Giá trị<span style="color:red">*</span></label>
                        <?php echo Form::text('price', number_format($detail->price, '0', ',', '.'), ['class' => 'form-control w-full', 'placeholder' => '', 'autocomplete' => 'off', 'disabled']); ?>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label class="form-label text-base font-semibold">Hình thức thanh toán<span style="color:red">*</span></label>
                        <?php echo Form::select('type', config('payment.method'), $detail->type, ['class' => 'form-control w-full']); ?>
                    </div>
                    <div class="col-span-2">
                        <label class="form-label text-base font-semibold">Tham chiếu</label>
                        <?php echo Form::text('reference', !empty(old('reference')) ? old('reference') : (!empty($detail->reference) ? $detail->reference : ''), ['class' => 'form-control w-full', 'autocomplete' => 'off']); ?>
                    </div>
                    <div class="col-span-2 flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox" id="checkbox-checked" value="1" name="checked" <?php echo e(!empty($detail->checked) ? 'checked' : ''); ?> disabled>
                        <label class="form-label text-base font-semibold" for="checkbox-checked" style="margin-bottom: 0px;">Hạch toán kết quả kinh doanh</label>
                    </div>
                    <div class="col-span-2 hidden md:flex justify-end">
                        <button type="submit" class="btn btn-primary">Cập nhập</button>
                    </div>
                </div>
            </div>

            <!-- END: Form Layout -->
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thông tin khác
                    </h2>
                </div>
                <div class="p-5">
                    <div class="">
                        <label class="form-label text-base font-semibold">Chi nhánh</label>
                        <select class="w-full form-control" data-placeholder="Tìm kiếm chi nhánh..." name="address_id" disabled>
                            <?php if (in_array('addresses', $dropdown)) { ?>
                                <?php if(!empty($address)): ?>
                                <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" <?php if($item->active ==1): ?> selected <?php endif; ?>><?php echo e($item->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label text-base font-semibold">Ngày ghi nhận</label>
                        <?php echo Form::text('created_at', $detail->created_at, ['class' => 'form-control w-full', 'disabled' => 'disabled']); ?>
                    </div>
                    <div class="mt-3">
                        <label class="form-label text-base font-semibold">Mô tả</label>
                        <?php echo Form::textarea('description', !empty(old('description')) ? old('description') : (!empty($detail->description) ? $detail->description : ''), ['class' => 'form-control w-full', 'placeholder' => '']); ?>
                    </div>
                    <div class="mt-3 flex md:hidden text-right">
                        <button type="submit" class="btn btn-primary">Cập nhập</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <style>
        @media (min-width: 767px) {
            .md\:hidden {
                display: none;
            }
        }
    </style>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/cashbook/receipt/receipt/edit.blade.php ENDPATH**/ ?>