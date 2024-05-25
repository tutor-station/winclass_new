<div class="row">
    <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header all-user-card-header">
                    <h5 class="box-title">{{ __('All Orders') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <!-- <th>#</th>
                                    <th>{{ __('User') }}</th>
                                    <th>{{ __('Payment Details') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Subscription Status') }}</th>
                                    <th>{{ __('Declined') }}</th>
                                    <th>{{ __('Action') }}</th> -->

                                    <th>#</th>
                                    <th>{{ __('Order ID') }}</th>
                                    <th>{{ __('User Name') }}</th>
                                    <th>{{ __('Mobile No. , Email') }}</th>
                                    <th>{{ __('Course Name') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Date Time') }}</th>
                                    <th>{{ __('Payment Method') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($orders as $order)
                                <?php $i++; ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= ($order->transaction_id != "") ? $order->transaction_id : "Admin Enroll" ?></td>
                                    <td><?= $order->user['fname'].' '.$order->user['lname'] ?></td>
                                    <td><b>Mobile : </b><?= $order->user['mobile'] ?> <br> <b>Email : </b><?= $order->user['email'] ?></td>
                                    <td>
                                        @if ($order->course_id != null)
                                        {{ optional($order->courses)['title'] }}
                                        @else
                                        {{ optional($order->bundle)['title'] }}
                                        @endif
                                    </td>
                                    <td><?= $order->total_amount ?></td>
                                    <td><?= $order->created_at ?></td>
                                    
                                        <?php

                                        if($order->payment_method != "Admin Enroll"){ ?>
                                            <td>Online</td>
                                        <?php }else{ ?>
                                             <td>Ofline</td>
                                        <?php } ?>
                                    </td>
                                        
                                    <td>


                                         <?php 
                                            if($order['payment_status']=='P') 
                                            {
                                                echo "<span class='btn btn-xs btn-warning'> PENDING</span>";
                                            }
                                            else if($order['payment_status']=='S') 
                                            {
                                                echo "<span class='btn btn-xs btn-success'> SUCCESS</span>";
                                            }
                                            else if($order['payment_status']=='F') 
                                            {
                                                echo "<span class='btn btn-xs btn-danger'> FAILED</span>";
                                            }
                                             else if($order['payment_status']=='R') 
                                            {
                                                echo "<span class='btn btn-xs btn-info'> REFUND</span>";
                                            }

                                            ?> 
                                        
                                </td>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-outline-primary" type="button"
                                                id="CustomdropdownMenuButton1" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" title="{{ __('Settings') }}"><i
                                                    class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                                <a class="dropdown-item" href="{{ route('view.order', $order->id) }}" title="{{ __('View Order') }}"><i
                                                        class="feather icon-eye mr-2"></i>{{ __('View Order') }}</a>
                                                <a class="dropdown-item btn btn-link" data-toggle="modal"
                                                    data-target="#delete{{ $order->id }}" title="{{ __('Delete') }}">
                                                    <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</a>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- delete Modal start -->
                                        <div class="modal fade bd-example-modal-sm" id="delete{{$order->id}}"
                                            tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleSmallModalLabel">{{ __('Delete') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close" title="{{ __('Close') }}">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>{{ __('Are You Sure ?')}}</h4>
                                                        <p>{{ __('Do you really want to delete')}} ?
                                                            {{ __('This process cannot be undone.')}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="{{ url('order/' . $order->id) }}"
                                                            class="pull-right">
                                                            {{csrf_field()}}
                                                            {{method_field("DELETE")}}
                                                            <button type="reset" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('No') }}</button>
                                                            <button type="submit" class="btn btn-primary">{{ __('Yes') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete Model ended -->

                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('script')
<script>
  $(function() {
    $(document).on("change",".orders",function() {
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'order-status',
            data: {'status': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
            success: function(data){
                var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
            });
                warning.get().click(function() {
                    warning.remove();
                });
            }
        });
    })
   });
</script>
@endsection