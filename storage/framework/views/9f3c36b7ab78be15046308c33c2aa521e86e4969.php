
<?php $__env->startSection('title',' Financial Reports'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Financial Reports';
$data['title'] = 'Reports';
$data['title1'] = 'Financial Reports';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Orders Total')); ?> </h5>
                </div>
                <div class="card-body">
                    <div id="apex-area-chart"></div>
                </div>
            </div>

        </div>
        <div class="col-lg-12 mb-5">
            <div class="card ">
                <div class="table-responsive  mt-2 mb-2">
                    <table id="datatable-buttons" class="table table-striped table-bordered mt-2 mb-2">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Months')); ?></th>
                                <th><?php echo e(__('Order Count')); ?></th>
                                <th><?php echo e(__('Total Amount')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->month); ?></td>
                                <td><?php echo e($value->count); ?></td>
                                <td><?php echo e($value->total_amount); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    var order_total = <?php echo json_encode($order_total, 15, 512) ?>;
    
    var options = {
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
              type: 'x',
              enabled: false,
              autoScaleYaxis: true
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
        },
        colors: ['#506fe4', '#43d187'],
        series: [{
            name: 'Orders total',
            data: order_total
        }],
        legend: {
            show: false,
        },
        xaxis: {
           
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                    'Dec'
                ],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-area-chart"),
        options
    );
    chart.render();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/report/ordertotal.blade.php ENDPATH**/ ?>