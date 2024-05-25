<div class="row">
    <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header all-user-card-header">
                  <h5 class="card-title"><?php echo e(__('All Refund Order')); ?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                          <thead>
                          <tr>
                              <th>#</th>                  
                              <th><?php echo e(__('User')); ?></th>
                              <th><?php echo e(__('Course')); ?></th>
                              <th><?php echo e(__('Order ID')); ?></th>
                              <th><?php echo e(__('Payment Method')); ?></th>
                              <th><?php echo e(__('Status')); ?></th>
                              <th><?php echo e(__('Action')); ?></th>
                              
                          </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                          <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($refund->user['fname']); ?></td>
                            <td><?php echo e($refund->courses->title); ?></td>
                            <td><?php echo e($refund->order->order_id); ?></td>
                            <td><?php echo e($refund->payment_method); ?></td>
                            <td>
                               
                                <?php if($refund->status ==1): ?>
                                <?php echo e(__('Refunded')); ?>

                                <?php else: ?>
                                <?php echo e(__('Pending')); ?>

                                <?php endif; ?>
                                 
                            </td>
                            <td>
                            <div class="dropdown">
                              <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                              <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                  <a class="dropdown-item" href="<?php echo e(url('refundorder/'.$refund->id.'/edit')); ?>" title="<?php echo e(__('View')); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__('View')); ?></a>
                                  <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($refund->id); ?>" title="<?php echo e(__('Delete')); ?>">
                                      <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                  </a>
                              </div>
                          </div>

                          <!-- delete Modal start -->
                          <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($refund->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                              <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                              <p><?php echo e(__('Do you really want to delete')); ?> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                                      </div>
                                      <div class="modal-footer">
                                          <form method="post" action="<?php echo e(url('refundorder/'.$refund->id)); ?>" class="pull-right">
                                              <?php echo e(csrf_field()); ?>

                                              <?php echo e(method_field("DELETE")); ?>

                                              <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                              <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                                          </form>
                                      </div>
                                  </div>
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
      </div>
      <!-- End col -->
  </div>
<!-- End row -->
</div><?php /**PATH /var/www/html/resources/views/admin/refund_order/index.blade.php ENDPATH**/ ?>