<?php $__env->startSection('title', 'Sign Up'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Signup start-->
<section id="signup" class="signup-block-main-block register-page">
    <div class="container">
        <div class="login-signup">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6">
                    <div class="signup-side-block">
                        <img src="<?php echo e(url('images/login/login.png')); ?>" class="img-fluid" alt="">
                        <div class="login-img">
                            <img src="<?php echo e(url('/images/login/'.$gsetting->img)); ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="signup-heading">
                        
                        <?php echo e($gsetting->text); ?>

                        <div id="msg_show"></div>
                        <div class="signup-block">
                            <form class="signup-form" id="signup-form" method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="userId" value="<?= $id ?>" id="userId">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="user"></i>
                                            <input type="text" class="form-control<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>" name="fname" value="<?php echo e(old('fname')); ?>" id="fname" placeholder="First Name">
                                            <?php if($errors->has('fname')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('fname')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="user"></i>
                                            <input type="text" class="form-control<?php echo e($errors->has('lname') ? ' is-invalid' : ''); ?>" name="lname" value="<?php echo e(old('lname')); ?>" id="lname" placeholder="Last Name">
                                            <?php if($errors->has('lname')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('lname')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="mail"></i>
                                            <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="Email">
                                            <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="lock"></i>
                                            <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" id="password" placeholder="Password">
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <?php if($errors->has('password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                            <?php endif; ?>
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
                                                <b><?php echo e(__('I agree to ')); ?><a href="<?php echo e(url('terms_condition')); ?>" title="Policy"><?php echo e(__('Terms&Condition')); ?> </a>, <a href="<?php echo e(url('privacy_policy')); ?>" title="Policy"><?php echo e(__('PrivacyPolicy')); ?>.</a></b>
                                            </div>
                                        </label>
                                    </div>
                                </div> -->
                                <div id="DivOtpDetails">
                                    <button type="submit" title="Sign Up" id="sign_up_button" class="btn btn-primary"><?php echo e(__('Sing Up')); ?></button> 
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
<?php $__env->stopSection(); ?>





<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/auth/userDetail.blade.php ENDPATH**/ ?>