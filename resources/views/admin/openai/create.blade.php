@extends('admin.layouts.master')
@section('title', 'Add Post')
@section('maincontent')
<?php
$data['heading'] = 'Add AI Content';
$data['title'] = 'AI';
$data['title1'] = 'Add AI Content';
?>
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
                    <h5 class="card-box"> {{ __('Add Post') }}</h5>
                    <div>
                        <div class="widgetbar">
                        <a href="{{url('blog')}}" class="btn btn-primary-rgba" title="{{ __('Back') }}"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back")}}</a>
                        </div>
                      </div>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                    
                    @include('admin.openai.topbar')


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
  $("#mytext").on('submit',function (e) {
  // alert('hello');
  console.log("data");
  e.preventDefault();
  $('.service_btn').text('Please Wait..');
  $('.service_btn').prop("disabled", true);
  var formData = new FormData();
  var a = formData.append('service', $("#service").val());
  var b = formData.append('language', $("#language").val());
  var c = formData.append('keyword', $("#keyword").val());
  var baseUrl = "{{ url('/') }}";
  var urlLike2 = baseUrl+'/openai/text'; 
  $.ajax({
      type: "post",
      url: urlLike2,
      data: formData,
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      contentType: false,
      processData: false,
      success: function (data) {
          console.log(data.status);
          if(data.status == false){
              //  alert(data.msg);
              $('.service_btn').text(data.msg);
              // $('.service_btn').prop("disabled", true);
                }
                else if(data){
              // toastr.success('Generated Successfully!');
              console.log(data.html);
              z = data.code;
              $(".generator_sidebar_table").html(data.html);
              
          } else {
              $('.service_btn').text('Generate');
              toastr.error( 'Your words limit has been exceeded.' );
          }
              // $('.service_btn').prop("disabled", false);
              // $('.service_btn').text('Generate');
      },
          error: function (data) {
          // toastr.error('Error' + data.responseText);
              console.log(data);
              $('.service_btnn').prop("disabled", false);
              $('.service_btn').text('Generate');            
           }
  });
});
function generatorFormImage(ev) {
'use strict';
      ev?.preventDefault();
ev?.stopPropagation();
      $('.generate-btn-text').text('Please Wait...');
      $('.generate-btn-text').prop("disabled", true);
      document.getElementById("image-generator").disabled = true;
      document.getElementById("image-generator").innerHTML = "Please Wait...";
document.querySelector('#app-loading-indicator')?.classList?.remove('opacity-0');
      var formData = new FormData();
      formData.append('image_number_of_images', $("#image_number_of_images").val());
      formData.append('description', $("#description").val());
      formData.append('size', $("#size").val());
      var baseUrl = "{{ url('/') }}";
      var urlLike = baseUrl+'/openai/image'; 
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          },
          type: "post",
          url: urlLike,
          data: formData,
          contentType: false,
          processData: false,
          success: function (data) {
              console.log('img',data);
              if(data.status == false){
              //  alert(data.msg);
              $('.generate-btn-text').text(data.msg);
              // $('.service_btn').prop("disabled", true);
                }
              else if(data.status=='True'){
                  setTimeout(function () {
                      $(".image-output").html(data.response);
                      document.getElementById("image-generator").disabled = false;
                      document.getElementById("image-generator").innerHTML = "Regenerate";
                      document.querySelector('#app-loading-indicator')?.classList?.add('opacity-0');
                      $('.generate-btn-text').text('Generate');
                  }, 750);
              } else {
                  $('.generate-btn-text').text('Generate');
                  // toastr.error('Your image limit has been exceeded.');
              }
          },
      });
      return false;
  }
</script>


    <script>
        $(".midia-toggle").midia({
            base_url: '{{url('')}}',
            title : 'Choose Blog Image',
        dropzone : {
          acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        },
            directory_name : 'blog'
        });
    </script>
@endsection
<!-- This section will contain javacsript end -->