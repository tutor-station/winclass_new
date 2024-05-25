
<?php $__env->startSection('title', 'Mailchimp Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Mailchimp Settings';
$data['title'] = 'Site Setting';
$data['title1'] = 'Mailchimp Settings';
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
                    <h5 class="card-title"><?php echo e(__('Mailchimp Settings')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form" action="<?php echo e(route('mailchimp.update')); ?>" method="POST" novalidate
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark" for="MAILCHIMP_APIKEY"><?php echo e(__('Mailchimp Api Key')); ?> <span class="text-danger">*</span></label>
                                    <input value="<?php echo e(env('MAILCHIMP_APIKEY')); ?>" autofocus name="MAILCHIMP_APIKEY" type="text" class="form-control" placeholder="<?php echo e(__('Enter Mailchimp Api Key')); ?>"/>
                                </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark" for="MAILCHIMP_LIST_ID"><?php echo e(__('Mailchimp List ID')); ?> <span class="text-danger">*</span></label>
                                        <input value="<?php echo e(env('MAILCHIMP_LIST_ID')); ?>" autofocus name="MAILCHIMP_LIST_ID" type="text" class="form-control" placeholder="<?php echo e(__('Enter  Mailchimp List ID')); ?>"/>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/mailchimp/setting.blade.php ENDPATH**/ ?>