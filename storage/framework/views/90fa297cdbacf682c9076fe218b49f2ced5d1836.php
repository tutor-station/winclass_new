
<?php $__env->startSection('title', 'QR Code Settings'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'QR Code Settings';
$data['title'] = 'QR Code Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
          <span aria-hidden="true" class="text-danger">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="row">
    <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('QR Code Settings')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form" action="<?php echo e(route('mobileqr.update')); ?>" method="POST" novalidate
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row m-b-20">
                        <div class="col-lg-12">
                            <div class="alert alert-primary">
                                <i class="feather icon-alert-circle"></i> <?php echo e(__('Qr Setting is used for landing page. ')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="row m-b-20">
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Users APP QR')); ?>:
                            </label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                </div>
                                <div class="custom-file">

                                    <input type="file" name="image" class="custom-file-input" id="img"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label"
                                        for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                </div>
                            </div>
                            <img src="<?php echo e(url('/images/qr/'.$qrsetting->image)); ?>" height="100px;" width="100px;" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Instructors APP QR')); ?>:
                            </label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                </div>
                                <div class="custom-file">

                                    <input type="file" name="image2" class="custom-file-input" id="img2"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label"
                                        for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                </div>
                            </div>
                            <img src="<?php echo e(url('/images/qr/'.$qrsetting->image2)); ?>" height="100px;" width="100px;" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Demo Image')); ?>:
                            </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="demo_image" class="custom-file-input" id="demo"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label"
                                        for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                </div>
                            </div>
                            <img src="<?php echo e(url('/images/qr/'.$qrsetting->demo_image)); ?>" height="100px;" width="100px;" />
                        </div>
                    </div>
                    <div class="form-group">
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/qr/setting.blade.php ENDPATH**/ ?>