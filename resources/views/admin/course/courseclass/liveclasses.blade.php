@extends('admin.layouts.master')
@section('title', 'Live Classes')
@section('maincontent')
<?php
$data['heading'] = 'Live Classes';
$data['title'] = 'Live Classes';
?>


@include('admin.layouts.topbar',$data)

<div class="contentbar">
    <div class="row">
@if ($errors->any())  
  <div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)     
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close" title="{{ __('Close') }}">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif
  <!-- row started -->
    <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
            <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box">{{ __('Live Classes') }}</h5>
                    <div>
                        <div class="widgetbar">
                        <!-- @can('blogs.create') -->
                        <a href="{{url('liveclass/create')}}" class="float-right btn btn-primary-rgba mr-2" title="{{ __('Add Post') }}"><i class="feather icon-plus mr-2"></i>{{ __('Add Live Class') }}</a>
                        <!-- @endcan -->
                        </div>
                      </div>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <div class="table-responsive">
                        <!-- table to display blog start -->
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <th> # </th>
                            <th>{{ __('Title') }}</th>
                            <!-- <th>{{ __('Courses') }}</th> -->
                            <th>{{ __('URL') }}</th> 
                            <th>{{ __('Date') }}</th> 
                            <th>{{ __('Status') }}</th> 
                            <th>{{ __('Comments') }}</th> 
                            <th>{{ __('Action') }}</th>
                        </thead>

                        <tbody>
                            <?php $i=0;?>
                            @foreach($items as $item)

                            <?php $i++;?>
                              <tr>
                              <td>
                                <label for='checkbox{{ $item->id }}' class='material-checkbox'></label>
                                <?php echo $i; ?>
                                <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" title="{{ __('Close') }}">&times;</button>
                                                <div class="delete-icon"></div>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4 class="modal-heading">{{ __('Are You Sure') }} ?</h4>
                                                <p>{{ __('Do you really want to delete selected item ? This process
                                                    cannot be undone') }}.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form id="bulk_delete_form" method="post"
                                                    action="{{ route('blog.bulk.delete') }}">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="reset" class="btn btn-gray translate-y-3"
                                                        data-dismiss="modal">{{ __('No') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ __('Yes') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                                
                                <td> {{ html_entity_decode($item->title) }} </td> 
                                <td> {{ $item->url }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> {{ ($item->status == "A") ? 'Active' : 'InActive' }} </td>
                                <td><a class="btn btn-success" target="_blank" href="{{ route('get-all-comment.show', $item->id) }}" title="{{ __('Edit') }}"><i class="feather icon-edit mr-2"></i>{{ __('Comments') }}</a></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ __('Settings') }}"><i class="feather icon-more-vertical-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                            @can('blogs.edit')
                                            <a class="dropdown-item" href="{{route('liveclass.edit',$item->classgroup)}}" title="{{ __('Edit') }}"><i class="feather icon-edit mr-2"></i>{{ __('Edit') }}</a>
                                            @endcan
                                            <!-- @can('blogs.delete')
                                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete{{ $item->id }}" title="{{ __('Delete') }}">
                                                <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</a>
                                            </a>
                                            @endcan -->
                                        </div>
                                    </div>

                                    <!-- delete Modal start -->
                                    <div class="modal fade bd-example-modal-sm" id="delete{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleSmallModalLabel">{{ __('Delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="{{ __('Close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <h4>{{ __('Are You Sure ?')}}</h4>
                                                        <p>{{ __('Do you really want to delete')}} <b>{{$item->title}}</b> ? {{ __('This process cannot be undone.')}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{url('blog/'.$item->id)}}" class="pull-right">
                                                        {{csrf_field()}}
                                                        {{method_field("DELETE")}}
                                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">{{ __('No') }}</button>
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
                        <!-- table to display blog data end -->                
                    </div><!-- table-responsive div end -->
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
@endsection
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
@section('script')
<!-- script to change status start -->
<script>

        $(document).on("change",".blogstatus",function() {
        
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'blog-status',
            data:  {'status': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
            success: function(data){
              console.log(id)
            }
        });
    
  });
</script>
<!-- script to change status end -->
<!-- script to approve start -->
<script>

        $(document).on("change",".blogapproved",function() {
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'blog-approved',
            data: {'approved': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
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
    });
</script>
<!-- script to approve end -->
<script>
    $("#checkboxAll").on('click', function () {
$('input.check').not(this).prop('checked', this.checked);
});
</script>
<!-- css for image start -->
<style>
    .img-circle{
   height:100px;
   width:100px;
   border-radius:50%;
}
</style>
<!-- css for image end -->
@endsection
<!-- This section will contain javacsript end -->