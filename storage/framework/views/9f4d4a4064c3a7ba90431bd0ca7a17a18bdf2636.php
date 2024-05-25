
<?php $__env->startSection('title','Invoice Design - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Invoice Design';
$data['title'] = 'Invoice Design';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>  
    <div class="alert alert-danger" role="alert">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </div>
  <?php endif; ?>
<div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__("Invoice Design")); ?> </h5>
        </div>
        <div class="card-body">
          
          <form action="<?php echo e(route('invoice.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

          
            <div class="row">
         
            
              <div class="form-group col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Logo Enable')); ?>:</label><br>
                <input  class="custom_toggle"   type="checkbox" name="logo_enable" <?php if(isset($settings->logo_enable)): ?> <?php echo e($settings->logo_enable == '1' ? 'checked' : ''); ?> <?php endif; ?>/>
                 
                  <input type="hidden" name="free" value="0" for="cb4" id="cb4">
              </div>

              <div class="form-group col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Border Enable')); ?>:</label><br>
                <input  class="custom_toggle"   type="checkbox" name="border_enable"  <?php if(isset($settings->border_enable)): ?><?php echo e($settings['border_enable'] == '1' ? 'checked' : ''); ?> <?php endif; ?>/>
                <input type="hidden"  name="free" value="0" for="cb3" id="cb3"> 
              </div>

              <div class="form-group col-md-6">
                <label class="text-dark" for="border_radius"><?php echo e(__('Border Radius')); ?> </label>
                <input min="1" class="form-control" name="border_radius" type="number" value="<?php echo e(optional($settings)->border_radius); ?>" id="duration"  placeholder="" class="<?php echo e($errors->has('border_radius') ? ' is-invalid' : ''); ?> form-control">
              </div>
                          
              <div class="form-group col-md-6">
                <label class="text-dark" for="blue_bg"><?php echo e(__('Border Color')); ?>:</label>
                <input name="border_color" class="form-control" type="color" value="<?php echo e(optional($settings)['border_color']); ?>"/>
              </div>

              <div class="form-group col-md-6"> 
                <label for="exampleInputSlug"><?php echo e(__('Border Style')); ?></label>
                <select class="form-control select2" name="border_style">
                  <option value="none" selected> 
                    <?php echo e(__('SelectanOption')); ?>

                  </option>

                  <option <?php echo e(optional($settings)->border_style == 'dashed' ? 'selected' : ''); ?> value="dashed"><?php echo e(__('Dashed')); ?></option>

                  <option <?php echo e(optional($settings)->border_style == 'solid' ? 'selected' : ''); ?> value="solid"><?php echo e(__('Solid')); ?></option>

                  <option <?php echo e(optional($settings)->border_style == 'groove' ? 'selected' : ''); ?> value="groove"><?php echo e(__('groove')); ?></option>

                  <option <?php echo e(optional($settings)->border_style == 'double' ? 'selected' : ''); ?> value="double"><?php echo e(__('double')); ?></option>
                  
                </select>

              </div>

              <div class="form-group col-md-6"> 
                <label for="exampleInputSlug"><?php echo e(__('Date format')); ?></label>
                <select class="form-control select2" name="date_format">
                  <option value="none" selected> 
                    <?php echo e(__('SelectanOption')); ?>

                  </option>

                  <option <?php echo e(optional($settings)->date_format == 'd-m-Y' ? 'selected' : ''); ?> value="d-m-Y"><?php echo e(__('d-m-Y')); ?></option>

                  <option <?php echo e(optional($settings)->date_format == 'd/m/Y' ? 'selected' : ''); ?> value="d/m/Y"><?php echo e(__('d/m/Y')); ?></option>

                  <option <?php echo e(optional($settings)->date_format == 'Y-m-d' ? 'selected' : ''); ?> value="Y-m-d"><?php echo e(__('Y-m-d')); ?></option>

                  <option <?php echo e(optional($settings)->date_format == 'jS F Y' ? 'selected' : ''); ?> value="jS F Y"><?php echo e(__('jS F Y')); ?></option>

                  <option <?php echo e(optional($settings)->date_format == 'jS F Y' ? 'selected' : ''); ?> value="jS F Y"><?php echo e(__('jS F Y')); ?></option>

                  <option <?php echo e(optional($settings)->date_format == 'jS F Y' ? 'selected' : ''); ?> value="jS F Y"><?php echo e(__('jS F Y')); ?></option>
                  
                  <option <?php echo e(optional($settings)->border_style == 'jS F Y' ? 'selected' : ''); ?> value="jS F Y"><?php echo e(__('jS F Y')); ?></option>

                  
                </select>

              </div>

           
              <div class="form-group col-md-6">
                  <label class="text-dark"><?php echo e(__('Signature')); ?> :</label>
                  <div class="input-group">
                    <input required readonly id="image" for="signature" name="signature" type="text" class="form-control">
                      <div class="input-group-append">
                          <span data-input="image"
                              class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                      </div>
                  </div>
              </div>
        <div class="col-md-6">
                  <?php if(isset($settings->signature) && $settings->signature != null): ?>
                    <img src="<?php echo e(url('/images/signature/'.$settings->signature)); ?>" class="image_size" />
                  <?php endif; ?>
              </div>
            </div>

              <div class="mt-3 col-md-12">
                <div class="form-group">
                  <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                <?php echo e(__("Update")); ?></button>
                </div>
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
<script>
  $(".midia-toggle").midia({
      base_url: '<?php echo e(url('')); ?>',
      directory_name: 'signature'
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/invoice/settings.blade.php ENDPATH**/ ?>