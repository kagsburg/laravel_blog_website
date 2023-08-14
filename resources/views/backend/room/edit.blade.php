@extends('backend.layouts.master')
@section('title','Edit Room')
@section('main-content')

@include('backend.layouts.notification')

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <strong>Edit Room</strong>
                  </div>
                  <div class="card-body card-block">
                    <form method="post" action="{{route('room.update',$room->id)}}" enctype="multipart/form-data">
                      @csrf 
                      @method('PATCH')
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder=""  value="{{$room->title}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{$room->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>


                      <div class="form-group">
                        <label for="is_featured">Is Featured</label><br>
                        <input type="checkbox" name='is_featured' id='is_featured' value='{{$room->is_featured}}' {{(($room->is_featured) ? 'checked' : '')}}> Yes                        
                      </div>

                      <div class="form-group">
                        <label for="price" class="col-form-label">Price(TSHS) <span class="text-danger">*</span></label>
                        <input id="price" type="number" name="price" placeholder=""  value="{{$room->price}}" class="form-control">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      @php 
                        $room_amenities=explode(',',$room->amenities);
                      @endphp
                      <div class="form-group">
                        <label for="amenities">Amenities</label>
                        <select name="amenities[]" multiple  data-live-search="true" class="form-control selectpicker">
                            <option value="">----</option>
                            @foreach($amenities as $key=>$data)
                            
                            <option value="{{$data->name}}"  {{(( in_array( "$data->name",$room_amenities ) ) ? 'selected' : '')}}>{{$data->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Profile Photo (Size 458px x 360px)</label>
                        <div class="input-group">
                          <input type="file" id="file-input" name="photo" value="{{$room->photo}}" class="form-control-file">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        @error('photo')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <img src="{{ Storage::url($room->photo) }}" height="75" width="75" alt="" />
                      </div>
                      
                      <div class="form-group">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                          <option value="active" {{(($room->status=='active')? 'selected' : '')}}>Active</option>
                          <option value="inactive" {{(($room->status=='inactive')? 'selected' : '')}}>Inactive</option>
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
        height: 150
    });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail Description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>

<script>
  var  child_cat_id='{{$room->child_cat_id}}';
        // alert(child_cat_id);
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                // ajax call
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(response){
                        if(typeof(response)!='object'){
                            response=$.parseJSON(response);
                        }
                        var html_option="<option value=''>--Select any one--</option>";
                        if(response.status){
                            var data=response.data;
                            if(response.data){
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected ' : '')+">"+title+"</option>";
                                });
                            }
                            else{
                                console.log('no response data');
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

        });
        if(child_cat_id!=null){
            $('#cat_id').change();
        }
</script>
@endpush