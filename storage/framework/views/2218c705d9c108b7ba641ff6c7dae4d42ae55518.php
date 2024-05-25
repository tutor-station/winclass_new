
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Start Login -->
    <section id="login-page" class="login-main-block">
        <div class="login-block">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <!-- <div class="logo">
                        <a href="<?php echo e(route('home')); ?>" title=""><img src="images/logo/logo qued.png" class="img-fluid" alt=""></a>
                    </div> -->
                    <h4 class="container-heading"><?php echo e(__('Welcome Back')); ?></h4>
                    <h6 class="login-heading"><?php echo e(__('Sign in to continue')); ?></h6>
                    <form action="<?php echo e(url('login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <!-- <input class="form-control form-control-lg email" type="email" name="email" placeholder="Email" aria-label=""> -->
                            <input class="form-control form-control-lg mobile" type="number" name="mobile" placeholder="Mobile" aria-label="">
                        </div>
                        <div class="form-group mb-3">
                            <input id="password" class="form-control form-control-lg" name="password" type="Password" placeholder="Password" aria-label="">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="login-options">
                            <ul>
                                <li><button type="submit" class="btn btn-primary create-btn" title="Sign Up">Sign In</button></li>
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
                    </form>
                    <br>
                    <div class="forgot-pass"><a href="<?php echo e('password/reset'); ?>" title=""><?php echo e(__('Forgot Password')); ?>?</a></div>
                   
                    <div class="sign-up"><?php echo e(__('Do not have an account')); ?>?  <a href="<?php echo e(route('register')); ?>" title="" ><?php echo e(__('Sign up')); ?></a></div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="login-img">
                        <img src="images/login/login-02.png" class="img-fluid" alt="img">    
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End Login -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/auth/login.blade.php ENDPATH**/ ?>