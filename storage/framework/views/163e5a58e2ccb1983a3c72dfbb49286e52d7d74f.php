
<?php $__env->startSection('title', 'Online Courses'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <h2><?php echo e(__('Courses')); ?></h2>

                        
                    </div>
                </div>
            </div>
            <div class="breadcrumb-wrap2">
                
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Courses')); ?></li>
                        </ol>
                    </nav>
                </div>
            
        </div>
    </div>
</section>
<!-- search start -->
<?php if(count($search_data) > 0): ?>
    <section id="search-block" class="search-main-block pt-120 pb-120">
        <div class="container-xl">
            <div class="row">
                
                <div class="col-lg-12">

                    <div class ="prod grid-view">
                     <!-- <div class ="view">
                      <i class= "fa fa-list " data-view ="list-view"></i>
                      <i class="selected fa fa-th" data-view ="grid-view"></i>
                     </div> -->
                        <div id="posts" class="students-bought btm-30">
                            <div class="row">
                                <?php $__currentLoopData = $search_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($course->status == 1): ?>
                                    <div class="col-lg-4 col-md-6 ">
                                        <div class="courses-item mb-30 hover-zoomin">
                                            <div class="thumb fix">
                                                <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>">
                                                    <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                                
                                                    <img src="<?php echo e(asset('images/course/'.$course['preview_image'])); ?>" alt="contact-bg-an-01" class="img-fluid">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="course" class="img-fluid">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="courses-icon">
                                                    <ul>
                                                        <li class="protip-wish-btn"><a
                                                                href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($course['title']); ?>"
                                                                target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                        <?php if(Auth::check()): ?>
                                                        <li class="protip-wish-btn"><a href="" class="compare" data-id="<?php echo e(filter_var($course->id)); ?>"
                                                                title="compare"><i data-feather="bar-chart"></i></a></li>
                                                        <?php
                                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                                        $course->id)->first();
                                                        ?>
                                                        <?php if($wish == NULL): ?>
                                                        <li class="protip-wish-btn">
                                                            <form id="demo-form2" method="post"
                                                                action="<?php echo e(url('show/wishlist', $course->id)); ?>" data-parsley-validate
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />

                                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                                        data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        <?php else: ?>
                                                        <li class="protip-wish-btn-two heart-fill">
                                                            <form id="demo-form2" method="post"
                                                                action="<?php echo e(url('remove/wishlist', $course->id)); ?>" data-parsley-validate
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />

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
                                            <div class="courses-content">        
                                                <div class="view-user-img">
                                                    <a href="" title="">
                                                        <?php if($course->user['user_img'] !== NULL && $course->user['user_img'] !== ''): ?>
                                                        <img src="<?php echo e(asset('images/user_img/'.$course->user['user_img'])); ?>" class="img-fluid user-img-one" alt="">
                                                        <?php else: ?>
                                                        <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="img">
                                                        <?php endif; ?>
                                                    </a>
                                                                            
                                                </div>                            
                                                <div class="cat">
                                                    <div class="rate text-right">
                                                        <ul>
                                                            <?php if($course->type == 1): ?>
                                                                <?php if($course->course != NULL): ?>
                                                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($course['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?> <?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                                    <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($course['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></strike></b></a></li>
                                                                <?php elseif($course->price != NULL): ?>
                                                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($course['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h3><a class="truncate" href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"> <?php echo e($course->title); ?></a></h3>
                                                <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($course->detail))) , $limit = 200, $end = '...')); ?></p>
                                                <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="readmore"><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <section id="search-block" class="search-main-block search-block-no-result">
        <div class="container-xl">
          <h2><?php echo e(__('No search')); ?> "<?php echo e($searchTerm); ?>"</h2>
        </div>
    </section>
<?php endif; ?>
<!-- search end -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-script'); ?>
<script type="text/javascript">
      $('.item i').on('click', function(){
      $(this).toggleClass('fa-plus fa-minus').next().slideToggle()
    })
    /* list or grid item*/
    $(".view i").click(function(){

      $('.prod').removeClass('grid-view list-view').addClass($(this).data('view'));

    })
    $(".view i").click(function(){

      $(this).addClass('selected').siblings().removeClass('selected');

    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/search.blade.php ENDPATH**/ ?>