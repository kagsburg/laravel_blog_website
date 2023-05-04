@extends('backend.layouts.master')
@section('title') {{ __('sidebar.add_room_photo') }} @endsection
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>{{ __('sidebar.add_room_photo') }}</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('image.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="room_id"> {{ __('sidebar.photo_room') }}<span class="text-danger">*</span></label>
                        <select name="room_id" class="form-control">
                            <option value="">----</option>
                            @foreach($rooms as $key=>$data)
                                <option value='{{$data->id}}'>{{$data->title}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">{{ __('sidebar.add_photo') }}</label>
                        <div class="input-group">
                            {{-- <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}"> --}}
                        <input class="form-control" type="file" name="file[]" multiple>
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="status" class="col-form-label">{{ __('sidebar.photo_status') }}</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <button type="reset" class="btn btn-warning">{{ __('sidebar.photo_reset') }}</button>
                        <button class="btn btn-success" type="submit">{{ __('sidebar.photo_submit') }}</button>
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
