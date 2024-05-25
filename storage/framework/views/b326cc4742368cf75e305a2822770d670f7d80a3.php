
<?php $__env->startSection('title', 'Front Theme Color Settings'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Front Theme Color Settings';
$data['title'] = 'Front Theme Settings';
$data['title1'] = 'Front Theme Color Settings';
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
                    <h5 class="card-box"><?php echo e(__('Front Theme Color Settings')); ?></h5>
                    <div>
                        <div class="widgetbar">                           
                            <a href="<?php echo e(route('coloroption.reset')); ?>" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></a>
                          
                                <a href="<?php echo e(url('theme/settings')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                            </div>                        
                      </div>
                </div> 
                <!-- card body started -->
                <div class="card-body">
                 <!-- form start -->
				  <form action="<?php echo e(url('admin/coloroption/update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo csrf_field(); ?>
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
                                                    
                                                    <!-- BlueBackground -->
													
												
                                                    <div class="col-md-3">
													
                                                        <div class="form-group">
															<label class="text-dark" for="blue_bg"><?php echo e(__('Blue Background')); ?>:</label>
															<input name="blue_bg" class="form-control" type="color" value="<?php echo e(optional($color)['blue_bg']); ?>"/>
															
														
                                                        </div>
                                                    </div>

                                                    <!-- image 1 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
															<img src="<?php echo e(url('images/screenshot/18.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- RedBackground -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Red Background')); ?> :</label>
															<input name="red_bg" class="form-control" type="color" value="<?php echo e(optional($color)['red_bg']); ?>"/>
														
                                                        </div>
                                                    </div>

                                                    <!-- image 2 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
															<img src="<?php echo e(url('images/screenshot/19.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Grey Background -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Grey Background')); ?> :</label>
																<input name="grey_bg" class="form-control" type="color" value="<?php echo e(optional($color)['grey_bg']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 3 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
															<img src="<?php echo e(url('images/screenshot/15.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Light Grey Background -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Light Grey Background')); ?> :</label>
															
																<input name="light_grey_bg" class="form-control" type="color" value="<?php echo e(optional($color)['light_grey_bg']); ?>"/>
														
                                                        </div>
                                                    </div>

                                                    <!-- image 4 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
															<img src="<?php echo e(url('images/screenshot/17.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Black Background -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Black Background')); ?> :</label>
															
															<input name="black_bg" class="form-control" type="color" value="<?php echo e(optional($color)['black_bg']); ?>"/>
															
														
                                                        </div>
                                                    </div>

                                                    <!-- image 5 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
															<img src="<?php echo e(url('images/screenshot/16.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- White Background -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('White Background')); ?> :</label>
																<input name="white_bg" class="form-control" type="color" value="<?php echo e(optional($color)['white_bg']); ?>"/>
																
														
                                                        </div>
                                                    </div>

                                                    <!-- image 6 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
															
                                                        </div>
                                                    </div>

													<!-- Deep Red Background -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Deep Red Background')); ?> :</label>
																<input name="dark_red_bg" class="form-control" type="color" value="<?php echo e(optional($color)['dark_red_bg']); ?>"/>
																
															
                                                        </div>
                                                    </div>

                                                    <!-- image 7 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/14.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <hr>
										  <!-- row end -->

										   <!-- row start -->
										   <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												  <div>
                                                  <h5 class="card-title"><?php echo e(__('Text Colors Settings')); ?></h5>
												    </div>
                                                  <div class="row">
                                                    
													<!-- Text Color Background -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Black Text')); ?> :</label>
																<input name="black_text" class="form-control" type="color" value="<?php echo e(optional($color)['black_text']); ?>"/>
														
                                                        </div>
                                                    </div>

                                                    <!-- image 7 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/12.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Light Grey Text -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Light Grey Text')); ?> :</label>
																<input name="light_grey_text" class="form-control" type="color" value="<?php echo e(optional($color)['black_text']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 8 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/11.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Dark Grey Text -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Dark Grey Text')); ?> :</label>
																<input name="dark_grey_text" class="form-control" type="color" value="<?php echo e(optional($color)['dark_grey_text']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 9 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/10.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Red Text -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Red Text')); ?> :</label>
															<input name="red_text" class="form-control" type="color" value="<?php echo e(optional($color)['red_text']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 10 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/9.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Blue Text -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Blue Text')); ?> :</label>
															<input name="blue_text" class="form-control" type="color" value="<?php echo e(optional($color)['blue_text']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 11 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/8.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Dark Blue Text -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Dark Blue Text')); ?> :</label>
															<input name="dark_blue_text" class="form-control" type="color" value="<?php echo e(optional($color)['dark_blue_text']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 12 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/8.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- White Text -->
													<div class="col-md-3">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('White Text')); ?> :</label>
																<input name="white_text" class="form-control" type="color" value="<?php echo e(optional($color)['white_text']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 13 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/6.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>
                                                    

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <hr>
										  <!-- row end -->
											
										     <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <div>
                                                    <h5 class="card-title"><?php echo e(__('Gradient Background Colors Settings')); ?></h5>
													</div>
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
																<input name="linear_bg_one" class="form-control" type="color" value="<?php echo e(optional($color)['linear_bg_one']); ?>"/>
															
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
															<input name="linear_bg_two" class="form-control" type="color" value="<?php echo e(optional($color)['linear_bg_two']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 14 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/6.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>
                                                                  
                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
                                          <hr>
										  <!-- row end -->

                                            <!-- Reverse Background Gradient Color -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title"><?php echo e(__('Reverse Background Gradient Color')); ?></h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
																<input name="linear_reverse_bg_one" class="form-control" type="color" value="<?php echo e(optional($color)['linear_reverse_bg_one']); ?>"/>
															
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
															<input name="linear_reverse_bg_two" class="form-control" type="color" value="<?php echo e(optional($color)['linear_reverse_bg_two']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 15 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/2.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
                                          <hr>
										  <!-- row end -->

                                          <!-- About Gradient Background Color -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title"><?php echo e(__('About Gradient Background Color')); ?></h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
																<input name="linear_about_bg_one" class="form-control" type="color" value="<?php echo e(optional($color)['linear_about_bg_one']); ?>"/>
															
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
															<input name="linear_about_bg_two" class="form-control" type="color" value="<?php echo e(optional($color)['linear_about_bg_two']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 16 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/3.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <!-- row end -->

                                            <!--About Gradient Background Color Two -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title"><?php echo e(__('About Gradient Background Color Two')); ?></h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
															<input name="linear_about_bluebg_one" class="form-control" type="color" value="<?php echo e(optional($color)['linear_about_bluebg_one']); ?>"/>
															
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
																<input name="linear_about_bluebg_two" class="form-control" type="color" value="<?php echo e(optional($color)['linear_about_bluebg_two']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 16 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/4.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
                                          <hr>
										  <!-- row end -->

                                           <!--Career Gradient Background Color -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title"><?php echo e(__('Career Gradient Background Color')); ?></h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
															<input name="linear_career_bg_one" class="form-control" type="color" value="<?php echo e(optional($color)['linear_career_bg_one']); ?>"/>
															
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg"><?php echo e(__('Gradient Background')); ?> :</label>
															<input name="linear_career_bg_two" class="form-control" type="color" value="<?php echo e(optional($color)['linear_career_bg_two']); ?>"/>
															
                                                        </div>
                                                    </div>

                                                    <!-- image 16 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="<?php echo e(url('images/screenshot/5.png')); ?>" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>
                                                                  
                                                    <!-- update and reset button -->
                                                    <div class="col-md-12">
                                                        <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                        <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Update")); ?></button>
                                                    </div>
                                                   

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <!-- row end -->



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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/coloroption/view.blade.php ENDPATH**/ ?>