<p><b><?php echo e(__('Name')); ?></b>: <?php echo e($fname); ?> <?php echo e($lname); ?></p>
<p><b><?php echo e(__('Email')); ?></b>: <?php echo e($email); ?></p>
<p><b><?php echo e(__('Mobile')); ?></b>: <?php if(isset($mobile)): ?>
    <?php echo e($mobile); ?>

    <?php endif; ?></p>
<p><b><?php echo e(__('Reg. Date')); ?></b>: <?php if(isset($created_at)): ?>
    <?php echo e(\Carbon\Carbon::parse($created_at)->format('d-M-Y')); ?>

    <?php endif; ?>
</p><?php /**PATH /var/www/html/resources/views/admin/user/detail.blade.php ENDPATH**/ ?>