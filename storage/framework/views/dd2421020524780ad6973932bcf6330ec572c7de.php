
<?php $__env->startSection('title','All Private Course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Private Courses';
$data['title'] = 'Courses';
$data['title1'] = 'Private Courses';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
      <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                  <h5 class="card-box"><?php echo e(__('All Private Courses')); ?></h5>
                  <div>
                    <div class="widgetbar">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('private-course.delete')): ?>
                      <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i
                        class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('private-course.create')): ?>
                        <a href="<?php echo e(route('private-course.create')); ?>"  class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Add Private Courses')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Private Course')); ?></a>
                    <?php endif; ?>
                    </div>                        
                </div>
                </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                value="all" />
                            <label for="checkboxAll" class="material-checkbox"></label> #</th>
                              <th><?php echo e(__('Course')); ?></th>
                              <th><?php echo e(__('Status')); ?></th>
                             
                              <th><?php echo e(__('Action')); ?></th>
                            </tr>
                          </thead>
            
                          <tbody>
                            <?php $i=0;?>
                              
                                <?php $__currentLoopData = $private_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php $i++;?>
                                  <tr>
                                    <td> <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                      name='checked[]' value=<?php echo e($course->id); ?> id='checkbox<?php echo e($course->id); ?>'>
                                  <label for='checkbox<?php echo e($course->id); ?>' class='material-checkbox'></label>
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
                                              <p><?php echo e(__('Do you really want to delete selected item names here? This process
                                                  cannot be undone.')); ?></p>
                                          </div>
                                          <div class="modal-footer">
                                              <form id="bulk_delete_form" method="post"
                                                  action="<?php echo e(route('privatecourse.bulk_delete')); ?>">
                                                  <?php echo csrf_field(); ?>
                                                  <?php echo method_field('POST'); ?>
                                                  <button type="reset" class="btn btn-gray translate-y-3"
                                                      data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                  <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div></td>
                                   
                                    <td><?php echo e($course->courses->title); ?></td>
                                   <td>
                                    <label class="switch">
                                      <input class="privatecourse" type="checkbox"  data-id="<?php echo e($course->id); ?>" name="status"  <?php echo e($course->status ==1 ? 'checked' : ''); ?>>
                                      <span class="knob"></span>
                                    </label>
                                    </td>

                                    <td>
                                  
                                      <div class="dropdown">
                                        <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('private-course.edit')): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('private-course.show',$course->id)); ?>}"  title="<?php echo e(__('Edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('private-course.delete')): ?>
                                            <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"  title="<?php echo e(__('Delete')); ?>"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
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
                                                <form  method="post" action="<?php echo e(url('private-course/'.$course->id)); ?>

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
  "use Strict";

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $(function() {
    $(document).on("change",".privatecourse",function() {
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo e(url('quickupdate/privatecourse')); ?>",
            data: {'status': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
            success: function(data){
                var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
            });
                warning.get().click(function() {
                    warning.remove();
                });
            }
        });
    })
   
  })
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/private_course/index.blade.php ENDPATH**/ ?>