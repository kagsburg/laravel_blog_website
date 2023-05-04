@extends('backend.layouts.master')
@section('title','Settings')
@section('title') {{ __('sidebar.dashboard') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Settings</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('settings.update')}}" enctype="multipart/form-data">
                      @csrf 
                      {{-- @method('PATCH') --}}
                      {{-- {{dd($data)}} --}}
                      <div class="form-group">
                        <label for="short_des" class="col-form-label">{{ __('header.setting_short_desc') }} <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="quote" name="short_des">{{$data->short_des}}</textarea>
                        @error('short_des')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description" class="col-form-label">{{ __('header.setting_desc') }} <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">{{ __('header.setting_logo') }} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            {{-- <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{$data->logo}}"> --}}
                        <input class="form-control" type="file" name="logo" value="{{$data->logo}}">
                      </div>
                      <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

                        @error('logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <img src="{{ Storage::url($data->logo) }}" height="75" width="75" alt="" />
                      </div>

                      <div class="form-group">
                        <label for="address" class="col-form-label">{{ __('header.setting_address') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="address" required value="{{$data->address}}">
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('header.setting_email') }} <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" required value="{{$data->email}}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="phone" class="col-form-label">{{ __('header.setting_number') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" required value="{{$data->phone}}">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group mb-3">
                          <button class="btn btn-success" type="submit">{{ __('header.setting_update') }}</button>
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

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');
    $('#lfm1').filemanager('image');
    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
@endpush