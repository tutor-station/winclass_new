

<?php $__env->startSection('title','Player Customizations'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Player Customizations';
$data['title'] = 'Player Settings';
$data['title1'] = 'Player Customizations';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__("Player Customizations")); ?> </h5>
        </div>
        <div class="card-body">
          
          <form action="<?php echo e(route('player.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

          
          <div class="row">
             <div class="form-group col-md-3">
              <label for="exampleInputDetails"><?php echo e(__('Logo Enable')); ?>:</label><br>
              <input  class="custom_toggle"   type="checkbox" name="logo_enable"  <?php echo e(optional($ps)->logo_enable == '1' ? 'checked' : ''); ?> />
               <input type="hidden" name="free" value="0" for="cb4" id="cb4"> 
                 </div>
                 <div class="form-group col-md-3">
                  <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Image')); ?>: </label>
                  <small class="text-muted"><i class="fa fa-question-circle"></i>
                    <?php echo e(__('Recommended size')); ?><?php echo e(__(' 104 x 36px')); ?></small>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="logo"  class="custom-file-input" id="user_img_one" value="<?php echo e(optional($ps)['logo']); ?>" id="logo" class="<?php echo e($errors->has('logo') ? ' is-invalid' : ''); ?> aria-describedby="inputGroupFileAddon01" onchange="readURL(this);">
                      <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose File')); ?></label>
                    </div>
                  </div>
                  <div class="thumbnail-img-block mb-3">
                    <?php if(optional($ps)['logo'] !=""): ?>
              
                    <div class="logo-settings">
                      <img src="<?php echo e(url('/content/minimal_skin_dark/'.$ps['logo'])); ?>" alt="<?php echo e(optional($ps)['logo']); ?>" id="logo" class="img-responsive image_size">
                    </div>
                  <?php else: ?>
                    <div class="alert alert-danger">
                      <?php echo e(__('No logo found')); ?>

                    </div> 
                    <?php endif; ?>          
                     </div>   
                </div>
            <div class="form-group col-md-3">
              <label for="exampleInputDetails"><?php echo e(__('Share Enable')); ?>:</label><br>
              <input  class="custom_toggle"   type="checkbox" name="share_enable" <?php echo e(optional($ps)['share_enable'] == '1' ? 'checked' : ''); ?>/>
              <input type="hidden"  name="free" value="0" for="cb3" id="cb3"> 
            </div>
            <div class="form-group col-md-3">
              <label for="exampleInputDetails"><?php echo e(__('Auto Play')); ?>:</label><br>
              <input  class="custom_toggle"   type="checkbox" name="autoplay"  <?php echo e(optional($ps)['autoplay'] == '1' ? 'checked' : ''); ?>/>
              <input type="hidden"  name="free" value="0" for="cb6" id="cb6"> 
              <br>
              <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('If autoplay is enable audio is automatically mute')); ?>.</small>
            </div>
            <div class="form-group col-md-3">
              <label for="exampleInputDetails"><?php echo e(__("Video Download Enable:")); ?></label><br>
              <input  class="custom_toggle"   type="checkbox" name="download" <?php echo e(optional($ps)['download'] == '1' ? 'checked' : ''); ?>/>
              <input type="hidden"  name="free" value="0" for="cb7" id="cb7"> 
            </div>
          
            <div class="form-group col-md-3">
              <div class="form-group">
                  <label class="text-dark" ><?php echo e(__('Subtitle Font Size')); ?> : </label>
                  <input min="1" name="subtitle_font_size" class="form-control" type="number" value="<?php echo e(optional($ps)['subtitle_font_size']); ?>"/>
              </div>
            </div>

            <div class="form-group col-md-2">
            
              <div class="form-group">
                <label class="text-dark" for="subtitle_color"><?php echo e(__('Subtitles Color')); ?>:</label>
                <input name="subtitle_color" class="form-control" type="color" value="<?php echo e(optional($ps)['subtitle_color']); ?>"/>
                
              </div>

            </div>
          </div>
         
          <div class="form-group">
            <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
            <?php echo e(__("Update")); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
  <script>
    $(function() {
        $('#logo_chk').change(function() {
          $('#status').val(+ $(this).prop('checked'))
          var st = $('#status').val();
          if(st==1)
          {
            $('#logo_upl').show();
            $('#logo_pre').show();
          }
          else
          {
            $('#logo_upl').hide();
            $('#logo_pre').hide();
          }
        })
      })

      $(function() {
        $('#share_chk').change(function() {
          $('#share_opt').val(+ $(this).prop('checked'))
        })
      })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/playersetting/edit.blade.php ENDPATH**/ ?>