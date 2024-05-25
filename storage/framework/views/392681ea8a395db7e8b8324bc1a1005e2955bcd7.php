
<?php $__env->startSection('title', 'Instructor Revenue Reports'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Instructor Revenue Reports';
$data['title'] = 'Reports';
$data['title1'] = 'Instructor Revenue Reports';
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
                    <h5 class="card-box"><?php echo e(__('Instructor Revenue Reports')); ?></h5>
                    <div>
                        <div class="widgetbar">
                        <button type="button" class="float-right btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i
                                  class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
                        </div>
                      </div>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <div class="table-responsive">
                        <!-- table to display faq start -->
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <th>
                                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                value="all" />
                                <label for="checkboxAll" class="material-checkbox"></label>   # 
                            </th>
                            <th><?php echo e(__('Enrolled Courses')); ?></th>
                            <th><?php echo e(__('Instructor')); ?></th>
                            <th><?php echo e(__('Total Amount')); ?></th>
                            <th><?php echo e(__('Instructor Revenue')); ?></th>
                            <th><?php echo e(__('Enrolled Date')); ?></th>
                        </thead>

                        <tbody>
                            <?php $i=0;?>
                            <?php $__currentLoopData = $revenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++;?>
                            <tr>
                            <td>
                                                     
                                    <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                        name='checked[]' value=<?php echo e($rev->id); ?> id='checkbox<?php echo e($rev->id); ?>'>
                                    <label for='checkbox<?php echo e($rev->id); ?>' class='material-checkbox'></label>
                                    <?php echo $i; ?>
                                <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                                                <div class="delete-icon"></div>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                                                <p><?php echo e(__('Do you really want to delete selected item ? This process
                                                    cannot be undone.')); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form id="bulk_delete_form" method="post"
                                                    action="<?php echo e(route('instructor.revenue.bulk_delete')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('POST'); ?>
                                                    <button type="reset" class="btn btn-gray translate-y-3"
                                                        data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                    <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                              <td><?php echo e($rev->courses->title); ?></td>
                              <td><?php echo e($rev->courses->user->fname); ?></td>
                              <td>
                              <?php if($gsetting['currency_swipe'] == 1): ?>
                                  <i class="fa <?php echo e($rev['currency_icon']); ?>"></i> <?php echo e($rev->total_amount); ?> 
                              <?php else: ?>
                                  <?php echo e($rev->total_amount); ?> <i class="fa <?php echo e($rev['currency_icon']); ?>"></i>
                              <?php endif; ?>
                              </td>
                              <td>
                              <?php if($gsetting['currency_swipe'] == 1): ?>
                                  <i class="fa <?php echo e($rev['currency_icon']); ?>"></i> <?php echo e($rev->instructor_revenue); ?>

                              <?php else: ?>
                                  <?php echo e($rev->instructor_revenue); ?> <i class="fa <?php echo e($rev['currency_icon']); ?>"></i>
                              <?php endif; ?>
                              </td>
                              <td><?php echo e(date('d-m-Y', strtotime($rev->created_at))); ?></td>

                            </tr> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody>
                        </table>                  
                        <!-- table to display faq data end -->                
                    </div><!-- table-responsive div end -->
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
<script>
    $("#checkboxAll").on('click', function () {
$('input.check').not(this).prop('checked', this.checked);
});
</script>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/revenue/report/instructor.blade.php ENDPATH**/ ?>