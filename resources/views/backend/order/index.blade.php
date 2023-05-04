@extends('backend.layouts.master')
@section('title') {{ __('sidebar.book_list') }} @endsection
@section('main-content')

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE -->
          <h3 class="title-5 m-b-35">{{ __('sidebar.book_title_name') }}</h3>
          <div class="table-responsive table-responsive-data2">
            @if(count($orders)>0)
            <table class="table table-data2">
              <thead>
                <tr>
                  <th scope="col">{{ __('sidebar.book_snumber') }}</th>
                  <th scope="col">{{ __('sidebar.book_name') }}</th>
                  <th scope="col">{{ __('sidebar.book_email') }}</th>
                  <th scope="col">{{ __('sidebar.book_country') }}</th>
                  <th scope="col">{{ __('sidebar.book_room_type') }}</th>
                  <th scope="col">{{ __('sidebar.book_date') }}</th>
                  <th scope="col">{{ __('sidebar.book_action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $orders as $order)
                  @php 
                    $room=DB::table('rooms')->select('title')->where('id',$order->room_id)->get();
                  @endphp
                <tr class="@if($order->created_at) border-left-success @else bg-light border-left-warning @endif">
                  <td scope="row">{{$loop->index +1}}</td>
                  <td>{{$order->first_name}} - {{$order->last_name}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->country}}</td>
                  <td>
                    @foreach($room as $data)
                      {{$order->room->title}}
                    @endforeach
                    </td>
                  <td>{{$order->created_at->format('F d, Y h:i A')}}</td>
                  <td>
                    <a href="{{route('order.show',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fa fa-eye"></i></a>
                    <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                      @csrf 
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
            <nav class="blog-pagination justify-content-center d-flex">
              {{$orders->links()}}
            </nav>
            @else
              <h2>Orders Empty!</h2>
            @endif
          </div>
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
        transform: scale(3.2);
      }
  </style>
@endpush
@push('scripts')
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#message-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[4]
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