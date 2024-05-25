
<?php $__env->startSection('title', 'Flash Deals'); ?>
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
                        <h2><?php echo e(__('Flash Deal ')); ?></h2>    
                        
                    </div>
                </div>
            </div>
			<div class="breadcrumb-wrap2">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Flash Deal')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<?php if($deals!= NULL): ?>
<section class="flash-deal-main-block pt-120 pb-120 p-relative fix">
    <div class="container">
        <div class="row">   
            <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($deal->status == '1'): ?>                  
            <div class="col-lg-4 col-md-6 ">
                <div class="courses-item mb-30 hover-zoomin">
                    <div class="thumb fix">
                        <?php if($deal['background_image'] !== NULL && $deal['background_image'] !== ''): ?>
                        <a href="<?php echo e(route('deal.items',$deal->id)); ?>"><img src="<?php echo e(asset('images/flashdeals/'.$deal->background_image)); ?>" alt="contact-bg-an-01"></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('deal.items',$deal->id)); ?>"><img src="<?php echo e(Avatar::create($deal->title)->toBase64()); ?>" alt="contact-bg-an-01"></a>
                        <?php endif; ?>
                        <div class="courses-icon">
                            <ul>
                                <li><a href="<?php echo e(route('deal.items',$deal->id)); ?>" class="" title="notification" tabindex="0"><i data-feather="eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="courses-content">
                        <h3><a href="<?php echo e(route('deal.items', $deal->id)); ?>"><?php echo e(str_limit($deal->title)); ?></a></h3>
                        <p class="card-text"><b><?php echo e(__('Sale Start Date:')); ?></b><?php echo e(date('jS F Y', strtotime($deal->start_date))); ?></p>
                        <p class="card-text"><b><?php echo e(__('Sale End Date:')); ?></b><?php echo e(date('jS F Y', strtotime($deal->end_date))); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>




































































<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/flashdeal/deals.blade.php ENDPATH**/ ?>