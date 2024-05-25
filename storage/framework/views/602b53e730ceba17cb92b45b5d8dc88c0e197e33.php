
<?php $__env->startSection('title', 'My Courses'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- about-home start -->
<!-- breadcrumb-area -->
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
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('My Course')); ?></li>
                        </ol>
                    </nav>
                </div>
            
        </div>
    </div>
</section>
<!-- breadcrumb-area-end --> 
<?php if(count($course) > 0): ?>
<section class="courses pt-120 pb-120 p-relative fix">
    <div class="container">
        <div class="row">   
            <div class="col-lg-12 p-relative">
               <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h4>
                     <?php echo e(__(' My Courses')); ?>

                    </h4>                             
                </div>
            </div>
        </div>
        <div class="row">  
            <?php $__currentLoopData = $enroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($enrol->course_id != NULL): ?>
            <?php if($enrol->status == 1): ?>
            <?php if($enrol->user_id == Auth::User()->id): ?>                   
            <div class="col-lg-4 col-md-6 ">
                <div class="courses-item mb-30 hover-zoomin">
                    <div class="thumb fix">
                        <?php if($enrol->user['user_img'] !== NULL && $enrol->user['user_img'] !== ''): ?>

                        <a
                            href="<?php echo e(route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$enrol->courses->preview_image)); ?>" alt="contact-bg-an-01">
                        </a>
                        <?php else: ?>
                        <a
                            href="<?php echo e(route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$enrol->courses->preview_image)); ?>" alt="contact-bg-an-01"></a>
                        <?php endif; ?>
                    </div>
                    <div class="courses-content">                                    
                        <div class="cat"><i class="fal fa-graduation-cap"></i> Sciences</div>
                        <h3>
                            <a
                            href="<?php echo e(route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>"> <?php echo e(optional($enrol->courses->user)['fname']); ?></a>
                        </h3>
                            <p> <?php echo e(str_limit($enrol->courses->title, $limit = 100, $end = '...')); ?></p>
                        <a
                            href="<?php echo e(route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>" class="readmore">Read More <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="icon">
                        <?php if($enrol->user['user_img'] !== NULL && $enrol->user['user_img'] !== ''): ?>
                        <a href="<?php echo e(route('all/profile',$enrol->user->id)); ?>" title=""><img src="<?php echo e(asset('images/user_img/'.$enrol->user['user_img'])); ?>" alt="img" height="height: 35px;"></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('all/profile',$enrol->user->id)); ?>" title=""><img src="<?php echo e(url('frontcss/img/icon/cou-icon.png')); ?>" alt="img"></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
          <?php endif; ?>
          <?php endif; ?>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
