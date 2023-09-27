<?php
$faqs = Cache::remember('faqs', 3600, function () {
    $faqs = \App\Models\CategoryArticle::select('id', 'title', 'slug')
        ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'isaside' => 1])
        ->with(['postsFields'])
        ->first();
    return $faqs;
});
?>
<?php if(!empty($faqs)): ?>
<?php if(count($faqs->postsFields) > 0): ?>
<div class="fqa-registrarion py-[30px] ">
    <div class="container mx-auto px-3">
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2">
                <h2 class="wow fadeInUp title-primary text-black text-f30 md:text-f50 font-black text-center leading-[30px] md:leading-[50px] relative">
                    <?php echo e($faqs->title); ?>

                </h2>
                <?php $__currentLoopData = $faqs->postsFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($item->meta_value)): ?>
                <div class="acc mt-8 wow fadeInUp" style="animation-delay: 0.<?php echo e($k+1); ?>s;">
                    <h2 class="font-bold text-black text-f18 bg-gray-100 py-[15px] px-[20px]">
                        <?php echo e($item->title); ?>

                    </h2>
                    <?php $json = json_decode($item->meta_value, TRUE); ?>
                    <?php if(!empty($json['title'])): ?>
                    <?php $__currentLoopData = $json['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="acc__card py-5 relative border-b ">
                        <div class="acc__title font-bold text-f16 px-[15px] flex justify-between cursor-pointer">
                            <span><?php echo e($val); ?></span>
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </div>
                        <div class="acc__panel px-[15px] mt-5">
                            <?php echo $json['content'][$key]; ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/faqs.blade.php ENDPATH**/ ?>