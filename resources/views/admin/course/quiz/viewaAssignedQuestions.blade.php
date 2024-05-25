@extends('admin.layouts.master')
@section('title','View Assigned Questions')
@section('maincontent')
<?php
$data['heading'] = 'Manage Test';
$data['title'] = 'View Assigned Questions';
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
            <h5 class="box-title">{{ __('View Assigned Questions') }}</h5>
         </div>
         <div class="card-body">
          <form id="assignQuestionFrom">

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
                        <th>{{ __('Action') }}</th>
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

@endsection
@section('script')
<script type="text/javascript">
    $(function () {
      
      var table = $('#assignQuestionsTable').DataTable({
          processing: true,
          serverSide: true,
          searchDelay: 1000,
          stateSave: true,
          ajax: "{{ route('viewAssignedQuestions.show', $id) }}",
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

@endsection