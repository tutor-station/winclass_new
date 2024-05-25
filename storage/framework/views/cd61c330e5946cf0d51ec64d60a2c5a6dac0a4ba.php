
<?php $__env->startSection('title', 'Purchase History'); ?>
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
                        <h2><?php echo e(__('Purchase History')); ?></h2>    
                        
                    </div>
                </div>
            </div>
			<div class="breadcrumb-wrap2">
                  
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Purchase History')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- about-home start -->

<!-- about-home end -->

<section id="purchase-block" class="purchase-main-block">
	<div class="container-xl">
		<div class="purchase-table table-responsive">
	        <table class="table">
			  <thead>
			    <tr>
	                <th class="purchase-history-heading"><?php echo e(__('Purchase History')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Enroll on')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Enroll End')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Payment Mode')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Total Price')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Payment Status')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Actions')); ?></th>
				    
			    </tr>
			  </thead>
				
				<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
		            <div class="purchase-history-table">
		            	<tbody>
			            	<tr>
			            		
				    			<td >
									<?php if(isset($order->bundle->id)): ?>
				                    <div class="purchase-history-course-img">
				                    	<?php if($order->course_id != NULL): ?>
					                    	<?php if($order->courses['preview_image'] !== NULL && $order->courses['preview_image'] !== ''): ?>
					                        	<a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'. $order->courses->preview_image)); ?>" class="img-fluid" alt="course"></a>
					                        <?php else: ?>
					                        	<a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($order->courses->title)->toBase64()); ?>" class="img-fluid" alt="<?php echo e(__('course')); ?>"></a>
					                        <?php endif; ?>
				                        <?php else: ?>
				                        	<?php if($order->bundle['preview_image'] !== NULL && $order->bundle['preview_image'] !== ''): ?>
					                        	<a href="<?php echo e(route('bundle.detail', $order->bundle->id)); ?>"><img src="<?php echo e(asset('images/bundle/'. $order->bundle->preview_image)); ?>" class="img-fluid" alt="course"></a>
					                        <?php else: ?>
					                        	<a href="<?php echo e(route('bundle.detail', $order->bundle->id)); ?>"><img src="<?php echo e(Avatar::create($order->bundle->title)->toBase64()); ?>" class="img-fluid" alt="course"></a>
					                        <?php endif; ?>
					                    <?php endif; ?>

				                    </div>
				                    <div class="purchase-history-course-title">
				                    	<?php if($order->course_id != NULL): ?>
				                        <a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><?php echo e($order->courses->title); ?></a>
				                        <?php else: ?>
				                        <a href="<?php echo e(route('bundle.detail', $order->bundle->id)); ?>"><?php echo e($order->bundle->title); ?></a>
				                        <?php endif; ?>
				                    </div>
									<?php endif; ?>
				                </td>




				                <td>
				                   	<div class="purchase-text"><?php echo e(date('jS F Y', strtotime($order->created_at))); ?></div>			                   	
				                </td>

				                <td>
				                	<div class="purchase-text">
				                		<?php if($order->course_id != NULL): ?>
				                		<?php if($order->enroll_expire != NULL): ?>
				                            <?php echo e(date('jS F Y', strtotime($order->enroll_expire))); ?>

				                        <?php else: ?>
				                            -
				                        <?php endif; ?>
				                        <?php endif; ?>
				                	</div>
				                </td>

				                <td>   
				                    <div class="purchase-text"><?php echo e($order->payment_method); ?></div>
				                </td>

				              
				                
				                <td>

				                	<?php
				                	$contains = Illuminate\Support\Str::contains($order->currency_icon, 'fa');
				                	?>


				                	<?php if($order->coupon_discount == !NULL): ?>
				                		
				                    	<div class="purchase-text">
				                    		<b>
				                    		<?php if($contains): ?>
				                    		<i class="fa <?php echo e($order->currency_icon); ?>"></i> <?php echo e($order->total_amount - $order->coupon_discount); ?>

				                    		<?php else: ?>
				                    		<?php echo e($order->currency_icon); ?> <?php echo e($order->total_amount - $order->coupon_discount); ?>

				                    		<?php endif; ?>

				                    		
				                    		</b>
				                    		
				                    	</div>
				                    	
				                    <?php else: ?>
				                    	
				                    	<div class="purchase-text"><b>
				                    		<?php if($contains): ?>
				                    		<i class="fa <?php echo e($order->currency_icon); ?>"></i> <?php echo e($order->total_amount); ?>

				                    		<?php else: ?> 
				                    		<?php echo e($order->currency_icon); ?> <?php echo e($order->total_amount); ?>

				                    		<?php endif; ?>

				                    		
				                    	</b>
				                    	
				                    </div>
				                    	
				                    <?php endif; ?>

				                </td>

				                <td>
				                	<div class="purchase-text">
				                		<?php 
                                            if($order['payment_status']=='P') 
                                            {
                                                echo "<span class='btn btn-xs btn-warning' style='background-color:orange; border-color:orange'> PENDING</span>";
                                            }
                                            else if($order['payment_status']=='S') 
                                            {
                                                echo "<span class='btn btn-xs btn-success' style='background-color:green; border-color:green'> SUCCESS</span>";
                                            }
                                            else if($order['payment_status']=='F') 
                                            {
                                                echo "<span class='btn btn-xs btn-danger' style='background-color:red; border-color:red'> FAILED</span>";
                                            }

                                            ?> 
				                	</div>
				                </td>
				               
				                <td>
				                    <div class="invoice-btn">
				                    	
				                    	<a href="<?php echo e(route('invoice.show',$order->id)); ?>"  class="btn btn-secondary"><?php echo e(__('Invoice')); ?></a>
				                    	
				                    </div>

			                    	<?php if($order->subscription_status == 'active' && $order->payment_method !== 'Admin Enroll'): ?>
                                        <div class="unsubscribe-btn">
                                            <form id="unsubscribeForm" action="<?php echo e(route('stripe.cancelsubscription')); ?>"
                                                method="POST" accept-charset="UTF-8">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" value="<?php echo e($order->id); ?>" name="order_id">
                                                <a onclick="document.getElementById('unsubscribeForm').submit()"
                                                    class="btn btn-secondary"><?php echo e(__('UnSubscribe')); ?></a>
                                            </form>
                                        </div>
                                    <?php endif; ?>

				                    <?php
                                        $order_id = Crypt::encrypt($order->id);


                                    	$cor = $order->course_id;

                                    	$course = App\Course::where('id', $cor)->first();

                                    	$ref = App\RefundPolicy::where('id', optional($course)->refund_policy_id)->first();

                                    	$days = isset($ref['days']);

                                     	$orderDate = $order['created_at'];
                                    
                                     	$startDate = date("Y-m-d", strtotime("$orderDate +$days days"));

                                     	$mytime = Carbon\Carbon::now();


                                    ?>

                                 <?php

                                 $requested = App\RefundCourse::where('user_id', Auth::User()->id)->where('course_id', $order->course_id)->first();


                                 ?>

                                   
                                <?php if($requested == NULL): ?>
                                    <?php if($order->id): ?> 
							            <?php if($order->status == 1 ): ?>
						                    <?php if($startDate >= $mytime): ?>

						                    <div class="invoice-btn">
				                    	
						                    	<a href="<?php echo e(route('refund.proceed',$order_id)); ?>"  class="btn btn-secondary"><?php echo e(__('Refund')); ?></a>
						                    	
						                    </div>
						                        
						                    <?php endif; ?>
							            <?php endif; ?>
							        <?php endif; ?>

							    <?php endif; ?>
				                    

				                </td>
				                
				               
				            </tr>
				        </tbody>
		            </div>
	            
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </table>
        </div>
	</div>
