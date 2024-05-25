
<?php $__env->startSection('title', 'Add Live Class'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
   $data['heading'] = 'Add Live Class';
   $data['title'] = 'Live Classes';
   $data['title1'] = 'Add Live Class';
   ?>
<style>
   .custom-border {
   border: 1px solid #f1f1f1; 
   padding: 10px; 
   border-radius: 5px; 
   }
</style>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
   <div class="row">
      <?php if($errors->any()): ?>  
      <div class="alert alert-danger" role="alert">
         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
         <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
            <span aria-hidden="true" style="color:red;">&times;</span></button>
         </p>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      </div>
      <?php endif; ?>
      <div class="col-lg-12">
         <div class="card dashboard-card m-b-30">
            <div class="card-header">
               <h5 class="card-box"> <?php echo e(__('Add Live Class')); ?></h5>
               <div>
                  <div class="widgetbar">
                     <a href="<?php echo e(url('liveclass')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <form enctype="multipart/form-data" id="demo-form2" method="post"
                  action="<?php echo e(route('liveclass.store')); ?>" data-parsley-validate
                  class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <div class="row">
                     <div class="col-md-5">
                        <label for="exampleInputDetails"><?php echo e(__('Title')); ?>:<sup
                           class="redstar">*</sup></label>
                        <input type="text" class="form-control " name="title" id="exampleInputTitle"
                           placeholder="Enter Your Title" value="" required>
                     </div>
                  </div>
                  <br>
                  <div class="row custom-border" id="row0">
                     <div class="col-md-4">
                        <label for="exampleInputDetails"><?php echo e(__('Course')); ?>:<sup class="redstar">*</sup></label>
                        <select name="coursegroup[0][courseid]" id="courseid" class="form-control select2" required>
                           <option value="">Choose Course</option>
                           <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label for="exampleInputDetails"><?php echo e(__('Subject')); ?>:<sup class="redstar">*</sup></label>
                        <select name="coursegroup[0][chapter_id]" id="chapter_id" class="form-control select2" required>
                           <option value="">Choose Chapter</option>
                        </select>
                     </div>
                     <div id="topics_dropdown" class="col-md-3">
                     </div>
                     <div class="col-md-1">
                        <label for="exampleInputDetails"></label>
                        <i class="fa fa-plus addBtn" style="margin-top: 35px;border: 1px solid gray;padding: 7px;background-color: #506fe4; color: white;"></i>
                     </div>
                  </div>
                  <br>
                  <div class="NewClone">

                  </div>
                  
                  <div class="row">
                     <div class="col-md-6">
                        <label for="exampleInputDetails"><?php echo e(__('Thumbnail Image')); ?></label> 
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="thumbnail_image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="exampleInputDetails"><?php echo e(__('Detail')); ?>:</label>
                        <textarea id="details" name="detail" rows="3" class="form-control"></textarea>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <label for="exampleInputDetails"><?php echo e(__('URL')); ?>:<sup
                           class="redstar">*</sup></label>
                        <input type="text" class="form-control " name="url" id="exampleInputTitle"
                           placeholder="Enter Your Title" value="" required>
                     </div>
                     <div class="col-md-6">
                        <label for="video_type"><?php echo e(__('Video Type')); ?>:<sup class="redstar">*</sup></label>
                        <select name="video_type" id="video_type" class="form-control" required>
                           <option><?php echo e(__('Choose Video Type')); ?></option>
                           <option value="Y"><?php echo e(__('Youtube')); ?></option>
                        </select>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <label for="exampleInputDetails"><?php echo e(__('PDF with Annotation')); ?></label> 
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="pdf_with_annotation" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="exampleInputDetails"><?php echo e(__('PDF WithOut Annotation')); ?></label> 
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="pdf_without_annotation" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-6" id="liveclassBox">
                        <label for="appt"><?php echo e(__('Select a Date :')); ?></label><br>
                        <input type="date" id="date" name="date" placeholder="dd/mm/yyyy" class="form-control">
                     </div>
                     <div class="col-md-6" id="liveclassBox">
                        <label for="appt"><?php echo e(__('Select Time:')); ?></label><br>
                        <input type="time" id="time" name="time" placeholder="HH:MM:SS" class="form-control" step="1">
                     </div>
                  </div>
                  <br>
                  <div class="col-md-6 btm-20 row">
                     <div class="col-md-4">
                        <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                        <label class="switch">
                        <input class="slider" type="checkbox" name="status" checked />
                        <span class="knob"></span>
                        </label>
                     </div>
                     <div class="col-md-4">
                        <label for="exampleInputDetails"><?php echo e(__('Free/Paid')); ?>:</label><br>
                        <label class="switch">
                        <input class="slider" type="checkbox" name="pro_class" />
                        <span class="knob"></span>
                        </label>
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                     <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                     <?php echo e(__('Create')); ?></button>
                  </div>
                  <div class="clear-both"></div>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
<br><br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
   $(".midia-toggle").midia({
       base_url: '<?php echo e(url('')); ?>',
       title : 'Choose Blog Image',
   dropzone : {
     acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
   },
       directory_name : 'blog'
   });
   
   
   // $('#courseid').on('change', function() {
   //   var courseId = this.value; 
   //   $("#chapter_id").empty().append($("<option></option>").attr("value", "").text("Choose Chapter")); // Add empty option
   //   var urlhit = '<?php echo e(url('getChapterByCourseId')); ?>';
     
   //   if (courseId) {
   //       $.ajax({
   //           headers: {
   //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //           },
   //           type: "GET",
   //           url: urlhit,
   //           data: {
   //               courseId: courseId
   //           },
   //           success: function(data) {
   //               $.each(data, function(key, value) {   
   //                   $('#chapter_id').append($("<option></option>").attr("value", key).text(value)); 
   //               });
   //           },
   //           error: function(XMLHttpRequest, textStatus, errorThrown) {
   //               console.log(XMLHttpRequest);
   //           }
   //       });
   //   }
   // });


    $(document).on('change', '.card-body #courseid', function() {
        var parentRow = $(this).closest('.custom-border').attr('id');
        console.log(parentRow);

        var courseId = this.value; 
        $('#'+ parentRow).find("#chapter_id").empty().append($("<option></option>").attr("value", "").text("Choose Chapter")); 
         var urlhit = '<?php echo e(url('getChapterByCourseId')); ?>';
         
         if (courseId) {
             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type: "GET",
                 url: urlhit,
                 data: {
                     courseId: courseId
                 },
                 success: function(response) {
                  console.log(response);
                     $.each(response, function(key, value) {   
                         $('#'+ parentRow).find('#chapter_id').append($("<option></option>").attr("value", key).text(value)); 
                     });
                 },
                 error: function(XMLHttpRequest, textStatus, errorThrown) {
                     console.log(XMLHttpRequest);
                 }
             });
         }

    });


    $(document).on('change', '.card-body #chapter_id', function() {
        var parentRow = $(this).closest('.custom-border').attr('id');
        var rowNumber = parseInt(parentRow.replace('row', ''));
        var chapterId = this.value; 
        $('#'+ parentRow).find("#topic_id").empty().append($("<option></option>").attr("value", "").text("Choose Topic")); 
         var urlhit = '<?php echo e(url('getTopicsByChapterId')); ?>';
     
         if (chapterId) {
             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type: "GET",
                 url: urlhit,
                 data: {
                     chapterId: chapterId
                 },
                 success: function(response) {
                  console.log(response);
                   if (response.length > 0) {
                       var data = "<label for='exampleInputDetails'>Subject :<sup class='redstar'>*</sup></label><select name='coursegroup["+rowNumber+"][topic_id]' id='topic_id' class='form-control select2' required><option value=''>Choose Topics</option>";

       
                       $.each(response, function(index, value) {
                           data += "<option value='" + value.id + "'>" + value.title + "</option>";
                       });
       
                       data += "</select>";
                       $('#'+ parentRow).find("#topics_dropdown").html(data);
                   } else {
                       $('#'+ parentRow).find("#topics_dropdown").html(""); 
                   }
                 },
                 error: function(XMLHttpRequest, textStatus, errorThrown) {
                     console.log(XMLHttpRequest);
                 }
             });
         }

    });


  var rowCount = 1; // Initialize row count

  $('.addBtn').click(function() {
      
      var courses = <?= $courses ?>;
      console.log(courses);
      var html = "<div class='row custom-border' id='row" + rowCount + "'>" +
          "<div class='col-md-4'>" +
          "<label for='exampleInputDetails'>Course:<sup class='redstar'>*</sup></label>" +
          "<select name='coursegroup["+rowCount+"][courseid]' id='courseid' class='form-control select2' required>" +
          "<option value=''>Choose Course</option>";

          $.each(courses, function(index, value) {
               html += "<option value='" + value.id + "'>" + value.title + "</option>";
          });


          html += "</select>" +
          "</div>" +
          "<div class='col-md-4'>" +
          "<label for='exampleInputDetails'>Subject:<sup class='redstar'>*</sup></label>" +
          "<select name='coursegroup["+rowCount+"][chapter_id]' id='chapter_id' class='form-control select2' required>" +
          "<option value=''>Choose Chapter</option>";



          html += "</select>" +
          "</div>" +
          "<div id='topics_dropdown' class='col-md-3'></div>" +
          "<div class='col-md-1'>" +
          "<label for='exampleInputDetails'></label>" +
          "<i class='fa fa-minus addBtn' data-row='" + rowCount + "' style='margin-top: 35px;border: 1px solid gray;padding: 7px;background-color: #bb2124; color: white;'></i>" +
          "</div>" +
          "</div><br>";

      $('.NewClone').append(html);
      rowCount++; // Increment row count
  });

  $('.NewClone').on('click', '.fa-minus', function() {
    var rowId = $(this).data('row');
    var row = $('#row' + rowId);
    var br = row.next('br'); // Select the <br> tag after the row
    row.remove(); // Remove the row
    br.remove(); // Remove the <br> tag
});

   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/courseclass/createLiveClass.blade.php ENDPATH**/ ?>