
<?php $__env->startSection('title', 'Create Menu'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create Menu';
$data['title'] = 'Front Setting';
$data['title1'] = 'Menus';
$data['title2'] = 'Create Menu';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <!-- row started -->
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Create Menu')); ?></h5>
                    <div>
                      <div class="widgetbar">
                      <a href="<?php echo e(url('admin/menu')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                      </div>
                    </div>
                </div>               
                <!-- card body started -->
                <div class="card-body">
                 <!-- form start -->
                 <form id="demo-form2" method="post" action="<?php echo e(action('MenuController@store')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                          <!-- Local -->
                          <div class="form-group col-md-3">
                            <label><?php echo e(__("Menu:")); ?> <span class="text-danger">*</span></label>
                            <input name="title" type="text" class="form-control" required placeholder="<?php echo e(__('Enter menu name')); ?>">
                          </div>                          
                          <div class="form-group col-md-3">
                            <label><?php echo e(__("Link By:")); ?> <span class="text-danger">*</span></label>
                            <select required class="form-control select2" name="link_by" id="link_by">
                              <option value="page"><?php echo e(__("Pages")); ?></option>
                              <option value="url"><?php echo e(__('URL')); ?></option>
                            </select>
                          </div>  
                          <div class="form-group col-md-3" id="pagebox">
                            <label><?php echo e(__("Select pages:")); ?> <span class="text-danger">*</span></label>
                            <select required="" class="form-control select2" name="page_id" id="page_id">
                              <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($page->id); ?>"><?php echo e($page->title); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>  
                          <div id="urlbox" class="form-group col-md-3" style="display: none;">
                            <label><?php echo e(__("URL:")); ?> <span class="text-danger">*</span></label>
                            <input class="form-control" type="url" placeholder="<?php echo e(__('Enter custom URL')); ?>" name="url"
                              id="inputurl">
                          </div>
                          <div class="form-group col-md-3">
                            <label><?php echo e(__("Position:")); ?> <span class="text-danger">*</span></label>
                            <select required class="form-control select2" name="position_menu" id="position">
                              <option value="top"><?php echo e(__('Top')); ?></option>
                              <option value="footer"><?php echo e(__("Footer")); ?></option>
                            </select>
                          </div>
                          <div class="form-group col-md-3" id="footerbox" style="display: none;">
                            <label><?php echo e(__("Select footer position:")); ?> <span class="text-danger">*</span></label>
                            <select required="" class="form-control select2" name="footer" id="footer_id">
                              <option value="widget2"><?php echo e(__("Widget 2")); ?></option>
                              <option value="widget3"><?php echo e(__('Widget 3')); ?></option>
                              <option value="widget4"><?php echo e(__('Widget 4')); ?></option>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label><?php echo e(__('Status:')); ?></label>
                            <br>
                            <label class="switch">
                              <input type="checkbox" name="status" checked>
                              <span class="knob"></span>
                            </label>
                          </div>
                          <div class="form-group col-md-12">
                            <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Create")); ?></button>
                        </div>
                        </div>
                    </form>
                  <!-- form end -->
                </div>
                <!-- card body end -->
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('js/footermenu.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/menu/create.blade.php ENDPATH**/ ?>