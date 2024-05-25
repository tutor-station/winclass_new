

<?php $__env->startSection('title','Edit Related Course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Related Course';
$data['title'] = 'Edit Related Course';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Related Course')); ?></h5>
          <div>
            <a href="<?php echo e(url('course/create/'. $cate->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
            </div>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('relatedcourse/'.$cate->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">

            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


            <input type="hidden" class="form-control " name="user_id" id="user_id" value="<?php echo e($cate->user_id); ?>"> 

            <div class="row" class="d-none">             
              <div class="col-md-12">  
                <label class="d-none" for="exampleInputSlug"><?php echo e(__('Course')); ?></label>
                <select class="d-none" name="main_course_id" class="form-control select2">
                    <div class="d-none">
                  <option value="<?php echo e($cate->main_course_id); ?>"><?php echo e($cate->main_course_id); ?></option>
                  </div>
                </select>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputSlug"><?php echo e(__('RelatedCourse')); ?></label>
                <select name="course_id" class="form-control select2">
                 <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($cou->id); ?>" <?php echo e($cate->course_id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small><?php echo e(__('Edit')); ?> <?php echo e(__('Related Course')); ?></small>
              </div>
             
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?> :</label><br>
                <label class="switch">
                  <input class="slider" type="checkbox" name="status" <?php echo e($cate->status==1 ? 'checked' : ''); ?> />
                  <span class="knob"></span>
                </label>
              </div>
            </div>
            <br>
            
            <div class="col-md-12">
                <div class="form-group">
                    <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    <?php echo e(__("Update")); ?></button>
                </div>
            </div>
          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/relatedcourse/edit.blade.php ENDPATH**/ ?>