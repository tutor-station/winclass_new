
<?php $__env->startSection('title', 'Batch'); ?>
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
                        <h2><?php echo e(__('Batch')); ?></h2>    
                    </div>
                </div>
            </div>
            <div class="breadcrumb-wrap2">
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Batch')); ?></li>
                        </ol>
                    </nav>
                </div>
            
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->
 <section id="batch" class="batch-main-block">
<div class="container">
    <div class="row"> 
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 ">
        <div class="courses-item mb-30 hover-zoomin">
            <div class="thumb fix">
                <a href="<?php echo e(route('batch.frontdetail',$datas->id)); ?>"><img src="<?php echo e(asset('images/batch/'.$datas->preview_image)); ?>" alt="contact-bg-an-01"></a>
            </div>
            <div class="courses-content">                                    
                <div class="view-user-img">
                    <a href="#" title="">
                        <?php if($datas->user['user_img'] !== NULL && $datas->user['user_img'] !== ''): ?>
                        <img src="<?php echo e(asset('images/user_img/'.$datas->user['user_img'])); ?>" class="img-fluid user-img-one" alt="">
                        <?php else: ?>
                        <img src="<?php echo e(Avatar::create($datas->title)->toBase64()); ?>" alt="img">
                        <?php endif; ?>
                    </a>
                 </div>                                
                <h3><a href="<?php echo e(route('batch.frontdetail',$datas->id)); ?>"> <?php echo e($datas->title); ?></a></h3>
                <p><?php echo e(substr(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($datas->detail))), 0, 120)); ?></p>
                <a href="<?php echo e(route('batch.frontdetail',$datas->id)); ?>" class="readmore"><?php echo e(__('View More')); ?><i class="fal fa-long-arrow-right"></i></a>
            </div>
            <div class="icon">
                <img src="<?php echo e(url('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
            </div>
        </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
 </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/batch/view.blade.php ENDPATH**/ ?>