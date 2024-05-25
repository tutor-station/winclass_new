<?php $__env->startSection('title', 'Order Confirmation'); ?>
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end head -->
<!-- body start-->
<body>



<section id="purchase-block" class="purchase-main-block">
	<div class="container-xl">
		<div class="panel-body">
	        <div class="row">
	          <div class="col-lg-12">
	            <div class="page-header confiramtion-border">

	              <?php
	                  $setting = App\setting::first();
	              ?>
	              <div class="confiramtion-logo">
	                <?php if($setting['logo_type'] == 'L'): ?>
	                    <img src="<?php echo e(asset('images/logo/'.$setting['logo'])); ?>" class="img-fluid" alt="logo">
	                <?php else: ?>
	                    <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($setting['project_title']); ?></div></b></a>
	                <?php endif; ?>
	              </div>
	              <br>
	              <hr>

	              <h2 class="btm-40 text-center"><?php echo e(__('Thank You for order')); ?></h2>

	              <div class="confirmation-block btm-30">

	              	<i class="far fa-check-circle"></i>

	              	<h4 class="confirmation-title text-center"><?php echo e(__('Order Confirmation')); ?></h4>

					

	              	
	              </div>


	              <div class="text-center">


	              	<body onload="countdown();"> 
					    <div style=" 
					                        border: none; font-size: 16px; 
					                        font-weight: bold; color: black; background: transparent;"> 
					        <?php echo e(__('Please wait for')); ?>

					        <div class="display-none">
					        <input id="minutes" type="text" >
					            <font size="5"> : </font> 
					        </div>
					        <input id="seconds" type="text" style="width: 14px; 
					                        border: none; font-size: 16px; 
					                        font-weight: bold; color: black; background: transparent;"> 

					        <?php echo e(__('seconds to be redirected to your course page')); ?>

					    </div> 
					</body> 
				</div>
	              
	            </div>
	          </div>
	          <!-- /.col -->
	        </div>
	    </div>
	</div>
</section>




<?php $__env->startSection('custom-script'); ?>



<script> 
  //set minutes 
  var mins = 1; 

  

  //calculate the seconds 
  var secs = mins * 5; 

  //countdown function is evoked when page is loaded 
  function countdown() { 
      setTimeout('Decrement()', 60); 
  } 

  //Decrement function decrement the value. 
  function Decrement() { 
  if (document.getElementById) { 
      minutes = document.getElementById("minutes"); 
      seconds = document.getElementById("seconds"); 

      //if less than a minute remaining 
      //Display only seconds value. 
      if (seconds < 59) { 
          seconds.value = secs; 
      } 

      //Display both minutes and seconds 
      //get minutes and get seconds is used to 
      //get minutes and seconds 
      else { 
          minutes.value = getminutes(); 
          seconds.value = getseconds(); 
      } 
      //if seconds becomes zero, 
      //then page alert time up 
      if (mins < 0) { 
          //alert('time up'); 
          //$('#question-form').hide();
          window.location.href='<?php echo e(url('gotomycourse')); ?>';

          minutes.value = 0; 
          seconds.value = 0; 

          
      } 
      //if seconds > 0 then seconds is decremented 
      else { 
          secs--; 
          setTimeout('Decrement()', 1000); 
      } 
    } 
  } 

  function getminutes() { 
      //minutes is seconds divided by 60, rounded down 
      mins = Math.floor(secs / 60); 
      return mins; 
  } 

  function getseconds() { 
      //take minutes remaining (as seconds) away  
      //from total seconds remaining 
      return secs - Math.round(mins * 60); 
  } 
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
<?php /**PATH /var/www/html/resources/views/front/purchase_history/confirmation.blade.php ENDPATH**/ ?>