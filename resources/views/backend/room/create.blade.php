@extends('backend.layouts.master')
@section('title') {{ __('sidebar.add_hall') }} @endsection
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>{{ __('sidebar.add_hall') }}</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('room.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">{{ __('sidebar.hall_title') }} <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder=""  value="{{old('title')}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="description" class="col-form-label">{{ __('sidebar.hall_desc') }}</label>
                        <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>


                      <div class="form-group">
                        <label for="is_featured">{{ __('sidebar.hall_featured') }}</label><br>
                        <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes                        
                      </div>

                      <div class="form-group">
                        <label for="price" class="col-form-label">Price(FBU) <span class="text-danger">*</span></label>
                        <input id="price" type="number" name="price" placeholder=""  value="{{old('price')}}" class="form-control">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">{{ __('sidebar.hall_photo') }}/s <span class="text-danger">*</span></label>
                        <div class="input-group">
                          <input type="file" id="file-input" name="photo" class="form-control-file">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                      @error('photo')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="status" class="col-form-label">{{ __('sidebar.hall_status') }} <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <button type="reset" class="btn btn-warning">{{ __('sidebar.hall_reset') }}</button>
                        <button class="btn btn-success" type="submit">{{ __('sidebar.hall_submit') }}</button>
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

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
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
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush