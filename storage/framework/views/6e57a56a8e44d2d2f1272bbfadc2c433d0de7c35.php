
<?php $__env->startSection('title', 'Profile & Setting'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- about-home start -->
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('Bank Details')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- profile update start -->
<section id="profile-item" class="profile-item-block">
    <div class="container-xl">

        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="dashboard-author-block text-center">
                    <div class="author-image">
					    <div class="avatar-upload">
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
                          <i class="fa fa-bookmark"></i>
                          <a href="<?php echo e(route('mycourse.show')); ?>" title="<?php echo e(__('My Courses')); ?>"><?php echo e(__('My Courses')); ?></a>
                        </li>
                        <li>
                          <i class="fa fa-heart"></i>
                          <a href="<?php echo e(route('wishlist.show')); ?>" title="<?php echo e(__('My wishlist')); ?>"><?php echo e(__('My Wishlist')); ?></a>
                        </li>
                        <li>
                          <i class="fa fa-history"></i>
                          <a href="<?php echo e(route('purchase.show')); ?>" title="<?php echo e(__('Purchase History')); ?>"><?php echo e(__('Purchase History')); ?></a>
                        </li>
                        <li>
                          <i class="fa fa-user"></i>
                          <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>" title="<?php echo e(__('User Profile')); ?>"><?php echo e(__('User Profile')); ?></a>
                        </li>
                        <?php if(Auth::User()->role == "user"): ?>
                        <li><i class="fas fa-chalkboard-teacher"></i><a href="#" data-toggle="modal" data-target="#myModalinstructor" title="<?php echo e(__('Become An Instructor')); ?>"><?php echo e(__('Become An Instructor')); ?></a></li>
                        <?php endif; ?>

                        <li><i class="fa fa-bank"></i><a href="<?php echo e(url('bankdetail')); ?>" title="<?php echo e(__('My Bank Details')); ?>"><?php echo e(__('My Bank Details')); ?></a></li>

                        <li><i class="fa fa-check"></i><a href="<?php echo e(route('2fa.show')); ?>" title="<?php echo e(__('2 Factor Auth')); ?>"><?php echo e(__('2 Factor Auth')); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">

                <div class="profile-info-block user-bank-button">


                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalBank"><?php echo e(__('Add Bank')); ?></button>


                  <div class="modal fade" id="myModalBank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Add Bank Details')); ?></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="box box-primary">
                          <div class="panel panel-sum">
                            <div class="modal-body">

                              <form  method="post" action="<?php echo e(url('bankdetail/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                  <?php echo e(csrf_field()); ?> 

                                  <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="account_holder_name"><?php echo e(__('Account Holder Name')); ?>:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="account_holder_name" id="title" placeholder="<?php echo e(__('Please Enter Acc. Holder Name')); ?>"  required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="bank_name"><?php echo e(__('Bank Name')); ?>:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="bank_name" id="title" placeholder="<?php echo e(__('Please Enter Bank Name')); ?>"  required>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="account_number"><?php echo e(__('Account Number')); ?>:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="account_number" id="title" placeholder="<?php echo e(__('Please Enter Account Number')); ?>"  required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="ifcs_code"><?php echo e(__('IFSC Code')); ?>:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="ifcs_code" id="title" placeholder="<?php echo e(__('Please Enter IFSC Code')); ?>"  required>
                                      </div>
                                    </div>
                                  </div>



                                  <div class="cancel-button" style="text-align:center">
                                  <button type="submit" class="btn btn-primary"> <?php echo e(__('Add')); ?></button>
                                </div>
                              </form>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   
                </div>


                <div id="purchase-block" class="purchase-main-block user-bank-block">
                 
                    <div class="purchase-table table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="purchase-text"><?php echo e(__('A/C Holder Name')); ?></th>
                            <th class="purchase-text"><?php echo e(__('Bank name')); ?></th>
                            <th class="purchase-text"><?php echo e(__('A/C No')); ?></th>
                            <th class="purchase-text"><?php echo e(__('IFSC Code')); ?>s</th>
                            <th class="purchase-text"><?php echo e(__('Actions')); ?></th>
                            
                          </tr>
                        </thead>
                          <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <div class="purchase-history-table">
                              <tbody>
                                <tr>
                                  <td>
                                    <div class="purchase-text"> <?php echo e($bank['account_holder_name']); ?></div>                         
                                  </td>
                                  <td>
                                    <div class="purchase-text"> <?php echo e($bank['bank_name']); ?></div>                         
                                  </td>
                                  <td>
                                    <div class="purchase-text"> <?php echo e($bank['account_number']); ?></div>                         
                                  </td>
                                  <td>
                                    <div class="purchase-text"> <?php echo e($bank['ifcs_code']); ?></div>                         
                                  </td>
                                     
                                  <td>
                                    <div class="invoice-btn">
                                      <a type="button" href="<?php echo e(route('invoice.show',$bank->id)); ?>"  class="btn btn-secondary" data-toggle="modal" data-target="#myModalBankEdit<?php echo e($bank->id); ?>"><?php echo e(__('Edit')); ?></a>


                                   

                                      <div class="modal fade" id="myModalBankEdit<?php echo e($bank->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">

                                              <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Edit Bank Details')); ?></h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="box box-primary">
                                              <div class="panel panel-sum">
                                                <div class="modal-body">

                                                  <form  method="post" action="<?php echo e(route('bankdetail.update',$bank->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                      <?php echo e(csrf_field()); ?> 
                                                      <?php echo e(method_field('PUT')); ?>




                                                      <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <div class="form-group">
                                                            <label for="account_holder_name"><?php echo e(__('Account Holder Name')); ?>:<sup class="redstar">*</sup></label>
                                                            <input type="text" class="form-control" name="account_holder_name" id="title" value="<?php echo e($bank->account_holder_name); ?>" placeholder="<?php echo e(__('Please Enter Acc. Holder Name')); ?>"  required>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <div class="form-group">
                                                            <label for="bank_name"><?php echo e(__('Bank Name')); ?>:<sup class="redstar">*</sup></label>
                                                            <input type="text" class="form-control" name="bank_name" id="title" value="<?php echo e($bank->bank_name); ?>" placeholder="<?php echo e(__('Please Enter Bank Name')); ?>"  required>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <div class="form-group">
                                                            <label for="account_number"><?php echo e(__('Account Number')); ?>:<sup class="redstar">*</sup></label>
                                                            <input type="text" class="form-control" name="account_number" id="title" value="<?php echo e($bank->account_number); ?>" placeholder="<?php echo e(__('Please Enter Account Number')); ?>"  required>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <div class="form-group">
                                                            <label for="ifcs_code"><?php echo e(__('IFSC Code')); ?>:<sup class="redstar">*</sup></label>
                                                            <input type="text" class="form-control" name="ifcs_code" id="title" value="<?php echo e($bank->ifcs_code); ?>" placeholder="<?php echo e(__('Please Enter IFSC Code')); ?>"  required>
                                                          </div>
                                                        </div>
                                                      </div>



                                                      <div class="cancel-button">
                                                      <button type="submit" class="btn btn-primary"> <?php echo e(__('Edit')); ?></button>
                                                    </div>
                                                  </form>
                                                 
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </div>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </table>
                    </div>
                  
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- profile update end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
(function($) {
  "use strict";
	tinymce.init({selector:'textarea#detail'});
})(jQuery);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/user_profile/user_bank.blade.php ENDPATH**/ ?>