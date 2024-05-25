
<?php $__env->startSection('title', 'Create All Dropdown Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create All Dropdown Settings';
$data['title'] = 'Site Setting';
$data['title1'] = 'All Dropdown Settings';
$data['title2'] = 'Create All Dropdown Settings';
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
                    <h5 class="card-title"><?php echo e(__('Dropdown Settings')); ?></h5>
                    <div>
                        <div class="widgetbar">
                        <a href="<?php echo e(url('dropdown')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="<?php echo e(route('dropdown.store')); ?>" method="POST" novalidate
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label class="text-dark" for="city_id"><?php echo e(__('Select User Role')); ?>: </label>
                            <select  class="form-control select2" name="role_id">
                              <option value="none" selected disabled hidden>
                                <?php echo e(__('Please Select an Option')); ?>

                              </option>
                              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Courses')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch1" name="my_courses"
                                     checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Wishlist ')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch2" name="my_wishlist"
                                    checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Purchased History')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch3" name="purchased_history"
                                  checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Profile')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch4" name="my_profile"
                                    checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Flash Deal ')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch5" name="flash_deal"
                                    checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Donation')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch6" name="donation"
                                     checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Wallet')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch7" name="my_wallet"
                                     checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Affiliate')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch8" name="affilate"
                                     checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Compare')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch9" name="compare"
                                    checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Search Job')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch10" name="search_job"
                                    checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Job Portal')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch11" name="job_portal"
                                    checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Forum and Discussion')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch12" name="form_enable"
                                  checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Leadership')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch13" name="my_leadership"
                                     checked/>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Affiliate Dashboard')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch14" name="affilate_dashboard"
                                    checked/>
                            </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/drop/create.blade.php ENDPATH**/ ?>