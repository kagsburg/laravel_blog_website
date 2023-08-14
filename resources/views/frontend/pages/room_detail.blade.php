@extends('frontend.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{$room_detail->description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="{{route('room-detail',$room_detail->id)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$room_detail->title}}">
	<meta property="og:image" content="{{$room_detail->photo}}">
	<meta property="og:description" content="{{$room_detail->description}}">
@endsection
@section('title') {{$room_detail->title}} @endsection
@section('main-content')


<div class="hero-wrap" style="background-image: url('{{ asset('frontend/images/room-detail.jpeg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
        <div class="text">
            <p class="breadcrumbs mb-2">
              <span class="mr-2"><a href="{{ route('home') }}">Home</a></span> 
              <span class="mr-2"><a href="{{ route('room-grids')}}">Rooms</a></span> 
              <span>{{$room_detail->title}}</span>
            </p>
            <h1 class="mb-4 bread">{{$room_detail->title}}</h1>
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.layouts.notification')

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-12 ftco-animate">
              <div class="single-slider owl-carousel">
                @if($room_detail->images)
                  @foreach($room_detail->images as $image)
                    <div class="item">
                        <div class="room-img" style="background-image: url({{ asset('/storage/' . $image->name) }});"></div>
                    </div>
                  @endforeach
                @endif
              </div>
          </div>

          <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
            <h2 class="mb-4">{{$room_detail->title}}</h2>
            <p>{!! ($room_detail->description) !!}</p>
            {{-- @php
                $rate=ceil($room_detail->getReview->avg('rate'))
            @endphp
            <div class="rating">
                @for($i=1; $i<=5; $i++)
                    @if($rate>=$i)
                        <i class="icon_star"></i>
                    @else 
                        <i class="icon_star-half_alt"></i>
                    @endif
                @endfor
                <div>({{$room_detail['getReview']->count()}}) Review</div>
            </div> --}}

            @php 
              $amen=DB::table('amenities')->select('name')->where('id',$room_detail->amenities_id)->get();
            @endphp
            <div class="d-md-flex mt-5 mb-5">
                <ul class="list">
                    <li><span><h2>{{number_format($room_detail->price,2)}} TSHS </span>/Pernight</h2></li>
                    <br>

                    <li><h3>Amenities</h3></li>
                    @php
                        $amenities=explode(',',$room_detail->amenities);
                    @endphp
                    @foreach($amenities as $amen)
                    <li><span>{{$amen}}</span>
                    @endforeach
                </ul>
                {{-- <ul class="list ml-md-5">
                    <li><span>View:</span> Sea View</li>
                    <li><span>Bed:</span> 1</li>
                </ul> --}}
            </div>
            {{-- <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p> --}}
          </div>

          <div class="col-md-12 room-single ftco-animate mb-5 mt-4">
              <h3 class="mb-4">Take A Tour</h3>
              <div class="block-16">
                <figure>
                  {{-- <img src="{{ asset('frontend/images/room-4.jpg') }}" alt="Image placeholder" class="img-fluid">
                  <a href="{{$room_detail->video->link}}" class="play-button popup-vimeo">
                    <span class="icon-play"></span>
                  </a> --}}

                      <iframe width="600" height="400" 
                      src="{{$room_detail->video->link}}" 
                      title="" 
                      frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                      allowfullscreen></iframe>
                </figure>
              </div>
          </div>

          {{-- <div class="rd-reviews">
            <h4>Overall {{ceil($room_detail->getReview->avg('rate'))}} 
                <span>Based on {{$room_detail->getReview->count()}} Comments</span>
            </h4>
            @foreach($room_detail['getReview'] as $data)
                <div class="review-item">
                    <div class="ri-pic">
                        @if($data->user_info['photo'])
                            <img src="{{ Storage::url($data->user_info['photo']) }}" alt="{{ Storage::url($data->user_info['photo']) }}" style="width: 100px; height: 100px;">
                        @else 
                            <img src="{{asset('backend/images/icon/avatar-01.jpg')}}" alt="Profile.jpg">
                        @endif
                    </div>
                    <div class="ri-text">
                        <div class="rating">
                            @for($i=1; $i<=5; $i++)
                                @if($data->rate>=$i)
                                    <i class="icon_star"></i>
                                @else 
                                    <i class="icon_star-o"></i>
                                @endif
                            @endfor
                            <div class="rate-count">(<span>{{$data->rate}}</span>)</div>
                        </div>
                        <h5>{{$data->user_info['name']}}</h5>
                        <p>{{$data->review}}</p>
                    </div>
                </div>
            @endforeach
          </div> --}}

          {{-- <div class="col-md-12 properties-single ftco-animate mb-5 mt-4"> --}}
              {{-- <h4 class="mb-4">Review &amp; Ratings</h4> --}}

              {{-- @auth
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form class="star-rating" action="{{route('review.store',$room_detail->slug)}}" method="POST">
                  @csrf

                  <h5>You Rating:</h5>
                  <div class="rating">
                          <input class="icon_star" id="star-rating-1" type="radio" name="rate" value="1" for="star-rating-1" title="1 out of 5 stars">
                          <input class="icon_star" id="star-rating-2" type="radio" name="rate" value="2" for="star-rating-2" title="2 out of 5 stars">
                          <input class="icon_star" id="star-rating-3" type="radio" name="rate" value="3" for="star-rating-3" title="3 out of 5 stars">
                          <input class="icon_star" id="star-rating-4" type="radio" name="rate" value="4" for="star-rating-4" title="4 out of 5 stars">
                          <input class="icon_star" id="star-rating-5" type="radio" name="rate" value="5" for="star-rating-5" title="5 out of 5 stars">
                          @error('rate')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="review" id="review" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Submit" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div> --}}

              {{-- @else
              <p class="text-center p-5">
                  You need to <a href="{{route('admin')}}" style="color:rgb(54, 54, 204)">Login</a> for comment.
              </p> --}}
              <!--/ End Form -->
              {{-- @endauth --}}

            </div>
          </div>
        </div>
      </div> <!-- .col-md-8 -->
      {{-- <div class="col-lg-4 sidebar ftco-animate pl-md-5">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon ion-ios-search"></span>
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Categories</h3>
            <li><a href="#">Properties <span>(12)</span></a></li>
            <li><a href="#">Home <span>(22)</span></a></li>
            <li><a href="#">House <span>(37)</span></a></li>
            <li><a href="#">Villa <span>(42)</span></a></li>
            <li><a href="#">Apartment <span>(14)</span></a></li>
            <li><a href="#">Condominium <span>(140)</span></a></li>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> Oct 30, 2019</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> Oct 30, 2019</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> Oct 30, 2019</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag Cloud</h3>
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">dish</a>
            <a href="#" class="tag-cloud-link">menu</a>
            <a href="#" class="tag-cloud-link">food</a>
            <a href="#" class="tag-cloud-link">sweet</a>
            <a href="#" class="tag-cloud-link">tasty</a>
            <a href="#" class="tag-cloud-link">delicious</a>
            <a href="#" class="tag-cloud-link">desserts</a>
            <a href="#" class="tag-cloud-link">drinks</a>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Paragraph</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
        </div>
      </div> --}}
    </div>
  </div>
</section> <!-- .section -->

@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            // alert(quantity);
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}

@endpush
