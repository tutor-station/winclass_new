<?php $__env->startSection('title', 'Class'); ?>
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>



<section id="iframe-video" class="iframe-video-class">
	<div class="body">
		<div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
			<iframe src ="<?php echo e(asset('files/pdf/'.$entry->pdf)); ?>"  style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media"></iframe>
		</div>
	</div>
</section>




<!-- jquery -->
<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
<?php /**PATH /var/www/html/resources/views/pdf.blade.php ENDPATH**/ ?>