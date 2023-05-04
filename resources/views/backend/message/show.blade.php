@extends('backend.layouts.master')
@section('title','Show Message')
@section('main-content')

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
                <strong>Show Message</strong>
            </div>
            <div class="card-body card-block">
              @if($message)
                  @if($message->photo)
                  <img src="{{$message->photo}}" class="rounded-circle " style="margin-left:44%;">
                  @else 
                  <img src="{{asset('backend/img/avatar.png')}}" class="rounded-circle " style="margin-left:44%;">
                  @endif
                  <div class="py-4"><b>From</b> <br>
                    Name :&nbsp;&nbsp;{{$message->name}}<br>
                    Email :&nbsp;&nbsp;{{$message->email}}<br>
                    Phone :&nbsp;&nbsp;{{$message->phone}}
                  </div>
                  <hr/>
                  <h5 class="text-center" style="text-decoration:underline"><strong>Subject :</strong> {{$message->subject}}</h5>
                  <p class="py-5">{{$message->message}}</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection