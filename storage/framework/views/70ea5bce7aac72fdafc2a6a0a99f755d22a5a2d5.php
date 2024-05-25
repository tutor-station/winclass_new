
<?php $__env->startSection('title', 'Contact us'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- about-home start -->
<?php
$gets = App\Breadcum::first();
?>

<!-- <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
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
                              <h2><?php echo e(__('Contact Us')); ?></h2>  
                          </div>
                      </div>
                  </div>
                  <div class="breadcrumb-wrap2">
                        
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                  <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Contact Us')); ?></li>
                              </ol>
                          </nav>
                      </div>
                  
              </div>
          </div>
</section> -->
<!-- breadcrumb-area-end -->
<?php if(isset($gets)): ?>
<main>
<section id="services" class="services-area pt-120 pb-90 fix">
    <div class="container">
       <div class="row">
             <div class="col-lg-12">
                <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h5><i class="fal fa-graduation-cap"></i><?php echo e(__('Keep in Touch')); ?></h5>
                    <h2>
                    <?php echo e(__('Get In Touch')); ?>

                    </h2>
                 
                </div>
               
            </div>
        </div>
        <div class="row">
             <div class="col-lg-4 col-md-4">
                 
              <div class="services-box text-center">
                  <div class="services-icon">
                       <img src="<?php echo e(url('frontcss/img/bg/contact-icon01.png')); ?>" alt="image">
                    </div>
                   <div class="services-content2">
                        <h5><a href="tel:<?php echo e($gsetting->default_phone); ?>"><?php echo e($gsetting->default_phone); ?></a></h5>   
                        <p><?php echo e(('Phone Support')); ?></p>
                    </div>
                </div>   
                 
             
            </div>
            <div class="col-lg-4 col-md-4">
                 
              <div class="services-box text-center active">
                  <div class="services-icon">
                      <img src="<?php echo e(url('frontcss/img/bg/contact-icon02.png')); ?>" alt="image">
                    </div>
                   <div class="services-content2">
                        <h5><?php echo e($gsetting->wel_email); ?></h5>   
                         <p><?php echo e(('Email Address')); ?></p>
                         
                    </div>
                </div>   
                 
             
            </div>
            <div class="col-lg-4 col-md-4">
                 
              <div class="services-box text-center">
                  <div class="services-icon">
                     <img src="<?php echo e(url('frontcss/img/bg/contact-icon03.png')); ?>" alt="image">
                    </div>
                   <div class="services-content2">
                        <h5><?php echo e($gsetting->default_address); ?></h5>   
                        <p><?php echo e(('Office Address')); ?></p>
                    </div>
                </div>   
                 
             
            </div>
            
        </div>
    </div>
</section>
<?php endif; ?>
<!-- about-home end -->

 <!-- map-area-end -->
 <div class="map fix" style="background: #f5f5f5;">
    <div class="container-flud">
        
        <div class="row">
            <div class="col-lg-12">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113879.41741798406!2d75.66909482691905!3d26.880261104252572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db4f235732fb9%3A0x3b143c1d687d7a80!2sUmmeed%20Classes!5e0!3m2!1sen!2sin!4v1706083514954!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
 <!-- map-area-end -->
  <!-- contact-area -->
  <section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix" style="background: #e7f0f8;">
                
    <div class="container">
 
        <div class="row">
            
             
            <div class="col-lg-12 order-2">
                <div class="contact-bg">
                <div class="section-title center-align text-center mb-50">
                    <h2>
                       <?php echo e(('Student Enquiry Form')); ?>

                    </h2>
                   
                </div>
                
                 
            <form  id="demo-form2" action="<?php echo e(route('contact.user')); ?>" method="post" class="contact-form mt-30 text-center" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>



                <?php if(Auth::check()): ?>

                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                <?php endif; ?>
                <div class="row">
                <div class="col-lg-4">
                    <div class="contact-field p-relative c-name mb-30">                                    
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="<?php echo e(__('Name')); ?>">

                        <i class="icon fal fa-user"></i>
                    </div>                               
                </div>
                <div class="col-lg-4">                               
                    <div class="contact-field p-relative c-subject mb-30">                                   
                        <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo e(__('E-mail')); ?>">
                        
                        <i class="icon fal fa-envelope"></i>
                    </div>
                </div>		
                <div class="col-lg-4">                               
                    <div class="contact-field p-relative c-subject mb-30">                                   
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="<?php echo e(__('Phone')); ?>">

                         <i class="icon fal fa-phone"></i>
                    </div>
                </div>	                            
                <div class="col-lg-12">
                    <div class="contact-field p-relative c-message mb-30">                                  
                        <textarea id="comment" name="message" rows="6" placeholder="<?php echo e(__('Your Message')); ?>"></textarea>
                        <?php
                        $data =  App\Contactreason::where('status', '1')->get();
                       ?>
                         <i class="icon fal fa-edit"></i>
                    </div>
                    <div class="slider-btn  text-center">                                          
                                <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s" type="submit"><?php echo e(__('Make An Request')); ?> <i class="fal fa-long-arrow-right"></i></button>				
                            </div>                             
                </div>
                </div>
            
        </form>
                
                </div>
            
            </div>
        </div>
        
    </div>
   
  </section>
 <!-- contact-area-end -->   
</main>
  <!-- main-area-end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
    
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=<?php echo e($gsetting['map_api']); ?>&libraries=places&callback=initialize";
    
    document.body.appendChild(script);
  });
  function initialize(){
    var myLatLng = {lat: <?php echo e($gsetting['map_lat']); ?>, lng: <?php echo e($gsetting['map_long']); ?>}; // Insert Your Latitude and Longitude For Footer Wiget Map
    var mapOptions = {
      center: myLatLng, 
      zoom: 15,
      disableDefaultUI: true,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]     
    }
    // For Footer Widget Map
    var map = new google.maps.Map(document.getElementById("location"), mapOptions);
    var image = 'images/icons/map.png';
    var beachMarker = new google.maps.Marker({
      position: myLatLng, 
      map: map,   
      icon: image
    });    
  }
</script>
<!-- end jquery -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/contact.blade.php ENDPATH**/ ?>