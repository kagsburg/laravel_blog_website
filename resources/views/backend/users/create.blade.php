@extends('backend.layouts.master')
@section('title') {{ __('sidebar.add_user') }} @endsection
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>{{ __('sidebar.add_user') }}</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">{{ __('sidebar.user_name') }}</label>
                      <input id="inputTitle" type="text" name="name" placeholder=""  value="{{old('name')}}" class="form-control">
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>

                      <div class="form-group">
                          <label for="inputEmail" class="col-form-label">{{ __('sidebar.user_email') }}</label>
                        <input id="inputEmail" type="email" name="email" placeholder=""  value="{{old('email')}}" class="form-control">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                          <label for="inputPassword" class="col-form-label">{{ __('sidebar.user_password') }}</label>
                        <input id="inputPassword" type="password" name="password" placeholder=""  value="{{old('password')}}" class="form-control">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                      <label for="inputPhoto" class="col-form-label">{{ __('sidebar.user_photo') }}</label>
                      <div class="input-group">
                          {{-- <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                              <i class="fa fa-picture-o"></i> Choose
                              </a>
                          </span>
                          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}"> --}}
                          <input class="form-control" type="file" name="photo">
                      </div>
                      <img id="holder" style="margin-top:15px;max-height:100px;">
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      @php 
                      $roles=DB::table('users')->select('role')->get();
                      @endphp
                      <div class="form-group">
                          <label for="role" class="col-form-label">{{ __('sidebar.user_role') }}</label>
                          <select name="role" class="form-control">
                              <option value="">-----Select Role-----</option>
                              @foreach($roles as $role)
                                  <option value="{{$role->role}}">{{$role->role}}</option>
                              @endforeach
                          </select>
                        @error('role')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                          <label for="status" class="col-form-label">{{ __('sidebar.user_status') }}</label>
                          <select name="status" class="form-control">
                              <option value="active">Active</option>
                              <option value="inactive">Inactive</option>
                          </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                      <div class="form-group mb-3">
                        <button type="reset" class="btn btn-warning">{{ __('sidebar.user_reset') }}</button>
                        <button class="btn btn-success" type="submit">{{ __('sidebar.user_submit') }}</button>
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

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush