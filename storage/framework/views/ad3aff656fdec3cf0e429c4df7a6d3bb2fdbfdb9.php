
<?php $__env->startSection('title', 'Language - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Language';
$data['title'] = 'Site Setting';
$data['title1'] = 'Language';
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
                    <h5 class="card-box"><?php echo e(__('Language')); ?></h5>
                    <div>
                        <div class="widgetbar">
                        <button type="button" class="float-right btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i
                class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?> </button>
                    <a href="<?php echo e(action('LanguageController@create')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Add Language')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Language')); ?></a>
                   
                        </div>
                        </div>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#facebook" role="tab" aria-controls="home" aria-selected="true" title="<?php echo e(__('Language')); ?>"><?php echo e(__('Language')); ?></a>
                        </li>
                                             
                    </ul>
                    <div class="tab-content" id="defaultTabContent">
                        <!-- === language start ======== -->
                        <div class="tab-pane fade show active" id="facebook" role="tabpanel" aria-labelledby="home-tab">
                            <!-- === language form start ======== -->
                            <?php echo $__env->make('admin.language.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- === language form end ===========-->    
                        </div>
                          <!-- === language end ======== -->

                          <!-- === frontstatic start ======== -->
                        
                        <!-- === frontstatic end ======== -->
                    </div>
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<script>
    $("#checkboxAll").on('click', function () {
$('input.check').not(this).prop('checked', this.checked);
});
</script>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/language/show.blade.php ENDPATH**/ ?>