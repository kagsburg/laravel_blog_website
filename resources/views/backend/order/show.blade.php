@extends('backend.layouts.master')
@section('title','Show Booking')
@section('main-content')

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
                <strong>Show Booking</strong>
            </div>
            <div class="card-body card-block">
              @if($order)
                  <div class="py-4"><b>From</b> <br>
                    Full Name :&nbsp;&nbsp;{{$order->name}}<br>
                    {{-- First Name :&nbsp;&nbsp;{{$order->first_name}}<br>
                    Last Name :&nbsp;&nbsp;{{$order->last_name}}<br> --}}
                    Email :&nbsp;&nbsp;{{$order->email}}<br>
                    {{-- Phone :&nbsp;&nbsp;{{$order->phone}}<br> --}}
                    Country :&nbsp;&nbsp;{{$order->country}}<br>
                    {{-- Post Code :&nbsp;&nbsp;{{$order->post_code}}<br>
                    Address1 :&nbsp;&nbsp;{{$order->address1}}<br>
                    Address2 :&nbsp;&nbsp;{{$order->address2}}<br> --}}
                    Room :&nbsp;&nbsp;{{$order->room->title}}<br>
                    {{-- Fax :&nbsp;&nbsp;{{$order->fax}}<br> --}}
                    Guests :&nbsp;&nbsp;{{$order->number_of_adults}}<br>
                    {{-- Number of Kids :&nbsp;&nbsp;{{$order->number_of_adults}}<br> --}}
                    Check in Date :&nbsp;&nbsp;{{$order->arrival_date}}<br>
                    {{-- Arrival Time :&nbsp;&nbsp;{{$order->arrival_time}}<br> --}}
                    Check out Date :&nbsp;&nbsp;{{$order->departure_date}}
                  </div>
                  <hr/>
                  {{-- <h5 class="text-center" style="text-decoration:underline"><strong>Full Name :</strong> {{$order->name}}</h5> --}}
                  <p class="py-5">{{$order->order}}</p>
                  <button><a href=" https://chatobeachresort.info:2096" target="_blank">Reply</a></button>

              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection