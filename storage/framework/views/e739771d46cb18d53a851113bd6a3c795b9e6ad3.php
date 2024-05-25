
<?php $__env->startSection('title', 'Edit Trusted Slider- Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create Trusted Slider';
$data['title'] = 'Front Settings';
$data['title1'] = 'Trusted Sliders';
$data['title2'] = 'Edit Trusted Slider';
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
          <h5 class="card-title"><?php echo e(__('Edit Trusted Slider')); ?></h5>
          <div>
            <div class="widgetbar">
              <a  href="<?php echo e(url('trusted')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>                        
          </div>
        </div>
        <div class="card-body">
          <form id="demo-form" method="post"  action="<?php echo e(url('trusted/'.$trusted->id)); ?>

            "data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

            <div class="row">
              <div class="form-group col-md-4">
                <label for="exampleInputTit1e"><?php echo e(__('URL')); ?>:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="url" id="exampleInputTitle" value="<?php echo e($trusted->url); ?>">
              </div>              
              <div class="form-group col-md-4">
                <label for="exampleInputSlug"><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label><br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose File')); ?></label>
                  </div>                
                </div>
                <img src="<?php echo e(url('/images/trusted/'.$trusted->image)); ?>" class="img-responsive image_size" alt="{ __('Image') }}"/>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" <?php echo e($trusted->status == '1' ? 'checked' : ''); ?> />
                <input type="hidden"  name="free" value="0" for="status" id="status">
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
  
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/trusted/edit.blade.php ENDPATH**/ ?>