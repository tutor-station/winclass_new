@extends('admin.layouts.master')
@section('title','Assign Questions')
@section('maincontent')
<?php
$data['heading'] = 'Manage Test';
$data['title'] = 'Assign Questions';
?>
@include('admin.layouts.topbar',$data)
<div class="contentbar">
<div class="row">
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
   <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
         <div class="card-header">
            <h5 class="box-title">{{ __('Assign Questions') }}</h5>

            <div>
               <div class="widgetbar">
                    <h5 class="box-title">{{ __('Total Question') }} : {{ $count_array }}</h5>
               </div>
            </div>
         </div>
         <div class="card-body">
          <form id="assignQuestionFrom">
            <!-- <form method="post" action="{{ route('assignQuestions.store') }}" id="assignQuestionFrom"> -->

            @csrf
            @method('POST')
               <input id="topic_id" type="hidden" class="filled-in" name="topic_id" value="<?= $id ?>" />
            <div class="table-responsive">
               <table id="assignQuestionsTable" class="table table-striped table-bordered" style="width: 100%">
                  <thead>
                     <tr>
                        <th></th>
                        <th>#</th>
                        <th>{{ __('Question') }}</th>
                        <th>{{ __('A') }}</th>
                        <th>{{ __('B') }}</th>
                        <th>{{ __('C') }}</th>
                        <th>{{ __('D') }}</th>
                        <th>{{ __('Answer') }}</th>
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

  @endsection
@section('script')
<script type="text/javascript">
    $(function () {
      
      var table = $('#assignQuestionsTable').DataTable({
          processing: true,
          serverSide: true,
          searchDelay: 1000,
          stateSave: true,
          ajax: "{{ route('assignQuestions.show', $id) }}",
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
               url: '{{ route("assignQuestions.store") }}',
               method: 'POST',
               data: formData,
               success: function(response) {

                    if (response.success) {
                        window.location.href = "{{ route('assignQuestions.show', $id) }}"; // Show success message
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




@endsection