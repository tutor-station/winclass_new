
<?php $__env->startSection('title'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- breadcrumb start -->
<?php
$gets = App\Breadcum::first();
?>

<?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('<?php echo e(asset('/images/breadcum/'.$gets->img)); ?>')">
<?php else: ?>
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('<?php echo e(asset('Avatar::create($gets->text)->toBase64() ')); ?>')">
<?php endif; ?>
<div class="overlay-bg"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2><?php echo e(__('My Courses')); ?></h2>    
                        
                    </div>
                </div>
            </div>
            <div class="breadcrumb-wrap2">
                  
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('My Courses')); ?></li>
                    </ol>
                </nav>
            </div>
            
        </div>
    </div>
</section>
<!-- breadcumb end -->
<!-- instructor profile start -->
<section id="instructor-profile" class="instructor-profile-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="instructor-profile-block text-center">
                    <div class="instructor-profile-img">
                        <?php if($instructors['user_img'] !== NULL && $instructors['user_img'] !== ''): ?>
                        <img src="<?php echo e(url('/images/user_img/'.$instructors->user_img)); ?>"  class="img-fluid" />
                        <?php else: ?>
                        <img src="<?php echo e(Avatar::create($instructors->fname)->toBase64()); ?>" alt="<?php echo e(__('course')); ?>"
                            class="img-fluid">
                        <?php endif; ?>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="<?php echo e($instructors->fb_url); ?>"><i data-feather="facebook"></i></a></li>
                                        <li><a href="<?php echo e($instructors->twitter_url); ?>"><i data-feather="twitter"></i></a></li>
                                        <li><a href="<?php echo e($instructors->youtube_url); ?>"></a><i data-feather="youtube"></i></a></li>
                                        <li><a href="<?php echo e($instructors->linkedin_url); ?>"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div> 
                    </div>
                    <div class="instructor-profile-dtl">
                        <div class="instructor-content-block">
                            <h5 class="about-content-heading"><?php echo e($instructors->fname); ?> <?php echo e($instructors->lname); ?></h5>
                            <p><?php echo e($instructors->role); ?></p>
                            <div class="instructor-profile-number">
                                <?php echo e($instructors->mobile); ?>

                            </div>
                            <div class="instructor-profile-mail">
                                <?php echo e($instructors->email); ?>

                            </div>
                            <?php

                            $followers = App\Followers::where('user_id', '!=', $instructors->id)->where('follower_id', $instructors->id)->count();
        
                            $followings = App\Followers::where('user_id', $instructors->id)->where('follower_id','!=', $instructors->id)->count();
                            $course = App\Course::where('user_id', $instructors->id)->count();
        
                            ?>
                            <div class="instructor-home-info">
                                <ul>
                                    <li><?php echo e($course); ?> <?php echo e(__('Courses')); ?></li>
                                    <li><?php echo e($followers); ?> <?php echo e(__('Follower')); ?></li>
                                    <li><?php echo e($followings); ?> <?php echo e(__('Following')); ?></li>
                                </ul>
                            </div>
                            <div class="instructor-btn">

                                <?php if(auth()->guard()->check()): ?>

                                <?php

                                $follow = App\Followers::where('follower_id', $user->id)->first();

                                ?>

                                <?php if($follow == NULL): ?>


                                <form id="demo-form2" method="post" action="<?php echo e(route('follow')); ?>"
                                    data-parsley-validate class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>


                                    <input type="hidden" name="follower_id"  value="<?php echo e($user->id); ?>" />

                                   
                                     <button type="submit" class="btn btn-primary">&nbsp;Follow</button>
                                </form>
                                

                                <?php else: ?>
                                
                                <form id="demo-form2" method="post" action="<?php echo e(route('unfollow')); ?>"
                                    data-parsley-validate class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>


                                    <input type="hidden" name="user_id"value="<?php echo e($user->id); ?>" />
                                    <input type="hidden" name="instructor_id"  value="<?php echo e($user->id); ?>" />

                                    
                                     <button type="submit" class="btn btn-secondary">&nbsp;Unfollow</button>
                                </form>

                                <?php endif; ?>

                                <?php endif; ?>

                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="instructor-profile-tabs">
                    <ul class="nav nav-tabs" id="tabs-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true"><?php echo e(__('About me')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="classes-tab" data-toggle="tab" href="#classes" role="tab" aria-controls="classes" aria-selected="false"><?php echo e(__('Explore Courses')); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                           <?php echo $instructors['detail']; ?>

                        </div>
                        <?php if(isset($courses)): ?>
                        
                        <div class="tab-pane fade" id="classes" role="tabpanel" aria-labelledby="classes-tab">
                           <div class="about-instructor">
                                <div class="row">
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($c->status == 1): ?>
                                    <div class="col-lg-6">
                                        <div class="courses-item mb-30  ms-0 me-0 hover-zoomin <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>">
                    
                                            <div class="thumb fix ">
                                                <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== '0'): ?>
                                                <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="contact-bg-an-01"></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="contact-bg-an-01"></a>
                                                <?php endif; ?>
                                                    
                                                <div class="courses-icon">
                                                    <ul>
                                                        <li class="protip-wish-btn">
                                                            <a  href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($c['title']); ?>"
                                                                target="__blank" title="reminder"><i data-feather="bell"></i></a>
                                                        </li>

                                                        <?php if(Auth::check()): ?>
                                                        <li class="protip-wish-btn">
                                                            <a class="compare" data-id="<?php echo e(filter_var($c->id)); ?>" title="compare">
                                                                <i data-feather="bar-chart"></i>
                                                            </a>
                                                        </li>
                                                        

                                                        <?php
                                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                                        $c->id)->first();
                                                        ?>
                                                        <?php if($wish == NULL): ?>
                                                        <li class="protip-wish-btn">
                                                            <form id="demo-form2" method="post"
                                                                action="<?php echo e(url('show/wishlist', $c->id)); ?>" data-parsley-validate
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id" value="<?php echo e($c->id); ?>" />

                                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                                        data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        <?php else: ?>
                                                        <li class="protip-wish-btn-two heart-fill">
                                                            <form id="demo-form2" method="post"
                                                                action="<?php echo e(url('remove/wishlist', $c->id)); ?>" data-parsley-validate
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id" value="<?php echo e($c->id); ?>" />

                                                                <button class="wishlisht-btn" title="Remove from Wishlist"
                                                                    type="submit"><i data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                        <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i
                                                                    data-feather="heart"></i></a></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php if(isset($c->discount_price)): ?>
                                            <div class="badges bg-priamry offer-badge"><span><?php echo e(__('OFF')); ?><span><?php echo round((($c->price - $c->discount_price) * 100) / $c->price) . '%'; ?></span></span></div>
                                            <?php endif; ?>
                                            <div class="courses-content">    
                                                <div class="view-user-img">
                                                    <a href="<?php echo e(route('all/profile',$c->user->id)); ?>" title="<?php echo e(optional($c->user)['fname']); ?>">
                                                        <?php if($c->user['user_img'] !== NULL && $c->user['user_img'] !== ''): ?>
                                                        <img src="<?php echo e(asset('images/user_img/'.$c->user['user_img'])); ?>" class="img-fluid user-img-one" alt="">
                                                        <?php else: ?>
                                                        <img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="img">
                                                        <?php endif; ?>
                                                    </a>
                                                                            
                                                </div>                                
                                                <div class="cat">
                                                    <div class="rate text-right">
                                                        <ul>
                                                            <?php if($c->type == 1): ?>
                                                                <?php if($c->discount_price != NULL): ?>
                                                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($c['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?> <?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                                    <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></strike></b></a></li>
                                                                <?php elseif($c->price != NULL): ?>
                                                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h3><a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"> <?php echo e($c->category['title'] ?? '-'); ?></a></h3>
                                                    <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($c->detail))) , $limit = 70, $end = '...')); ?>

                                                <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>" class="readmore"><?php echo e(__('Read More ')); ?><i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                            <div class="icon">
                                                <img src="<?php echo e(url('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                                            </div>
                                        </div>
                                    </div> 
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </div>
                            </div>
                            <div><?php echo e($courses->links()); ?></div>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- instructor profile end -->
<section id="instructor-info" class="instructor-info-main-block">
    <div class="container-xl">
        
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/all/profile.blade.php ENDPATH**/ ?>