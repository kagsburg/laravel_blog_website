@extends('backend.layouts.master')

@section('title','Comment Edit')

@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Post Comment</strong>
                  </div>
                  <div class="card-body card-block">
                    <form action="{{route('comment.update',$comment->id)}}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="form-group">
                        <label for="name">By:</label>
                        <input type="text" disabled class="form-control" value="{{$comment->user_info->name}}">
                      </div>
                      <div class="form-group">
                        <label for="comment">comment</label>
                      <textarea name="comment" id="" cols="20" rows="10" class="form-control">{{$comment->comment}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="status">Status :</label>
                        <select name="status" id="" class="form-control">
                          <option value="">--Select Status--</option>
                          <option value="active" {{(($comment->status=='active')? 'selected' : '')}}>Active</option>
                          <option value="inactive" {{(($comment->status=='inactive')? 'selected' : '')}}>Inactive</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
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
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }
</style>
@endpush