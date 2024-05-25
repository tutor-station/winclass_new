
<?php $__env->startSection('title','All Course review'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Course Reviews';
$data['title'] = 'Courses';
$data['title1'] = 'Course Review';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar bardashboard-card"> 
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-box"><?php echo e(__('All Courses Reviews')); ?></h5>
                    </div>
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th><input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                      value="all" />
                                  <label for="checkboxAll" class="material-checkbox"></label> #</th>
                    <th><?php echo e(__('Image')); ?></th>
                    <th><?php echo e(__('Title')); ?></th>
                    <th><?php echo e(__('Instructor')); ?></th>
                    <th><?php echo e(__('Featured')); ?></th>
                    <th><?php echo e(__('Status')); ?></th>
                    <th><?php echo e(__('Action')); ?></th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i=0;?>

                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat->status == 0): ?>
                      <?php $i++;?>
                      <tr>
                        <td>  <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                          name='checked[]' value="<?php echo e($cat->id); ?>" id='checkbox<?php echo e($cat->id); ?>'>
                      <label for='checkbox<?php echo e($cat->id); ?>' class='material-checkbox'></label>
                      <?php echo $i; ?>
                  <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('close')); ?>">&times;</button>
                                  <div class="delete-icon"></div>
                              </div>
                              <div class="modal-body text-center">
                                  <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                                  <p<?php echo e(__('Do you really want to delete selected item names here? This process
                                      cannot be undone')); ?>>.</p>
                              </div>
                              <div class="modal-footer">
                                  <form id="bulk_delete_form" method="post"
                                      action="<?php echo e(route('coursereview.bulk_delete')); ?>">
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
                        <td>
                          <?php if($cat['preview_image'] !== NULL && $cat['preview_image'] !== ''): ?>
                            <img src="images/course/<?php echo $cat['preview_image'];  ?>" class="img-responsive img-circle"  >
                          <?php else: ?>
                            <img src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" class="img-responsive img-circle"  >
                          <?php endif; ?>
                        </td>
                        <td><?php echo e($cat->title); ?></td>
                        <td><?php echo e($cat->user->fname); ?></td>
                        <td>
                          <label class="switch">
                            <input class="coursereviewfeaturedstatus" type="checkbox"  data-id="<?php echo e($cat->id); ?>" name="status"   <?php echo e($cat->featured ==1 ? 'checked' : ''); ?>>
                            <span class="knob"></span>
                          </label>
                          </td>

                          <td>
                            <label class="switch">
                              <input class="coursereviewstatus" type="checkbox"  data-id="<?php echo e($cat->id); ?>" name="status"  <?php echo e($cat->status == '1' ? 'checked' : ''); ?>>
                              <span class="knob"></span>
                            </label>
                            </td>
                            <td>
                          <div class="dropdown">
                              <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                              <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-reviews.edit')): ?>
                                  <a class="dropdown-item" href="<?php echo e(url('coursereview/'.$cat->id)); ?>" title="<?php echo e(__('Edit')); ?>"><i class="feather icon-eye

                                    mr-2"></i><?php echo e(__('Edit')); ?></a>
                                  
                                  </a>
                                  <?php endif; ?>
                              </div>
                          </div>

                          <!-- delete Modal start -->
                         
                          <!-- delete Model ended -->

                      </td>
                      

                       
                      </tr>
                    <?php endif; ?>
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
<?php $__env->startSection('script'); ?>

<!-- script to change status start -->
<script>

"use Strict";

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).on("change",".coursereviewfeaturedstatus",function() { 
      $.ajax({
          type: "POST",
          dataType: "json",
          url: "<?php echo e(url('quickupdate/featured/course')); ?>",
          data: {'featured': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
            success: function(data){
              console.log(data)
          }
        });
    })


   
      $(document).on("change",".coursereviewstatus",function() { 
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "<?php echo e(url('quickupdate/coursestatus')); ?>",
          data:   {'status': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
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
 
</script>
<!-- script to change featured status end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course_review/index.blade.php ENDPATH**/ ?>