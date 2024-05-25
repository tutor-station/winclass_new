<!-- <div class="contentbar">  -->
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header all-user-card-header">
                    <h5 class="box-title"><?php echo e(__('All Followers')); ?></h5>
                </div>
                <div class="card-body">
                
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('User')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo e($follower->user->fname); ?></td>
                                    <td><?php echo e($follower->user->email); ?></td>
                                   

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> --><?php /**PATH /var/www/html/resources/views/admin/follower/follower.blade.php ENDPATH**/ ?>