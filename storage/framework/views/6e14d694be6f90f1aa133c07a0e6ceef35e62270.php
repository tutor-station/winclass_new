<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2019.
**********************************************************************************************************  -->
<!-- 
Template Name: eClass
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<html lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<!-- <![endif]-->
<!-- head -->

<head>
  <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css" /> <!-- custom css -->

  <style>
    * {
      font-family: DejaVu Sans, sans-serif;
    }

    .invoiceheading {
      font-size: 30px;
      margin-bottom: 40px;
    }

    .invoice-col {
      text-align: -webkit-left !important;
    }

    .table {
      width: 100% !important;
      max-width: 100% !important;
      margin-bottom: 1rem;
      background-color: transparent;
    }

    .view-order {
      margin-bottom: 20px;
      color: #29303B !important;
    }


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
  <!-- end theme styles -->
</head>
<!-- end head -->
<!-- body start-->

<body>
  <!-- terms end-->
  <!-- about-home start -->
  <section id="wishlist-home" class="invoice-home-main-block">
    <div class="container-xl">
      <div class="invoiceheading"><?php echo e(__('Invoice')); ?></div>
    </div>
  </section>
  <!-- about-home end -->
  <section id="purchase-block" class="Invoice-main-block">
    <div class="container-xl">
      <div class="panel-body">

        <div class="border-one">

          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="page-header">
                <?php
                $setting = App\setting::first();
                ?>

                <div class="row">

                  <div class="col-md-6">
                    <div class="invoice-logo">
                      <?php if($invoice['logo_enable'] == '1'): ?>
                      <?php if($setting['logo_type'] == 'L'): ?>
                    <img src="<?php echo e(asset('images/logo/'.$setting['logo'])); ?>" class="img-fluid" width="150px" alt="logo">
                      <?php else: ?>
                      <a href="<?php echo e(url('/')); ?>"><b>
                          <div class="logotext"><?php echo e($setting['project_title']); ?></div>
                        </b></a>
                      <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="invoice-sign">

                      <?php if($invoice['logo_enable'] == '1'): ?>
                      <?php if($invoice->signature != NULL): ?>
                      <img src="<?php echo e(asset('images/signature/'.$invoice['signature'])); ?>" class="img-fluid-invoice"
                        alt="logo" width="70px" height="70px" style="margin-top:-50px;">
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
                <small class="purchase-date"><?php echo e(__('Purchased on')); ?>:
                  <?php echo e(date($test, strtotime($orders['created_at']))); ?></small>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="view-order">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="col-sm-4 invoice-col">
                    From:
                    <?php if($orders->course_id != NULL): ?>

                    <strong><?php echo e($orders->courses->user['fname']); ?></strong><br>
                    <?php echo e(__('address')); ?>: <?php echo e($orders->courses->user['address']); ?><br>
                    <?php if($orders->courses->user->state_id == !NULL): ?>
                    <?php echo e($orders->courses->user->state['name']); ?>,
                    <?php endif; ?>
                    <?php if($orders->courses->user->country_id == !NULL): ?>
                    <?php echo e($orders->courses->user->country['name']); ?>

                    <?php endif; ?>
                    <br>

                    <?php echo e(__('Phone')); ?>: <?php echo e($orders->courses->user['mobile']); ?><br>
                    <?php echo e(__('Email')); ?>: <?php echo e($orders->courses->user['email']); ?>


                    <?php else: ?>

                    <strong><?php echo e($orders->bundle->user['fname']); ?></strong><br>


                    <?php echo e(__('address')); ?>: <?php echo e($orders->bundle->user['address']); ?><br>
                    <?php if($orders->bundle->user->state_id == !NULL): ?>
                    <?php echo e($orders->bundle->user->state['name']); ?>,
                    <?php endif; ?>
                    <?php if($orders->bundle->user->state_id == !NULL): ?>
                    <?php echo e($orders->bundle->user->country['name']); ?>

                    <?php endif; ?>
                    <br>

                    <?php echo e(__('Phone')); ?>: <?php echo e($orders->bundle->user['mobile']); ?><br>
                    <?php echo e(__('Email')); ?>: <?php echo e($orders->bundle->user['email']); ?>


                    <?php endif; ?>
                  </th>
                  <!-- /.col -->
                  <th class="col-sm-4 invoice-col">
                    To:

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


                  </th>
                  <!-- /.col -->
                  <th class="col-sm-4 invoice-col">
                    <b><?php echo e(__('OrderID')); ?>:</b> <?php echo e($orders['order_id']); ?><br>
                    <b><?php echo e(__('TransactionID')); ?>:</b> <?php echo e($orders['transaction_id']); ?><br>
                    <b><?php echo e(__('Payment Mode')); ?>:</b> <?php echo e($orders['payment_method']); ?><br>
                    <b><?php echo e(__('Currency')); ?>:</b> <?php echo e($orders['currency']); ?></br>
                    <b><?php echo e(__('Payment Status')); ?>:</b>
                    <?php if($orders->status ==1): ?>
                    <?php echo e(__('Recieved')); ?>

                    <?php else: ?>
                    <?php echo e(__('Pending')); ?>

                    <?php endif; ?>
                  </th>
                </tr>
              </thead>
            </table>

          </div>
          <!-- /.row -->
          <div class="order-table table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="invoice-col"><?php echo e(__('Courses')); ?></th>
                  <th class="invoice-col"><?php echo e(__('Instructor')); ?></th>
                  <th class="invoice-col"><?php echo e(__('Currency')); ?></th>
                  <?php if($orders->coupon_discount != 0): ?>
                  <th class="text-center invoice-col">Coupon Discount</th>
                  <?php endif; ?>
                  <th class="txt-rgt invoice-col"><?php echo e(__('Total')); ?></th>
                </tr>
              </thead>
              <tbody>
                <tr class="view-order">
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
                  <td class="text-center">
                    (-)&nbsp; <?php if($contains): ?> <i class="<?php echo e($orders['currency_icon']); ?>"></i>
                    <?php else: ?> <?php echo e($orders['currency_icon']); ?> <?php endif; ?> <?php echo e($orders['coupon_discount']); ?>

                  </td>
                  <?php endif; ?>

                  <td class="txt-rgt">
                    <?php if($orders->coupon_discount == !NULL): ?>
                    <?php if($contains): ?> <i class="fa <?php echo e($orders['currency_icon']); ?>"></i> <?php else: ?>
                    <?php echo e($orders['currency_icon']); ?> <?php endif; ?><?php echo e($orders['total_amount'] - $orders['coupon_discount']); ?>

                    <?php else: ?>
                    <?php if($contains): ?> <i class="fa <?php echo e($orders['currency_icon']); ?>"></i> <?php else: ?>
                    <?php echo e($orders['currency_icon']); ?> <?php endif; ?><?php echo e($orders['total_amount']); ?>

                    <?php endif; ?>
                  </td>

                </tr>
              </tbody>
            </table>

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
                        <a
                          href="<?php echo e(route('course.content',['id' => $orders->bundle->id, 'slug' => $orders->bundle->slug ])); ?>"><img
                            src="<?php echo e(asset('images/course/'. $coursess->preview_image)); ?>" class="img-fluid"
                            alt="course"></a>
                        <?php else: ?>
                        <a
                          href="<?php echo e(route('course.content',['id' => $orders->bundle->id, 'slug' => $orders->bundle->slug ])); ?>"><img
                            src="<?php echo e(Avatar::create($coursess->title)->toBase64()); ?>" class="img-fluid" alt="<?php echo e(__('course')); ?>"></a>
                        <?php endif; ?>

                      </div>
                      <div class="purchase-history-course-title">
                        <a
                          href="<?php echo e(route('course.content',['id' => $orders->bundle->id, 'slug' => $orders->bundle->slug ])); ?>"><?php echo e($coursess->title); ?></a>
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

      </div>
    </div>
  </section>
  <!-- footer start -->

  <!-- footer end -->
  <!-- jquery -->
  <script src="<?php echo e(url('js/jquery-2.min.js')); ?>"></script> <!-- jquery library js -->
  <script src="<?php echo e(url('js/bootstrap.bundle.js')); ?>"></script> <!-- bootstrap js -->
  <!-- end jquery -->
</body>
<!-- body end -->

</html><?php /**PATH /var/www/html/resources/views/front/purchase_history/download.blade.php ENDPATH**/ ?>