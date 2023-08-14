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
                    <strong>{{ __('sidebar.add_post') }}</strong>
                </div>
                <div class="card-body card-block">
                  <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label for="inputTitle" class="col-form-label">{{ __('sidebar.post_title') }} <span class="text-danger">*</span></label>
                      <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                      @error('title')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="quote" class="col-form-label">Quote</label>
                      <textarea class="form-control" id="quote" name="quote">{{old('quote')}}</textarea>
                      @error('quote')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="summary" class="col-form-label">{{ __('sidebar.post_summary') }} <span class="text-danger">*</span></label>
                      <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
                      @error('summary')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="description" class="col-form-label">Details</label>
                      <textarea class="form-control " id="description" name="description">{{old('description')}}</textarea>
                      @error('description')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="post_cat_id">{{ __('sidebar.post_category') }} <span class="text-danger">*</span></label>
                      <select name="post_cat_id" class="form-control">
                          <option value="">----</option>
                          @foreach($categories as $key=>$data)
                              <option value='{{$data->id}}'>{{$data->title}}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="tags">{{ __('sidebar.post_tag') }}</label>
                      <select name="tags[]" multiple  data-live-search="true" class="form-control selectpicker">
                          <option value="">----</option>
                          @foreach($tags as $key=>$data)
                              <option value='{{$data->title}}'>{{$data->title}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="added_by">{{ __('sidebar.post_author') }}</label>
                      <select name="added_by" class="form-control">
                          <option value="">----</option>
                          @foreach($users as $key=>$data)
                            <option value='{{$data->id}}' {{($key==0) ? 'selected' : ''}}>{{$data->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="inputPhoto" class="col-form-label">{{ __('sidebar.post_photo') }} <span class="text-danger">*</span></label>
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
                      <label for="status" class="col-form-label">{{ __('sidebar.post_status') }} <span class="text-danger">*</span></label>
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

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    // $('#lfm').filemanager('image');

    // $(document).ready(function() {
    //   $('#summary').summernote({
    //     placeholder: "Write short description.....",
    //       tabsize: 2,
    //       height: 100
    //   });
    // });

    // $(document).ready(function() {
    //   $('#description').summernote({
    //     placeholder: "Write detail description.....",
    //       tabsize: 2,
    //       height: 150
    //   });
    // });

    // $(document).ready(function() {
    //   $('#quote').summernote({
    //     placeholder: "Write detail Quote.....",
    //       tabsize: 2,
    //       height: 100
    //   });
    // });
    // $('select').selectpicker();

</script>


<script src="//cdn.ckeditor.com/4.22.1/standard-all/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
  
    CKEDITOR.replace('description', {
      height: 250,
      extraPlugins: 'colorbutton',
    });
    });
</script>
@endpush

