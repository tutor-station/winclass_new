
<?php $__env->startSection('title',__('Wallet Settings - Admin')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Wallet Settings';
$data['title'] = 'Wallet';
$data['title1'] = 'Wallet Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content bar start -->
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
          <h5 class="card-title"><?php echo e(__('Wallet Settings')); ?></h5>
        </div>
        <div class="card-body">
          <form class="form" action="<?php echo e(route('wallet.update')); ?>" method="POST" novalidate
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                <input type="checkbox" name="status" class="custom_toggle"
                  <?php echo e(optional($settings)['status'] == '1' ? 'checked' : ''); ?> />
              </div>
              <div class="form-group col-md-12">
                <h5 class="box-title"><?php echo e(__('Enable Payment Gateways For Wallet')); ?>:</h5>
              </div>
              <div class="form-group col-md-3">
                <label for=""><?php echo e(__('Stripe')); ?> <?php echo e(__('Enable')); ?>: </label><br>
                <input type="checkbox" class="custom_toggle" name="stripe_enable"
                  <?php echo e(optional($settings)['stripe_enable'] == '1' ? 'checked' : ''); ?> />
              </div>
              <div class="form-group col-md-3">
                <label for=""><?php echo e(__('PayTM')); ?> <?php echo e(__('Enable')); ?>: </label><br>
                <input type="checkbox" class="custom_toggle" name="paytm_enable"
                  <?php echo e(optional($settings)['paytm_enable'] == '1' ? 'checked' : ''); ?> />
              </div>
              <div class="form-group col-md-3">
                <label for=""><?php echo e(__('PayPal')); ?> <?php echo e(__('Enable')); ?>: </label><br>
                <input type="checkbox" class="custom_toggle" name="paypal_enable"
                  <?php echo e(optional($settings)['paypal_enable'] == '1' ? 'checked' : ''); ?> />
              </div>

            </div>
            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
              <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                <?php echo e(__("Update")); ?></button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content bar end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/wallet/index.blade.php ENDPATH**/ ?>