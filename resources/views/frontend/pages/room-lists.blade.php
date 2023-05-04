@extends('frontend.layouts.master')
@section('title') {{ __('header.hall_title') }} @endsection
@section('main-content')
@include('frontend.layouts.notification')

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>{{ __('header.our_hall') }}</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">{{ __('header.home_title') }}</a>
                        <span>{{ __('header.hall_title') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Rooms Section Begin -->
<form action="{{route('room.filter')}}" method="POST">
    @csrf
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3">
                    <!-- Room Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categories</div>
                            <ul class="sidebar_categories">
                                @php
                                    // $category = new Category();
                                    $menu=App\Models\Category::getAllParentWithChild();
                                @endphp
                                @if($menu)
                                <li>
                                    @foreach($menu as $cat_info)
                                            @if($cat_info->child_cat->count()>0)
                                                <li><a href="{{route('room-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                                    <ul>
                                                        @foreach($cat_info->child_cat as $sub_menu)
                                                            <li><a href="{{route('room-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a href="{{route('room-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
                                            @endif
                                    @endforeach
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Price</div>
                            <div class="filter_price">
                                @php
                                    $max=DB::table('rooms')->max('price');
                                    // dd($max);
                                @endphp
                                <div id="slider-range" class="slider_range" data-min="0" data-max="{{$max}}"></div>
                                <p>Range: </p>
                                <p>
                                    <input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;">
                                </p>
                                <p>
                                    <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif"/>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @if(count($rooms)>0)
                    @foreach($rooms as $room)
                        <div class="col-lg-4 col-md-6">
                            <div class="room-item">
                                @php
                                    $photo=explode(',',$room->photo);
                                @endphp
                                <img src="{{ Storage::url($room->photo) }}" alt="{{ Storage::url($room->photo) }}">
                                <div class="ri-text">
                                    <h4>{{$room->title}}</h4>
                                    @php
                                        $after_discount=($room->price-($room->price*$room->discount)/100);
                                    @endphp
                                    <h3>{{number_format($room->price,2)}} FBU<span>/Pernight</span></h3>
                                    @php
                                        $rate=ceil($room->getReview->avg('rate'))
                                    @endphp
                                    <div class="rating">
                                        @for($i=1; $i<=5; $i++)
                                            @if($rate>=$i)
                                                <i class="icon_star"></i>
                                            @else 
                                                <i class="icon_star-half_alt"></i>
                                            @endif
                                        @endfor
                                        <div>({{$room['getReview']->count()}}) {{ __('about.review') }}</div>
                                    </div>
                                    <table>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <a href="{{route('room-detail',$room->slug)}}" class="primary-btn">{{ __('about.more_btn') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                        <h4 class="text-warning" style="margin:100px auto;">There are no rooms.</h4>
                @endif
                <div class="col-lg-12">
                    <div class="room-pagination">
                        {{-- {{$rooms->appends($_GET)->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<!-- Rooms Section End -->

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
