
<?php $__env->startSection('title', "My Leaderboard"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- course detail header start -->
<?php $__env->startSection('custom-head'); ?>
<style>
    .green .progress .inner .water {
      top: <?php echo e($all_total_reverse); ?>%;
    }
</style>
<?php $__env->stopSection(); ?>
<section class="growth-main-block">
    <div class="container-xl">
        <div class="row g-0">
            <div class="col-lg-4 col-md-12">
                <div class="engagement-bar">
                    <h3 class="engagement-heading"><?php echo e(__('Engagement')); ?></h3>
                    <div class="wrapper">                  
                      <div class="green">
                        <div class="progress">
                          <div class="inner">
                            <div class="percent"><span><?php echo e($all_total); ?></span>%</div>
                            <div class="water"></div>
                            <div class="glare"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <h4 class="wrapper-heading text-center"><?php echo e(__('Looking Good')); ?> !</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="leader-progress-bar">
                                <div class="progress" data-percentage="<?php echo e($social_total); ?>">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                        <div>
                                            <?php echo e($social_total); ?>%
                                        </div>
                                    </div>
                                </div>
                                <h4 class="progress-heading text-center"><?php echo e(__('Social')); ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="leader-progress-bar">
                                <div class="progress" data-percentage="<?php echo e($progres); ?>">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                        <div>
                                            <?php echo e($progres); ?>%
                                        </div>
                                    </div>
                                </div>
                                <h4 class="progress-heading text-center"><?php echo e(__('Learning')); ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="leader-progress-bar">
                                <div class="progress" data-percentage="<?php echo e($quiz_total); ?>">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                        <div>
                                            <?php echo e($quiz_total); ?>%
                                        </div>
                                    </div>
                                </div>
                                <h4 class="progress-heading text-center"><?php echo e(__('Quiz')); ?></h4>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="growth-block">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="profile-block text-center">

                                <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                                    <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="profile-block-img">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="profile-block-img">

                                <?php endif; ?>

                                
                                <h3 class="profile-block-heading text-center text-white"> <?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?></h3>
                                <ul class="text-center">
                                    <?php if(isset( Auth::user()->address)): ?>
                                    <li><i class="fa fa-map-marker"></i> <?php echo e(Auth::user()->address); ?></li>
                                    <?php endif; ?>

                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> 
                                    <?php echo e(Auth::user()->email); ?></li>

                                    <?php if(isset( Auth::user()->mobile)): ?>
                                    <li><i class="fa fa-phone"></i> <?php echo e(Auth::user()->mobile); ?></li>
                                    <?php endif; ?>
                                   
                                </ul>

                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="profile-dtl-block">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-4 text-center">
                                        <i class="fas fa-certificate"></i>
                                        <h5 class="profile-dtl-block-heading"><?php echo e($total_courses); ?></h5>
                                        <p><?php echo e(__('Enrolled Courses')); ?></p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-4 text-center">
                                        <i class="fas fa-trophy"></i>
                                        <h5 class="profile-dtl-block-heading"><?php echo e($total_progess); ?></h5>
                                        <p><?php echo e(__('Course Completed')); ?></p>
                                    </div>
                                   
                                    <div class="col-lg-4 col-md-4 col-4 text-center">
                                        <i class="fas fa-award"></i>
                                        <h5 class="profile-dtl-block-heading"><?php echo e($live_meeting_count); ?></h5>
                                        <p><?php echo e(__('Live Classes')); ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="online-blog" class="online-blog-main-block">
    <div class="container-xl">
     
        <div class="row">
            <div class="col-lg-12">
                <div class="bdr-yellow"></div>
                <div class="online-blog-block">
                    <p><?php echo Auth::user()->detail; ?></p>
                   
                </div>
            </div>
            
        </div>
    </div>
</section>


<!-- course detail end -->
<?php $__env->stopSection(); ?>


















































































































<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/leaderboard.blade.php ENDPATH**/ ?>