<?php $__env->startSection('title'); ?>
<title>Sản phẩm mua kèm</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Sản phẩm mua kèm",
        "src" => route('product_deals.index'),
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
    <h1 class=" text-lg font-medium mt-10">
        Sản phẩm mua kèm
    </h1>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class=" col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 justify-between">
            <div class="flex space-x-2 ">
                <select class="flex-auto form-control ajax-delete-all mr10 w-36" style="height:42px" data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="<?php echo e($module); ?>">
                    <option>Hành động</option>
                    <option value="">Xóa</option>
                </select>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_deals_create')): ?>
            <a href="<?php echo e(route('product_deals.create')); ?>" class="btn btn-primary shadow-md" style="height: 42px;">Thêm mới</a>
            <?php endif; ?>
        </div>
        <!-- BEGIN: Data List -->
        <div class=" col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_deals_destroy')): ?>
                        <th class="text-center" style="width:40px;">
                            <input type="checkbox" id="checkbox-all">
                        </th>
                        <?php endif; ?>
                        <th class="text-center">STT</th>
                        <th>Sản phẩm chính</th>
                        <th>Sản phẩm mua kèm</th>
                        <th>NGƯỜI TẠO</th>
                        <th>NGÀY TẠO</th>
                        <th class="hidden">HIỂN THỊ</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd " id="post-<?php echo $v->id; ?>">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_deals_destroy')): ?>
                        <td>
                            <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                        </td>
                        <?php endif; ?>
                        <td class="text-left">
                            <?php echo e($data->firstItem()+$loop->index); ?>

                        </td>
                        <td class="font-bold text-primary">
                            <?php echo e($v->product->title); ?>

                        </td>
                        <td>
                            <div class="space-y-3">
                                <?php if(!empty($v->product_deal_items)): ?>
                                <?php
                                $products = collect($v->product_deal_items)->groupBy('product_id')->all();
                                ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in mr-2">
                                        <img class=" rounded-full" src="<?php echo e($item[0]['image']); ?>" alt="<?php echo e($item[0]['title']); ?>">
                                    </div>
                                    <div class="flex-1">
                                        <?php echo e($item[0]['title']); ?>

                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <?php echo e($v->user->name); ?>

                        </td>
                        <td>
                            <?php if($v->created_at): ?>
                            <?php echo e(Carbon\Carbon::parse($v->created_at)->diffForHumans()); ?>

                            <?php endif; ?>
                        </td>
                        <td class="w-40 hidden">
                            <?php echo $__env->make('components.publishTable',['module' => $module,'title' => 'publish','id' =>
                            $v->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_deals_edit')): ?>
                                <a class="flex items-center mr-3" href="<?php echo e(route('product_deals.edit',['id'=>$v->id])); ?>">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_deals_destroy')): ?>
                                <a class="flex items-center text-danger ajax-delete" href="javascript:void(0);" data-id="<?php echo $v->id ?>" data-module="<?php echo $module ?>" data-child="0" data-title="Lưu ý: Khi bạn xóa deal, deal sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                                <?php endif; ?>
                            </div>
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
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/backend/deals/index.blade.php ENDPATH**/ ?>