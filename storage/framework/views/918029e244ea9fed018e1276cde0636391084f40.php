<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->yieldContent('content'); ?>
<section id="nav-bar" class="nav-bar-main-block landing-nav-bar" data-toggle="sticky-onscroll">
    <div class="container-xl">
        <div class="logo text-center">
            <?php if($gsetting->logo_type == 'L'): ?>
                <a href="<?php echo e(url('/')); ?>" ><img src="<?php echo e(asset('images/logo/'.$gsetting->logo)); ?>" class="img-fluid" alt="logo"></a>
            <?php else: ?>
                <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($gsetting->project_title); ?></div></b></a>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php if(isset($sliders)): ?>
<section id="home-background-slider" class="background-slider-block owl-carousel">
    <div class="lazy item home-slider-img">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($slider->status == 1): ?>
        <div id="home" class="home-main-block landing-home-main-block" style="background-image: url('<?php echo e(asset('images/slider/'.$slider['image'])); ?>')">
            <div class="container-xl">
                <div class="row">
                    <div class="col-lg-12 <?php echo e($slider['left'] == 1 ? 'col-md-offset-6 col-sm-offset-6 col-sm-6 col-md-6 text-right' : ''); ?>">
                        <div class="home-dtl">
                            <div class="home-heading"><?php echo e($slider['heading']); ?></div>
                            <p class="btm-10"><?php echo e($slider['sub_heading']); ?></p>
                            <p class="btm-20"><?php echo e($slider['detail']); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php endif; ?>
<?php if(isset($facts)): ?>
<section id="learning-work" class="learning-work-main-block">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4">
                <div class="learning-work-block">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="learning-work-icon">
                                <i class="fa <?php echo e($fact['icon']); ?>"></i>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="learning-work-dtl">
                                <div class="work-heading"><?php echo e($fact['heading']); ?></div>
                                <p><?php echo e($fact['sub_heading']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($hsetting->fact_enable == 1 && isset($factsetting)): ?>
<section id="facts" class="fact-main-block">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = $factsetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 col-12"> 
                <div class="facts-block text-center">
                    <div class="facts-block-one">
                        <div class="facts-block-img">
                            <?php if($factset['image'] !== NULL && $factset['image'] !== ''): ?>
                            <img src="<?php echo e(url('/images/facts/'.$factset->image)); ?>" class="img-fluid" alt="" />
                            <?php else: ?>
                            <img src="<?php echo e(Avatar::create($factset->title)->toBase64()); ?>" alt="course"
                                class="img-fluid">
                            <?php endif; ?>
                            <div class="facts-count"><?php echo e($factset->number); ?></div>
                        </div>                        
                        <h5 class="facts-title"><a href="#" title=""><?php echo e($factset->title); ?></a></h5>
                        <p><?php echo e($factset->description); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($hsetting->testimonial_enable == 1 && ! $testi->isEmpty() ): ?>
<section id="testimonial" class="testimonial-main-block">
    <div class="container-xl">
        <h4><?php echo e(__('Testimonial')); ?></h4>
        <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">
            <?php $__currentLoopData = $testi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item testi-block text-center">
                <div class="testi-block-images">
                    <img src="<?php echo e(url('images/testimonial/testimonial.png')); ?>" class="img-fluid" alt=""> 
                </div>
                <div class="testi-block-one">
                    <div class="testi-img text-center">
                        <img data-src="<?php echo e(asset('images/testimonial/'.$tes['image'])); ?>" alt="blog" class="img-fluid owl-lazy">
                    </div>
                    <div class="testi-dtl text-center">
                        <div class="testi-name">
                            <h5 class="testi-heading mb-1"><?php echo e($tes['client_name']); ?></h5>
                            <p class="testi-para p-0"><?php echo e($tes['designation']); ?></p>
                        </div>
                        <div class="testi-rating mb-2">
                            <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i<=$tes->rating): ?>
                                <i class='fa fa-star' style='color:orange'></i>
                                <?php else: ?>
                                <i class='fa fa-star' style='color:#ccc'></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($tes->details))) , $limit = 300, $end = '...')); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($hsetting->video_enable == 1 &&  isset($videosetting) ): ?>
