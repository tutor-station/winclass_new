
<?php $__env->startSection('title', 'Update Process - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = '    Dashboard';
$data['title'] = 'Update Process';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <div class="col-lg-12">

    <div class="alert alert-success alert-dismissible fade show">


        <span id="update_text">
          
        </span>

        <form action="<?php echo e(url("/merge-quick-update")); ?>" method="POST" class="float-right updaterform">
            <?php echo csrf_field(); ?>
            <input required type="hidden" value="" name="filename">
            <input required type="hidden" value="" name="version">
            <button class="btn btn-sm btn-primary-rgba">
              <i class="feather icon-check-circle"></i> <?php echo e(__("Update Now")); ?>

            </button>
        </form>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

    </div>
</div>
    <!-- row started -->
    <div class="col-lg-12">
    
        <div class="card m-b-30">
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Update Process')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body bg-primary-rgba ml-5 mr-5 mb-5">
                <!-- ===================== -->
          <small class="text-info process-fonts"><i class="fa fa-info-circle"></i> <?php echo e(__('Important Note:')); ?>


    <br>
<ul class="process-font">
    <li><?php echo e(__('Note: Before Update Take Backup of All Files And Database. Make .zip file and download all file, Go To phpmyadmin and select your database and export it.')); ?><br/></li>
    <li>Copy All files and paste to you folder replace file. Only be careful when replace files in public folder, don't copy<code> .env </code>file. Any user customize design and code please do not update.</li>
    <li><?php echo e(__('Update to Latest Version')); ?> </li>
    <li>Copy All files of folder and paste to you folder and replace files, only be careful when replace files in public folder, don't copy<code> .env </code>file.Any user customize design and code please do not update.</li>
    <li><?php echo e(__('After replacing the files successfully ')); ?>

    <li><?php echo e(__('login with admin goto yourdomain.com/ota/update. If your domain contain public then goto ')); ?></li>
    <li><?php echo e(__('yourdomain.com/public/ota/update')); ?></li><li>.<?php echo e(__(' Read update pre-notes and FAQ properly, then check the agreement box and click on update. After the update completion you will be redirected to yourdomain with a successful update message.')); ?></li>
    <li><?php echo e(__(' Once the process is complete you will see a successful message on your home page.')); ?></li>
    <li><?php echo e(__('You successfully upgraded to latest version ')); ?></li>

</ul>
</small>

        <!-- ===================== -->
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
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/manual/process.blade.php ENDPATH**/ ?>