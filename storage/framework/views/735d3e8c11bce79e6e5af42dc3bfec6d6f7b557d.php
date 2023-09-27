<?php $__env->startSection('title'); ?>
<title>Cập nhập cửa hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Cấu hình",
        "src" => route('generals.index'),
    ],
    [
        "title" => "Danh sách cửa hàng",
        "src" => route('addresses.index'),
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
            Cập nhập cửa hàng
        </h1>
    </div>
    <form class="grid grid-cols-12 gap-6 mt-5" role="form" action="<?php echo e(route('addresses.update',['id' => $detail->id])); ?>" method="post" enctype="multipart/form-data">
        <div class=" col-span-12 lg:col-span-8">
            <!-- BEGIN: Form Layout -->
            <div class=" box p-5">
                <?php echo $__env->make('components.alert-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3">
                        <label class="form-label text-base font-semibold">Tên cửa hàng</label>
                        <?php echo Form::text('title', $detail->title, ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-span-3">
                        <label class="form-label text-base font-semibold">Email</label>
                        <div class="">
                            <?php echo Form::text('email', $detail->email, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <label class="form-label text-base font-semibold">Số điện thoại</label>
                        <div class="">
                            <?php echo Form::text('hotline', $detail->hotline, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <label class="form-label text-base font-semibold">Địa chỉ</label>
                        <div class="">
                            <?php echo Form::text('address', $detail->address, ['class' => 'form-control', 'placeholder' => 'Số 33 ngõ 629 Kim Mã']); ?>
                        </div>
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <label class="form-label text-base font-semibold">Tỉnh/Thành phố</label>
                        <div class="">
                            <?php echo Form::select('cityid', $listCity, $detail->cityid, ['class' => 'form-control tom-select tom-select-custom', 'id' => 'cityID']); ?>
                        </div>
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <label class="form-label text-base font-semibold">Quận/Huyện</label>
                        <div class="">
                            <?php echo Form::select('districtid', $listDistrict, $detail->districtid, ['class' => 'form-control', 'id' => 'districtID', 'placeholder' => '']); ?>
                        </div>
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <label class="form-label text-base font-semibold">Phường/Xã</label>
                        <div class="">
                            <?php echo Form::select('wardid', $listWard, $detail->wardid, ['class' => 'form-control', 'id' => 'wardID', 'placeholder' => '']); ?>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <label class="form-label text-base font-semibold">Thời gian làm việc</label>
                        <div class="">
                            <?php echo Form::text('time', $detail->time, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="text-right mt-5 col-span-3">
                        <button type="submit" class="btn btn-primary w-24">Cập nhập</button>
                    </div>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
        <div class=" col-span-12 lg:col-span-4">
            <?php echo $__env->make('components.image',['action' => 'update','name' => 'image','title'=> 'Ảnh đại diện'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('components.publish', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </form>
</div>

<?php echo $__env->make('address.backend.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/address/backend/edit.blade.php ENDPATH**/ ?>