
<?php $__env->startSection('title','Attendance Report'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Dashboard';
$data['title'] = 'Report';
$data['title1'] = 'Attendance Report';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
    <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                  <h5 class="card-title"><?php echo e(__('Attendance Report')); ?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th><?php echo e(__('User Name')); ?></th>
                              <th><?php echo e(__('Course Name')); ?></th>
                              <th><?php echo e(__('Attendance Date')); ?></th>          
                            </tr>
                          </thead>
                          <tbody>
                            <?php if($data): ?>
                              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($datas->user->fname ?? ''); ?></td>
                                  <td><?php echo e($datas->course->title ?? ''); ?></td>
                                  <td><?php echo e($datas->date ?? ''); ?></td>  
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                            <?php endif; ?>
                          </tbody>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/attandance/report.blade.php ENDPATH**/ ?>