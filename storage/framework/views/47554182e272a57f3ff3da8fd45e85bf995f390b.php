
<?php $__env->startSection('title','Assign Questions'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Manage Test';
$data['title'] = 'Assign Questions';
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
            <h5 class="box-title"><?php echo e(__('Assign Questions')); ?></h5>

            <div>
               <div class="widgetbar">
                    <h5 class="box-title"><?php echo e(__('Total Question')); ?> : <?php echo e($count_array); ?></h5>
               </div>
            </div>
         </div>
         <div class="card-body">
          <form id="assignQuestionFrom">
            <!-- <form method="post" action="<?php echo e(route('assignQuestions.store')); ?>" id="assignQuestionFrom"> -->

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
                     </tr>
                  </thead>
                  <tbody></tbody>
               </table>
            </div>
             <div class="text-center mt-3"> 
               <button type="submit" class="btn btn-primary btn-lg">Assign Question</button>
               <button type="button" class="btn btn-secondary btn-lg">Reset</button>
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
          ajax: "<?php echo e(route('assignQuestions.show', $id)); ?>",
          lengthMenu: [[-1], ["All"]],
          paging: false,
          info: false,
          columns: [
              {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
              {data: 'id', name: 'quiz.id'},
              {data: 'question', name: 'quiz.question', orderable: false, searchable: false},
              {data: 'a', name: 'quiz.a', orderable: false, searchable: false},
              {data: 'b', name: 'quiz.b', orderable: false, searchable: false},
              {data: 'c', name: 'quiz.c', orderable: false, searchable: false},
              {data: 'd', name: 'quiz.d', orderable: false, searchable: false},
              {data: 'answer', name: 'quiz.answer', orderable: false, searchable: false}
          ]
      });

    });
</script>

<script>
 
    $(document).ready(function() {
       // Event delegation to capture form submission
       $(document).on('submit', '#assignQuestionFrom', function(e) {
           e.preventDefault(); // Prevent default form submission
           
           var formData = $(this).serializeArray(); 
           
           $.ajax({
               url: '<?php echo e(route("assignQuestions.store")); ?>',
               method: 'POST',
               data: formData,
               success: function(response) {

                    if (response.success) {
                        window.location.href = "<?php echo e(route('assignQuestions.show', $id)); ?>"; // Show success message
                        // You can perform any other actions here after successful response
                    } else {
                        alert('Failed to add questions.'); // Show failure message
                    }

               },
               error: function(xhr, status, error) {
                   // Handle error
               }
           });
       });
   });

</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/quiz/assignAllquestions.blade.php ENDPATH**/ ?>