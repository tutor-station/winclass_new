
<?php $__env->startSection('title', 'Edit Blog Post'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Edit Blog Post';
$data['title'] = 'Blog';
$data['title1'] = 'Edit Post';;
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
                <h5 class="card-box"> <?php echo e(__('Edit Blog Post')); ?></h5>
                <div>
                        <div class="widgetbar">
                        <a href="<?php echo e(url('blog')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Back')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                        </div>
                      </div>
            </div> 
             <!-- card body started -->
            <div class="card-body">
               <!-- form start -->
              <form action="<?php echo e(route('blog.update',$show->id)); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
			  		<?php echo e(csrf_field()); ?>

	                <?php echo e(method_field('PUT')); ?>

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
                                                
                                                 <!-- Heading -->
                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-dark"><?php echo e(__('Heading')); ?> : <span class="text-danger">*</span></label>
                                                        <input type="text" value="<?php echo e($show->heading); ?>" autofocus="" class="form-control <?php $__errorArgs = ['heading'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Heading')); ?>" name="heading" required="">
                                                        <?php $__errorArgs = ['heading'];
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

                                                 <!-- slug -->
                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-dark"><?php echo e(__('Slug')); ?> : <span class="text-danger">*</span></label>
                                                        <input type="text" pattern="[/^\S*$/]+"  value="<?php echo e($show->slug); ?>" autofocus="" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Slug')); ?>" name="slug" required="">
                                                        <?php $__errorArgs = ['slug'];
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

                                                 <!-- ButtonText -->
                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-dark"><?php echo e(__('Button Text')); ?> : <span class="text-danger">*</span></label>
                                                        <input type="text" value="<?php echo e($show->text); ?>" autofocus="" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Button Text')); ?>" name="text" required="">
                                                        <?php $__errorArgs = ['text'];
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

                                                <!-- Date -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-dark"><?php echo e(__('Date')); ?> : <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" value="<?php echo e($show->date); ?>" name="date" id="inputDate" placeholder="<?php echo e(__('Select Date')); ?>" required>
                                                        
                                                        <?php $__errorArgs = ['date'];
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

                                                <!-- detail -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-dark"><?php echo e(__('Details')); ?>: <span class="text-danger">*</span></label>
                                                        <textarea id="detail" name="detail" class="<?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Detail')); ?>" required=""><?php echo e($show->detail); ?></textarea>
                                                        <?php $__errorArgs = ['detail'];
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
                                
                                                <!-- image -->
												<?php if(Auth::user()->role == 'instructor'): ?>
                                                <div class="form-group col-md-4">
                                                <label class="text-dark"><?php echo e(__('Image')); ?>:<span class="text-danger">*</span></label><br>
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                                </div>
                                                </div>
                                                <img src="<?php echo e(url('/images/blog/'.$show->image)); ?>" class="image_size"/>
                                                </div>

                                                <?php endif; ?>

                                                <?php if(Auth::user()->role == 'admin'): ?>
                                                <div class="form-group">
              <label class="control-label" for="first-name"><?php echo e(__('Image')); ?> <span
                  class="required">*</span> </label>
             
                  <div class="input-group">

                    <input required readonly id="image" name="image" type="text"
                        class="form-control">
                    <div class="input-group-append">
                        <span data-input="image"
                            class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                    </div>
                  </div>

                <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(<?php echo e(__('Choose Image for blog
                  post')); ?>)</small>
                  <br>
                  <img src=" <?php echo e(url('images/blog/'.$show->image)); ?>"
                  class="pro-img" />
            </div>

            <?php endif; ?>
                                                

                                                <?php if(Auth::user()->role == 'admin'): ?>
                                                <!-- Approved -->
                                                <div class="form-group col-md-3">
                                                    <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Approved')); ?>:<sup class="redstar text-danger">*</sup></label><br>
                                                    <input type="checkbox" class="custom_toggle" name="approved"<?php echo e($show->approved == '1' ? 'checked' : ''); ?> />
                                                    <input type="hidden"  name="free" value="0" for="status" id="status">
                                                </div>
                                               
                                                <!-- status -->
                                                <div class="form-group col-md-3">
                                                <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Status')); ?> :</label><br>
                                                <input type="checkbox" class="custom_toggle" name="status" <?php echo e($show->status == '1' ? 'checked' : ''); ?> />
                                                <input type="hidden"  name="free" value="0" for="status" id="status">
                                                </div>
                                                <?php endif; ?>
                                                                  
                                                <!-- update and reset button -->
                                                <div class="col-md-12">
                                                    <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                    <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                                        <?php echo e(__("Update")); ?></button>
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
            </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>

<script>
    $(".midia-toggle").midia({
        base_url: '<?php echo e(url('')); ?>',
        title : 'Choose Blog Image',
        dropzone : {
          acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        },
        directory_name: 'blog'
    });
</script>

<style>
    .image_size{
    height:80px;
    width:200px;
}
</style>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/blog/edit.blade.php ENDPATH**/ ?>