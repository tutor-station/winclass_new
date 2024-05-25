
<?php $__env->startSection('title', __('Wallet Transactions - Admin')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Wallet Settings';
$data['title'] = 'Wallet';
$data['title1'] = 'Wallet Settings';
$data['title2'] = 'Wallet Transactions';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content bar start -->
  <div class="contentbar">
    <div class="row">
      <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
          <div class="card-header">
            <h5 class="card-title"><?php echo e(__('Wallet Transactions')); ?></h5>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                  <tr>

                    <th><?php echo e(__("#")); ?></th>
                    <th><?php echo e(__('User')); ?></th>
                    <th><?php echo e(__('Type')); ?></th>
                    <th><?php echo e(__('Amount')); ?></th>
                    <th><?php echo e(__('Payment Gateway')); ?></th>
                    <th><?php echo e(__('Details')); ?></th>
                  </tr>
                </thead>
                <tbody>
                 

                  <?php $__currentLoopData = $wallet_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <tr>
                    <td><?php echo e(++$key); ?></td>
                    <td>
                      <?php if(isset($wallet->user)): ?>
                        <?php echo e(strip_tags($wallet->user->fname)); ?>

                      <?php endif; ?>
                    </td>

                    <td><?php echo e(strip_tags($wallet->type)); ?></td>

                    <td>

                      <?php if($gsetting['currency_swipe'] == 1): ?>

                      <i class="<?php echo e($wallet->currency_icon); ?>"></i><?php echo e(strip_tags($wallet->total_amount)); ?>


                      <?php else: ?>
                      <?php echo e(strip_tags($wallet->total_amount)); ?>


                      <i class="<?php echo e($wallet->currency_icon); ?>"></i>

                      <?php endif; ?>

                    </td>

                    <td><?php echo e(strip_tags($wallet->payment_method)); ?></td>

                    <td><?php echo e(strip_tags($wallet->detail)); ?></td>

                  </tr>
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
<!-- Content bar end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/wallet/transactions.blade.php ENDPATH**/ ?>