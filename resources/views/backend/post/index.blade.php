@extends('backend.layouts.master')
@section('title') {{ __('sidebar.post_title_name') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">{{ __('sidebar.post_list') }}</h3>
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
                      <a href="{{route('post.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>{{ __('sidebar.add_post') }}</a>
                  </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($posts)>0)
                <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('sidebar.post_snumber') }}</th>
                      <th>{{ __('sidebar.post_title') }}</th>
                      <th>{{ __('sidebar.post_category') }}</th>
                      <th>{{ __('sidebar.post_tag') }}</th>
                      <th>{{ __('sidebar.post_author') }}</th>
                      <th>{{ __('sidebar.post_photo') }}</th>
                      <th>{{ __('sidebar.post_status') }}</th>
                      <th>{{ __('sidebar.post_action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $post)   
                      @php 
                      $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                      // dd($sub_cat_info);
                      // dd($author_info);
                      $cat_info=DB::table('post_categories')->select('title')->where('id',$post->post_cat_id)->get();
                      @endphp
                        <tr class="tr-shadow">
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>
                              @foreach($cat_info as $data)
                                {{$post->cat_info->title}}
                                @endforeach
                            </td>
                            <td>{{$post->tags}}</td>

                            <td>
                              @foreach($author_info as $data)
                                  {{$data->name}}
                              @endforeach
                            </td>
                            <td>
                                @if($post->photo)
                                    <img src="{{Storage::url($post->photo) }}" class="img-fluid zoom" style="max-width:80px" alt="{{ Storage::url($post->photo) }}">
                                @else
                                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                @endif
                            </td>                   
                            <td>
                                @if($post->status=='active')
                                    <span class="badge badge-success">{{$post->status}}</span>
                                @else
                                    <span class="badge badge-warning">{{$post->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('post.destroy',[$post->id])}}">
                              @csrf 
                              @method('delete')
                                  <button class="btn btn-danger btn-sm dltBtn" data-id={{$post->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>  
                    @endforeach
                  </tbody>
                </table>
                <span style="float:right">{{$posts->links()}}</span>
                @else
                  <h6 class="text-center">No posts found!!! Please create Post</h6>
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
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(5);
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
      
      $('#product-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[8,9,10]
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