  
  <?php $__env->startSection('content'); ?>
  <section class="banner-child relative">
      <div class="img">
          <a href="javascript:void(0)"><img src="<?php echo e(!empty($page->image) ? (!empty(File::exists(base_path($page->image)))?asset($page->image):asset($fcSystem['banner_0'])) : asset($fcSystem['banner_0'])); ?>" alt="<?php echo e($page->title); ?>" class="w-full" /></a>
      </div>
      <div class="text-center overlay-banner absolute w-full left-0 top-1/2" style="transform: translateY(-50%)">
          <div class="container mx-auto px-3">
              <div class="breadcrumb">
                  <ul class="flex flex-wrap justify-center">
                      <li class="pr-[5px] text-white"><a href="<?php echo e(!empty(config('app.locale') == 'vi') ? url('/') : url('/en')); ?>"><?php echo e(trans('index.home')); ?></a> /</li>
                      <li class="text-white"><?php echo e($page->title); ?></li>
                  </ul>
              </div>
              <h1 class="text-f25 md:text-f35 font-bold text-white relative z-10 my-[10px] md:my-[25px]">
                  <?php echo e($page->title); ?>

              </h1>
              <div class="desc text-f16 text-white"><?php echo $page->description; ?></div>
          </div>
      </div>
  </section>

  <div id="main" class="sitemap main-contact py-[20px] md:py-[50px]">

      <div class="container mx-auto px-3">
          <div class="contact-btottom  bg-white p-[10px] ">

              <div class="flex flex-wrap justify-between -mx-3">
                  <div class="w-full md:w-1/2 px-3 mt-4 md:mt-0">
                      <h3 class="font-bold text-f20 mb-[10px] md:mb-[20px]">
                          <?php echo e(trans('index.addressCompany')); ?>

                      </h3>
                      <div class="">
                          <div class="mb-[20px]">
                              <h4 class="text-f15">
                                  <span class="w-[30px] h-[30px] text-center inline-block leading-[30px] bg-gray-300 rounded-full mr-[10px]"><i class="fa-solid fa-location-dot"></i></span>
                                  <?php echo e($fcSystem['contact_address']); ?>

                              </h4>
                          </div>
                          <div class="mb-[20px]">
                              <h4 class="text-f15">
                                  <span class="w-[30px] h-[30px] text-center inline-block leading-[30px] bg-gray-300 rounded-full mr-[10px]"><i class="fa-solid fa-phone-volume"></i></span>
                                  <?php echo e($fcSystem['contact_hotline']); ?>

                              </h4>
                          </div>
                          <div class="mb-[20px]">
                              <h4 class="text-f15">
                                  <span class="w-[30px] h-[30px] text-center inline-block leading-[30px] bg-gray-300 rounded-full mr-[10px]"><i class="fa-solid fa-envelope"></i></span>
                                  <?php echo e($fcSystem['contact_email']); ?>

                              </h4>
                          </div>
                          <div class="mb-[20px]">
                              <h4 class="text-f15">
                                  <span class="w-[30px] h-[30px] text-center inline-block leading-[30px] bg-gray-300 rounded-full mr-[10px]"><i class="fa-regular fa-clock"></i></span>
                                  <?php echo e($fcSystem['contact_time']); ?>

                              </h4>
                          </div>
                      </div>
                  </div>
                  <div class="w-full md:w-1/2 px-3">
                      <div class="content-bt">
                          <h3 class="font-bold text-f20 mb-[10px] md:mb-[20px]">
                              <?php echo e(trans('index.sendQuestion')); ?>

                          </h3>
                          <form id="form-submit-contact">
                              <?php echo csrf_field(); ?>
                              <?php echo $__env->make('homepage.common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              <div class="">
                                  <div class="mb-[10px]">
                                      <input name="fullname" type="text" class="outline-none focus:outline-none hover:outline-none w-full h-[40px] border-b border-gray-200 rounded-sm text-f15" placeholder="<?php echo e(trans('index.Fullname')); ?>*">
                                  </div>
                                  <div class="flex flex-wrap justify-between mx-[-10px]">
                                      <div class="w-full md:w-1/2 px-[10px] mb-4 md:mb-0">
                                          <input name="email" type="text" class="outline-none focus:outline-none hover:outline-none w-full h-[40px] border-b border-gray-200 rounded-sm text-f15" placeholder="Email">
                                      </div>
                                      <div class="w-full md:w-1/2 px-[10px]">
                                          <input name="phone" type="text" class="outline-none focus:outline-none hover:outline-none w-full h-[40px] border-b border-gray-200 rounded-sm text-f15" placeholder="<?php echo e(trans('index.Phone')); ?>*">
                                      </div>
                                  </div>
                                  <div class="mt-[10px]">
                                      <textarea name="message" id="" cols="30" rows="10" class="outline-none focus:outline-none hover:outline-none w-full h-[100px] border-b border-gray-200 rounded-sm text-f15" placeholder="<?php echo e(trans('index.Message')); ?>"></textarea>
                                      <button type="submit" class="btn-submit-contact py-4 px-1 md:px-8 rounded-lg block bg-global  text-white transition-all leading-none text-f15 font-bold"> <?php echo e(trans('index.SendContactInformation')); ?></button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="map mt-[20px] md:mt-[40px]">
                  <?php echo $fcSystem['contact_map'] ?>
              </div>

          </div>
      </div>
  </div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startPush('javascript'); ?>
  <script type="text/javascript">
      $(document).ready(function() {
          $(".btn-submit-contact").click(function(e) {
              e.preventDefault();
              var _token = $("#form-submit-contact input[name='_token']").val();
              var fullname = $("#form-submit-contact input[name='fullname']").val();
              var phone = $("#form-submit-contact input[name='phone']").val();
              var email = $("#form-submit-contact input[name='email']").val();
              var message = $("#form-submit-contact textarea[name='message']").val();
              $.ajax({
                  url: "<?php echo route('contactFrontend.store') ?>",
                  type: 'POST',
                  data: {
                      _token: _token,
                      fullname: fullname,
                      phone: phone,
                      email: email,
                      message: message
                  },
                  success: function(data) {
                      if (data.status == 200) {
                          $("#form-submit-contact .print-error-msg").css('display', 'none');
                          $("#form-submit-contact .print-success-msg").css('display', 'block');
                          $("#form-submit-contact .print-success-msg span").html("<?php echo $fcSystem['message_2'] ?>");
                          setTimeout(function() {
                              location.reload();
                          }, 3000);
                      } else {
                          $("#form-submit-contact .print-error-msg").css('display', 'block');
                          $("#form-submit-contact .print-success-msg").css('display', 'none');
                          $("#form-submit-contact .print-error-msg span").html(data.error);
                      }
                  }
              });
          });
      });
  </script>
  <?php $__env->stopPush(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/contact/frontend/index.blade.php ENDPATH**/ ?>