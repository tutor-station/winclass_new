
<?php $__env->startSection('title','Edit Quiz-topic'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Quiz-topic';
$data['title'] = 'Quiz-topic';
$data['title1'] = 'Edit Quiz-topic';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Quiz Topic')); ?></h5>
          <div class="widgetbar">
            <a href="<?php echo e(url('course/create/'. $topic->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
            </div>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form2" method="POST" action="<?php echo e(route('quiztopic.update', $topic->id)); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

           <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('QuizTopic')); ?>:<span class="redstar">*</span> </label>
                <input type="text" placeholder="Enter Quiz Topic" class="form-control " name="title" id="exampleInputTitle" value="<?php echo e($topic->title); ?>">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('QuizDescription')); ?>:<sup class="redstar">*</sup></label>
                <textarea name="description" rows="3" class="form-control" placeholder="Enter Description"><?php echo e($topic->description); ?></textarea>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('PerQuestionMarks')); ?>:<span class="redstar">*</span> </label>
                <input type="number" placeholder="Enter Per Question Mark" class="form-control " name="per_q_mark" id="exampleInputTitle" value="<?php echo e($topic->per_q_mark); ?>">
              </div>
            </div>
            <br>


            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('QuizTimer')); ?>:<span class="redstar">*</span> </label>
                <input type="text" placeholder="Enter Quiz Time" class="form-control" name="timer" id="exampleInputTitle" value="<?php echo e($topic->timer); ?>">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Days')); ?>:</label>
                <small>(<?php echo e(__('Days after quiz will start when user enroll in course')); ?>)</small>
                <input type="text" placeholder="Enter Due Days" class="form-control" name="due_days" id="exampleInputTitle" value="<?php echo e($topic->due_days); ?>">
              </div>
            </div>
            <br>


            <div class="row">
                <div class="col-md-4">
                  <label for="exampleInputTit1e"><?php echo e(__('Total Questions')); ?>:<span class="redstar">*</span>
                  </label>
                  <input type="number" placeholder="Total Questions" class="form-control " name="total_question"
                    id="exampleInputTitle" value="<?php echo e($topic->total_question); ?>">
                </div>

                <div class="col-md-8">
                  <label for="exampleInputTit1e"><?php echo e(__('Watch Solution')); ?>:</label>
                  <input type="text" placeholder="Enter Video Link" class="form-control" name="watch_solution"
                    id="exampleInputTitle" value="<?php echo e($topic->watch_solution); ?>">

                </div>

              </div>
              <br>

              <div class="row">
                <div class="col-md-4">
                  <label for="exampleInputDetails"><?php echo e(__('Negative Mark')); ?>:</label><br>
                  <label class="switch">
                      <input class="negative_mark" type="checkbox" name="negative_mark" <?php echo e($topic->negative_mark == '1' ? 'checked' : ''); ?>/>
                      <span class="knob"></span>
                    </label>
                </div>

                <div class="col-md-8">
                  <label for="exampleInputTit1e"><?php echo e(__('Per Question Negative Mark')); ?>:</label>
                  <input type="text" placeholder="Enter Quiz Topic" class="form-control " name="per_q_negative"
                    id="exampleInputTitle" value="<?php echo e($topic->per_q_negative); ?>">
                </div>

              </div>
              <br>
              <br>
              <?php //echo '<pre>'; print_r($topic);exit;?>
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('Pdf With Annotations')); ?>:<span class="redstar">*File Size 10MB</span>
                  </label>
                  <input type="file" placeholder="Pdf With Annotations" class="form-control " name="pdf_with_annotations"
                    id="exampleInputTitle" value="<?php echo e($topic->pdf_with_annotations); ?>">

                    <a target="_blank" href="<?php echo e(url('images/class/pdf_with_annotation/'.$topic->pdf_with_annotations)); ?>"><?php echo e(($topic->pdf_with_annotations != '') ? $topic->pdf_with_annotations : ''); ?></a>
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('Pdf WithOut Annotations')); ?>:<span class="redstar">*File Size 10MB</span>
                  </label>
                  <input type="file" placeholder="Pdf WithOut Annotations" class="form-control " name="pdf_without_annotations"
                    id="exampleInputTitle" value="<?php echo e($topic->pdf_without_annotations); ?>">
                    <a target="_blank" href="<?php echo e(url('images/class/pdf_with_annotation/'.$topic->pdf_without_annotations)); ?>"><?php echo e(($topic->pdf_without_annotations != '') ? $topic->pdf_without_annotations : ''); ?></a>
                </div>
              </div>
              <br>
              <br>


            <div class="row">
              <div class="col-md-3">
                  <label for="exampleInputTit1e"><?php echo e(__('Status')); ?> :</label><br>
                    <label class="switch">
                    <input class="slider" type="checkbox" name="status" <?php echo e($topic->status == '1' ? 'checked' : ''); ?> />
                    <span class="knob"></span>
                  </label>
              </div>

              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('QuizReattempt')); ?> :</label><br>
                  <label class="switch">
                    <input class="slider" type="checkbox" name="quiz_again" <?php echo e($topic->quiz_again == '1' ? 'checked' : ''); ?> />
                    <span class="knob"></span>
                  </label>
              </div>

              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('Quiz Type')); ?> :</label><br>
                  <label class="switch">
                    <input class="slider" type="checkbox" name="type" <?php echo e($topic->type == '1' ? 'checked' : ''); ?> />
                    <span class="knob"></span>
                  </label>
              </div>

              <div class="col-md-3">
                      <label for="exampleInputDetails"><?php echo e(__('Free/Paid')); ?>:</label><br>
                      <label class="switch">
                      <input class="slider" type="checkbox" name="quiz_type" <?php echo e($topic->quiz_type == '1' ? 'checked' : ''); ?> />
                      <span class="knob"></span>
                      </label>
                    </div>
            </div>
            <br>
    
            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                <?php echo e(__('Update')); ?></button>
            </div>
            <div class="clear-both"></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiztopic/edit.blade.php ENDPATH**/ ?>