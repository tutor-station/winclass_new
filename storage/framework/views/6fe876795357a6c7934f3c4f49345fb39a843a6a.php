
<?php $__env->startSection('title', 'Alumini  - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create Alumni';
$data['title'] = 'Alumni';
$data['title1'] = 'Create Alumni';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-danger">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Create Alumni')); ?></h5>
                    <div>
                        <div class="widgetbar">
                          <a href="<?php echo e(url('alumini')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                      
                        </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-body">
                            <form class="form" action="<?php echo e(route('alumini.store')); ?>" method="POST" novalidate
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label class="text-dark" for="user_id"><?php echo e(__('Select User')); ?>: </label>
                                    <select  class="form-control select2" name="user_id">
                                      <option value="none" selected disabled hidden>
                                        <?php echo e(__('Please Select an Option')); ?>

                                      </option>
                                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                  </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
                                        <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                                        <?php echo e(__("Create")); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/alumini/create.blade.php ENDPATH**/ ?>