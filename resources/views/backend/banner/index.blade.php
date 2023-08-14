@extends('backend.layouts.master')
@section('title') {{ __('sidebar.banner_title_name') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">{{ __('sidebar.banner_list') }}</h3>
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
                      <a href="{{route('banner.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>{{ __('sidebar.add_banner') }}</a>
                  </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($banners)>0)
                  <table class="table table-data2" id="banner-dataTable">
                      <thead>
                          <tr>
                            <th>{{ __('sidebar.bann_number') }}</th>
                            <th>{{ __('sidebar.bann_title') }}</th>
                            <th>{{ __('sidebar.bann_slug') }}</th>
                            <th>{{ __('sidebar.bann_photo') }}</th>
                            <th>{{ __('sidebar.bann_status') }}</th>
                            <th>{{ __('sidebar.bann_action') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($banners as $banner)
                          <tr class="tr-shadow">
                              <td>{{$banner->id}}</td>
                              <td>{{$banner->title}}</td>
                              <td>{{$banner->slug}}</td>
                              <td>
                                  @if($banner->photo)
                                      <img src="{{ Storage::url($banner->photo) }}" class="img-fluid zoom" style="max-width:80px" alt="{{ Storage::url($banner->photo) }}">
                                  @else
                                      <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                                  @endif
                              </td>
                              <td>
                                  @if($banner->status=='active')
                                      <span class="badge badge-success">{{$banner->status}}</span>
                                  @else
                                      <span class="badge badge-warning">{{$banner->status}}</span>
                                  @endif
                              </td>
                              <td>
                                <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('banner.destroy',[$banner->id])}}">
                              @csrf
                              @method('delete')
                                  <button class="btn btn-danger btn-sm dltBtn" data-id={{$banner->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
                        <tr class="spacer"></tr>
                      </tbody>
                  </table>
                  <span style="float:right">{{$banners->links()}}</span>
                @else
                    <h6 class="text-center">No banners found!!! Please create banner</h6>
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