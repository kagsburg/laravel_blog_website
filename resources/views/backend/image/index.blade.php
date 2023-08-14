@extends('backend.layouts.master')
@section('title') {{ __('sidebar.room_photo_title_name') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35"> {{ __('sidebar.room_photo_title_name') }}</h3>
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
                      <a href="{{route('image.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">                      
                      <i class="zmdi zmdi-plus"></i>{{ __('sidebar.add_room_photo') }}</a>
                  </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                @if(count($images)>0)
                <table class="table table-data2" id="room-dataTable">
                  <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>{{ __('sidebar.photo_name') }}</th>
                      <th>{{ __('sidebar.photo_size') }}</th>
                      <th>{{ __('sidebar.photo_path') }}</th>
                      <th>{{ __('sidebar.photo_room') }}</th>
                      <th>{{ __('sidebar.photo_caption') }}</th>
                      <th>{{ __('sidebar.photo_status') }}</th>
                      <th>{{ __('sidebar.photo_action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($images as $image)
                        @php 
                            $room=DB::table('rooms')->select('title')->where('id',$image->room_id)->get();
                        @endphp  
                        <tr class="tr-shadow">
                            <td>{{$image->id}}</td>
                            <td>{{ $image->name }}</td>
                            <td> 
                                @if($image->size < 1000)
                                    {{ number_format($document->size,2) }} bytes
                                @elseif($image->size >= 1000000)
                                    {{ number_format($image->size/1000000,2) }} mb
                                @else
                                    {{ number_format($image->size/1000,2) }} kb
                                @endif
                            </td>
                            <td><a href="{{ $image->path }}">{{ $image->path }}</a></td>
                            <td>
                              @foreach($room as $data)
                                  {{$image->room->title}}
                              @endforeach
                            </td>
                            <td>{{$image->caption}}</td>
                            <td>
                                @if($image->status=='active')
                                    <span class="badge badge-success">{{$image->status}}</span>
                                @else
                                    <span class="badge badge-warning">{{$image->status}}</span>
                                @endif
                            </td>
                            <td>
                              <a href="{{route('image.edit',$image->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-edit"></i></a>
                          <form method="POST" action="{{route('image.destroy',[$image->id])}}">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$image->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></button>
                              </form>
                          </td>
                        </tr>  
                    @endforeach
                  </tbody>
                </table>
                <span style="float:right">{{$images->links()}}</span>
                @else
                  <h6 class="text-center">No Image found!!! Please create image</h6>
                @endif
              <!-- END DATA TABLE -->
          </div>
        </div>
      </div>
  </div>
</div>

@endsection

