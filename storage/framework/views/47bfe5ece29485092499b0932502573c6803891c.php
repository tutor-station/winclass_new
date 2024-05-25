<div class="row">
  <div class="col-lg-12">
    <div class="card m-b-30">
      <div class="card-header">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-chapter.delete')): ?>
        <button type="button" class=" btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete3"><i
            class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-chapter.create')): ?>
            <a data-toggle="modal" data-target="#myModalSubject" href="#" class="btn btn-primary-rgba"><i
                class="feather icon-plus mr-2"></i><?php echo e(__('Add Course Subject')); ?></a>
                <?php endif; ?>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="" class="displaytable table table-striped table-bordered w-100">
            <thead>
              <tr>
                <th>
                  <input id="checkboxAllcoursechapter" type="checkbox" class="filled-in" name="checked[]" value="all" />
                  <label for="checkboxAll" class="material-checkbox"></label> #
                </th>
                <th><?php echo e(__('SubjectName')); ?></th>
                <th><?php echo e(__('ChapterName')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Action')); ?></th>

              </tr>
            </thead>
            <tbody id="sortable-chapter">
              <?php $i=0;?>
              <?php

                  $courseSubject = DB::table('course_subject')
                          ->where('course_subject.course_id', $cor->id)
                          ->join('course_chapters', 'course_chapters.id', '=', 'course_subject.chapter_id')
                          ->select('course_subject.*', 'course_chapters.chapter_name')
                          ->get();
              ?>
              
              <?php $__currentLoopData = $courseSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="sortable row1" data-Cid="<?php echo e($cat->id); ?>" course-id="<?php echo e($cor->id); ?>">             
                <?php $i++;?>
                      <td>
                          <input type="checkbox" form="bulk_delete_form3" class="filled-in material-checkbox-input check" name="checked[]" value="<?php echo e($cat->id); ?>" id="checkbox<?php echo e($cat->id); ?>">
                          <label for="checkbox" class="material-checkbox"></label>
                        <?php echo $i; ?>
            
                        <!-- =============== -->
                        <div id="bulk_delete3" class="delete-modal modal fade" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="delete-icon"></div>
                              </div>
                              <div class="modal-body text-center">
                                <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                                <p><?php echo e(__('Do you really want to delete selected item ? This process
                                  cannot be undone')); ?>.</p>
                              </div>
                              <div class="modal-footer">
                                <form id="bulk_delete_form3" method="post" action="<?php echo e(route('coursechapter.bulk_delete')); ?>">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('POST'); ?>
                                  <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                  <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- =============== -->
                       
                      </td>

                      <td><?php echo e($cat->title); ?></td>
                      <td><?php echo e($cat->chapter_name); ?></td>
                       <td>
                          <label class="switch">
                            <input class="slider" type="checkbox"  data-id="<?php echo e($cat->id); ?>" name="status" <?php echo e($cat->status == '1' ? 'checked' : ''); ?> onchange="courcechapter('<?php echo e($cat->id); ?>')" />
                            <span class="knob"></span>
                          </label>
                      </td>

                      <td>
                        <div class="dropdown">
                          <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                              class="feather icon-more-vertical-"></i></button>
                          <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-chapter.edit')): ?>
                            <a class="dropdown-item" href="<?php echo e(url('coursechapter/'.$cat->id)); ?>"><i
                                class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-chapter.delete')): ?>
                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($cat->id); ?>">
                              <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                            </a>
                            <?php endif; ?>
                          </div>
                        </div>

                        <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($cat->id); ?>" tabindex="-1" role="dialog"
                          aria-hidden="true">
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
                                <p><?php echo e(__('Do you really want to delete')); ?></p>
                              </div>
                              <div class="modal-footer">
                                <form method="post" action="<?php echo e(url('coursechapter/'.$cat->id)); ?>" class="pull-right">
                                  <?php echo e(csrf_field()); ?>

                                  <?php echo e(method_field("DELETE")); ?>

                                  <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                  <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
            
                      </td>
            
            
                    </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModalSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">
          <b>Add Course Subject</b>
      </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="box box-primary">
        <div class="panel panel-sum">
          <div class="modal-body">
            <form id="demo-form2" method="post" action="<?php echo e(route('coursesubject.store')); ?>" data-parsley-validate
              class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


               <select class="d-none" name="course_id" class="form-control select2">
                <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
              </select>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e"><?php echo e(__('SubjectName')); ?>: <span class="redstar">*</span>
                  </label>
                  <input type="text" placeholder="Enter Your Subject Name" class="form-control" name="title" id="exampleInputTitle" value="" required>
                </div>
                <div class="col-md-6">

                </div>
              </div>
              <br>

              <div class="row">
                <?php

                  $coursechapters = App\CourseChapter::where('course_id',$cor->id)->orderBy('position','ASC')->get();

                ?>
                <div class="col-md-12">
                  <label for="exampleInputTit1e"><?php echo e(__('ChapterName')); ?>: <span class="redstar">*</span>
                  </label>
                  <select name="chapter_id" class="form-control select2">
                    <option value="">Select Chapter</option>
                      <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($val->id); ?>"><?php echo e($val->chapter_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="col-md-6">

                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                  <label class="switch">
                      <input class="slider" type="checkbox" name="status" checked />
                      <span class="knob"></span>
                    </label>
                </div>
              </div>
              <br>

              <div class="form-group">
                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Create')); ?></button>
              </div>
              <div class="clear-both"></div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- script to change status start -->

<script>
  function  courcechapter(id){
    var status = $(this).prop('checked') == true ? 1 : 0; 
    
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?php echo e(url('/course-chapter/status/')); ?>/" + id,
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(id)
            }
        });
    };
 
</script>
<!-- script to change status end -->

<?php /**PATH /var/www/html/resources/views/admin/course/coursesubject/index.blade.php ENDPATH**/ ?>