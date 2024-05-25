
<?php $__env->startSection('title','Create a new role'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create a new role';
$data['title'] = 'Role';
$data['title1'] = 'Create a new role';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">   
    <div class="row">
        <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                <div>
                    <div class="widgetbar">
                      <a href="<?php echo e(route('roles.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
                          class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a> </div>
                    </div>
                    <h5 class="card-title"> <?php echo e(__("Create a new role")); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('roles.store')); ?>" method="POST" class="needs-validation" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-md-4">
                              <label for="name"  class="text-dark"><?php echo e(__('Role name')); ?> <span class="required">*</span></label>
                            <input name="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" placeholder="<?php echo e(__('Enter role name')); ?>" value="<?php echo e(old('name')); ?>" required autofocus>
                    
                            <input type="hidden" name="guard" value="web">
                    
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    
                        <div class="form-group table-responsive">
                            
                    
                            <p class="text-dark"> <b><?php echo e(__('Assign Permissions to role')); ?></b> </p>
                           
                            <table class="permissionTable table">
                                <th>
                                    <?php echo e(__('Section')); ?>

                                </th>
                    
                                <th>
                                    <label>
                                        <input class="grand_selectall" type="checkbox">
                                        <?php echo e(__('Select All')); ?>

                                    </label>
                                </th>
                    
                                <th>
                                    <?php echo e(__("Available permissions")); ?>

                                </th>
                    
                    
                               
                                <tbody>
                                   <?php $__currentLoopData = $custom_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <b><?php echo e(ucfirst($key)); ?></b>
                                        </td>
                                        <td width="30%">
                                            <label>
                                                <input class="selectall" type="checkbox">
                                                <?php echo e(__('Select All')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            
                                            <?php $__empty_1 = true; $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                                               <label>
                                                   <input name="permissions[]" class="permissioncheckbox" type="checkbox" value="<?php echo e($permission->id); ?>">
                                                   <?php echo e($permission->name); ?> &nbsp;&nbsp;
                                               </label>
                    
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <?php echo e(__("No permission in this group !")); ?>

                                            <?php endif; ?>
                    
                                        </td>
                    
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                    
                        </div>
                    
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Create")); ?></button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
      <script src="<?php echo e(url('/js/checkbox.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/roles/create.blade.php ENDPATH**/ ?>