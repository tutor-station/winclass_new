
<?php $__env->startSection('title', 'Terms & Condition - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Terms & Condition';
$data['title'] = 'Terms & Condition';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
        <!-- row started -->
    <div class="col-lg-12">
        <?php if($errors->any()): ?>  
        <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:red;">&times;</span></button></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </div>
        <?php endif; ?>
        <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Terms & Condition')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <!-- form start -->
                <form action="<?php echo e(action('TermsController@update')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
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
                                                   
                                                    <!-- Terms&Condition -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Terms&Condition')); ?> : <span class="text-danger">*</span></label>
                                                            <textarea id="detail" name="terms" required=""><?php echo e(optional($items)->terms); ?></textarea>
                                                        </div>
                                                    </div>
                                                                  
                                                    <!-- create and close button -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
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
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/terms/terms.blade.php ENDPATH**/ ?>