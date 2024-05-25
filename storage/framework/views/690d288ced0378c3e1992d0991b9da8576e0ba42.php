
<?php $__env->startSection('title','View Order'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'View Order';
$data['title'] = 'Orders';
$data['title1'] = 'View Order';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">                
  <!-- End row -->
  <div class="row">
      <!-- Start col -->
      <div class="col-md-12 col-lg-12 col-xl-12">
          <div class="card dashboard-card m-b-30">
              <div class="card-body">
                  <div class="invoice">
                      <div class="invoice-head">
                          <div class="row">
                              <div class="col-12 col-md-7 col-lg-7">
                                <?php if($setting->logo_type == 'L'): ?>
                                <div class="logo-invoice">
                                  <img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>" style="height:50px">
                                </div>
                              <?php else: ?>
                                  <a href="<?php echo e(url('/')); ?>"><b><div class="logotext" ><?php echo e($setting->project_title); ?></div></b></a>
                              <?php endif; ?>
                                 
                              </div>
                              <div class="col-12 col-md-5 col-lg-5">
                                  <div class="invoice-name">
                                      <h5 class="text-uppercase mb-3"><?php echo e(__('Invoice')); ?></h5>
                                      <small><?php echo e(__('Date')); ?>:&nbsp;<?php echo e(date('jS F Y', strtotime($show['created_at']))); ?></small>
                                     
                                  </div>
                              </div>
                          </div>
                      </div> 


                    
                      <div class="invoice-billing">
                          <div class="row">
                              <div class="col-sm-6 col-md-4 col-lg-4">
                                  <div class="invoice-address">
                                    <?php echo e(__('From')); ?>:
                                    <?php if($show->course_id != NULL): ?>
                                    
                                      <h6 ><?php echo e($show->courses->user['fname']); ?></h6>
                                      <ul class="list-unstyled">
                                          <li> <?php echo e(__('Address')); ?>: <?php echo e($show->courses->user['address']); ?></li>  
                                          <?php if($show->courses->user['state_id'] == !NULL): ?>
                                            <?php echo e($show->courses->user->state['name']); ?>,
                                            <?php endif; ?>
                                            <?php if($show->courses->user['country_id'] == !NULL): ?>
                                              <?php echo e($show->courses->user->country['name']); ?>

                                            <?php endif; ?>
                                          <li><?php echo e($show->courses->user['mobile']); ?></li>  
                                          <li> <?php echo e($show->courses->user['email']); ?></li>  
                                      </ul>
                                      <?php else: ?>
                                     
                                      <h6><?php echo e($show->bundle->user['fname']); ?></h6>
                                      <ul class="list-unstyled">
                                          <li> <?php echo e(__('Back')); ?>Address: <?php echo e($show->bundle->user['address']); ?></li>  
                                          <?php if($show->bundle->user->state_id == !NULL): ?>
                                            <?php echo e($show->bundle->user->state['name']); ?>,
                                          <?php endif; ?>
                                          <?php if($show->bundle->user->state_id == !NULL): ?>
                                            <?php echo e($show->bundle->user->country['name']); ?>

                                          <?php endif; ?>
                                          <li> <?php echo e($show->bundle->user['mobile']); ?></li>  
                                          <li> <?php echo e($show->bundle->user['email']); ?></li>  
                                      </ul>
                                      <?php endif; ?>
                                  </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-4">

                                  <div class="invoice-address">
                                    <?php echo e(__('To')); ?>:
                                    <?php if(Auth::user()->role == "admin"): ?>
                                    <h6> <?php echo e($show->user['fname']); ?> <?php echo e($show->user['lname']); ?></h6>
                                    <?php else: ?>
                                    <?php if($gsetting->hide_identity == 0): ?>
                                    <h6> <?php echo e($show->user['fname']); ?> <?php echo e($show->user['lname']); ?></h6>
                                    <?php else: ?>
                                    <?php echo e(__('Hidden')); ?>

                                    <?php endif; ?>
                                  <?php endif; ?>
                                   
                                    
                                   
                                      <ul class="list-unstyled">

                                          <li><b><?php echo e(__('Address')); ?>:</b> <?php echo e($show->user['address']); ?><br>
                                          <?php if($show->user['state_id'] == !NULL): ?>
                                           <?php echo e($show->user->state['name']); ?>,
                                          <?php endif; ?>
                                          <?php if($show->user['country_id'] == !NULL): ?>
                                          <?php echo e($show->user->country['name']); ?></li>
                                          <?php endif; ?>
                                          
                                          <?php if(Auth::user()->role == "admin"): ?>
                                          <li><?php echo e($show->user['mobile']); ?>

                                            </li>
                                          <?php else: ?>
                                            <?php if($gsetting->hide_identity == 0): ?>
                                            <li><?php echo e($show->user['mobile']); ?></li>
                                            <?php else: ?>
                                              <?php echo e(__('Hidden')); ?>

                                            <?php endif; ?>
                                          <?php endif; ?>

                                          <?php if(Auth::user()->role == "admin"): ?>
                                          <li><?php echo e($show->user['email']); ?></li>
                                          <?php else: ?>
                                            <?php if($gsetting->hide_identity == 0): ?>
                                            <li><?php echo e($show->user['email']); ?></li>
                                            <?php else: ?>
                                              <?php echo e(__('Hidden')); ?>

                                            <?php endif; ?>
                                          <?php endif; ?>
                                          
                                      </ul>
                                      
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                                
                                <b><?php echo e(__('Order ID')); ?>:</b> <?php echo e($show['order_id']); ?><br>
                                <b><?php echo e(__('Transaction ID')); ?>:</b>&nbsp;<?php echo e($show['transaction_id']); ?><br>
                                <b><?php echo e(__('Payment Method')); ?>:</b>&nbsp;<?php echo e($show['payment_method']); ?><br>
                                <b><?php echo e(__('Currency')); ?>:</b>&nbsp;<?php echo e($show['currency']); ?>

                                <b><?php echo e(__('Payment Status')); ?>:</b> 
                                <?php if($show->payment_status ==1): ?>
                                  <?php echo e(__('Received')); ?>

                                <?php else: ?> 
                                  <?php echo e(__('Pending')); ?>

                                <?php endif; ?>
                                </br>
                                <b><?php echo e(__('Enroll On')); ?>:</b> <?php echo e(date('jS F Y', strtotime($show['created_at']))); ?></br>
                                <b>
                                  <?php if($show->enroll_expire != NULL): ?>
                                    <?php echo e(__('Enroll Expire')); ?>:</b> <?php echo e(date('jS F Y', strtotime($show['enroll_expire']))); ?></br>
                                  <?php endif; ?>
                                  <br>
          
                                  <?php if($show->proof != NULL): ?>
                                     <a href="<?php echo e(asset('images/order/'.$show->proof)); ?>" download="<?php echo e($show->proof); ?>" title="<?php echo e(__('Download Proof')); ?>"><?php echo e(__('Download Proof')); ?> <i class="fa fa-download"></i></a></br>
                                  <?php endif; ?>
                              
                              </div>
                              </div>
                          </div>
                      </div>  
                      <div class="invoice-summary">
                          <div class="table-responsive ">
                              <table class="table table-borderless">
                                  <thead>
                                      <tr>
                                        <th><?php echo e(__('Course Name')); ?></th>
                                        <th><?php echo e(__('Instructor Name')); ?></th>
                                        <th><?php echo e(__('Currency')); ?></th>
                                        <?php if($show->coupon_discount != 0): ?>
                                        <th><?php echo e(__('Coupon Discount')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('Total Amount')); ?></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <td>
                                          <?php if($show->course_id != NULL): ?>
                                            <?php echo e($show->courses['title']); ?>

                                          <?php else: ?>
                                            <?php echo e($show->bundle['title']); ?>

                                          <?php endif; ?>
                                        </td>
                                        <td>
                                          <?php if($show->course_id != NULL): ?>
                                            <?php echo e($show->courses->user['email']); ?>

                                          <?php else: ?>
                                            <?php echo e($show->bundle->user['email']); ?>

                                          <?php endif; ?>
                                        </td>
                                        <td><?php echo e($show['currency']); ?></td>

                                        <?php
                                            $contains = Illuminate\Support\Str::contains($show->currency_icon, 'fa');
                                        ?>
                  
                                        <?php if($show->coupon_discount != 0): ?>
                                        <td>
                                          <?php if($contains): ?>
                                            (-)&nbsp;<i class="<?php echo e($show['currency_icon']); ?>"></i><?php echo e($show['coupon_discount']); ?>

                  
                                          <?php else: ?>
                  
                                            (-)&nbsp;<?php echo e($show['currency_icon']); ?> <?php echo e($show['coupon_discount']); ?>

                                          <?php endif; ?>
                                        </td>
                                        <?php endif; ?>
                  
                                        <td>
                                          <?php if($show->coupon_discount == !NULL): ?>
                                            <?php if($contains): ?>
                                              <i class="fa <?php echo e($show['currency_icon']); ?>"></i><?php echo e($show['total_amount'] - $show['coupon_discount']); ?>

                                            <?php else: ?>
                                              <?php echo e($show['currency_icon']); ?> <?php echo e($show['total_amount'] - $show['coupon_discount']); ?><i class="fa "></i>
                                            <?php endif; ?>
                                          <?php else: ?>
                                            <?php if($contains): ?>
                                              <i class="fa <?php echo e($show['currency_icon']); ?>"></i><?php echo e($show['total_amount']); ?>

                  
                                            <?php else: ?>
                                              <?php echo e($show['currency_icon']); ?> <?php echo e($show['total_amount']); ?>

                                            <?php endif; ?>
                                          <?php endif; ?>
                                        </td>
                                      </tr>
                                      
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <div class="invoice-summary-total">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="order-note">
                                    <?php if($show->bundle_id != NULL): ?>

                                    <?php $__currentLoopData = $bundle_order->course_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                          $coursess = App\Course::where('id', $bundle_course)->first();
                                        ?>
                    
                                        <div class="mt-3">
                                         
                                                  <div class="row">
                                                      <div class="col-md-2">
                                                    
                                                        <?php if($coursess['preview_image'] !== NULL && $coursess['preview_image'] !== ''): ?>
                                                            <img src="<?php echo e(asset('images/course/'. $coursess->preview_image)); ?>" class="img-fluid" alt="course" style="height:70px; width:70px; border-radius:50%">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(Avatar::create($coursess->title)->toBase64()); ?>" class="img-fluid" alt="course">
                                                        <?php endif; ?>
                      
                                                    </div>
                                                    <div  class="col-md-6 mt-4">
                                                      <?php echo e($coursess->title); ?>

                                                    </div>
                                                  </div>
                                                 
                                               
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                                  <?php endif; ?>
                                  </div>
                              </div>
                             
                          </div>
                      </div> 
                      <div class="invoice-footer mt-4">
                          <div class="row align-items-center">
                             
                              <div class="col-md-6">
                                  <div class="invoice-footer-btn">
                                      <a href="javascript:window.print()" class="btn btn-primary-rgba py-1 font-16" title="<?php echo e(__('Print')); ?>"><i class="feather icon-printer mr-2"></i><?php echo e(__('Print')); ?></a>
                                     
                                  </div>
                              </div>
                          </div>
                      </div>                                   
                  </div>
              </div>
          </div>
      </div>
      <!-- End col -->
  </div>
  <!-- End row -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
</script>

<script lang='javascript'>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/order/view.blade.php ENDPATH**/ ?>