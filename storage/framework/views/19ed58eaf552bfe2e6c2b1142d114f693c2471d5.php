
<?php $__env->startSection('title', 'Edit FAQs Students'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit FAQs Students';
$data['title'] = 'FAQs';
$data['title1'] = 'FAQs Students';
$data['title2'] = 'Edit FAQs Students';
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
                    <h5 class="card-box"> <?php echo e(__('Edit FAQs Students')); ?></h5>
                    <div>
                        <div class="widgetbar">
                        <a href="<?php echo e(url('faq')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                        </div>
                      </div>
                </div>
                <!-- card body started -->
                <div class="card-body">
                    <!-- form start -->
            <form action="<?php echo e(url('faq/'.$find->id)); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('PATCH')); ?>

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
                                                    
                                                    <!-- Title -->
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Question')); ?>: <span class="text-danger">*</span></label>
                                                            <input type="text" value="<?php echo e($find->title); ?>" autofocus="" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Question')); ?>" name="title" required="">
                                                            <?php $__errorArgs = ['title'];
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

                                                    <!-- details -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Answer')); ?>: <span class="text-danger">*</span></label>
                                                            <textarea id="detail" name="details" class="<?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Please Enter Answer" required=""><?php echo e($find->details); ?></textarea>
                                                            <?php $__errorArgs = ['details'];
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
                                                    
                                                   <!-- Status -->
                                                   <div class="form-group col-md-2">
                                                        <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Status')); ?> :</label><br>
                                                        <input type="checkbox" class="custom_toggle" name="status" <?php echo e($find->status == '1' ? 'checked' : ''); ?> />
                                                        <input type="hidden"  name="free" value="0" for="status" id="status">
                                                    </div>
                                                                      
                                                    <!-- update and reset button -->
                                                    <div class="col-md-12">
                                                        <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                        <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Update")); ?></button>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/faq/faq_edit.blade.php ENDPATH**/ ?>