
<?php $__env->startSection('title',__('Marketing Dashboard')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Marketing Dashboard';
$data['title1'] = 'Marketing Dashboard';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar bardashboard-card">
    <!-- Start row -->    
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-3 col-md-6">
                <div class="card m-b-30 bg-success-rgba shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4><?php echo e(filter_var($users)); ?></h4>
                                <p class="font-14 mb-0"><?php echo e(__('Users')); ?> <br> <?php echo e(__('Purchase')); ?>

                                </p>
                            </div>
                            <div class="col-md-4 col-4">
                            <i class="text-success iconsize feather shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card m-b-30 bg-warning-rgba shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4><?php echo e(filter_var($total)); ?>  <?php echo e(filter_var($currencies)); ?></h4>
                                <p class="font-14 mb-0"><?php echo e(__("Wallet")); ?><br><?php echo e(__('Amount')); ?>

                                </p>
                            
                            </div>
                            <div class="col-md-4 col-4">
                            <i class="text-warning iconsize feather icon-credit-card"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card m-b-30 bg-info-rgba shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4><?php echo e(filter_var($featured)); ?></h4>
                                <p class="font-14 mb-0"><?php echo e(__('Featured')); ?>  <br> <?php echo e(__('Courses')); ?>

                                </p>
                            
                            </div>
                            <div class="col-md-4 col-4">
                            <i class="text-info iconsize feather icon-book-open"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card m-b-30 bg-danger-rgba shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4><?php echo e(filter_var($coupan)); ?></h4>
                                <p class="font-14 mb-0"><?php echo e(__('Active')); ?> <br>
                                    <?php echo e(__('Coupans')); ?>

                                </p>
                            
                            </div>
                            <div class="col-md-4 col-4">
                            <i class="text-danger iconsize feather icon-percent"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card m-b-30 bg-secondary-rgba shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4><?php echo e(filter_var($total_order)); ?>  <?php echo e(filter_var($currencies)); ?></h4>
                                <p class="font-14 mb-0"><?php echo e(__('Total')); ?> <br>
                                    <?php echo e(__('Revenue')); ?>

                                </p>
                            
                            </div>
                            <div class="col-md-4 col-4">
                            <i class="text-secondary iconsize feather icon-check-circle"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card m-b-30 bg-info-rgba shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4><?php echo e(filter_var($admin_total)); ?>  <?php echo e(filter_var($currencies)); ?></h4>
                                <p class="font-14 mb-0"><?php echo e(__('Admin')); ?> <br>
                                    <?php echo e(__('Revenue')); ?>

                                </p>                            
                            </div>
                            <div class="col-md-4 col-4">
                            <i class="text-info iconsize feather icon-dollar-sign"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card m-b-30 bg-primary-rgba shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4><?php echo e(filter_var($ins_payment)); ?>  <?php echo e(filter_var($currencies)); ?></h4>
                                <p class="font-14 mb-0"><?php echo e(__('Instructors')); ?> <br>
                                    <?php echo e(__('Revenue')); ?>

                                </p>                            
                            </div>
                            <div class="col-md-4 col-4">
                            <i class="text-primary iconsize feather icon-dollar-sign"></i>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo e(__('Total Revenue')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div id="apex-line-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-2">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo e(__('Class Types')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div id="apex-pie-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0"><?php echo e(__('Most Purchased Courses')); ?></h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-right" type="button"
                                        id="upcomingTask" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?>><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="upcomingTask">
                                        <a href="<?php echo e(url('order')); ?>"class="dropdown-item font-13" title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Order Count')); ?></th>
                                        <th><?php echo e(__('Total Amount')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user_order_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                           <?php echo e(filter_var($value->fname)); ?>

                                        </td>
                                        <td>
                                           <?php echo e(filter_var($value->order_count)); ?>

                                        </td>
                                        <td>
                                          <?php echo e(filter_var($value->total_amount)); ?> <?php echo e(filter_var($currencies)); ?>

                                        </td>         
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
              

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
        var order_total = <?php echo json_encode($order_total, 15, 512) ?>;
        var graph = <?php echo json_encode($graph, 15, 512) ?>;
    "use strict";
$(document).ready(function() {
    /* -----  Apex Line Chart ----- */
    var options = {
        chart: {
            height: 300,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#506fe4'],
        series: [{
            name: "Total Amount",
            data: order_total
        }],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct','Nov','Dec'],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)',
                
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)',
                
            }
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-line-chart"),
        options
    );
    chart.render();
});

var options = {
        chart: {
            type: 'donut',
            width: 300,
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "85%"
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#00e6e6','#43d187','#1a1aff'],
        series: graph,
        labels: ['Courses', 'Bundle Courses', 'Live Meetings'],
        legend: {
            show: true,
            position: 'bottom'
        },
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-pie-chart"),
        options
    );        
    chart.render();

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/marketing/dashboard.blade.php ENDPATH**/ ?>