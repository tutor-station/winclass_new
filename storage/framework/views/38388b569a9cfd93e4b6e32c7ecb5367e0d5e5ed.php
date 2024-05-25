
<?php $__env->startSection('title','Edit Coursechapter'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit Coursechapter';
$data['title'] = 'Edit Coursechapter';
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
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Course Chapter')); ?></h5>
          <div class="widgetbar">
            <a href="<?php echo e(url('course/create/'. $cate->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          </div>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('coursechapter/'.$cate->id)); ?>"data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

              <div class="d-none">

            <label class="display-none" for="exampleInputSlug"><?php echo e(__('SelectCourse')); ?></label>
            <select name="course_id" class="form-control select2">
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cou->id); ?>" <?php echo e($cate->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Name')); ?> :<span class="redstar">*</span></label>
                <input type="" class="form-control" name="chapter_name" id="exampleInputTitle" value="<?php echo e($cate->chapter_name); ?>">
                <br>
              </div>

              <div class="col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('LearningMaterial')); ?> :</label> 
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="file"><?php echo e(__('Upload')); ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                  </div>
                </div>
              </div>



            </div>
            <br>


            <div class="row"> 
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?> :</label><br>
                  <label class="switch">
                    <input class="slider" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> />
                    <span class="knob"></span>
                  </label>
              </div>
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Is Topic Wise')); ?> :</label><br>
                  <label class="switch">
                    <input class="slider" type="checkbox" name="is_topic_wise" <?php echo e($cate->is_topic_wise == '1' ? 'checked' : ''); ?> />
                    <span class="knob"></span>
                  </label>
              </div>
            </div>
              <br>
              <div class="row"> 
              <?php if($cate->courses->drip_enable == 1): ?>
                <div class="col-md-12">
                  <label  for="married_status"><?php echo e(__('Drip Content Type')); ?>: </label>
                  <select class="form-control js-example-basic-single" id="drip_type" name="drip_type">
                    <option value="" selected hidden> 
                      <?php echo e(__('Select an Option ')); ?>

                    </option>
                    <option value="date" <?php echo e($cate->drip_type == 'date' ? 'selected' : ''); ?>><?php echo e(__('Specific Date')); ?></option>
                    <option value="days" <?php echo e($cate->drip_type == 'days' ? 'selected' : ''); ?>><?php echo e(__('Days After Enrollment')); ?></option>
                  </select>
                  <br>
                </div>

                <div class="col-md-6" <?php if($cate->drip_type == 'days' || $cate->drip_type == NULL): ?> style="display: none;" <?php endif; ?> id="dripdate">
                  <label><?php echo e(__('Specific Date')); ?> :</label>
                

                  <div class="input-group" id='datetimepicker1'>
                  <input type="text"  name="drip_date"   id="time-format" class="form-control" placeholder="dd/mm/yyyy - hh:ii aa" aria-describedby="basic-addon5"  value="<?php echo e($cate->drip_date); ?>"/>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon5"><i class="feather icon-calendar"></i></span>
                    </div>
                  </div>
                  
                </div>

                <div class="col-md-6" <?php if($cate->drip_type == 'date' || $cate->drip_type == NULL): ?> style="display: none;" <?php endif; ?> id="dripdays">
                  <label><?php echo e(__('Days After Enrollment')); ?> :</label>
                  <input type="number" min="1" class="form-control" name="drip_days" value="<?php echo e($cate->drip_days); ?>">
                  <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Enter days')); ?>.</small>
                </div>
              </div>
              

              <?php endif; ?>
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
<?php $__env->startSection('script'); ?>


<script>
  
  $('#drip_type').change(function() {
      
    if($(this).val() == 'date')
    {
      $('#dripdate').show();
      $("input[name='drip_date']").attr('required','required');
    }
    else
    {
      $('#dripdate').hide();
    }

    if($(this).val() == 'days')
    {
      $('#dripdays').show();
      $("input[name='drip_days']").attr('required','required');
    }
    else
    {
      $('#dripdays').hide();
    }


  });

</script>


<?php $__env->stopSection(); ?> 


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/coursechapter/edit.blade.php ENDPATH**/ ?>