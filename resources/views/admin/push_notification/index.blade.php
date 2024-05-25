@extends('admin.layouts.master')
@section('title','Push Notifications')
@section('maincontent')
<?php
$data['heading'] = 'Push Notifications';
$data['title'] = 'Push Notifications';
?>
@include('admin.layouts.topbar',$data)
<div class="contentbar">
    <div class="row">
        <div class="col-md-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <form action="{{ route('admin.push.notif') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ __('Title') }}: <span
                                            class="text-danger">*</span></label>
                                    <input placeholder="" type="text" class="form-control" required name="title"
                                        value="{{ old('subject') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ __('Message') }} : <span
                                            class="text-danger">*</span> </label>
                                    <textarea required placeholder="" class="form-control" name="message" id="" cols="3"
                                        rows="5">{{ old('message') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ __('Description') }} : <span
                                            class="text-danger">*</span> </label>
                                    <textarea required placeholder="" class="form-control" name="description" id="" cols="3"
                                        rows="5">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <br><br>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="form_control">Schedule Notfication<span class="required text-danger">*</span></label>
                                    
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="checkbox1_7" name="is_scheduled" value="N" class="md-radiobtn form_control">
                                            <label for="checkbox1_7"> NO </label> &nbsp;
                                       
                                            <input type="radio" id="checkbox1_6" name="is_scheduled" value="Y"  class="md-radiobtn form_control">
                                            <label for="checkbox1_6"> YES </label>
                                        </div>
                                    </div>
                                </div>
                            </div><br><br>


                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ __('Schedule Date Time') }} : <span
                                            class="text-danger">*</span> </label>
                                    <input type="datetime-local" name="schedule_time" value="" class="form-control">
                                </div>
                            </div><br><br> -->



                            <div class="col-md-12">
                              <label for="appt">{{__('Schedule Date Time')}}</label><br>
                              <input type="datetime-local" id="schedule_time" name="schedule_time" placeholder="dd/mm/yyyy"
                                class="datepicker-here form-control">
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ __('Image') }} : <span
                                            class="text-danger">*</span> </label>
                                    <input type="file" name="image" value="" class="form-control" required>
                                </div>
                            </div>
                            <br><br>

                            
                            <div class="col-md-6">
                                <div class="form-group">
                                     <button type="reset" class="btn btn-danger-rgba" title="{{ __('Reset') }}"><i class="fa fa-ban"></i>
                              {{__('Reset')}}</button>
                                    <button type="submit" class="btn btn-primary-rgba" title="{{ __('Send') }}"><i class="fa fa-check-circle"></i>
                                        {{ __('Send') }}</button>
                                </div>
                            </div>
                        </form>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<!-- @section('scripts')
<script>
    $('.push').on('change', function () {
        if ($(this).is(":checked")) {
            $('input[name=btn_text]').attr('required', 'required');
            $('#buttonBox').show('fast');
        } else {
            $('input[name=btn_text]').removeAttr('required');
            $('#buttonBox').hide('fast');
        }
    });
</script>
@endsection -->