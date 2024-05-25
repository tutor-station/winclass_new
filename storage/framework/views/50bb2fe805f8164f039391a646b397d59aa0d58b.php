
<?php $__env->startSection('title', 'Test Series'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- blog end -->
<?php
   $gets = App\Breadcum::first();
   ?>
   
   
     <!-- breadcrumb-area-end -->   
      <!-- inner-blog -->
      <?php if(isset($testSeries)): ?>
          
      <?php endif; ?>
     
 <section class="courses pt-120 pb-60 p-relative fix">
    <div class="animations-01"><img src="<?php echo e(url('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01')}}"></div>
    <div class="container">
        <div class="row">   
            <div class="col-lg-12 p-relative">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5 class="text-center"><i class="fal fa-graduation-cap"></i> <?php echo e(__('Test Series')); ?></h5>
                    <h2 class="text-center">
                        <?php echo e(__('Test Series')); ?>

                    </h2>                             
                </div>
            </div>
        </div>
        <div class="row">  
            <?php $__currentLoopData = $cors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($c->status == 1 && $c->featured == 1): ?>   
                <div class="col-lg-3 col-md-3" style="height:415px;">
                <div class="courses-item mb-30 hover-zoomin <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>">
                
                    <div class="thumb fix ">
                        <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== '0'): ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="contact-bg-an-01"></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="contact-bg-an-01"></a>
                        <?php endif; ?>
                            
                        <div class="courses-icon">
                            <ul>
                                <li class="protip-wish-btn"><a
                                        href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($c['title']); ?>"
                                        target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

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
                    <!-- <?php if(isset($c->discount_price)): ?>
                    <div class="badges bg-priamry offer-badge"><span><?php echo e(__('OFF')); ?><span></span></span></div>
                    <?php endif; ?> -->
                    <div class="courses-content" style="height:265px">    
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
                        <h4><a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"> <?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($c->title))) , $limit = 70, $end = '...')); ?></a></h4>
                            <p><?php echo e($c->category['title'] ?? '-'); ?>

                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>" class="readmore"><?php echo e(__('Read More ')); ?><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="icon">
                        <img src="<?php echo e(url('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><br>
    </div>
</section>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/test_series.blade.php ENDPATH**/ ?>