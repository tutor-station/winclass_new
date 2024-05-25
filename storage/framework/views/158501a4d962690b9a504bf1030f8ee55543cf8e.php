
<?php $__env->startSection('title', 'Feature - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Feature';
$data['title'] = 'Front Settings';
$data['title1'] = 'Feature';
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
                    <h5 class="card-title"><?php echo e(__('Feature')); ?></h5>
                    <div>
                      <div class="widgetbar">
                          <a href="<?php echo e(url('feature/create')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Add Feature')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Feature")); ?></a>
                      </div>                        
                    </div>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              
                            <th>
                              <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                              <label for="checkboxAll" class="material-checkbox"></label>
                               #
                           </th>
                            <th><?php echo e(__('Image')); ?></th>
                            <th><?php echo e(__('Feature')); ?></th>
                            <th><?php echo e(__('Detail')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                           
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?>
                              <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $i++;?>
                              <tr>
                                  <td> 
                                  <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($data->id); ?>" id="checkbox<?php echo e($data->id); ?>">
                                  <label for="checkbox<?php echo e($data->id); ?>" class="material-checkbox"></label>
                                   <?php echo $i;?> 
                                   </td> 
                                <td>
                                  <img src="<?php echo e(asset('images/feature/'.$data->image)); ?>" class="img-responsive img-circle" alt="<?php echo e(__('Image')); ?>" >
                                </td>
                                <td><?php echo e($data->title); ?></td>
                                <td><?php echo e($data->detail); ?></td> 
                               <td>
                                <?php if( $data->status == 1): ?>
                                <button type="button" class="btn btn-rounded btn-success-rgba" data-toggle="modal" data-target="#myModal">
                                    <?php echo e(__('Active')); ?>

                                </button>
                                    <?php else: ?>
                                    <?php echo e(__('Deactivate')); ?>

                                  </button>
                                    <?php endif; ?> 
                               </td>
                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                        <a class="dropdown-item"   href="<?php echo e(route('feature.edit',$data->id)); ?>" title="<?php echo e(__('Edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                        <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm" title="<?php echo e(__('Delete')); ?>"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
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
                                                    <form  method="post" action="<?php echo e(url('feature/'.$data->id)); ?>

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
          </div>
      </div>
      <!-- End col -->
  </div>
  <!-- End row -->
</div>        
<?php $__env->stopSection(); ?>              

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/feature/index.blade.php ENDPATH**/ ?>