<table class="table">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="checkbox-all-deals">
            </th>
            <th>Sản Phẩm</th>
            <th>Giá</th>
            <th>Kho hàng</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($products) > 0): ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $getPrice = getPrice(array('price' => $v->price, 'price_sale' => $v->price_sale, 'price_contact' => $v->price_contact)); ?>
        <?php
        $stock = checkStockItemProduct($v);
        ?>
        <tr class="<?php echo e($stock['disabled']); ?>">
            <td>
                <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item-deals <?php echo e($stock['disabled']); ?>">
            </td>
            <td class="whitespace-nowrap flex space-x-2">
                <div class="w-10 h-10 image-fit zoom-in">
                    <img alt="" class="tooltip rounded-full" src="<?php echo e(asset($v->image)); ?>">
                </div>
                <div>
                    <p class="font-bold text-base"><?php echo $v->title; ?></p>
                    <p>Mã sản phẩm: <?php echo $v->code; ?></p>
                </div>
            </td>
            <td><?php echo $getPrice['price_final'] ?> <del><?php echo $getPrice['price_old'] ?></del></td>
            <td>
                <?php if($stock['stock'] == 0 && empty($stock['disabled'])): ?>
                <span>Sản phẩm có sẵn</span>
                <?php else: ?>
                <?php echo e($stock['stock']); ?>

                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>

</table>
<div class="mt-5 pb-5 paginationProduct">
    <?php echo e($products->links()); ?>

</div><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/backend/deals/common/product.blade.php ENDPATH**/ ?>