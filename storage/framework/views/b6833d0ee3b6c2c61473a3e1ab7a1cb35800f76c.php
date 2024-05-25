
<?php $__env->startSection('title', 'Admin Customizations - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Admin Customizations';
$data['title'] = 'Site Setting';
$data['title1'] = 'Admin Customizations';
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
                    <h5 class="card-box"><?php echo e(__('Admin Customizations')); ?></h5>
                </div>
                <!-- card body started -->
                <div class="card-body">
                    <!-- form start -->
                    <form action="<?php echo e(url('admincustomisation/update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- card start -->
                                <div class="card">
                                    <!-- card body start -->
                                    <div class="card-body">
                                        <!-- row start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- row start -->
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="bg_grey_color"><?php echo e(__('Background Grey Color')); ?>:</label>
                                                            <input name="bg_grey_color" class="form-control" type="color"
                                                                value="<?php echo e(optional($color)['bg_grey_color']); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="bg_white_color"><?php echo e(__('Background White color')); ?>:</label>
                                                            <input name="bg_white_color" class="form-control" type="color"
                                                                value="<?php echo e(optional($color)['bg_white_color']); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="text-grey-color"><?php echo e(__('Text Grey Color')); ?>:</label>
                                                            <input name="text-grey-color" class="form-control" type="color"
                                                                value="<?php echo e(optional($color)['text-grey-color']); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="text_dark_color"><?php echo e(__('Text Dark Color')); ?>:</label>
                                                            <input name="text_dark_color" class="form-control" type="color"
                                                                value="<?php echo e(optional($color)['text_dark_color']); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="text_white_color"><?php echo e(__('Text White Color')); ?>:</label>
                                                            <input name="text_white_color" class="form-control" type="color"
                                                                value="<?php echo e(optional($color)['text_white_color']); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="text_blue_color"><?php echo e(__('Text Blue Color')); ?>:</label>
                                                            <input name="text_blue_color" class="form-control" type="color"
                                                                value="<?php echo e(optional($color)['text_blue_color']); ?>" />
                                                        </div>
                                                    </div>
                                                </div><!-- card body end -->
                                                <div class="col-md-12">
                                                    <a href="<?php echo e(route('admincustomisation.reset')); ?>" type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></a>
                                                    <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
                                                        <?php echo e(__("Save")); ?></button>
                                                </div>
                                            </div><!-- card end -->
                                        </div><!-- col end -->
                                    </div><!-- row end -->
                    </form>
                    <!-- form end -->
                </div><!-- card body end -->

            </div><!-- col end -->
        </div>
       
    </div>
    </div>
</div><!-- row end -->
<br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/admincustomisation/view.blade.php ENDPATH**/ ?>