
<?php $__env->startSection('title', 'Get Started - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Get Started';
$data['title'] = 'Front Settings';
$data['title1'] = 'Get Started';
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
			<h5 class="card-title"><?php echo e(__('Get Started')); ?></h5>
		  </div>
		  <div class="card-body">
			<form action="<?php echo e(action('GetstartedController@update')); ?>" method="POST" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('PUT')); ?>

			<div class="row">
			  <div class="form-group col-md-3">
				<label for="heading"><?php echo e(__('Heading')); ?></label>
				<input value="<?php echo e(optional($show)['heading']); ?>" autofocus name="heading" type="text" class="form-control" placeholder="<?php echo e(__('Enter Heading')); ?>"/>
			</div>
			  <div class="form-group col-md-3">
				<label for="sub_heading"><?php echo e(__('Sub Heading')); ?></label>
				<input value="<?php echo e($show->sub_heading ?? ''); ?>" autofocus name="sub_heading" type="text" class="form-control" placeholder="<?php echo e(__('Enter SubHeading')); ?>"/>
			</div>
			  <div class="form-group col-md-3">
				<label for="button_txt"><?php echo e(__('Button Text')); ?></label>
				<input value="<?php echo e(optional($show)['button_txt']); ?>" autofocus name="button_txt" type="text" class="form-control" placeholder="<?php echo e(__('Enter Button Text')); ?>"/>
			</div>
			  <div class="form-group col-md-3">
				<label for="button_txt"><?php echo e(__('Button Link')); ?></label>
				<input value="<?php echo e(optional($show)['link']); ?>" name="link" type="text" class="form-control" placeholder="<?php echo e(__('Enter Button Link')); ?>"/>
			</div>
			  <div class="form-group col-md-3">
				  
				<label for="image"><?php echo e(__('Background Image')); ?><sup class="redstar text-danger">*</sup></label><br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__("Upload")); ?></span>
					</div>
					<div class="custom-file">
					  <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose File")); ?></label>
					</div>
				  </div>
				<img src="<?php echo e(url('/images/getstarted/'.optional($show)['image'])); ?>" class="img-responsive image_size" alt="Background Image"/>
			</div>			  
		</div>		
		<div class="form-group">
			<button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
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
	




<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/get_started/edit.blade.php ENDPATH**/ ?>