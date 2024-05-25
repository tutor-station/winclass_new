
<?php $__env->startSection('title','All Quiz Review'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Quiz Review';
$data['title'] = 'Courses';
$data['title1'] = 'Quiz Review';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar bardashboard-card"> 
  <div class="row">
    <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="box-title"><?php echo e(__('All Quiz Reviews')); ?></h5>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                            <th>#</th>
                  <th><?php echo e(__('Course')); ?></th>
                  <th><?php echo e(__('User Name')); ?></th>
                  <th><?php echo e(__('Topic')); ?></th>
                  <th><?php echo e(__('Question')); ?></th>
                 <th><?php echo e(__('Answer')); ?></th>
                  <th><?php echo e(__('View')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>

                <?php

                    if(Auth::user()->role == "instructor") 
                    {
                      $check = $answer->courses->user_id == Auth::user()->id;
                    }
                    else{
                      $check = $answer->courses;
                    }

                  ?>

                 

                  <?php if($check): ?>

                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo e($answer->courses->title); ?></td>
                    <?php
                      $user = app\User::where('id',$answer->user_id)->first();
                    ?>
                   <td><?php echo e($user->fname); ?> <?php echo e($user->lname); ?></td>
                    <td><?php echo e($answer->topic->title ?? '-'); ?></td> 
                    <?php if(isset($answer->quiz->question)): ?>
                    <td><?php echo $answer->quiz->question; ?></td>
                 <?php endif; ?>
                 <td>-</td>
                    <td><?php echo $answer->txt_answer; ?></td>
                    <td>
                      <label class="switch">
                        <input class="review" type="checkbox"  data-id="<?php echo e($answer->id); ?>" name="txt_approved" <?php echo e($answer->txt_approved == "1" ? 'checked' : ''); ?>>
                        <span class="knob"></span>
                      </label>
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
  </div>
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
    $('.review').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        
        var id = $(this).data('id');
       
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url:"<?php echo e(url('quizreview/approve')); ?>",
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data)
            }
        });
    })
  })
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiz/review/index.blade.php ENDPATH**/ ?>