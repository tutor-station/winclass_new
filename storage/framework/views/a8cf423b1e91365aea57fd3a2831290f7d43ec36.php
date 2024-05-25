
<?php $__env->startSection('title','Quiz Report View'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Quiz Reports';
$data['title'] = 'Reports';
$data['title1'] = 'Quiz Reports';
$data['title1'] = 'Quiz Report View';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
    <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">
                  <h5 class="card-title"><?php echo e(__('Quiz Report View')); ?></h5>
                  <div>
                        <div class="widgetbar">
                            <a href="<?php echo e(url('show/quiz/report')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i
                                    class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                        </div>
                    </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th><?php echo e(__('User')); ?></th>
                              <th><?php echo e(__('Email')); ?></th>          
                              <th><?php echo e(__('Quiz')); ?> </th>
                              <th><?php echo e(__('Marks Get')); ?></th>
                              <th><?php echo e(__('Total Marks')); ?></th>
                              </tr>
                          </thead>
                          <tbody>
                           <?php $__currentLoopData = $quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            
                            $course = App\Course::where('id',$q['course_id'])->first();
                            $user = App\User::where('email',$q['useremail'])->first();
                            $ans = App\QuizAnswer::where('topic_id',$q['topicid'])->where('user_id',$user->id)->get();
                            
                            if(isset($course)){
                                if(Auth::user()->role == "instructor")
                              {
                                $check = $course->user_id == Auth::user()->id;
                              }
                              else{
                                $check = $ans;

                              }
                            }
                            
                            
                            ?>
                           
                            <?php if(isset($check)): ?>
                           
                             <tr>
                              <td><?php echo e($q['fname']); ?> <?php echo e($q['lname']); ?></td>
                              <td><?php echo e($q['useremail']); ?></td>
                              <td><?php echo e($q['topictitle']); ?></td>
                              <td>
                                <?php
                                $mark=0;
                                $correct = collect();
                                  foreach($ans as $answer){
                                    if($answer->type != 1){
                                      if($answer->user_answer == $answer->answer){
                                        $mark++;
                                      }
                                    }else{
                                      if($answer->txt_approved == 1){
                                        $mark++;
                                      }
                                    }
                                  }
                                  $correct = $mark*$q['per_q_mark'];
                                ?>
                                <?php echo e($correct); ?>

                              </td>
                              <td><?php echo e($q['quizquestion_count'] * $q['per_q_mark']); ?></td>
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/report/quizview.blade.php ENDPATH**/ ?>