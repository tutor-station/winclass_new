

<?php $__env->startSection('title',"Start Quiz"); ?>

<?php $__env->startSection('content'); ?>
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="container-xl pt-5 ">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bredcrumb-dtl">
                      <?php if($topic): ?>
                      <h1 class="wishlist-home-heading"><?php echo e($topic->title); ?></h1>
                      <?php endif; ?> 
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
 <section class="quiz-main-block quiz-main-block-two">
   <div class="container-xl">

    <?php if($topic->timer != NULL): ?>
    <div class="text-center">
        <body onload="countdown();"> 
          <div style="border: none; font-size: 16px; font-weight: bold; color: black; background: transparent;"> 
              <?php echo e(__('Quiz Timer')); ?>

            <input id="minutes" type="text" style="width: 25px; border: none; font-size: 16px;  font-weight: bold; color: black; background: transparent;" >
                <font size="5"> : </font> 
            <input id="seconds" type="text" style="width: 100px; border: none; font-size: 16px;  font-weight: bold; color: black; background: transparent;"> 
          </div>
      </body> 
    </div>
    <?php endif; ?>

   
  

    <?php if(Auth::check()): ?>
      <div class="container-xl border mb-5" style="height:100%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;">
        <?php 

        // print_r($que);exit;

        $users =  App\QuizAnswer::where('topic_id',$topic->id)->where('user_id',Auth::user()->id)->first();
        // $que =  App\Quiz::where('topic_id',$topic->id)->get();

        $que = DB::table('questions_trans')
                        ->join('quiz_questions', 'quiz_questions.id', '=', 'questions_trans.question_id')
                        ->select('quiz_questions.*', 'questions_trans.id as question_trans_id')
                        ->where('questions_trans.topic_id', $topic->id)
                        ->get();
                
        $que_count = $que->count();

        // $que_count =  App\Quiz::where('topic_id',$topic->id)->count();
        ?>

        <?php if($que->isEmpty()): ?>
        <div class="alert alert-danger">
          <?php echo e(__('No Questions in this quiz')); ?>

        </div>

        <?php else: ?>

        <?php if(!empty($users)): ?>
          <div class="alert alert-danger">
              <?php echo e(__('You have already Given the test ! Try to give other Quizes')); ?>

          </div>
        <?php else: ?>

        <div id="question_block" class="question-block">
        <div class="question "  id="question-div" >
           
        <form action="<?php echo e(route('start.quiz.store',$topic->id)); ?>" method="POST" id="question-form">
          <?php echo e(csrf_field()); ?>

            <?php $count=1; ?>
                  
              <?php $__currentLoopData = $que; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $equestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <?php if($key>=0): ?>
              <?php $array = get_object_vars($equestion);  ?>
              
              <div style="display: none;" id="more_quiz<?php echo e($key); ?>">
                
                <div>
                 <span id="quizNumber"><?php echo e($count); ?></span><span>/<?php echo e($que_count); ?></span>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <div class="jumbotron" id="quiz<?php echo e($key+1); ?>" >
                        <h4 style="color:black;">Q<?php echo e($count); ?>.&emsp;<?php echo e($array['question']); ?></h4><br>
                        <input type="hidden" id="question_id[<?php echo e($count); ?>]" name="question_id[<?php echo e($count); ?>]" value="<?php echo e($array['id']); ?>">
                        
                        <input type="hidden" id="canswer-><?php echo e($count); ?>" name="canswer[<?php echo e($count); ?>]" value="<?php echo e($array['answer']); ?>">
                        
                        <label class="radio">
                           <input type="radio" class="q_answer" required name="answer[<?php echo e($count); ?>]" value="A"> <?php echo e($array['a']); ?>

                        </label><br><br>
                        <label class="radio">
                           <input type="radio" class="q_answer" required name="answer[<?php echo e($count); ?>]" value="B"> <?php echo e($array['b']); ?>

                        </label><br><br>
                        <label class="radio">
                           <input type="radio" class="q_answer" required name="answer[<?php echo e($count); ?>]" value="C"> <?php echo e($array['c']); ?>

                        </label><br><br>
                        <label class="radio">
                           <input type="radio" class="q_answer" required name="answer[<?php echo e($count); ?>]" value="D"> <?php echo e($array['d']); ?>

                        </label><br><br>
                         <br>
                      </div>
                    </div>

                    <div class="col-lg-4">
                       <div class="quiz-tabs">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                              <?php if(isset($array['question_video_link'])): ?>
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo e(__('Video')); ?></a>
                              </li>
                              <?php endif; ?>

                              <?php if(isset($array['question_img'])): ?>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile<?php echo e($array['id']); ?>" role="tab" aria-controls="profile" aria-selected="false"><?php echo e(__('Image')); ?></a>
                              </li>
                              <?php endif; ?>

                            </ul>

                            <div class="tab-content" id="myTabContent">
                              <?php if(isset($array['question_video_link'])): ?>
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 95.25%;">
                                  <iframe src="<?php echo e($array['question_video_link'].'?modestbranding=1'); ?>" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media">
                                  
                                  </iframe>
                                </div>

                              </div>
                              <?php endif; ?>

                              <?php if(isset($array['question_img'])): ?>

                              <div class="tab-pane fade" id="profile<?php echo e($array['id']); ?>" role="tabpanel" aria-labelledby="profile-tab">
                                <img src="<?php echo e(asset('images/quiz/'.$array['question_img'])); ?>" class=" img-fluid" alt="">
                              </div>

                              <?php endif; ?>

                           

                         </div>
                       </div>
                    </div>
                  </div>
                </div>
              
                <?php endif; ?>

                <?php $count++; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <button style="display: none;" id="prev" title="<?php echo e(__('Click to see previous question')); ?>" class="btn btn-md btn-primary mb-5" value="1"><< <?php echo e(__('Prev')); ?></button>
              <?php if($que_count >1): ?>
              <button title="<?php echo e(__('Click to see next question')); ?>" id="next" class="pull-right btn btn-md btn-primary mb-5" value="0"><?php echo e(__('Next')); ?> >></button>
              <?php else: ?>
              <button title="Finish the quiz" type="submit" class="btn btn-md btn-primary mb-5"><?php echo e(__('Finish')); ?></button>
              <?php endif; ?>
                
          </form>
          
     </div>
        </div>
        <?php endif; ?>
        
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  
</section>
  <!-- jQuery 3 -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>


  <script type="text/javascript">

    var totalques = 0;

    
    $(document).ready(function(){
        
         totalques = $('.jumbotron').length;

    });

     
    
     var i =1;

     $('#next').click(function(){

      var x = $('#next').val();
      var y = $('#prev').val();
      
      i++;

        $('#prev').show();

        x++ ;
        if(x<totalques){

          $('#more_quiz'+x).show('fast');
          var z = x-1;
          $('#more_quiz'+z).hide('fast');

          $('#next').val(x);
          $('#prev').val(x);

          if(i== totalques){
            $('#next').attr('type','submit');
            $('#next').text('Finish');
          }
          

        }else{
          
          //code
         
        }
          
          
    });

     $('#prev').click(function(){

      i--;

      var x = $('#next').val();
      var y = $('#prev').val();

      $('#next').removeAttr('type');
      $('#next').text('Next >>');


        $('#next').show();

        y--;
        
        if(y==0){
          $('#next').val(0);
          $('#prev').val(1);
          $('#prev').hide();
        }else{
          $('#next').val(y);
          $('#prev').val(y);
        }

        $('#more_quiz'+y).show('fast');
        $('#more_quiz'+x).hide();
                
          
    });


  </script>


  <?php if($topic->timer != NULL): ?>

  <script> 
    //set minutes 
    var mins = <?php echo e($topic->timer); ?>; 

    //calculate the seconds 
    var secs = mins * 60; 

    //countdown function is evoked when page is loaded 
    function countdown() { 
        setTimeout('Decrement()', 60); 
    } 

    //Decrement function decrement the value. 
    function Decrement() { 
    if (document.getElementById) { 
        minutes = document.getElementById("minutes"); 
        seconds = document.getElementById("seconds"); 

        //if less than a minute remaining 
        //Display only seconds value. 
        if (seconds < 59) { 
            seconds.value = secs; 
        } 

        //Display both minutes and seconds 
        //getminutes and getseconds is used to 
        //get minutes and seconds 
        else { 
            minutes.value = getminutes(); 
            seconds.value = getseconds(); 
        } 
        //if seconds becomes zero, 
        //then page alert time up 
        if (mins < 0) { 
            //alert('time up'); 

            let count = $('.q_answer:checked').length;

            if(count == 0){
              $('#question-form').hide();
              // alert('You have not attempted any question !');
              window.location.href='<?php echo e(route('course.content',['id' => $topic->courses->id, 'slug' => $topic->courses->slug ])); ?>';
              // return false;
            }


            $('#question-form').submit();
            

            minutes.value = 0; 
            seconds.value = 0; 

            
        } 
        //if seconds > 0 then seconds is decremented 
        else { 
            secs--; 
            setTimeout('Decrement()', 1000); 
        } 
      } 
    } 

    function getminutes() { 
        //minutes is seconds divided by 60, rounded down 
        mins = Math.floor(secs / 60); 
        return mins; 
    } 

    function getseconds() { 
        //take minutes remaining (as seconds) away  
        //from total seconds remaining 
        return secs - Math.round(mins * 60); 
    } 
  </script>

<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/quiz/main_quiz.blade.php ENDPATH**/ ?>