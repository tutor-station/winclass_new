
<?php $__env->startSection('title', 'Twilio Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Twilio Settings';
$data['title'] = 'Site Setting';
$data['title1'] = 'Twilio Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <!-- row started -->
    <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Twilio SMS Channel Settings')); ?></h5>
                </div>                
                <!-- card body started -->
                <div class="card-body">
               <!-- form start -->
               <form action="<?php echo e(route('twilio.update')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- card start -->
                                <div class="card">
                                    <!-- card body start -->
                                    <div class="card-body">
                                        <!-- row start -->
                                          <div class="row">                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
                                                  <div class="row">                                                    
                                                    <!-- TWILIO SID -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Twilio SID :')); ?><span class="text-danger">*</span></label>
                                                            <input name="TWILIO_SID" type="text" value="<?php echo e(env('TWILIO_SID')); ?>" class="form-control">
                                                            <?php $__errorArgs = ['TWILIO_SID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                     <!-- TWILIO AUTH TOKEN -->
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Twilio Auth Token :')); ?><span class="text-danger">*</span></label>
                                                            <input name="TWILIO_AUTH_TOKEN" type="text" value="<?php echo e(env('TWILIO_AUTH_TOKEN')); ?>" class="form-control">
                                                            <?php $__errorArgs = ['TWILIO_AUTH_TOKEN'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <!-- TWILIO NUMBER -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Twilio Number :')); ?><span class="text-danger">*</span></label>
                                                            <input name="TWILIO_NUMBER" type="text" value="<?php echo e(env('TWILIO_NUMBER')); ?>" class="form-control">
                                                            <?php $__errorArgs = ['TWILIO_NUMBER'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>                                                
                                                   <!-- Status -->
                                                   <div class="form-group col-md-4">
                                                        <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Twilio Enable')); ?> :</label><br>
                                                        <input type="checkbox" class="custom_toggle" name="twilio_enable" <?php echo e($settings->twilio_enable == '1' ? 'checked' : ''); ?> />
                                                        <input type="hidden"  name="free" value="0" for="status" id="status">
                                                    </div>              
                                                    <!-- create and close button -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Save")); ?></button>
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div><!-- row end -->
                                    </div><!-- card body end -->
                                </div><!-- card end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                  </form>
                  <!-- form end -->
                </div>
                <!-- card body end -->
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<!-- script for bulk detele start  -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true)) {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
        $('.delete_all').on('click', function(e) {
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){
                    var join_selected_values = allVals.join(","); 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });
        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();

            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

            return false;
        });
    });
</script>
<!-- script for bulk detele end  -->
<!-- script to change status start -->
<script>
  $(function() {
    $('.custom_toggle').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;        
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'faq-status',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(id)
            }
        });
    });
  });
</script>
<!-- script to change status end -->
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/twilio/index.blade.php ENDPATH**/ ?>