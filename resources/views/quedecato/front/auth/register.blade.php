@extends('theme2.master')
@section('title', 'Sign Up')
@section('content')
@include('admin.message')
<!-- Start Register -->
    <section id="register" class="login-main-block register-main-block">
        <div class="login-block">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="register-image">
                        <img src="images/login/login-03.png" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <!-- <div class="logo">
                        <a href="{{route('home')}}" title=""><img src="images/logo/logo qued.png" alt="Logo" class="img-fluid"></a>
                    </div> -->
                    <h4 class="container-heading">
                    <div id="msg_show"></div>
                    {{ __('Create an account') }}</h4>
                    <div class="register-dtls">
                        <!-- <form class="contact-form-block" method="POST" action="{{ route('register') }}"> -->
                            <form class="signup-form" id="signup-form" method="POST" action="">
                            @csrf
                        
                            <div class="row">
                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" id="fname" placeholder="First Name">
                                        @if ($errors->has('fname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('fname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="Last Name">
                                        @if($errors->has('lname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                                        @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-12">
                                    @if($gsetting->mobile_enable == 1)
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Mobile">
                                        @if($errors->has('mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    @endif
                                </div> -->
                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password">
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                </div> -->

                                <div class="col-lg-12">
                                        @if($gsetting->mobile_enable == 1)
                                        <div class="form-group">
                                            <i data-feather="phone"></i>
                                            <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Mobile">
                                            @if($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        @endif
                                    </div>

                                <div class="col-lg-12" id="otp_input">
                                    <div class="form-group">
                                        <i data-feather="lock"></i>
                                        <input id="otp" type="text" class="form-control" name="otp" placeholder="Enter Otp" required>
                                    </div>
                                </div>
                            </div>
                            <!-- @if($gsetting->captcha_enable == 1)
                                <div class="{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <div class="text-center">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif -->
                            
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
                            <!-- <div class="col-lg-12">
                                <div class="login-options">
                                    <ul>
                                        <li><button type="submit" class="btn btn-primary create-btn" title="Sign Up">Sign Up</button></li>
                                        @if($gsetting->google_login_enable == 1)
                                        <li class="google"><a href="{{ url('/auth/google') }}" target="_blank" title="google"><img src="images/login/google.png" alt="" class="img-fluid"></a></li>
                                        @endif
                                        @if($gsetting->fb_login_enable == 1)
                                        <li class="facebook"><a href="{{ url('/auth/facebook') }}" target="_blank" title="facebook"><img src="images/login/facebook.png" alt="" class="img-fluid"></a></li>
                                        @endif     
                                        @if($gsetting->amazon_enable == 1)
                                        <li class="facebook"><a href="{{ url('/auth/amazon') }}" target="_blank" title="amazon" class="social-icon amazon-icon" title="Amazon"><img src="images/login/amazon.png" alt="" class="img-fluid"></a></li>
                                        @endif
                                        @if($gsetting->linkedin_enable == 1)
                                        <li class="facebook"><a href="{{ url('/auth/linkedin') }}" target="_blank" title="linkedin" class="social-icon linkedin-icon" title="Linkedin"><img src="images/login/linkedin.png" alt="" class="img-fluid"></a></li>
                                        @endif
                                        @if($gsetting->twitter_enable == 1)
                                        <li class="facebook"><a href="{{ url('/auth/twitter') }}" target="_blank" title="twitter" class="social-icon twitter-icon" title="Twitter"><img src="images/login/twitter.png" alt="" class="img-fluid"></a></li>
                                        @endif
                                        @if($gsetting->gitlab_login_enable == 1)
                                        <li class="facebook"><a href="{{ url('/auth/gitlab') }}" target="_blank" title="gitlab" class="social-icon gitlab-icon" title="Gitlab"><img src="images/login/github.png" alt="" class="img-fluid"></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div> -->
                            <div id="DivOtpDetails">
                                    <button type="button" title="Send Otp" id="send_otp_button" class="btn btn-primary" onclick="SendOtp()">{{ __('Send Otp') }}</button> 
                                    <button type="button" title="Sign Up" id="sign_up_button" onclick="verifyOtp()" class="btn btn-primary">{{ __('Otp Verify') }}</button> 
                                </div>
                        </form> 
                        </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sign-up already-account">{{ __('Already have an account ') }}? <a href="{{ route('login') }}" title="">{{ __('Login') }}</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>          
    <!-- End Register -->
    @endsection

@section('custom-script')
<script type="text/javascript">
    var default_url = '<?= $setting->default_link_url ?>';
    // alert("callllll");
    // $( document ).ready(function() {
        
        $("#sign_up_button").hide();
        $("#otp_input").hide();
    // });

    function SendOtp()
    {
        var mobile = $("#mobile").val();
         
        if(mobile == ""){
            alert("Mobile Number is required.");
        }else{
            $.ajax({
            type: 'POST', 
            url: default_url+"api/SendOtp",
            data: { mobile: mobile}, 

            success: function(data){ 

                if(data.result == 1){
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-success" role="alert">'+data.msg+'</div>')
                    $("#send_otp_button").hide();
                    $("#otp_input").show();
                    $("#sign_up_button").show();
                }else{
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-danger" role="alert">'+data.msg+'</div>')
                }
            }
        });
        }
        
    }



    function verifyOtp()
    {
        var mobile = $("#mobile").val();
        var otp = $("#otp").val();
        
        $.ajax({
            type: "POST",
            data : {mobile : mobile, otp : otp},
            url: default_url+"api/otp_verify",

            success: function(data){ 
                if(data.result == 1){
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-success" role="alert">'+data.msg+'</div>')
                     window.location.href = default_url+"userDetailAdd/"+data.mobile_id;
                }else{
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-danger" role="alert">'+data.msg+'</div>')
                }
            }
        });
    }
</script>
@endsection



