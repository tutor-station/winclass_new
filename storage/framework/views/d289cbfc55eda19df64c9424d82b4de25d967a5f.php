
<?php $__env->startSection('title','Affiliate Settings'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Affiliate Settings';
$data['title'] = 'Affiliate Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <?php if($errors->any()): ?>  
    <div class="alert alert-danger" role="alert">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
      <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
      <span class="text-red" aria-hidden="true">&times;</span></button></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      </div>
    <?php endif; ?>
      <div class="row">
      <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
          <div class="card-header">
            <h5 class="card-title"><?php echo e(__('Affiliate Settings')); ?></h5>
          </div>
          <div class="card-body">
            
            <form class="form" action="<?php echo e(route('affiliates.update')); ?>" method="POST" novalidate enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
              <div class="row">
              <div class="form-group col-md-3">
                <label class="text-dark"><?php echo e(__('Referral Code Length:')); ?></label>
            
                  <input  name="ref_length" autofocus="" type="number" min="4" max="100" class="form-control" placeholder="<?php echo e(__('Please enter Refferal code Length')); ?>" required="" value="<?php echo e($affilates ? strip_tags($affilates->ref_length) : ""); ?>">
                
              </div>

              <div class="form-group col-md-3">
                <label class="text-dark"><?php echo e(__('Point per referral:')); ?></label>
                <input  name="point_per_referral" autofocus="" type="number" min="0" step="any"  class="form-control" placeholder="<?php echo e(__('Enter Point for per Referral')); ?>" value="<?php echo e($affilates ? strip_tags($affilates->point_per_referral) : ""); ?>">
 
              </div>
              <div class="form-group col-md-12">
                <h4 class="box-title"><?php echo e(__('Front Settings')); ?></h4>
              </div>
  
             
              <div  class="form-group col-md-3">
                <label for="image"><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__("Upload")); ?></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?></label>
                    </div>
                  </div>
                 
                <?php if(isset($affilates->image) && $affilates->image != null && $affilates->image !='' && @file_get_contents('images/affiliate/'.$affilates->image)): ?>
                <img src="<?php echo e(url('/images/affiliate/'.optional($affilates)['image'])); ?>" class="img-responsive image_size"/>
                <?php endif; ?>
              </div>
              <div class="form-group col-md-12">
                <label class="text-dark"><?php echo e(__('Affiliate Details')); ?>:</label>
                <textarea name="text" id="detail" rows="3" class="form-control" ><?php echo $affilates ? $affilates->text : ""; ?></textarea>
              </div>
              <div class="form-group col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                    <input  type="checkbox" name="status" class="custom_toggle" <?php echo e(optional($affilates)['status'] == '1' ? 'checked' : ''); ?>/>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/affiliates/index.blade.php ENDPATH**/ ?>