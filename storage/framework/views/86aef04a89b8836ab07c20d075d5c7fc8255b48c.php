<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Bootstrap 5 Progress Bar Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

  <h2><?php echo e(__('HTML5 File Upload Progress Bar Tutorial')); ?></h2>
  <form id="upload_form" enctype="multipart/form-data" method="post">
    <input type="file" name="file1" id="file1" onchange="uploadFile()"><br>
    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
    <h3 id="status"></h3>
    <p id="loaded_n_total"></p>
  </form>

    <div class="container mt-5" style="max-width: 500px">
       
        <div class="alert alert-warning mb-4 text-center">
           <h2 class="display-6"><?php echo e(__('Laravel Dynamic Ajax Progress Bar Example')); ?></h2>
        </div>  
        <form id="fileUploadForm" method="POST" action="<?php echo e(url('/upload-doc-file')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <input name="file" type="file" class="form-control">
            </div>
            <div class="d-grid mb-3">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>

            
            <div class="progress">
              <div class="bar"></div >
              <div class="percent"><?php echo e(__('0%')); ?></div >
          </div>
          
          <div id="status"></div>
        </form>
    </div>
    
    <script src="<?php echo e(url('js/jquery-2.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="<?php echo e(url('js/progress.js')); ?>"></script>

    
    
</body>
</html><?php /**PATH /var/www/html/resources/views/test.blade.php ENDPATH**/ ?>