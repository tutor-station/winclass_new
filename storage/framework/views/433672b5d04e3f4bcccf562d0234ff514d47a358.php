<?php $__env->startSection('title', 'Forgot Password'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Signup start-->
<section id="signup" class="signup-block-main-block">
    <div class="container">
        <div class="login-signup">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6">
                    <div class="signup-side-block">
                        <img src="<?php echo e(url('images/login/login.png')); ?>" class="img-fluid" alt="">
                        <!-- <div class="login-img">
                            <img src="<?php echo e(url('/images/login/'.$gsetting->img)); ?>" class="img-fluid" alt="">
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="signup-heading forgot-pass">
                        
                        <?php echo e($gsetting->text); ?>

                            <?php if(session('status')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="signup-block">
                                <!-- <form method="POST" class="signup-form" action="<?php echo e(route('password.email')); ?>"> -->
                                    <form method="POST" class="signup-form" id="forgot-password-form" action="">
                                    <?php echo csrf_field(); ?>

                                    <!-- <div class="form-group">
                                        <i data-feather="mail"></i>
                                        <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Email Address" name="email" value="<?php echo e(old('email')); ?>" required>
                                        <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div> -->

                                    <div class="form-group">
                                        <i data-feather="phone"></i>
                                        <input id="mobile" type="number" class="form-control" placeholder="Mobile" name="mobile" value="" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo e(__('SendPasswordResetLink')); ?>

                                            </button>
                                        </div>
                                    </div> -->

                                    <div id="otp_input">
                                        <div class="form-group">
                                            <i data-feather="lock"></i>
                                            <input id="otp" type="text" class="form-control" name="otp" placeholder="Enter Otp" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="button" title="Send Otp" id="send_otp_button" class="btn btn-primary" onclick="SendOtp()"><?php echo e(__('Send Otp')); ?></button> 
                                            <button type="button" title="Sign Up" id="verify_otp_button" onclick="verifyOtp()" class="btn btn-primary"><?php echo e(__('Otp Verify')); ?></button> 
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup end-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script type="text/javascript">
    var default_url = '<?= $setting->default_link_url ?>';
    // $( document ).ready(function() {
        $("#verify_otp_button").hide();
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
            url: default_url+"api/forgotOtpSend",
            data: { mobile: mobile}, 

            success: function(data){ 
                if(data.result == 1){
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-success" role="alert">'+data.msg+'</div>')
                    $("#send_otp_button").hide();
                    $("#otp_input").show();
                    $("#verify_otp_button").show();
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
            url: default_url+"api/forgotOtpVerify",

            success: function(data){ 
                if(data.result == 1){
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-success" role="alert">'+data.msg+'</div>')
                     window.location.href = default_url+"resetNewPassword/"+data.mobile_id;
                }else{
                    $("#msg_show").html('<div class="col-md-12 animated fadeInDown alert alert-danger" role="alert">'+data.msg+'</div>')
                }
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/auth/passwords/email.blade.php ENDPATH**/ ?>