@extends('admin.layouts.master')
@section('title', 'Edit Live Class')
@section('maincontent')
<?php
$data['heading'] = 'Edit Live Class';
$data['title'] = 'Live Class';
$data['title1'] = 'Edit Live Class';
?>
<style>
   .custom-border {
   border: 1px solid #f1f1f1; 
   padding: 10px; 
   border-radius: 5px; 
   }
</style>
@include('admin.layouts.topbar',$data)
<div class="contentbar">
    <div class="row">
@if ($errors->any())  
  <div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)     
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close" title="{{ __('Close') }}">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif

  <!-- row started -->
    <div class="col-lg-12">
         <div class="card dashboard-card m-b-30">
             <!-- Card header will display you the heading -->
            <div class="card-header">
                <h5 class="card-box"> {{ __('Edit Live Class') }}</h5>
                <div>
                        <div class="widgetbar">
                        <a href="{{url('liveclass')}}" class="btn btn-primary-rgba" title="{{ __('Back') }}"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back")}}</a>
                        </div>
                      </div>
            </div> 

             <!-- card body started -->
            <div class="card-body">
               <!-- form start -->
              <form enctype="multipart/form-data" id="demo-form2" method="post"
                  action="{{ route('liveclass.update') }}" data-parsley-validate
                  class="form-horizontal form-label-left">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="<?= $preData['classgroups'] ?>">

                  <div class="row">
                     <div class="col-md-5">
                        <label for="exampleInputDetails">{{ __('Title') }}:<sup
                           class="redstar">*</sup></label>
                        <input type="text" class="form-control " name="title" id="exampleInputTitle"
                           placeholder="Enter Your Title" value="<?= ($preData['title'] !='') ? $preData['title']:''; ?>" required>
                     </div>
                  </div>
                  <br>

                  <?php if(!empty($preData['title'])){ 
                      foreach ($preData['classgroup'] as $key => $value) { ?>
                       
                       <div class="row custom-border" disabled>
                         <div class="col-md-4">
                            <label for="exampleInputDetails">{{ __('Course') }}:<sup class="redstar">*</sup></label>
                            <select name="" id="courseidOld" class="form-control select2" required disabled>
                               <option value="">Choose Course</option>
                               @foreach($courses as $course)
                               <option value="" <?= (isset($value['course_id']) && $value['course_id'] == $course->id) ? "selected" : ""; ?>>{{ $course->title }}</option>
                               @endforeach
                            </select>
                         </div>
                         <div class="col-md-4">
                            <label for="exampleInputDetails">{{ __('Subject') }}:<sup class="redstar">*</sup></label>
                            <select name="" id="chapter_idOld" class="form-control select2" required disabled>
                               <option value="">Choose Chapter</option>
                               @foreach($CourseChapter as $chapter)
                               <option value="{{ $chapter->id }}" <?= (isset($value['chapter_id']) && $value['chapter_id'] == $chapter->id) ? "selected" : ""; ?>>{{ $chapter->chapter_name }}</option>
                               @endforeach
                            </select>
                         </div>

                         <?php if(isset($value['subject_id']) && $value['subject_id']){ ?>
                         <div class="col-md-3">
                            <label for="exampleInputDetails">{{ __('Subject') }}:<sup class="redstar">*</sup></label>
                            <select name="" id="chapter_idOld" class="form-control select2" required disabled>
                               <option value="">Choose Chapter</option>
                               @foreach($CourseSubject as $subject)
                               <option value="{{ $subject->id }}" <?= (isset($value['subject_id']) && $value['subject_id'] == $subject->id) ? "selected" : ""; ?> >{{ $subject->title }}</option>
                               @endforeach
                            </select>
                         </div>
                        <?php }else{ ?>
                         <div id="topics_dropdown" class="col-md-3">

                         </div>
                        <?php } ?>
                         <!-- <div class="col-md-1">
                            <label for="exampleInputDetails"></label>
                            <i class="fa fa-plus addBtn" style="margin-top: 35px;border: 1px solid gray;padding: 7px;background-color: #506fe4; color: white;"></i>
                         </div> -->
                      </div> <br>
                      

                  <?php } } ?>

                  <div class="row custom-border" id="row0">
                     <div class="col-md-4">
                        <label for="exampleInputDetails">{{ __('Course') }}:<sup class="redstar">*</sup></label>
                        <select name="coursegroup[0][courseid]" id="courseid" class="form-control select2">
                           <option value="">Choose Course</option>
                           @foreach($courses as $course)
                           <option value="{{ $course->id }}">{{ $course->title }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label for="exampleInputDetails">{{ __('Subject') }}:<sup class="redstar">*</sup></label>
                        <select name="coursegroup[0][chapter_id]" id="chapter_id" class="form-control select2">
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
                        <label for="exampleInputDetails">{{ __('Thumbnail Image') }}</label> 
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">{{__('Upload')}}</span>
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="thumbnail_image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01"><?= ($preData['thumbnail'] !='') ? $preData['thumbnail'] : 'Choose file'; ?></label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="exampleInputDetails">{{ __('Detail') }}:</label>
                        <textarea id="details" name="detail" rows="3" class="form-control"><?= ($preData['desc'] !='') ? $preData['desc']:''; ?></textarea>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <label for="exampleInputDetails">{{ __('URL') }}:<sup
                           class="redstar">*</sup></label>
                        <input type="text" class="form-control " name="url" id="exampleInputTitle"
                           placeholder="Enter Your Title" value="" required>
                     </div>
                     <div class="col-md-6">
                        <label for="video_type">{{ __('Video Type') }}:<sup class="redstar">*</sup></label>
                        <select name="video_type" id="video_type" class="form-control" required>
                           <option>{{ __('Choose Video Type') }}</option>
                           <option value="Y" <?= ($preData['video_type'] == 'Y') ? 'selected' :''; ?>>{{ __('Youtube') }}</option>
                        </select>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <label for="exampleInputDetails">{{ __('PDF with Annotation') }}</label> 
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">{{__('Upload')}}</span>
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="pdf_with_annotation" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01"><?= ($preData['pdf_with_annotations'] !='') ? $preData['pdf_with_annotations'] : 'Choose file'; ?></label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="exampleInputDetails">{{ __('PDF WithOut Annotation') }}</label> 
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">{{__('Upload')}}</span>
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="pdf_without_annotation" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" placeholder="<?= ($preData['pdf_without_annotations'] !='') ? $preData['pdf_without_annotations']:''; ?>">
                              <label class="custom-file-label" for="inputGroupFile01"><?= ($preData['pdf_without_annotations'] !='') ? $preData['pdf_without_annotations'] : 'Choose file'; ?></label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-6" id="liveclassBox">
                          <label for="date">{{__('Select a Date:')}}</label><br>
                          <input type="date" id="date" name="date" class="form-control" value="{{ !empty($preData['date']) ? date('Y-m-d', strtotime($preData['date'])) : '' }}">
                      </div>
                      <div class="col-md-6" id="liveclassBox">
                          <label for="time">{{__('Select Time:')}}</label><br>
                          <input type="time" id="time" name="time" class="form-control" step="1" value="{{ !empty($preData['time']) ? date('H:i:s', strtotime($preData['time'])) : '' }}">
                      </div>
                  </div>

                  <br>
                  <div class="col-md-6 btm-20 row">
                     <div class="col-md-4">
                        <label for="exampleInputDetails">{{ __('Status') }}:</label><br>
                        <label class="switch">
                        <input class="slider" type="checkbox" name="status" <?= ($preData['status'] == 'A') ? "checked" : ""; ?> />
                        <span class="knob"></span>
                        </label>
                     </div>
                     <div class="col-md-4">
                        <label for="exampleInputDetails">{{ __('Free/Paid') }}:</label><br>
                        <label class="switch">
                        <input class="slider" type="checkbox" name="pro_class" <?= ($preData['pro_class'] == '1') ? "checked" : ""; ?>/>
                        <span class="knob"></span>
                        </label>
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{__('Reset')}}</button>
                     <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                     {{__('Create')}}</button>
                  </div>
                  <div class="clear-both"></div>
            </div>

              </form>

              <!-- form end -->
            </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
