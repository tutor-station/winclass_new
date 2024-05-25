
<?php $__env->startSection('title','Followers & Followings'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Followers & Followings';
$data['title'] = 'Followers & Followings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
       <div class="col-md-12">
      <div class="card dashboard-card m-b-30">
          <div class="card-header all-user-card-header">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" title="<?php echo e(__('Followers')); ?>"><?php echo e(__('Followers')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" title="<?php echo e(__('Followings')); ?>"><?php echo e(__('Followings')); ?></a>
                </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <?php echo $__env->make('admin.follower.follower', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <?php echo $__env->make('admin.follower.following', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              
          </div>
          
      </div>
  </div>
       </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/follower/show.blade.php ENDPATH**/ ?>