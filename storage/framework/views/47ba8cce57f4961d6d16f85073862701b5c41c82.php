<?php $__env->startSection('content'); ?>

<?php echo htmlBreadcrumb(trans('index.LoginAccount')); ?>

<main class="py-8">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-center">
            <div class="w-[580px] max-w-full bg-[#f4f6f8] p-6 rounded-xl">
                <div class="flex border-b border-[#eee]">
                    <div class="w-1/2 text-center">
                        <a href="<?php echo e(route('customer.login')); ?>" class="font-bold uppercase h-[50px] leading-[50px] border-b  float-left w-full border-[#EE0033]"><?php echo e(trans('index.Login')); ?></a>
                    </div>
                    <div class="w-1/2 text-center border-l border[#eee]">
                        <a href="<?php echo e(route('customer.register')); ?>" class="font-semibold uppercase h-[50px] leading-[50px] float-left w-full "><?php echo e(trans('index.Register')); ?></a>
                    </div>
                </div>
                <div class="text-center py-[10px] text-f14 ">
                    <?php /*{{trans('index.PleaseEmailPassword')}} {{$fcSystem['homepage_brandname']}}*/?>
                </div>
                <form action="<?php echo e(route('customer.login-store')); ?>" method="POST" id="form-auth">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <?php if(session('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700-700 px-4 py-3 rounded relative mt-2" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">
                            <?php echo e(session('success')); ?>

                        </span>
                    </div>
                    <?php endif; ?>
                    <?php if($errors->any()): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2" role="alert">
                        <strong class="font-bold">ERROR!</strong>
                        <span class="block sm:inline">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($error); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    </div>
                    <?php endif; ?>
                    <div class="mt-2">
                        <label class="font-bold text-f14">Email <?php echo e(trans('index.OR')); ?> <?php echo e(trans('index.Phone')); ?><span class="text-f13 text-red-600">*</span></label>
                        <input type="text" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="phone" value="<?php echo e(old('phone')); ?>" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="mt-5">
                        <label class="font-bold text-f14"><?php echo e(trans('index.Password')); ?><span class="text-f13 text-red-600">*</span></label>
                        <input type="password" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="password" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="flex mt-5 justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" name="remember" type="checkbox" value="1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                            </div>
                            <label for="remember" class="cursor-pointer ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(trans('index.rememberLogin')); ?></label>
                        </div>
                        <a href="<?php echo e(route('customer.reset-password')); ?>" class="text-blue-700 font-bold" title="<?php echo e(trans('index.ForgotPassword')); ?>?"><?php echo e(trans('index.ForgotPassword')); ?>?</a>
                    </div>
                    <div class="mt-5 flex justify-center">
                        <button type="submit" class="btn-submit-contact py-4 px-1 md:px-8 rounded-lg block bg-[#EE0033]  text-white transition-all leading-none text-f15 font-bold"> <?php echo e(trans('index.Login')); ?></button>
                    </div>
                    <div class="mt-5 ">
                        <?php if(config('app.locale') == 'vi'): ?>
                        <p class="text-f16 text-center leading-6">
                            <span>Bạn chưa có tài khoản?</span><br>
                            Nhấn vào đây để <a href="<?php echo e(route('customer.register')); ?>" class="text-blue-700 underline">đăng kí</a><br>
                        </p>
                        <?php else: ?>
                        <p class="text-f16 text-center leading-6">
                            <span>New customer?</span>
                            <a href="<?php echo e(route('customer.register')); ?>" class="text-blue-700 underline">Create an account</a><br>Create wholesale account
                        </p>
                        <?php endif; ?>
                    </div>
                    <?php /*<div class="mt-5 text-f13 flex justify-center leading-4"><?php echo $page->description ?></div>
                    <div class="flex justify-center mt-3">
                        <span class="rounded-full border border-gray-300 px-3 py-1 text-f12">hoặc đăng nhập qua</span>
                    </div>
                    @include('customer.frontend.auth.common.social')*/ ?>
                </form>
                <?php echo $__env->make('customer/frontend/auth/common/social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/customer/frontend/auth/login.blade.php ENDPATH**/ ?>