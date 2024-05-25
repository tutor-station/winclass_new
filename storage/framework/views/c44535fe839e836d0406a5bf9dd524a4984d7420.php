
<?php $__env->startSection('title', 'Language Translation - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Language Translation';
$data['title'] = 'Site Setting';
$data['title1'] = 'Language Translation';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
        <?php if($errors->any()): ?>  
            <div class="alert alert-danger" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                <span aria-hidden="true" style="color:red;">&times;</span></button></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
        <?php endif; ?>
        <!-- row started -->
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Language Translation')); ?></h5>
                </div>
                <!-- card body started -->
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- table to display faq start -->
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <th>#</th>
                                <th><?php echo e(__('Language Translation')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo e(__('1')); ?></th>
                                    <td><b> <?php echo e(__('ar.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/ar.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('2')); ?></th>
                                    <td><b> <?php echo e(__('bn.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/bn.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('3')); ?></th>
                                    <td><b> <?php echo e(__('de.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/de.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('4')); ?></th>
                                    <td><b> <?php echo e(__('en.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/en.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('5')); ?></th>
                                    <td><b> <?php echo e(__('es.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/es.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('6')); ?></th>
                                    <td><b> <?php echo e(__('et.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/et.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('7')); ?></th>
                                    <td><b><?php echo e(__(' fa.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/fa.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('8')); ?></th>
                                    <td><b> <?php echo e(__('fr.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/fr.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('9')); ?></th>
                                    <td><b> <?php echo e(__('hi.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/hi.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('10')); ?></th>
                                    <td><b> <?php echo e(__('it.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/it.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('11')); ?></th>
                                    <td><b> <?php echo e(__('ko.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/ko.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('12')); ?></th>
                                    <td><b> <?php echo e(__('nl.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/nl.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('13')); ?></th>
                                    <td><b> <?php echo e(__('pl.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/pl.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('14')); ?></th>
                                    <td><b> <?php echo e(__('pt-br.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/pt-br.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('15')); ?></th>
                                    <td><b> <?php echo e(__('pt.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/pt.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('16')); ?></th>
                                    <td><b> <?php echo e(__('ro.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/ro.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('17')); ?></th>
                                    <td><b> <?php echo e(__('ru.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/ru.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('18')); ?></th>
                                    <td><b> <?php echo e(__('tr.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/tr.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('19')); ?></th>
                                    <td><b> <?php echo e(__('ur.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/ur.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('20')); ?></th>
                                    <td><b> <?php echo e(__('zh-CN.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/zh-CN.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo e(__('21')); ?></th>
                                    <td><b> <?php echo e(__('zh-TW.json')); ?> </b></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url('change/json/zh-TW.json')); ?>" title="<?php echo e(__('Edit')); ?>"><?php echo e(__("Edit")); ?></a></td>
                                </tr> 
                            </tbody>
                        </table>                  
                        <!-- table to display faq data end -->                
                    </div><!-- table-responsive div end -->
                </div><!-- card body end -->
                
            </div><!-- col end -->
        </div>
    </div>
</div><!-- row end -->
<?php $__env->stopSection(); ?>
<!-- main content section ended -->

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/changeword/index.blade.php ENDPATH**/ ?>