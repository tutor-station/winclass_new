
<?php $__env->startSection('title', 'Apply Course - Instructor'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Apply Course';
$data['title'] = 'Apply Course';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
      <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('Apply Course')); ?></h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo e(__('Image')); ?></th>
                              <th><?php echo e(__('Title')); ?></th>
                              <th><?php echo e(__('Instructor')); ?></th>
                              <th><?php echo e(__('Status')); ?></th>
                             <th><?php echo e(__('Edit')); ?></th>
                           
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?>
                               
                                  <?php $__currentLoopData = $involve_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $i++;?>
                                    <tr>
                                      <td><?php echo $i;?></td>
                                      <td>
                                        <?php if($cat->course['preview_image'] != NULL && $cat->course['preview_image'] != ''): ?>
                                            <img src="<?php echo e(url('/images/course/'.$cat->course['preview_image'])); ?>" class="img-responsive img-circle" >
                                        <?php else: ?>
                                            <img src="<?php echo e(Avatar::create($cat->course->title)->toBase64()); ?>" class="img-responsive img-circle" >
                                        <?php endif; ?>
                                      </td>
                                      <td><?php echo e($cat->course->title); ?></td>
                                      <td><?php echo e($cat->user['fname']); ?></td>
                                      <td>
                                        <label class="switch">
                                          <input class="applycourse" type="checkbox"  data-id="<?php echo e($cat->id); ?>" name="status" <?php echo e($cat->status == '1' ? 'checked' : ''); ?>>
                                          <span class="knob"></span>
                                        </label>
                                      </td>
                                      
                                     
                                      <td>
                                        <a class="btn  btn-sm" href="<?php echo e(route('course.show',$cat->course_id)); ?>">
                                          <i class="feather icon-edit mr-2"></i></a>
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
    $('.applycourse').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        
        var id = $(this).data('id'); 
        
        
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo e(url('quickupdate/coursestatus')); ?>",
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data)
            }
        });
    })
  })
</script>


<?php $__env->stopSection(); ?>
              
                       
                                    
                                     
                                      
                                    
                                   
                              
                               
                                
    
              
                               
                              
                
                               
                              

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/instructor/involverequest/applycourse.blade.php ENDPATH**/ ?>