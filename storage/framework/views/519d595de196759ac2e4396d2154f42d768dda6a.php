
<?php $__env->startSection('title','Progress Reports'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Progress Reports';
$data['title'] = 'Reports';
$data['title1'] = 'Progress Reports';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
      <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                  <h5 class="card-box"><?php echo e(__('Progress Reports')); ?></h5>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead><th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                      value="all" /> <?php echo e(__('ID')); ?>  </th>
                  <label for="checkboxAll" class="material-checkbox"></label></th>
                  
                    <th><?php echo e(__('User')); ?></th>
                    <th><?php echo e(__('Action')); ?></th>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                            <?php echo e($key+1); ?>

                          </td>
                          <td>
                            <?php if($pro['user_img'] != null && $pro['user_img'] !='' &&  @file_get_contents('../public/images/user_img/'.$pro->user_img)): ?>
                                   
                                <img  src="<?php echo e(url('images/user_img/'.$pro->user_img)); ?>" alt="profilephoto" class="img-responsive img-circle" alt="<?php echo e($pro->fname); ?> <?php echo e($pro->lname); ?>">

                            <?php else: ?>

                               <img  src="<?php echo e(Avatar::create($pro->fname)->toBase64()); ?>" alt="profilephoto" class="img-responsive img-circle" alt="<?php echo e($pro->fname); ?> <?php echo e($pro->lname); ?>">

                            <?php endif; ?>
                            &emsp;
                            <?php echo e($pro->fname); ?> <?php echo e($pro->lname); ?>

                          </td>
                         
                        <td>
                           <div class="btn-group mr-2">
                            <a href="<?php echo e(url('progress/report/'.$pro->id)); ?>" class="btn btn-xs btn-primary-rgba" title="<?php echo e(__('View')); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__('View')); ?></a>
                                  </div>
                      </div>
                    </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startSection('scripts'); ?>

<script>
      $("#checkboxAll").on('click', function () {
  $('input.check').not(this).prop('checked', this.checked);
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/report/progress.blade.php ENDPATH**/ ?>