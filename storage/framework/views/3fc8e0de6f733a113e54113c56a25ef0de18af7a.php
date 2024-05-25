
<?php $__env->startSection('title', 'Terms & Condition'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- main wrapper -->
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
                        <h1 class="wishlist-home-heading"><?php echo e(__('Terms & Condition')); ?></h1>
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
              <?php
                $data = App\Terms::first();
              ?>             
              <?php if(isset($data)): ?>
                <div class="info"><?php echo $data->terms; ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/terms_condition.blade.php ENDPATH**/ ?>