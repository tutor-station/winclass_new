
<?php $__env->startSection('title','Report'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Report';
$data['title'] = 'Report';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
    <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                  <h5 class="card-title"><?php echo e(__('All Report')); ?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo e(__('User')); ?></th>
                              <th><?php echo e(__('Email')); ?></th>          
                              <th><?php echo e(__('Quiz')); ?></th>
                              <th><?php echo e(__('Marks Get')); ?></th>
                              <th><?php echo e(__('Total Marks')); ?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if($ans): ?>
                              <?php $__currentLoopData = $filtStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td>
                                    <?php echo e($key+1); ?>

                                  </td>
                                  <td><?php echo e($student->fname); ?></td>
                                  <td><?php echo e($student->email); ?></td>               
                                  <td><?php echo e($topics->title); ?></td>
                                  <td>
                                    <?php
                                      $mark = 0;
                                      $correct = collect();
                                    ?>
                                    <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($answer->user_id == $student->id && $answer->answer == $answer->user_answer): ?>
                                        <?php
                                         $mark++;
                                        ?>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                      $correct = $mark*$topics->per_q_mark;
                                    ?>
                                    <?php echo e($correct); ?>

                                  </td>
                                  <td>
                                    <?php echo e($c_que*$topics->per_q_mark); ?>

                                  </td>
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiztopic/report.blade.php ENDPATH**/ ?>