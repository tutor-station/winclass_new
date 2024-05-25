
<?php $__env->startSection('title','Create a new Refund Policy'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Add Refund Policy';
$data['title'] = 'Courses';
$data['title1'] = 'Refund Policies';
$data['title2'] = 'Add Refund Policies';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="box-tittle"><?php echo e(__('Add Refund Policy')); ?></h5>
          <div>
            <div class="widgetbar">
              <a href="<?php echo e(url('refundpolicy')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i
                  class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a> </div>
          </div>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="<?php echo e(url('refundpolicy/')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

        
            <div class="row">
              <div class="form-group col-md-4">
                <label for="exampleInputTit1e"><?php echo e(__('Policy Name')); ?>:<sup class="redstar">*</sup></label>
                <input type="text"  class="form-control" name="name" placeholder=" Please Enter Policy Name"  id="exampleInputTitle" value="">
              </div>
           
            <br>

            
              <div class="form-group col-md-2">
                <label for="exampleInputTit1e"><?php echo e(__('Days')); ?>:<sup class="redstar">*</sup></label>
                <input type="number"  class="form-control" name="days" placeholder=" Please Enter Return Days"  id="exampleInputTitle" value="1">
              </div>              
            
            <br>
           
              <div class="col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('Details')); ?>:<sup class="redstar">*</sup></label>
                <textarea name="detail"  rows="5" class="form-control" placeholder="Enter Policy Details"></textarea>
                <br>
              </div>


              
              <div class="form-group col-md-6">                 
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
                <input id="123"  type="checkbox" class="custom_toggle" name="status" checked />
              </div>

              
            </div>
            <br>

            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
               <?php echo e(__('Create')); ?> </button>
            </div>

            <div class="clear-both"></div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>



  <script>
tinymce.init({
  selector: '#editor1,#editor2,.editor',
  height: 350,
  menubar: 'edit view insert format tools table tc',
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks fullscreen',
    'insertdatetime media table paste wordcount'
  ],
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
});
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/return_policy/insert.blade.php ENDPATH**/ ?>