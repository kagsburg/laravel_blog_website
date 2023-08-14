@extends('frontend.layouts.master')
@section('title') {{ __('header.contact_title') }} @endsection
@section('main-content')

<div class="hero-wrap" style="background-image: url('{{ asset('frontend/images/contact.jpeg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
        <div class="text">
            <p class="breadcrumbs mb-2">
              <span class="mr-2"><a href="{{ route('home') }}">Home</a></span> 
              <span>Contact Us</span>
            </p>
            <h1 class="mb-4 bread">Contact Us</h1>
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.layouts.notification')

<section class="ftco-section contact-section bg-light">
  <div class="container">
    @php
        $settings=DB::table('settings')->get();
    @endphp
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-12 mb-4">
        <h2 class="h3">Contact Information</h2>
      </div>
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
        <div class="info rounded bg-white p-4">
            <!--<p><span>Address:</span> <a href="#">@foreach($settings as $data) {{$data->address}} @endforeach</a></p>-->
            <p><span>Address:</span> <a href="#">Chato, Geita.</a></p>
          </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info rounded bg-white p-4">
            <p><span>Phone:</span> <a href="#">@foreach($settings as $data) {{$data->phone}} @endforeach</a></p>
          </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info rounded bg-white p-4">
            <p><span>Email:</span> <a href="#">@foreach($settings as $data) {{$data->email}} @endforeach</a></p>
          </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info rounded bg-white p-4">
            <p><span>Website</span> <a href="#">chatobeachresort.com</a></p>
          </div>
      </div>
    </div>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form class="bg-white p-5 contact-form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
          @csrf
          <div class="form-group">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Your Name" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Your Phone" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" required>
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <textarea cols="30" rows="7" class="form-control @error('message') is-invalid @enderror" placeholder="Message" id="message" name="message" required="required"></textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      
      </div>

      <div class="col-md-6 d-flex">
        {{-- <div id="map" class="bg-white"></div> --}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1020116.8221328624!2d31.279235604623626!3d-2.86500444034217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19cf83e76f540bc1%3A0x19c1044d9311b08!2sChato%20Beach%20Resort!5e0!3m2!1sen!2sug!4v1683201522342!5m2!1sen!2sug" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')

$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                phone: {
                    required: true,
                    minlength: 9
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "come on, you have a name, don't you?",
                    minlength: "your name must have at least 2 characters"
                },
                subject: {
                    required: "come on, you have a subject, don't you?",
                    minlength: "your subject must have at least 4 characters"
                },
                number: {
                    required: "come on, you have a number, don't you?",
                    minlength: "your Number must have at least 9 characters"
                },
                email: {
                    required: "no email, no message"
                },
                message: {
                    required: "um...yea, you have to write something to send this form.",
                    minlength: "Your subject must have at least 10 characters"
                }
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url: $(form).attr('action'),
                    success: function() {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})

@endpush