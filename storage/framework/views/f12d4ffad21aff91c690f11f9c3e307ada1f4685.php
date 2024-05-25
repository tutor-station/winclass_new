
<?php $__env->startSection('title','Import Question'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Question';
$data['title'] = 'Import Question';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
<div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="box-tittle"><?php echo e(__('Import')); ?> <?php echo e(__('Question')); ?></h5>
		  <div>
			<div class="widgetbar">
			  <a href="<?php echo e(url('files/QuizQuestion.csv')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
				  class="feather icon-arrow-down mr-2"></i><?php echo e(__('Back')); ?><?php echo e(__('Download Example xls/csv File')); ?></a> </div>
		  </div>
        </div>
        <div class="card-body">
			<form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

		  
		  <div class="row">
			  <div class="form-group col-md-6">
			   <label for="file"><?php echo e(__('Back')); ?><?php echo e(__('Select xls/csv File :')); ?></label>
				<input required="" type="file" name="file" class="form-control">
				<?php if($errors->has('file')): ?>
				  <span class="invalid-feedback text-danger" role="alert">
					  <strong><?php echo e($errors->first('file')); ?></strong>
				  </span>
			   <?php endif; ?>
			  <br>
			   <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                <?php echo e(__('Back')); ?><?php echo e(__('Submit')); ?></button>
			  </div>

			  
		  </div>

		  </form>
		</div>
		<div class="row">
		
			<div class="col-lg-12">
				<div class="card m-b-30">
					<div class="card-header">
						<h5 class="box-title"><?php echo e(__('Back')); ?><?php echo e(__('Import Question')); ?></h5>
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
							<td><b><?php echo e(__('Course')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Name of course')); ?></td>
	
							
						</tr>
	
						<tr>
							<td><?php echo e(__('2')); ?></td>
							<td><b><?php echo e(__('QuizTopic')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Name of Quiz Topic')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('3')); ?></td>
							<td><b><?php echo e(__('Question')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Name of Question')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('4')); ?></td>
							<td><b><?php echo e(__('A')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Option A.')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('5')); ?></td>
							<td><b><?php echo e(__('B')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Option B.')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('6')); ?></td>
							<td><b><?php echo e(__('C')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Option C.')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('7')); ?></td>
							<td><b><?php echo e(__('D')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Option D.')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('8')); ?></td>
							<td><b><?php echo e(__('CorrectAnswer')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Question correct answer -> options')); ?> (a,b,c,d)</td>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiz/importindex.blade.php ENDPATH**/ ?>