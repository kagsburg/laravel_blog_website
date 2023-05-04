@extends('backend.layouts.master')
@section('title','Edit Add Photos to Room')
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Add Photos to Room</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('image.update',$image->id)}}" enctype="multipart/form-data">
                      @csrf 
                      @method('PATCH')
                      <div class="form-group">
                        <label for="room_id"> Room <span class="text-danger">*</span></label>
                        <select name="room_id" class="form-control">
                            <option value="">----</option>
                            @foreach($rooms as $key=>$data)
                                <option value='{{$data->id}}' {{(($data->id==$image->room_id)? 'selected' : '')}}>{{$data->title}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Photo</label>
                        <div class="input-group">
                            {{-- <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$category->photo}}"> --}}
                        <input class="form-control" type="file" name="file[]" value="{{$image->images}}" multiple>
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <img src="{{ asset('/storage/' . $image->name) }}" height="75" width="75" alt="{{ asset('/storage/' . $image->name) }}" />
                      </div>

                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Caption <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="caption" placeholder=""  value="{{$image->caption}}" class="form-control">
                        @error('caption')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                      <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select name="status" class="form-control">
                          <option value="active" {{(($image->status=='active') ? 'selected' : '')}}>Active</option>
                          <option value="inactive" {{(($image->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
