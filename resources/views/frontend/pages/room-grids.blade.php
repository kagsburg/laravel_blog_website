@extends('frontend.layouts.master')
@section('title') {{ __('header.hall_title') }} @endsection
@section('main-content')
@include('frontend.layouts.notification')

<div class="hero-wrap" style="background-image: url('{{ asset('frontend/images/room-cover.jpeg') }}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
                <p class="breadcrumbs mb-2">
                    <span class="mr-2"><a href="{{ route('home') }}">Home</a></span> 
                    <span>Rooms</span>
                </p>
                <h1 class="mb-4 bread">Rooms</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Welcome to Chato Beach Resort Rooms</span>
            <h2 class="mb-4">Our Rooms</h2>
          </div>
        </div>  
            <div class="row no-gutters">
                @if(count($rooms)>0)
                    @foreach($rooms as $room)
                        <div class="col-lg-6">
                            <div class="room-wrap d-md-flex ftco-animate">
                                @php
                                    $photo=explode(',',$room->photo);
                                @endphp
                                <a href="{{route('room-detail',$room->slug)}}" class="img" style="background-image: url({{ Storage::url($room->photo) }});"></a>
                                <div class="half left-arrow d-flex align-items-center">
                                    <div class="text p-4 text-center">
                                        {{-- @php
                                            $rate=ceil($room->getReview->avg('rate'))
                                        @endphp
                                        <div class="rating">
                                            <p class="star mb-0">
                                                @for($i=1; $i<=5; $i++)
                                                    @if($rate>=$i)
                                                        <i class="ion-ios-star"></i>
                                                    @else 
                                                        <i class="ion-ios-star-o"></i>
                                                    @endif
                                                @endfor
                                            </p>
                                            <div>({{$room['getReview']->count()}}) {{ __('about.review') }}</div>
                                        </div> --}}
                                        @php
                                            $after_discount=($room->price-($room->price*$room->discount)/100);
                                        @endphp
                                        <p class="mb-0"><span class="price mr-1">TSHS {{number_format($room->price,2)}}</span> <span class="per">per night</span></p>
                                        <h3 class="mb-3"><a href="{{route('room-detail',$room->slug)}}">{{$room->title}}</a></h3>
                                        <p class="pt-1"><a href="{{route('room-detail',$room->slug)}}" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-warning" style="margin:100px auto;">There are no rooms.</h4>
                @endif
                <div class="col-lg-12">
                    <div class="room-pagination">
                        {{$rooms->appends($_GET)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('styles')
<style>
    .pagination{
        display:inline-flex;
    }
    .filter_button{
        /* height:20px; */
        text-align: center;
        background:#F7941D;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
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
							// document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}
    <script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>
@endpush
