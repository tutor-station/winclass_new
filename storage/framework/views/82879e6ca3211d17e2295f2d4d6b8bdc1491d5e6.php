
<?php $__env->startSection('title', "$page->title"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('meta_tags'); ?>

<meta name="title" content="<?php echo e($page->title); ?>">
<meta name="description" content="<?php echo e($gsetting['meta_data_desc']); ?> ">
<meta property="og:title" content="<?php echo e($page->title); ?> ">
<meta property="og:url" content="<?php echo e(url()->full()); ?>">
<meta property="og:description" content="<?php echo e($page->details); ?>">
<meta property="og:image" content="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>">
<meta itemprop="image" content="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>">
<meta property="og:type" content="website">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>">
<meta property="twitter:title" content="<?php echo e($page->title); ?> ">
<meta property="twitter:description" content="<?php echo e($page->details); ?>">
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>" />

<link rel="canonical" href="<?php echo e(url()->full()); ?>"/>
<meta name="robots" content="all">
<meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
    
<?php $__env->stopSection(); ?>

  <!-- main wrapper -->
  <?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?> 

<section id="business-home" class="business-home-main-block" >
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course"
            class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="bredcrumb-dtl">
                        <h1 class=""><?php echo e($page->title); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<?php endif; ?>
  
  <section id="policy-block" class="privacy-policy-block">
    <div class="container-xl">
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-12"> 
             
                <div class="info"><?php echo $page->details; ?></div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/page.blade.php ENDPATH**/ ?>