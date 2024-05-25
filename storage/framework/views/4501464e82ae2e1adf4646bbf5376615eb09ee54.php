
<?php $__env->startSection('title', 'Invoice'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('custom-head'); ?>
<style type="text/css">
  <?php if($invoice['border_enable']=='1'): ?> .border-one {

    border: 15px {
        {
        $invoice['border_style']
      }
    }

      {
        {
        $invoice['border_color']
      }
    }

    ;
    padding:20px;
    background-color: var(--background-white-bg-color);
    margin-bottom: 40px;

    border-radius: {
        {
        $invoice['border_radius']
      }
    }

    px;

  }

  <?php endif; ?>
</style>

<?php $__env->stopSection(); ?>

<!-- about-home start -->
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
                        <h1 class=""><?php echo e(__('Invoice')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<?php endif; ?>
<!-- about-home end -->
<section id="purchase-block" class="purchase-main-block">
  <div class="container-xl">
    <div class="panel-body">

      <div id="printableArea">

        <div class="border-one">
          <!-- title row -->

          <div class="page-header">


            <div class="row">

              <div class="col-md-6">
                <div class="invoice-logo">
                  <?php if($invoice['logo_enable'] == '1'): ?>
                  <?php if($gsetting['logo_type'] == 'L'): ?>
                  <img src="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>" class="img-fluid" alt="logo">
                  <?php else: ?>
                  <a href="<?php echo e(url('/')); ?>"><b>
                      <div class="logotext"><?php echo e($gsetting['project_title']); ?>

                      </div>
                    </b></a>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
              </div>
              <div class="col-md-6">

                <div class="invoice-sign">

                  <?php if($invoice['logo_enable'] == '1'): ?>
                  <?php if($invoice->signature != NULL): ?>
                  <img src="<?php echo e(asset('images/signature/'.$invoice['signature'])); ?>" class="img-fluid-invoice" alt="<?php echo e(__('logo')); ?>">
                  <?php else: ?>
                  <a href="<?php echo e(url('/')); ?>"><b>
                      <div class="logotext"><?php echo e($invoice['signature']); ?></div>
                    </b></a>
                  <?php endif; ?>
                  <?php endif; ?></div>

              </div>


            </div>




            <br>
            <?php
            $test = $invoice['date_format'];
            ?>
            <small class="purchase-date"><?php echo e(__('Puchased on')); ?>:
              <?php echo e(date($test, strtotime($orders['created_at']))); ?></small>
          </div>

          <!-- info row -->
          <div class="view-order">
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From:
                <?php if($orders->course_id != NULL): ?>
                <address>
                  <strong><?php echo e($orders->courses->user['fname']); ?></strong><br>


                  <?php echo e(__('address')); ?>: <?php echo e($orders->courses->user['address']); ?><br>
                  <?php if($orders->courses->user['state_id'] == !NULL): ?>
                  <?php echo e($orders->courses->user->state['name']); ?>,
                  <?php endif; ?>
                  <?php if($orders->courses->user['country_id'] == !NULL): ?>
                  <?php echo e($orders->courses->user->country['name']); ?>

                  <?php endif; ?>
                  <br>

                  <?php echo e(__('Phone')); ?>: <?php echo e($orders->courses->user['mobile']); ?><br>
                  <?php echo e(__('Email')); ?>: <?php echo e($orders->courses->user['email']); ?>

                </address>
                <?php else: ?>
                <address>
                  <strong><?php echo e($orders->bundle->user['fname']); ?></strong><br>


                  <?php echo e(__('address')); ?>: <?php echo e($orders->bundle->user['address']); ?><br>
                  <?php if($orders->bundle->user->state_id == !NULL): ?>
                  <?php echo e($orders->bundle->user->state['name']); ?>,
                  <?php endif; ?>
                  <?php if($orders->bundle->user->country_id == !NULL): ?>
                  <?php echo e($orders->bundle->user->country['name']); ?>

                  <?php endif; ?>
                  <br>

                  <?php echo e(__('Phone')); ?>: <?php echo e($orders->bundle->user['mobile']); ?><br>
                  <?php echo e(__('Email')); ?>: <?php echo e($orders->bundle->user['email']); ?>

                </address>
                <?php endif; ?>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To:
                <address>
                  <strong><?php echo e($orders->user['fname']); ?></strong><br>
                  <?php echo e(__('address')); ?>: <?php echo e($orders->user['address']); ?><br>
                  <?php if($orders->user->state_id == !NULL): ?>
                  <?php echo e($orders->user->state['name']); ?>,
                  <?php endif; ?>
                  <?php if($orders->user->country_id == !NULL): ?>
                  <?php echo e($orders->user->country['name']); ?>

                  <?php endif; ?>
                  <br>
                  <?php echo e(__('Phone')); ?>: <?php echo e($orders->user['mobile']); ?><br>
                  <?php echo e(__('Email')); ?>: <?php echo e($orders->user['email']); ?>

                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">

                <br>
                <b><?php echo e(__('OrderID')); ?>:</b> <?php echo e($orders['order_id']); ?><br>
                <b><?php echo e(__('TransactionID')); ?>:</b> <?php echo e($orders['transaction_id']); ?><br>
                <b><?php echo e(__('Payment Mode')); ?>:</b> <?php echo e($orders['payment_method']); ?><br>
                <b><?php echo e(__('Currency')); ?>:</b> <?php echo e($orders['currency']); ?></br>
                <b><?php echo e(__('Payment Status')); ?>:</b>
                <?php 
                  if($orders['payment_status']=='P') 
                  {
                      echo "<span class='btn btn-xs btn-warning' style='background-color:orange; padding:5px; border-color:orange'> PENDING</span>";
                  }
                  else if($orders['payment_status']=='S') 
                  {
                      echo "<span class='btn btn-xs btn-success' style='background-color:green; padding:5px; border-color:green'> SUCCESS</span>";
                  }
                  else if($orders['payment_status']=='F') 
                  {
                      echo "<span class='btn btn-xs btn-danger' style='background-color:red; padding:5px; border-color:red'> FAILED</span>";
                  }

                ?> 
                </br>
                <b><?php echo e(__('Enroll on')); ?>:</b> <?php echo e(date('jS F Y', strtotime($orders['created_at']))); ?></br>
                <b>
                  <?php if($orders->enroll_expire != NULL): ?>
                  <?php echo e(__('Enroll End')); ?>:</b>
                <?php echo e(date('jS F Y', strtotime($orders['enroll_expire']))); ?></br>
                <?php endif; ?>
              </div>
              <!-- /.col -->
            </div>
          </div>
          <!-- /.row -->
          <div class="order-table table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><?php echo e(__('Courses')); ?></th>
                  <th><?php echo e(__('Instructor')); ?></th>
                  <th><?php echo e(__('Currency')); ?></th>
                  <?php if($orders->coupon_discount != 0): ?>
                  <th class="text-center">Coupon Discount</th>
                  <?php endif; ?>
                  <th class="txt-rgt"><?php echo e(__('Total')); ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php if($orders->course_id != NULL): ?>
                  <td><?php echo e($orders->courses['title']); ?></td>
                  <td><?php echo e($orders->courses->user['email']); ?></td>
                  <?php else: ?>
                  <td><?php echo e($orders->bundle['title']); ?></td>
                  <td><?php echo e($orders->bundle->user['email']); ?></td>
                  <?php endif; ?>


                  <td><?php echo e($orders['currency']); ?></td>

                  <?php
                  $contains = Illuminate\Support\Str::contains($orders->currency_icon, 'fa');
                  ?>

                  <?php if($orders->coupon_discount != 0): ?>
                  <?php if($contains): ?>
                  <td class="text-center">
                    (-)&nbsp;<i class="<?php echo e($orders['currency_icon']); ?>"></i><?php echo e($orders['coupon_discount']); ?>

                  </td>
                  <?php else: ?>
                  <td class="text-center">
                    (-)&nbsp;<?php echo e($orders['currency_icon']); ?> <?php echo e($orders['coupon_discount']); ?>

                  </td>
                  <?php endif; ?>

                  <?php endif; ?>

                  <td class="txt-rgt">
                    <?php if($orders->coupon_discount == !NULL): ?>
                    <?php if($contains): ?>
                    <i
                      class="fa <?php echo e($orders['currency_icon']); ?>"></i><?php echo e($orders['total_amount'] - $orders['coupon_discount']); ?>

                    <?php else: ?>
                    <?php echo e($orders['currency_icon']); ?> <?php echo e($orders['total_amount'] - $orders['coupon_discount']); ?>

                    <?php endif; ?>
                    <?php else: ?>
                    <?php if($contains): ?>
                    <i class="fa <?php echo e($orders['currency_icon']); ?>"></i><?php echo e($orders['total_amount']); ?>

                    <?php else: ?>
                    <?php echo e($orders['currency_icon']); ?> <?php echo e($orders['total_amount']); ?>

                    <?php endif; ?>
                    <?php endif; ?>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>

          <?php if($orders->bundle_id != NULL): ?>

          <?php $__currentLoopData = $bundle_order->course_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
          $coursess = App\Course::where('id', $bundle_course)->first();
          ?>

          <div class="purchase-table table-responsive">
            <table class="table">

              <tbody>
                <tr>
                  <td>
                    <div class="purchase-history-course-img">

                      <?php if($coursess['preview_image'] !== NULL && $coursess['preview_image'] !== ''): ?>
                      <a href="<?php echo e(route('course.content',['id' => $coursess->id, 'slug' => $coursess->slug ])); ?>"><img
                          src="<?php echo e(asset('images/course/'. $coursess->preview_image)); ?>" class="img-fluid"
                          alt="course"></a>
                      <?php else: ?>
                      <a href="<?php echo e(route('course.content',['id' => $coursess->id, 'slug' => $coursess->slug ])); ?>"><img
                          src="<?php echo e(Avatar::create($coursess->title)->toBase64()); ?>" class="img-fluid" alt="course"></a>
                      <?php endif; ?>

                    </div>
                    <div class="purchase-history-course-title">
                      <a
                        href="<?php echo e(route('course.content',['id' => $coursess->id, 'slug' => $coursess->slug ])); ?>"><?php echo e($coursess->title); ?></a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php endif; ?>

        </div>
      </div>
      <!-- <div class="print-btn">
        <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print" />
      </div>

      <div class="print-btn">
        <a href="<?php echo e(route('invoice.download',$orders->id)); ?>" target="_blank"
          class="btn btn-secondary"><?php echo e(__('Download')); ?></a>
      </div> -->

    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/purchase_history/invoice.blade.php ENDPATH**/ ?>