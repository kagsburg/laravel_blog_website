@extends('backend.layouts.master')
@section('title','Show Order')
@section('main-content')

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
                <strong>Show Order</strong>
            </div>
            <div class="card-body card-block">
              @if($order)
                  <div class="py-4"><b>From</b> <br>
                    First Name :&nbsp;&nbsp;{{$order->first_name}}<br>
                    Last Name :&nbsp;&nbsp;{{$order->last_name}}<br>
                    Email :&nbsp;&nbsp;{{$order->email}}<br>
                    Phone :&nbsp;&nbsp;{{$order->phone}}<br>
                    Country :&nbsp;&nbsp;{{$order->country}}<br>
                    Post Code :&nbsp;&nbsp;{{$order->post_code}}<br>
                    Address1 :&nbsp;&nbsp;{{$order->address1}}<br>
                    Address2 :&nbsp;&nbsp;{{$order->address2}}<br>
                    Room :&nbsp;&nbsp;{{$order->room->title}}<br>
                    Fax :&nbsp;&nbsp;{{$order->fax}}<br>
                    Number of Adults :&nbsp;&nbsp;{{$order->number_of_adults}}<br>
                    Number of Kids :&nbsp;&nbsp;{{$order->number_of_adults}}<br>
                    Arrival Date :&nbsp;&nbsp;{{$order->arrival_date}}<br>
                    Arrival Time :&nbsp;&nbsp;{{$order->arrival_time}}<br>
                    Departure Date :&nbsp;&nbsp;{{$order->departure_date}}
                  </div>
                  <hr/>
                  <h5 class="text-center" style="text-decoration:underline"><strong>Name :</strong> {{$order->first_name}} - {{$order->last_name}}</h5>
                  <p class="py-5">{{$order->order}}</p>

              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection