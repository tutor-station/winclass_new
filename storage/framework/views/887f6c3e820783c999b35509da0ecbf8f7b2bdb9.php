
<?php $__env->startSection('title','All Categories'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Categories';
$data['title'] = 'Categories';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <div class="row">

    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('All Categories')); ?></h5>
          <div>
                <div class="widgetbar">
                   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.create')): ?>
                  <button type="button" class="btn btn-primary-rgba mr-2" data-toggle="modal" data-target="#myModal" title="<?php echo e(__('Add Category')); ?>">
                    <i class="feather icon-plus mr-2"></i><?php echo e(__('Add Category')); ?></a>
              <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.delete')): ?>
                  <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal"
                    data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
                    <?php endif; ?>
                   
                </div>
              </div>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label>#</th>
                  <th><?php echo e(__('Icon')); ?></th>
                  <th><?php echo e(__('Image')); ?></th>
                  <th><?php echo e(__('Category Name')); ?></th>
                  <th><?php echo e(__('Slug')); ?></th>
                  <th><?php echo e(__('Featured')); ?></th>
                  <th><?php echo e(__('Status')); ?></th>
                  <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody id="sortable">
                <?php $i=0;?>
                <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr class="sortable" id="id-<?php echo e($cat->id); ?>">
                  <td> <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                      name='checked[]' value="<?php echo e($cat->id); ?>" id='checkbox<?php echo e($cat->id); ?>'>
                    <label for='checkbox<?php echo e($cat->id); ?>' class='material-checkbox'></label>
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
                            <form id="bulk_delete_form" method="post" action="<?php echo e(route('categories.bulk_delete')); ?>">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('POST'); ?>
                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                              <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="index-image">
                      <i class="fa <?php echo e($cat->icon); ?>"></i>
                    </div>
                  </td>
                  <td>
                    <?php if($cat['cat_image'] !== NULL && $cat['cat_image'] !== ''): ?>
                    <img src="images/category/<?php echo $cat['cat_image'];  ?>" class="img-responsive img-circle" alt="<?php echo e($cat->title); ?>">
                    <?php else: ?>
                    <img src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" class="img-responsive img-circle" alt="<?php echo e($cat->title); ?>">
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($cat->title); ?></td>
                   <td><?php echo e($cat->slug); ?></td>
                  <td>
                    <?php if( $cat->featured == 1): ?>
                    <button type="button" class="btn btn-rounded btn-success-rgba pointer-remove">
                        <?php echo e(__('Yes')); ?>

                    </button>
                        <?php else: ?>
                      <button type="button" class="btn btn-rounded btn-danger-rgba pointer-remove">
                        <?php echo e(__('No')); ?>

                      </button>
                        <?php endif; ?> 
                  </td>
                  <td>
                    <?php if($cat->status == '1'): ?>
                    <button type="button" class="btn btn-rounded btn-success-rgba pointer-remove">
                        <?php echo e(__('Active')); ?>

                    </button>
                        <?php else: ?>
                    <button type="button" class="btn btn-rounded btn-danger-rgba pointer-remove">
                        <?php echo e(__('Deactive')); ?>

                    </button>
                        <?php endif; ?> 
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  title="<?php echo e(__('Settings')); ?>"
><i
                          class="feather icon-more-vertical-"></i></button>
                      <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.edit')): ?>
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit<?php echo e($cat->id); ?>" title="<?php echo e(__('Edit')); ?>"
><i
                            class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.delete')): ?>
                        <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($cat->id); ?>" title="<?php echo e(__('Delete')); ?>"
>
                          <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                        </a>
                        <?php endif; ?>
                      </div>
                    </div>
          </div>
        </div>
      </div>
      </td>
      <div class="modal fade bd-example-modal-sm" id="edit<?php echo e($cat->id); ?>" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Edit Category')); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>"
>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="demo-form" method="post" action="<?php echo e(url('category/'.$cat->id)); ?>

                    " data-parsley-validate class="form-horizontal form-label-left" autocomplete="off"
                enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputTit1e"><?php echo e(__('Category')); ?>:<sup
                          class="redstar">*</sup></label>
                      <input type="text" class="form-control" name="title" id="exampleInputTitle"
                        value="<?php echo e($cat->title); ?>">
                    </div>

                    <div class="form-group">
                      <label for="slug"><?php echo e(__('Slug')); ?>:<sup
                          class="redstar">*</sup></label>
                      <input pattern="[/^\S*$/]+" placeholder="Please Enter slug" type="text"
                        class="form-control" name="slug" required value="<?php echo e($cat->slug); ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTit1e"><?php echo e(__('Icon')); ?>:<sup
                          class="redstar">*</sup></label>
                      <div class="input-group">
                        <input type="text" class="form-control iconvalue" name="icon"
                          value="<?php echo e($cat->icon); ?>">
                        <span class="input-group-append">
                          <button type="button" class="btnicon btn btn-outline-secondary"
                            role="iconpicker"></button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><?php echo e(__('Preview Image')); ?>:</label> - <p class="inline info"><?php echo e(__('Recommended size')); ?>: 255x200</p>
                      <br>
                          <label><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label>
                        <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Recommended Size')); ?> (1375 x 409px)</small>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                          </div>
                        </div>
                        
                          <?php if(isset($cat['cat_image'])): ?>
                          <img src="<?php echo e(url('/images/category/'.$cat['cat_image'])); ?>" class="image_size" />
                          <?php endif; ?> 
                        </div>
                    </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
                            class="redstar text-danger">*</sup></label><br>
                        <input id="status" type="checkbox" class="custom_toggle"
                          <?php echo e($cat->status == '1' ? 'checked' : ''); ?> name="status" />

                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputDetails"><?php echo e(__('Featured')); ?>:<sup
                            class="redstar text-danger">*</sup></label><br>
                        <input id="featured" type="checkbox" class="custom_toggle"
                          <?php echo e($cat->featured == '1' ? 'checked' : ''); ?> name="featured" />

                      </div>


                </div>
                <div class="form-group">
                  <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban" title="<?php echo e(__('Reset')); ?>"
></i>
                    <?php echo e(__('Reset')); ?></button>
                  <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"
><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Update')); ?></button>

                </div>
                <div class="clear-both"></div>
            </div>
          </div>

          </form>
        </div>
      </div>

      <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($cat->id); ?>" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>"
>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-muted"><?php echo e(__('Do you really want to delete this Bundle ? This process cannot be
                undone')); ?>.</p>
            </div>
            <div class="modal-footer">
              <form method="post" action="<?php echo e(url('category/'.$cat->id)); ?>" data-parsley-validate
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
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModal"><?php echo e(__('Add New Category')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>"
><span
            aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <form id="demo-form2" method="post" action="<?php echo e(url('category/')); ?>" data-parsley-validate
          class="form-horizontal form-label-left" autocomplete="off" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>


          <div class="row">
            <div class="col-md-12">
              <label for="c_name"><?php echo e(__('Category Name')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Please Enter Category Name" type="text" class="form-control" name="title"
                required="">
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-md-12">
              <label for="slug"><?php echo e(__('Slug')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder="Please Enter slug" type="text" class="form-control" name="slug"
                required>
            </div>
          </div>
          <br>


          <div class="row">
            <div class="col-md-12">
              <label for="icon"><?php echo e(__('Icon')); ?>:<sup class="redstar"></sup></label>

              <!--========================================================================-->
              <div class="input-group">
                <input type="text" class="form-control iconvalue" name="icon" value="Please Choose icon">
                <span class="input-group-append">
                  <button type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                </span>
              </div>
              <!--========================================================================-->



            </div>
          </div>
          <br>
          <div class="form-group">
            <label><?php echo e(__('Preview Image')); ?>:</label> - <p class="inline info"><?php echo e(__('Recommended Size')); ?><?php echo e(__(': 255x200')); ?></p>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
              </div>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image"
                  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="exampleInputDetails"><?php echo e(__('Featured')); ?>:<sup
                  class="redstar text-danger">*</sup></label><br>
              <input id="status_toggle" type="checkbox" class="custom_toggle" name="featured" checked />
            </div>

            <div class="col-md-4">
              <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
                  class="redstar text-danger">*</sup></label><br>
              <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked />
            </div>

          </div>
          <br>

          <div class="form-group">
            <button type="reset" class="btn btn-danger" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
            <button type="submit" class="btn btn-primary" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
              <?php echo e(__('Create')); ?></button>
          </div>
          <div class="clear-both"></div>
        </form>
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
        url: "<?php echo e(route('category_reposition')); ?>",
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

<!-- script to change featured-status start -->
<script>


      $(document).on("change",".status1",function() { 
      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'featured-status',
        data: {'featured': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
        success: function (data) {
          console.log(id)
        }
      });
    
  });
</script>
<!-- script to change featured-status end -->
<!-- script to change status start -->
<script>
  
      $(document).on("change",".status2",function() { 
      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cat-status',
        data: {'status': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
        success: function(data){
            var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
              });
              warning.get().click(function() {
                warning.remove();
              });
          }
      });
    });
</script>
<!-- script to change status end -->
<!-- ============================================ -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/category/view.blade.php ENDPATH**/ ?>