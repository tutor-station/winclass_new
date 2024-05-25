
<?php $__env->startSection('title','Flash Deals'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Flash Deals';
$data['title'] = 'Flash Deals';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar bardashboard-card">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo e(__("All Flash Deals")); ?>

                    </h3>
                    <div>
                <div class="widgetbar">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('flash-deals.create')): ?>
                    <a  href=" <?php echo e(route('flash-sales.create')); ?>" class="btn btn-primary-rgba mr-2" title="<?php echo e(__('Add Flash Deals')); ?>">
                        <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add Flash Deals")); ?>

                    </a>
                    <?php endif; ?>
                </div>                        
            </div>
                </div>

                <div class="card-body">
                    <table id="flashdeals" class="table table-striped">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                <?php echo e(__("Deal Name")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Start Date")); ?>

                            </th>
                            <th>
                                <?php echo e(__("End Date")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Banner Image")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Action")); ?>

                            </th>
                        </thead>

                        <tbody id="sortable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $( function() {
      $( "#sortable" ).sortable();
      $( "#sortable" ).disableSelection();
    } );
  
     $("#sortable").sortable({
     update: function (e, u) {
      var data = $(this).sortable('serialize');   
     console.log("ID is ", data);
      $.ajax({
          url: "<?php echo e(route('flash_reposition')); ?>",
          type: 'get',
          data: data,
          dataType: 'json',
          success: function (result) {
            console.log(data);
          }
      });
  
    }
  
  });
</script>
    <script>
            $(function () {
                "use strict";
                var table = $('#flashdeals').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: <?php echo json_encode(route("flash-sales.index"), 15, 512) ?>,
                    language: {
                        searchPlaceholder: "Search deals..."
                    },

                    columns: [
                        {data: 'DT_RowIndex', name: 'flashsales.position', searchable : false},
                        {data : 'title', name : 'flashsales.title'},
                        {data : 'start_date', name : 'flashsales.start_date'},
                        {data : 'end_date', name : 'flashsales.end_date'},
                        {data : 'background_image', name : 'background_image',searchable : false, orderable : false},
                        {data : 'action', name : 'action',searchable : false, orderable : false},
                    ],
                    dom : 'lBfrtip',
                    buttons : [
                        'csv','excel','pdf','print','colvis'
                    ],
                    order : [[0,'DESC']]
                });

                var myInterval = setInterval(getSortableRow, 1000);

                function getSortableRow(){
                    var allTableData = $("#sortable tr");
                    if(allTableData.length > 0){
                        clearInterval(myInterval);
                        allTableData.each(function(){
                            var ID = $(this).children(".sorting_1").html();
                            $(this).attr("id", "id-"+ID);
                            $(this).addClass("sortable");
                        });
                    }
                    
                }           
            });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/flashsale/index.blade.php ENDPATH**/ ?>