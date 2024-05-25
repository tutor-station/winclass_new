
<?php $__env->startSection('title', "$course->title"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('meta_tags'); ?>

<?php
    $url =  URL::current();
?>

<meta name="title" content="<?php echo e($course['title']); ?>">
<meta name="description" content="<?php echo e($course['short_detail']); ?> ">
<meta property="og:title" content="<?php echo e($course['title']); ?> ">
<meta property="og:url" content="<?php echo e($url); ?>">
<meta property="og:description" content="<?php echo e($course['short_detail']); ?>">
<meta property="og:image" content="<?php echo e(asset('images/course/'.$course['preview_image'])); ?>">
<meta itemprop="image" content="<?php echo e(asset('images/course/'.$course['preview_image'])); ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo e(asset('images/course/'.$course['preview_image'])); ?>">
<meta property="twitter:title" content="<?php echo e($course['title']); ?> ">
<meta property="twitter:description" content="<?php echo e($course['short_detail']); ?>">
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>" />
<link rel="canonical" href="<?php echo e(url()->full()); ?>"/>
<meta name="robots" content="all">
<meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
    
<?php $__env->stopSection(); ?>


<!-- breadcrumb-area -->
    <?php
    $gets = App\Breadcum::first();
    ?>
    
    <!-- <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
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
                        <h2><?php echo e(__('Course Detail')); ?></h2>  
                    </div>
                </div>
            </div>
            <div class="breadcrumb-wrap2">
                  
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Course Details')); ?></li>
                    </ol>
                </nav>
            </div>
            
        </div>
    </div>
</section> -->
<!-- breadcrumb-area-end -->
<!-- Project Detail -->
<section class="project-detail">
    <div class="container">
        <div class="lower-content">
            <div class="row">
                <div class="text-column col-lg-9 col-md-8 col-sm-12">
                    <h2><?php echo e($course['title']); ?></h2>
                
                    <div class="upper-box">
                        <div class="single-item-carousel">
                            <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                            <figure class="image"><img src="<?php echo e(asset('images/course/'.$course['preview_image'])); ?>" ></figure>
                        <?php else: ?>
                        <figure class="image"><img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>"  alt="Background"></figure>
                        <?php endif; ?>
                        </div>
                    </div>

                    <div class="inner-column">
                       
                        <section id="about-product" class="about-product-main-block">
                            <div class="container-xl">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if($whatlearns->isNotEmpty()): ?>
                                            <div class="product-learn-block">
                                                <h3 class="product-learn-heading"><?php echo e(__('What learn')); ?></h3>
                                                <div class="row">
                                                    <?php $__currentLoopData = $course['whatlearns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($wl->status ==1): ?>
                                                    <div class="col-lg-6 col-md-6">
                                                        
                                                            <ul class="pr-ul">
                                                                <li>
                                                                    <div class="icon"><i class="fal fa-check"></i></div>
                                                                    <div class="text">
                                                                    <?php echo e(str_limit($wl['detail'], $limit = 120, $end = '...')); ?>

                                                                    </div>
                                                                </li>
                                                            </ul>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                        
                                        



                                        <?php if($coursechapters->isNotEmpty()): ?>
                        <div class="course-content-block btm-30 top-20">

                            <div class="row">
                                <div class="col-lg-8 col-8">
                                    <h3 class="mt-3 mb-1"><?php echo e(__('Course Content')); ?></h3>
                                </div>
                                <!--
                                FSMS commenting below div in order to show course length correctly. 
                                <div class="col-lg-4 col-6">
                                    <div class="chapter-total-time">
                                        <?php
                                        $classtwo =  App\CourseClass::where('course_id', $course->id)->sum("duration");

                                        echo $duration_round2 = round($classtwo,2);
                                        ?>
                                        <?php echo e(__('min')); ?>

                                    </div>
                                </div>
                                -->
                            </div>
                            <!-- FSMS -->
                            <div class="row" style="padding-bottom:10px">
                                <div class="col-lg-9 col-6">
                                    <div class="expand-content">
                                        <?php
                                            
                                            $classtwo =  App\CourseClass::where('course_id', $course->id)->sum("duration");

                                            // echo $duration_round2 = round($classtwo,2);

                                            $chapterCount = $coursechapters->count();
                                            $classesCount = count(App\CourseClass::where('course_id', $course->id)->get());
                                            $courseDuration = convertToHoursMins($classtwo, '%02dh %02dm total length');
                                            // FSMS
                                        ?>

                                        <small><?php echo e($chapterCount . " sections • " .$classesCount . " lectures • " . $courseDuration); ?></small>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-3 col-6 col-xs-6 text-right">
                                    <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle"><span style="color:#0384a3"><?php echo e(__('Expand all sections')); ?></span></button>
                                    <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle" style="display:none"><span style="color:#0384a3"><?php echo e(__('Collapse all sections')); ?></span></button>
                                </div> -->
                            </div>
                            <!-- FSMS -->

                            <div class="faq-block">
                                <div class="faq-dtl">
                                    <div id="accordion" class="second-accordion">
                                        <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($chapter->status == 1 and $chapter->count() > 0 ): ?>

                                        <div class="card">
                                            <div class="card-header" id="headingTwo<?php echo e($chapter->id); ?>">
                                                <div class="mb-0">
                                                    <button class="btn btn-link col-lg-12" data-toggle="collapse" data-target="#collapseTwo<?php echo e($chapter->id); ?>" aria-expanded="<?php echo e($key == 0 ? 'true' : 'false'); ?>" aria-controls="collapseTwo">

                                                        <div class="row">
                                                        <div class="col-lg-8 col-6">
                                                            <?php echo e($chapter['chapter_name']); ?>

                                                            
                                                            <?php if($course->involvement_request == 1): ?>
                                                                <?php
                                                                $fullname = optional($chapter->user)->fname . ' ' . optional($chapter->user)->lname;
                                                                $fullname = preg_replace('/\s+/', '', $fullname);
                                                                ?>
                                                                <?php if($chapter->user_id != NULL): ?>
                                                                <a href="<?php echo e(route('instructor.profile', ['id' => $chapter->user->id, 'name' => $fullname] )); ?>">- <?php echo e(__('by')); ?> <?php echo e($chapter->user['fname']); ?> </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-lg-2 col-4">
                                                            <div class="text-right">
                                                                <?php
                                                                    $classone = App\CourseClass::where('coursechapter_id', $chapter->id)->orderBy('position','ASC')->get();
                                                                    if(count($classone)>0){

                                                                        echo count($classone);
                                                                    }
                                                                    else{

                                                                        echo "0";
                                                                    }
                                                                ?>
                                                                <?php echo e(__('Classes')); ?>

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2 col-2">
                                                            <div class="chapter-total-time">
                                                                <?php
                                                                $classtwo =  App\CourseClass::where('coursechapter_id', $chapter->id)->sum("duration");

                                                                echo $duration_round = round($classtwo,2);
                                                                ?>
                                                                <?php echo e(__('min')); ?>

                                                            </div>
                                                        </div>

                                                    </div>

                                                    </button>
                                                </div>

                                            </div>
                                            <!--
                                            FSMS commenting below line in order to collapse all chapters by default.  
                                               <div id="collapseTwo<?php echo e($chapter->id); ?>" class="collapse <?php echo e($loop->first ? "show" : ""); ?>" aria-labelledby="headingTwo" data-parent="#accordion">
                                               
                                             -->
                                            
                                            <div id="collapseTwo<?php echo e($chapter->id); ?>" class="collapse <?php echo e($key == 0 ? 'show' : ''); ?>" aria-labelledby="headingTwo" data-parent="#accordion">

                                                <div class="card-body">
                                                    <table class="table">
                                                        <tbody>
                                                            <?php $__currentLoopData = $courseclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($class->status == 1): ?>
                                                            <?php if($class->coursechapter_id == $chapter->id): ?>
                                                            <tr>
                                                                <th class="class-icon">
                                                                <?php if($class->type =='video' ): ?>
                                                                <a href="https://ummeedclasses.tutorstation.in/watch/courseclass/<?= $class->id; ?>" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                <?php endif; ?>
                                                                <?php if($class->type =='audio' ): ?>
                                                                <a href="#" title="Course"><i class="fas fa-play"></i></a>
                                                                <?php endif; ?>
                                                                <?php if($class->type =='image' ): ?>
                                                                <a href="#" title="Course"><i class="fas fa-image"></i></a>
                                                                <?php endif; ?>
                                                                <?php if($class->type =='pdf' ): ?>
                                                                <a href="#" title="Course"><i class="fas fa-file-pdf"></i></a>
                                                                <?php endif; ?>
                                                                <?php if($class->type =='zip' ): ?>
                                                                <a href="#" title="Course"><i class="far fa-file-archive"></i></a>
                                                                <?php endif; ?>
                                                                </th>

                                                                <td>

                                                                    <div class="koh-tab-content">
                                                                      <div class="koh-tab-content-body">
                                                                        <div class="koh-faq">
                                                                          <div class="koh-faq-question">

                                                                            <span class="koh-faq-question-span"> <?php echo e($class['title']); ?> </span>

                                                                            <?php if($class->date_time != NULL): ?>
                                                                               <div class="live-class">Live at: <?php echo e($class->date_time); ?></div>
                                                                            <?php endif; ?>
                                                                            <?php if($class->detail != NULL): ?>
                                                                                <i class="fa fa-sort-down" aria-hidden="true"></i>
                                                                            <?php endif; ?>
                                                                          </div>
                                                                          <div class="koh-faq-answer">
                                                                            <?php echo $class->detail; ?>

                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <?php if($class->preview_url != NULL || $class->preview_video != NULL ): ?>

                                                                    <a href="<?php echo e(route('lightbox',$class->id)); ?>" class="iframe" style="display: block;"><?php echo e(__('preview')); ?></a>

                                                                    <?php endif; ?>

                                                                </td>

                                                                <td class="txt-rgt">
                                                                    <?php if($class->type =='video'): ?>
                                                                    <?php echo e($class['duration']); ?><?php echo e(__('min')); ?>

                                                                    <?php else: ?>
                                                                    <?php echo e($class['size']); ?>mb
                                                                    <?php endif; ?>

                                                                </td>
                                                                <?php if($class->pro_class =='1'): ?>
                                                                    <td class="txt-rgt">
                                                                        &nbsp<i class="fas fa-lock" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
                                                                    </td>
                                                                <?php else: ?>
                                                                    <td class="txt-rgt">
                                                                        
                                                                    </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <?php endif; ?>

                        
                                            
                        
                                        <?php if(auth()->guard()->check()): ?>
                        
                                        <?php
                                        $user_enrolled = App\Order::where('course_id', $course->id)->where('user_id', Auth::user()->id) ->first();
                        
                                        $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();
                        
                                        $course_id = array();
                                          
                                        
                                        // foreach($bundle as $b)
                                        // {
                                        //  $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                                        //   array_push($course_id, $bundle->course_id);
                                        // }
                        
                                        $course_id = array_values(array_filter($course_id));
                        
                                        $course_id = array_flatten($course_id);
                        
                                        ?>
                        
                        
                                        <?php if( $user_enrolled != NULL || Auth::user()->role == 'admin' || isset($course_id) || in_array($course->id, $course_id)): ?>
                        
                                        <?php if( ! $bigblue->isEmpty() ): ?>
                        
                                        <div class="course-content-block btm-30">
                                            <h5><?php echo e(__('Big Blue Meetings')); ?></h5>
                                            <div class="faq-block">
                                                <div class="faq-dtl">
                                                    <div id="accordion" class="second-accordion">
                        
                                                    <?php $__currentLoopData = $bigblue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($bbl->is_ended != 1): ?>
                        
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree<?php echo e($bbl->id); ?>">
                                                            <div class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree<?php echo e($bbl->id); ?>" aria-expanded="false" aria-controls="collapseThree">
                        
                                                                    <?php echo e($bbl['meetingname']); ?>

                        
                                                                </button>
                                                            </div>
                        
                                                        </div>
                                                        <div id="collapseThree<?php echo e($bbl->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        
                                                        <div class="card-body">
                                                            <table class="table">
                                                            <tbody>
                                                                <td>
                                                                  <ul>
                                                                    <li><a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($bbl->user)): ?> <?php echo e($bbl->user['fname']); ?> <?php echo e($bbl->user['lname']); ?> <?php endif; ?></a></li>
                                                                    <li><a href="#" title="about"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($bbl['start_time']))); ?></a></li>
                                                                    <li class="comment more">
                                                                       <?php echo $bbl->detail; ?>

                                                                    </li>
                        
                                                                    <li>
                                                                        <a href="" data-toggle="modal" data-target="#myModalBBL" title="join" class="btn btn-light" title="course"><?php echo e(__('Join Meeting')); ?></a>
                                                                    </li>
                        
                                                                    <div class="modal fade" id="myModalBBL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                        <div class="modal-dialog modal-lg" role="document">
                                                                          <div class="modal-content">
                                                                            <div class="modal-header">
                        
                                                                              <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Join Meeting')); ?></h4>
                                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <div class="box box-primary">
                                                                              <div class="panel panel-sum">
                                                                                <div class="modal-body">
                        
                                                                                    <form action="<?php echo e(route('bbl.api.join')); ?>" method="POST">
                                                                                        <?php echo csrf_field(); ?>
                        
                                                                                        <div class="form-group">
                                                                                            <label><?php echo e(__('Meeting ID')); ?>:</label>
                                                                                            <input readonly="" type="text" name="meetingid" value="<?php echo e($bbl['meetingid']); ?>" class="form-control">
                                                                                        </div>
                        
                                                                                        <div class="form-group">
                                                                                            <label><?php echo e(__('Your Name')); ?>:</label>
                                                                                            <input value="<?php echo e(old('name')); ?>" type="text" required="" name="name" placeholder="<?php echo e(__('Enter your name')); ?>" class="form-control">
                                                                                        </div>
                        
                                                                                        <div class="form-group">
                                                                                            <label><?php echo e(__('Meeting Password')); ?>:</label>
                                                                                            <input type="password" name="password" placeholder="<?php echo e(__('Enter meeting password')); ?>" class="form-control" required="">
                                                                                        </div>
                        
                                                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                                                            <?php echo e(__('Join Meeting')); ?>

                                                                                        </button>
                        
                                                                                    </form>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                    </div>
                        
                                                                  </ul>
                                                                </td>
                        
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                       </div>
                                                    </div>
                        
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                        
                                        <?php if( ! $meetings->isEmpty() ): ?>
                        
                                        <div class="course-content-block btm-30">
                                            <h5><?php echo e(__('Zoom Meetings')); ?></h5>
                                            <div class="faq-block">
                                                <div class="faq-dtl">
                                                    <div id="accordion" class="second-accordion">
                        
                        
                                                    <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                                    <div class="card">
                                                        <div class="card-header" id="headingFour<?php echo e($meeting->id); ?>">
                                                            <div class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($meeting->id); ?>" aria-expanded="false" aria-controls="collapseFour">
                        
                                                                    <?php echo e($meeting['meeting_title']); ?>

                        
                                                                </button>
                                                            </div>
                        
                                                        </div>
                                                        <div id="collapseFour<?php echo e($meeting->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        
                                                        <div class="card-body">
                                                            <table class="table">
                                                            <tbody>
                                                                <td>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($meeting->user)): ?> <?php echo e($meeting->user['fname']); ?> <?php echo e($meeting->user['lname']); ?> <?php endif; ?> </a>
                        
                                                                        </li>
                                                                        <li>
                                                                           <p><?php echo e(__('Meeting Owner')); ?>: <?php echo e($meeting->owner_id); ?></p>
                                                                        </li>
                                                                        <li>
                                                                           <p class="btm-10"><a herf="#"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                                                                        </li>
                                                                        <li>
                                                                             <a href="<?php echo e($meeting->zoom_url); ?>" target="_blank" class="btn btn-light"><?php echo e(__('Join Meeting')); ?></a>
                                                                        </li>
                                                                    </ul>
                        
                                                                </td>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                       </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                        
                        
                                        
                                        <?php if($gsetting->googlemeet_enable == '1'): ?>
                                        <?php if( ! $googlemeetmeetings->isEmpty() ): ?>
                        
                                        <div class="course-content-block btm-30">
                                            <h5> <?php echo e(__('Google Meetings')); ?></h5>
                                            <div class="faq-block">
                                                <div class="faq-dtl">
                                                    <div id="accordion" class="second-accordion">
                        
                        
                                                    <?php $__currentLoopData = $googlemeetmeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                                    <div class="card">
                                                        <div class="card-header" id="headingFour<?php echo e($meeting->id); ?>">
                                                            <div class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($meeting->id); ?>" aria-expanded="false" aria-controls="collapseFour">
                        
                                                                    <?php echo e($meeting['meeting_title']); ?>

                        
                                                                </button>
                                                            </div>
                        
                                                        </div>
                                                        <div id="collapseFour<?php echo e($meeting->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        
                                                        <div class="card-body">
                                                            <table class="table">
                                                            <tbody>
                                                                <td>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($meeting->user)): ?> <?php echo e($meeting->user['fname']); ?> <?php echo e($meeting->user['lname']); ?> <?php endif; ?> </a>
                        
                                                                        </li>
                                                                        <li>
                                                                           <p>Meeting Owner: <?php echo e($meeting->owner_id); ?></p>
                                                                        </li>
                                                                        <li>
                                                                           <p class="btm-10"><a herf="#"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                                                                        </li>
                                                                        <li>
                                                                             <a href="<?php echo e($meeting->meet_url); ?>" target="_blank" class="btn btn-light"><?php echo e(__('Join Meeting')); ?></a>
                                                                        </li>
                                                                    </ul>
                        
                                                                </td>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                       </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        
                        
                                        
                                        <?php if($gsetting->jitsimeet_enable == '1'): ?>
                                        <?php if( ! $jitsimeetings->isEmpty() ): ?>
                                        <div class="course-content-block btm-30">
                                            <h5> Jitsi Meetings</h5>
                                            <div class="faq-block">
                                                <div class="faq-dtl">
                                                    <div id="accordion" class="second-accordion">
                        
                        
                                                    <?php $__currentLoopData = $jitsimeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                                    <div class="card">
                                                        <div class="card-header" id="headingFour<?php echo e($meeting->id); ?>">
                                                            <div class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($meeting->id); ?>" aria-expanded="false" aria-controls="collapseFour">
                        
                                                                    <?php echo e($meeting['meeting_title']); ?>

                        
                                                                </button>
                                                            </div>
                        
                                                        </div>
                                                        <div id="collapseFour<?php echo e($meeting->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        
                                                        <div class="card-body">
                                                            <table class="table">
                                                            <tbody>
                                                                <td>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($meeting->user)): ?> <?php echo e($meeting->user['fname']); ?> <?php echo e($meeting->user['lname']); ?> <?php endif; ?> </a>
                        
                                                                        </li>
                                                                        <li>
                                                                           <p><?php echo e(__('Meeting Owner')); ?>: <?php echo e($meeting->owner_id); ?></p>
                                                                        </li>
                                                                        <li>
                                                                           <p class="btm-10"><a herf="#"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                                                                        </li>
                                                                        <li>
                                                                             <a href="<?php echo e(url('meetup-conferencing/'.$meeting->meeting_id)); ?>" target="_blank" class="btn btn-light"><?php echo e(__('Join Meeting')); ?></a>
                                                                        </li>
                                                                    </ul>
                        
                                                                </td>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                       </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                        
                                        <?php endif; ?>
                                        
                        
                        
                                        <?php endif; ?>
                        
                                        <?php endif; ?>
                    
                                
                        
                                        <div class="requirements">
                                            <h3><?php echo e(__('Requirements')); ?></h3>
                                            <ul>
                                                <li class="comment more">
                                                    <?php if(strlen($course->requirement) > 400): ?>
                                                    <?php echo e(substr($course->requirement,0,400)); ?>

                                                    <span class="read-more-show hide_content"><br>+&nbsp;<?php echo e(__('See More')); ?></span>
                                                    <span class="read-more-content"> <?php echo e(substr($course->requirement,400,strlen($course->requirement))); ?>

                                                    <span class="read-more-hide hide_content"><br>-&nbsp;<?php echo e(__('See Less')); ?></span> </span>
                                                    <?php else: ?>
                                                    <?php echo e($course->requirement); ?>

                                                    <?php endif; ?>
                                                </li>
                        
                                            </ul>
                                        </div>
                                        <div class="description-block btm-30">
                                            <h3><?php echo e(__('Description')); ?></h3>
                        
                                            <p><?php echo $course->detail; ?></p>
                        
                                        </div>
                        
                        
                                       <?php
                                            $alreadyrated = App\ReviewRating::where('course_id', $course->id)->limit(1)->first();
                                        ?>
                                        <?php if($alreadyrated == !NULL): ?>
                                        <?php if($alreadyrated->featured == 1): ?>
                                            <div class="featured-review btm-40">
                                                <h3><?php echo e(__('Featured Review')); ?></h3>
                                                <?php
                        
                                                    $user_count = count([$alreadyrated]);
                                                    $user_sub_total = 0;
                                                    $user_learn_t = $alreadyrated->learn * 5;
                                                    $user_price_t = $alreadyrated->price * 5;
                                                    $user_value_t = $alreadyrated->value * 5;
                                                    $user_sub_total = $user_sub_total + $user_learn_t + $user_price_t + $user_value_t;
                        
                                                    $user_count = ($user_count * 3) * 5;
                                                    $rat1 = $user_sub_total / $user_count;
                                                    $ratings_var1 = ($rat1 * 100) / 5;
                        
                                                ?>
                                                <?php if(isset($alreadyrated)): ?>
                                                
                                                <?php $__currentLoopData = $coursereviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($rating->review == !null && $rating->featured == 1): ?>
                                                <div class="featured-review-block">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-sm-3 col-4">
                                                            <div class="featured-review-img">
                                                                <div class="review-img text-white">
                                                                <?php echo e(str_limit($rating->user->fname ?? '', $limit = 1, $end = '')); ?><?php echo e(str_limit($rating->user->lname ?? '', $limit = 1, $end = '')); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10 col-sm-9 col-8">
                                                            <div class="featured-review-img-dtl">
                                                                <div class="review-img-name"><span> <?php if(isset($rating->user)): ?> <?php echo e($rating->user['fname']); ?> <?php echo e($rating->user['lname']); ?> <?php endif; ?></span></div>
                                                                <div class="pull-left">
                                                                    <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%" class="star-ratings-sprite-rating"></span>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="year btm-20"><?php echo e(date('jS F Y', strtotime($rating['created_at']))); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="btm-20"><?php echo e($rating['review']); ?></p>
                        
                                                    <?php if(auth()->guard()->check()): ?>
                                                    <div class="review"><?php echo e(__('helpful')); ?>?
                                                        <?php
                                                        $help = App\ReviewHelpful::where('user_id', Auth::User()->id)->where('review_id', $rating->id)->first();
                                                        ?>
                        
                                                        
                                                      
                                                        <?php if(isset($help['review_like']) == '1'): ?>
                                                            <div class="helpful">
                                                               
                                                                <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>

                        
                                                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                        
                                                                <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />
                        
                                                                <input type="hidden" name="helpful"  value="yes" />
                                                                <input type="hidden" name="review_like"  value="0" />
                                                                
                                                                  <button type="submit" class="btn btn-link lft-7 rgt-10 "><i class="fa fa-check"></i> <?php echo e(__('Yes')); ?></button>
                                                                </form>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="helpful">
                                                                <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>

                        
                                                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                        
                                                                <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />
                        
                                                                <input type="hidden" name="helpful"  value="yes" />
                                                                <input type="hidden" name="review_like"  value="1" />
                                                                
                                                                  <button type="submit" class="btn btn-link lft-7 rgt-10 "><?php echo e(__('Yes')); ?></button>
                                                                </form>
                                                            </div>
                                                        <?php endif; ?>
                        
                        
                        
                                                        <?php if(isset($help['review_dislike']) == '1'): ?>
                                                            <div class="helpful">
                                                               
                        
                                                                <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>

                        
                                                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                        
                                                                <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />
                        
                                                                <input type="hidden" name="helpful"  value="yes" />
                                                                <input type="hidden" name="review_dislike"  value="0" />
                                                                
                                                                  <button type="submit" class="btn btn-link lft-7 rgt-10 "><i class="fa fa-check"></i><?php echo e(__('No')); ?></button>
                                                                </form>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="helpful">
                                                                <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>

                        
                                                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                        
                                                                <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />
                        
                                                                <input type="hidden" name="helpful"  value="yes" />
                                                                <input type="hidden" name="review_dislike"  value="1" />
                                                                
                                                                  <button type="submit" class="btn btn-link lft-7 rgt-10 "><?php echo e(__('No')); ?></button>
                                                                </form>
                                                            </div>
                                                        <?php endif; ?>
                        
                                                        
                        
                                                        <a href="#" data-toggle="modal" data-target="#myModalreport"  title="report"><?php echo e(__('Report')); ?></a>
                        
                                                    </div>
                        
                                                    <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                        
                        
                        
                                        
                        
                        
                                        <!--Model start-->
                                        <?php if(auth()->guard()->check()): ?>
                                        <div class="modal fade" id="myModalCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                        
                                                  <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Report')); ?></h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="box box-primary">
                                                  <div class="panel panel-sum">
                                                    <div class="modal-body">
                        
                                                    <form id="demo-form2" method="post" action="<?php echo e(route('course.report', $course->id)); ?>"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>

                        
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo e(__('Please Enter Title')); ?>" value="" required>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email"><?php echo e(__('Email')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="email" class="form-control" name="email" placeholder="<?php echo e(__('Please Enter Email')); ?>" value="<?php echo e(Auth::user()->email); ?>" required>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="detail"><?php echo e(__('Detail')); ?>:<sup class="redstar">*</sup></label>
                                                                <textarea name="detail" rows="4"  class="form-control" placeholder="<?php echo e(__('Please Enter Detail')); ?>" required></textarea>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <br>
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('Submit')); ?></button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <!--Model close -->
                                    </div>
                        
                                </div>
                            </div>
                        </section>
                        <?php
                        $faqs = App\FaqStudent::get();
                    ?>
                    <h3>Frequently Asked Question</h3>
                    <div class="faq-wrap mt-30 pr-30 pb-60 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="heading<?php echo e($faq->id); ?>">
                                    <h2 class="mb-0">
                                        <button class="faq-btn  <?php echo e($index == 0 ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?php echo e($faq->id); ?>" aria-expanded="<?php echo e($index == 0 ? 'true' : 'false'); ?>" aria-controls="collapse">
                                           <?php echo e($faq->title); ?>

                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse<?php echo e($faq->id); ?>" class="accordion-collapse collapse <?php echo e($index == 0 ? 'show' : ''); ?>" 
                                    data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php echo e(substr(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($faq->details))), 0, 100)); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> 

                    <div class="about-instructor-block">
                        <h3><?php echo e(__('About Instructor')); ?></h3>
                        <?php
                        $fullname = isset($course->user['fname']) . ' ' . isset($course->user['lname']);
                        $fullname = preg_replace('/\s+/', '', $fullname);
                        ?>

                        <div class="about-instructor mb-40">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-4">
                                    <div class="instructor-img mb-30">
                                        
                                        <?php if($course->user->user_img != null || $course->user->user_img !=''): ?>
                                        <a href="<?php echo e(route('instructor.profile', ['id' => $course->user->id, 'name' => $fullname] )); ?>" title="instructor"><img src="<?php echo e(asset('images/user_img/'.$course->user['user_img'])); ?>" class="img-fluid" alt="instructor"></a>
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid" alt="instructor">
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9 col-8">
                                    <div class="instructor-block">
                                        <div class="instructor-name btm-10"><a href="<?php echo e(route('instructor.profile', ['id' => $course->user->id, 'name' => $fullname] )); ?>" title="instructor-name"><?php if(isset($course->user)): ?> <?php echo e($course->user['fname']); ?> <?php echo e($course->user['lname']); ?> <?php endif; ?></a></div>
                                        <div class="instructor-post btm-5"><?php echo e(__('About Instructor')); ?></div>
                                        
                                        <p><?php echo $course->user['detail']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(! $reviews->isEmpty()): ?>
                        <div class="student-feedback pb-80">
                            <h3 class="student-feedback-heading pb-20"><?php echo e(__('Student Feedback')); ?></h3>
                            <div class="student-feedback-block">

                                <div class="rating">
                                    <?php
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id',1)->where('status',"1")->WhereNotNull('review')->get();

                                    foreach($reviews as $review){

                                        $learn = $review->learn*5;
                                        $price = $review->price*5;
                                        $value = $review->value*5;
                                        $sub_total = $sub_total + $learn + $price + $value;
                                    }

                                    $count = ($count*3) * 5;

                                    if($count != "" && $count != '0')
                                    {
                                        $rat = $sub_total/$count;

                                        $ratings_var = ($rat*100)/5;

                                        $overallrating = ($ratings_var/2)/10;
                                    }

                                    ?>

                                    <div class="rating-num"><?php echo e(round($overallrating, 1)); ?></div>

                                    <?php
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $sub_total = 0;
                                    $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                    ?>
                                    <?php if(!empty($reviews[0])): ?>
                                        <?php
                                        $count =  App\ReviewRating::where('course_id',$course->id)->count();

                                        foreach($reviews as $review){
                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;
                                        $rat = $sub_total/$count;
                                        $ratings_var = ($rat*100)/5;
                                        ?>
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="rating-users"><?php echo e(__('Course Rating')); ?></div>
                                </div>
                                <div class="histo">
                                    <div class="three histo-rate">
                                        <span class="histo-star">
                                            <?php
                                            $learn = 0;
                                            $total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                            ?>
                                            <?php if(!empty($reviews[0])): ?>
                                                <?php
                                                $count =  App\ReviewRating::where('course_id',$course->id)->count();

                                                foreach($reviews as $review){
                                                    $learn = $review->learn*5;
                                                    $total = $total + $learn;
                                                }

                                                $count = ($count*1) * 5;
                                                $rat = $total/$count;
                                                $ratings_var = ($rat*100)/5;
                                                ?>

                                                <div class="pull-left">
                                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>

                                            <?php else: ?>
                                                <div class="pull-left">
                                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </span>
                                        <span class="histo-percent">
                                            <a href="#" title="rate"><?php echo e(round($ratings_var)); ?>%</a>
                                        </span>
                                        <span class="bar-block">
                                            <span id="bar-three" style=" width:<?php echo e($ratings_var); ?>%;" class="bar bar-clr bar-radius">&nbsp;</span>
                                        </span>
                                    </div>
                                    <div class="two histo-rate">
                                        <span class="histo-star">
                                            <?php
                                            $price = 0;
                                            $total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                            ?>
                                            <?php if(!empty($reviews[0])): ?>
                                                <?php
                                                $count =  App\ReviewRating::where('course_id',$course->id)->count();

                                                foreach($reviews as $review){
                                                    $price = $review->price*5;
                                                    $total = $total + $price;
                                                }

                                                $count = ($count*1) * 5;
                                                $rat = $total/$count;
                                                $ratings_var = ($rat*100)/5;
                                                ?>

                                                <div class="pull-left">
                                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>

                                            <?php else: ?>
                                                <div class="pull-left">
                                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </span>
                                        <span class="histo-percent">
                                            <a href="#" title="rate"><?php echo e(round($ratings_var)); ?>%</a>
                                        </span>
                                        <span class="bar-block">
                                            <span id="bar-two" style="width: <?php echo e($ratings_var); ?>%" class="bar bar-clr bar-radius">&nbsp;</span>
                                        </span>
                                    </div>
                                    <div class="one histo-rate">
                                        <span class="histo-star">
                                            <?php
                                            $value = 0;
                                            $total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                            ?>
                                            <?php if(!empty($reviews[0])): ?>
                                                <?php
                                                $count =  App\ReviewRating::where('course_id',$course->id)->count();

                                                foreach($reviews as $review){
                                                    $value = $review->value*5;
                                                    $total = $total + $value;
                                                }

                                                $count = ($count*1) * 5;
                                                $rat = $total/$count;
                                                $ratings_var = ($rat*100)/5;
                                                ?>

                                                <div class="pull-left">
                                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>

                                            <?php else: ?>
                                                <div class="pull-left">
                                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </span>
                                        <span class="histo-percent">
                                            <a href="#" title="rate"><?php echo e(round($ratings_var)); ?>%</a>
                                        </span>
                                        <span class="bar-block">
                                            <span id="bar-one" style="width: <?php echo e($ratings_var); ?>%" class="bar bar-clr bar-radius">&nbsp;</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php endif; ?>

                    <div class="learning-review btm-40">

                        <?php if(auth()->guard()->check()): ?>
                        


                        <?php
                            $user_enrolled = App\Order::where('course_id', $course->id)->where('user_id', Auth::user()->id) ->first();

                            $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                            $course_id = array();
                    

                            // foreach($bundle as $b)
                            // {
                            //  $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                            //   array_push($course_id, $bundle->course_id);
                            // }

                            $course_id = array_values(array_filter($course_id));

                            $course_id = array_flatten($course_id);

                        ?>


                        <?php if( $user_enrolled != NULL || Auth::user()->role == 'admin' || isset($course_id) || in_array($course->id, $course_id)): ?>
                            
                            <div class="review-block">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h3 class="top-20"><?php echo e(__('Reviews')); ?></h3>
                                    </div>
                                    <div class="col-lg-10 col-12">
                                        <form id="demo-form2" method="post" action="<?php echo e(route('course.rating',$course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="review-table">
                                                <table class="table mb-40">
                                                    <tbody>
                                                        <tr>
                                                        <th scope="row"><?php echo e(__('Learn')); ?></th>
                                                        <td>
                                                            <div class="star-rating">
                                                                <input id="option1" type="radio" name="learn" value="5" />
                                                                <label for="option1" title="5 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option2" type="radio" name="learn" value="4" />
                                                                <label for="option2" title="4 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option3" type="radio" name="learn" value="3" />
                                                                <label for="option3" title="3 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option4" type="radio" name="learn" value="2" />
                                                                <label for="option4" title="2 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option5" type="radio" name="learn" value="1" />
                                                                <label for="option5" title="1 star">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <th scope="row"><?php echo e(__('Price')); ?></th>
                                                        <td>
                                                            <div class="star-rating">
                                                                <input id="option6" type="radio" name="price" value="5" />
                                                                <label for="option6" title="5 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option7" type="radio" name="price" value="4" />
                                                                <label for="option7" title="4 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option8" type="radio" name="price" value="3" />
                                                                <label for="option8" title="3 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option9" type="radio" name="price" value="2" />
                                                                <label for="option9" title="2 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option10" type="radio" name="price" value="1" />
                                                                <label for="option10" title="1 star">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <th scope="row"><?php echo e(__('Value')); ?></th>
                                                        <td>
                                                            <div class="star-rating">
                                                                <input id="option11" type="radio" name="value" value="5" />
                                                                <label for="option11" title="5 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option12" type="radio" name="value" value="4" />
                                                                <label for="option12" title="4 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option13" type="radio" name="value" value="3" />
                                                                <label for="option13" title="3 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option14" type="radio" name="value" value="2" />
                                                                <label for="option14" title="2 stars">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                                <input id="option15" type="radio" name="value" value="1" />
                                                                <label for="option15" title="1 star">
                                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="review-text mb-30">
                                                    <label for="review"><?php echo e(__('Write review')); ?>:</label>
                                                    <textarea name="review" rows="4" class="form-control" placeholder=""></textarea>
                                                </div>
                                                <div class="review-rating-btn text-right">
                                                    <button type="submit" class="btn btn-success" title="Review"><?php echo e(__('Submit')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>

                        <?php endif; ?>
                        <?php endif; ?>


                        <?php
                            $alreadyrated = App\ReviewRating::where('course_id', $course->id)->first();
                        ?>
                        <?php if($alreadyrated == !NULL): ?>

                        <div class="review-dtl">
                            
                            <?php if(isset($alreadyrated)): ?>
                            <?php $__currentLoopData = $course->review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php

                                $user_count = count([$rating]);
                                $user_sub_total = 0;
                                $user_learn_t = $rating->learn * 5;
                                $user_price_t = $rating->price * 5;
                                $user_value_t = $rating->value * 5;
                                $user_sub_total = $user_sub_total + $user_learn_t + $user_price_t + $user_value_t;

                                $user_count = ($user_count * 3) * 5;
                                $rat1 = $user_sub_total / $user_count;
                                $ratings_var7 = ($rat1 * 100) / 5;

                            ?>

                            <?php if($rating->review == !null && $rating->status == 1 && $rating->approved == 1): ?>
                            <div class="row btm-20">
                                <div class="col-lg-4">
                                    <div class="review-img text-white">
                                        <?php echo e(str_limit($rating->user->fname, $limit = 1, $end = '')); ?><?php echo e(str_limit($rating->user->lname, $limit = 1, $end = '')); ?>

                                    </div>
                                    <div class="review-img-block">
                                        <div class="review-month"><?php echo e(date('d-m-Y', strtotime($rating['created_at']))); ?></div>
                                        <div class="review-name"><?php echo e($rating->user['fname']); ?> <?php echo e($rating->user['lname']); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="review-rating">
                                        <div class="pull-left-review">
                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var7; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p><?php echo e($rating['review']); ?><p>
                                        </div>

                                        <?php if(auth()->guard()->check()): ?>

                                        <div class="review"><?php echo e(__('helpful')); ?>?
                                    <?php
                                    $help = App\ReviewHelpful::where('user_id', Auth::User()->id)->where('review_id', $rating->id)->first();
                                    ?>

                                    
                                
                                    <?php if(isset($help['review_like']) == '1'): ?>
                                        <div class="helpful">
                                        
                                            <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>


                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                            <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />

                                            <input type="hidden" name="helpful"  value="yes" />
                                            <input type="hidden" name="review_like"  value="0" />
                                            
                                            <button type="submit" class="btn btn-link lft-7 rgt-10 "><i class="fa fa-check"></i> <?php echo e(__('Yes')); ?></button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                        <div class="helpful">
                                            <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>


                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                            <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />

                                            <input type="hidden" name="helpful"  value="yes" />
                                            <input type="hidden" name="review_like"  value="1" />
                                            
                                            <button type="submit" class="btn btn-link lft-7 rgt-10 "><?php echo e(__('Yes')); ?></button>
                                            </form>
                                        </div>
                                    <?php endif; ?>



                                    <?php if(isset($help['review_dislike']) == '1'): ?>
                                        <div class="helpful">
                                        

                                            <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>


                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                            <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />

                                            <input type="hidden" name="helpful"  value="yes" />
                                            <input type="hidden" name="review_dislike"  value="0" />
                                            
                                            <button type="submit" class="btn btn-link lft-7 rgt-10 "><i class="fa fa-check"></i><?php echo e(__('No')); ?></button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                        <div class="helpful">
                                            <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>


                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                            <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />

                                            <input type="hidden" name="helpful"  value="yes" />
                                            <input type="hidden" name="review_dislike"  value="1" />
                                            
                                            <button type="submit" class="btn btn-link lft-7 rgt-10 "><?php echo e(__('No')); ?></button>
                                            </form>
                                        </div>
                                    <?php endif; ?>

                                
                                            
                                            <a href="#" data-toggle="modal" data-target="#myModalreport"  title="report"><?php echo e(__('Report')); ?></a>
                                            <div class="modal fade" id="myModalreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Report')); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="box box-primary">
                                                    <div class="panel panel-sum">
                                                        <div class="modal-body">
                                                            <?php
                                                                $courses = App\Course::first();
                                                            ?>
                                                            <form id="demo-form2" method="post" action="<?php echo e(route('report.review', $course->id)); ?>"              data-parsley-validate class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />

                                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="title"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                                                                        <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="email"><?php echo e(__('Email')); ?>:<sup class="redstar">*</sup></label>
                                                                        <input type="email" class="form-control" name="email" id="title" placeholder="Please Enter Email" value="<?php echo e(Auth::User()->email); ?>" required>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="detail"><?php echo e(__('Detail')); ?>:<sup class="redstar">*</sup></label>
                                                                        <textarea name="detail" rows="4"  class="form-control" placeholder=""></textarea>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <br>
                                                                <div class="box-footer">
                                                                <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('Submit')); ?></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php endif; ?>


                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
                <div class="col-lg-3 col-md-4">
                    <aside class="sidebar-widget info-column">
                        <div class="inner-column3">
                                <h3>Course Features</h3>
                                <ul class="project-info clearfix">
                                    <li>
                                        <div class="priceing">                                    
                                        
                                        
                                        <?php if($course->discount_price == !NULL): ?>
                                           
                                        <strong><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($course->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></strong>
                                            <sub><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></sub>

                                        <?php else: ?>
                                            <?php if($course->price == !NULL): ?>
                                            <strong><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></strong>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                       
                                        </div>
                                    </li>
                                    <li>
                                         <?php
                            $insti = App\Institute::where('id',$course->institude_id)->first();
                        ?>
                    <?php if(isset($insti)): ?>
                                    <span class="icon fal fa-home-lg-alt"></span> <strong>Instructor:</strong> <span><?php echo e($insti->title); ?></span>
                                    <?php endif; ?>
                                    </li>
                                    <?php
                                    // FSMS
                                    function convertToHoursMins($time, $format = '%02d:%02d') {
                                        if ($time < 1) {
                                            return;
                                        }
                                        $hours =floor($time / 60);
                                        $minutes = ($time % 60);
                                        return sprintf($format, $hours, $minutes);
                                    }
                                    $classtwo =  App\CourseClass::where('course_id', $course->id)->sum("duration");

                                    // echo $duration_round2 = round($classtwo,2);

                                    $chapterCount = $coursechapters->count();
                                    $classesCount = count(App\CourseClass::where('course_id', $course->id)->get());
                                    $courseDuration = convertToHoursMins($classtwo, '%02dh %02dm total length');
                                    // FSMS
                                ?>
                                    <li>
                                    <span class="icon fal fa-book"></span> <strong>Lectures:</strong> <span><?php echo e($classesCount); ?></span>
                                    </li>

                                    <li>
                                        <span class="icon fal fa-clock"></span> <strong>Duration: </strong> <span><?php echo e($courseDuration); ?></span>
                                    </li>
                                    <li>
                                        <span class="icon fal fa-user"></span> <strong>Enrolled: </strong> <span> <?php
                                            $data = App\Order::where('course_id', $course->id)->get();
                                            if(count($data)>0){
            
                                                echo count($data);
                                            }
                                            else{
            
                                                echo "0";
                                            }
                                        ?></span>
                                    </li>
                                    <li>
                                        <span class="icon fal fa-globe"></span> <strong>Language: </strong> <span><?php echo e($course->language['name']); ?></span>
                                    </li>
                                    <li class="course-detail-button">
                                     
                                        <?php if($course->type == 1): ?>
                                            <?php if(Auth::check()): ?>

                                                <?php if(Auth::User()->role == "admin"): ?>
                                                    <div class="about-home-btn btm-20">
                                                        <a href="<?php echo e(route('course.content',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="btn btn-secondary" title="course"><?php echo e(__('Go To Course')); ?></a>
                                                    </div>
                                                    <?php else: ?>
                                                    <?php if(isset($course->duration)): ?>
                                                        <?php if($course->duration_type == "m"): ?>
                                                        <div class="course-duration btm-10"><?php echo e(__('Enroll Duration')); ?>: <?php echo e($course->duration); ?> Months</div>
                                                        <?php else: ?>
                                                        <div class="course-duration btm-10"><?php echo e(__('Enroll Duration')); ?>: <?php echo e($course->duration); ?> Days</div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>


                                                    <?php if(!empty($order) && $order->status == 1): ?>

                                                        <div class="about-home-btn btm-20">
                                                            <a href="<?php echo e(route('course.content',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="btn btn-secondary" title="course"><?php echo e(__('Go To Course')); ?></a>
                                                        </div>

                                                        <?php elseif(isset($course_id) && in_array($course->id, $course_id)): ?>
                                                        <div class="about-home-btn btm-20">
                                                            <a href="<?php echo e(route('course.content',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="btn btn-secondary" title="course"><?php echo e(__('Go To Course')); ?></a>
                                                        </div>





                                                        <?php elseif(!empty($instruct_course->id) && $instruct_course->id == $course->id): ?>

                                                        <div class="about-home-btn btm-20">
                                                            <a href="<?php echo e(route('course.content',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="btn btn-secondary" title="course"><?php echo e(__('Go To Course')); ?></a>
                                                        </div>


                                                        <?php else: ?>

                                                        <?php if(!empty($cart)): ?>
                                                            <div class="about-home-btn btm-20">
                                                                <form id="demo-form2" method="post" action="<?php echo e(route('remove.item.cart',$cart->id)); ?>">
                                                                    <?php echo e(csrf_field()); ?>


                                                                    <div class="box-footer">
                                                                    <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;<?php echo e(__('Remove From Cart')); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <?php else: ?>
                                                         <!--    <div class="about-home-btn">
                                                                <form id="demo-form2" method="post" action="<?php echo e(route('addtocart',['course_id' => $course->id, 'price' => $course->price, 'discount_price' => $course->discount_price ])); ?>"
                                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                                        <?php echo e(csrf_field()); ?>


                                                                    <input type="hidden" name="category_id"  value="<?php echo e($course->category->id); ?>" />

                                                                    <div class="box-footer">
                                                                    <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div> -->

                                                            <div class="about-home-btn mt-10">
                                                                <form id="demo-form2" method="post" action="<?php echo e(route('buynow')); ?>"
                                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                                        <?php echo e(csrf_field()); ?>


                                                                    <input type="hidden" name="category_id"  value="<?php echo e($course->category->id); ?>" />
                                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::user()->id); ?>" />

                                                                    <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                                                    <div class="box-footer">
                                                                    <button type="submit" class="btn btn-primary">&nbsp;<?php echo e(__('BUY NOW')); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        <?php endif; ?>

                                                    <?php endif; ?>


                                                <?php endif; ?>
                                                <?php else: ?>
                                                <div class="about-home-btn btm-20">
                                                    <?php if($gsetting->guest_enable == 1): ?>

                                                    <form id="demo-form2" method="post" action="<?php echo e(route('guest.addtocart', $course->id)); ?>"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>



                                                        <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></button>
                                                        </div>
                                                    </form>
                                                    <?php else: ?>

                                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></a>

                                                    <?php endif; ?>

                                                </div>
                                            <?php endif; ?>

                                            <?php else: ?>
                                            <div class="about-home-rate">
                                                <ul>
                                                    <li><?php echo e(__('Free')); ?></li>
                                                </ul>
                                            </div>
                                            <?php if(Auth::check()): ?>
                                                <?php if(Auth::User()->role == "admin"): ?>
                                                    <div class="about-home-btn btm-20">
                                                        <a href="<?php echo e(route('course.content',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="btn btn-secondary" title="course"><?php echo e(__('Go To Course')); ?></a>
                                                    </div>
                                                    <?php else: ?>
                                                    <?php
                                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                                    ?>
                                                    <?php if($enroll == NULL): ?>
                                                        <div class="about-home-btn btm-20">
                                                            <a href="<?php echo e(url('enroll/show',$course->id)); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('Enroll Now')); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="about-home-btn btm-20">
                                                            <a href="<?php echo e(route('course.content',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="btn btn-secondary" title="Cart"><?php echo e(__('Go To Course')); ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <div class="about-home-btn btm-20">
                                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('Enroll Now')); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                    <li class="course-detail-button">
                                        <div class="row">
                                            <div class="col">
                                                <div class="about-home-share text-center">
                                                    <a href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($course['title']); ?>" target="__blank"><i data-feather="calendar"></i></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="about-home-share text-center">
                                                    <a href="#" data-toggle="modal" data-target="#myModalshare" title="share" data-dismiss="modal"><i data-feather="share"></i></a>
                                                </div>
                                            </div>
                                            
                                            <div class="col">
                                                <div class="about-home-share text-center">
                                                    <?php if(Auth::check()): ?>

                                                        <?php if($wish == NULL): ?>
                                                            <div class="about-icon-one">
                                                                <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $course->id)); ?>" data-parsley-validate
                                                                    class="form-horizontal form-label-left">
                                                                    <?php echo csrf_field(); ?>

                                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                                    <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                                                    <button class="wishlisht-btn" title="<?php echo e(__('Add to wishlist')); ?>" type="submit"><i data-feather="heart"></i></button>
                                                                </form>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="about-icon-two">
                                                                <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $course->id)); ?>" data-parsley-validate
                                                                    class="form-horizontal form-label-left">
                                                                    <?php echo csrf_field(); ?>

                                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                                    <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                                                    <button class="wishlisht-btn" title="<?php echo e(__('Remove from Wishlist')); ?>" type="submit"><i data-feather="heart"></i></button>
                                                                </form>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <div class="about-icon-one"><a href="<?php echo e(route('login')); ?>" title="heart"><i data-feather="heart"></i></a></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="about-home-share text-center">
                                                    <?php if(Auth::check()): ?>
                                                        <div class="report-abuse text-center">
                                                            <a href="#" data-toggle="modal" data-target="#myModalCourse" title="Report"><i data-feather="flag"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="report-abuse text-center">
                                                            <a href="<?php echo e(route('login')); ?>" title="Report"><i data-feather="flag"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                </aside>
                
                
                    
                </div>

                
            </div>
        </div>
    </div>
</section>
<!--End Project Detail -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/course_detail.blade.php ENDPATH**/ ?>