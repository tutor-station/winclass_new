
<?php $__env->startSection('title','Create a new Coupon'); ?>
<?php
$data['heading'] = 'Create Coupon';
$data['title'] = 'Coupons';
$data['title1'] = 'Create Coupon';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
    <div class="row">
      <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
          <div class="card-header">
            <h5 class="card-box"><?php echo e(__('Create a new Coupon')); ?></h5>
            <div>
              <div class="widgetbar">
                <a title="Back" href="<?php echo e(url('coupon')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i
                    class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="<?php echo e(route('coupon.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Coupon Code')); ?>: <span class="text-danger">*</span></label>
                          <input required="" type="text" class="form-control" name="code">
                      </div>
                    </div>

                    <div class="col-md-2">
                     <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Discount Type')); ?>: <span class="text-danger">*</span></label>
                          <select required="" name="distype" id="distype" class="form-control select2">
                              <option value="fix"><?php echo e(__('Fix Amount')); ?></option>
                              <option value="per">% <?php echo e(__('Percentage')); ?></option>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Amount')); ?>: <span class="text-danger">*</span></label>
                          <input required="" type="number"  type="text" class="form-control" name="amount">
      
                      </div>
                    </div>                    
                    
                    
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Linked to')); ?>: <span class="text-danger">*</span></label>
      
                          <select required="" name="link_by" id="link_by"
                              class="form-control select2">
                              <option value="none" selected disabled hidden>
                                  <?php echo e(__('Select an Option')); ?>

                              </option>
                              <option value="course"><?php echo e(__('Link to Course')); ?></option>
                              <option value="cart"><?php echo e(__('Link to Cart')); ?></option>
                              <option value="category"><?php echo e(__('Link to Category')); ?></option>
                              <option value="bundle"><?php echo e(__('Link to Bundle')); ?></option>
                          </select>
      
                      </div>                      
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                              <label for="exampleInputDetails"><?php echo e(__('Coupon Code Display On Front')); ?>:</label>
                              <br>
                                  <input  class="custom_toggle"  type="checkbox" name="show_to_users"  checked />
                                  <br>
                              <label class="tgl-btn" data-tg-off="No" data-tg-on="Yes" for="frees"></label>
                              <small class="txt-info">(<?php echo e(__('If Choose Yes then Coupon Code shows to all users')); ?>)
                              </small>
                          </div>
                      </div>


                    <div class="col-md-4" id="probox" style="display: none;"> 
                      <div  class="form-group" >
                          <label class="text-dark"><?php echo e(__('Select Course')); ?>: <span class="text-danger">*</span> </label>
                          <br>
                          <select style="width: 100%" id="pro_id" name="course_id"
                              class="form-control select2">
                              <option value="none" selected disabled hidden>
                                  <?php echo e(__('Select an Option')); ?>

                              </option>
                              <?php $__currentLoopData = App\Course::where('status', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($product->type == 1): ?>
      
                                      <option value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?>

                                          - <?php echo e($product->discount_price); ?><i
                                              class="<?php echo e($currency->icon); ?>"><?php echo e($currency->currency); ?></i>
                                      </option>
                                  <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                    </div>

                    <div id="bundlebox" class="col-md-4" style="display: none;">
                      <div  class="form-group" >
                          <label class="text-dark"><?php echo e(__('Select Bundle')); ?>: <span class="text-danger">*</span> </label>
                          <br>
                          <select style="width: 100%" id="bundle_id" name="bundle_id"
                              class="form-control select2">
                              <option value="none" selected disabled hidden>
                                  <?php echo e(__('SelectanOption')); ?>

                              </option>
                              <?php $__currentLoopData = App\BundleCourse::where('status', '1')->get()->sortByDesc('updated_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($product->type == 1): ?>
                                      <option value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?>

                                          <?php if(isset($product->billing_interval)): ?>
                                              - <?php echo e($product->discount_price); ?> <i
                                                  class="<?php echo e($currency->icon); ?>"><?php echo e($currency->currency); ?></i> /
                                              <?php echo e($product->billing_interval); ?>

                                          <?php endif; ?>
                                      </option>
                                  <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                    </div>

                    <div id="catbox" class="col-md-4" style="display: none;">

                      <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Select Categories')); ?>: <span class="text-danger">*</span>
                          </label>
                          <br>
                          <select style="width: 100%" id="cat_id" name="category_id"
                              class="form-control select2">
                              <option value="none" selected disabled hidden>
                                  <?php echo e(__('SelectanOption')); ?>

                              </option>
                              <?php $__currentLoopData = App\Categories::where('status', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($category->id); ?>"><?php echo e($category['title']); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-2" id="minAmount">
                      <div  class="form-group">
                          <label class="text-dark"><?php echo e(__('Min Amount')); ?>: </label>
                          <div class="input-group">
                              
                              <input type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
                              <span class="input-group-text" id="basic-addon2"><i class="<?php echo e($currency->icon); ?>"></i></span>
      
                          </div>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Expiry Date')); ?>: </label>
                             
                          <div class="input-group">                                  
                            <input type="text" id="default-date" class="datepicker-here form-control"  name="expirydate" placeholder="dd/mm/yyyy" aria-describedby="basic-addon2"/>
                              <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-2">

                      <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Max Usage Limit')); ?>: <span class="text-danger">*</span></label>
                          <input required="" type="number" min="1" class="form-control" name="maxusage">
                      </div>

                    </div>
                  </div>
                  <div class="row">  
                    
                    <div class="form-group col-md-6 mt-5">
                        <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                        <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                        <?php echo e(__('Create')); ?></button>
                    </div>
                  
                  <div class="clear-both"></div>
                  </div>
                  </div>
                </div>
        </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        (function($) {
            "use strict";

            $('#link_by').on('change', function() {
                var opt = $(this).val();

                if (opt == 'course') {
                    $('#minAmount').hide();
                    $('#probox').show();
                    $('#bundlebox').hide();
                    $('#pro_id').attr('required', 'required');
                } else if (opt === 'bundle') {
                    $('#minAmount').hide();
                    $('#probox').hide();
                    $('#bundlebox').show();
                    $('#bundle_id').attr('required', 'required');
                } else {
                    $('#minAmount').show();
                    $('#probox').hide();
                    $('#bundlebox').hide();
                    $('#pro_id').removeAttr('required');
                }
            });

            $('#link_by').on('change', function() {
                var opt = $(this).val();

                if (opt == 'category') {
                    $('#catbox').show();
                    $('#pro_id').attr('required', 'required');
                } else {
                    $('#catbox').hide();
                    $('#pro_id').removeAttr('required');
                }
            });

            $(function() {
                $("#expirydate").datepicker({
                    dateFormat: 'yy-m-d'
                });
            });

        })(jQuery);

    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/coupan/add.blade.php ENDPATH**/ ?>