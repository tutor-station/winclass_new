
<?php $__env->startSection('title', 'View All Request Course - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'View All Course Involve Request';
$data['title'] = 'View All Course Involve Request';

?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
      <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('View All Course Involve Request')); ?></h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo e(__('Image')); ?></th>
                              <th><?php echo e(__('Title')); ?></th>
                              <th><?php echo e(__('Slug')); ?></th>
                              <th><?php echo e(__('Featured')); ?></th>
                              <th><?php echo e(__('Status')); ?></th>
                              <th><?php echo e(__('Edit')); ?></th>
                           
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?>
                                <?php if(Auth::User()->role == "admin" || Auth::User()->role == "instructor"): ?>
                                  <?php $__currentLoopData = $all_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $i++;?>
                                    <tr>
                                      <td><?php echo $i;?></td>
                                      <td>
                                        <?php if($cat['preview_image'] != NULL && $cat['preview_image'] != ''): ?>
                                            <img src="<?php echo e(asset('images/course/'.$cat['preview_image'])); ?>" class="img-responsive img-circle" >
                                        <?php else: ?>
                                            <img src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" class="img-responsive img-circle" >
                                        <?php endif; ?>
                                      </td>
                                      <td><?php echo e($cat->title); ?></td>
                                      <td><?php echo e($cat->slug); ?></td>
                                      <td>
                                        <label class="switch">
                                          <input class="featured" type="checkbox"  data-id="<?php echo e($cat->id); ?>" name="featured" <?php echo e($cat->featured == '1' ? 'checked' : ''); ?>>
                                          <span class="knob"></span>
                                        </label>
                                      </td>
                                      <td>
                                        <label class="switch">
                                          <input class="status" type="checkbox"  data-id="<?php echo e($cat->id); ?>" name="status" <?php echo e($cat->status == '1' ? 'checked' : ''); ?>>
                                          <span class="knob"></span>
                                        </label>
                                      </td>

                                      
                                      <td>
              
                                       <?php
                                        $involvement = App\Involvement::where('course_id', $cat->id)->where('user_id', Auth::user()->id)->first();
                                      ?>
                                      <?php if(isset($involvement)): ?>

                                          <?php if($involvement->user_id == Auth::user()->id && $cat->id == $involvement->course_id): ?>
                                           
                                              <?php echo e(__('AlreadyRequest')); ?>

                                            <?php else: ?>
                                            
                                           
                                              <a class="btn-sm" type="button" data-toggle="modal" data-target="#involverequest<?php echo e($cat->id); ?>">
                                                <i class="feather icon-edit mr-2"></i></a>
              
                                           
                                            <div class="modal" id="involverequest<?php echo e($cat->id); ?>">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
              
                                                  
                                                  <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo e(__('Involve Request for Instructor')); ?> </h4>
                                                    <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('close')); ?>">&times;</button>
                                                  </div>
              
                                                 
                                                  <div class="modal-body">
                                                    <form action="<?php echo e(route('involve.store',$cat->id)); ?>" method="post">
                                                      <?php echo csrf_field(); ?>
                                                      <div class="row">
                                                        <input type="hidden" name="course_id" value="<?php echo e($cat->id); ?>">
                                                        <div class="col-sm-12" >
                                                          <label for="instructor"><?php echo e(__('Instructor')); ?>: <sup class="redstar">*</sup></label>
                                                          <?php if(Auth::user()->role == 'admin'): ?>
                                                          <select class="form-control select2-single form-control" name="instructor_id">
                                                            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->fname); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          </select>
                                                          <?php else: ?>
                                                            <select class="form-control select2-single form-control" name="instructor_id">
                                                              
                                                                <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?></option>
                                                             
                                                            </select>
                                                          <?php endif; ?>
                                                        </div>
                                                        <div class="col-sm-12 mt-3">
                                                          <label for="reason"><?php echo e(__('Reason')); ?>: <sup class="redstar">*</sup></label>
                                                         
                                                          <textarea class="form-control" name="reason" id="" cols="30" rows="5" placeholder="Please enter reason for involvement request"></textarea>
                                                        </div>
                                                        
                                                      </div>
                                                      <div class="form-group mt-3">
                                                        <button type="reset" class="btn btn-danger mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                        <button type="submit" class="btn btn-primary" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                                        <?php echo e(__("Update")); ?></button>
                                                      </div>
                                                    </form>
                                                  </div>
              
                                                </div>
                                              </div>
                                            </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                           
                                        
                                      <a class="btn-sm" type="button" data-toggle="modal" data-target="#involverequest<?php echo e($cat->id); ?>">
                                        <i class="feather icon-edit mr-2"></i></a>              
                                       
                                        <div class="modal" id="involverequest<?php echo e($cat->id); ?>">
                                          <div class="modal-dialog">
                                            <div class="modal-content">              
                                              
                                              <div class="modal-header">
                                                <h4 class="modal-title"><?php echo e(__('Involve Request for Instructor')); ?> </h4>
                                                <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                                              </div>
              
                                             
                                              <div class="modal-body">
                                                <form action="<?php echo e(route('involve.store',$cat->id)); ?>" method="post">
                                                  <?php echo csrf_field(); ?>
                                                  <div class="row">
                                                    <input type="hidden" name="course_id" value="<?php echo e($cat->id); ?>">
                                                    <div class="col-md-12" >
                                                      <label for="instructor"><?php echo e(__('Instructor')); ?>: <sup class="redstar">*</sup></label>
                                                      <?php if(Auth::user()->role == 'admin'): ?>
                                                      <select class="form-control select2-single form-control" name="instructor_id">
                                                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->fname); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </select>
                                                      <?php else: ?>
                                                        <select class="form-control select2-single form-control" name="instructor_id">
                                                          
                                                            <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?></option>
                                                         
                                                        </select>
                                                      <?php endif; ?>
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                      <label for="reason"><?php echo e(__('Reason')); ?>: <sup class="redstar">*</sup></label>                                                     
                                                      <textarea class="form-control" name="reason" id="" cols="30" rows="5" placeholder="Please enter reason for involvement request"></textarea>
                                                    </div>
                                                    
                                                  </div>
                                                  <div class="form-group mt-3">
                                                    <button type="reset" class="btn btn-danger mr-1" title="<?php echo e(__('Reset')); ?>"
><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                                                    <button type="submit" class="btn btn-primary" title="<?php echo e(__('Update')); ?>"
><i class="fa fa-check-circle"></i>
                                                    <?php echo e(__('Update')); ?></button>
                                                  </div>
                                      
                                                </form>
                                              </div>
              
                                            </div>
                                          </div>
                                        </div>
                                      <?php endif; ?>
                                      </td>
                                     
                                      
                                     
                                    </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                                <?php endif; ?>
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
    $('.featured').change(function() {
        var featured = $(this).prop('checked') == true ? 1 : 0; 
        
        var id = $(this).data('id'); 
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo e(url('quickudate/course')); ?>",
            data: {'featured': featured, 'id': id},
            success: function(data){
              console.log(data)
            }
        });
    })
  })

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 
  $(function() {
    $('.coursestatus').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        
        var id = $(this).data('id'); 
        
        
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo e(url('quickupdate/coursestatus')); ?>",
            data: {'status': status, 'id': id},
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
                                    
                                     

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/requestinvolve/index.blade.php ENDPATH**/ ?>