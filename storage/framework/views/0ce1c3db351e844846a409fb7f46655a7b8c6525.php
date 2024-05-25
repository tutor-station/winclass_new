
<?php $__env->startSection('title','All Assignments'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'All Assignments';
$data['title'] = 'Courses';
$data['title1'] = 'Assignments';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <div class="row">

    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="box-title"><?php echo e(__('All Assignments')); ?></h5>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>

                  <th>#</th>
                  <th><?php echo e(__('Course')); ?></th>
                  <th><?php echo e(__('View Assignment')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  
                  <td>
                    <p><b><?php echo e(__('course')); ?>:</b> <?php echo e($course['title']); ?></p>

                  </td>
                <td>
                  <a type="button" href="<?php echo e(route('list.assignment',$course->id)); ?>" class="btn btn-rounded btn-primary-rgba" title="<?php echo e(__('View')); ?>"><?php echo e(__('View')); ?></a>

                </td>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End col -->
  </div>
  <!-- End row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/assignment/course.blade.php ENDPATH**/ ?>