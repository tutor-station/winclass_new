<?php $__env->startComponent('mail::message'); ?>
# Order Confirmed
Hi <?php echo e($order->user->fname); ?> !!
<br>
You are successfully enrolled in a course.
<br>
You can see invoice below.



<?php $__env->startComponent('mail::button', ['url' => route('invoice.show', $order_id)]); ?>
Invoice
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/html/resources/views/email/orderslip.blade.php ENDPATH**/ ?>