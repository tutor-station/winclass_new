
<?php $__env->startSection('title'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- breadcumb start -->
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('Feature Product')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- breadcumb end -->
<?php if(isset($feature)): ?>
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
                        <div class="col-lg-6 mb-4">
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
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="feature-image">
                    <?php if($data['image'] == !NULL): ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/feature.blade.php ENDPATH**/ ?>