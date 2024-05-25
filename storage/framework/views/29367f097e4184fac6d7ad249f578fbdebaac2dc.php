
<?php $__env->startSection('title', 'Help'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- help start-->
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="<?php echo e(__('course')); ?>" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-fluid">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('help text')); ?></h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="business-home-search">
                        <form method="GET" id="searchform" action="<?php echo e(route('search')); ?>">
                            <div class="search">
                                <input type="text" name="searchTerm" class="searchTerm" placeholder="Search for courses" value="<?php echo e(isset($searchTerm) ? $searchTerm : ''); ?>" autocomplete="off">
                                <button type="submit" class="searchButton">
                                    <?php echo e(__('Search')); ?>

                                </button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- help end-->
<!-- help-tab start-->

<section id="help-tab" class="help-tab-main-block">
    <div class="container">
        <div class="offset-lg-4 col-lg-6">
            <nav>
                <div class="nav nav-tabs btm-40" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo e(__('Students')); ?> </a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo e(__('Instructor')); ?> </a>
                </div>
            </nav>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="help-tab-heading btm-40"><?php echo e(__('FAQ')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <?php
                                    $faqs = App\FaqStudent::all();
                                ?>
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($faq->status == 1): ?>
                                <div class="col-lg-4 col-md-6">
                                    <a href="<?php echo e(route('faq.detail',$faq->id)); ?>">
                                        <div class="categories-block help-tab">
                                            <div class="help-tab-one-block"> 
                                            <?php echo e($faq->title); ?>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="help-tab-heading btm-40"><?php echo e(__('search topic')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="categories-block help-tab-one text-center">
                                <div class="help-tab-two">
                                    <a href="<?php echo e(route('purchase.show')); ?>">
                                    <ul>
                                        <li class="btm-10"><img src="<?php echo e(asset('images/icons/05.png')); ?>"></li>
                                        <li class="btm-5"><span><?php echo e(__('Purchase History')); ?></span></li>
                                        <li><?php echo e(__('See your purchase history & explore more Courses')); ?></li>
                                    </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="categories-block help-tab-one text-center">
                                <div class="help-tab-two">
                                    <?php if(Auth::check()): ?>
                                        <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/02.png')); ?>"></li>
                                            <li class="btm-5"><span><?php echo e(__('UserProfile')); ?></span></li>
                                            <li><?php echo e(__('Manage your account settings.')); ?></li>
                                        </ul>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/02.png')); ?>"></li>
                                            <li class="btm-5"><span><?php echo e(__('UserProfile')); ?></span></li>
                                            <li><?php echo e(__('Manage your account settings.')); ?></li>
                                        </ul>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">                            
                            <div class="categories-block help-contact text-center text-white">
                                
                                <a href="<?php echo e(url('user_contact')); ?>">
                                    <ul>
                                        <li class="btm-10"><img src="<?php echo e(asset('images/icons/contact.png')); ?>"></li>
                                        <br>
                                        <li class="text-white"><span><?php echo e(__('Contactus')); ?></span></li>
                                        <br>
                                        <li class="text-white"><?php echo e(__('Open a support ticket')); ?></li>
                                    </ul>
                                </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="help-tab-heading btm-40"><?php echo e(__('FAQ')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <?php
                                    $faqss = App\FaqInstructor::all();
                                ?>
                                <?php $__currentLoopData = $faqss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($faqs->status == 1): ?>
                                <div class="col-lg-4 col-md-6">
                                    <a href="<?php echo e(route('faqinstructor.detail',$faqs->id)); ?>">
                                        <div class="categories-block help-tab">
                                            <div class="help-tab-one-block"> 
                                                <?php echo e($faqs->title); ?>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="help-tab-heading btm-40"><?php echo e(__('search topic')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                       
                        <div class="col-lg-4 col-md-4">
                            <div class="categories-block help-contact text-center text-white">
                               
                                <a href="<?php echo e(url('user_contact')); ?>">
                                    <ul>
                                        <li class="btm-10"><img src="<?php echo e(asset('images/icons/contact.png')); ?>"></li>
                                        <br>
                                        <li class="text-white"><span><?php echo e(__('Contact us')); ?></span></li>
                                        <br>
                                        <li class="text-white"><?php echo e(__('Open a support ticket')); ?></li>
                                    </ul>
                                </a>
                                
                            </div>
                        </div>
                        <?php if($gsetting->instructor_enable == 1): ?>
                        <div class="col-lg-4 col-md-4">
                               <?php if(Auth::check()): ?>

                            <?php if(Auth::User()->role == "user"): ?>
                            <div class="categories-block help-tab-one text-center">
                                <div class="help-tab-two">
                                 
                                        
                                        <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="<?php echo e(__('Become An Instructor')); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/08.png')); ?>"></li>
                                            <li class="btm-5"><span><?php echo e(__('Become An Instructor')); ?></span></li>
                                            <li><?php echo e(__('To Become An Online Instructor')); ?></li>
                                        </ul>
                                        </a>
                                        
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/08.png')); ?>"></li>
                                            <li class="btm-5"><span><?php echo e(__('Become An Instructor')); ?></span></li>
                                            <li><?php echo e(__('To Become An Online Instructor')); ?></li>
                                        </ul>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- help-tab end-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<!-- script to remain on active tab-->
<script>
(function($) {
  "use strict";
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
    }
  });

})(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/help/faq.blade.php ENDPATH**/ ?>