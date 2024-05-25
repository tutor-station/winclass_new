
<?php $__env->startSection('title', 'Sign Up'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <a href="<?php echo e(route('home')); ?>" title=""><img src="images/logo/logo qued.png" alt="Logo" class="img-fluid"></a>
                    </div> -->
                    <h4 class="container-heading">
                    <div id="msg_show"></div>
                    <?php echo e(__('Create an account')); ?></h4>
                    <div class="register-dtls">
                        <!-- <form class="contact-form-block" method="POST" action="<?php echo e(route('register')); ?>"> -->
                            <form class="signup-form" id="signup-form" method="POST" action="">
                            <?php echo csrf_field(); ?>
                        
                            <div class="row">
                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>" name="fname" value="<?php echo e(old('fname')); ?>" id="fname" placeholder="First Name">
                                        <?php if($errors->has('fname')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('fname')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control<?php echo e($errors->has('lname') ? ' is-invalid' : ''); ?>" name="lname" value="<?php echo e(old('lname')); ?>" id="lname" placeholder="Last Name">
                                        <?php if($errors->has('lname')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('lname')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="Email">
                                        <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-12">
                                    <?php if($gsetting->mobile_enable == 1): ?>
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" name="mobile" value="<?php echo e(old('mobile')); ?>" id="mobile" placeholder="Mobile">
                                        <?php if($errors->has('mobile')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('mobile')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div> -->
                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" id="password" placeholder="Password">
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                </div> -->

                                <div class="col-lg-12">
                                        <?php if($gsetting->mobile_enable == 1): ?>
                                        <div class="form-group">
                                            <i data-feather="phone"></i>
                                            <input type="text" class="form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" name="mobile" value="<?php echo e(old('mobile')); ?>" id="mobile" placeholder="Mobile">
                                            <?php if($errors->has('mobile')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('mobile')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                <div class="col-lg-12" id="otp_input">
                                    <div class="form-group">
                                        <i data-feather="lock"></i>
                                        <input id="otp" type="text" class="form-control" name="otp" placeholder="Enter Otp" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <?php if($gsetting->captcha_enable == 1): ?>
                                <div class="<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                                    <div class="text-center">
                                        <?php echo app('captcha')->display(); ?>

                                        <?php if($errors->has('g-recaptcha-response')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?> -->
                            
                            <!-- <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="term" id="term" required>

                                    <label class="form-check-label" for="term">
                                        <div class="signin-link text-center btm-20">
                                            <b><?php echo e(__('I agree to ')); ?><a href="<?php echo e(url('terms_condition')); ?>" title="Policy"><?php echo e(__('Terms&Condition')); ?> </a>, <a href="<?php echo e(url('privacy_policy')); ?>" title="Policy"><?php echo e(__('PrivacyPolicy')); ?>.</a></b>
                                        </div>
                                    </label>
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-12">
                                <div class="login-options">
                                    <ul>
                                        <li><button type="submit" class="btn btn-primary create-btn" title="Sign Up">Sign Up</button></li>
                                        <?php if($gsetting->google_login_enable == 1): ?>
                                        <li class="google"><a href="<?php echo e(url('/auth/google')); ?>" target="_blank" title="google"><img src="images/login/google.png" alt="" class="img-fluid"></a></li>
                                        <?php endif; ?>
                                        <?php if($gsetting->fb_login_enable == 1): ?>
                                        <li class="facebook"><a href="<?php echo e(url('/auth/facebook')); ?>" target="_blank" title="facebook"><img src="images/login/facebook.png" alt="" class="img-fluid"></a></li>
                                        <?php endif; ?>     
                                        <?php if($gsetting->amazon_enable == 1): ?>
                                        <li class="facebook"><a href="<?php echo e(url('/auth/amazon')); ?>" target="_blank" title="amazon" class="social-icon amazon-icon" title="Amazon"><img src="images/login/amazon.png" alt="" class="img-fluid"></a></li>
                                        <?php endif; ?>
                                        <?php if($gsetting->linkedin_enable == 1): ?>
                                        <li class="facebook"><a href="<?php echo e(url('/auth/linkedin')); ?>" target="_blank" title="linkedin" class="social-icon linkedin-icon" title="Linkedin"><img src="images/login/linkedin.png" alt="" class="img-fluid"></a></li>
                                        <?php endif; ?>
                                        <?php if($gsetting->twitter_enable == 1): ?>
                                        <li class="facebook"><a href="<?php echo e(url('/auth/twitter')); ?>" target="_blank" title="twitter" class="social-icon twitter-icon" title="Twitter"><img src="images/login/twitter.png" alt="" class="img-fluid"></a></li>
                                        <?php endif; ?>
                                        <?php if($gsetting->gitlab_login_enable == 1): ?>
                                        <li class="facebook"><a href="<?php echo e(url('/auth/gitlab')); ?>" target="_blank" title="gitlab" class="social-icon gitlab-icon" title="Gitlab"><img src="images/login/github.png" alt="" class="img-fluid"></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div> -->
                            <div id="DivOtpDetails">
                                    <button type="button" title="Send Otp" id="send_otp_button" class="btn btn-primary" onclick="SendOtp()"><?php echo e(__('Send Otp')); ?></button> 
                                    <button type="button" title="Sign Up" id="sign_up_button" onclick="verifyOtp()" class="btn btn-primary"><?php echo e(__('Otp Verify')); ?></button> 
                                </div>
                        </form> 
                        </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sign-up already-account"><?php echo e(__('Already have an account ')); ?>? <a href="<?php echo e(route('login')); ?>" title=""><?php echo e(__('Login')); ?></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>          
    <!-- End Register -->
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/auth/register.blade.php ENDPATH**/ ?>