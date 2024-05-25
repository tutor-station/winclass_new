
<?php $__env->startSection('title', 'Payout Setting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Instructor Payout Settings';
$data['title'] = 'Instructors';
$data['title1'] = 'Instructors Payout';
$data['title2'] = 'Instructors Payout Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>"
>
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
<div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Instructors Payout Settings')); ?></h5>
        </div>
        <div class="card-body">
          
			<form action="<?php echo e(route('instructor.update')); ?>" method="POST">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('POST')); ?>

          <div class="row ">

			<div class="form-group col-md-2">
				<label for="Revenue"><?php echo e(__('Instructor Revenue in')); ?> %</label>
			    <div class="input-group mb-3">
					<input  min="1" max="100" class="form-control" name="instructor_revenue" type="number" value="<?php echo e(optional($setting)->instructor_revenue); ?>" id="revenue"  placeholder="<?php echo e(__('Enter revenue percentage')); ?>" class="<?php echo e($errors->has('instructor_revenue') ? ' is-invalid' : ''); ?> form-control">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">%</span>
					</div>
				</div>
			</div>
				
			<div class="form-group col-md-2">
			<label for="Revenue"><?php echo e(__('Admin Revenue in')); ?> %</label>
			    <div class="input-group mb-3">
					<input min="1" max="100" class="form-control" name="admin_revenue" type="number" value="<?php echo e(100 - optional($setting)->instructor_revenue); ?>" id="revenue"  placeholder="<?php echo e(__('Enter revenue percentage')); ?>" class="<?php echo e($errors->has('admin_revenue') ? ' is-invalid' : ''); ?> form-control" readonly>
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">%</span>
					</div>
				</div>
			</div>
      <div class="form-group col-md-2">
            	<label for=""><?php echo e(__('Paytm Enable')); ?>: </label><br>
              <input  class="custom_toggle"  type="checkbox" name="paytm_enable" <?php echo e(optional($setting)['paytm_enable'] == '1' ? 'checked' : ''); ?>  />
              <input type="hidden"  name="free" value="0" for="paytm" id="paytm">
                
              
            </div>
            <div class="form-group col-md-2">
				<label for=""><?php echo e(__('PayPal Enable')); ?>: </label><br>
              <input  type="checkbox" class="custom_toggle" name="paypal_enable" <?php echo e(optional($setting)['paypal_enable'] == '1' ? 'checked' : ''); ?> />
			  <input type="hidden"  name="free" value="0" for="paypal" id="paypal">
            
            </div>
            <div class="form-group col-md-2">
				<label for=""><?php echo e(__('Bank Transfer Enable')); ?>: </label><br>
              <input  type="checkbox" class="custom_toggle" name="bank_enable" <?php echo e(optional($setting)['bank_enable'] == '1' ? 'checked' : ''); ?>  />
			  <input type="hidden"  name="free" value="0" for="bank" id="bank">
            
            </div>
          </div>
          <div class="form-group">
            <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
            <?php echo e(__('Save')); ?></button>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/setting/instructor.blade.php ENDPATH**/ ?>