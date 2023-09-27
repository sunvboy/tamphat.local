
<?php $__env->startSection('title'); ?>
<title>Danh sách sản phẩm</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách sản phẩm",
        "src" => route('products.index'),
    ],
    [
        "title" => "Danh sách",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);

?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <h1 class="text-lg font-medium mt-10">
        Danh sách sản phẩm
    </h1>
    <div class="grid grid-cols-12 gap-6 ">
        <div id="data_product" class="col-span-12 overflow-auto lg:overflow-visible">
            <!-- BEGIN: Data List -->
            <div class="">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th style="width:300px;">Tiêu đề</th>
                        </tr>
                    </thead>
                    <tbody id="table_data" role="alert" aria-live="polite" aria-relevant="all">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd " id="post-<?php echo $v->id; ?>">
                            <td>
                                <?php echo $v->name; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center justify-center">
                <?php echo e($data->links()); ?>

            </div>
            <!-- END: Pagination -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/product/backend/product/index_tmp.blade.php ENDPATH**/ ?>