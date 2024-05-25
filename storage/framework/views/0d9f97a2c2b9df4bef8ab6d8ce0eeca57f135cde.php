
<?php $__env->startSection('title','Import User'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Import Users';
$data['title'] = 'Import Users';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar dashboard-card">
<div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="box-tittle"><?php echo e(__('Import Users')); ?></h5>
          <div class="widgetbar">
			<a href="<?php echo e(url('files/user.csv')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
				class="feather icon-arrow-down mr-2"></i><?php echo e(__('Download Example CSV File')); ?>

			</a>
		  </div>
		</div>
	   </div>
		<div class="row">
		
			<div class="col-lg-12">
				<div class="card m-b-30">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-7">
								<h5 class="box-title py-4 px-3"><?php echo e(__('Import Institute')); ?></h5>
							</div>
							<div class="col-lg-5">
								<form action="<?php echo e(route('user.csvfileupload')); ?>" method="POST" enctype="multipart/form-data">
									<?php echo e(csrf_field()); ?>

							
									<div class="row">
										<div class="form-group col-md-9">
												<label for="file"><?php echo e(__('Select CSV File :')); ?> <sup class="text-danger">*</sup>
												</label>
												<input required="" type="file" name="file" class="form-control">
												<?php if($errors->has('file')): ?>
												<span class="invalid-feedback text-danger" role="alert">
													<strong><?php echo e($errors->first('file')); ?></strong>
												</span>
											<?php endif; ?>
											</div>
											<div class="form-group col-md-3">
												<br/><p></p>
											<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
												<?php echo e(__('Submit')); ?></button>
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>
					<div class="card-body">
					
						<div class="table-responsive">
							<table id="datatable-buttons" class="table table-striped table-bordered">
								<thead>
								<tr>
                                    <th><?php echo e(__('Column No')); ?></th>
                                    <th><?php echo e(__('Column Name')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                        </tr>
					</thead>
	
					<tbody>
						<tr>
							<td><?php echo e(__('1')); ?></td>
							<td><b><?php echo e(__('First Name')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('First Name')); ?></td>
                        </tr>
                        <tr>
							<td><?php echo e(__('2')); ?></td>
							<td><b><?php echo e(__('Last Name')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Last Name')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('3')); ?></td>
							<td><b><?php echo e(__('Mobile')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Mobile')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('4')); ?></td>
							<td><b><?php echo e(__('Email')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Email')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('5')); ?></td>
							<td><b><?php echo e(__('Address')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Address')); ?></td>
						</tr>
	        			<tr>
							<td><?php echo e(__('6')); ?></td>
							<td><b><?php echo e(__('Gender')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Gender')); ?></td>
						</tr>
                        <tr>
							<td><?php echo e(__('7')); ?></td>
							<td><b><?php echo e(__('Image')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Image')); ?></td>
						</tr>
                        <tr>
							<td><?php echo e(__('8')); ?></td>
							<td><b><?php echo e(__('Verified')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Verified')); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('9')); ?></td>
							<td><b><?php echo e(__('Status')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Status')); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('10')); ?></td>
							<td><b><?php echo e(__('Role')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Role')); ?></td>
						</tr>
                        <tr>
							<td><?php echo e(__('11')); ?></td>
							<td><b><?php echo e(__('Password')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Password')); ?></td>
						</tr>
                    </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
</div>
</div>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/user/import.blade.php ENDPATH**/ ?>