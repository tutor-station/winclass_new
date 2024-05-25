
<?php $__env->startSection('title', 'Institute Detail'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- breadcumb start -->
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
                        <h2><?php echo e(__('Institute Profile')); ?></h2>

                            
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-wrap2">
                    
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Institute Profile')); ?></li>
                            </ol>
                        </nav>
                    </div>
                
            </div>
        </div>
    </section>
<!-- breadcumb end -->
<section id="institute-detail" class="institute-detail-main-block pt-120 pb-120">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="institute-detail-block text-center">
                    <div class="institute-detail-img">
                        <?php if($institute['image'] !== NULL && $institute['image'] !== ''): ?>
                        <img src="<?php echo e(asset('files/institute/'.$institute['image'])); ?>" alt="<?php echo e(__('course')); ?>" class="img-fluid">
                        <?php else: ?>
                            <img src="<?php echo e(Avatar::create($institute->title)->toBase64()); ?>" alt="<?php echo e(__('course')); ?>" class="img-fluid">
                        <?php endif; ?>                    
                    </div>
                    <div class="institute-dtl">
                        <div class="institute-content-block">
                            <h3 class="institute-content-title"><?php echo e($institute ->title); ?></h3>
                            <div class="institute-mobile"><?php echo e($institute ->mobile); ?></div>
                            <div class="institute-email"><?php echo e($institute ->email); ?></div>
                            <div class="institute-address"><?php echo e($institute ->address); ?></div>
                            <div class="institute-status mt-2 mb-2">
                                <span class="badge bg-primary"> <?php if($institute->status == '1'): ?>
                                    <?php echo e(__('Active')); ?>

                                    <?php else: ?>
                                    <?php echo e(__('Deactivate')); ?>


                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="institute-verified mt-2 mb-2">
                                <span class="badge bg-success"><?php if($institute->verified == '1'): ?>
                                    <?php echo e(__('Verified')); ?>

                                    <?php else: ?>
                                    <?php echo e(__('Not verified')); ?>


                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="institute-detail-tab">
                    <ul class="nav nav-tabs" id="tabs-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="true"><?php echo e(__('Courses')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false"><?php echo e(__('Detail')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="skill-tab" data-toggle="tab" href="#skill" role="tab" aria-controls="skill" aria-selected="true"><?php echo e(__('Skill')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="affiliated-tab" data-toggle="tab" href="#affiliated" role="tab" aria-controls="affiliated" aria-selected="true"><?php echo e(__('Affiliated')); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane active show" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                            <?php if(isset($course)): ?>
                            <div class="about-instructor">
                                <div class="row">
                                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <?php else: ?>
                                <div class="about-instructor-no-found"><i data-feather="Frown"></i><?php echo e(__('No Data Found')); ?></div>                          
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                           <p><?php echo e($institute->detail); ?></p>
                        </div>
                        <div class="tab-pane" id="skill" role="tabpanel" aria-labelledby="skill-tab">
                            <ul>
                                <li><span class="badge bg-info"><?php echo e($institute->skill); ?></span></li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="affiliated" role="tabpanel" aria-labelledby="affiliated-tab">
                            <ul>
                                <li><span class="badge bg-info"><?php echo e($institute->affilated_by); ?></span></li>                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/institute/slug.blade.php ENDPATH**/ ?>