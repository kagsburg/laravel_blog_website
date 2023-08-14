@extends('backend.layouts.master')
@section('title','Edit Testimonial')
@section('main-content')
@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Testimonial</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('testimonial.update',$category->id)}}" enctype="multipart/form-data">
                      @csrf 
                      @method('PATCH')
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="name" placeholder=""  value="{{$testimonial->name}}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Position <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="position" placeholder=""  value="{{$testimonial->position}}" class="form-control">
                        @error('position')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="message" class="col-form-label">Message</label>
                        <textarea class="form-control" id="message" name="message">{{$testimonial->message}}</textarea>
                        @error('message')
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
                        <input class="form-control" type="file" name="photo" value="{{$testimonial->photo}}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <img src="{{ Storage::url($category->photo) }}" height="75" width="75" alt="" />
                      </div>
                      
                      <div class="form-group">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{(($category->status=='active')? 'selected' : '')}}>Active</option>
                            <option value="inactive" {{(($category->status=='inactive')? 'selected' : '')}}>Inactive</option>
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

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
<script>
  $('#is_parent').change(function(){
    var is_checked=$('#is_parent').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>
@endpush