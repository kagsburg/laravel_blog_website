@extends('backend.layouts.master')
@section('title') Videos @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35"> List of Videos</h3>
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
                      <a href="{{route('video.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">                      
                      <i class="zmdi zmdi-plus"></i>Add Videos</a>
                  </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($videos)>0)
                <table class="table table-data2" id="room-dataTable">
                  <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>Link</th>
                      <th>Room</th>
                      <th>{{ __('sidebar.photo_status') }}</th>
                      <th>{{ __('sidebar.photo_action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($videos as $video)
                        @php 
                            $room=DB::table('rooms')->select('title')->where('id',$video->room_id)->get();
                        @endphp  
                        <tr class="tr-shadow">
                            <td>{{$video->id}}</td>
                            <td>
                              <iframe width="200" height="200" 
                              src="{{$video->link}}" 
                              title="" 
                              frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                              allowfullscreen></iframe>
                            </td>
                            <td>
                              @foreach($room as $data)
                                  {{$video->room->title}}
                              @endforeach
                            </td>
                            <td>
                                @if($video->status=='active')
                                    <span class="badge badge-success">{{$video->status}}</span>
                                @else
                                    <span class="badge badge-warning">{{$video->status}}</span>
                                @endif
                            </td>
                            <td>
                              <a href="{{route('video.edit',$video->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-edit"></i></a>
                          <form method="POST" action="{{route('room.destroy',[$video->id])}}">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$video->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                              </form>
                          </td>
                        </tr>  
                    @endforeach
                  </tbody>
                </table>
                <span style="float:right">{{$videos->links()}}</span>
                @else
                  <h6 class="text-center">No Videos found!!! Please create video</h6>
                @endif
              <!-- END DATA TABLE -->
          </div>
        </div>
      </div>
  </div>
</div>

@endsection

