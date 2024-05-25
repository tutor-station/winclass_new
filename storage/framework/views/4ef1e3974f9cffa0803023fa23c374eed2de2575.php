
<?php $__env->startSection('title', 'Edit Country'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit Country';
$data['title'] = 'Countries';
$data['title1'] = 'Edit Country';
?>
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
<div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Edit Country')); ?></h5>
          <div>
            <div class="widgetbar">
              <a href="<?php echo e(url('admin/country')); ?>"  class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/country/'.$countries->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="row">
              <div class="form-group col-md-4">
                <label class="control-label" for="first-name">  <?php echo e(__("Country Name")); ?> <span class="redstar">*</span></label>
                   <select class="select2-single form-control" name="country">
                  <option><?php echo e(__("Choose Country:")); ?></option>
                  <?php $__currentLoopData = $allcountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($c->id); ?>" <?php echo e($countries->country_id == $c->id ? 'selected' : ''); ?>><?php echo e($c->nicename); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
            </div>
            <div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
							<?php echo e(__("Update")); ?></button>
						</div>
           </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/country/edit.blade.php ENDPATH**/ ?>