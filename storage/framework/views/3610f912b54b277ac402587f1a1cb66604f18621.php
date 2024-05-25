
<?php $__env->startSection('title', 'Contact Form Messages'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Contact Form Messages';
$data['title'] = 'Contact Form Messages';
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
                    <h5 class="card-box"><?php echo e(__('Contact Form Messages')); ?></h5>
                    <div>
                        <div class="widgetbar">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us.manage')): ?>
                        <button type="button" class="float-right btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i
                                  class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
                                  <a href="<?php echo e(url('contactreason/create')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Add Reason')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Reason')); ?></a>
                      
                                  <?php endif; ?>
                        </div>
                      </div>
                </div> 
                <!-- card body started -->
                <div class="card-body">
                <div class="table-responsive">
                        <!-- table to display faq start -->
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <th>
                                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                value="all" />
                                <label for="checkboxAll" class="material-checkbox"></label>   # 
                            </th>
                            <th><?php echo e(__('Name')); ?></th>
                              <th><?php echo e(__('Phone')); ?></th>
                              <th><?php echo e(__('Email')); ?></th>
                              <th><?php echo e(__('Message')); ?></th>
                              <th><?php echo e(__('Action')); ?></th>
                        </thead>

                        <tbody>
                        <?php $i=0;?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++;?>
                              <tr>
                              <td>
                                                     
                            <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                name='checked[]' value='<?php echo e($item->id); ?>' id='checkbox<?php echo e($item->id); ?>'>
                            <label for='checkbox<?php echo e($item->id); ?>' class='material-checkbox'></label>
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
                                        <p><?php echo e(__('Do you really want to delete selected item ? This process
                                            cannot be undone')); ?>.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form id="bulk_delete_form" method="post"
                                            action="<?php echo e(route('contactus.bulk.delete')); ?>">
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
                                <td><?php echo e($item->fname); ?></td>
                                <td><?php echo e($item->mobile); ?></td>
                                <td><?php echo e($item->email); ?></td>  
                                <td><?php echo e(str_limit($item->message, $limit = 50, $end = '...')); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us.manage')): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('usermessage.edit',$item->id)); ?>" title="<?php echo e(__('View')); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__('View')); ?></a>
                                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($item->id); ?>" title="<?php echo e(__('Delete')); ?>">
                                                <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <!-- delete Modal start -->
                                    <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        <p><?php echo e(__('Do you really want to delete')); ?> <b><?php echo e($item->fname); ?></b> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="<?php echo e(url('usermessage/'.$item->id)); ?>" class="pull-right">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field("DELETE")); ?>

                                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
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
                        <!-- table to display faq data end -->                
                    </div><!-- table-responsive div end -->
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/contact/index.blade.php ENDPATH**/ ?>