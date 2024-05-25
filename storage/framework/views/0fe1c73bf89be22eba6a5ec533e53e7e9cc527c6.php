
<?php $__env->startSection('title', 'Blog'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- blog end -->
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
      <?php if(isset($blog)): ?>
          
      <?php endif; ?>
     
     <section class="inner-blog pt-120 pb-120">
         <div class="container">
             <div class="row">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    

                    <div class="bsingle__post mb-50">
                         <div class="bsingle__post-thumb">

                            <?php if($blog->slug != NULL): ?>
                            <a href="<?php echo e(route('blog.detail', ['id' => $blog->id, 'slug' => $blog->slug ])); ?>"><img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" class="img-fluid"  alt="blog"></a>
                         <?php else: ?>
                            <a href="<?php echo e(route('blog.detail', ['id' => $blog->id, 'slug' => str_slug(str_replace('-','&',$blog->heading)) ])); ?>"><img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" class="img-fluid"  alt="blog"></a>
                         <?php endif; ?>
                         </div>
                         <div class="bsingle__content">
                             <div class="meta-info">
                                <div class="meta-info">
                                 <ul>
                                    
                                     <li><i class="fal fa-calendar-alt"></i> <?php echo e(date('d-m-Y',strtotime($blog['created_at']))); ?></li>
                                 </ul>
                             </div>
                             </div>
                             <h2><a href="<?php echo e(route('blog.detail', ['id' => $blog->id, 'slug' => $blog->slug ])); ?>"><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($blog->heading ))) , $limit = 16, $end = '...')); ?></a></h2>
                            <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($blog->detail))) , $limit = 110, $end = '...')); ?></p>
                             <div class="blog__btn">
                                 <a href="<?php echo e(route('blog.detail', ['id' => $blog->id, 'slug' => $blog->slug ])); ?>" class="btn"><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a>
                             </div>
                         </div>
                    </div>
                    
                    
                    
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="pagination-wrap">
                    <?php echo e($blogs->links()); ?>

                </div>

                
             </div>

         </div>
     </section>
     <!-- inner-blog-end -->
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/quedecato/front/blog/blog.blade.php ENDPATH**/ ?>