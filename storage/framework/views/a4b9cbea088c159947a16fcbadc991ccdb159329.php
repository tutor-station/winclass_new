
<?php $__env->startSection('title', 'Widget Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Widget Settings';
$data['title'] = 'Front Settings';
$data['title1'] = 'Widget Settings';
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
					<h5 class="card-title"><?php echo e(__('Widget Settings')); ?></h5>
				</div>
				<div class="card-body">
					<form action="<?php echo e(action('WidgetController@update')); ?>" method="POST">
						<?php echo e(csrf_field()); ?>

						<?php echo e(method_field('PUT')); ?>

						<div class="row">
							<div class="update-password">
								<div class="form-group col-md-12">
									<label for=""><?php echo e(__('Enable Widgets')); ?>: </label>
									<input class="custom_toggle" class="custom_toggle" type="checkbox" id="myCheck"
										name="widget_enable" <?php echo e(optional($show)->widget_enable == 1 ? 'checked' : ''); ?>

										onclick="myFunction()" />
								</div>
							</div>
						</div>
							<div style="<?php echo e($show->widget_enable == 0 ? 'display: none' : ''); ?>" id="update-password">
								<div class="row">
									<div class="form-group col-md-3">
										<label for="heading"><?php echo e(__('Widget One Title')); ?><sup class="redstar text-danger">*</sup></label>
										<input value="<?php echo e($show ? $show->widget_one : ''); ?>" autofocus name="widget_one"
											type="text" class="form-control" placeholder="<?php echo e(__('Enter Widget One Title')); ?>" required />
									</div>
									<div class="form-group col-md-3">
										<label for=""><?php echo e(__('Enable About Us')); ?>: </label><br>
										<input id="status_toggle" class="custom_toggle" type="checkbox" id="widget_enable"
											name="about_enable" <?php echo e(optional($show)->about_enable == 1 ? 'checked' : ''); ?> />
									</div>
									<div class="form-group col-md-6">
										<label for=""><?php echo e(__('Enable Contact Us')); ?>: </label><br>
										<input id="status_toggle" class="custom_toggle" type="checkbox" id="widget_enable"
											name="contact_enable"
											<?php echo e(optional($show)->contact_enable == 1 ? 'checked' : ''); ?> />
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-3">
										<label for="heading"><?php echo e(__('Widget Two Title')); ?><sup
												class="redstar text-danger">*</sup></label>
										<input value="<?php echo e(optional($show)->widget_two); ?>" autofocus name="widget_two"
											type="text" class="form-control" placeholder="<?php echo e(__('Enter Widget Two Title')); ?>" required />
									</div>
									<div class="form-group col-md-3">
										<label for=""><?php echo e(__('Enable Career')); ?>: </label><br>
										<input id="status_toggle" class="custom_toggle" type="checkbox" id="widget_enable"
											name="career_enable"
											<?php echo e(optional($show)->career_enable == 1 ? 'checked' : ''); ?> />
									</div>
									<div class="form-group col-md-3">
										<label for=""><?php echo e(__('Enable Blog')); ?>: </label><br>
										<input id="status_toggle" class="custom_toggle" type="checkbox" id="widget_enable"
											name="blog_enable" <?php echo e(optional($show)->blog_enable == 1 ? 'checked' : ''); ?> />
									</div>
									<div class="form-group col-md-3">
										<label for=""><?php echo e(__('Enable Help & Support')); ?>: </label><br>
										<input id="status_toggle" class="custom_toggle" type="checkbox" id="widget_enable"
											name="help_enable" <?php echo e(optional($show)->help_enable == 1 ? 'checked' : ''); ?> />
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-3">
										<label for="heading"><?php echo e(__('Widget Three Title')); ?><sup
												class="redstar">*</sup></label>
										<input value="<?php echo e(optional($show)->widget_three); ?>" autofocus name="widget_three"
											type="text" class="form-control" placeholder="<?php echo e(__('Enter Widget Three Title')); ?>" required />
										</div>
									</div>
								</div>
							<div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
								<?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
								<?php echo e(__("Save")); ?></button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
	"use strict";
	$(function () {
		$('#myCheck').change(function () {
			if ($('#myCheck').is(':checked')) {
				$('#update-password').show('fast');
			} else {
				$('#update-password').hide('fast');
			}
		});

	})(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/widget/edit.blade.php ENDPATH**/ ?>