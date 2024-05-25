
<?php $__env->startSection('title', "$data->title"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e($data->title); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- faq detail start -->
<section id="faq-detail-block" class="faq-detail-main-block">
    <div class="container-xl">
    	<div class="blog-link btm-30">
            <a href="<?php echo e(route('help.show')); ?>" title="<?php echo e(__('back to blog')); ?>">
                <i class="fa fa-chevron-left"></i><?php echo e(__('Back to faq')); ?>

            </a>
        </div>
    	<p><?php echo $data->details; ?></p>
    </div>
</section>
<!-- faq detail end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/help/faq_detail.blade.php ENDPATH**/ ?>