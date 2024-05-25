
<?php $__env->startSection('title', 'Create Advertisements - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create Advertisement';
$data['title'] = 'Front Settings';
$data['title1'] = 'Advertisements';
$data['title2'] = 'Create Advertisement';
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
          <h5 class="card-title"><?php echo e(__('Create Advertisement')); ?></h5>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.advertisement.create')): ?>
          <div>
          <div class="widgetbar">
          <a href="<?php echo e(url('advertisement')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
        </div>
        </div>
        <?php endif; ?>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="<?php echo e(url('advertisement/')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>                    
            <div class="row">                        
              <div class="form-group col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('Image')); ?>:<sup class="text-danger">*</sup></label><br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image1" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                  </div>
                </div>
                <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Recommended Size')); ?> (1375 x 409PX)</small>
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputDetails"><?php echo e(__('Enter URL')); ?>:</label>
                  <input type="title" class="form-control" name="url1" id="exampleInputTitle" placeholder="<?php echo e(__('EnterURL')); ?>" >

              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputDetails"><?php echo e(__('Position')); ?>:<sup class="redstar">*</sup></label>
                  <select class="select2-single form-control"  name="position">
                  </option>
                  <option value="belowslider"><?php echo e(__('Below Slider')); ?></option>
                  <option value="belowrecent"><?php echo e(__('Below Recent Courses')); ?></option>
                  <option value="belowbundle"><?php echo e(__('Below Bundle Courses')); ?></option>
                  <option value="belowtestimonial"><?php echo e(__('Below Testimonial')); ?></option>
                </select>
              </div>            
              <div class="form-group col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>                
                <input type="hidden"  name="free" value="0" for="status" id="status" />
                <input id="status" type="checkbox" name="status"  class="custom_toggle" checked/>
              </div>                
            </div>
            <div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
							<?php echo e(__("Create")); ?></button>
						</div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/advertisement/create.blade.php ENDPATH**/ ?>