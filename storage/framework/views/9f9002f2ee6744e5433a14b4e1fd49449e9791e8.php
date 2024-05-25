
<?php $__env->startSection('title', 'Edit Service - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit Service';
$data['title'] = 'Front Settings';
$data['title1'] = 'Services';
$data['title2'] = 'Edit Service';
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
          <h5 class="card-title"><?php echo e(__('Edit Service')); ?></h5>
          <div>
            <div class="widgetbar">
              <a href="<?php echo e(url('service')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
          
            </div>
          </div>
        </div>
        <div class="card-body">
            <form id="demo-form2" method="post" action="<?php echo e(route('service.update',$data->id)); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputTit1e"><?php echo e(__('Service')); ?>:<sup
                                        class="redstar text-danger">*</sup></label>
                                <input class="form-control" type="text" name="title" value= "<?php echo e($data->title); ?>"
                                    placeholder="<?php echo e(__('Enter Service Tittle')); ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputSlug"> <?php echo e(__('Image')); ?>:<sup
                                        class="redstar text-danger">*</sup></label><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"
                                            id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label"
                                            for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                    </div>
                                </div>
                                <?php if($data->image != null || $data->image !=''): ?>
                                <div class="edit-user-img">
                                  <img src="<?php echo e(url('/images/services/'.$data->image)); ?>" alt="<?php echo e(__('Image')); ?>" class="img-responsive image_size">
                                </div>
                                <?php else: ?>
                                <div class="edit-user-img">
                                  <img src="<?php echo e(asset('images/services/'.$data->tittle)); ?>"  title="<?php echo e(__('Image')); ?>" class="img-responsive img-circle">
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-12">
                              <label class="text-dark"><?php echo e(__('Details')); ?>: <span
                                      class="text-danger">*</span></label>
                              <textarea id="detail" name="detail"
                                  class="<?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                  placeholder="<?php echo e(__('Enter Details')); ?>"
                                  required=""><?php echo e($data->detail); ?></textarea>
                              <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" role="alert">
                                  <strong><?php echo e($message); ?></strong>
                              </span>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                            <div class="form-group col-md-2">
                              <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Status')); ?> :</label><br>
                              <input type="checkbox" class="custom_toggle" name="status" <?php echo e($data->status == '1' ? 'checked' : ''); ?> />
                              
                          </div>
                            <div class="form-group col-md-12">
                                <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
                                    <?php echo e(__("Reset")); ?></button>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/service/edit.blade.php ENDPATH**/ ?>