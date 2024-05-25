
<?php $__env->startSection('title','Edit Question'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit Question';
$data['title'] = 'Question';
$data['title1'] = 'Edit Question';
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
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Question')); ?></h5>
          <div class="widgetbar">
            <a href="<?php echo e(url('AllQuestions')); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
            </div>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form2" method="post" action="<?php echo e(route('assignQuestions.update')); ?>" data-parsley-validate
                class="form-horizontal form-label-left" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

  
                <input type="hidden" value="Objective" name="data_type" class="data_type">
                <input type="hidden" value="<?= $id ?>" name="question_id" >
  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <label for="exampleInputTit1e"><?php echo e(__('Question')); ?></label>
                        <textarea name="question" rows="6" class="form-control" placeholder="Enter Your Question"><?= $editquizes->question ?></textarea>
                        <br>
                      </div>
                      <br>

                      <div class="col-md-12">
                        <label for="exampleInputDetails"><?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
                        <div class="objectivetype">
                          <select style="width: 100%" name="answer" class="form-control select2">
                            <option value="none" selected disabled hidden> <?php echo e(__('SelectanOption')); ?> </option>
                            <option value="A" <?= ($editquizes->answer == 'a') ? 'selected' : "" ?>><?php echo e(__('A')); ?></option>
                            <option value="B" <?= ($editquizes->answer == 'b') ? 'selected' : "" ?>><?php echo e(__('B')); ?></option>
                            <option value="C" <?= ($editquizes->answer == 'c') ? 'selected' : "" ?>><?php echo e(__('C')); ?></option>
                            <option value="D" <?= ($editquizes->answer == 'd') ? 'selected' : "" ?>><?php echo e(__('D')); ?></option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="col-md-12">
                        <h4 class="extras-heading"><?php echo e(__('Video And Image For Question')); ?></h4>
                        <div class="form-group<?php echo e($errors->has('question_video_link') ? ' has-error' : ''); ?>">
                          <label for="exampleInputDetails"><?php echo e(__('Add Video To Question')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="question_video_link" class="form-control" placeholder="https://myvideolink.com/embed/.." value="<?= $editquizes->question_video_link ?>" />
                          <small class="text-danger"><?php echo e($errors->first('question_video_link')); ?></small>
                          <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__('Back')); ?><?php echo e(__('YouTube And Vimeo Video Support')); ?> (Only Embed Code Link)</small>
                        </div>
                        <div class="form-group">
                          <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Image')); ?>: </label>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Back')); ?><?php echo e(__('Upload')); ?></span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="question_img" class="custom-file-input" id="question_img" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Back')); ?><?php echo e(__('Choose file')); ?></label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="objectivetype">
                        <div class="col-md-6">
                    
                          <label for="exampleInputDetails"><?php echo e(__('A Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="a" class="form-control" placeholder="Enter Option A" value="<?= $editquizes->a ?>" >
                        </div>

                        <div class="col-md-6">
                          <label for="exampleInputDetails"><?php echo e(__('B Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="b" class="form-control" placeholder="Enter Option B" value="<?= $editquizes->b ?>" />
                        </div>

                        <div class="col-md-6">

                          <label for="exampleInputDetails"><?php echo e(__('C Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="c" class="form-control" placeholder="Enter Option C" value="<?= $editquizes->c ?>" />
                        </div>

                        <div class="col-md-6">

                          <label for="exampleInputDetails"><?php echo e(__('D Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="d" class="form-control" placeholder="Enter Option D" value="<?= $editquizes->d ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">           
                    <div class="form-group">
                      <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Back')); ?><?php echo e(__('Reset')); ?></button>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                        <?php echo e(__('Back')); ?><?php echo e(__('Create')); ?></button>
                    </div>
                  </div>
                  <div class="clear-both"></div>               
              </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiz/editQuestion.blade.php ENDPATH**/ ?>