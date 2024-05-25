@extends('admin.layouts.master')
@section('title','Add Test Topic')
@section('maincontent')
<?php
$data['heading'] = 'Add Test Topic';
$data['title'] = 'Add Test Topic';
?>
@include('admin.layouts.topbar',$data)


<div class="contentbar bardashboard-card ">
<div class="row">
  <div class="col-lg-12">
    <div class="card m-b-30">
      <div class="card-header">
          <h5 class="box-tittle">{{ __('Add Test Topic') }}</h5>
          <div>
            <div class="widgetbar">
              <a href="{{route('testTopic.show')}}" class="float-right btn btn-primary-rgba mr-2" title="{{ __('Back') }}"><i class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
            </div>
          </div>
        </div>
      <div class="card-body">
          <form id="demo-form2" method="post" action="{{url('admin/quiztopic/')}}" data-parsley-validate
              class="form-horizontal form-label-left">
              {{ csrf_field() }}

              
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Course') }}:<span class="redstar">*</span>
                  </label>
                  <select name="course_id" id="category_id" class="form-control select2">
                    <option value="0">{{ __('Select Course') }}</option>
                    @foreach($cor as  $cor_val)
                    <option value="{{$cor_val->id}}">{{$cor_val->title}}</option>
                    @endforeach
                </select>
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('QuizTopic') }}:<span class="redstar">*</span>
                  </label>
                  <input type="text" placeholder="Enter Quiz Topic" class="form-control " name="title"
                    id="exampleInputTitle" value="">
                </div>

              </div>
              <br>


              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails">{{ __('QuizDescription') }}:<sup
                      class="redstar">*</sup></label>
                  <textarea name="description" rows="3" class="form-control" placeholder="Enter Description"></textarea>
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Marks') }}:<span class="redstar">*</span>
                  </label>
                  <input type="number" placeholder="Enter Per Question Mark" class="form-control " name="per_q_mark"
                    id="exampleInputTitle" value="">
                </div>

              </div>
              <br>


              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('QuizTimer') }}:<span class="redstar">*</span>
                  </label>
                  <input type="text" placeholder="Enter Quiz Time" class="form-control" name="timer" id="exampleInputTitle">
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Days') }}:</label>
                  <input type="text" placeholder="Enter Due Days" class="form-control" name="due_days"
                    id="exampleInputTitle">
                  <small>{{__('Days after quiz will start when user enroll in course')}}</small>
                </div>

              </div>
              <br>


              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Total Questions') }}:<span class="redstar">*</span>
                  </label>
                  <input type="number" placeholder="Total Questions" class="form-control " name="total_question"
                    id="exampleInputTitle" value="">
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Watch Solution') }}:</label>
                  <input type="text" placeholder="Enter Video Link" class="form-control" name="watch_solution"
                    id="exampleInputTitle">
                </div>

              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails">{{ __('Negative Mark') }}:</label><br>
                  <label class="switch">
                      <input class="negative_mark" type="checkbox" name="negative_mark"/>
                      <span class="knob"></span>
                    </label>
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Per Question Negative Mark') }}:</label>
                  <input type="text" placeholder="Enter Quiz Topic" class="form-control " name="per_q_negative"
                    id="exampleInputTitle" value="">
                </div>

              </div>
              <br>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Pdf With Annotations') }}:<span class="redstar">*</span>
                  </label>
                  <input type="file" placeholder="Pdf With Annotations" class="form-control " name="pdf_with_annotations"
                    id="exampleInputTitle" value="">
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('Pdf WithOut Annotations') }}:<span class="redstar">*</span>
                  </label>
                  <input type="file" placeholder="Pdf WithOut Annotations" class="form-control " name="pdf_without_annotations"
                    id="exampleInputTitle" value="">
                </div>
              </div>
              <br>
              <br>


              <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputDetails">{{ __('Status') }}:</label><br>
                  <label class="switch">
                      <input class="slider" type="checkbox" name="status" checked />
                      <span class="knob"></span>
                    </label>
                

                </div>

                <div class="col-md-3">
                  <label for="exampleInputTit1e">{{ __('QuizReattempt') }}:</label><br>
                  <label class="switch">
                      <input class="slider" type="checkbox" name="quiz_again" checked />
                      <span class="knob"></span>
                    </label>
                  

                </div>


                <div class="col-md-3">
                  <label for="exampleInputTit1e">{{ __('Quiz Type') }}:</label><br>
                    <label class="switch">
                      <input class="slider" type="checkbox" name="free" checked />
                      <span class="knob"></span>
                    </label>
                 

                </div>

                <div class="col-md-3">
                      <label for="exampleInputDetails">{{ __('Free/Paid') }}:</label><br>
                      <label class="switch">
                      <input class="slider" type="checkbox" name="quiz_type" checked/>
                      <span class="knob"></span>
                      </label>
                    </div>
              </div>
              <br>


              <div class="form-group">
                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> {{__('Reset')}}</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                  {{__('Create')}}</button>
              </div>

              <div class="clear-both"></div>


            </form>
      </div>
    </div>
  </div>

</div>
</div>

@endsection
