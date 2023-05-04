@extends('frontend.layouts.master')
@section('title') {{ __('header.book_title') }} @endsection
@section('main-content')
@include('frontend.layouts.notification')

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>{{ __('header.book_title') }} </h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">{{ __('header.home_title') }}</a>
                        <span>{{ __('header.book_title') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
    
<!-- Start Booking -->

<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-1">
                <form class="contact-form" method="post" action="{{route('checkout.store')}}" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_fn') }}<span>*</span></label>
                                <input type="text" name="first_name" placeholder="" class="form-control" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                @error('first_name')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_ln') }}<span>*</span></label>
                                <input type="text" name="last_name" class="form-control" placeholder="" value="{{old('last_name')}}">
                                @error('last_name')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="room_id">{{ __('header.book_form_room') }} <span class="text-danger">*</span></label>
                                <br>
                                <select name="room_id" class="form-control">
                                    <option value="">Select Room</option>
                                    @foreach($rooms as $key=>$data)
                                        <option value='{{$data->id}}'>{{$data->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_email') }}<span>*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="" value="{{old('email')}}">
                                @error('email')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_phone') }} <span>*</span></label>
                                <input type="number" name="phone" class="form-control" placeholder="" required value="{{old('phone')}}">
                                @error('phone')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_country') }} <span>*</span></label>
                                <input type="text" name="country" class="form-control" placeholder="" required value="{{old('country')}}">
                                @error('country')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_add1') }}<span>*</span></label>
                                <input type="text" class="form-control" name="address1" placeholder="" value="{{old('address1')}}">
                                @error('address1')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_postal') }}</label>
                                <input type="text" class="form-control" name="post_code" placeholder="" value="{{old('post_code')}}">
                                @error('post_code')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_fax') }} <span>*</span></label>
                                <input type="text" name="fax" class="form-control" placeholder="" required value="{{old('fax')}}">
                                @error('fax')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_num_adult') }}</label>
                                <input type="text" class="form-control" name="number_of_adults" placeholder="" value="{{old('number_of_adults')}}">
                                @error('number_of_adults')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_num_kid') }}</label>
                                <input type="text" class="form-control" name="number_of_kids" placeholder="" value="{{old('number_of_kids')}}">
                                @error('number_of_kids')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_arrival_date') }}</label>
                                <input type="date" class="form-control" name="arrival_date" placeholder="" value="{{old('arrival_date')}}">
                                @error('arrival_date')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_arrival_time') }}</label>
                                <input type="time" class="form-control" name="arrival_time" placeholder="" value="{{old('arrival_time')}}">
                                @error('arrival_time')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>{{ __('header.book_form_departure_date') }}</label>
                                <input type="date" class="form-control" name="departure_date" placeholder="" value="{{old('departure_date')}}">
                                @error('departure_date')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit">{{ __('header.contact_button') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- End Booking -->

        
@endsection

