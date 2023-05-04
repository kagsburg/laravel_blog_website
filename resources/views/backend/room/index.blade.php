@extends('backend.layouts.master')
@section('title') {{ __('sidebar.hall_title_name') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">{{ __('sidebar.hall_list') }}</h3>
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
                      <a href="{{route('room.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>{{ __('sidebar.add_hall') }}</a>
                  </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($rooms)>0)
                <table class="table table-data2" id="room-dataTable">
                  <thead>
                    <tr>
                      <th>{{ __('sidebar.hall_number') }}</th>
                      <th>{{ __('sidebar.hall_title') }}</th>
                      <th>Slug</th>
                      <th>{{ __('sidebar.hall_featured') }}</th>
                      <th>{{ __('sidebar.hall_price') }}</th>
                      <th>Photo</th>
                      <th>{{ __('sidebar.hall_status') }}</th>
                      <th>{{ __('sidebar.hall_action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rooms as $room)
                        <tr class="tr-shadow">
                            <td>{{$room->id}}</td>
                            <td>{{$room->title}}</td>
                            <td>{{$room->slug}}</td>
                            <td>{{(($room->is_featured==1)? 'Yes': 'No')}}</td>
                            <td>FBU&nbsp;{{$room->price}} /-</td>
                            <td>
                                @if($room->photo)
                                    <img src="{{ Storage::url($room->photo) }}" class="img-fluid zoom" style="max-width:80px" alt="{{ Storage::url($room->photo) }}">
                                @else
                                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                @endif
                            </td>
                            <td>
                                @if($room->status=='active')
                                    <span class="badge badge-success">{{$room->status}}</span>
                                @else
                                    <span class="badge badge-warning">{{$room->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('room.edit',$room->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('room.destroy',[$room->id])}}">
                              @csrf
                              @method('delete')
                                  <button class="btn btn-danger btn-sm dltBtn" data-id={{$room->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <span style="float:right">{{$rooms->links()}}</span>
                @else
                  <h6 class="text-center">No Rooms found!!! Please create Room</h6>
                @endif
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#room-dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
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
