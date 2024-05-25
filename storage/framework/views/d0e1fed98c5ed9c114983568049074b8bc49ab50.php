
<?php $__env->startSection('title','Create a new private course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Add Private Course';
$data['title'] = 'Courses';
$data['title1'] = 'Private Courses';
$data['title2'] = 'Create a Private Course';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Add Private Course')); ?></h5>
          <div>
            <div class="widgetbar">
              <a href="<?php echo e(url('private-course')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
                  class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a> </div>
          </div>
        </div>
        <div class="card-body">
          <form action="<?php echo e(url('private-course/')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label><?php echo e(__('Select Course')); ?>: <span
                      class="text-danger">*</span></label>
                  <select class="form-control js-example-basic-single" name="course_id" size="5" row="5"
                    placeholder="<?php echo e(__('Select Course')); ?>">
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat->status == 1): ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?>

                    </option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>              

                <div class="form-group col-md-12">
                  <label><?php echo e(__('Hide from Users')); ?>: <span
                      class="text-danger">*</span></label>
                  <select class="form-control js-example-basic-single" name="user_id[]" multiple="multiple" size="5"
                    row="5" placeholder="<?php echo e(__('Select Users')); ?>">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->status == 1): ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname); ?>

                    </option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>  
                  <div class="form-group col-md-12">
                    <?php if(Auth::User()->role == "admin"): ?>
                    <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
                    <input class="custom_toggle" type="checkbox" name="status" id="cb3" checked />                   
                    <?php endif; ?>
                  </div>
                
                <div class="form-group col-md-12">
                  <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                  <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Create')); ?></button>
                </div>

                <div class="clear-both"></div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<script>
  (function ($) {
    "use strict";


    $(function () {
      $('.js-example-basic-single').select2();
    });


  })(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/private_course/create.blade.php ENDPATH**/ ?>