<?php if(!empty($comment_view['listComment'])): ?>
<div class="space-y-10">
    <?php $__currentLoopData = $comment_view['listComment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex space-x-4">
        <div class="w-[70px]">
            <?php if(!empty($item->avatar)): ?>
            <img src="<?php echo e(asset($item->avatar)); ?>" alt="<?php echo e($item->fullname); ?>" style="border-radius:100%;width:60px;height:60px;object-fit: cover;">
            <?php else: ?>
            <img src="https://ui-avatars.com/api/?name=<?php echo e($item->fullname); ?>" alt="<?php echo e($item->fullname); ?>" style="border-radius:100%;width:60px;height:60px;object-fit: cover;">
            <?php endif; ?>
        </div>
        <div class="flex-1 space-y-1">
            <div>
                <div class="font-medium">
                    <?php echo e($item->fullname); ?>

                </div>
                <i class="text-sm"><?php echo e(Carbon\Carbon::parse($item->created_at)->isoFormat('MMM')); ?>

                    <?php echo e(Carbon\Carbon::parse($item->created_at)->isoFormat('DD')); ?>,
                    <?php echo e(Carbon\Carbon::parse($item->created_at)->isoFormat('YYYY')); ?>

                </i>
            </div>
            <div><?php echo e($item->message); ?></div>
            <a href="javascript:void(0)" class="handleReply text-red-600 mt-2" data-id="<?php echo e($item->id); ?>" data-name="<?php echo e($item->fullname); ?>"><i class="fas fa-reply"></i> <?php echo trans('index.Reply') ?></a>
            <div class="reply-comment">
            </div>
        </div>
    </div>
    <?php if($item->child): ?>
    <?php $__currentLoopData = $item->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kc=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex space-x-2 ml-[86px]">
        <div class="w-[70px]">
            <?php if(!empty($val->avatar)): ?>
            <img src="<?php echo e(asset($val->avatar)); ?>" alt="<?php echo e($val->fullname); ?>" style="border-radius:100%;width:60px;height:60px;object-fit: cover;">
            <?php else: ?>
            <img src="https://ui-avatars.com/api/?name=<?php echo e($val->fullname); ?>" alt="<?php echo e($val->fullname); ?>" style="border-radius:100%;width:60px;height:60px;object-fit: cover;">
            <?php endif; ?>
        </div>
        <div class="flex-1 space-y-1">
            <div class="name">
                <div>
                    <label class="font-medium"><?php echo e($val->fullname); ?></label>
                    <?php if($val->type == "QTV"): ?>
                    <span style="color:red;font-weight:bold">ADMIN</span>
                    <?php endif; ?>
                </div>
                <i class="text-sm"><?php echo e(Carbon\Carbon::parse($item->created_at)->isoFormat('MMM')); ?>

                    <?php echo e(Carbon\Carbon::parse($item->created_at)->isoFormat('DD')); ?>,
                    <?php echo e(Carbon\Carbon::parse($item->created_at)->isoFormat('YYYY')); ?></i>
            </div>
            <div><?php echo e($val->message); ?></div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="dataTables_paginate paging_bootstrap pull-right paginate_cmt">
    <?php echo e($comment_view['listComment']->links()); ?>

</div>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/article/frontend/article/comment/_data.blade.php ENDPATH**/ ?>