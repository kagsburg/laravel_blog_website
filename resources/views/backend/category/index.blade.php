@extends('backend.layouts.master')
@section('title') {{ __('sidebar.category_list') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">{{ __('sidebar.category_list') }}</h3>
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
                      <a href="{{route('category.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>{{ __('sidebar.add_category') }}</a>
                  </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($categories)>0)
                <table class="table table-data2">
                  <thead>
                    <tr>
                      <th>{{ __('sidebar.category_number') }}</th>
                      <th>{{ __('sidebar.category_title') }}</th>
                      <th>{{ __('sidebar.category_slug') }}</th>
                      <th>{{ __('sidebar.category_is_parent') }}</th>
                      <th>{{ __('sidebar.category_parent') }}</th>
                      <th>{{ __('sidebar.category_photo') }}</th>
                      <th>{{ __('sidebar.category_status') }}</th>
                      <th>{{ __('sidebar.category_action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                      <tr class="tr-shadow">
                          <td>{{$category->id}}</td>
                          <td>{{$category->title}}</td>
                          <td>{{$category->slug}}</td>
                          <td>{{(($category->is_parent==1)? 'Yes': 'No')}}</td>
                          <td>
                              {{$category->parent_info->title ?? ''}}
                          </td>
                          <td>
                            @if($category->photo)
                              <img src="{{ Storage::url($category->photo) }}" class="img-fluid zoom" style="max-width:80px" alt="{{ Storage::url($category->photo) }}">
                            @else
                                <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                            @endif
                          </td>
                          <td>
                              @if($category->status=='active')
                                  <span class="badge badge-success">{{$category->status}}</span>
                              @else
                                  <span class="badge badge-warning">{{$category->status}}</span>
                              @endif
                          </td>
                          <td>
                            <div class="table-data-feature">
                              <a href="{{route('category.edit',$category->id)}}" class="item" 
                                style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" 
                                data-placement="top">
                                <i class="zmdi zmdi-edit"></i>
                              </a>
                              <form method="POST" action="{{route('category.destroy',[$category->id])}}">
                                @csrf
                                @method('delete')
                                    <button class="item" data-id={{$category->id}} 
                                      style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" 
                                      data-placement="top" title="Delete">
                                      <i class="zmdi zmdi-delete"></i>
                                    </button>
                              </form>
                            </div>
                          </td>
                      </tr>
                      @endforeach
                      <tr class="spacer"></tr>
                    </tbody>
                </table>
                <span style="float:right">{{$categories->links()}}</span>
                @else
                  <h6 class="text-center">No category found!!! Please create category</h6>
                @endif
              </div>
              <!-- END DATA TABLE -->
          </div>
        </div>
      </div>
  </div>
</div>

@endsection

@push('styles')
  <!-- Fontfaces CSS-->
  <link href="{{ asset('backend/css/font-face.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="{{ asset('backend/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="{{ asset('backend/css/theme.css') }}" rel="stylesheet" media="all">
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <!-- Jquery JS-->
  <script src="{{ asset('backend/vendor/jquery-3.2.1.min.js') }}"></script>
  <!-- Bootstrap JS-->
  <script src="{{ asset('backend/vendor/bootstrap-4.1/popper.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
  <!-- Vendor JS       -->
  <script src="{{ asset('backend/vendor/slick/slick.min.js') }}">
  </script>
  <script src="{{ asset('backend/vendor/wow/wow.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/animsition/animsition.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
  </script>
  <script src="{{ asset('backend/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/counter-up/jquery.counterup.min.js') }}">
  </script>
  <script src="{{ asset('backend/vendor/circle-progress/circle-progress.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('backend/vendor/chartjs/Chart.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/select2/select2.min.js') }}">
  </script>

  <!-- Main JS-->
  <script src="{{ asset('backend/js/main.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4,5]
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