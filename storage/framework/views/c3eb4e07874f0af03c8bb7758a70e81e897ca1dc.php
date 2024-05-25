
<?php $__env->startSection('title','All Quiz'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Quiz';
$data['title'] = 'All Quiz';
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
                  <h5 class="box-title"><?php echo e(__('All Quiz')); ?></h5>
                                  
                <div>
                  <div class="widgetbar">
                    <?php if($topic->type == NULL): ?>
                      <a href="<?php echo e(route('import.quiz')); ?>"  class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Import Quiz')); ?></a>
                      <a data-toggle="modal" data-target="#myModalquiz" href="#"  class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Question')); ?></a>
                    <?php endif; ?>

                    <?php if($topic->type == '1'): ?>
                      <a data-toggle="modal" data-target="#myModalquizsubject"  class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Question')); ?></a>
                    <?php endif; ?>
                    
                    <a href="<?php echo e(url('course/create/'. $topic->courses->id)); ?>" class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>

                  </div>                        
                </div>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                        
                              <th>#</th>
                              <th><?php echo e(__('Courses')); ?></th>
                              <th><?php echo e(__('Topic')); ?></th>
                              <th><?php echo e(__('Question')); ?></th>
                              <?php if($topic->type == NULL): ?>
                              <th><?php echo e(__('A')); ?></th>
                              <th><?php echo e(__('B')); ?></th>
                              <th><?php echo e(__('C')); ?></th>
                              <th><?php echo e(__('D')); ?></th>
                              <th><?php echo e(__('Answer')); ?></th>
                              <?php endif; ?>
                              
                              <th><?php echo e(__('Action')); ?></th>
                            </tr>
                          </thead>
                          <tbody id="sortable">
                            <?php $i=0;?>
                            <?php $__currentLoopData = $quizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php $i++;?>
                            <tr class="sortable" id="id-<?php echo e($quiz->id); ?>">

                              <td><?php echo $i;?></td>
                              <td><?php echo e($quiz->courses->title); ?></td>
                              <td><?php echo e($quiz->topic->title); ?></td>
                              <td><?php echo e($quiz->question); ?></td>
                              <?php if($topic->type == NULL): ?>
                              <?php if($quiz->data_type =='Objective'): ?>
                              <td><?php echo e($quiz->a); ?></td>
                              <td><?php echo e($quiz->b); ?></td>
                              <td><?php echo e($quiz->c); ?></td>
                              <td><?php echo e($quiz->d); ?></td>
                              <td><?php echo e($quiz->answer); ?></td>
                              <?php else: ?> 
                              <td><?php echo e($quiz->first_option_ans); ?></td>
                              <td><?php echo e($quiz->second_option_ans); ?></td>
                              <td></td>
                              <td></td>
                              <td><?php echo e($quiz->answer); ?></td>
                              <?php endif; ?>
                              <?php endif; ?>
                              <td>
                                <div class="dropdown">
                                    <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                      <?php if($topic->type == NULL): ?>
                                        <a class="dropdown-item"  data-toggle="modal" data-target="#myModaledit<?php echo e($quiz->id); ?>" ><i class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                                        <?php endif; ?>
                                        <?php if($topic->type == '1'): ?>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#myModaleditsub<?php echo e($quiz->id); ?>" href="#"><i class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                                        <?php endif; ?>
                                        <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($quiz->id); ?>" >
                                            <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                        </a>
                                    </div>
                                </div>

                                <!-- delete Modal start -->
                                <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($quiz->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                                    <p><?php echo e(__('Do you really want to delete')); ?> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="<?php echo e(url('admin/questions/'.$quiz->id)); ?>" class="pull-right">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field("DELETE")); ?>

                                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete Model ended -->

                            </td>
                             
                          
                            </tr>
            
                            <!--Model for edit question-->
                            <div class="modal fade" id="myModaledit<?php echo e($quiz->id); ?>" tabindex="-1" role="dialog"
                              aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="my-modal-title">
                                      <b><?php echo e(__('Add Quiz')); ?></b>
                                  </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                   
                                  </div>
                                  <div class="box box-primary">
                                    <div class="panel panel-sum">
                                      <div class="modal-body">
                                        <form id="demo-form2" method="POST" action="<?php echo e(route('questions.update', $quiz->id)); ?>"
                                          data-parsley-validate class="form-horizontal form-label-left"
                                          enctype="multipart/form-data">
                                          <?php echo e(csrf_field()); ?>

                                          <?php echo e(method_field('PUT')); ?>

            
                                          <input type="hidden" name="course_id" value="<?php echo e($topic->course_id); ?>" />
                                          <input type="hidden" name="data_type" value="<?php echo e($quiz->data_type); ?>">
                                          <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>" />
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="col-md-12">
                                                <label for="exampleInputTit1e"><?php echo e(__('Question')); ?></label>
                                                <textarea name="question" rows="6" class="form-control" placeholder="Enter Your Question"><?php echo e($quiz->question); ?></textarea>
                                                <br>
                                              </div>
                                              <div class="col-md-12">
                                                <label for="exampleInputDetails"><?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
                                                <select style="width: 100%" name="answer" class="form-control select2">
                                                <?php if($quiz->data_type=='Objective'): ?>
                                                  <option <?php echo e($quiz->answer == 'A' ? 'selected' : ''); ?> value="A"><?php echo e(__('A')); ?></option>
                                                  <option <?php echo e($quiz->answer == 'B' ? 'selected' : ''); ?> value="B"><?php echo e(__('B')); ?></option>
                                                  <option <?php echo e($quiz->answer == 'C' ? 'selected' : ''); ?> value="C"><?php echo e(__('C')); ?></option>
                                                  <option <?php echo e($quiz->answer == 'D' ? 'selected' : ''); ?> value="D"><?php echo e(__('D')); ?></option>
                                                <?php else: ?> 
                                                  <option <?php echo e($quiz->answer == 'True' ? 'selected' : ''); ?> value="True"><?php echo e(__('True')); ?></option>
                                                  <option <?php echo e($quiz->answer == 'False' ? 'selected' : ''); ?> value="False"><?php echo e(__('False')); ?></option>
                                                  <option <?php echo e($quiz->answer == 'Yes' ? 'selected' : ''); ?> value="Yes"><?php echo e(__('Yes')); ?></option>
                                                  <option <?php echo e($quiz->answer == 'No' ? 'selected' : ''); ?> value="No"><?php echo e(__('No')); ?></option>
                                                <?php endif; ?>
                                                </select> 
                                              </div>
                                              <br>
                                              <h4 class="extras-heading"><?php echo e(__('Video And Image For Question')); ?></h4>
                                            <div class="form-group<?php echo e($errors->has('question_video_link') ? ' has-error' : ''); ?>">
                                          
                                          
                                              <label for="exampleInputDetails"><?php echo e(__('Add Video To Question')); ?> :<sup class="redstar">*</sup></label>
                                              <input type="text" name="question_video_link" class="form-control"
                                                placeholder="https://myvideolink.com/embed/.." />
                                              <small class="text-danger"><?php echo e($errors->first('question_video_link')); ?></small>
                                              <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__('YouTube And Vimeo Video Support (Only Embed Code Link)')); ?></small>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php if($quiz->data_type=='Objective'): ?>
                                              <div class="col-md-12">
            
                                                <label for="exampleInputDetails"><?php echo e(__('AOption')); ?> :<sup
                                                    class="redstar">*</sup></label>
                                                <input type="text" name="a" value="<?php echo e($quiz->a); ?>" class="form-control"
                                                  placeholder="Enter Option A">
                                              </div>
              
                                              <div class="col-md-12">
                                                <label for="exampleInputDetails"><?php echo e(__('BOption')); ?> :<sup
                                                    class="redstar">*</sup></label>
                                                <input type="text" name="b" value="<?php echo e($quiz->b); ?>" class="form-control"
                                                  placeholder="Enter Option B" />
                                              </div>
              
                                              <div class="col-md-12">
              
                                                <label for="exampleInputDetails"><?php echo e(__('COption')); ?> :<sup
                                                    class="redstar">*</sup></label>
                                                <input type="text" name="c" value="<?php echo e($quiz->c); ?>" class="form-control"
                                                  placeholder="Enter Option C" />
                                              </div>
              
                                              <div class="col-md-12">
              
                                                <label for="exampleInputDetails"><?php echo e(__('DOption')); ?> :<sup
                                                    class="redstar">*</sup></label>
                                                <input type="text" name="d" value="<?php echo e($quiz->d); ?>" class="form-control"
                                                  placeholder="Enter Option D" />
                                              </div>
                                              <?php else: ?>
                                              <div class="col-md-6">
                                                <label for="exampleInputDetails"><?php echo e(__('First Option')); ?> :<sup class="redstar">*</sup></label>
                                                <input type="text" name="first_option_ans" value="<?php echo e($quiz->first_option_ans); ?>" class="form-control" placeholder="Enter First Option" />
                                              </div>

                                              <div class="col-md-6">
                                                <label for="exampleInputDetails"><?php echo e(__('Second Option')); ?> :<sup class="redstar">*</sup></label>
                                                <input type="text" name="second_option_ans" value="<?php echo e($quiz->second_option_ans); ?>" class="form-control" placeholder="Enter Second Option" />
                                              </div>
                                              <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                              <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Image')); ?>: </label>
                                        
                                              <div class="input-group mb-3">
                                        
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                                </div>
                                        
                                        
                                                <div class="custom-file">
                                        
                                                  <input type="file" name="question_img" class="custom-file-input" id="question_img"
                                                    aria-describedby="inputGroupFileAddon01">
                                                  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
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
                            </div>
                            <!--Model close -->
            
                            <!--Model for edit question-->
                            <div class="modal fade" id="myModaleditsub<?php echo e($quiz->id); ?>" tabindex="-1" role="dialog"
                              aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                      <?php echo e(__('Question')); ?></h4>
                                  </div>
                                  <div class="box box-primary">
                                    <div class="panel panel-sum">
                                      <div class="modal-body">
                                        <form id="demo-form2" method="POST" action="<?php echo e(route('questions.update', $quiz->id)); ?>"
                                          data-parsley-validate class="form-horizontal form-label-left"
                                          enctype="multipart/form-data">
                                          <?php echo e(csrf_field()); ?>

                                          <?php echo e(method_field('PUT')); ?>

            
                                          <input type="hidden" name="course_id" value="<?php echo e($topic->course_id); ?>" />
            
                                          <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>" />
            
                                          <input type="hidden" name="type" value="1" />
           
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label for="exampleInputTit1e"><?php echo e(__('Question')); ?></label>
                                              <textarea name="question" rows="6" class="form-control" 
                                                placeholder="Enter Your Question"><?php echo e($quiz->question); ?></textarea>
                                              <br>
                                            </div>
            
            
                                          </div>
                                          <br>
            
            
            
                                          <div class="col-md-12">
                                            <div class="extras-block">
                                              <h4 class="extras-heading"><?php echo e(__('Images And Video For Question')); ?></h4>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div
                                                    class="form-group<?php echo e($errors->has('question_video_link') ? ' has-error' : ''); ?>">
            
            
                                                    <label for="exampleInputDetails"><?php echo e(__('Add Video To Question')); ?> :<sup
                                                        class="redstar">*</sup></label>
                                                    <input type="text" name="question_video_link"
                                                      value="<?php echo e($quiz->question_video_link); ?>" class="form-control"
                                                      placeholder="https://myvideolink.com/embed/.." />
            
                                                    <small class="text-danger"><?php echo e($errors->first('question_video_link')); ?></small>
                                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__('YouTube And Vimeo Video Support (Only Embed Code LinkG')); ?></small>

                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group<?php echo e($errors->has('question_img') ? ' has-error' : ''); ?>">
            
            
                                                    <label for="exampleInputDetails"><?php echo e(__('Add Image To Question')); ?> :<sup
                                                        class="redstar">*</sup></label>
                                                    <input type="file" name="question_img" class="form-control" />
            
            
                                                    <small class="text-danger"><?php echo e($errors->first('question_img')); ?></small>
                                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__('Please Choose Only .JPG, .JPEG and .PNG')); ?></small>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
            
            
                                          <div class="form-group">
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                             <?php echo e(__('Reset')); ?> </button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                              <?php echo e(__('Update')); ?></button>
                                          </div>
                          
                                          <div class="clear-both"></div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--Model close -->
            
            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                          </tbody>
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
              <form id="demo-form2" method="post" action="<?php echo e(route('questions.store')); ?>" data-parsley-validate
                class="form-horizontal form-label-left" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

  
                <input type="hidden" name="course_id" value="<?php echo e($topic->course_id); ?>" />
                <input type="hidden" value="Objective" name="data_type" class="data_type">
  
                <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>" />
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
                          <div class="truefalsetype">
                        <select style="width: 100%" name="answer" class="form-control select2">
                          <option value="none" selected disabled hidden> <?php echo e(__('SelectanOption')); ?> </option>
                          <option value="True"><?php echo e(__('True')); ?></option>
                          <option value="False"><?php echo e(__('False')); ?></option>
                          <option value="Yes"><?php echo e(__('Yes')); ?></option>
                          <option value="No"><?php echo e(__('No')); ?></option>
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
                      <div class="truefalsetype">
                        <div class="col-md-6">
                          <label for="exampleInputDetails"><?php echo e(__('First Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="first_option_ans" class="form-control" placeholder="Enter First Option" />
                        </div>

                        <div class="col-md-6">
                          <label for="exampleInputDetails"><?php echo e(__('Second Option')); ?> :<sup class="redstar">*</sup></label>
                          <input type="text" name="second_option_ans" class="form-control" placeholder="Enter Second Option" />
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
  <!--Model close -->
  
  
  <!--Model for add question -->
  <div class="modal fade" id="myModalquizsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(route('questions.store')); ?>" data-parsley-validate
                class="form-horizontal form-label-left" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

  
                <input type="hidden" name="course_id" value="<?php echo e($topic->course_id); ?>" />
  
                <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>" />
  
  
                <input type="hidden" name="type" value="1" />
  
                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e"><?php echo e(__('Question')); ?></label>
                    <textarea name="question" rows="6" class="form-control" placeholder="Enter Your Question"></textarea>
                    <br>
                  </div>
  
  
                </div>
                <br>
  
  
                <div class="col-md-12">
                  <div class="extras-block">
                    <h4 class="extras-heading"><?php echo e(__('Back')); ?><?php echo e(__('Video And Image For Question')); ?></h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group<?php echo e($errors->has('question_video_link') ? ' has-error' : ''); ?>">
  
  
                          <label for="exampleInputDetails"><?php echo e(__('Back')); ?><?php echo e(__('Add Video To Question :')); ?><sup class="redstar">*</sup></label>
                          <input type="text" name="question_video_link" class="form-control"
                            placeholder="https://myvideolink.com/embed/.." />
                          <small class="text-danger"><?php echo e($errors->first('question_video_link')); ?></small>
                          <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__('Back')); ?><?php echo e(__('YouTube And Vimeo Video Support Only Embed Code Link')); ?></small>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group<?php echo e($errors->has('question_img') ? ' has-error' : ''); ?>">
  
                          <label for="exampleInputDetails"><?php echo e(__('Back')); ?><?php echo e(('Add Image To Question :')); ?><sup class="redstar">*</sup></label>
                          <input type="file" name="question_img" class="form-control" />
                          <small class="text-danger"><?php echo e($errors->first('question_img')); ?></small>
                          <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__('Back')); ?><?php echo e(__('Please Choose Only .JPG, .JPEG and .PNG')); ?></small>

         
                        </div>
                      </div>
                      <br>
  
                      <br>
                    </div>
                  </div>
                </div>
  
  
                <div class="form-group">
                  <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Back')); ?><?php echo e(__('Reset')); ?></button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Back')); ?><?php echo e(__('Create')); ?></button>
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
    $( function() {
      $( "#sortable" ).sortable();
      $( "#sortable" ).disableSelection();
    } );
  
     $("#sortable").sortable({
     update: function (e, u) {
      var data = $(this).sortable('serialize');
     
      $.ajax({
          url: "<?php echo e(route('questions_reposition')); ?>",
          type: 'get',
          data: data,
          dataType: 'json',
          success: function (result) {
            console.log(data);
          }
      });
  
    }
  
  });
  $('.truefalsetype').hide();
  function ansType(params) {
    if(params=='True/False'){
      $('.objectivetype').hide();
      $('.truefalsetype').show();
      $('.data_type').val('True/False');
    } else {
      $('.objectivetype').show();
      $('.truefalsetype').hide();
      $('.data_type').val('Objective');
    }
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiz/index.blade.php ENDPATH**/ ?>