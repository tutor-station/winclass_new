
<?php $__env->startSection('title', 'Coming Soon Page - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Coming Soon Page';
$data['title'] = 'Front Settings';
$data['title'] = 'Coming Soon Page';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <!-- row started -->
    <div class="col-lg-12">
		<div class="card dashboard-card m-b-30">
        	 <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Coming Soon Page')); ?></h5>
                </div> 
               <!-- card body started -->
                <div class="card-body">
                <!-- form for coming soon start -->
				<form action="<?php echo e(action('ComingSoonController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<!-- Heading -->
												<div class="col-md-2">
													<div class="form-group">
														<label class="text-dark"><?php echo e(__('Heading')); ?> : <span class="text-danger">*</span></label>
														<input type="text" value="<?php echo e(optional($comingsoon)->heading); ?>" autofocus="" class="form-control <?php $__errorArgs = ['heading'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Heading')); ?>" name="heading" required="">
														<?php $__errorArgs = ['heading'];
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
													<!-- ButtonText -->
													<div class="col-md-2">
														<div class="form-group">
															<label class="text-dark"><?php echo e(__('Button Text')); ?> : <span class="text-danger">*</span></label>
															<input type="text" value="<?php echo e(optional($comingsoon)->btn_text); ?>" autofocus="" class="form-control <?php $__errorArgs = ['btn_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Button Text')); ?>" name="btn_text" required="">
															<?php $__errorArgs = ['btn_text'];
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
													<div class="col-md-2">
														<div class="form-group">
															<label class="text-dark" for="count_one"><?php echo e(__('Counter One')); ?> <span class="text-danger">*</span></label>
															<input value="<?php echo e(optional($comingsoon)->count_one); ?>" autofocus="" type="text" name="count_one" class="form-control <?php $__errorArgs = ['count_one'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Counter One Value')); ?>" required>
															<?php $__errorArgs = ['count_one'];
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
													<!-- CounterTwo -->
													<div class="col-md-2">
														<div class="form-group">
															<label class="text-dark" for="count_two"><?php echo e(__('Counter Two')); ?> <span class="text-danger">*</span></label>
															<input value="<?php echo e(optional($comingsoon)->count_two); ?>" autofocus="" type="text" name="count_two" class="form-control <?php $__errorArgs = ['count_one'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Counter Two Value')); ?>" required>
														</div>
													</div>
													<!-- CounterThree -->
													<div class="col-md-2">
														<label class="text-dark" for="count_three"><?php echo e(__('Counter Three')); ?> <span class="text-danger">*</span></label>
														<input value="<?php echo e(optional($comingsoon)->count_three); ?>" type="text" name="count_three" class="form-control" placeholder="<?php echo e(__('Enter Counter Three Value')); ?>" required>
													</div>
													<!-- CounterFour -->
													<div class="col-md-2">
														<div class="form-group">
															<label class="text-dark" for="count_four"><?php echo e(__('Counter Four')); ?> <span class="text-danger">*</span></label>
															<input type="text" name="count_four" class="form-control" value="<?php echo e(optional($comingsoon)->count_four); ?>" placeholder="<?php echo e(__('Enter Counter Four Value')); ?>" required/>	
															<?php $__errorArgs = ['count_four'];
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
											</div>
										</div>
									</div>
									<hr>
										<div class="row">
											<!-- CounterOne Text -->
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-dark" for="text_one"><?php echo e(__('Counter One')); ?> <?php echo e(__('Text')); ?> <span class="text-danger">*</span></label>
													<input type="text" name="text_one" class="form-control" value="<?php echo e(optional($comingsoon)->text_one); ?>" placeholder="<?php echo e(__('Enter Counter One Text')); ?>" required/>
													<?php $__errorArgs = ['text_one'];
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
											<!-- CounterTwo Text -->
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-dark" for="text_two"><?php echo e(__('Counter Two')); ?> <?php echo e(__('Text')); ?> <span class="text-danger">*</span></label>
													<input value="<?php echo e(optional($comingsoon)->text_two); ?>" name="text_two" type="text" class="form-control" placeholder="<?php echo e(__('Enter Counter Two Text')); ?>" required/>
													<?php $__errorArgs = ['text_two'];
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
											<!-- CounterThree Text -->
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-dark" for="text_three"><?php echo e(__('Counter Three')); ?> <?php echo e(__('Text')); ?><span class="text-danger">*</span></label>
													<input value="<?php echo e(optional($comingsoon)->text_three); ?>" name="text_three" type="text" class="form-control" placeholder="<?php echo e(__('Enter Counter Three Text')); ?>" required/>
													<?php $__errorArgs = ['text_three'];
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
											<!-- CounterFour Text -->
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-dark" for="text_four"><?php echo e(__('Counter Four')); ?> <?php echo e(__('Text')); ?> <span class="text-danger">*</span></label>
													<input value="<?php echo e(optional($comingsoon)->text_four); ?>" name="text_four" type="text" class="form-control" placeholder="<?php echo e(__('Enter Counter Four Text')); ?>" required/>
													<?php $__errorArgs = ['text_four'];
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
										</div>
									<!-- ============================ -->
									<hr>
										<div class="row">
											<!-- IP Address -->
											<div class="col-md-4">
												<div class="form-group">
													<label class="text-dark" for="url"><?php echo e(__("Enter IP Address to allowed while Maintenance Mode is Enabled (ex: 172.16.254.1)")); ?> <span class="text-danger">*</span></label>
													<select class="select2-multi-select form-control" name="allowed_ip[]" multiple="multiple">													
														<?php if(is_array(optional($comingsoon)->allowed_ip) || is_object(optional($comingsoon)->allowed_ip)): ?> 
															<?php $__currentLoopData = optional($comingsoon)->allowed_ip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($cat); ?>" <?php echo e(in_array($cat, $comingsoon['allowed_ip'] ?: []) ? "selected": ""); ?> ><?php echo e($cat); ?>

															</option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
													</select>
												</div>
											</div>  
											<div class="form-group col-md-3">
												<label class="text-dark" for="exampleInputDetails"><?php echo e(__('Enable Maintenance Mode')); ?> :</label><br>
												<input type="checkbox" class="custom_toggle" name="enable" <?php echo e(optional($comingsoon)['enable'] == '1' ? 'checked' : ''); ?> />
												<input type="hidden"  name="free" value="0" for="status" id="status"><br>
												<small></small>
											</div>
											<!-- image -->
											<div class="form-group col-md-3">
												<label class="text-dark"><?php echo e(__('Image')); ?>:<span class="text-danger">*</span></label><br>
												<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
												</div>
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="inputGroupFile01" name="bg_image" aria-describedby="inputGroupFileAddon01">
													<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose File')); ?></label>
												</div>
												</div>
												<?php if($image = @file_get_contents('../public/images/comingsoon/'.$comingsoon->bg_image)): ?>
												<img src="<?php echo e(url('/images/comingsoon/'.$comingsoon->bg_image)); ?>" class="image_size"/>
												<?php endif; ?>
											</div>											
											<!-- enable -->		
											<div class="col-md-12">
												<div class="form-group">
													<button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
													<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
													<?php echo e(__("Save")); ?></button>
												</div>
											</div>				
										</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- form for comming soon end -->
                </div>
				<!-- card body end -->
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<!-- css for coming soon start -->
<style>
	.image_size{
	    height: 80px;
	    width: 200px;
	}
</style>
<!-- css for coming soon end -->
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/coming_soon/edit.blade.php ENDPATH**/ ?>