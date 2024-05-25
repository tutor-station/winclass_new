
<?php $__env->startSection('title','View Assigned Questions'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Manage Test';
$data['title'] = 'View Assigned Questions';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
<div class="row">
   <?php if($errors->any()): ?>
   <div class="alert alert-danger">
      <ul>
         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li><?php echo e($error); ?></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
   </div>
   <?php endif; ?>
   <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
         <div class="card-header">
            <h5 class="box-title"><?php echo e(__('View Assigned Questions')); ?></h5>
         </div>
         <div class="card-body">
          <form id="assignQuestionFrom">

            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
               <input id="topic_id" type="hidden" class="filled-in" name="topic_id" value="<?= $id ?>" />
            <div class="table-responsive">
               <table id="assignQuestionsTable" class="table table-striped table-bordered" style="width: 100%">
                  <thead>
                     <tr>
                        <th></th>
                        <th>#</th>
                        <th><?php echo e(__('Question')); ?></th>
                        <th><?php echo e(__('A')); ?></th>
                        <th><?php echo e(__('B')); ?></th>
                        <th><?php echo e(__('C')); ?></th>
                        <th><?php echo e(__('D')); ?></th>
                        <th><?php echo e(__('Answer')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                     </tr>
                  </thead>
                  <tbody></tbody>
               </table>
            </div>
          </form>

         </div>
      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(function () {
      
      var table = $('#assignQuestionsTable').DataTable({
          processing: true,
          serverSide: true,
          searchDelay: 1000,
          stateSave: true,
          ajax: "<?php echo e(route('viewAssignedQuestions.show', $id)); ?>",
          // lengthMenu: [[-1], ["All"]],
          // paging: false,
          // info: false,
          columns: [
              {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
              {data: 'id', name: 'quiz.id'},
              {data: 'question', name: 'quiz.question', orderable: false, searchable: false},
              {data: 'a', name: 'quiz.a', orderable: false, searchable: false},
              {data: 'b', name: 'quiz.b', orderable: false, searchable: false},
              {data: 'c', name: 'quiz.c', orderable: false, searchable: false},
              {data: 'd', name: 'quiz.d', orderable: false, searchable: false},
              {data: 'answer', name: 'quiz.answer', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiz/viewaAssignedQuestions.blade.php ENDPATH**/ ?>