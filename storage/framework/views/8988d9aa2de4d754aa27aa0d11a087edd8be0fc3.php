<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo e(__('Warning !')); ?></title>
	<link rel="stylesheet" href="<?php echo e(url('css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(url('css/font-awesome.min.css')); ?>">
</head>
<body>
	<br>
	<div class="container-xl">
		<h3 class="text-danger"><i class="fa fa-warning"></i> <?php echo e(__('Warning')); ?></h3>
		<hr>
		<p class="text-info"><?php echo e(__('You tried to update the domain which is invalid !')); ?> 
		<h4><?php echo e(__('You can use this project only in single domain for multiple domain please check License standard')); ?> <a target="_blank" href="https://codecanyon.net/licenses/standard"><?php echo e(__('here')); ?></a>.</h4>
		<hr>
			<form class="needs-validation" action="<?php echo e(url('/change-domain')); ?>" method="POST" novalidate>
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label>
						<?php echo e(__('Enter the new domain where you want to move the license')); ?> : <span class="text-danger">*</span>
					</label>
					<input required class="form-control <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="domain" value="<?php echo e(old('domain')); ?>" placeholder="eg:example.com"/>
					<?php if($errors->has('domain')): ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($errors->first('domain')); ?></strong>
						</span>
				 	<?php endif; ?>
					<small class="text-muted">
						<i class="fa fa-question-circle"></i> <?php echo e(__('IF in some cases on current domain if you face the error you can re-update the domain by entering here')); ?>.
					</small>
					<br>
					<small class="text-muted">
						<i class="fa fa-question-circle"></i> <?php echo e(__('IF still facing the access denied error please contact')); ?> <a target="_blank" href="https://codecanyon.net/item/eclass-learning-management-system/25613271/support" title="<?php echo e(__('Support')); ?>"><?php echo e(__('Support')); ?></a> <?php echo e(__('for update  domain.')); ?>.
					</small>
				</div>	
				<div class="form-group">
					<button type="submit" class="btn btn-md btn-danger">
					 	<i class="fa fa-globe"></i>	<?php echo e(__('Change domain')); ?>

					</button>
				</div>
			</form>
		<hr>	
		<div class="text-muted text-center">&copy; <?php echo e(date('Y')); ?> | <?php echo e(__('All rights reserved')); ?> | <?php echo e(config('app.name')); ?></div>
	</div>
	<!-- jQuery 3.5.4 -->
	<script src="<?php echo e(url('js/jquery.min.js')); ?>"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo e(url('js/bootstrap.bundle.min.js')); ?>"></script>
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
		  'use strict';
		  window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
			  form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
				  event.preventDefault();
				  event.stopPropagation();
				}
				form.classList.add('was-validated');
			  }, false);
			});
		  }, false);
		})();
	</script>
</body>
</html><?php /**PATH /var/www/html/resources/views/accessdenied.blade.php ENDPATH**/ ?>