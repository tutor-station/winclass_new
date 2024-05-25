
<?php $__env->startSection('title','Enroll a user'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Enroll a User';
$data['title'] = 'Orders';
$data['title1'] = 'Enroll a User';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
      <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
          <div class="card-header">
             <h5 class="card-box"><?php echo e(__('Enroll a User')); ?></h5>
            <div>
                <div class="widgetbar">
                  <a href="<?php echo e(url('order')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
                    class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>  </div>                        
              </div>
            <div class="box-body">
                <div class="form-group">
                    <form id="demo-form2" method="post" action="<?php echo e(route('order.store')); ?>" data-parsley-validate
                        class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <!-- <div class="col-md-4">
                                <label><?php echo e(__('User')); ?><span class="redstar">*</span></label>

                                <input type="hidden" id="enrollUserViewRoute"
                                    value="<?php echo e(route('order.enrolluserview', '')); ?>">
                                <select name="user_id" id="user_id" class="form-control select2"
                                    required>
                                    <option value=""><?php echo e(__('Select User')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            <?php echo e(isset($selectedUser) && $user->id === $selectedUser->id ? 'selected' : ''); ?>

                                            value="<?php echo e($user->id); ?>"><?php echo e($user->fname); ?> <?php echo e($user->lname); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div> -->

                            <div class="col-md-4">
                                <label><?php echo e(__('Mobile')); ?> </label>
                                <input type="text" id="mobile" name="mobile" value="" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label><?php echo e(__('Courses')); ?> </label>
                                <select name="course_id" id="course_id"
                                    class="form-control select2">
                                    <option value=""><?php echo e(__('Select Course')); ?></option>
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- <div class="col-md-4">
                                <label><?php echo e(__('Bundles')); ?></label>
                                <select name="bundle_id" id="bundle_id"
                                    class="form-control select2">
                                    <option value=""><?php echo e(__('Select Bundle')); ?></option>
                                    <?php $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bundle->id); ?>"><?php echo e($bundle->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div> -->
                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" value="Add Slider" class="btn btn-md col-md-2 btn-primary" title="<?php echo e(__('Enroll User')); ?>"><?php echo e(__('Enroll
                                User')); ?></button>
                        </div>
                     </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if(isset($enrolledCourses)  ): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="card-header">
                            <h5 class="card-box"><?php echo e(__('Enrolled Courses')); ?></h5>
                            <div class="box-body">

                                <?php $__currentLoopData = $enrolledCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrolledCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <?php echo e($enrolledCourse['title']); ?>

                                        </div>

                                    </div>
                                    <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($enrolledBundles)  ): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="card-header">
                            <h5 class="card-box"><?php echo e(__('Enrolled Bundles')); ?></h5>
                            <div class="box-body">

                                <?php $__currentLoopData = $enrolledBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrolledBundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo e($enrolledBundle->title); ?>

                                        </div>

                                    </div>
                                    <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(function() {
            $('#user_id').on('change', function(e) {
                var userId = this.value;
                var link = $('#enrollUserViewRoute').val() + '/' + userId;

                top.location.href = link;
            });
        })

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/order/create.blade.php ENDPATH**/ ?>