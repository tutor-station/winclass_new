@extends('theme2.master')
@section('title', 'Sign Up')
@section('content')
@include('admin.message')

<!-- Signup start-->
<section id="signup" class="signup-block-main-block register-page">
    <div class="container">
        <div class="login-signup">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6">
                    <div class="signup-side-block">
                        <img src="{{ url('images/login/login.png')}}" class="img-fluid" alt="">
                        <div class="login-img">
                            <img src="{{ url('/images/login/'.$gsetting->img) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="signup-heading">
                        
                        {{ $gsetting->text }}
                        <div id="msg_show"></div>
                        <div class="signup-block">
                            <form class="signup-form" id="signup-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="userId" value="<?= $id ?>" id="userId">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="user"></i>
                                            <input type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" id="fname" placeholder="First Name">
                                            @if ($errors->has('fname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="user"></i>
                                            <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="Last Name">
                                            @if($errors->has('lname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="mail"></i>
                                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                                            @if($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="lock"></i>
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password">
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="lock"></i>
                                            <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                    </div>

                                </div>
                               
                                
                                <!-- <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="term" id="term" required>

                                        <label class="form-check-label" for="term">
                                            <div class="signin-link text-center btm-20">
                                                <b>{{ __('I agree to ') }}<a href="{{url('terms_condition')}}" title="Policy">{{ __('Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('PrivacyPolicy') }}.</a></b>
                                            </div>
                                        </label>
                                    </div>
                                </div> -->
                                <div id="DivOtpDetails">
                                    <button type="submit" title="Sign Up" id="sign_up_button" class="btn btn-primary">{{ __('Sing Up') }}</button> 
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup end-->
@endsection




