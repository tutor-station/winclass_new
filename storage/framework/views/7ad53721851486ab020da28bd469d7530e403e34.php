
<?php $__env->startSection('title','Edit Coupon - '.$coupan->coupanno); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit Coupon';
$data['title'] = 'Coupons';
$data['title1'] = 'Edit Coupon';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Edit Coupon')); ?> </h5>
                    <div class="widgetbar">
                        <a href="<?php echo e(url('coupon')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
                    </div>
                </div>
                <div class="card-body ml-2">
                    <form action="<?php echo e(route('coupon.update', $coupan->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                       
                            <div class="row">
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('Coupon Code')); ?>: <span
                                                class="text-danger">*</span></label>
                                        <input value="<?php echo e($coupan->code); ?>" type="text" class="form-control" name="code">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('Discount Type')); ?>: <span
                                                class="text-danger">*</span></label>

                                        <select required="" name="distype" id="distype" class="form-control select2">

                                            <option <?php echo e($coupan->distype == 'fix' ? 'selected' : ''); ?> value="fix">
                                                <?php echo e(__('FixAmount')); ?></option>
                                            <option <?php echo e($coupan->distype == 'per' ? 'selected' : ''); ?> value="per">%
                                                <?php echo e(__('Percentage')); ?></option>

                                        </select>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('Amount')); ?>: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo e($coupan->amount); ?>" class="form-control"
                                            name="amount">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?php echo e(__('Linked To')); ?>: <span
                                                class="text-danger">*</span></label>

                                        <select required="" name="link_by" id="link_by" class="form-control select2">
                                            <option <?php echo e($coupan->link_by == 'course' ? 'selected' : ''); ?> value="course">
                                                <?php echo e(__('Link to Course')); ?></option>
                                            <option <?php echo e($coupan->link_by == 'cart' ? 'selected' : ''); ?> value="cart">
                                                <?php echo e(__('Link to Cart')); ?></option>
                                            <option <?php echo e($coupan->link_by == 'category' ? 'selected' : ''); ?>

                                                value="category">
                                                <?php echo e(__('Link to Category')); ?></option>
                                            <option <?php echo e($coupan->link_by == 'bundle' ? 'selected' : ''); ?> value="bundle">
                                                <?php echo e(__('Link to Bundle')); ?></option>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label
                                            for="exampleInputDetails"><?php echo e(__('Coupon Code Display on Front')); ?>:</label>
                                            <br>
                                            <input type="checkbox" class="custom_toggle" name="show_to_users"
                                            <?php echo e($coupan->show_to_users=="1" ? 'checked' : ''); ?> />
                        <br>
                                      
                                        <label class="tgl-btn" data-tg-off="No" data-tg-on="Yes" for="frees"></label>

                                        <small class="txt-desc">(<?php echo e(__('If Choose Yes then Coupon Code shows to all users')); ?>)
                                        </small>
                                    </div>

                                    <div style="<?php echo e($coupan->link_by == 'course' ? '' : 'display: none'); ?>" id="probox"
                                        class="form-group col-md-4">
                                        <label><?php echo e(__('Select Course')); ?>: <span
                                                class="text-danger">*</span> </label>
                                        <br>
                                        <select id="pro_id" name="course_id"
                                            class="form-control select2">
                                            <option value="none" selected disabled hidden>
                                                <?php echo e(__('Select an Option')); ?>

                                            </option>
                                            <?php $__currentLoopData = App\Course::where('status', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($product->type == 1): ?>
                                            <option <?php echo e($coupan->course_id == $product->id ? 'selected' : ''); ?>

                                                value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?> -
                                                <?php echo e($product->discount_price); ?><i
                                                    class="<?php echo e($currency->icon); ?>"><?php echo e($currency->currency); ?></i>
                                            </option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div style="<?php echo e($coupan->link_by == 'bundle' ? '' : 'display: none'); ?>"
                                        id="bundlebox" class="form-group">
                                        <label><?php echo e(__('Select Bundle')); ?>: <span
                                                class="text-danger">*</span> </label>
                                        <br>
                                        <select id="bundle_id" name="bundle_id"
                                            class="form-control select2">
                                            <option value="none" selected disabled hidden>
                                                <?php echo e(__('Select an Option')); ?>

                                            </option>
                                            <?php $__currentLoopData = App\BundleCourse::where('status', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($product->type == 1): ?>
                                            <option <?php echo e($coupan->bundle_id == $product->id ? 'selected' : ''); ?>

                                                value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?>

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
                              
                               
                                    <div style="<?php echo e($coupan->link_by == 'category' ? '' : 'display: none'); ?>" id="catbox"
                                        class="form-group col-md-4">
                                        <label><?php echo e(__('Select Categories')); ?>: <span
                                                class="text-danger">*</span> </label>
                                        <br>
                                        <select style="width: 100%" id="cat_id" name="category_id"
                                            class="form-control select2">
                                            <option value="none" selected disabled hidden>
                                                <?php echo e(__('SelectanOption')); ?>

                                            </option>
                                            <?php $__currentLoopData = App\Categories::where('status', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($coupan->category_id == $category->id ? 'selected' : ''); ?>

                                                value="<?php echo e($category->id); ?>"><?php echo e($category['title']); ?>


                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('Max Usage Limit')); ?>: <span
                                                class="text-danger">*</span></label>
                                        <input value="<?php echo e($coupan->maxusage); ?>" type="number" min="1"
                                            class="form-control" name="maxusage">
                                    </div>
                                    <div class="col-md-2">
                                    <div style="<?php echo e($coupan->link_by == 'product' ? 'display:none' : ''); ?>"
                                        id="minAmount" class="form-group">
                                        <label><?php echo e(__('Min Amount')); ?>: </label>
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><i class="<?php echo e($currency->icon); ?>"></i></span>
                                            <input value="<?php echo e($coupan->minamount); ?>" type="number" min="0.0" value="0.00"
                                                step="0.1" class="form-control" name="minamount">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('Expiry Date')); ?>: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input value="<?php echo e(date('Y-m-d', strtotime($coupan->expirydate))); ?>"
                                                id="default-date" type="text" class="form-control" name="expirydate">
                                        </div>
                                    </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
                                                <?php echo e(__('Reset')); ?></button>
                                            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                                <?php echo e(__('Update')); ?></button>
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
    (function ($) {
        "use strict";

        $('#link_by').on('change', function () {
            var opt = $(this).val();

            if (opt == 'course') {
                $('#minAmount').hide();
                $('#probox').show();
                $('#catbox').hide();
                $('#bundlebox').hide();
                $('#pro_id').attr('required', 'required');
            } else if (opt == 'bundle') {
                $('#minAmount').hide();
                $('#probox').hide();
                $('#catbox').hide();
                $('#bundlebox').show();
                $('#bundle_id').attr('required', 'required');
            } else {
                $('#bundlebox').hide();
                $('#minAmount').show();
                $('#probox').hide();
                $('#catbox').show();
                $('#pro_id').removeAttr('required');
            }
        });

        $('#link_by').on('change', function () {
            var opt = $(this).val();

            if (opt == 'category') {
                $('#catbox').show();
                $('#probox').hide();
                $('#bundlebox').hide();
                $('#cat_id').attr('required', 'required');
            } else {
                $('#catbox').hide();
                $('#probox').show();
                $('#cat_id').removeAttr('required');
            }
        });

        $(function () {
            $("#expirydate").datepicker({
                dateFormat: 'yy-m-d'
            });
        });

    })(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/coupan/edit.blade.php ENDPATH**/ ?>