
<?php $__env->startSection('title','Edit QuestionAnswer'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit QuestionAnswer';
$data['title'] = 'Edit QuestionAnswer';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
 <div class="row">
    <div class="col-lg-12">
     <div class="card dashboard-card m-b-30">
      <div class="card-header">
          <h5 class="card-box"><?php echo e(__('All Answers')); ?></h5>
          <div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('answer.create')): ?>
            <a data-toggle="modal" data-target="#myModalanswer" class="float-right btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?php echo e(__('Add Answers')); ?></a>
            <?php endif; ?>
          </div>
        </div>
      <div class="card-body">

      <div class="table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">

          <thead>
          
            <th>#</th>
            <th><?php echo e(__('Question')); ?></th>
            <th><?php echo e(__('Answer')); ?></th>
            <th><?php echo e(__('Status')); ?></th>
            <th><?php echo e(__('Action')); ?></th>
          </tr>
          </thead>
          <tbody>
          <?php $i=0;?>
          <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          	<?php $i++;?>
          	<td><?php echo $i;?></td>
            	<td><?php echo e(strip_tags($ans->question['question'])); ?></td>
            	<td><?php echo e(strip_tags($ans->answer)); ?></td> 
            <td>
                <?php if($ans->status==1): ?>
                  <?php echo e(__('Active')); ?>

                <?php else: ?>
                  <?php echo e(__('Deactivate')); ?>

                <?php endif; ?>	                    
            </td>
            <td>
               <div class="dropdown">
                <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="feather icon-more-vertical-"></i></button>
                <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('answer.edit')): ?>
                  <a class="dropdown-item" href="<?php echo e(route('courseanswer.edit',$ans->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('answer.delete')): ?>

                  <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($ans->id); ?>">
                    <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                  </a>
                  <?php endif; ?>
                </div>
              </div>
            </td>

            <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($ans->id); ?>" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="text-muted"><?php echo e(__('Do you really want to delete this Bundle ? This process cannot be
                      undone.')); ?></p>
                  </div>
                  <div class="modal-footer">
                    <form method="post" action="<?php echo e(url('courseanswer/'.$ans->id)); ?>" data-parsley-validate
                      class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>


                      <button type="reset" class="btn btn-gray translate-y-3"
                        data-dismiss="modal"><?php echo e(__('No')); ?></button>
                      <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          </tbody>
        </table>
      </div>

    </div>
  </div>
  


  <div class="modal fade" id="myModalanswer" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(url('courseanswer/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

               
                <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />
                <input type="hidden" name="ans_user_id" value="<?php echo e(Auth::user()->id); ?>" />
           
                <div class="row">
                  <div class="col-md-12">
                    <label  for="exampleInputTit1e"><?php echo e(__('SelectQuestion')); ?>:<sup class="redstar">*</sup></label>
                    <br>
                    <select  name="question_id" required class="form-control select2">
                      <option value="none" selected disabled hidden> 
                       <?php echo e(__('SelectanOption')); ?>

                      </option>
                      <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ques->id); ?>"><?php echo e($ques->question); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <input type="hidden" name="ques_user_id"  value="<?php echo e($ques->user_id); ?>" />
                  <input type="hidden" name="course_id"  value="<?php echo e($ques->course_id); ?>" />
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInput"><?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
                    <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer"></textarea>
                  </div>
                </div>
                <br>

                <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                    <label class="switch">
                      <input class="slider" type="checkbox" name="status" checked />
                      <span class="knob"></span>
                    </label>
                </div>
                <br>
        
                <div class="box-footer">
                  <button type="submit" value="Add Answer" class="btn btn-md col-md-3 btn-primary">+  <?php echo e(__('Save')); ?></button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Model close -->  
  </div>  

  </div>
  <!-- /.row -->

  </div>
    <!-- /.col -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/answer/index.blade.php ENDPATH**/ ?>