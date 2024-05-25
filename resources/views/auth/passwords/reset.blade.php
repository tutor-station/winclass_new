@extends('theme.master')
@section('title', 'Reset Password')

@section('content')

@include('admin.message')

<!-- Signup start-->
<section id="signup" class="signup-block-main-block">
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
                    <div class="signup-heading reset-pass">
                        
                        {{ $gsetting->text }}
                        <div class="signup-block">
                            <form method="POST" class="signup-form" action="">
                            
                                <div class="form-group">
                                    <i data-feather="phone"></i>
                                    <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="Mobile" name="mobile" value="{{ $mobile ?? old('mobile') }}" required autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <i data-feather="lock"></i>
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Enter New Password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="updatePassword()">
                                            {{ __('ResetPassword') }}
                                        </button>
                                    </div>
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
@section('custom-script')
<script type="text/javascript">
    
    function updatePassword()
    {
        var mobile = $("#mobile").val();
        var password = $("#password").val();
        console.log(password);
        if(mobile == ""){
            alert("Mobile Number is required.");
        }
        if(password == ""){
            alert("Password is required.");
        }else{
            $.ajax({
            type: 'get', 
            url: "https://ummeedclasses.tutorstation.in/updateNewPassword",
            data: { mobile: mobile, password: password}, 

            success: function(data){ 
                console.log(data);
                if(data.result == 1){
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-success" role="alert">'+data.msg+'</div>')
                    window.location.href = "https://ummeedclasses.tutorstation.in/login";
                   
                }else{
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-danger" role="alert">'+data.msg+'</div>')
                }
            }
        });
        }
        
    }

</script>
@endsection