</section>
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<?php endif; ?>
<section id="learning-courses" class="learning-courses-main-block">
    <div class="container-xl">
        <div class="row">
            <?php
            $isSubscriptionCoursesFound = false;
            ?>
            <?php $__currentLoopData = $enroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($enrol->status === 1 && $enrol->subscription_status==='active'): ?>
            <?php
            $bundle_order = App\BundleCourse::where('id', $enrol->bundle_id)->first();
            ?>
            <?php if(isset($bundle_order->course_id )): ?>
            <?php $__currentLoopData = $bundle_order->course_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php

            $coursess = App\Course::where('id', $bundle_course)->first();

            ?>

            <div class="col-lg-3 col-sm-6">
                <?php
                $isSubscriptionCoursesFound = true;
                ?>

                <div class="view-block">
                    <div class="view-img">
                        <?php if($coursess['preview_image'] !== null && $coursess['preview_image'] !== ''): ?>
                        <a href="<?php echo e(url('show/coursecontent', $coursess->id)); ?>"><img
                                src="<?php echo e(asset('images/course/' . $coursess->preview_image)); ?>" class="img-fluid"
                                alt="student">
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(url('show/coursecontent', $coursess->id)); ?>"><img
                                src="<?php echo e(Avatar::create($coursess->title)->toBase64()); ?>" class="img-fluid"
                                alt="student"></a>
                        <?php endif; ?>
                    </div>
                    <div class="view-dtl" style="height: 170px">
                        <div class="view-heading btm-10"><a
                                href="<?php echo e(url('show/coursecontent', $coursess->id)); ?>"><?php echo e(str_limit($coursess->title, $limit = 35, $end = '...')); ?></a>
                        </div>
                        <p class="btm-10"><a href="#"><?php echo e(__('by')); ?> <?php echo e($coursess->user->fname); ?></a></p>
                        <div class="rating">
                            <ul>
                                <li>
                                    <!-- star rating -->
                                    <?php
                                                    $learn = 0;
                                                    $price = 0;
                                                    $value = 0;
                                                    $sub_total = 0;
                                                    $sub_total = 0;
                                                    $reviews = App\ReviewRating::where('course_id', $coursess->id)
                                                    ->where('status', '1')
                                                    ->get();
                                                    ?>
                                    <?php if(!empty($reviews[0])): ?>
                                    <?php
                                                        $count = App\ReviewRating::where('course_id',
                                                        $coursess->id)->count();

                                                        foreach ($reviews as $review) {
                                                        $learn = $review->price * 5;
                                                        $price = $review->price * 5;
                                                        $value = $review->value * 5;
                                                        $sub_total = $sub_total + $learn + $price + $value;
                                                        }

                                                        $count = $count * 3 * 5;
                                                        $rat = $sub_total / $count;
                                                        $ratings_var = ($rat * 100) / 5;
                                                        ?>

                                    <div class="pull-left">
                                        <div class="star-ratings-sprite"><span
                                                style="width:<?php echo $ratings_var; ?>%"
                                                class="star-ratings-sprite-rating"></span>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="pull-left">
                                        <?php echo e(__('No Rating')); ?>

                                    </div>
                                    <?php endif; ?>
                                </li>
                                <!-- overall rating -->
                                <?php
                                $reviews = App\ReviewRating::where('course_id'
                                ,$coursess->id)->get();
                                ?>
                                <?php
                                                $learn = 0;
                                                $price = 0;
                                                $value = 0;
                                                $sub_total = 0;
                                                $count = count($reviews);
                                                $onlyrev = [];

                                                $reviewcount = App\ReviewRating::where('course_id', $coursess->id)
                                                ->where('status', '1')
                                                ->WhereNotNull('review')
                                                ->get();

                                                foreach ($reviewcount as $review) {
                                                $learn = $review->learn * 5;
                                                $price = $review->price * 5;
                                                $value = $review->value * 5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                                }

                                                $count = $count * 3 * 5;

                                                if ($count != '') {
                                                $rat = $sub_total / $count;

                                                $ratings_var = ($rat * 100) / 5;

                                                $overallrating = $ratings_var / 2 / 10;
                                                }
                                                ?>

                                <?php
                                $reviewsrating = App\ReviewRating::where('course_id',
                                $coursess->id)->first();
                                ?>
                                <?php if(!empty($reviewsrating)): ?>
                                <li>
                                    <b><?php echo e(round($overallrating, 1)); ?></b>
                                </li>
                                <?php endif; ?>

                                <li>
                                    (<?php
                                    $data = App\Order::where('course_id', $coursess->id)->get();
                                    if(count($data)>0){

                                    echo count($data);
                                    }
                                    else{

                                    echo "0";
                                    }
                                    ?>)
                                </li>
                            </ul>
                        </div>

                        <div class="mycourse-progress">

                            <?php $progress = App\CourseProgress::where('course_id',
                                            $coursess->id)
                                            ->where('user_id', Auth::User()->id)
                                            ->first(); ?>
                            <?php if(!empty($progress)): ?>

                            <?php
                                                $total_class = $progress->all_chapter_id;
                                                $total_count = count($total_class);

                                                $total_per = 100;

                                                $read_class = $progress->mark_chapter_id;
                                                $read_count = count($read_class);

                                                $progres = ($read_count / $total_count) * 100;
                                                ?>

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                    style="width: <?php echo $progres; ?>%" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                            <div class="complete"><?php echo $progres; ?>% <?php echo e(__('Complete')); ?></div>
                            <?php else: ?>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                    style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <div class="complete"><?php echo e(__('Start Course')); ?></div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php if(!$isSubscriptionCoursesFound): ?>
<section id="no-result-block" class="no-result-block">
    <div class="container-xl">
        <div class="no-result-courses"><?php echo e(__('When Subscribe')); ?>&nbsp;<a
                href="<?php echo e(url('/')); ?>"><b><?php echo e(__('Browse')); ?></b></a></div>
    </div>
</section>
<?php endif; ?>
<?php else: ?>
<section id="no-result-block" class="no-result-block">
    <div class="container-xl">
        <div class="no-result-courses"><?php echo e(__('when enroll')); ?>&nbsp;<a
                href="<?php echo e(url('/')); ?>"><b><?php echo e(__('Browse')); ?></b></a></div>
    </div>
</section>
<?php endif; ?>




































<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/my_course.blade.php ENDPATH**/ ?>