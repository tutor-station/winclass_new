
<?php $__env->startSection('title', 'Profile & Setting'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- about-home start -->
<?php
$gets = App\Breadcum::first();
?>

<?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('<?php echo e(asset('/images/breadcum/'.$gets->img)); ?>')">
<?php else: ?>
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('<?php echo e(asset('Avatar::create($gets->text)->toBase64() ')); ?>')">
<?php endif; ?>
<div class="overlay-bg"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2><?php echo e(__('User Profile')); ?></h2>    
                        
                    </div>
                </div>
            </div>
			<div class="breadcrumb-wrap2">
                  
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('User Profile')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- profile update start -->
<section id="profile-item" class="profile-item-block">
    <div class="container-xl">
    	<form action="<?php echo e(route('user.profile',$orders->id)); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


	        <div class="row">
	            <div class="col-xl-3 col-lg-4 col-md-4">
	                <div class="dashboard-author-block text-center">
	                    <div class="author-image">
						    <div class="avatar-upload">
						        <div class="avatar-edit">
						            <input type='file' id="imageUpload" name="user_img" accept=".png, .jpg, .jpeg" />
						            <label for="imageUpload"><i class="fa fa-pencil"></i></label>
						        </div>
						        <div class="avatar-preview">
						        	<?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
							            <div class="avatar-preview-img" id="imagePreview" style="background-image: url(<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>);">
							            </div>
							        <?php else: ?>
							        	<div class="avatar-preview-img" id="imagePreview" style="background-image: url(<?php echo e(asset('images/default/user.jpg')); ?>);">
							            </div>
							        <?php endif; ?>
						        </div>
						    </div>
	                    </div>
	                    <div class="author-name"><?php echo e(Auth::User()->fname); ?>&nbsp;<?php echo e(Auth::User()->lname); ?></div>
	                </div>
	                <div class="dashboard-items">
	                    <ul>
	                        <li>
								<i data-feather="bookmark"></i>
								<a href="<?php echo e(route('mycourse.show')); ?>" title="<?php echo e(__('My Courses')); ?>"><?php echo e(__('My Courses')); ?></a>
							</li>
	                        <li>
								<i data-feather="heart"></i>
								<a href="<?php echo e(route('wishlist.show')); ?>" title="<?php echo e(__('My wishlist')); ?>"><?php echo e(__('My Wishlist')); ?></a>
							</li>
	                        <li>
								<i data-feather="crosshair"></i>
								<a href="<?php echo e(route('purchase.show')); ?>" title="<?php echo e(__('Purchase History')); ?>"><?php echo e(__('Purchase History')); ?></a>
							</li>
	                        <li>
								<i data-feather="user"></i>
								<a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>" title="<?php echo e(__('User Profile')); ?>"><?php echo e(__('User Profile')); ?></a>
							</li>
	                        <?php if(Auth::User()->role == "user"): ?>
	                        <li>
								<i data-feather="user-plus"></i>
								<a href="#" data-toggle="modal" data-target="#myModalinstructor" title="<?php echo e(__('Become An Instructor')); ?>"><?php echo e(__('Become An Instructor')); ?></a>
							</li>
	                        <?php endif; ?>
	                        <li>
								<i data-feather="credit-card"></i>
								<a href="<?php echo e(url('bankdetail')); ?>" title="<?php echo e(__('My Bank Details')); ?>"><?php echo e(__('My Bank Details')); ?></a>
							</li>

	                        <li>
								<i data-feather="lock"></i>
								<a href="<?php echo e(route('2fa.show')); ?>" title="<?php echo e(__('2 Factor Auth')); ?>"><?php echo e(__('2 Factor Auth')); ?></a>
							</li>
							<li>
								<i data-feather="check-circle"></i>
								<a href="<?php echo e(route('verifaction')); ?>" title="<?php echo e(__('Verifaction')); ?>"><?php echo e(__('Verifaction')); ?></a>
							</li>
							<?php if(Auth::User()->role == "user" && Auth::User()->role == "Admin"): ?>
	                        <li>
								<i data-feather="layers"></i>
								<a href="<?php echo e(route('front.alumini')); ?>" title="<?php echo e(__('Alumini')); ?>"><?php echo e(__('Alumini')); ?></a>
							</li>
	                        <?php endif; ?>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-xl-9 col-lg-8 col-md-8">

	                <div class="profile-info-block">
	                    <div class="profile-heading"><?php echo e(__('Personal Info')); ?></div>
	                    <div class="row">
	                        <div class="col-lg-6">
	                            <div class="form-group mb-3">
	                                <label for="name"><?php echo e(__('First Name')); ?></label>
	                                <input type="text" id="name" name="fname" class="form-control" placeholder="<?php echo e(__('Enter First Name')); ?>" value="<?php echo e($orders->fname); ?>" required>
	                            </div>
							</div>
							<div class="col-lg-6">
	                            <div class="form-group mb-3">
	                                <label for="email"><?php echo e(__('Email')); ?></label>
	                                <input type="email" id="email" name="email" class="form-control" placeholder="info@example.com" required value="<?php echo e($orders->email); ?>" >
	                            </div>
	                        </div>
	                        <div class="col-lg-6">
	                            <div class="form-group mb-3">
	                                <label for="Username"><?php echo e(__('Last Name')); ?></label>
	                                <input type="text" id="lname" name="lname" class="form-control" placeholder="<?php echo e(__('Enter Last Name')); ?>" value="<?php echo e($orders->lname); ?>" required>
	                            </div>
							</div>
							<div class="col-lg-6">
	                            <div class="form-group mb-3">
	                                <label for="mobile"><?php echo e(__('Mobile')); ?></label>
	                                <input type="text" name="mobile" id="mobile" value="<?php echo e($orders->mobile); ?>" class="form-control" placeholder="<?php echo e(__('Enter Mobile No')); ?>">
	                            </div>	                            
	                        </div>
							<div class="col-lg-12">
								<div class="form-group mb-3">
									<label for="bio"><?php echo e(__('address')); ?></label>
									<textarea id="address" name="address" class="form-control" placeholder="<?php echo e(__('Enter your Address')); ?>" value=""><?php echo e($orders->address); ?></textarea>
								</div>
							</div>
	                        <div class="col-lg-4">
	                        	<div class="form-group mb-3">
	                                <label for="city_id"><?php echo e(__('Country')); ?>:</label>
					                <select class="form-select" aria-label="Default select example">
										<option selected>Country</option>
										<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                    <option value="<?php echo e($coun->country_id); ?>" <?php echo e($orders->country_id == $coun->country_id ? 'selected' : ''); ?>><?php echo e($coun->nicename); ?>

					                    </option>
					                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
	                            </div>
	                        </div>
	                        <div class="col-lg-4">
	                        	<div class="form-group mb-3">
	                        		<label for="city_id"><?php echo e(__('State')); ?>:</label>
					                <select class="form-select" aria-label="Default select example">
										<option selected>State</option>
										<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                    <option value="<?php echo e($s->id); ?>" <?php echo e($orders->state_id==$s->id ? 'selected' : ''); ?>><?php echo e($s->name); ?></option>
					                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
	                        	</div>
	                        </div>
	                        <div class="col-lg-4">
	                        	<div class="form-group mb-3">
	                        		<label for="city_id"><?php echo e(__('City')); ?>:</label>
					                <select class="form-select" aria-label="Default select example">
										<option selected>City</option>
										<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                    <option value="<?php echo e($c->id); ?>" <?php echo e($orders->city_id == $c->id ? 'selected' : ''); ?>><?php echo e($c->name); ?>

					                    </option>
					                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
	                        	</div>
	                        </div>
							<div class="col-lg-12">
								<div class="form-group mb-3">
									<label for="bio"><?php echo e(__('Author Bio')); ?></label>
									<textarea id="detail" name="detail" class="form-control" placeholder="<?php echo e(__('Enter your details')); ?>" value=""><?php echo e($orders->detail); ?></textarea>
								</div>
							</div>
		                    <div class="col-lg-12">
		                      	<div class="update-password mb-2">
									<label for="box1"><?php echo e(__('Update Password')); ?>:</label>
									<input type="checkbox" name="update_pass" id="myCheck" onclick="myFunction()">
		                      	</div>
		                    </div>
							<div class="password" id="update-password">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="confirmpassword"><?php echo e(__('Password')); ?>:</label>
											<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
											<input name="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" id="password" type="password" placeholder="<?php echo e(__('Enter Password')); ?>" onkeyup='check();' />
											<?php if($errors->has('password')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('password')); ?></strong>
											</span>
										<?php endif; ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label><?php echo e(__('Confirm Password')); ?>:</label>
											<input type="password" name="confirm_password" id="confirm_password" class="form-control " placeholder="<?php echo e(__('Confirm Password')); ?>" onkeyup='check();' /> 
											<?php if($errors->has('password')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('password')); ?></strong>
											</span>
										<?php endif; ?>
											<span id='message'></span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
	                </div>
	                <div class="social-profile-block">
	                    <div class="social-profile-heading"><?php echo e(__('Social Profile')); ?></div>
	                    <div class="row">
	                        <div class="col-lg-6">
	                            <div class="social-block">
	                                <div class="form-group">
	                                    <label for="facebook"><?php echo e(__('Facebook Url')); ?></label><br>
	                                    <div class="row">
	                                        <div class="col-lg-2 col-2">
	                                            <div class="profile-update-icon">
	                                                <div class="product-update-social-icons"><a href="<?php echo e($orders->fb_url); ?>" class="facebook" target="_blank" title="facebook"><i data-feather="facebook"></i></a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="col-lg-10 col-10">
	                                            <input type="text" name="fb_url" value="<?php echo e($orders->fb_url); ?>" id="facebook" class="form-control" placeholder="<?php echo e(__('Facebook.com')); ?>" />
	                                        </div>
	                                    </div>    
	                                </div>
	                            </div>
	                            <div class="social-block">
	                                <div class="form-group">
	                                    <label for="behance2"><?php echo e(__('Youtube Url')); ?></label><br>
	                                    <div class="row">
	                                        <div class="col-lg-2 col-2">
	                                            <div class="profile-update-icon">
	                                                <div class="product-update-social-icons">
														<a href="<?php echo e($orders->youtube_url); ?>" target="_blank" class="youtube" title="googleplus"><i data-feather="youtube"></i></a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="col-lg-10 col-10">
	                                            <input type="text" name="youtube_url" value="<?php echo e($orders->youtube_url); ?>" id="behance2" class="form-control" placeholder="<?php echo e(__('youtube.com')); ?>" />
	                                        </div>
	                                    </div>    
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-lg-6">
	                            <div class="social-block">
	                                <div class="form-group">
	                                    <label for="twitter"><?php echo e(__('Twitter Url')); ?></label><br>
	                                    <div class="row">
	                                        <div class="col-lg-2 col-2">
	                                            <div class="profile-update-icon">
	                                                <div class="product-update-social-icons"><a href="<?php echo e($orders->twitter_url); ?>" class="twitter" target="_blank" title="twitter"><i data-feather="twitter"></i></a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="col-lg-10 col-10">
	                                            <input type="text" name="twitter_url" value="<?php echo e($orders->twitter_url); ?>" id="twitter" class="form-control" placeholder="<?php echo e(__('Twitter.com')); ?>" />
	                                        </div>
	                                    </div>    
	                                </div>
	                            </div>
	                            <div class="social-block">
	                                <div class="form-group">
	                                    <label for="dribbble2"><?php echo e(__('Linked In Url')); ?></label><br>
	                                    <div class="row">
	                                        <div class="col-lg-2 col-2">
	                                            <div class="profile-update-icon">
	                                                <div class="product-update-social-icons"><a href="<?php echo e($orders->linkedin_url); ?>" class="linkedin" target="_blank" title="linkedin"><i data-feather="linkedin"></i></a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="col-lg-10 col-10">
	                                            <input type="text" name="linkedin_url" value="<?php echo e($orders->linkedin_url); ?>" id="dribbble2" class="form-control" placeholder="Linkedin.com/">
	                                        </div>
	                                    </div>    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="upload-items text-right">
	                    <button type="submit" class="btn btn-primary" title="upload items"><?php echo e(__('Update Profile')); ?></button>
	                </div>
	                
	            </div>
	        </div>

        </form>
    </div>
</section>
<!-- profile update end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>





<script>
(function($) {
  "use strict";
  $(function() {
    var urlLike = '<?php echo e(url('country/dropdown')); ?>';
    $('#country_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
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
(function($) {
  "use strict";
  $(function() {
    var urlLike = '<?php echo e(url('country/gcity')); ?>';
    $('#upload_id').change(function() {
      var up = $('#grand').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
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
(function($) {
  "use strict";
	function readURL(input) {
	if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function(e) {
	        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
	        $('#imagePreview').hide();
	        $('#imagePreview').fadeIn(650);
	    }
	    reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload").change(function() {
	    readURL(this);
	});
})(jQuery);
</script>

<script>
  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("update-password");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
       text.style.display = "none";
    }
  }
</script>

<script>
(function($) {
  "use strict";
	$('#password, #confirm_password').on('keyup', function () {
	  if ($('#password').val() == $('#confirm_password').val()) {
	    $('#message').html('Password Match').css('color', 'green');
	  } else 
	    $('#message').html('Password Do Not Match').css('color', 'red');
	});
})(jQuery);

</script>

<script>
(function($) {
  "use strict";
	tinymce.init({selector:'textarea#detail'});
})(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/user_profile/profile.blade.php ENDPATH**/ ?>