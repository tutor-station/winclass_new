
<?php $__env->startSection('title','Edit Bundle'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit a Bundle';
$data['title1'] = 'Course';
$data['title1'] = 'Bundle';
$data['title2'] = 'Edit a Bundle';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Edit Bundle')); ?></h5>
                    <div class="widgetbar">
                        <a href="<?php echo e(url('bundle')); ?>" class="float-right btn btn-primary mr-2" title="<?php echo e(__('Back')); ?>"><i
                                class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('bundle.update', $cor->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputTit1e"><?php echo e(__('Bundle Name')); ?>:<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="title" id="exampleInputTitle"
                                        value="<?php echo e($cor->title); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Select Course')); ?>: <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="course_id[]" multiple="multiple" size="5" row="5"
                                        placeholder="<?php echo e(__('SelectCourse')); ?>">
                
                
                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($cat->status == 1): ?>
                                        <option value="<?php echo e($cat->id); ?>"
                                            <?php echo e(in_array($cat->id, $cor['course_id'] ?: []) ? 'selected' : ''); ?>>
                                            <?php echo e($cat->title); ?>

                                        </option>
                                        <?php endif; ?>
                
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image"
                                                aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                        </div>
                                    </div>
                                    <?php if($cor['preview_image'] !== null && $cor['preview_image'] !== ''): ?>
                                    <img src="<?php echo e(url('/images/bundle/' . $cor->preview_image)); ?>" height="70px;"
                                        width="70px;" />
                                    <?php else: ?>
                                    <img src="<?php echo e(Avatar::create($cor->title)->toBase64()); ?>" alt="course"
                                        class="img-fluid">
                                    <?php endif; ?>
                                    <br>
                                    <small class="text-info"><i class="fa fa-question-circle"></i>
                                        <?php echo e(__('Recommended Size')); ?> (1375 x 409px)</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputDetails"><?php echo e(__('Short Detail')); ?>:<sup
                                            class="text-danger">*</sup></label>
                                    <textarea id="short_detail" name="short_detail" rows="4" class="form-control"
                                        required><?php echo e($cor->short_detail); ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="cbToggleSubscription"><?php echo e(__('Subscription')); ?>:</label>
                                            <input id="subscription1" type="checkbox"  name="is_subscription_enabled" class="custom_toggle"
                                                <?php echo e($cor->is_subscription_enabled ? 'checked' : ''); ?> />
                                        </div>
                                        <div id="subscription" style="<?php echo e($cor['is_subscription_enabled'] ? '' : 'display:none'); ?>">
                                            <div class="form-group">
                                                <?php
                                                $selectedPeriod =$cor->billing_interval;
                                                ?>
                                                <label><?php echo e(__('Billing Period')); ?></label>
                                                <select class="form-control" name="billing_interval">
                                                    <option value="day" <?php echo e($selectedPeriod == 'day' ? 'selected' : ''); ?>>
                                                        <?php echo e(__('Daily')); ?></option>
                                                    <option value="week" <?php echo e($selectedPeriod == 'week' ? 'selected' : ''); ?>>
                                                        <?php echo e(__('Weekly')); ?></option>
                                                    <option value="month" <?php echo e($selectedPeriod == 'month' ? 'selected' : ''); ?>>
                                                        <?php echo e(__('Monthly')); ?></option>
                                                    <option value="year" <?php echo e($selectedPeriod == 'year' ? 'selected' : ''); ?>>
                                                        <?php echo e(__('Yearly')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <small class="text-info"><i class="fa fa-question-circle mr-2"></i><?php echo e(__('Subscription
                                            bundle works with only stripe payment gateway.')); ?> .</small><br>
                                        <small class="text-info"><?php echo e(__('Enable it only when you have setup stripe')); ?> .</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputDetails"><?php echo e(__('Paid')); ?>:</label>
                                            <input id="cb111" type="checkbox" class="custom_toggle" name="type"<?php echo e($cor->type == '1' ? 'checked' : ''); ?> />
                                            <br>
                                        </div>
                                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['d-none' => $cor->type =='0']) ?>" id="doabox">
                                            <div>
                                                <label for="exampleInputSlug"><?php echo e(__('Price')); ?>: <sup
                                                        class="text-danger">*</sup></label>
                                                <input <?php echo e($cor->type == '1' ? 'required' : ''); ?> type="number" min="1" class="form-control" name="price"
                                                    id="exampleInputPassword1"
                                                    placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Price')); ?>"
                                                    value="<?php echo e($cor->price); ?>">
                                            </div>

                                            <div>
                                                <br>
                                                <label for="exampleInputSlug"><?php echo e(__('Discounted Price')); ?>:</label>
                                                <input type="number" min="1" class="form-control" name="discount_price"
                                                    id="exampleInputPassword1"
                                                    placeholder="<?php echo e(__('Enter Discounted Price')); ?>"
                                                    value="<?php echo e($cor->discount_price); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for=""><?php echo e(__('Expire Duration')); ?>: </label>
                                            <input id="duration1" type="checkbox" class="custom_toggle" name="duration_type" <?php echo e($cor->duration_type == "m" ? 'checked' : ''); ?> />
                                        </div>
                                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['d-none' =>$cor->duration_type == "d"]) ?>" id="duration">
                                            <label for="exampleInputSlug"><?php echo e(__('Bundle Expire Duration')); ?></label>
                                            <input min="1" class="form-control" name="duration" type="number" id="duration2" value="<?php echo e($cor->duration); ?>" placeholder="<?php echo e(__('Enter Duration')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mt-3">
                                            <?php if(Auth::User()->role == 'admin'): ?>
                                            <label for="exampleInputTit1e"><?php echo e(__('Featured')); ?>:</label>
                                            <input id="status" type="checkbox" class="custom_toggle" name="featured"
                                                <?php echo e($cor->featured == 1 ? 'checked' : ''); ?> />    
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mt-3">
                                            <?php if(Auth::User()->role == 'admin'): ?>
                                            <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
                                            <input id="status" type="checkbox" class="custom_toggle" name="status"
                                                <?php echo e($cor->status == 1 ? 'checked' : ''); ?> />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputDetails"><?php echo e(__('Detail')); ?>:<sup
                                            class="text-danger">*</sup></label>
                                    <textarea id="detail" name="detail" rows="3" class="form-control"
                                        required><?php echo $cor->detail; ?></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
                                        <?php echo e(__('Reset')); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                        <?php echo e(__('Update')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
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


        $(function () {
            $('.js-example-basic-single').select2();
        });

        $(function () {
            $('#cb1').change(function () {
                $('#f').val(+$(this).prop('checked'))
            })
        })

        $(function () {
            $('#cb3').change(function () {
                $('#test').val(+$(this).prop('checked'))
            })
        })

        $(function () {

            $('#murl').change(function () {
                if ($('#murl').val() == 'yes') {
                    $('#doab').show();
                } else {
                    $('#doab').hide();
                }
            });

        });

        $(function () {

            $('#murll').change(function () {
                if ($('#murll').val() == 'yes') {
                    $('#doabb').show();
                } else {
                    $('#doab').hide();
                }
            });

        });

        $('#preview').on('change', function () {

            if ($('#preview').is(':checked')) {
                $('#document1').show('fast');
                $('#document2').hide('fast');

            } else {
                $('#document2').show('fast');
                $('#document1').hide('fast');
            }

        });

    })(jQuery);
</script>



<script>
    (function($) {
      "use strict";
      $(function(){
          $('#subscription1').change(function(){
            if($('#subscription1').is(':checked')){
              $('#subscription').show('fast');
            }else{
              $('#subscription').hide('fast');
            }
          });
         
            
      });
    })(jQuery);
    </script>
  <script>
    $('#cb111').on('change',function(){
  if($('#cb111').is(':checked')){
    $('#doabox').addClass('d-block').removeClass('d-none');
    $('#priceMain').prop('required','required');
  }else{
    $('#doabox').addClass('d-none').removeClass('d-block');
    $('#priceMain').removeAttr('required');
  }
  });
  


    $('#duration1').on('change',function(){
  if($('#duration1').is(':checked')){
    $('#duration').addClass('d-block').removeClass('d-none');
    $('#duration2').prop('required','required');
  }else{
    $('#duration').addClass('d-none').removeClass('d-block');
    $('#duration2').removeAttr('required');
  }
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/bundle/edit.blade.php ENDPATH**/ ?>