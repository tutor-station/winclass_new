<!-- form start -->
<form action="<?php echo e(route('icons.update')); ?>" method="POST" enctype="multipart/form-data">
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
                                    <div class="col-md-3">
                                      <div class="form-group">
                                          <label class="text-dark"><?php echo e(__('PWA Icon')); ?> <?php echo e(__('512x512PX')); ?> : <span class="text-danger">*</span> </label>           
                                          <input type="file" name="icon_512" class="form-control" />
                                      </div>
                                  </div>
                                  <div class="col-md-2 well">
                                  <img src="<?php echo e(url('images/icons/icon-512x512.png')); ?>" class="img-responsive img-circle" alt="<?php echo e(__('PWA Icon')); ?>">
                                  </div>
                                   <!-- SplashScreen -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="text-dark"><?php echo e(__('PWA')); ?> <?php echo e(__('Splash Screen')); ?> <?php echo e(__('2048x2732PX')); ?> : <span class="text-danger">*</span> </label>
                                          <input type="file" name="splash_2048" class="form-control" />
                                      </div>
                                  </div>
                                  <div class="col-md-2 well">
                                    <img src="<?php echo e(url('images/icons/splash-2048x2732.png')); ?>" class="img-responsive img-circle" alt="<?php echo e(__('PWA Splash')); ?>">  
                                  </div>
                                  <!-- create and close button -->
                                  <div class="col-md-12">
                                      <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                      <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
                                            <?php echo e(__("Save")); ?></button>
                                    </div>
                                 </div><!-- row end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                  </div><!-- card body end -->
              </div><!-- card end -->
          </div><!-- col end -->
      </div><!-- row end -->
</form>
<?php /**PATH /var/www/html/resources/views/admin/pwasetting/icon.blade.php ENDPATH**/ ?>