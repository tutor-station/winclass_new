
<?php $__env->startSection('title', 'Category Slider- Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Category Slider';
$data['title'] = 'Front Settings';
$data['title1'] = 'Category Slider';
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
				<h5 class="card-title"><?php echo e(__('Category Slider')); ?></h5>
			  </div>
			  <div class="card-body">
				<form action="<?php echo e(action('CategorySliderController@update')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('PUT')); ?>

					<div class="row">
				  <div class="form-group col-md-6">
					<label for="heading"><?php echo e(__('Select Categories')); ?></label>
					<select class="select2-multi-select form-control" name="category_id[]" multiple="multiple" size="3" required>
						<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($cat->status == 1): ?>
						<option value="<?php echo e($cat->id); ?>" <?php echo e(in_array($cat->id, optional($category_slider)->category_id ?: []) ? "selected": ""); ?>><?php echo e($cat->title); ?>

						</option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
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
  

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/category_slider/edit.blade.php ENDPATH**/ ?>