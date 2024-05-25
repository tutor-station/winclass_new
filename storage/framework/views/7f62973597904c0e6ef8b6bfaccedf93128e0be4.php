
<?php $__env->startSection('title', 'Instructor Plan - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Instructors Plan';
$data['title'] = 'Instructors Plan';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
            <h5 class="box-title"><?php echo e(__('Instructors Plan')); ?></h5>
            <div>
              <div class="widgetbar">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('instructor-plan-subscription.create')): ?>
                <a href="<?php echo e(url('subscription/plan/create')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Add Instructors Plan')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Instructors Plan')); ?></a>
                <?php endif; ?>
              </div>
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('Image')); ?></th>
                  <th><?php echo e(__('Plan Name')); ?></th>
                  <th><?php echo e(__('Status')); ?></th>
                  <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                 
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td class="plan-img">
                          <?php if($plan['preview_image'] !== NULL && $plan['preview_image'] !== ''): ?>
                              <img src="<?php echo e(asset('images/plan/'.$plan['preview_image'])); ?>" class="img-responsive" >
                          <?php else: ?>
                              <img src="<?php echo e(Avatar::create($plan->title)->toBase64()); ?>" class="img-responsive" >
                          <?php endif; ?>
                        </td>
                        <td><?php echo e($plan->title); ?></td>   
                        <td>
                              <?php if($plan->status ==1): ?>
                                <?php echo e(__('Active')); ?>

                              <?php else: ?>
                                <?php echo e(__('Deactive')); ?>

                              <?php endif; ?>
                        </td>
                        <td>
                          <div class="dropdown">
                              <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                              <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('instructor-plan-subscription.edit')): ?>
                                  <a class="dropdown-item" href="<?php echo e(url('subscription/plan/'.$plan->id. '/edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                  <?php endif; ?>
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('instructor-plan-subscription.delete')): ?>

                                  <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm" title="<?php echo e(__('Delete')); ?>"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                  <?php endif; ?>
                                
                              </div>
                          </div>
                        </td>


                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                      <form  method="post" action="<?php echo e(url('subscription/plan/'.$plan->id)); ?>

                                        "data-parsley-validate class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/instructor/plan/index.blade.php ENDPATH**/ ?>