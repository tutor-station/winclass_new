
<?php $__env->startSection('title', 'Login & Signup Page - Setting'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Login & Signup Page';
$data['title'] = 'Front Settings';
$data['title1'] = 'Login & Signup Page';
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
                    <h5 class="card-title"><?php echo e(__('Login & Signup Page')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form" action="<?php echo e(route('login.update')); ?>" method="POST" novalidate
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Image')); ?>:
                                </label>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"
                                            id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="img" class="custom-file-input" id="img"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label"
                                            for="inputGroupFile01"><?php echo e(__('Choose File')); ?></label>
                                    </div>
                                </div>
                                <?php if($setting['img'] !== NULL && $setting['img'] !== ''): ?>
                                <img src="<?php echo e(url('/images/login/'.$setting->img)); ?>" height="100px;" width="100px;" />
                                <?php else: ?>
                                <img src="<?php echo e(Avatar::create($setting->text)->toBase64()); ?>" alt="course"
                                    class="img-fluid">
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-dark"><?php echo e(__('Text')); ?>:</label>
                                <input name="text" value="<?php echo e($setting->text); ?>" autofocus="" type="text"
                                    class="<?php echo e($errors->has('text') ? ' is-invalid' : ''); ?> form-control"
                                    placeholder="<?php echo e(__('Enter text')); ?>" required="">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please enter text!')); ?>.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
                                <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
                                <?php echo e(__("Save")); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/setting/login.blade.php ENDPATH**/ ?>