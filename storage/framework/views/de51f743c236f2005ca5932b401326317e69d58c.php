
<?php $__env->startSection('title', 'Cart'); ?>
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
                        <h2><?php echo e(__('Shopping Cart')); ?></h2>    
                        
                    </div>
                </div>
            </div>
			<div class="breadcrumb-wrap2">
                  
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Shopping Cart')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- about-home end -->

<section id="cart-block" class="cart-main-block">
	<div class="container-xl">
		<div class="cart-items btm-30">
			<h4 class="cart-heading"><?php echo e(__('1 Courses in Cart')); ?></h4>
            <?php if($carts != NULL): ?>
			<div class="row">
				<div class="col-lg-8 col-md-9">
					<?php if(auth()->guard()->check()): ?>
	        			<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="cart-add-block">
						<div class="row">
							<div class="col-lg-2 col-sm-6 col-5">
								<div class="cart-img">
									<?php if($cart->course_id != NULL): ?>
				                    <?php if($cart->courses['preview_image'] !== NULL && $cart->courses['preview_image'] !== ''): ?>
									<a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>">
										<img src="<?php echo e(asset('images/course/'. $cart->courses->preview_image)); ?>" class="img-fluid" alt="blog">
										<?php else: ?>
										<a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>">
											<img src="<?php echo e(Avatar::create($cart->courses->title)->toBase64()); ?>" class="img-fluid" alt="blog">
										<?php endif; ?>	
										<?php endif; ?>	
									</a>
								</div>
							</div>
							<div class="col-lg-5 col-sm-6 col-6">
								<div class="cart-course-detail">
									<?php if($cart->course_id != NULL): ?>
			                    	<div class="cart-course-name">
										<a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>"><?php echo e(str_limit($cart->courses->title, $limit = 50, $end = '...')); ?></a>
									</div>
									<div class="cart-course-update"><?php echo e($cart->courses->user->fname); ?> </div>
									<?php else: ?>
									<div class="cart-course-name">
										<a href="<?php echo e(route('user.course.show',['id' => $cart->bundle->id, 'slug' => $cart->bundle->slug ])); ?>"><?php echo e(str_limit($cart->bundle->title, $limit = 50, $end = '...')); ?></a>
									</div>
									<div class="cart-course-update"><?php echo e($cart->courses->user->fname); ?> </div>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-6">
								<div class="cart-actions float-right">
									<span>
										<form id="cart-form" method="post" action="<?php echo e(url('removefromcart', $cart->id)); ?>" 
											data-parsley-validate class="form-horizontal form-label-left">
											<?php echo e(csrf_field()); ?>

											
										  <button  type="submit" class="cart-remove-btn display-inline" title="Remove From cart"><?php echo e(__('Remove')); ?></button>
										</form>
									</span>
									<span>
										<form id="wishlist-form" method="post" action="<?php echo e(url('show/wishlist', $cart->id )); ?>" data-parsley-validate class="form-horizontal form-label-left">
											<?php echo e(csrf_field()); ?>


											<input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
											<input type="hidden" name="course_id"  value="<?php echo e($cart->course_id); ?>" />

											<button class="cart-wishlisht-btn" title="Remove to wishlist" type="submit"><?php echo e(__('Remove to Wishlist')); ?></button>
										</form>
									</span>
									
								</div>
			                </div>
							<div class="col-lg-2 col-sm-6 col-6">
								<div class="row float-right">
									<div class="col-lg-10 col-10">
										<div class="cart-course-amount">
											<ul>		
												<?php if($cart->offer_price == !NULL): ?>
												<li><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($cart->offer_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) )); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></li>
												<li><s><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(   currency($cart->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></s></li>
												<?php else: ?>
												<li><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(   currency($cart->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></li>
												<?php endif; ?>							
											</ul>
										</div>
									</div>
									<div class="col-lg-2 col-2">
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                <?php endif; ?> 
				</div>
				<div class="col-lg-4 col-md-3">
					<div class="cart-total">                   
						<div class="cart-price-detail">
							<h4 class="cart-heading"><?php echo e(__('Total:')); ?></h4>
							<table class="table">
								<tbody>
									<tr>
										<td style="width: 70%;"><?php echo e(__('Total price')); ?></td>
										<td><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?> <?php echo e(price_format(  currency($price_total, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></td>
									</tr>
									<tr>
										<td style="width: 70%;"><?php echo e(__('Offer Discount')); ?></td>
										<td class="wishlist-out-stock"><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?> <?php echo e(price_format(  currency($price_total - $offer_total, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></td>
									</tr>
									<tr>
										<td style="width: 70%;"><?php echo e(__('Coupon Discount')); ?></td>
										<?php if( $cpn_discount == !NULL): ?>
										<td class="wishlist-out-stock"><span class="categories-count"><a href="#" data-toggle="modal" data-target="#myModalCoupon" title="report"><?php echo e(__('ApplyCoupon')); ?></a><?php echo e(currency($cpn_discount, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true)); ?></span>
										<?php else: ?>
										<td class="wishlist-out-stock"><span class="categories-count"><a href="#" data-toggle="modal" data-target="#myModalCoupon" title="report"><?php echo e(__('ApplyCoupon')); ?></a>
										</td>
										<?php endif; ?>
									</tr>
									<tr>
										<td style="width: 70%;"><?php echo e(__('Discount Percent')); ?></td>
										<td class="wishlist-stock"><?php echo e(round($offer_percent, 0)); ?>% <?php echo e(__('off')); ?></td>
									</tr>
								</tbody>
							</table>
							<table class="table total-amount-table">
								<tbody>
								<tr>
									<td style="width: 65%;"><?php echo e(__('Total:')); ?></td>
									<td><span class="categories-count"> <?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?> <?php echo e(price_format( currency($cart_total, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></span></td>
								</tr>
								</tbody>
							</table>
							<?php if(auth()->guard()->check()): ?>
							<div class="coupon-apply mb-4">
								<form id="cart-form" method="post" action="<?php echo e(url('apply/coupon')); ?>" data-parsley-validate class="form-horizontal form-label-left" >
                                    <?php echo e(csrf_field()); ?>

									<div class="row g-0">
										<div class="col-lg-9 col-9">
											<input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>">
											<input type="text" name="coupon" value="" placeholder="Enter Coupon">
										</div>
										<div class="col-lg-3 col-3">
											<button data-purpose="coupon-submit" type="submit" class="btn btn-primary"><span><?php echo e(__('Apply')); ?></span></button>
										</div>
									</div>
								</form>
							</div>
							<?php endif; ?>
							<?php if(Session::has('fail')): ?>
									<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<?php echo e(Session::get('fail')); ?>

									</div>
								<?php endif; ?>
								<?php if(Session::has('coupanapplied')): ?>
									<form id="demo-form2" method="post" action="<?php echo e(route('remove.coupon', Session::get('coupanapplied')['cpnid'])); ?>">
										<?php echo e(csrf_field()); ?>

											
										<div class="remove-coupon">
										<button type="submit" class="btn btn-primary" title="Remove Coupon"><i class="fa fa-times icon-4x" aria-hidden="true"></i></button>
										</div>
									</form>
									<div class="coupon-code">   
										<?php echo e(Session::get('coupanapplied')['msg']); ?>

									</div>
								<?php endif; ?>
							<div class="course-rate">			                        
								
									<div class="checkout-btn">

			                        	<?php if(round($cart_total) == 0): ?>

			                        		<a href="<?php echo e(url('free/enroll',$cart_total)); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('Enroll Now')); ?></a>


			                     		<?php else: ?>


				                     		<?php if(auth::check()): ?>

				                        		<form id="cart-form" action="<?php echo e(url('gotocheckout')); ?>" data-parsley-validate class="form-horizontal form-label-left">
				                           
				    	                        <?php echo csrf_field(); ?>
												<?php
													session()->put('price_total',$price_total);
													session()->put('offer_total',$offer_total);
													session()->put('offer_percent',$offer_percent);
													session()->put('cart_total',$cart_total);
												?>
				    	                      
				    	                      
							                    
				    	                        
				    	                      <button class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('Checkout')); ?></button>
				    	                    </form>
				    	                    <?php else: ?>
				                        		
				                        		<a href="<?php echo e(url('guest/register')); ?>" class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('Checkout')); ?></a>
				                        	<?php endif; ?>



			                     		<?php endif; ?>

			                        	
			    	                    
			                    	</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php else: ?>
			<div class="cart-no-result">
				<i class="fa fa-shopping-cart"></i>
				<div class="no-result-courses btm-10"><?php echo e(__('cart empty')); ?></div>
				<div class="recommendation-btn text-white text-center">
					<a href="<?php echo e(url('/')); ?>" class="btn btn-primary" title="Keep Shopping"><b><?php echo e(__('Keep Shopping')); ?></b></a>
				</div> 
			</div>
		<?php endif; ?>
		</div>
	</div>

	<!--Model start-->
	<?php if(auth()->guard()->check()): ?>	
	<div class="modal fade" id="myModalCoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog modal-md" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Coupon Code')); ?></h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	        </div>
	        <div class="box box-primary">
	          <div class="panel panel-sum">
	            <div class="modal-body">
	            	<div class="coupon-apply">
						<form id="cart-form" method="post" action="<?php echo e(url('apply/coupon')); ?>" data-parsley-validate class="form-horizontal form-label-left">
							<?php echo e(csrf_field()); ?>

	                        
		                	<div class="row no-gutters">
		                		<div class="col-lg-9 col-9">
		                			<input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>">
	                    			<input type="text" name="coupon" value="" placeholder="Enter Coupon">
	                    		</div>
	                    		<div class="col-lg-3 col-3">
	                    			<button data-purpose="coupon-submit" type="submit" class="btn btn-primary"><span><?php echo e(__('Apply')); ?></span></button>
	                    		</div>
	                    	</div>
	                    </form>
	                </div>
					
	                <hr>
					<?php if($item != NULL): ?>
	                <div class="available-coupon">
	                	<?php
	                		$cpns = App\Coupon::get();
	                		$mytime = Carbon\Carbon::now();
	                	?>

	                	<?php $__currentLoopData = $cpns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cpn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                		<?php if($cpn->expirydate >= $mytime && $cpn->show_to_users == 1): ?>
	                		<ul>
	                			<li><?php echo e($cpn->code); ?></li>
	                		</ul>
	                		<?php endif; ?>
	                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                	
	                </div>
	                <?php endif; ?>
	             </div>
	                

	            </div>
	          </div>
	        </div>
	      </div>
	    </div> 
	</div>
	<?php endif; ?>
	<!--Model close -->
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/cart.blade.php ENDPATH**/ ?>