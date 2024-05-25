
<?php $__env->startSection('title',"Show Report"); ?>
<?php $__env->startSection('content'); ?>
 <section class="main-wrapper finish-main-block">
   <div class="container-xl">
    <br/>
  <?php if($auth): ?>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="">
          <div class="question-block">
           

          <?php if($topics->show_ans==1): ?>
        
          <div class="question-block">
            <h3 class="text-center main-block-heading"><?php echo e(__('Answer Report')); ?></h3>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered result-table">
                <thead>
                  <tr>
                    <th><?php echo e(__('Question')); ?></th> 
                    <th style="color: red;"><?php echo e(__('Your Answer')); ?></th>
                    <th style="color: #48A3C6;"><?php echo e(__('Correct Answer')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  $x = $count_questions;               
                  $y = 1;
                  ?>
                  <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($a->quiz->question); ?></td>
                         <td><?php echo e($a->user_answer); ?></td>
                        <td><?php echo e($a->answer); ?></td>
                       
                      
                      </tr>
                      <?php                
                        $y++;
                        if($y > $x){                 
                          break;
                        }
                      ?>
                   
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                 
                </tbody>
              </table>
            </div>
            
          </div>

          <?php endif; ?>


          <div id="printableArea">


            <h3 class="text-center main-block-heading"><?php echo e(__('Test Analysis')); ?> </h3>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered result-table">
                <thead>
                  <tr><th colspan="4"><?php echo e($topics->title); ?><th></tr>
                  <tr>
                    <th class="text-center"><?php echo e(__('Q. No')); ?></th>
                    <th><?php echo e(__('Questions')); ?></th>
                    <th class="text-center"><?php echo e(__('Student Answer')); ?></th>
                    <th class="text-center"><?php echo e(__('Correct Answer')); ?></th>
                    <th class="text-center"><?php echo e(__('View Solution')); ?></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $i= 1;
// echo '<pre>'; print_r($quiz_answers);exit;
                  foreach($quiz_answers as $key => $value){ ?>
                    <tr>
                    <td><?= $i; ?></td>
                    <td><?= $value->question ?></td>


                    <td class="<?= (strtolower($value->user_answer) == strtolower($value->answer)) ? 'bg-success' : 'bg-danger'; ?>
 text-white text-center"><?= $value->user_answer; ?></td>
                    <td class="text-center"><?= $value->answer; ?></td>

                    <td class="text-center">
                      <?php if($value->solution != ""){ ?>
                        <!-- <button type="button" class="btn btn-sm btn-secondary"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding:8px;"><i class="fa fa-eye" style="margin-left:0px;"></i></button> -->
                        <button type="button" class="btn btn-sm btn-secondary" onclick="showSolution('<?= $value->solution ?>');" style="padding:8px;"><i class="fa fa-eye" style="margin-left:0px;"></i></button>
                      <?php }?>

                    </td>
                    </tr>
                  <?php $i++; } ?>

                </tbody>
              </table>
            </div>
            <br/>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="max-width:800px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Question Solution</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="padding:8px;">Close</button>
                  </div>
                </div>
              </div>
            </div>



           <h3 class="text-center main-block-heading"><?php echo e(__('score card')); ?> </h3>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered result-table">
                <thead>
                  <tr>
                    <th><?php echo e(__('Total Question')); ?></th>
                    <th><?php echo e(__('Correct Questions')); ?></th>
                    <th><?php echo e(__('Per Question Mark')); ?></th>
                    <th><?php echo e(__('Total Marks')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo e($count_questions); ?></td>
                    <td>
                      <?php
                        $mark = 0;
                        $ca=0;
                        $correct = collect();
                      ?>
                      <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(strtolower($answer->user_answer) == strtolower($answer->answer) ): ?>
                        
                          <?php
                            $mark++;
                            $ca++;
                          ?>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e($ca); ?>

                    </td>
                    <td><?php echo e($topics->per_q_mark); ?></td>
                      <?php
                          $correct = $mark*$topics->per_q_mark;
                      ?>
                    <td><?php echo e($correct); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <br/>
            <h2 class="text-center"><?php echo e(__('Thank You')); ?></h2>
          </div>

          

            <div class="finish-btn text-center">
              
              <input type="button" class="btn btn-primary"  onclick="printDiv('printableArea')" value="Print" />

              <?php if($topics->quiz_again == '1'): ?>
              <a href="<?php echo e(route('tryagain',$topics->id)); ?>" class="btn btn-primary"><?php echo e(__('Try Again')); ?> </a>
              <?php endif; ?>
              <a href="<?php echo e(route('course.content',['id' => $topics->course_id, 'slug' => $topics->courses->slug ])); ?>" class="btn btn-secondary"><?php echo e(__('Back')); ?> </a>

              


            </div>

          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
</section>
<br/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-script'); ?>

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
   }

   function showSolution(solution) {
      $('.modal-body').html('<p>'+solution+'</p>');
      $('#exampleModal').modal('show');
   }

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/quiz/finish.blade.php ENDPATH**/ ?>