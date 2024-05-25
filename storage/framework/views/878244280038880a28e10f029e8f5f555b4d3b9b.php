
<?php $__env->startSection('title', 'Payout - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Instructors Payout';
$data['title'] = 'Instructors';
$data['title1'] = 'Instructors Payout';
$data['title2'] = 'Payout';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">                
  <!-- Start row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header all-user-card-header">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" title="<?php echo e(__('Pending Payout')); ?>"><?php echo e(__('Pending Payout')); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" title="<?php echo e(__('Completed Payout')); ?>"><?php echo e(__('Completed Payout')); ?></a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th><?php echo e(__('Instructor')); ?></th>
                        <th><?php echo e(__('View')); ?></th>
                    
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=0;?>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <?php $i++;?>
                          <td><?php echo $i;?></td>
                          <td><?php echo e($user->fname); ?></td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                              <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                <a class="dropdown-item"  href="<?php echo e(route('admin.pending', $user->id)); ?>" title="<?php echo e(__('Pending Payout')); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__('Pending Payout')); ?></a>
                                <a class="dropdown-item"  href="<?php echo e(route('admin.paid', $user->id)); ?>" title="<?php echo e(__('Complete Payout')); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__('Complete Payout')); ?></a>
                              </div>
                            </div>
                          </td>
                      </tr>  
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th><?php echo e(__('User')); ?></th>
                        <th><?php echo e(__('Payer')); ?></th>
                        <th><?php echo e(__('Pay Total')); ?></th>
                        <th><?php echo e(__('Order Id')); ?></th>
                        <th><?php echo e(__('Pay Status')); ?></th>
                        <th><?php echo e(__('View')); ?></th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=0;?>
                      <?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <?php $i++;?>
                            <td><?php echo $i;?></td>
                            <td><?php echo e($pay->user->fname); ?></td>
                            <td><?php echo e($pay->payer_id); ?></td>
                            <td><i class="fa <?php echo e($pay->currency_icon); ?>"></i> <?php echo e($pay->pay_total); ?></td>
                            <td>
                              <?php $__currentLoopData = $pay->order_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $id= App\Order::find($order);
                                ?>
                                <?php if(isset($id->order_id)): ?><?php echo e($id['order_id']); ?> <?php endif; ?>,
                                
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td>
                              <?php if($pay->pay_status ==1): ?>
                                <?php echo e(__('Recieved')); ?>

                              <?php else: ?>
                                <?php echo e(__('Pending')); ?>

                              <?php endif; ?>
                            </td>

                            <td>
                              <a class="btn btn-primary btn-sm" href="<?php echo e(route('completed.view', $pay->id)); ?>" title="<?php echo e(__('View')); ?>"><?php echo e(__('View')); ?></a>
                            </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- End col -->
  </div>
  <!-- End row -->
</div>        
<?php $__env->stopSection(); ?>                            
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/revenue/index.blade.php ENDPATH**/ ?>