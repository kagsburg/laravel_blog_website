@extends('backend.layouts.master')
@section('title') {{ __('sidebar.all_post_comment') }} @endsection
@section('main-content')


@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">{{ __('sidebar.post_comment_list') }}</h3>
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
                  {{-- <div class="table-data__tool-right">
                      <a href="{{route('post-tag.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Add Post Tag</a>
                  </div> --}}
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($comments)>0)
                <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('sidebar.post_snumber') }}</th>
                      <th>{{ __('sidebar.post_author') }}</th>
                      <th>{{ __('sidebar.post_title') }}</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>{{ __('sidebar.post_status') }}</th>
                      <th>{{ __('sidebar.post_action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($comments as $comment)
                        <tr class="tr-shadow">
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->user_info['name']}}</td>
                            <td>{{$comment->post->title ?? ''}}</td>
                            <td>{{$comment->comment}}</td>
                            <td>{{$comment->created_at->format('M d D, Y g: i a')}}</td>
                            <td>
                                @if($comment->status=='active')
                                  <span class="badge badge-success">{{$comment->status}}</span>
                                @else
                                  <span class="badge badge-warning">{{$comment->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                <form method="POST" action="{{route('comment.destroy',[$comment->id])}}">
                                  @csrf
                                  @method('delete')
                                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$comment->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <span style="float:right">{{$comments->links()}}</span>
                @else
                  <h6 class="text-center">No post comments found!!!</h6>
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

      $('#order-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[5,6]
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
