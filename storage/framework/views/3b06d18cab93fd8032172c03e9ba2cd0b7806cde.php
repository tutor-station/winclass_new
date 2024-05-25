
<?php $__env->startSection('title','Edit What-learn'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'What-learn';
$data['title'] = 'What-learn';
$data['title1'] = 'Edit What-learn';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($errors->any()): ?>
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?> 
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('What Learn')); ?></h5>
          <div class="widgetbar">
            <a href="<?php echo e(url('course/create/'. $cate->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
            </div>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('whatlearns/'.$cate->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="col-md-12">
                              <div class="d-none">

           <label class="d-none" for="exampleInputSlug"><?php echo e(__('SelectCourse')); ?></label>
            <select  name="course_id" class="form-control select2 d-none">
    
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="display-none" value="<?php echo e($cou->id); ?>"<?php echo e($cate->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
           </div>
              <div class="col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('Detail')); ?>:<sup class="redstar">*</sup></label>
                <textarea name="detail"  class="form-control" ><?php echo $cate->detail; ?></textarea>
              </div>
              <br>
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label><br>
                    <label class="switch">
                      <input class="slider" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> />
                      <span class="knob"></span>
                    </label>
              </div>
         
            <br>
                  
            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                <?php echo e(__('Update')); ?></button>
            </div>
            <div class="clear-both"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/whatlearns/edit.blade.php ENDPATH**/ ?>