@endsection
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
@section('script')

<script>
    $(".midia-toggle").midia({
        base_url: '{{ url('') }}',
        title : 'Choose Blog Image',
        dropzone : {
          acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        },
        directory_name: 'blog'
    });



    $(document).on('change', '.card-body #courseid', function() {
        var parentRow = $(this).closest('.custom-border').attr('id');
        var courseId = this.value; 
        $('#'+ parentRow).find("#chapter_id").empty().append($("<option></option>").attr("value", "").text("Choose Chapter")); 
         var urlhit = '{{ url('getChapterByCourseId') }}';
         console.log($('#'+ parentRow));
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
         var urlhit = '{{ url('getTopicsByChapterId') }}';
     
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
                       var data = "<label for='exampleInputDetails'>Subject :<sup class='redstar'>*</sup></label><select name='coursegroup["+rowNumber+"][topic_id]' id='topic_id' class='form-control select2'><option value=''>Choose Topics</option>";

       
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
          "<select name='coursegroup["+rowCount+"][courseid]' id='courseid' class='form-control select2'>" +
          "<option value=''>Choose Course</option>";

          $.each(courses, function(index, value) {
               html += "<option value='" + value.id + "'>" + value.title + "</option>";
          });


          html += "</select>" +
          "</div>" +
          "<div class='col-md-4'>" +
          "<label for='exampleInputDetails'>Subject:<sup class='redstar'>*</sup></label>" +
          "<select name='coursegroup["+rowCount+"][chapter_id]' id='chapter_id' class='form-control select2'>" +
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

<style>
    .image_size{
    height:80px;
    width:200px;
}
</style>
@endsection
<!-- This section will contain javacsript end -->