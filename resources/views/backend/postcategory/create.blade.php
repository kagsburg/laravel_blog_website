@extends('backend.layouts.master')
@section('title') {{ __('sidebar.add_post') }} @endsection
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>{{ __('sidebar.add_post_category') }}</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('post-category.store')}}">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">{{ __('sidebar.post_title') }}</label>
                        <input id="inputTitle" type="text" name="title" placeholder=""  value="{{old('title')}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="status" class="col-form-label">{{ __('sidebar.post_status') }}</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <button type="reset" class="btn btn-warning">{{ __('sidebar.post_reset') }}</button>
                        <button class="btn btn-success" type="submit">{{ __('sidebar.post_submit') }}</button>
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
