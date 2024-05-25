
<?php $__env->startSection('title','All Course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Modified Courses Review';
$data['title'] = 'Modified Courses Review';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar bardashboard-card">
  <!-- Start row -->
  <div class="row">
    <!--=========master check box fro bulk delete start ==============================================-->
    <!--=========master check box fro bulk delete start ==============================================-->
    <div class="col-lg-12 mt-3 text-center">
      <?php if(request()->get('searchTerm')): ?>
          <h5 class=""><?php echo e(__("Showing")); ?> <?php echo e(filter_var($course->count())); ?> <?php echo e(__("of")); ?> <?php echo e(filter_var($course->total())); ?> <?php echo e(__("results for ")); ?> "<span class="text-primary"><?php echo e(Request::get('searchTerm')); ?></span>"</h5>
          <div class="clearfix"></div>
        <?php endif; ?>
    </div>
  
    <?php $__empty_1 = true; $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      
      <div class="col-lg-4 m-b-50 pb-4">
        
        <div class="card partial-course-img">
          <?php if($cat['preview_image'] !== NULL && $cat['preview_image'] !== '' && @file_get_contents('images/course/'.$cat['preview_image'])): ?>
          <img class="card-img-top" src="<?php echo e(url('images/course/'.$cat['preview_image'])); ?>" alt="<?php echo e($cat->title); ?>">
          <div class="overlay-bg"></div>
          <?php else: ?>
          <img class="card-img-top" src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" alt="<?php echo e($cat->title); ?>">
          <div class="overlay-bg"></div>
          <?php endif; ?>
          <div class="card-img-block">
            <h4 class="mt-3 card-title" style="color:white;"><?php echo e($cat->title); ?></h4>
            <p class="card-sub-title" style="color:white;"><?php if(isset($cat->user)): ?> <?php echo e($cat->user['fname']); ?> <?php endif; ?></p>
          </div>
          <div class="card-user-img">
            <?php if($image = @file_get_contents('../public/images/user_img/'.$cat->user->user_img)): ?>

              <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(url('images/user_img/'.$cat->user->user_img)); ?>" alt="<?php echo e($cat->user['fname']); ?>" class="img-fluid" data-toggle="modal" data-target="#exampleStandardModal<?php echo e($cat->user->id); ?>">
            <?php else: ?>

              <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(Avatar::create($cat->user->fname)->toBase64()); ?>" alt="<?php echo e($cat->user['fname']); ?>" class="img-fluid w-h-100" data-toggle="modal" data-target="#exampleStandardModal<?php echo e($cat->user->id); ?>"  >

            
            <?php endif; ?>
            
          </div>
          <div class="card-body">
            <ul class="partial-course-status">
              <li style="list-style-type: none;" class="mt-4">
                <a href="#" style="color:black"><?php echo e(__('Type')); ?> 
                  <span class="button-align">
                    <?php if($cat->type == '1'): ?>
                      paid
                      <?php else: ?>
                      Free
                    <?php endif; ?>
                  </span>
                </a>
              </li>
              <?php if(Auth::user()->role == 'admin'): ?>
              <li style="list-style-type: none;" class="mt-3"> 
                <a href="#" style="color:black"><?php echo e(__('Features')); ?><span class="button-align">
                <input  data-id="<?php echo e($cat->id); ?>" type="checkbox"  class="custom_toggle status1" name="featured" <?php echo e($cat->featured == 1 ? 'checked' : ''); ?> />
                </span>
                </a>
                
              </li>
              <?php else: ?>
              <li style="list-style-type: none;" class="mt-3"> 
                <a href="#" style="color:black"><?php echo e(__('Features')); ?>

                  <span class="button-align">
                <?php if($cat->featured ==1): ?>
                        <?php echo e(__('Yes')); ?>

                        <?php else: ?>
                        <?php echo e(__('No')); ?>

                        <?php endif; ?>
                </span>
                </a>
                
              </li>
              <?php endif; ?>

              <?php if(Auth::user()->role == 'admin'): ?>
              <li style="list-style-type: none;" class="mt-3">
                <a href="#" style="color:black"><?php echo e(__('Status')); ?>

                  <span class="button-align">
                    <input  data-id="<?php echo e($cat->id); ?>" type="checkbox"  class="custom_toggle status2" name="status" <?php echo e($cat->status == 1 ? 'checked' : ''); ?> />
                  </span>
                </a>
          
              </li>
              <?php else: ?>
              <li style="list-style-type: none;" class="mt-3">
                <a href="#" style="color:black"><?php echo e(__('Status')); ?>

                  <span class="button-align">
                    <?php if($cat->status ==1): ?>
                          <?php echo e(__('Active')); ?>

                        <?php else: ?>
                          <?php echo e(__('Deactivate')); ?>

                        <?php endif; ?>
                  </span>
                </a>
          
              </li>
              <?php endif; ?>              
            </ul>

          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-lg-12 text-right">
                <a href="<?php echo e(route('instructor.course.show',['id' => $cat->id, 'slug' => $cat->slug ])); ?>" title="<?php echo e(__('Review')); ?>" type="button" class="btn btn-primary"><?php echo e(__('Review')); ?>

                </a>
              </div>

            

              <!--==================bulk delete start========================================-->

              <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('close')); ?>">&times;</button>
                      <div class="delete-icon"></div>
                    </div>
                    <div class="modal-body text-center">
                      <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                      <p><?php echo e(__('Do you really want to delete selected item ? This process
                        cannot be undone')); ?>.</p>
                    </div>
                    <div class="modal-footer">
                      <form id="bulk_delete_form" method="post" action="<?php echo e(route('instructor.cource.delete')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


            
              <div class="col-1"></div>
            </div>
          </div>



        </div>
      </div>
      <br>
      <br>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <h3 class="col-md-12 mt-5 text-center">
        <i class="fa fa-frown-o text-warning"></i> <?php echo e(__("No Course Found !")); ?>

      </h3>
    <?php endif; ?>

    <br>


    <div class="form-group col-md-6 mt-5">
      <div class="col-xs-12">

        <div class="pull-right">
          <?php echo $course->render(); ?>

        </div>
      </div>
    </div>
  </div>
  <!-- End row -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
  $(function () {
    $('.status1').change(function () {
      var featured = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-featured-status',
        data: {
          'featured': featured,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
</script>
<!-- script to change featured-status end -->
<!-- script to change status start -->
<script>
  $(function () {
    $('.status2').change(function () {
      var status = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-status',
        data: {
          'status': status,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
</script>
<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck').change(function(){
          if($('#myCheck').is(':checked')){
            $('#update-password').show('fast');
          }else{
            $('#update-password').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck1').change(function(){
          if($('#myCheck1').is(':checked')){
            $('#update-password1').show('fast');
          }else{
            $('#update-password1').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<script>
  $(document).ready(function () {
    $(".reset-btn").click(function () {
      var uri = window.location.toString();

      if (uri.indexOf("?") > 0) {

        var clean_uri = uri.substring(0, uri.indexOf("?"));

        window.history.replaceState({}, document.title, clean_uri);

      }

      location.reload();
    });
  });
</script>
<!-- script to change status end -->

<script>
    $('#search').on('change', function () {
        var v = $(this).val();
        if (v == 'search') {
            $('#clear_id').show();
            $('#clear').attr('required', '');
        } else {
            $('#clear_id').hide();
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/instructor_course.blade.php ENDPATH**/ ?>