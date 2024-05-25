
<?php $__env->startSection('title','All Questions'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Manage Test';
$data['title'] = 'All Questions';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
<div class="row">
   <?php if($errors->any()): ?>
   <div class="alert alert-danger">
      <ul>
         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li><?php echo e($error); ?></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
   </div>
   <?php endif; ?>
   <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
         <div class="card-header">
            <h5 class="box-title"><?php echo e(__('All Questions')); ?></h5>
            <div>
               <div class="widgetbar">
                  <a data-toggle="modal" data-target="#myModalquiz" href="#"  class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Question')); ?></a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="allquestionstable" class="table table-striped table-bordered" style="width: 100%">
                  <thead>
                     <tr>
                        <th>
                           <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                              value="all" />
                           <label for="checkboxAll" class="material-checkbox"></label> 
                        </th>
                        <th>#</th>
                        <th><?php echo e(__('Question')); ?></th>
                        <th><?php echo e(__('A')); ?></th>
                        <th><?php echo e(__('B')); ?></th>
                        <th><?php echo e(__('C')); ?></th>
                        <th><?php echo e(__('D')); ?></th>
                        <th><?php echo e(__('Answer')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                     </tr>
                  </thead>
                  <tbody></tbody>
                  <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                     <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close"
                                 data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                              <div class="delete-icon"></div>
                           </div>
                           <div class="modal-body text-center">
                              <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                              <p><?php echo e(__('Do you really want to delete selected item names here? This process
                                 cannot be undone')); ?>.
                              </p>
                           </div>
                           <div class="modal-footer">
                              <form id="bulk_delete_form" method="post"
                                 action="<?php echo e(route('user.bulk_delete')); ?>">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <button type="reset" class="btn btn-gray translate-y-3"
                                    data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                 <button type="submit"
                                    class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

  <div class="modal fade" id="myModalquiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('Add')); ?> <?php echo e(__('Question')); ?>

          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(route('Newquestions.store')); ?>" data-parsley-validate
                class="form-horizontal form-label-left" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

  
                <input type="hidden" value="Objective" name="data_type" class="data_type">
  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <label for="exampleInputTit1e"><?php echo e(__('Question')); ?></label>
                        <textarea name="question" rows="6" class="form-control" placeholder="Enter Your Question"></textarea>
                        <br>
                      </div>

                      <div class="col-md-12">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-primary active mr-2">
                            <input type="radio" name="options" id="option1" onchange="ansType('Objective')" autocomplete="off" checked> <?php echo e(__('Objective')); ?>

                          </label>
                          <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2" onchange="ansType('True/False')" autocomplete="off"> <?php echo e(__('True/False')); ?>

                          </label>
                        </div>
                      </div>
                      <br>

                      <div class="col-md-12">
                        <label for="exampleInputDetails"><?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
                        <div class="objectivetype">
                          <select style="width: 100%" name="answer" class="form-control select2">
                            <option value="none" selected disabled hidden> <?php echo e(__('SelectanOption')); ?> </option>
                            <option value="A"><?php echo e(__('A')); ?></option>
                            <option value="B"><?php echo e(__('B')); ?></option>
                            <option value="C"><?php echo e(__('C')); ?></option>
                            <option value="D"><?php echo e(__('D')); ?></option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="col-md-12">
                        <h4 class="extras-heading"><?php echo e(__('Video And Image For Question')); ?></h4>
                        <div class="form-group<?php echo e($errors->has('question_video_link') ? ' has-error' : ''); ?>">
                          <label for="exampleInputDetails"><?php echo e(__('Add Video To Question')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="question_video_link" class="form-control" placeholder="https://myvideolink.com/embed/.." />
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
                          <input type="text" name="a" class="form-control" placeholder="Enter Option A">
                        </div>

                        <div class="col-md-6">
                          <label for="exampleInputDetails"><?php echo e(__('B Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="b" class="form-control" placeholder="Enter Option B" />
                        </div>

                        <div class="col-md-6">

                          <label for="exampleInputDetails"><?php echo e(__('C Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="c" class="form-control" placeholder="Enter Option C" />
                        </div>

                        <div class="col-md-6">

                          <label for="exampleInputDetails"><?php echo e(__('D Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="d" class="form-control" placeholder="Enter Option D" />
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
  </div>



  <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(function () {
      
      var table = $('#allquestionstable').DataTable({
          processing: true,
          serverSide: true,
          searchDelay : 1000,
          stateSave : true,
          ajax: "<?php echo e(url('/AllQuestions')); ?>",
          columns: [
              {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
              {data: 'id', name: 'quiz.id'},
              {data: 'question', name: 'quiz.question', orderable: false, searchable: false},
              {data: 'a', name: 'quiz.a', orderable: false, searchable: false},
              {data: 'b', name: 'quiz.b', orderable: false, searchable: false},
              {data: 'c', name: 'quiz.c', orderable: false, searchable: false},
              {data: 'd', name: 'quiz.d', orderable: false, searchable: false},
              {data: 'answer', name: 'quiz.answer', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    });



</script>

<script>
      $("#checkboxAll").on('click', function () {
          $('input.check').not(this).prop('checked', this.checked);
      });
  </script>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiz/allquestions.blade.php ENDPATH**/ ?>