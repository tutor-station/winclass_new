
<?php $__env->startSection('title','All Assignment'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'View Course Assignments';
$data['title'] = 'Courses';
$data['title1'] = 'Assignments';
$data['title2'] = 'View Course Assignments';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
       <div class="col-lg-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-header">

                  <h5 class="box-title"><?php echo e(__('View Course Assignments')); ?></h5>
                  <div>
                    <div class="widgetbar">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assignment.delete')): ?>
                        <a href="<?php echo e(url('/all/assignment')); ?>" class="float-right btn btn-primary mr-2" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
                        <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i
                            class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
                     <?php endif; ?>
                    </div>                        
                </div>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                            <th>
                              <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                              value="all" />
                          <label for="checkboxAll" class="material-checkbox"></label>   # 
                          </th>
                          <th><?php echo e(__('User')); ?></th>
                          <th><?php echo e(__('Course')); ?></th>
                          <th><?php echo e(__('Course Chapter')); ?></th>
                          <th><?php echo e(__('Assignment')); ?></th>
                          <th><?php echo e(__('Action')); ?></th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;?>
                        <?php $__currentLoopData = $assignment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <?php $i++;?>
                            <td>
                                                     
                              <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                  name='checked[]' value='<?php echo e($assign->id); ?>' id='checkbox<?php echo e($assign->id); ?>'>
                              <label for='checkbox<?php echo e($assign->id); ?>' class='material-checkbox'></label>
                              <?php echo $i; ?>
                              <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                  <div class="modal-dialog modal-sm">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                                              <div class="delete-icon"></div>
                                          </div>
                                          <div class="modal-body text-center">
                                              <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                                              <p><?php echo e(__('Do you really want to delete selected item names here? This process
                                                  cannot be undone')); ?>.</p>
                                          </div>
                                          <div class="modal-footer">
                                              <form id="bulk_delete_form" method="post"
                                                  action="<?php echo e(route('assignment.bulk_delete')); ?>">
                                                  <?php echo csrf_field(); ?>
                                                  <?php echo method_field('POST'); ?>
                                                  <button type="reset" class="btn btn-gray translate-y-3"
                                                      data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                  <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </td>
                          <td><?php if(isset($assign->user)): ?> <?php echo e($assign->user->fname); ?> <?php endif; ?></td>
                          <td><?php if(isset($assign->courses)): ?> <?php echo e($assign->courses->title); ?> <?php endif; ?></td>
                          <td><?php if(isset($assign->chapter)): ?> <?php echo e($assign->chapter->chapter_name); ?> <?php endif; ?></td>
                          <td><?php echo e($assign->title); ?>

                           <a href="<?php echo e(asset('files/assignment/'.$assign->assignment)); ?>" download="<?php echo e($assign->assignment); ?>" class="ml-2"> <i class="fa fa-download"></i></a>
                          </td>
                      <td><div class="dropdown">
                        <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assignment.view')): ?>
                           
                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleStandardModal<?php echo e($assign->id); ?>" title="<?php echo e(__('View')); ?>">
                              <i class="feather icon-eye mr-2"></i><?php echo e(__('View')); ?>

                            </button>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?php echo e(asset('files/assignment/'.$assign->assignment)); ?>"  download="<?php echo e($assign->assignment); ?>" title="<?php echo e(__('Download')); ?>"><i class="feather icon-download mr-2"></i><?php echo e(__('Download')); ?></a>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assignment.delete')): ?>

                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($assign->id); ?>" title="<?php echo e(__('Delete')); ?>">
                                <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="modal fade" id="exampleStandardModal<?php echo e($assign->id); ?>" tabindex="-1"role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleStandardModalLabel">
                                  <?php echo e(__('View Course Chapter Assignments')); ?></h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close" title="<?php echo e(__('Close')); ?>">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <div class="card">
                                  <div class="card-body py-4">
                                    <div class="view-instructor">
                                      <div class="instructor-detail">
                                        <div class="instructor-detail-img text-center"> 
                                          <?php if($assign->user->user_img != null || $assign->user->user_img !=''): ?>
                                            <img src="<?php echo e(asset('images/user_img/'.$assign->user->user_img)); ?>" class="img-circle" alt="<?php echo e($assign->user->fname); ?> <?php echo e($assign->user->lname); ?>" />
                                          <?php else: ?>
                                            <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="<?php echo e($assign->user->fname); ?> <?php echo e($assign->user->lname); ?>">
                                          <?php endif; ?>
                                        </div>
                                        <div class="mt-3">
                                          <h4 class="text-center"><?php echo e($assign->user->fname); ?> <?php echo e($assign->user->lname); ?></h4>
                                        </div>
                                        <br>
                                        <div class="table-responsive">
                                          <table class="table table-borderless mb-0 user-table">
                                            <tbody>
                                              <tr>
                                                <th scope="row" class="p-1"><?php echo e(__('Course')); ?> : </th>
                                                <td class="p-1"> <?php echo e($assign->courses->title); ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row" class="p-1"><?php echo e(__('Course Chapter')); ?> : </th>
                                                <td class="p-1"> <?php echo e($assign->chapter->chapter_name); ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row" class="p-1"><?php echo e(__('Assignment Title')); ?> : </th>
                                                <td class="p-1"><?php echo e($assign->title); ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row" class="p-1"><?php echo e(__('Assignment')); ?> : </th>
                                                <td class="p-1"> <a href="<?php echo e(asset('files/assignment/'.$assign->assignment)); ?>" download="<?php echo e($assign->assignment); ?>" title="<?php echo e(__('Download')); ?>"><?php echo e(__('Download')); ?> <i class="fa fa-download"></i></a></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <br>
                                        <br>
                                        <form action="<?php echo e(route('assignment.update',$assign->id)); ?>" method="POST" enctype="multipart/form-data">
                                          <?php echo e(csrf_field()); ?>

                                          <?php echo e(method_field('PUT')); ?>

                                          <input type="hidden" value="<?php echo e($assign->user_id); ?>" name="user_id" class="form-control">
                                          <input type="hidden" value="<?php echo e($assign->course_id); ?>" name="course_id" class="form-control">
                                          <div class="row">
                                            <div class="col-md-5">
                                              <label for="exampleInputTit1e"><?php echo e(__('Review Assignment')); ?>:</label>
                                              <br>
                                            </div>
                                            <div class="col-md-7">
                                              <input id="assign_accept" type="checkbox" class="custom_toggle" name="type"
                                              <?php echo e($assign->type == 1 ? 'checked' : ''); ?> />
                                              <label class="tgl-btn" data-tg-off="Unchecked" data-tg-on="Checked" for="assign_accept"></label>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row" style="<?php echo e($assign['type'] == '1' ? '' : 'display:none'); ?>" id="sec1_one">
                                            <div class="col-md-5">
                                              <label for="exampleInputDetails"><?php echo e(__('Give scores to assignment')); ?> (1 to 10):</label>
                                            </div>
                                            <div class="col-md-7">
                                              <input min="1" max="10" class="form-control" name="rating" type="number" id="rating" value="<?php echo e($assign->rating); ?>" placeholder="Enter Duration in months">
                                            </div>
                                          </div>
                                          <br>
                                          <br>
                                          <div class="form-group">
                                            <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
                                              <?php echo e(__('Reset')); ?></button>
                                            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
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
                      </div>
                    </div>

                    <!-- delete Modal start -->
                    <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($assign->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                        <p><?php echo e(__('Do you really want to delete')); ?> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="<?php echo e(url('assignment/'.$assign->id)); ?>" class="pull-right">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field("DELETE")); ?>

                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delete Model ended -->

                </td>
                          
                        </tr>
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


<?php $__env->startSection('scripts'); ?>
   <script type="text/javascript">
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );

   $("#sortable").sortable({
   update: function (e, u) {
    var data = $(this).sortable('serialize');
   
    $.ajax({
        url: "<?php echo e(route('slider_reposition')); ?>",
        type: 'get',
        data: data,
        dataType: 'json',
        success: function (result) {
          console.log(data);
        }
    });

  }

});
  </script>
   <script>
    $("#checkboxAll").on('click', function () {
$('input.check').not(this).prop('checked', this.checked);
});
</script>
<script>
  (function ($) {
    "use strict";

    $(function () {

      $('#assign_accept').change(function () {
        if ($('#assign_accept').is(':checked')) {
          $('#sec1_one').show('fast');
          $('#sec_one').hide('fast');
        } else {
          $('#sec1_one').hide('fast');
          $('#sec_one').show('fast');
        }

      });

    });
  })(jQuery);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/assignment/index.blade.php ENDPATH**/ ?>