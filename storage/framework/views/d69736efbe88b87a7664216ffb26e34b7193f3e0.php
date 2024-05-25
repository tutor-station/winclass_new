
<?php $__env->startSection('title', 'Add Meeting Recording - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = ' Meeting Recording';
$data['title'] = ' Meeting Recording';
$data['title1'] = 'Add Meeting Recording';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Add Meeting Recording')); ?></h5>
          <div>
            <div class="widgetbar">
              <a href="<?php echo e(url('meeting-recordings')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>                        
          </div>
        </div>
        <div class="card-body">
          <form action="<?php echo e(url('meeting-recordings/')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?> 

            

              <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                <input class="form-control" type="text" name="title" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Title')); ?>">
              </div>
              <div class="col-md-6">
                <label for="exampleInputSlug"><?php echo e(__('Add')); ?> <?php echo e(__('Meeting')); ?> <?php echo e(__('URL')); ?>:<sup class="redstar">*</sup></label>
                <input type="slug" class="form-control" name="url" id="exampleInputPassword1" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('URL')); ?>">
              </div>
            </div>
            <br>
           
            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Create')); ?></button>
          </div>
      <div class="clear-both"></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/meeting_recording/create.blade.php ENDPATH**/ ?>