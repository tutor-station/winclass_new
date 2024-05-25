<!-- This will show you edit and delete action -->
<div class="dropdown">
    <button type="button" class="btn btn-rounded btn-danger-rgba btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo e($id); ?>" title="<?php echo e(__('Delete')); ?>"><?php echo e(__('Delete')); ?> </button>
   
    
    <!-- Modal -->
    <div id="deleteModal<?php echo e($id); ?>" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                        data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                    <div class="delete-icon"></div>
                </div>
                <div class="modal-body text-center">
                    <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                    <p><?php echo e(__('Do you really want to delete this currency? This process cannot be undone.')); ?></p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="<?php echo e(route('currency.destroy',$code)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button type="reset" class="btn btn-gray-rgba translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                        <button type="submit" class="btn btn-danger-rgba"><?php echo e(__('Yes')); ?></button>
                    </form>
                </div>
            </div>
            <!-- Modal Content ended -->
        </div>
    </div>
    <!-- Model ended -->
</div><?php /**PATH /var/www/html/resources/views/admin/currency/manage/action.blade.php ENDPATH**/ ?>