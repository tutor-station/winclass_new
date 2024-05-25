@extends('theme2.master')
@section('title',"Show Report")
@section('content')
 <section class="main-wrapper finish-main-block">
   <div class="container-xl">
    <br/>
  @if ($auth)
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="">
          <div class="question-block">
           

          @if($topics->show_ans==1)
        
          <div class="question-block">
            <h3 class="text-center main-block-heading">{{ __('Answer Report') }}</h3>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered result-table">
                <thead>
                  <tr>
                    <th>{{ __('Question') }}</th> 
                    <th style="color: red;">{{ __('Your Answer') }}</th>
                    <th style="color: #48A3C6;">{{ __('Correct Answer') }}</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @php
                  $x = $count_questions;               
                  $y = 1;
                  @endphp
                  @foreach($ans as $key=> $a)
                      <tr>
                        <td>{{ $a->quiz->question }}</td>
                         <td>{{ $a->user_answer }}</td>
                        <td>{{ $a->answer }}</td>
                       
                      
                      </tr>
                      @php                
                        $y++;
                        if($y > $x){                 
                          break;
                        }
                      @endphp
                   
                  @endforeach              
                 
                </tbody>
              </table>
            </div>
            
          </div>

          @endif


          <div id="printableArea">


            <h3 class="text-center main-block-heading">{{ __('Test Analysis') }} </h3>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered result-table">
                <thead>
                  <tr><th colspan="4">{{ $topics->title }}<th></tr>
                  <tr>
                    <th class="text-center">{{ __('Q. No') }}</th>
                    <th>{{ __('Questions') }}</th>
                    <th class="text-center">{{ __('Student Answer') }}</th>
                    <th class="text-center">{{ __('Correct Answer') }}</th>
                    <th class="text-center">{{ __('View Solution') }}</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $i= 1;
// echo '<pre>'; print_r($quiz_answers);exit;
                  foreach($quiz_answers as $key => $value){ ?>
                    <tr>
                    <td><?= $i; ?></td>
                    <td><?= $value->question ?></td>


                    <td class="<?= (strtolower($value->user_answer) == strtolower($value->answer)) ? 'bg-success' : 'bg-danger'; ?>
 text-white text-center"><?= $value->user_answer; ?></td>
                    <td class="text-center"><?= $value->answer; ?></td>

                    <td class="text-center">
                      <?php if($value->solution != ""){ ?>
                        <!-- <button type="button" class="btn btn-sm btn-secondary"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding:8px;"><i class="fa fa-eye" style="margin-left:0px;"></i></button> -->
                        <button type="button" class="btn btn-sm btn-secondary" onclick="showSolution('<?= $value->solution ?>');" style="padding:8px;"><i class="fa fa-eye" style="margin-left:0px;"></i></button>
                      <?php }?>

                    </td>
                    </tr>
                  <?php $i++; } ?>

                </tbody>
              </table>
            </div>
            <br/>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="max-width:800px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Question Solution</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="padding:8px;">Close</button>
                  </div>
                </div>
              </div>
            </div>



           <h3 class="text-center main-block-heading">{{ __('score card') }} </h3>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered result-table">
                <thead>
                  <tr>
                    <th>{{ __('Total Question') }}</th>
                    <th>{{ __('Correct Questions') }}</th>
                    <th>{{ __('Per Question Mark') }}</th>
                    <th>{{ __('Total Marks') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$count_questions}}</td>
                    <td>
                      @php
                        $mark = 0;
                        $ca=0;
                        $correct = collect();
                      @endphp
                      @foreach ($ans as $answer)
                        @if (strtolower($answer->user_answer) == strtolower($answer->answer) )
                        
                          @php
                            $mark++;
                            $ca++;
                          @endphp
                        @endif
                      @endforeach
                      {{$ca}}
                    </td>
                    <td>{{$topics->per_q_mark}}</td>
                      @php
                          $correct = $mark*$topics->per_q_mark;
                      @endphp
                    <td>{{$correct}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <br/>
            <h2 class="text-center">{{ __('Thank You') }}</h2>
          </div>

          

            <div class="finish-btn text-center">
              
              <input type="button" class="btn btn-primary"  onclick="printDiv('printableArea')" value="Print" />

              @if($topics->quiz_again == '1')
              <a href="{{route('tryagain',$topics->id)}}" class="btn btn-primary">{{ __('Try Again') }} </a>
              @endif
              <a href="{{ route('course.content',['id' => $topics->course_id, 'slug' => $topics->courses->slug ]) }}" class="btn btn-secondary">{{ __('Back') }} </a>

              


            </div>

          </div>
        </div>
      </div>
    </div>
  @endif
</div>
</section>
<br/>
@endsection


@section('custom-script')

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
   }

   function showSolution(solution) {
      $('.modal-body').html('<p>'+solution+'</p>');
      $('#exampleModal').modal('show');
   }

</script>
@endsection

