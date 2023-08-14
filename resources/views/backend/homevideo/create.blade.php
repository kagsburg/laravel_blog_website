@extends('backend.layouts.master')
@section('title') Add Home Video @endsection
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Add Home Video</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('homevideo.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Embedded Link <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="link" placeholder=""  value="{{old('link')}}" class="form-control">
                        @error('link')
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
