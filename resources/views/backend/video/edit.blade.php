@extends('backend.layouts.master')
@section('title','Edit Video')
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Video</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('video.update',$video->id)}}" enctype="multipart/form-data">
                      @csrf 
                      @method('PATCH')
                      <div class="form-group">
                        <label for="room_id"> Room <span class="text-danger">*</span></label>
                        <select name="room_id" class="form-control">
                            <option value="">----</option>
                            @foreach($rooms as $key=>$data)
                                <option value='{{$data->id}}' {{(($data->id==$video->room_id)? 'selected' : '')}}>{{$data->title}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Embedded Link  <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="link" placeholder=""  value="{{$video->link}}" class="form-control">
                        @error('link')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select name="status" class="form-control">
                          <option value="active" {{(($video->status=='active') ? 'selected' : '')}}>Active</option>
                          <option value="inactive" {{(($video->status=='inactive') ? 'selected' : '')}}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <button class="btn btn-success" type="submit">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>

@endsection
