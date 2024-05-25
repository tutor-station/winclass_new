
<?php $__env->startSection('title', "Blog.Details"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('meta_tags'); ?>
<?php
    $url =  URL::current();
?>
<?php $__env->stopSection(); ?>
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
                        <h2><?php echo e(__('Current Affairs')); ?></h2>    
                        
                    </div>
                </div>
            </div>
            <div class="breadcrumb-wrap2">
                  
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Current Affairs')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end --> 
 <!-- inner-blog -->
 <section class="inner-blog b-details-p pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <div class="details__content pb-30">
                        <h2><?php echo e($blog->heading); ?></h2>   
                        <div class="meta-info">
                            <ul>
                                <li><i class="fal fa-calendar-alt"></i>   <?php echo e(date('d-m-Y',strtotime($blog['created_at']))); ?></li>
                            </ul>
                        </div>
                        <p><?php echo $blog->detail; ?></p>
                        <div class="details__content-img">
                            <img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" alt="">
                        </div>
                        <figure>
                        </figure>
                    </div>
                    <div class="related__post mt-45 mb-85">
                        <div class="post-title">
                            <h4><?php echo e(__('Related Post')); ?></h4>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                                <div class="related-post-wrap mb-30">
                                    <div class="post-thumb">
                                        <img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" alt="">
                                    </div>
                                    <div class="rp__content">
                                        <?php
                                        $image = $blog['image'];
                                        $slug = $blog->slug;
                                        $headingSlug = str_slug(str_replace('-','&',$blog->heading));
                                        $detailRoute = $slug != NULL ? route('blog.detail', ['id' => $blog->id, 'slug' => $slug]) : route('blog.detail', ['id' => $blog->id, 'slug' => $headingSlug]);
                                        $imageSrc = $image ? asset('images/blog/'.$image) : Avatar::create($blog->heading)->toBase64();
                                        ?>
                                        <h3><a class="truncate" href="<?php echo e($detailRoute); ?>"><?php echo e($blog->heading); ?></a></h3>
                                        <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($blog->detail))) , $limit = 100, $end = '...')); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </div>
                    </div>
                </div>
            </div>
             <!-- #right side -->
            <div class="col-sm-12 col-md-12 col-lg-4">
                <aside class="sidebar-widget">
                  
                    <section id="recent-posts-4" class="widget widget_recent_entries">
                     <h2 class="widget-title"><?php echo e(__('Recent Posts')); ?></h2>
                     <ul>
                     <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                     $image = $b['image'];
                     $slug = $b->slug;
                     $headingSlug = str_slug(str_replace('-','&',$b->heading));
                     $detailRoute = $slug != NULL ? route('blog.detail', ['id' => $b->id, 'slug' => $slug]) : route('blog.detail', ['id' => $b->id, 'slug' => $headingSlug]);
                     $imageSrc = $image ? asset('images/blog/'.$image) : Avatar::create($b->heading)->toBase64();
                     ?>
                        <li>
                            <div class="sidebar-blog-img">
                                <img src="<?php echo e(asset('images/blog/'.$b->image)); ?>" class="img-fluid"  alt="<?php echo e(__('blog')); ?>">
                            </div>
                            <div class="sidebar-blog-text">
                                <a href="<?php echo e($detailRoute); ?>"><?php echo e($b->heading); ?></a>
                                <span class="post-date"><?php echo e(date('d-m-Y',strtotime($b['created_at']))); ?></span>
                            </div>
                        </li>
                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  </section>
               </aside>
            </div>
            <!-- #right side end -->
        </div>
    </div>
</section>
<!-- inner-blog-end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/blog/blog_detail.blade.php ENDPATH**/ ?>