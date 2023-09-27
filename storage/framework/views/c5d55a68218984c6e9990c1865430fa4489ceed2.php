  
  <?php $__env->startSection('content'); ?>
  <?php echo htmlBreadcrumb($page->title); ?>


  <div id="main" class="sitemap main-contact">
      <div class="container mx-auto px-3">
          <div class="map pt-[30px] md:pt-[50px]">
              <?php echo $fcSystem['contact_map'] ?>
          </div>
          <div class="contact-btottom mt-5 md:mt-8">
              <div class="flex flex-wrap justify-between -mx-3">
                  <div class="w-full md:w-2/3 px-3">
                      <form id="form-submit-contact">
                          <?php echo csrf_field(); ?>
                          <?php echo $__env->make('homepage.common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <div class="flex flex-wrap justify-between -mx-3">
                              <div class="w-full md:w-1/2 px-3">
                                  <label for="" class="inline-block w-full text-gray-500">Họ và tên *</label>
                                  <input type="text" name="fullname" class="w-full h-[50px] border border-gray-300 mt-2 bg-gray-100 rounded-sm">
                              </div>
                              <div class="w-full md:w-1/2 px-3">
                                  <label for="" class="inline-block w-full text-gray-500">Email *</label>
                                  <input type="text" name="email" class="w-full h-[50px] border border-gray-300 mt-2 bg-gray-100 rounded-sm">
                              </div>
                          </div>
                          <div class="mt-5">
                              <label for="" class="inline-block w-full text-gray-500">Tiêu đề</label>
                              <input type="text" name="subject" class="w-full h-[50px] border border-gray-300 mt-2 bg-gray-100 rounded-sm">
                          </div>
                          <div class="mt-5">
                              <label for="" class="inline-block w-full text-gray-500">Lời nhắn</label>
                              <textarea id="" cols="30" rows="10" class="w-full h-[100px] border border-gray-300 mt-2 bg-gray-100 rounded-sm" name="message"></textarea>
                              <button type="submit" class="btn-submit-contact write-review__button write-review__button--submit bg-color_primary border border-color_primary hover:bg-white hover:text-color_primary transition-all text-white h-[50px] mt-[15px] text-f15 rounded-[5px] uppercase w-24">
                                  <span>Gửi </span>
                              </button>
                          </div>

                      </form>
                  </div>
                  <div class="w-full md:w-1/3 px-3 mt-[15px] md:mt-0">
                      <div class="bg-gray-100 border border-gray-200 p-[10px] md:p-[25px]">
                          <div class="mb-[20px]">
                              <h4 class="text-f15 font-bold"><i class="fa-solid fa-phone text-f14 mr-[5px] text-Orangefc5"></i>Hotline</h4>
                              <p class="text-gray-500"><?php echo e($fcSystem['contact_hotline']); ?></p>
                          </div>
                          <div class="mb-[20px]">
                              <h4 class="text-f15 font-bold"><i class="fa-solid fa-envelope text-f14 mr-[5px] text-Orangefc5"></i>Email</h4>
                              <p class="text-gray-500"><?php echo e($fcSystem['contact_email']); ?></p>
                          </div>
                          <div class="mb-[20px]">
                              <h4 class="text-f15 font-bold"><i class="fa-solid fa-location-dot  text-f14 mr-[5px] text-Orangefc5"></i>Địa chỉ</h4>
                              <p class="text-gray-500"><?php echo e($fcSystem['contact_address']); ?></p>
                          </div>
                          <div class="mb-[20px]">
                              <h4 class="text-f15 font-bold"><i class="fa-regular fa-clock text-f14 mr-[5px] text-Orangefc5"></i>Thời gian làm việc</h4>
                              <p class="text-gray-500"><?php echo e($fcSystem['contact_time']); ?></p>
                          </div>
                          <div class="border-t border-gray-200 pt-5 mt-5">
                              <ul class="flex flex-wrap justify-center">
                                  <?php if(!empty($fcSystem['social_facebook'])): ?>
                                  <li>
                                      <a target="_blank" href="<?php echo e($fcSystem['social_facebook']); ?>" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                          <i class="fa-brands fa-facebook-f"></i>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                                  <?php if(!empty($fcSystem['social_twitter'])): ?>
                                  <li>
                                      <a target="_blank" href="<?php echo e($fcSystem['social_twitter']); ?>" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                          <i class="fa-brands fa-twitter"></i>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                                  <?php if(!empty($fcSystem['social_google_plus'])): ?>
                                  <li>
                                      <a target="_blank" href="<?php echo e($fcSystem['social_youtube']); ?>" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                          <i class="fa-brands fa-google"></i>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                                  <?php if(!empty($fcSystem['social_youtube'])): ?>
                                  <li>
                                      <a target="_blank" href="<?php echo e($fcSystem['social_google_plus']); ?>" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                          <i class="fa-brands fa-youtube"></i>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                                  <?php if(!empty($fcSystem['social_tiktok'])): ?>
                                  <li>
                                      <a href="" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                          <i class="fa-brands fa-tiktok"></i></a>
                                  </li>
                                  <?php endif; ?>
                                  <?php if(!empty($fcSystem['social_instagram'])): ?>

                                  <li>
                                      <a href="" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                          <i class="fa-brands fa-instagram"></i>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                              </ul>
                          </div>
                      </div>
                  </div>
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
              var subject = $("#form-submit-contact input[name='subject']").val();
              var email = $("#form-submit-contact input[name='email']").val();
              var message = $("#form-submit-contact textarea[name='message']").val();
              $.ajax({
                  url: "<?php echo route('contactFrontend.store') ?>",
                  type: 'POST',
                  data: {
                      _token: _token,
                      fullname: fullname,
                      subject: subject,
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
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chuan.local\resources\views/contact/frontend/index.blade.php ENDPATH**/ ?>