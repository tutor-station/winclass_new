
<?php $__env->startSection('title', 'Edit Slider - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit Slider';
$data['title'] = 'Front Settings';
$data['title'] = 'Slider';
$data['title2'] = 'Edit Slider';
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
            <h5 class="card-title"><?php echo e(__("Edit Slider")); ?> </h5>
            <div>
              <div class="widgetbar">
                <a href="<?php echo e(url('slider')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
          </div>
            </div>
          </div>
          <div class="card-body">            
            <form id="demo-form" method="post"  action="<?php echo e(url('slider/'.$cate->id)); ?>

              "data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>            
            <div class="row">
              <div class="form-group col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('Heading')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="heading" id="exampleInputTitle" value="<?php echo e($cate->heading); ?>">
                
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('Sub Heading')); ?>:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="sub_heading" id="exampleInputTitle" value="<?php echo e($cate->sub_heading); ?>">
              </div>
              <div class="d-none">
                <label for="exampleInputTit1e d-none"><?php echo e(__('Search Text')); ?>:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control display-none" name="search_text" id="exampleInputTitle" value="0">
              </div>              
              <?php if(Auth::user()->role == 'instructor'): ?>
              <div class="form-group col-md-3">
                <label><?php echo e(__('Image')); ?>:<sup class="redstar text-danger">*</sup></label>
                <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Recommended size')); ?> <?php echo e(__('1375 x 409PX')); ?></small>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose File')); ?></label>                  
                  </div>
                </div>
                <img src="<?php echo e(url('/images/slider/'.$cate->image)); ?>" class="image_size"/>
                </div>
                <?php endif; ?>
                 <?php if(Auth::user()->role == 'admin'): ?>
                <div class="form-group col-md-3">
                  <label class="control-label" for="first-name"><?php echo e(__('Image')); ?> <span
                      class="required">*</span> </label>                 
                      <div class="input-group">
                        <input required readonly id="image" name="image" type="text"
                            class="form-control">
                        <div class="input-group-append">
                            <span data-input="image"
                                class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                        </div>
                      </div>                    
                      <br>
                      <img src="<?php echo e(url('/images/slider/'.$cate->image)); ?>" class="image_size" />
                </div>
                <?php endif; ?>           
              <div class="form-group col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Details')); ?>:<sup class="redstar">*</sup></label>
                <input type="textarea" class="form-control" name="detail" id="exampleInputTitle" value="<?php echo e($cate->detail); ?>">
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label><br>
                <input type="checkbox" class="custom_toggle" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> />
                <input type="hidden"  name="free" value="0" for="status" id="status">
              </div>           
              <div class="form-group col-md-2">
                <label for="exampleInputTit1e"><?php echo e(__('Text Position')); ?>:</label><br>
                  <input  class="custom_toggle"   type="checkbox" name="left" <?php echo e($cate->left == '1' ? 'checked' : ''); ?> />
                  <input type="hidden"  name="free" value="0" for="left" id="left">                
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputTit1e"><?php echo e(__('Enable Search on Slider')); ?>:</label><br>                 
                  <input  type="checkbox" name="search_enable" <?php echo e($cate->search_enable == '1' ? 'checked' : ''); ?>  class="custom_toggle"/>
                  <input type="hidden"  name="free" value="0" for="search_enable" id="search_enable">              
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
<?php $__env->startSection('script'); ?>
<script>
    $(".midia-toggle").midia({
        base_url: '<?php echo e(url('')); ?>',
        title : 'Choose Slider Image',
    dropzone : {
      acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
    },
        directory_name : 'slider'
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/slider/update.blade.php ENDPATH**/ ?>