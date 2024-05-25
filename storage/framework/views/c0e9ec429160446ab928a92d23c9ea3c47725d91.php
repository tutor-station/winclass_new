<!-- This will show you edit action -->
<div class="dropdown">
    <button type="button" class="btn btn-rounded btn-success-rgba btn-sm" data-toggle="modal" data-target="#updateModal<?php echo e($id); ?>" title="<?php echo e(__('Update')); ?>"><?php echo e(__('Update')); ?> </button>
   <!-- Modal -->
    <div id="updateModal<?php echo e($id); ?>" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-white"><?php echo e(__('Update Currency')); ?></h5>
                    <button type="button" class="close"
                        data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                    <div class="delete-icon"></div>
                </div>
                <div class="modal-body text-center">
                    <h4 class="modal-heading"><?php echo e(__('Update Currency')); ?></h4>
                    <p><?php echo e(__('It will also update currency rates & currency symbol')); ?></p>
                
                
                    <form method="POST" action="<?php echo e(route('currency.update',$code)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="form-group">
		                    <label for="exampleInputDetails"><?php echo e(__('Set Default')); ?>:</label><br>
		                    <label class="switch">
		                      <input class="slider" type="checkbox" name="default" <?php echo e($default == '1' ? 'checked' : ''); ?>  />
		                      <span class="knob"></span>
		                    </label>
		              	</div>
                          <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Currency Position:")); ?> <span class="text-danger">*</span></label>
                            <br>
                            <select name="position" id="position" class="form-control">
                                <option value=""><?php echo e(__("Please select currency position")); ?></option>
                                <option <?php echo e($position== 'l' ? "selected" : ""); ?> value="l"><?php echo e(__("Left side currency icon")); ?></option>
                                <option <?php echo e($position == 'r' ? "selected" : ""); ?> value="r"><?php echo e(__("Right side currency icon")); ?></option>
                            </select>
                          </div>
		              	<div class="modal-footer">
                        	<button type="reset" class="btn btn-danger-rgba translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                        	<button type="submit" class="btn btn-primary-rgba"><?php echo e(__('Yes')); ?></button>
                        </div>
                    </form>
                </div>
                
            </div>
            <!-- Modal Content ended -->
        </div>
    </div>
    <!-- Model ended -->
</div><?php /**PATH /var/www/html/resources/views/admin/currency/manage/update.blade.php ENDPATH**/ ?>