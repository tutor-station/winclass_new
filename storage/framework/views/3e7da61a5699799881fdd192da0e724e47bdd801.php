
<?php $__env->startSection('title','Certificate Report'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Certificates Reports';
$data['title'] = 'Reports';
$data['title1'] = 'Certificates Reports';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
    <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                  <h5 class="card-title"><?php echo e(__('Certificates Reports')); ?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo e(__('User Name')); ?></th>
                              <th><?php echo e(__('Email')); ?></th>
                              <th><?php echo e(__('Course')); ?></th>          
                            </tr>
                          </thead>
                          <tbody>
                            <?php if($progress): ?>
                              <?php $__currentLoopData = $progress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td>
                                    <?php echo e($key+1); ?>

                                  </td>
                                  <td><?php echo e($student->fname); ?></td>
                                  <td><?php echo e($student->email); ?></td>
                                  <td><?php echo e($student->title); ?></td>  
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/certificate/report.blade.php ENDPATH**/ ?>