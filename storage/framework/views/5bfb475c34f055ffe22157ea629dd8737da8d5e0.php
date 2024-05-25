
<?php $__env->startSection('title', 'Meeting Record - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Meeting Record';
$data['title'] = 'Meeting Record';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
    <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('Meeting Record')); ?></h5>
					<div>
						<div class="widgetbar">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('meetings.meeting-recordings.create')): ?>
								  <a  href="<?php echo e(url('meeting-recordings/create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Meetingrecord")); ?></a>
							<?php endif; ?>
						</div>                        
					  </div>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
							<th>
								#
							</th>
							
							<th>
								<?php echo e(__('Meeting')); ?> <?php echo e(__('Name')); ?>  
							</th>
							<th>
								<?php echo e(__('Edit')); ?> 
							</th>
							<th>
								<?php echo e(__('Meeting')); ?> <?php echo e(__('URL')); ?> 
							</th>
							
						</thead>
			
						<tbody>
							<?php $i=0;?>
			
							<?php $__currentLoopData = $recordings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recording): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $i++;?>
								<tr>
									<td><?php echo $i;?></td>
									<td><b><?php echo e($recording->title); ?></b></td>
									<td>
										<a   href="<?php echo e(url('meeting-recordings/'.$recording->id)); ?>" class="btn btn-primary-rgba"><i class="feather icon-edit-2"></i></a>
										
										
									  </td>
									
									<td>
			
										 <a href="<?php echo e($recording->url); ?>" target="_blank" class="btn btn-primary-rgba"> <?php echo e(__('View')); ?>  <?php echo e(__('Recording')); ?>  </a>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/meeting_recording/index.blade.php ENDPATH**/ ?>