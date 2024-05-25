
<?php $__env->startSection('title', 'About Us'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

       <main>
        
          <!-- breadcrumb-area -->
        <?php
        $gets = App\Breadcum::first();
        ?>
        <?php if($about['one_enable'] == 1): ?>
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
                                <h2 class="about-home-one-heading text-center"><?php echo e($about->one_heading); ?></h2>    
                                   
                               </div>
                           </div>
                       </div>
                       <div class="breadcrumb-wrap2">
                             
                               <nav aria-label="breadcrumb">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                       <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('About Us')); ?></li>
                                   </ol>
                               </nav>
                           </div>
                       
                   </div>
               </div>
           </section>
           <?php endif; ?>
           <!-- breadcrumb-area-end -->
             <!-- about-area -->
           <?php if($about['two_enable'] == 1): ?>
           <section class="about-area about-page about-p pt-120 pb-120 p-relative fix">
               <div class="animations-02"><img src="<?php echo e(url('frontcss/img/bg/an-img-02.png')); ?>" alt="contact-bg-an-01"></div>
               <div class="container">
                   <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                           <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                               <img src="<?php echo e(asset('images/about/'.$about->two_imageone)); ?>" alt="img"> 
                           </div>
                         
                       </div>
                       
                   <div class="col-lg-6 col-md-12 col-sm-12">
                           <div class="about-content s-about-content pl-15 wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                               <div class="about-title second-title pb-25">  
                                   <h5><i class="fal fa-graduation-cap"></i> <?php echo e($gsetting->project_title); ?></h5>
                                   <h2><?php echo e($about->two_heading); ?></h2>                                   
                               </div>
                                  <p class="txt-clr"><?php echo e($about->one_text); ?></p>
                                   <p><?php echo e($about->two_txtone); ?></p>
                                    <div class="about-content2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="green2"> 
                                                    <?php
                                                    $feature = App\About::first();
                                                    ?>   
                                                    <li><div class="abcontent"><div class="ano"><span>1</span></div> <div class="text"><h3><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_countone))) , $limit = 12, $end = '...')); ?></h3> <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_txtone))) , $limit = 50, $end = '...')); ?></p></div></div></li>
                                                    <li><div class="abcontent"><div class="ano"><span>2</span></div> <div class="text"><h3><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_counttwo))) , $limit = 12, $end = '...')); ?></h3> <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_txttwo))) , $limit = 50, $end = '...')); ?></p></div></div></li>
                                                    <li><div class="abcontent"><div class="ano"><span>3</span></div> <div class="text"><h3><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_countthree))) , $limit = 12, $end = '...')); ?></h3> <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_txtthree))) , $limit = 50, $end = '...')); ?></p></div></div></li>
                                                    <li><div class="abcontent"><div class="ano"><span>4</span></div> <div class="text"><h3><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_countfour))) , $limit = 12, $end = '...')); ?></h3> <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($about->three_txtfour))) , $limit = 50, $end = '...')); ?></p></div></div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                
                           </div>
                       </div>
                    
                   </div>
               </div>
           </section>
           <?php endif; ?>

           <!-- about-area-end -->

        <!-- cta-area -->
        <?php if($about['three_enable'] == 1): ?>
        <section class="cta-area cta-bg pt-50 pb-50" style="background-image: url('<?php echo e(asset('images/about/cta_bg02.png')); ?>')">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title cta-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                            <h2><?php echo e($about->five_heading); ?></h2>
                            <p><?php echo e(str_limit($about->six_deatilone, $limit = 100, $end = '...')); ?></p>
                        </div>
                                        
                    </div>
                    <div class="col-lg-4 text-right"> 
                        <div class="cta-btn s-cta-btn wow fadeInRight animated mt-30" data-animation="fadeInDown animated" data-delay=".2s">
                                <div class="btn ss-btn smoth-scroll"><?php echo e(__('Financial Aid')); ?></div>
                            </div>
                    </div>
                
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!-- cta-area-end -->

          <!-- frequently-area -->
          <?php if($about['four_enable'] == 1): ?>
           <section class="faq-area pt-120 pb-120 p-relative fix">
               <div class="animations-10"><img src="<?php echo e(url('frontcss/img/bg/an-img-04.png')); ?>"></div>
               <div class="animations-08"><img src="<?php echo e(url('frontcss/img/bg/an-img-05.png')); ?>"></div>
               <div class="container">  
                   <div class="row justify-content-center  align-items-center">
                       <div class="col-lg-7">
                           <div class="section-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                               <h2><?php echo e($about->three_heading); ?></h2>
                               <p><?php echo e(str_limit($about->six_deatiltwo, $limit = 100, $end = '...')); ?></p>
                           </div>
                           <?php
                           $faqs = App\FaqStudent::get();
                           ?>
                            <?php if(isset($faqs)): ?>
                              <div class="faq-wrap mt-30 pr-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion" id="accordionExample">
                                
                                   <div class="card">
                                       <div class="card-header" id="heading<?php echo e($faq->id); ?>">
                                           <h2 class="mb-0">
                                                <button class="faq-btn  <?php echo e($index == 0 ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?php echo e($faq->id); ?>" aria-expanded="<?php echo e($index == 0 ? 'true' : 'false'); ?>" aria-controls="collapse">
                                                <?php echo e($faq->title); ?>

                                                </button>
                                           </h2>
                                       </div>
                                       <div id="collapse<?php echo e($faq->id); ?>" class="accordion-collapse collapse <?php echo e($index == 0 ? 'show' : ''); ?>" >
                                            <div class="card-body">
                                                <?php echo e(substr(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($faq->details))), 0, 100)); ?>

                                            </div>
                                        </div>
                                   </div>     
                                </div>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                           <?php endif; ?>
                       </div>
                       <div class="col-lg-5">
                           <div class="contact-bg02">
                           <div class="section-title wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                               <h2>
                                <?php echo e(__(' Make An Contact')); ?>

                               </h2>
                             
                           </div>
                               
                       <form action="<?php echo e(route('contact.user')); ?>" method="post" class="contact-form mt-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                           <?php echo csrf_field(); ?>
                        <div class="row">
                           <div class="col-lg-12">
                               <div class="contact-field p-relative c-name mb-20">                                    
                                   <input type="text" id="firstn" name="fname" placeholder="First Name" required>
                               </div>                               
                           </div>
                           
                           <div class="col-lg-12">                               
                               <div class="contact-field p-relative c-subject mb-20">                                   
                                   <input type="text" id="email" name="email" placeholder="Email" required>
                               </div>
                           </div>		
                           <div class="col-lg-12">                               
                               <div class="contact-field p-relative c-subject mb-20">                                   
                                   <input type="text" id="phone" name="mobile" placeholder="Phone No." required>
                               </div>
                           </div>	
                         
                           <div class="col-lg-12">
                               <div class="contact-field p-relative c-message mb-30">                                  
                                   <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                               </div>
                               <div class="slider-btn">                                          
                                           <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span><?php echo e(__('Submit Now')); ?></span> <i class="fal fa-long-arrow-right"></i></button>				
                                       </div>                             
                           </div>
                           </div>
                       
                   </form>
                           
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           <?php endif; ?>
           <!-- frequently-area-end -->	

          <!-- steps-area -->
           <?php if($about['five_enable'] == 1): ?>
           <section class="steps-area2 p-relative fix">
               <div class="animations-02"><img src="<?php echo e(url('frontcss/img/bg/an-img-10.png')); ?>" alt="an-img-01"></div>
               <div class="container">
         
                   <div class="row align-items-center">
                       <div class="col-lg-6 col-md-12">
                           <div class="step-box step-box2 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                               <div class="dnumber">
                                   <div class="date-box"><img src="<?php echo e(url('frontcss/img/icon/fea-icon01.png')); ?>" alt="icon"></div>
                               </div>
                               <div class="text">
                                   <h2><?php echo e($about->two_heading); ?></h2>
                                   <p><?php echo e($about->three_text); ?></p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-12">
                           <div class="step-img2 wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                               <img src="<?php echo e(url('frontcss/img/bg/steps-img-2.png')); ?>" alt="class image">
                           </div>
                          
                       </div>
                       
                      
                       
                   </div>
                   
               </div>
           </section>
           <?php endif; ?>
           <!-- steps-area-end -->
            <!-- steps-area -->
           <section class="steps-area2 p-relative fix">              
               <div class="container">
                   <div class="animations-08"><img src="<?php echo e(url('frontcss/img/bg/an-img-20.png')); ?>" alt="contact-bg-an-01"></div>
                   <div class="row align-items-center">                       
                       <div class="col-lg-6 col-md-12">
                           <div class="step-img3 wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                               <img src="<?php echo e(asset('images/about/'.$about->five_imageone)); ?>" alt="class image">
                           </div>
                          
                       </div>
                        <div class="col-lg-6 col-md-12">
                           <div class="step-box step-box3 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                               <div class="dnumber">
                                   <div class="date-box" style="border-radius: 20px; background-color:white; width: 200px;">
                                    <img src="<?php echo e(url('images/logo/footer_logo-1.png')); ?>" style="width:140px;height:70px;" alt="icon">
                                    </div>
                               </div>

                               

                               <div class="text">
                                   <h2><?php echo e($about->six_heading); ?></h2>
                                   <p><?php echo e(str_limit($about->six_deatilthree, $limit = 100, $end = '...')); ?></p>
                               </div>
                           </div>
                       </div>
                      
                       
                   </div>
                   
               </div>
           </section>
           <!-- steps-area-end -->

           <!-- testimonial-area -->
           <section class="testimonial-area pt-120 pb-115 p-relative fix">
                <div class="animations-01"><img src="<?php echo e(url('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01"></div>
               <div class="animations-02"><img src="<?php echo e(url('frontcss/img/bg/an-img-04.png')); ?>" alt="contact-bg-an-01"></div>
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12">
                           <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                               <h5><i class="fal fa-graduation-cap"></i> &nbsp;<?php echo e(__('About Us')); ?> </h5>
                              
                            
                           </div>
                          
                       </div>
                       
                       <div id="about">
        <h1>About Ummeed Class</h1>
        <p>Welcome to Ummeed Class, your trusted partner in your journey towards success in competitive exams! Situated in the vibrant city of Jaipur, Rajasthan, Ummeed Class is dedicated to providing top-notch online education to aspirants across the country.</p>
        <p>At Ummeed Class, we understand the challenges faced by students in preparing for competitive exams. That's why we've crafted a comprehensive e-learning platform designed to cater to your learning needs effectively. Whether you're preparing for banking exams, SSC, railways, or any other competitive exam, we've got you covered.</p>
        <h2>Our Vision</h2>
        <p>Our vision at Ummeed Class is to empower students with the knowledge and skills necessary to excel in competitive exams. We strive to be the preferred choice for aspirants seeking quality education and guidance, irrespective of their geographical location.</p>
        <h2>Our Mission</h2>
        <p>Our mission is to revolutionize the way students prepare for competitive exams by leveraging the power of technology and innovation. Through our engaging online classes, personalized guidance, and comprehensive study materials, we aim to make learning accessible, effective, and enjoyable for every student.</p>
        <h2>Meet Our Founder: Poonam Sha</h2>
        <p>Poonam Sha, affectionately known as "Sha Ma'am," is the driving force behind Ummeed Class. With years of experience in the education sector and a passion for teaching, Poonam Sha has been instrumental in shaping the success stories of countless students. Her dedication, expertise, and unwavering commitment to student welfare make her a beloved figure among aspirants.</p>
        <h2>Why Choose Ummeed Class?</h2>
        <ul>
            <li>Expert Faculty: Our team of experienced educators comprises subject matter experts who are committed to helping you achieve your goals.</li>
            <li>Comprehensive Curriculum: We offer a well-structured curriculum covering all topics and concepts essential for competitive exams.</li>
            <li>Interactive Learning: Our live interactive classes and engaging study materials ensure an immersive learning experience.</li>
            <li>Personalized Attention: We understand that every student is unique. That's why we provide personalized guidance and support to address individual learning needs.</li>
            <li>Tech-Savvy Approach: Leveraging the latest technology and teaching methodologies, we deliver high-quality education anytime, anywhere.</li>
        </ul>
        <p>Join Ummeed Class today and embark on your journey towards success with confidence!</p>
    </div>
                       </div>
                   </div>
               </div>
           </section>
           <!-- testimonial-area-end -->
           
       </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/about.blade.php ENDPATH**/ ?>