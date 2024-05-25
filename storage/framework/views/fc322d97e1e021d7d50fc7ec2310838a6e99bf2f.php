
<?php $__env->startSection('title','Create a new batch'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Add Batch';
$data['title'] = 'Courses';
$data['title1'] = 'Batches';
$data['title1'] = 'Add Batch';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
<div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Add Batch')); ?></h5>
          <div class="widgetbar">
            <a href="<?php echo e(url('batch')); ?>" class="float-right btn btn-primary mr-2" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          </div>
        </div>
        <div class="card-body">
          <form action="<?php echo e(url('batch/')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="row">
             
                <div class="form-group col-md-3">
                  <label for="exampleInputTit1e"><?php echo e(__('Batch Name')); ?>: <sup class="text-danger">*</sup></label>
                  <input type="title" class="form-control" name="title" id="exampleInputTitle"
                    placeholder="<?php echo e(__('Enter Batch Name')); ?>" value="" required>

                </div>
                  
                <div class="form-group col-md-3">
                  <label><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label>              
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" name="preview_image" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                      
                    </div>

                  </div>
                  <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('Recommended size')); ?> (1375 x 409px)</small>

                </div> 

                <div class="form-group col-md-3">
                  <label><?php echo e(__('Select Course')); ?>: <span
                      class="text-danger">*</span></label>
                  <select id="course_id"class="form-control select2" name="allowed_courses" 
                    size="5" row="5"
                    placeholder="<?php echo e(__('Select Course')); ?>">


                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat->status == 1): ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?>

                    </option>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>


                <div class="form-group col-md-3">
                  <label><?php echo e(__('Select Users')); ?>: <span
                      class="text-danger">*</span></label>
                  <select id="upload_id" class="form-control select2" name="allowed_users[]" multiple="multiple"
                    size="5" row="5" placeholder="<?php echo e(__('Select Users')); ?>">


                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->status == 1): ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname); ?> <?php echo e($user->lname); ?>

                    </option>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>

</
               

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e"><?php echo e(__('Details')); ?>: <sup
                        class="text-danger">*</sup></label>
                        <textarea  name="detail" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Detail')); ?>" ></textarea>
                  </div>
                </div>
                    <div class="form-group col-md-6">
                      <?php if(Auth::User()->role == "admin"): ?>
                      <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                      <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked/>
                   
                      <?php endif; ?>
                    </div>
               
                <div class="form-group col-md-6">
                  <button type="reset" class="btn btn-danger" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                  <button type="submit" class="btn btn-primary" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Create')); ?></button>
                </div>

                <div class="clear-both"></div>
      
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
//  $(document).on('change','#course_id',function(){
  $(document.body).on('change','#course_id',function(){

        var up = $('#upload_id').empty();
        var cat_id = jQuery('#course_id').val();

        
       
        if (cat_id) {
          //alert(cat_id);
          $.ajax({
            type: "GET",
            url: <?php echo json_encode(url('dropdowns'), 15, 512) ?>,
            data: {
              catId: cat_id
            },
            success: function (data) {
              // up.append('<option value="0">Please Choose</option>');
                $.each(data, function(key,value) {
                  console.log(value);

                  $('#upload_id')
                    .append($("<option></option>")
                    .attr("value", value.id)
                    .text(value.user.fname)); 

                // up.append($('<option>', {
                //   value: value.id
                //   text: 'hello'
                // }));
                  // $.each( value, function( index2, sub_record ) {
                    
                  // });
                }); 

              // var data = JSON.parse(data);
              // console.log(data);
        //       up.append('<option value="0">Please Choose</option>');
        //       $.each(data, function (key,val) {
        //         console.log(val);
        //         up.append($('<option>', {
        //           value: '1'
        //           text: 'hello'
        //         }));
        //       });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });

</script>


<script>
  (function ($) {
    "use strict";

alert("hello");
    $(function () {
      $('.js-example-basic-single').select2();
    });

    $(function () {
      $('#cb1').change(function () {
        $('#j').val(+$(this).prop('checked'))
      })
    })

    $(function () {
      $('#cb3').change(function () {
        $('#test').val(+$(this).prop('checked'))
      })
    })

    $('#cb111').on('change', function () {

      if ($('#cb111').is(':checked')) {
        $('#pricebox').show('fast');

        $('#priceMain').prop('required', 'required');

      } else {
        $('#pricebox').hide('fast');

        $('#priceMain').removeAttr('required');
      }

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

    $("#cb3").on('change', function () {
      if ($(this).is(':checked')) {
        $(this).attr('value', '1');
      } else {
        $(this).attr('value', '0');
      }
    });

    $(function () {

      $('#ms').change(function () {
        if ($('#ms').val() == 'yes') {
          $('#doabox').show();
        } else {
          $('#doabox').hide();
        }
      });

    });

    $(function () {

      $('#ms').change(function () {
        if ($('#ms').val() == 'yes') {
          $('#doaboxx').show();
        } else {
          $('#doaboxx').hide();
        }
      });

    });

    $(function () {

      $('#msd').change(function () {
        if ($('#msd').val() == 'yes') {
          $('#doa').show();
        } else {
          $('#doa').hide();
        }
      });

    });

    $(function () {
      var urlLike = '<?php echo e(url('
      admin / dropdown ')); ?>';
      $('#category_id').change(function () {
        var up = $('#upload_id').empty();
        var cat_id = $(this).val();
        if (cat_id) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: urlLike,
            data: {
              catId: cat_id
            },
            success: function (data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function (id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });

    $(function () {
      var urlLike = '<?php echo e(url('
      admin / gcat ')); ?>';
      $('#upload_id').change(function () {
        var up = $('#grand').empty();
        var cat_id = $(this).val();
        if (cat_id) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: urlLike,
            data: {
              catId: cat_id
            },
            success: function (data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function (id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });
  })(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/batch/create.blade.php ENDPATH**/ ?>