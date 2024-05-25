
<?php $__env->startSection('title', 'Homepage Setting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Homepage Setting';
$data['title'] = 'Homepage Setting';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-danger">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Homepage Setting')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form" action="<?php echo e(route('homepage.update')); ?>" method="POST" novalidate
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Fact Setting')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch1" name="fact_enable" <?php echo e($hsetting->fact_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Discounted Courses')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch2" name="discount_enable"  <?php echo e($hsetting->discount_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Purchased Courses')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                         <input type="checkbox" class="custom_toggle" id="customSwitch3" name="purchase_enable" <?php echo e($hsetting->purchase_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Recently Added')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch4" name="recentcourse_enable" <?php echo e($hsetting->recentcourse_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Featured Courses')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch5" name="featured_enable" <?php echo e($hsetting->featured_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Bundle Courses')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch6" name="bundle_enable" <?php echo e($hsetting->bundle_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Best Selling Courses')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch7" name="bestselling_enable" <?php echo e($hsetting->bestselling_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Featured Instructor')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch8" name="batch_enable" <?php echo e($hsetting->batch_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Live Meetings')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch9" name="livemeetings_enable" <?php echo e($hsetting->livemeetings_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Blogs')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch10" name="blog_enable" <?php echo e($hsetting->blog_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Became an Instructor')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch11" name="became_enable" <?php echo e($hsetting->became_enable == 1 ? 'checked' : ''); ?> />\
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Featured Categories')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch12" name="featuredcategories_enable" <?php echo e($hsetting->featuredcategories_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Testimonial')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch13" name="testimonial_enable" <?php echo e($hsetting->testimonial_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Video Setting')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch14" name="video_enable" <?php echo e($hsetting->video_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Instructor')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch15" name="instructor_enable" <?php echo e($hsetting->instructor_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Trusted by Companies')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch16" name="trusted_enable" <?php echo e($hsetting->trusted_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('newsletter')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch17" name="newsletter_enable" <?php echo e($hsetting->newsletter_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Discount Badges')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch18" name="discount_badget_enable" <?php echo e($hsetting->discount_badget_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Institute')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch18" name="institute_enable" <?php echo e($hsetting->institute_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Get Started')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch18" name="get_enable" <?php echo e($hsetting->get_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Service Enable')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch18" name="service_enable" <?php echo e($hsetting->service_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-dark"><?php echo e(__('Feature Enable')); ?> :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="checkbox" class="custom_toggle" id="customSwitch18" name="feature_enable" <?php echo e($hsetting->feature_enable == 1 ? 'checked' : ''); ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i>
                        <?php echo e(__("Reset")); ?></button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                        <?php echo e(__("Update")); ?></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/homepage/setting.blade.php ENDPATH**/ ?>