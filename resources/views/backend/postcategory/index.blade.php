@extends('backend.layouts.master')
@section('title') {{ __('sidebar.all_post_category') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">{{ __('sidebar.post_category_list') }}</h3>
              <div class="table-data__tool">
                  {{-- <div class="table-data__tool-left">
                      <div class="rs-select2--light rs-select2--md">
                          <select class="js-select2" name="property">
                              <option selected="selected">All Properties</option>
                              <option value="">Option 1</option>
                              <option value="">Option 2</option>
                          </select>
                          <div class="dropDownSelect2"></div>
                      </div>
                      <div class="rs-select2--light rs-select2--sm">
                          <select class="js-select2" name="time">
                              <option selected="selected">Today</option>
                              <option value="">3 Days</option>
                              <option value="">1 Week</option>
                          </select>
                          <div class="dropDownSelect2"></div>
                      </div>
                      <button class="au-btn-filter">
                          <i class="zmdi zmdi-filter-list"></i>filters</button>
                  </div> --}}
                  <div class="table-data__tool-right">
                      <a href="{{route('post-category.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Add Post Categories</a>
                  </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($postCategories)>0)
                <table class="table table-bordered" id="post-category-dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('sidebar.post_snumber') }}</th>
                      <th>{{ __('sidebar.post_title') }}</th>
                      <th>{{ __('sidebar.post_slug') }}</th>
                      <th>{{ __('sidebar.post_status') }}</th>
                      <th>{{ __('sidebar.post_action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($postCategories as $data)   
                        <tr class="tr-shadow">
                            <td>{{$data->id}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->slug}}</td>
                            <td>
                                @if($data->status=='active')
                                    <span class="badge badge-success">{{$data->status}}</span>
                                @else
                                    <span class="badge badge-warning">{{$data->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('post-category.edit',$data->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('post-category.destroy',[$data->id])}}">
                              @csrf 
                              @method('delete')
                                  <button class="btn btn-danger btn-sm dltBtn" data-id={{$data->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            {{-- Delete Modal --}}
                            {{-- <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="{{ route('banners.destroy',$user->id) }}">
                                        @csrf 
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div> --}}
                        </tr>  
                    @endforeach
                  </tbody>
                </table>
                <span style="float:right">{{$postCategories->links()}}</span>
                @else
                  <h6 class="text-center">No Post Category found!!! Please create post category</h6>
                @endif
                 <!-- END DATA TABLE -->
          </div>
        </div>
      </div>
  </div>
</div>

@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#post-category-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush