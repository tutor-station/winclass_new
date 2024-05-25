
<?php $__env->startSection('title', 'Advertise - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Advertise';
$data['title'] = 'Dashboard';
$data['title1'] = 'Advertise';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$ads = App\Ads::all();
?>
  <div class="contentbar">                
    <!-- Start row -->
    <div class="row">
      <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('Advertise')); ?></h5>
                </div>
                <div>
                  <div class="widgetbar">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('player-settings.advertise.create')): ?>
                      <a href="<?php echo e(route('ad.create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Advertise")); ?></a>
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('player-settings.advertise.delete')): ?>
                      <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></a>
                      <?php endif; ?>                       
                      <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                  </div>
                                  <div class="modal-footer">
                                      <form method="post" action="<?php echo e(action('AdsController@bulk_delete')); ?>

                                      " id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
                                      <?php echo e(csrf_field()); ?>

                                    
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                      <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                  </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                  </div>                        
                </div>
                <div class="card-body">
                 
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                      
                        <th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                          <label for="checkboxAll" class="material-checkbox"></label>
                          #</th>
                        <th><?php echo e(__("Ad Type")); ?></th>
                        <th><?php echo e(__("Ad Location")); ?></th>
                       
                        <th><?php echo e(__("Action")); ?></th>
                        </thead>
        
                            <tbody>
                              <tr>
                             
                                <?php $i=0; ?>
                                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++ ?>
                  
                                  
                  
                                   <td> <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($ad->id); ?>" id="checkbox<?php echo e($ad->id); ?>">
                                    <label for="checkbox<?php echo e($ad->id); ?>" class="material-checkbox"></label>
                                    <?php echo e($i); ?></td>
                                   <td class="fl"><?php echo e($ad->ad_type); ?></td>
                                   <td class="fl"><?php echo e($ad->ad_location); ?></td>
                                   <td>
                                    <div class="dropdown">
                                        <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                            <a class="dropdown-item"   href="<?php echo e(route('ad.edit',$ad->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                            <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                          
                                        </div>
                                    </div>
                                  </td>
    
                              
                               

                               
                                
                                <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                              <form action="<?php echo e(route('ad.delete',$ad->id)); ?>" method="POST">
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

<?php $__env->startSection('scripts'); ?>
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/advertise/index.blade.php ENDPATH**/ ?>