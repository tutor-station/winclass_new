<?php if($hsetting->newsletter_enable == 1): ?>
<!-- footer -->
<footer class="footer-bg footer-p pt-90" style="background-image: url('<?php echo e(asset('images/footer-bg.png')); ?>')">
    <div class="footer-top pb-70">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2><?php echo e(__('About Us')); ?></h2>
                        </div>
                        <?php
                            $data = App\About::first();
                        ?>
                        <div class="f-contact">
                            <p><?php echo e($data->one_text); ?></p>

                        </div>
                        <div class="footer-social mt-10">
                            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2><?php echo e(__('Our Links')); ?></h2>
                        </div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><a href="<?php echo e(route('about.show')); ?>"> <?php echo e(__('About')); ?></a></li>
                                <li><a href="<?php echo e(route('all.course')); ?>"><?php echo e(__('Courses')); ?></a></li>
                                <li><a href="<?php echo e(url('user_contact')); ?>"><?php echo e(__(' Contact Us')); ?></a></li>
                                <li><a href="<?php echo e(route('blog.all')); ?>"><?php echo e(__('Current Affairs')); ?> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
          


                          <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2><?php echo e(__('Our Links')); ?></h2>
                        </div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="privacy-policy.html"><?php echo e(__('Privacy Policy ')); ?></a></li>
                                <li><a href="refund-policy.php"> <?php echo e(__('Refund Policy ')); ?></a></li>
                                <li><a href="privacy-policy.html"><?php echo e(__('CANCELLATION AND REFUND ')); ?></a></li>
                                <li><a href="tnc.html"><?php echo e(__(' Terms & Conditions')); ?></a></li>
                                <li><a href="shipping.html"><?php echo e(__('Shipping & Delivery Policy')); ?> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2><?php echo e(__('Contact Us')); ?></h2>
                        </div>
                        <div class="f-contact">
                            <ul>
                                <li>
                                    <i class="icon fal fa-phone"></i>
                                    <span><a href="tel:+<?php echo e($gsetting->default_phone); ?>"><?php echo e($gsetting->default_phone); ?></a><br>                                </li>
                                <li><i class="icon fal fa-envelope"></i>
                                    <span>
                                        <a href="mailto:info@example.com"><?php echo e($gsetting->wel_email); ?></a>
                                        <br>
                                    </span>
                                </li>
                                <li>
                                    <i class="icon fal fa-map-marker-check"></i>
                                    <span><?php echo e($gsetting->default_address); ?></span>
                                </li>

                            </ul>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-6">
                            <?php
                            $languages = App\Language::get();
                            ?>
                            <?php if(isset($languages) && count($languages) > 0): ?>
                            <div class="footer-dropdown">
                                <a href="#" class="a" data-toggle="dropdown"><i
                                        data-feather="globe"></i><?php echo e(Session::has('changed_language') ? ucfirst(Session::get('changed_language')) : ''); ?><i
                                        class="fa fa-angle-up lft-10"></i></a>
                                <ul class="dropdown-menu">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('languageSwitch', $language->local)); ?>">
                                        <li><?php echo e($language->name); ?></li>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <?php
                            $currencies = DB::table('currencies')->get();
                            ?>
                            <?php if(isset($currencies) && count($currencies) > 0): ?>
                            <div class="footer-dropdown footer-dropdown-two">
                                <a href="#" class="a" data-toggle="dropdown"><i data-feather="credit-card"></i>
                                    <?php echo e(Session::has('changed_currency') ? ucfirst(Session::get('changed_currency')) : $currency->code); ?><i
                                        class="fa fa-angle-up lft-10"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo e(route('CurrencySwitch', $currency->code)); ?>"><?php echo e($currency->code); ?></a>
                                    </li>

                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2">

                </div>

            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">
                    <div class="copy-text">
                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo/'.$gsetting->footer_logo)); ?>"
                                alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-1 text-center">

                </div>
                <?php if(isset($terms->terms) && $terms->terms != NULL && $terms->terms != ''): ?>
                <div class="col-lg-4 col-md-6 text-right text-xl-right">
                    <?php echo e($gsetting->cpy_txt); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end -->
<?php endif; ?>
<?php echo $__env->make('instructormodel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="whatsapp">
         <a target="_blank" href="https://api.whatsapp.com/send?phone=919269100222&amp;text=Hi"><img src="https://www.tutorstation.in/assets/img/mu-wa.png" alt="Whatsapp"></a>
      </div>


      <style type="text/css">
          .whatsapp {
    max-height: 60px;
    max-width: 60px;
    position: fixed;
    bottom: 74px;
    left: 20px;
    z-index: 9999;
}
.whatsapp img {
    width: 100%;
    background: #fff;
    border-radius: 100%;
    box-shadow: 1px 2px 3px #aaa;
}
      </style><?php /**PATH /var/www/html/resources/views/theme2/footer.blade.php ENDPATH**/ ?>