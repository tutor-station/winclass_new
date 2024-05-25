
<?php $__env->startSection('title', 'Involve Request - Instructor'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Involve Request';
$data['title'] = 'Involve Request';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
      <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('Involvement Courses')); ?></h5>
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
                              <th><?php echo e(__('Status')); ?></th>
                              <th><?php echo e(__('Accept')); ?></th>
                              <th><?php echo e(__('Reject')); ?></th>
                           
                            </tr>
                            </thead>
                            <tbody>
                              <?php $__currentLoopData = $involve_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if(isset($item->course->user)): ?>
                              <?php if(Auth::user()->id == $item->course->user->id): ?>
                              <tr>
                                
                                  <td>
                                    <?php if($item->user->user_img != null || $item->user->user_img !=''): ?>
                                      <img src="<?php echo e(asset('images/user_img/'.$item->user->user_img)); ?>" class="img-circle">
                                    <?php else: ?>
                                      <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-responsive img-circle" alt="User Image">
                                    <?php endif; ?>
                                  </td> 
                                  <td><?php echo e($item->user->fname); ?></td>
                                  <td><?php echo e($item->user->email); ?></td>
                                  <td><?php echo e($item->course->title); ?></td>
                                  <td>
                                    <label class="switch">
                                      <input class="involverequest" type="checkbox"  data-id="<?php echo e($item->id); ?>" name="status" <?php echo e($item->status == '1' ? 'checked' : ''); ?>>
                                      <span class="knob"></span>
                                    </label>
                                  </td>
                                  
                                  <td>
                                    <?php if($item->status == 0): ?>
                                      <form  method="post" action="<?php echo e(route('involve.request.edit',$item->id)); ?>

                                          "data-parsley-validate class="form-horizontal form-label-left">
                                          <?php echo e(csrf_field()); ?>

                                        
                                           <button type="submit" class="btn btn-info"><?php echo e(__('Accept')); ?></i></button>
                                      </form>
                                    <?php else: ?>
                                       <b class="text-green"><?php echo e(__('AcceptedByInstructor')); ?> <?php echo e($item->course->user->fname); ?></b>
                                    <?php endif; ?>
                                  </td>
                                 
                                  <td><form  method="post" action="<?php echo e(route('involve.request.destroy',$item->id)); ?>

                                        "data-parsley-validate class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                         <button type="submit" class="btn btn-danger"><?php echo e(__('Reject')); ?></i></button>
                                      </form>
                                  </td>
              
                                
                                 </tr>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
                             
                             
                            </tfoot>
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
    $('.involverequest').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        
        var id = $(this).data('id'); 
        
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo e(url('quickupdate/involvementrequest')); ?>",
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data)
            }
        });
    })
  })
</script>


<?php $__env->stopSection(); ?>
              
                       
                                    
 
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/instructor/involverequest/index.blade.php ENDPATH**/ ?>