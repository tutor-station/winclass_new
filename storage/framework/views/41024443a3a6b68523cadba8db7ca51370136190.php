
<?php $__env->startSection('title','Create a new course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Course';
$data['title'] = 'Course';
$data['title1'] = 'Create a Course';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar dashboard-card">
  <?php if($errors->any()): ?>
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-tittle"><?php echo e(__('Add Course')); ?></h5>
          <div>
            <div class="widgetbar">
              <a href="<?php echo e(route('course.index')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="<?php echo e(url('course/')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-md-3">
                <label><?php echo e(__('Category')); ?>:<span class="redstar">*</span></label>
                <select name="category_id" id="category_id" class="form-control select2">
                  <option value="0"><?php echo e(__('SelectanOption')); ?></option>
                  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col-md-3">
                <label><?php echo e(__('SubCategory')); ?>:<span class="redstar">*</span></label>
                <select name="subcategory_id" id="upload_id" class="form-control select2">
                </select>
              </div>
              <div class="col-md-3">
                <label><?php echo e(__('ChildCategory')); ?>:</label>
                <select name="childcategory_id" id="grand" class="form-control select2"></select>
              </div>
              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('Instructor')); ?><span class="redstar">*</span></label>
                <select name="user_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                  <?php if(Auth::user()->role == 'admin'): ?>
                  <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?></option>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname); ?> <?php echo e($user->lname); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?></option>
                  <?php endif; ?>
                </select>
              </div>
              <br>
              <div class="col-md-12">
                <div class="form-group">
                  <label><?php echo e(__("Also In Categories :")); ?></label>
                  <select multiple="multiple" name="other_cats[]" id="other_cats" class="form-control select2">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e(old('other_cats') != '' && in_array($category->id,old('other_cats')) ? "selected" : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <small class="text-primary">
                    <i class="feather icon-help-circle"></i> <?php echo e(__("If in list primary category is also present then it will auto remove from this after create product.")); ?>

                  </small>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <label><?php echo e(__('Language')); ?>: <span class="redstar">*</span></label>
                <select name="language_id" class="form-control select2">
                  <?php
                  $languages = App\CourseLanguage::all();
                  ?>
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option <?php echo e($caat->language_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="col-md-4">
                <?php
                $ref_policy = App\RefundPolicy::all();
                ?>
                <label for="exampleInputSlug"><?php echo e(__('Select Refund Policy')); ?> <span class="redstar">*</span></label>
                <select name="refund_policy_id" class="form-control select2">
                  <option value="none" selected disabled hidden>
                    <?php echo e(__('SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $ref_policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($ref->id); ?>"><?php echo e($ref->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

              </div>

              <?php if(Auth::User()->role == "admin"): ?>
              <div class="col-md-4">
                <label><?php echo e(__('Institute')); ?>: <span class="redstar">*</span></label>
                <select name="institude_id" class="form-control select2">
                  <?php
                  $institute = App\Institute::where('status' ,'1')->get();
                  ?>
                  <option value="none" selected disabled hidden>
                    <?php echo e(__('SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($inst->id); ?>"><?php echo e($inst->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <?php endif; ?>

              <?php if(Auth::User()->role == "instructor"): ?>
              <div class="col-md-4">
                <label><?php echo e(__('Institute')); ?>: <span class="redstar">*</span></label>
                <select name="institude_id" class="form-control select2">
                  <?php
                  $institute = App\Institute::where('user_id',Auth::user()->id)->where('status' ,'1')->get();
                  ?>
                  <option value="none" selected disabled hidden>
                    <?php echo e(__('SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($inst->id); ?>"><?php echo e($inst->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <?php endif; ?>


            </div>
            <br>



            <div class="row">
              <div class="col-md-4">
                <label for="exampleInputTit1e"><?php echo e(__('Course Name')); ?>: <sup class="redstar">*</sup></label>
                <input type="title" class="form-control" name="title" id="exampleInputTitle" placeholder="<?php echo e(__('Enter Course Name')); ?>" value="<?php echo e((old('title'))); ?>" required>
              </div>
              <div class="col-md-4">
                <label for="exampleInputSlug"><?php echo e(__('Slug')); ?>: <sup class="redstar">*</sup></label>
                <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug" id="exampleInputPassword1" placeholder="<?php echo e(__('Enter Slug')); ?>" value="<?php echo e((old('slug'))); ?>" required>
              </div>
              <div class="col-md-4">
                <label for="exampleInputSlug"><?php echo e(__('Course Type')); ?>: <span class="redstar">*</span></label>
                <select name="course_type" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="none" selected disabled hidden>
                      <?php echo e(__('SelectanOption')); ?>

                    </option>
                    <option value="video">Video</option>
                    <option value="test">Test Series</option>
                </select>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Short Detail')); ?>: <sup class="redstar">*</sup></label>
                <textarea name="short_detail" rows="3" class="form-control" placeholder="<?php echo e(__('Enter Short Detail')); ?>" required><?php echo e((old('short_detail'))); ?></textarea>
              </div>
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Requirements')); ?>: <sup class="redstar">*</sup></label>
                <textarea name="requirement" rows="3" class="form-control" placeholder="<?php echo e(__('Enter Requirements')); ?>" required><?php echo e((old('requirement'))); ?></textarea>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Detail')); ?>: <sup class="redstar">*</sup></label>
                <textarea id="detail" name="detail" rows="3" class="form-control"><?php echo e((old('detail'))); ?></textarea>
              </div>
            </div>
            <br>

            <!-- country start -->
            <div class="row">
              <div class="col-md-4">

                <label><?php echo e(__('Country')); ?>: </label>
                <select class="select2-multi-select form-control" name="country[]" multiple="multiple">
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option><?php echo e($country->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <small class="text-info"><i class="fa fa-question-circle"></i> (<?php echo e(__('Select those countries where you want to block course.')); ?> )</small>

              </div>
            <!-- country end -->

            <?php if(Auth::User()->role == "admin"): ?>
            
              <div class="col-md-4">
                <label for="exampleInputSlug"><?php echo e(__('Label')); ?>:</label>
                <select class="form-control js-example-basic-single" name="level_tags">
                  <option value="none" selected disabled hidden>
                    <?php echo e(__('Select an Option')); ?>

                  </option>
                  <option value="trending"><?php echo e(__('Trending')); ?></option>
                  <option value="onsale"><?php echo e(__('On-sale')); ?></option>
                  <option value="bestseller"><?php echo e(__('Best Seller')); ?></option>
                  <option value="beginner"><?php echo e(__('Beginner')); ?></option>
                  <option value="intermediate"><?php echo e(__('Intermediate')); ?></option>
                  <option value="expert"><?php echo e(__('Expert')); ?></option>
                </select>
              </div>            

            <?php endif; ?>            

           
              <div class="col-md-4">
                <label><?php echo e(__('Course Tags')); ?>: <span class="redstar">*</span></label>
                <select class="select2-multi-select form-control" name="course_tags[]" multiple="multiple" size="5" row="1" >
                  <option></option>
                </select>

              </div>
            </div>
            <br>



            <div class="row">
              <div class="col-md-12 d-none">


                <label for="exampleInputSlug"><?php echo e(__('Return Available')); ?></label>
                <select name="refund_enable" class="form-control js-example-basic-single col-md-7 col-xs-12">
                  <option value="none" selected disabled hidden>
                    <?php echo e(__('Select an Option')); ?>

                  </option>

                  <option value="1"><?php echo e(__('Return Available')); ?></option>
                  <option value="0"><?php echo e(__('Return Not Available')); ?></option>

                </select>

              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <label for="exampleInputDetails"><?php echo e(__('Paid')); ?>:</label>
                <input type="checkbox" class="custom_toggle" id="cb111" name="type" />
                <label class="tgl-btn" data-tg-off="<?php echo e(__('Free')); ?>" data-tg-on="<?php echo e(__('Paid')); ?>" for="cb111"></label>

                <br>
                <div style="display: none;" id="pricebox">
                  <label for="exampleInputSlug"><?php echo e(__('Price')); ?>: <sup class="redstar">*</sup></label>
                  <input type="number" step="0.01" class="form-control" name="price" id="priceMain" placeholder="<?php echo e(__('Enter Course Price')); ?>" value="<?php echo e((old('price'))); ?>">

                  <label for="exampleInputSlug"><?php echo e(__('Discounted Price')); ?>: </label>
                  <input type="number" step="0.01" class="form-control" name="discount_price" id="offerPrice" placeholder="<?php echo e(__('Enter Discounted Price')); ?>" value="<?php echo e((old('discount_price'))); ?>">
                </div>
              </div>
              <div class="col-md-3 d-none">
                
                
                <br>
                
            </div>

            <div class="col-md-3">
              <?php if(Auth::User()->role == "admin"): ?>
              <label for="exampleInputDetails"><?php echo e(__('Featured')); ?>:</label>
              <input type="checkbox" class="custom_toggle" id="cb1" name="featured" checked />
              <label class="tgl-btn" data-tg-off="<?php echo e(__('OFF')); ?>" data-tg-on="<?php echo e(__('ON')); ?>" for="cb1"></label>
              
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(Auth::User()->role == "admin"): ?>
              <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
              <input type="checkbox" class="custom_toggle" name="status" id="cb3" checked />
              <label class="tgl-btn" data-tg-off="<?php echo e(__('Deactive')); ?>" data-tg-on="<?php echo e(__('Active')); ?>" for="cb3"></label>
              
              <?php endif; ?>
            </div>

            <div class="col-md-3">
              <label for="exampleInputDetails"><?php echo e(__('Involvement Request')); ?>:</label>
              <input name="involvement_request" type="checkbox" class="custom_toggle" id="involve" checked />
              <label class="tgl-btn" data-tg-off="<?php echo e(__('OFF')); ?>" data-tg-on="<?php echo e(__('ON')); ?>" for="involve"></label>

            </div>
        </div>
        <br>

        <div class="row">
          <div class="col-md-3">
            <label for="exampleInputDetails"><?php echo e(__('Preview Video')); ?>:</label>
            <input id="preview" type="checkbox" class="custom_toggle" name="preview_type" />
            <label class="tgl-btn" data-tg-off="<?php echo e(__('URL')); ?>" data-tg-on="<?php echo e(__('Upload')); ?>" for="preview"></label>

            <div style="display: none;" id="document1">
              <label for="exampleInputSlug"><?php echo e(__('Upload Video')); ?>:</label>
              <input type="file" name="video" id="video" value="" class="form-control">
            </div>
            <div id="document2">
              <label for=""><?php echo e(__('URL')); ?>: </label>
              <input type="url" name="url" id="url" placeholder="<?php echo e(__('Enter URL')); ?>" class="form-control" value="<?php echo e((old('url'))); ?>">
            </div>
          </div>



          <div class="col-md-3">
            <label for=""><?php echo e(__('Duration')); ?>: </label>
            <input id="duration_type" type="checkbox" class="custom_toggle" name="duration_type" checked />
            <label class="tgl-btn" data-tg-off="<?php echo e(__('Days')); ?>" data-tg-on="<?php echo e(__('Month')); ?>" for="duration_type"></label>
            <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('If enabled duration can be in months')); ?>,</small>
            <small class="text-muted"> <?php echo e(__('when Disabled duration can be in days')); ?>.</small>
            <br>
            <label for="exampleInputSlug"><?php echo e(__('Course Expire Duration')); ?></label>
            <input min="1" class="form-control" name="duration" type="number" id="duration" placeholder="<?php echo e(__('Enter Course Expire Duration')); ?>" value="<?php echo e((old('duration'))); ?>">
          </div>
        </div>

        <br>

        <div class="row">
          <?php if(Auth::user()->role == 'instructor'): ?>
          <div class="col-md-4">
            <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Preview Image')); ?>: </label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="file"><?php echo e(__('Upload')); ?></span>
              </div>
              <div class="custom-file">
                <input type="file" name="preview_image" class="custom-file-input" id="file" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if(Auth::user()->role == 'admin'): ?>
          <div class="col-md-4">
            <label class="text-dark"><?php echo e(__('Image')); ?>:<span class="text-danger">*</span></label><br>
            <div class="input-group mb-3">
              <input type="text" class="form-control" readonly id="image" name="preview_image">
              <div class="input-group-append">
                <span data-input="image" class="midia-toggle btn-primary  input-group-text" id="basic-addon2"><?php echo e(__('Browse')); ?></span>
              </div>
            </div>
          </div>
          <?php endif; ?>


          <div class="col-md-4">
            <?php if(Auth::User()->role == "admin"): ?>
            <label for="Revenue"><?php echo e(__('Instructor Revenue')); ?> %:</label>
            <div class="input-group">
              <input min="1" max="100" class="form-control" name="instructor_revenue" type="number" id="revenue" placeholder="<?php echo e(__('Enter Instructor Revenue')); ?> %" class="<?php echo e($errors->has('instructor_revenue') ? ' is-invalid' : ''); ?> form-control" value="<?php echo e((old('instructor_revenue'))); ?>">
              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
            </div>
            <?php endif; ?>
          </div>
        </div>
        </br>
        <br>


        <div class="row">
          <div class="col-sm-3">

            <label for="exampleInputDetails"><?php echo e(__('Assignment')); ?>:</label>
            <input <?php echo e(old('assignment_enable') == "0" ? '' : "checked"); ?> id="frees" type="checkbox" class="custom_toggle" name="assignment_enable" checked />
            <label class="tgl-btn" data-tg-off="<?php echo e(__('No')); ?>" data-tg-on="<?php echo e(__('Yes')); ?>" for="frees"></label>

          </div>

          <div class="col-sm-3">

            <label for="exampleInputDetails"><?php echo e(__('Appointment')); ?>:</label>
            <input <?php echo e(old('appointment_enable') == "0" ? '' : "checked"); ?> id="frees1" type="checkbox" class="custom_toggle" name="appointment_enable" checked />
            <label class="tgl-btn" data-tg-off="<?php echo e(__('No')); ?>" data-tg-on="<?php echo e(__('Yes')); ?>" for="frees1"></label>

          </div>

          <div class="col-sm-3">
            <label for="exampleInputDetails"><?php echo e(__('Certificate Enable')); ?>:</label>
            <input <?php echo e(old('certificate_enable') == "0" ? '' : "checked"); ?> id="frees2" type="checkbox" class="custom_toggle" name="certificate_enable" checked />
            <label class="tgl-btn" data-tg-off="<?php echo e(__('No')); ?>" data-tg-on="<?php echo e(__('Yes')); ?>" for="frees2"></label>
          </div>

          <div class="col-sm-3">
            <label for=""><?php echo e(__('Drip Content')); ?>: </label>
            <input id="drip_enable" type="checkbox" class="custom_toggle" name="drip_enable" checked />
            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="drip_enable"></label>
          </div>
        </div>
        <br>
        <br>
        <div class="form-group">
          <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
          <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
            <?php echo e(__('Create')); ?></button>
        </div>

        <div class="clear-both"></div>
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
  (function($) {
    "use strict";

    $(function() {
      $('.js-example-basic-single').select2({
        tags: true,
        tokenSeparators: [',', ' ']
      });
    });

    $(function() {
      $('#cb1').change(function() {
        $('#j').val(+$(this).prop('checked'))
      })
    })

    $(function() {
      $('#cb3').change(function() {
        $('#test').val(+$(this).prop('checked'))
      })
    })

    $('#cb111').on('change', function() {

      if ($('#cb111').is(':checked')) {
        $('#pricebox').show('fast');

        $('#priceMain').prop('required', 'required');

      } else {
        $('#pricebox').hide('fast');

        $('#priceMain').removeAttr('required');
      }

    });

    $('#preview').on('change', function() {

      if ($('#preview').is(':checked')) {
        $('#document1').show('fast');
        $('#document2').hide('fast');
      } else {
        $('#document2').show('fast');
        $('#document1').hide('fast');
      }

    });

    $("#cb3").on('change', function() {
      if ($(this).is(':checked')) {
        $(this).attr('value', '1');
      } else {
        $(this).attr('value', '0');
      }
    });

    $(function() {

      $('#ms').change(function() {
        if ($('#ms').val() == 'yes') {
          $('#doabox').show();
        } else {
          $('#doabox').hide();
        }
      });

    });

    $(function() {

      $('#ms').change(function() {
        if ($('#ms').val() == 'yes') {
          $('#doaboxx').show();
        } else {
          $('#doaboxx').hide();
        }
      });

    });

    $(function() {

      $('#msd').change(function() {
        if ($('#msd').val() == 'yes') {
          $('#doa').show();
        } else {
          $('#doa').hide();
        }
      });

    });

    $(function() {
      var urlLike = '<?php echo e(url('admin/dropdown')); ?>';
      $('#category_id').change(function() {
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
            success: function(data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function(id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });

    $(function() {
      var urlLike = '<?php echo e(url('admin/gcat')); ?>';
      $('#upload_id').change(function() {
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
            success: function(data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function(id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });
  })(jQuery);
</script>


<script>
  $(".midia-toggle").midia({
    base_url: '<?php echo e(url('')); ?>',
    title: 'Choose Course Image',
    dropzone: {
      acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
    },
    directory_name: 'course'
  });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/course/insert.blade.php ENDPATH**/ ?>