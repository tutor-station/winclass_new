
<?php $__env->startSection('title', 'Add Manual Payment Gateway - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Add Manual Payment Gateway';
$data['title'] = 'Payment Settings';
$data['title1'] = 'Manual Payment Gateways';
$data['title2'] = 'Add Manual Payment Gateway';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <!-- row started -->
<div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Add Manual Payment Gateway')); ?></h5>
                    <div>
                        <div class="widgetbar">
                        <a href="<?php echo e(url('manualpayment')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                        </div>
                      </div>
                </div>                
                <!-- card body started -->
                <div class="card-body">
               <!-- form to create manualpayment start -->
<form action="<?php echo e(url('manualpayment/')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">          
                <div class="card-body">
                      <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                   <!-- Name -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Gateway Name')); ?> :<span class="text-danger">*</span></label>
                                            <input value="<?php echo e(old('name')); ?>" autofocus="" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Please Enter Gateway Name')); ?>" name="name" required="">
                                            <?php $__errorArgs = ['name'];
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
                                    </div>
                                </div>
                            </div>
                            <!-- image -->
                            <div class="form-group col-md-4">
                                <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Logo')); ?>: </label>
                                <small class="text-muted"><i class="fa fa-question-circle"></i>
                                  <?php echo e(__('Recommended size')); ?> (410 x 410px)</small>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                  </div>
                                  <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="user_img_one" aria-describedby="inputGroupFileAddon01" onchange="readURL(this);">
                                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose File')); ?></label>
                                  </div>
                                </div>
                                <div class="thumbnail-img-block mb-3">
                                  <img src="<?php echo e(url('images/user_img/user.jpg')); ?>" id="image" class="img-fluid" alt="<?php echo e(__('Gateway Logo')); ?>">
                                </div>   
                              </div>
                      </div>
                      <hr>
                        <div class="row">
                            <!-- Detail -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Details')); ?> : <span class="text-danger">*</span></label>
                                    <textarea id="detail" name="detail" class="<?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Please Enter Detail" required=""><?php echo e(old('detail')); ?></textarea>
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
                            </div>                            
                             <!-- Status -->
                             <div class="form-group col-md-6">
                                <label for="exampleInputDetails"><?php echo e(__('Status')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" name="status" checked />
                                <input type="hidden"  name="free" value="0" for="status" id="status">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
                                </div>
                            </div>
  
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- form to create manualpayment end -->
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/manual_payment/create.blade.php ENDPATH**/ ?>