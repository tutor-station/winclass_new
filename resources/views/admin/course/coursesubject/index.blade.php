<div class="row">
  <div class="col-lg-12">
    <div class="card m-b-30">
      <div class="card-header">
        @can('course-chapter.delete')
        <button type="button" class=" btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete3"><i
            class="feather icon-trash mr-2"></i>{{ __('Delete Selected') }}</button>
            @endcan
            @can('course-chapter.create')
            <a data-toggle="modal" data-target="#myModalSubject" href="#" class="btn btn-primary-rgba"><i
                class="feather icon-plus mr-2"></i>{{ __('Add Course Subject') }}</a>
                @endcan
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="" class="displaytable table table-striped table-bordered w-100">
            <thead>
              <tr>
                <th>
                  <input id="checkboxAllcoursechapter" type="checkbox" class="filled-in" name="checked[]" value="all" />
                  <label for="checkboxAll" class="material-checkbox"></label> #
                </th>
                <th>{{ __('SubjectName') }}</th>
                <th>{{ __('ChapterName') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>

              </tr>
            </thead>
            <tbody id="sortable-chapter">
              <?php $i=0;?>
              @php

                  $courseSubject = DB::table('course_subject')
                          ->where('course_subject.course_id', $cor->id)
                          ->join('course_chapters', 'course_chapters.id', '=', 'course_subject.chapter_id')
                          ->select('course_subject.*', 'course_chapters.chapter_name')
                          ->get();
              @endphp
              
              @foreach($courseSubject as $cat)
              <tr class="sortable row1" data-Cid="{{ $cat->id }}" course-id="{{ $cor->id }}">             
                <?php $i++;?>
                      <td>
                          <input type="checkbox" form="bulk_delete_form3" class="filled-in material-checkbox-input check" name="checked[]" value="{{$cat->id}}" id="checkbox{{$cat->id}}">
                          <label for="checkbox" class="material-checkbox"></label>
                        <?php echo $i; ?>
            
                        <!-- =============== -->
                        <div id="bulk_delete3" class="delete-modal modal fade" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="delete-icon"></div>
                              </div>
                              <div class="modal-body text-center">
                                <h4 class="modal-heading">{{ __('Are You Sure') }} ?</h4>
                                <p>{{ __('Do you really want to delete selected item ? This process
                                  cannot be undone') }}.</p>
                              </div>
                              <div class="modal-footer">
                                <form id="bulk_delete_form3" method="post" action="{{ route('coursechapter.bulk_delete') }}">
                                  @csrf
                                  @method('POST')
                                  <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{ __('No') }}</button>
                                  <button type="submit" class="btn btn-danger">{{ __('Yes') }}</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- =============== -->
                       
                      </td>

                      <td>{{$cat->title}}</td>
                      <td>{{$cat->chapter_name}}</td>
                       <td>
                          <label class="switch">
                            <input class="slider" type="checkbox"  data-id="{{$cat->id}}" name="status" {{ $cat->status == '1' ? 'checked' : '' }} onchange="courcechapter('{{$cat->id}}')" />
                            <span class="knob"></span>
                          </label>
                      </td>

                      <td>
                        <div class="dropdown">
                          <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                              class="feather icon-more-vertical-"></i></button>
                          <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                            @can('course-chapter.edit')
                            <a class="dropdown-item" href="{{url('coursechapter/'.$cat->id)}}"><i
                                class="feather icon-edit mr-2"></i>{{__('Edit')}}</a>
                                @endcan
                                @can('course-chapter.delete')
                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete{{ $cat->id}}">
                              <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</a>
                            </a>
                            @endcan
                          </div>
                        </div>

                        <div class="modal fade bd-example-modal-sm" id="delete{{$cat->id}}" tabindex="-1" role="dialog"
                          aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleSmallModalLabel">{{__('Delete')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4>{{ __('Are You Sure ?')}}</h4>
                                <p>{{ __('Do you really want to delete')}}</p>
                              </div>
                              <div class="modal-footer">
                                <form method="post" action="{{url('coursechapter/'.$cat->id)}}" class="pull-right">
                                  {{csrf_field()}}
                                  {{method_field("DELETE")}}
                                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                  <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
            
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
<div class="modal fade" id="myModalSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">
          <b>Add Course Subject</b>
      </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="box box-primary">
        <div class="panel panel-sum">
          <div class="modal-body">
            <form id="demo-form2" method="post" action="{{ route('coursesubject.store') }}" data-parsley-validate
              class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}

               <select class="d-none" name="course_id" class="form-control select2">
                <option value="{{ $cor->id }}">{{ $cor->title }}</option>
              </select>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e">{{ __('SubjectName') }}: <span class="redstar">*</span>
                  </label>
                  <input type="text" placeholder="Enter Your Subject Name" class="form-control" name="title" id="exampleInputTitle" value="" required>
                </div>
                <div class="col-md-6">

                </div>
              </div>
              <br>

              <div class="row">
                @php

                  $coursechapters = App\CourseChapter::where('course_id',$cor->id)->orderBy('position','ASC')->get();

                @endphp
                <div class="col-md-12">
                  <label for="exampleInputTit1e">{{ __('ChapterName') }}: <span class="redstar">*</span>
                  </label>
                  <select name="chapter_id" class="form-control select2">
                    <option value="">Select Chapter</option>
                      @foreach($coursechapters as $key => $val)
                          <option value="{{ $val->id }}">{{ $val->chapter_name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-6">

                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails">{{ __('Status') }}:</label><br>
                  <label class="switch">
                      <input class="slider" type="checkbox" name="status" checked />
                      <span class="knob"></span>
                    </label>
                </div>
              </div>
              <br>

              <div class="form-group">
                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{__('Reset')}}</button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  {{__('Create')}}</button>
              </div>
              <div class="clear-both"></div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- script to change status start -->

<script>
  function  courcechapter(id){
    var status = $(this).prop('checked') == true ? 1 : 0; 
    
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{url('/course-chapter/status/')}}/" + id,
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(id)
            }
        });
    };
 
</script>
<!-- script to change status end -->

