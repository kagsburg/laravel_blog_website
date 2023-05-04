@extends('backend.layouts.master')
@section('title','Edit Service')
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Service</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data">
                      @csrf 
                      @method('PATCH')
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Title</label>
                        <input id="inputTitle" type="text" name="title" placeholder=""  value="{{$service->title}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="summary" class="col-form-label">Summary</label>
                        <textarea class="form-control" id="summary" name="summary">{{$service->summary}}</textarea>
                        @error('summary')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
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
                        <input class="form-control" type="file" name="photo" value="{{$service->photo}}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <img src="{{ Storage::url($service->photo) }}" height="75" width="75" alt="" />
                      </div>

                      <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select name="status" class="form-control">
                          <option value="active" {{(($service->status=='active') ? 'selected' : '')}}>Active</option>
                          <option value="inactive" {{(($service->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