<section id="video" class="video-main-block landing-video">
    <div class="container-fluid p-0">
        <?php if($videosetting['image'] !== NULL && $videosetting['image'] !== ''): ?>
        <div class="video-block parallax" style="background-image: url(<?php echo e('images/videosetting/'.$videosetting->image); ?>);">
        <?php else: ?>
        <div class="video-block parallax" style="background-image: url(<?php echo e(Avatar::create($videosetting->tittle)->toBase64()); ?>);">
        <?php endif; ?>
            <div class="overlay-bg"></div>
        </div>
        <div class="video-play-btn">
            <a class="play-btn" href="#video_modal" data-toggle="modal"></a>
            <div id="video_modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="elearningVideo" class="embed-responsive-item" width="560" height="315" src="<?php echo e($videosetting->url); ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-dtl text-center">
            <h3 class="video-heading text-white"><?php echo e($videosetting->tittle); ?></h3>
            <p class="text-white"><?php echo e($videosetting->description); ?></p>
        </div>
    </div>
</section>  
<?php endif; ?>
<?php if($hsetting->service_enable == 1 && ! $services->isEmpty() && isset($servicesetting) ): ?>
<section id="services" class="services-main-block">
    <div class="container-xl">
        <h4><?php echo e(__('Our Service')); ?></h4>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="service-side-img">
                    <?php if($servicesetting['image'] == !NULL): ?>
                    <img src="<?php echo e(asset('images/services/'.$servicesetting['image'])); ?>" class="img-fluid" alt="">
                    <?php else: ?>
                    <img src="<?php echo e(Avatar::create($servicesetting->title)->toBase64()); ?>" class="img-fluid" alt="">
                    <?php endif; ?>
                    <div class="overlay-bg"></div>
                </div>
                <div class="service-side-dtl text-center">
                    <h3 class="service-heading mb-4"><?php echo e($servicesetting->title); ?></h3>
                    <p class="mb-4"><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($servicesetting->detail))) , $limit = 300, $end = '...')); ?></p>
                    <a href="<?php echo e(route('front.service')); ?>" type="button" class="btn btn-primary mt-2" title="View More"><?php echo e(__('View More')); ?> <i data-feather="chevrons-right"></i></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-block">
                            <div class="service-img text-center">
                                <?php if($ser['image'] == !NULL): ?>
                                    <img src="<?php echo e(asset('images/services/'.$ser['image'])); ?>" class="img-fluid" alt="">
                                <?php else: ?>
                                    <img src="<?php echo e(Avatar::create($ser->title)->toBase64()); ?>" class="img-fluid" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="service-dtl text-center">
                                <h5 class="service-heading mb-2"><?php echo e($ser->title); ?></h5>
                                <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($ser->detail))) , $limit = 80, $end = '...')); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($hsetting->get_enable == 1 && isset($get_enable)): ?>
<section id="get-started" class="get-started-main-block landing-get-started">
    <div class="container-fluid p-0">
        <div class="get-started-block">
            <?php if($get_enable['image'] !== NULL && $get_enable['image'] !== ''): ?>
            <div class="get-started-bg-image parallax" style="background-image: url(<?php echo e('images/getstarted/'.$get_enable->image); ?>);">
            <?php else: ?>
            <div class="get-started-bg-image parallax" style="background-image: url(<?php echo e(Avatar::create($get_enable->heading)->toBase64()); ?>);">
            <?php endif; ?> 
                <div class="overlay-bg"></div>
            </div>
            <div class="get-started-dtl text-center">
                <h1 class="get-started-title text-white mb-2 text-center"><?php echo e($get_enable->heading); ?></h1>
                <h4 class="get-started-sub-title text-white text-center"><?php echo e($get_enable->sub_heading); ?></h4>
                <a href="<?php echo e($get_enable->link); ?>" type="button" class="btn btn-primary"><?php echo e($get_enable->button_txt); ?></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($hsetting->feature_enable == 1 && ! $feature->isEmpty() && isset($featuresetting) ): ?>
<section id="feature" class="feature-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="feature-block">
                    <h4 class="feature-title"><?php echo e($featuresetting->title); ?></h4>
                    <p><?php echo e($featuresetting->detail); ?></p>
                </div>
                <div class="feature-dtl-block">
                    <div class="row">
                        <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="feature-dtl-icon">
                                <?php if($data['image'] == !NULL): ?>
                                    <img src="<?php echo e(asset('images/feature/'.$data['image'])); ?>" class="img-fluid" alt="">
                                <?php else: ?>
                                    <img src="<?php echo e(Avatar::create($data->title)->toBase64()); ?>" class="img-fluid" alt="">
                                <?php endif; ?>  
                            </div>    
                            <div class="feature-dtl">
                                <h5 class="feature-dtl-title mb-2"><?php echo e($data->title); ?></h5>
                                <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($data->detail))) , $limit = 300, $end = '...')); ?></p>                       
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(route('front.feature')); ?>" type="button" class="btn btn-primary" title="View More"><?php echo e(__('View More')); ?> <i data-feather="chevrons-right"></i></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="feature-image">
                    <?php if($featuresetting['image'] == !NULL): ?>
                    <img src="<?php echo e(asset('images/feature/'.$featuresetting['image'])); ?>" class="img-fluid" alt="">
                <?php else: ?>
                    <img src="<?php echo e(Avatar::create($featuresetting->title)->toBase64()); ?>" class="img-fluid" alt="">
                <?php endif; ?>                  
            </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($hsetting->trusted_enable == 1 && ! $trusted->isEmpty() ): ?>
<section id="trusted" class="trusted-main-block">
    <div class="container-xl">
        <div class="patners-block">

            <h6 class="patners-heading btm-40"><?php echo e(__('Trusted By Companies')); ?></h6>
            <div id="patners-slider" class="patners-slider owl-carousel">
                <?php $__currentLoopData = $trusted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-patners-img">
                    <a href="<?php echo e($trust['url']); ?>" target="_blank"><img
                            data-src="<?php echo e(asset('images/trusted/'.$trust['image'])); ?>" class="img-fluid owl-lazy"
                            alt="patners-1"></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</section>
<?php endif; ?>
<?php if(isset($qr)): ?>
<section id="download-apk" class="download-apk-main-block" style="background-image: url(<?php echo e('images/qr/qr_bg.png'); ?>);">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="download-apk-side-img">
                    <img src="<?php echo e(asset('images/qr/'.$qr['demo_image'])); ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="download-apk-block text-center">
                    <h2 class="download-title mb-2"><?php echo e(__('Download Apks for Android')); ?></h2>
                    <p><?php echo e(__('Please scan the QR code and download the app')); ?></p>
                </div>
                <div class="download-apk-img text-center">
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <h5 class="apk-heading"><?php echo e(__('Download Instructor')); ?> <br><?php echo e(__('APK for Android')); ?></h5>
                            <img src="<?php echo e(asset('images/qr/'.$qr['image'])); ?>" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 col-6">
                            <h5 class="apk-heading"><?php echo e(__('Download User ')); ?><br><?php echo e(__('APK for Android')); ?></h5>
                            <img src="<?php echo e(asset('images/qr/'.$qr['image2'])); ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- testimonial end -->
<!-- footer start -->
<?php echo $__env->make('theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- footer end -->
<!-- jquery -->
<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /var/www/html/resources/views/front/landing.blade.php ENDPATH**/ ?>