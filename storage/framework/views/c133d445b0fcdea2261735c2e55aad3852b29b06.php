
<?php $__env->startSection('title', 'Facts - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Facts';
$data['title'] = 'Front Settings';
$data['title1'] = 'Facts';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">   
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>             
  <!-- Start row -->
  <div class="row">
    <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                  <h5 class="card-title"><?php echo e(__('Facts')); ?></h5>
                  <div>
                    <div class="widgetbar">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.factsetting.create')): ?>
                        <a href="<?php echo e(route('fact.create')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Add Fact')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Fact")); ?></a>
                      </div>
                      <?php endif; ?>
                  </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <?php if(Auth::User()->role == "admin"): ?>
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th><?php echo e(__('ID')); ?></th>
                        <th><?php echo e(__('Image')); ?></th>
                        <th><?php echo e(__('Fact')); ?></th>
                        <th><?php echo e(__('Details')); ?></th>
                        <th><?php echo e(__('Number')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                      </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><?php echo e(filter_var($key+1)); ?></td>
                              <td><img src="<?php echo e(asset('images/facts/'.$fact->image)); ?>" class="img-responsive img-circle" ></td>
                              <td><?php echo e($fact->title); ?></td>
                              <td><?php echo e($fact->description); ?></td> 
                              <td><?php echo e($fact->number); ?></td>
                              <td>
                                <?php if( $fact->status == 1): ?>
                                <button type="button" class="btn btn-rounded btn-success-rgba" data-toggle="modal" data-target="#myModal">
                                    <?php echo e(__('Active')); ?>

                                </button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-rounded btn-danger-rgba" data-toggle="modal" data-target="#myModal">
                                    <?php echo e(__('Deactive')); ?>

                                  </button>
                                    <?php endif; ?> 
                              </td>
                              <td>
                                <div class="dropdown">
                                  <button  class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.factsetting.edit')): ?>
                                      <a class="dropdown-item" href="<?php echo e(url('fact/'.$fact->id.'/edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                      <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.factsetting.delete')): ?>
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
                                            <form  method="post" action="<?php echo e(route('fact.destroy', $fact->id)); ?>

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
                              </td>
                              </tr>   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                  </table>
                  <?php endif; ?>               
                </div>
              </div>
          </div>
      </div>
    <!-- End col -->
  </div>
<!-- End row -->
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/facts/index.blade.php ENDPATH**/ ?>