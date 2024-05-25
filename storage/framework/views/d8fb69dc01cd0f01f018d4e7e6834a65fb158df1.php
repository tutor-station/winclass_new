
<?php $__env->startSection('title', 'Jitsmeeting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Jitsi Meetings';
$data['title'] = 'Meetings';
$data['title1'] = 'Jitsi Meetings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
		<div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('Jitsi Meetings')); ?></h5>
					<div>
						<div class="widgetbar">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('meetings.jitsi-meet.create')): ?>
							<a href="<?php echo e(route('jitsi.create')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Add Jitsi Meeting')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Jitsi Meeting")); ?></a>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('meetings.jitsi-meet.delete')): ?>
							<a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></a>
						  <?php endif; ?>                      
							<div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-center">
											<p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
										</div>
										<div class="modal-footer">									  
										  
											<form method="post" action="<?php echo e(action('BulkdeleteController@jitsimeetingdeleteAll')); ?>

											" id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
											<?php echo e(csrf_field()); ?>

										  
											<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
											<button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
										 </form>
										</div>
									</div>
								</div>
							</div>
						</div>                        
					  </div>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
								<th>
									<input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
									<label for="checkboxAll" class="material-checkbox"></label> 
	                                      #
									</th>
									<th>
										<?php echo e(__('Meeting ID')); ?>

									</th>
								
									<th>
										<?php echo e(__('Action')); ?>

									</th>
								</thead>
				  
								<tbody>
				  
								<?php
										$i = 0;
									?>
				  
									<?php $__currentLoopData = $jitsimeeting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  
										<?php
											$i++;
										?>
									  <tr>
										  <td>
											<input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($meeting->id); ?>" id="checkbox<?php echo e($meeting->id); ?>">
											<label for="checkbox<?php echo e($meeting->id); ?>" class="material-checkbox"></label>
											<?php echo e($i); ?>

										  </td>
				  
										  <td>
											  <p><b><?php echo e(__('Meeting ID')); ?>: </b><?php echo e($meeting['meeting_id']); ?> </p>
											  <p><b><?php echo e(__('Meeting Topic')); ?>: </b><?php echo e($meeting['meeting_title']); ?> </p>
											  <p><b><?php echo e(__('Agenda')); ?>: </b><?php echo e(Illuminate\Support\Str::limit($meeting['agenda'], 20)); ?>

												
											</p>
											  <p><b><?php echo e(__('Start Time')); ?>: </b><?php echo e($meeting['start_time']); ?></p>
											  <p><b><?php echo e(__('End Time')); ?>: </b><?php echo e($meeting['end_time']); ?></p>
											  <p><b><?php echo e(__('Duration')); ?>: </b><?php echo e($meeting['duration']); ?></p>	
										  </td>
										  <td>
											<div class="dropdown">
												<button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
												<div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
													<a title="Start Meeting" target="_blank" href="<?php echo e(url('meetup-conferencing/'.$meeting->meeting_id)); ?>" class="dropdown-item" title="<?php echo e(__('Start Meeting')); ?>"><i class="feather icon-send mr-2"></i><?php echo e(__("Start Meetings")); ?></a>
													<a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm" title="<?php echo e(__('Delete')); ?>"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
													
												</div>
											</div>
										</td>
										  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
													</div>
													<div class="modal-footer">
														<form method="post" action="<?php echo e(route('deletemeeting.jitsi',$meeting['meeting_id'])); ?>" class="pull-right">
															<?php echo e(csrf_field()); ?>

															<?php echo e(method_field("DELETE")); ?>

														<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
														<button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
													</form>
													</div>
												</div>
											</div>
										</div>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/jitsimeeting/dashboard.blade.php ENDPATH**/ ?>