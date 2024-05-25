@extends('admin.layouts.master')
@section('title','Edit Question')
@section('maincontent')
<?php
$data['heading'] = 'Edit Question';
$data['title'] = 'Question';
$data['title1'] = 'Edit Question';
?>
@include('admin.layouts.topbar',$data)
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title">{{ __('Edit') }} {{ __('Question') }}</h5>
          <div class="widgetbar">
            <a href="{{ url('AllQuestions') }}" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
            </div>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form2" method="post" action="{{ route('assignQuestions.update') }}" data-parsley-validate
                class="form-horizontal form-label-left" enctype="multipart/form-data">
                {{ csrf_field() }}
  
                <input type="hidden" value="Objective" name="data_type" class="data_type">
                <input type="hidden" value="<?= $id ?>" name="question_id" >
  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <label for="exampleInputTit1e">{{ __('Question') }}</label>
                        <textarea name="question" rows="6" class="form-control" placeholder="Enter Your Question"><?= $editquizes->question ?></textarea>
                        <br>
                      </div>
                      <br>

                      <div class="col-md-12">
                        <label for="exampleInputDetails">{{ __('Answer') }}:<sup class="redstar">*</sup></label>
                        <div class="objectivetype">
                          <select style="width: 100%" name="answer" class="form-control select2">
                            <option value="none" selected disabled hidden> {{ __('SelectanOption') }} </option>
                            <option value="A" <?= ($editquizes->answer == 'a') ? 'selected' : "" ?>>{{ __('A') }}</option>
                            <option value="B" <?= ($editquizes->answer == 'b') ? 'selected' : "" ?>>{{ __('B') }}</option>
                            <option value="C" <?= ($editquizes->answer == 'c') ? 'selected' : "" ?>>{{ __('C') }}</option>
                            <option value="D" <?= ($editquizes->answer == 'd') ? 'selected' : "" ?>>{{ __('D') }}</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="col-md-12">
                        <h4 class="extras-heading">{{ __('Video And Image For Question') }}</h4>
                        <div class="form-group{{ $errors->has('question_video_link') ? ' has-error' : '' }}">
                          <label for="exampleInputDetails">{{ __('Add Video To Question') }} :<sup class="redstar">*</sup></label>
                          <input type="text" name="question_video_link" class="form-control" placeholder="https://myvideolink.com/embed/.." value="<?= $editquizes->question_video_link ?>" />
                          <small class="text-danger">{{ $errors->first('question_video_link') }}</small>
                          <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __('Back') }}{{__('YouTube And Vimeo Video Support')}} (Only Embed Code Link)</small>
                        </div>
                        <div class="form-group">
                          <label class="text-dark" for="exampleInputSlug">{{ __('Image') }}: </label>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">{{ __('Back') }}{{__('Upload')}}</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="question_img" class="custom-file-input" id="question_img" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">{{ __('Back') }}{{__('Choose file')}}</label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="objectivetype">
                        <div class="col-md-6">
                    
                          <label for="exampleInputDetails">{{ __('A Option') }} :<sup class="redstar">*</sup></label>
                          <input type="text" name="a" class="form-control" placeholder="Enter Option A" value="<?= $editquizes->a ?>" >
                        </div>

                        <div class="col-md-6">
                          <label for="exampleInputDetails">{{ __('B Option') }} :<sup class="redstar">*</sup></label>
                          <input type="text" name="b" class="form-control" placeholder="Enter Option B" value="<?= $editquizes->b ?>" />
                        </div>

                        <div class="col-md-6">

                          <label for="exampleInputDetails">{{ __('C Option') }} :<sup class="redstar">*</sup></label>
                          <input type="text" name="c" class="form-control" placeholder="Enter Option C" value="<?= $editquizes->c ?>" />
                        </div>

                        <div class="col-md-6">

                          <label for="exampleInputDetails">{{ __('D Option') }} :<sup class="redstar">*</sup></label>
                          <input type="text" name="d" class="form-control" placeholder="Enter Option D" value="<?= $editquizes->d ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">           
                    <div class="form-group">
                      <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> {{ __('Back') }}{{__('Reset')}}</button>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                        {{ __('Back') }}{{__('Create')}}</button>
                    </div>
                  </div>
                  <div class="clear-both"></div>               
              </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

