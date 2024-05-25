
<?php $__env->startSection('title', 'Bank Detail - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Bank Details';
$data['title'] = 'Payment Settings';
$data['title1'] = 'Bank Details';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
        <!-- row started -->
    <div class="col-lg-12">
        <?php if($errors->any()): ?>  
        <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
        <span aria-hidden="true" style="color:red;">&times;</span></button></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </div>
        <?php endif; ?>
        <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Bank Details')); ?></h5>
                </div>                
                <!-- card body started -->
                <div class="card-body">
                <!-- form start -->
				<form action="<?php echo e(action('BankTransferController@update')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
				  		<?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

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
                                                    
                                                    <!-- Account Holder Name -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Account Holder Name')); ?><span class="text-danger">*</span></label>
                                                            <input name="account_holder_name" type="text" value="<?php echo e(optional($show)->account_holder_name); ?>" class="form-control" placeholder="<?php echo e(__('Enter Account Holder Name')); ?>" required>
                                                            <?php $__errorArgs = ['account_holder_name'];
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

                                                     <!-- Bank Name -->
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Bank Name')); ?><span class="text-danger">*</span></label>
                                                            <input name="bank_name" type="text" value="<?php echo e(optional($show)->bank_name); ?>" class="form-control <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter BankName')); ?>" required>
                                                            <?php $__errorArgs = ['bank_name'];
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

                                                    <!-- Account Number -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Account Number')); ?><span class="text-danger">*</span></label>
                                                            <input name="account_number" type="text" value="<?php echo e(optional($show)->account_number); ?>" class="form-control <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Account Number')); ?>" required>
                                                            <?php $__errorArgs = ['account_number'];
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

													<!-- IFCS Code -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('IFCS Code')); ?> :</label>
                                                            <input name="ifcs_code" type="text" value="<?php echo e(optional($show)->ifcs_code); ?>" class="form-control <?php $__errorArgs = ['ifcs_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter IFCS Code')); ?>">
                                                            <?php $__errorArgs = ['ifcs_code'];
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

													<!-- Swift Code -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Swift Code ')); ?> :</label>
                                                            <input name="swift_code" type="text" value="<?php echo e(optional($show)->swift_code); ?>" class="form-control <?php $__errorArgs = ['swift_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Swift Code')); ?>">
                                                            <?php $__errorArgs = ['ifcs_code'];
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
                                                
                                                   <!-- Bank Enable -->
                                                   <div class="form-group col-md-6">
                                                        <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Bank Enable')); ?> :</label><br>
                                                        <input type="checkbox" class="custom_toggle" name="bank_enable" <?php echo e(optional($show)['bank_enable'] == '1' ? 'checked' : ''); ?> />
                                                        <input type="hidden"  name="free" value="0" for="status" id="status">
                                                    </div>
           
                                                    <!-- create and close button -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Update")); ?></button>
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div><!-- row end -->

                                    </div><!-- card body end -->
                                </div><!-- card end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                  </form>
                  <!-- form end -->
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/bank_transfer/edit.blade.php ENDPATH**/ ?>