</section>


<section id="purchase-block" class="purchase-main-block">
	<div class="container-xl">
		<div class="purchase-table table-responsive">
	        <table class="table">
			  <thead>
			    <tr>
	                <th class="purchase-history-heading"><?php echo e(__('Refunds')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Date')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Amount')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Payment Mode')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Payment Status')); ?></th>
				    <th class="purchase-text"><?php echo e(__('Actions')); ?></th>
				    
			    </tr>
			  </thead>


			  	<?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
			
				
		        <div class="purchase-history-table">
		            <tbody>
			            <tr>
				    		<td>
				                <div class="purchase-history-course-img">
				                	<?php if($refund->courses['preview_image'] !== NULL && $refund->courses['preview_image'] !== ''): ?>
			                        	<a href="<?php echo e(route('user.course.show',['id' => $refund->courses->id, 'slug' => $refund->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'. $refund->courses->preview_image)); ?>" class="img-fluid" alt="course"></a>
			                        <?php else: ?>
			                        	<a href="<?php echo e(route('user.course.show',['id' => $refund->courses->id, 'slug' => $refund->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($refund->courses->title)->toBase64()); ?>" class="img-fluid" alt="course"></a>
			                        <?php endif; ?>
				                </div>
				                <div class="purchase-history-course-title">
			                        <a href="<?php echo e(route('user.course.show',['id' => $refund->courses->id, 'slug' => $refund->courses->slug ])); ?>"><?php echo e($refund->courses->title); ?></a>
			                    </div>
				            </td>
				            <td>
			                   	<div class="purchase-text"><?php echo e(date('jS F Y', strtotime($refund->updated_at))); ?></div>			                   	
			                </td>
			                <td>
			                	<?php if($gsetting['currency_swipe'] == 1): ?>
			                    	<div class="purchase-text"><i class="fa <?php echo e($refund->currency_icon); ?>"></i><?php echo e($refund->total_amount); ?></div>
			                    <?php else: ?>
			                    	<div class="purchase-text"><?php echo e($refund->total_amount); ?><i class="fa <?php echo e($refund->currency_icon); ?>"></i></div>
			                    <?php endif; ?>
			                </td>
			                <td>   
			                    <div class="purchase-text"><?php echo e($refund->payment_method); ?></div>
			                </td>
			                <td>   
			                    <div class="purchase-text">
			                    	<?php if($refund->status ==1): ?>
				                    <?php echo e(__('Refunded')); ?>

				                    <?php else: ?>
				                    <?php echo e(__('Pending')); ?>

				                    <?php endif; ?>
					            </div>
			                </td>
			                <td>
			                    <div class="invoice-btn">
			                    	
			                    	<a href="<?php echo e(route('invoice.show',$refund->id)); ?>"  class="btn btn-secondary"><?php echo e(__('Invoice')); ?></a>
			                    	
			                    </div>
			                </td>
				        </tr>
				    </tbody>
				</div>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/purchase_history/purchase.blade.php ENDPATH**/ ?>