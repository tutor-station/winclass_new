
<?php $__env->startSection('title', 'Create Testimonial - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create Testimonial';
$data['title'] = 'Front Setting';
$data['title1'] = 'All Testimonials';
$data['title2'] = 'Create Testimonial';
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
          <h5 class="card-title"><?php echo e(__('Create Testimonial')); ?></h5>
          <div>
            <div class="widgetbar">
                <a href="<?php echo e(url('testimonial')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>                
            </div>                        
          </div>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="<?php echo e(url('testimonial/')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="row">
              <div class="form-group col-md-4">
                <label for="exampleInputSlug"><?php echo e(__('Image')); ?>:<sup class="text-danger">*</sup></label><br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputTit1e"><?php echo e(__('Client Name')); ?>:<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="client_name" id="exampleInputTitle" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputTit1e"><?php echo e(__('Designation')); ?>:<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="designation" id="exampleInputTitle" placeholder="<?php echo e(__('Enter Designation')); ?>" value="">
              </div>
              <div class="form-group col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('Details')); ?>:<sup class=" text-danger">*</sup></label>
                <textarea name="details" rows="3" class="form-control" placeholder="<?php echo e(__('Enter Details')); ?>">
                 <?php echo e(old('details')); ?>

               </textarea>
              </div>
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('rating') ? ' has-error' : ''); ?>">
                  <label for="exampleInputSlug"><?php echo e(__('Rating')); ?></label>
                  
                    <div class="col-md-12">
                        <div class="rating">
                            <label>
                                <input type="radio" name="rating" value="1" />
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                            </label>
                            <label>
                                <input type="radio" name="rating" value="2" />
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                            </label>
                            <label>
                                <input type="radio" name="rating" value="3" />
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                            </label>
                            <label>
                                <input type="radio" name="rating" value="4" />
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                            </label>
                            <label>
                                <input type="radio" name="rating" value="5" />
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                                <span class="icon"><i class="fa fa-star"
                                        style='color:orange' aria-hidden="true"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>            
              <div class="form-group col-md-5">
                <label for="exampleInputDetails" class="mr-3"><?php echo e(__('Status')); ?>:</label>
                <br>
                <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked/>
                <input type="hidden"  name="free" value="0" for="status" id="status">
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
<?php $__env->startSection('scripts'); ?>
<script>
(function($) {
  "use strict";
  tinymce.init({selector:'textarea'});
})(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/testimonial/testi_form.blade.php ENDPATH**/ ?>