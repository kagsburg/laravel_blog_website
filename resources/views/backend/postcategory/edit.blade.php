@extends('backend.layouts.master')
@section('title','Edit Post Category')
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Post Category</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('post-category.update',$postCategory->id)}}">
                      @csrf 
                      @method('PATCH')
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Title</label>
                        <input id="inputTitle" type="text" name="title" placeholder=""  value="{{$postCategory->title}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select name="status" class="form-control">
                          <option value="active" {{(($postCategory->status=='active') ? 'selected' : '')}}>Active</option>
                          <option value="inactive" {{(($postCategory->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
