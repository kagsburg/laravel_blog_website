@extends('frontend.layouts.master')
@section('title') Service @endsection
@section('main-content')

<div class="hero-wrap" style="background-image: url('{{ asset('frontend/images/service.jpeg') }}');">
	<div class="overlay"></div>
	<div class="container">
	<div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
		<div class="text">
			<p class="breadcrumbs mb-2"><span class="mr-2">
				<a href="{{ route('home') }}">Home</a></span> 
				<span>Service</span></p>
			<h1 class="mb-4 bread">Services of Chato Beach Resort</h1>
		</div>
		</div>
	</div>
	</div>
</div>


        <section class="ftco-section ftco-menu bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        {{-- <span class="subheading">Harborlights Resto Menu</span> --}}
                        <h2>List of Services at Chato Beach Resort</h2>
                    </div>
                </div>
                <div class="row">
                    @php
$services=DB::table('services')->where('status','active')->get();
@endphp
@if($services)
    @foreach($services as $serv)
                    <div class="col-lg-6 col-xl-6 d-flex">
                        <div class="pricing-entry rounded d-flex ftco-animate">
                            @php
                                $photo=explode(',',$serv->photo);
                            @endphp
                            <div class="img" style="background-image: url({{ Storage::url($serv->photo) }});"></div>
                            <div class="desc p-4">
                                <div class="d-md-flex text align-items-start">
                                    <h3><span>{{$serv->title}}</span></h3>
                                    {{-- <span class="price">$20.00</span> --}}
                                </div>
                                <div class="d-block">
                                    <p>{{$serv->summary}}	</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
@endif
                </div>
            </div>
        </section>
    



@endsection

