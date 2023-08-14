@extends('backend.layouts.master')
@section('title') {{ __('sidebar.add_service') }} @endsection
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>{{ __('sidebar.add_service') }}</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">{{ __('sidebar.service_title') }}</label>
                        <input id="inputTitle" type="text" name="title" placeholder=""  value="{{old('title')}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="summary" class="col-form-label">{{ __('sidebar.service_summary') }}</label>
                        <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
                        @error('summary')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">{{ __('sidebar.service_photo') }} (Size: 182px X 232px)</label>
                        <div class="input-group">
                            {{-- <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}"> --}}
                        <input class="form-control" type="file" name="photo">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="status" class="col-form-label">{{ __('sidebar.service_status') }}</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <button type="reset" class="btn btn-warning">{{ __('sidebar.service_reset') }}</button>
                        <button class="btn btn-success" type="submit">{{ __('sidebar.service_submit') }}</button>
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
