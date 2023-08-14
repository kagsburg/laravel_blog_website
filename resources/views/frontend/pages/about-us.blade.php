@extends('frontend.layouts.master')
@section('title') {{ __('header.about_title') }} @endsection
@section('main-content')

<div class="hero-wrap" style="background-image: url('{{ asset('frontend/images/about-top.jpeg') }}');">
	<div class="overlay"></div>
	<div class="container">
	<div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
		<div class="text">
			<p class="breadcrumbs mb-2"><span class="mr-2">
				<a href="{{ route('home') }}">Home</a></span> 
				<span>About Us</span></p>
			<h1 class="mb-4 bread">About Chato Beach Resort</h1>
		</div>
		</div>
	</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
	<div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section text-center ftco-animate">
		<span class="subheading">Welcome to Chato Beach</span>
		<h2 class="mb-4">You'll Never Want To Leave</h2>
		</div>
	</div>  
	<div class="row d-flex">
		<div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
		<div class="media block-6 services py-4 d-block text-center">
			<div class="d-flex justify-content-center">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="flaticon-reception-bell"></span>
			</div>
			</div>
			<div class="media-body">
			<h3 class="heading mb-3">Friendly Service</h3>
			</div>
		</div>      
		</div>
		<div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
		<div class="media block-6 services active py-4 d-block text-center">
			<div class="d-flex justify-content-center">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="flaticon-serving-dish"></span>
			</div>
			</div>
			<div class="media-body">
			<h3 class="heading mb-3">Get Breakfast</h3>
			</div>
		</div>    
		</div>
		<div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
		<div class="media block-6 services py-4 d-block text-center">
			<div class="d-flex justify-content-center">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="flaticon-car"></span>
			</div>
			</div>
			<div class="media-body">
			<h3 class="heading mb-3">Transfer Services</h3>
			</div>
		</div>      
		</div>
		<div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
		<div class="media block-6 services py-4 d-block text-center">
			<div class="d-flex justify-content-center">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="flaticon-spa"></span>
			</div>
			</div>
			<div class="media-body">
			<h3 class="heading mb-3">Suits &amp; SPA</h3>
			</div>
		</div>      
		</div>
		<div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
		<div class="media block-6 services py-4 d-block text-center">
			<div class="d-flex justify-content-center">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="ion-ios-bed"></span>
			</div>
			</div>
			<div class="media-body">
			<h3 class="heading mb-3">Cozy Rooms</h3>
			</div>
		</div>      
		</div>
	</div>
	</div>
</section>

<section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters">
			{{-- <div class="col-md-7 order-md-last d-flex">
				<div class="img img-1 mr-md-2 ftco-animate" style="background-image: url({{ asset('frontend/images/home1.jpeg') }});"></div>
				<div class="img img-2 ml-md-2 ftco-animate" style="background-image: url({{ asset('frontend/images/home2.jpeg') }});"></div>
			</div> --}}
			<div class="col-lg-12 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
				<div class="heading-section mb-4 my-5 my-md-0">
					<span class="subheading">About Chato Beach Resort</span>
					<h2 class="mb-4">Welcome to Our Resort</h2>
				</div>

				<p>
					Chato Beach Resort is located along the shores of Lake Victoria, 3 km from the center of Chato township, named after the famous  Chato district in Geita region, in Tanzania. Chato beach resort is situated just 35km from the majestic Rubondo Island National Park. The resort is also near Burigi-Chato national park.
				</p>

				<p>
					This Hotel is suitable for tourists and travelers. It has several amenities that would guarantee your comfort. These amenities include: Restaurant, Free- Parking, Free-WiFi, Gym and Sauna, Swimming-Pool, Boat Cruising,  Coffeeshop, Beach, Lounge Bar, Conference Hall, Barbershop and Saloon. The resort has 20 standard rooms, 2 standard VIP rooms, 1 Double Deluxe room, 5 Deluxe rooms, 2 Suitesrooms and 5 Executive rooms with potential for expansion. all guest rooms have a desk, a flat-screen TV, air conditioner, a wardrobe. and a private bathroom. 
				</p>
				
				<p>
					Coming to Geita and needing a place to stay? Be it for work or for leisure, consider staying at this Hotel for your next visit, you will surely love it.
				</p>
				
				<p>
					This Chato Beach Resort is well equipped and has all facilities that have been listed above, With a modern yet traditionally setting, beach resort along lake Victoria architecturally designed to engage, excite, and invoke utter enjoyment and relaxation. 
				</p>

				<h4>Our Mission</h4>
				<p class="mb-4">
					To bring our properties to be known as among the premier luxury destinations in the world, to create personal experiences for our guests that they will treasure for a lifetime, and to be destination of choice for our discerning guests’ members, associates, communities and investors.
				</p>

				<h4>Our Vision</h4>
				<p class="mb-4">
					To become the premier holiday luxurious destination in the world.
				</p>
			</div>
		</div>
	</div>
	
</section>

<!-- stay at chato beach -->
<section class="ftco-section ftco-menu bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				{{-- <span class="subheading">Harborlights Resto Menu</span> --}}
				<h2>Reasons to Stay at Chato Beach Resort</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xl-6 d-flex">
				<div class="pricing-entry rounded d-flex ftco-animate">
					<div class="img" style="background-image: url({{ asset('frontend/images/rubondo.jpeg') }});"></div>
					<div class="desc p-4">
						<div class="d-md-flex text align-items-start">
							<h3><span>Rubondo Island National Park</span></h3>
							{{-- <span class="price">$20.00</span> --}}
						</div>
						<div class="d-block">
							<p>Chato Beach Resort is situated just 10km from the majestic Rubondo Island National Park. . The hotel organizes excursions and tours to Rubondo Island with picnic breakfast and lunch.	</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 d-flex">
				<div class="pricing-entry rounded d-flex ftco-animate">
					<div class="img" style="background-image: url({{ asset('frontend/images/burugi.jpeg') }});"></div>
					<div class="desc p-4">
						<div class="d-md-flex text align-items-start">
							<h3><span>Burugi-Chato National Park</span></h3>
							{{-- <span class="price">$20.00</span> --}}
						</div>
						<div class="d-block">
							<p>Proximity to Burigi- Chato National Park, we have organized excursions and tours to  scenic nature and wildlife drives in Burigi- Chato National Park with picnic breakfast and lunch.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 d-flex">
				<div class="pricing-entry rounded d-flex ftco-animate">
					<div class="img" style="background-image: url({{ asset('frontend/images/delic.jpeg') }});"></div>
					<div class="desc p-4">
						<div class="d-md-flex text align-items-start">
							<h3><span>Delicious and Nutritious Great Lakes meals</span></h3>
							{{-- <span class="price">$20.00</span> --}}
						</div>
						<div class="d-block">
							<p>At our hotel you will get a new tasty of different meals which are healthy, delicious and nutritious. Some of dishes includes Trapia recipe, Fruits, Nile-Perch recipe with Kachumbari flavour, Mishikaki etc. We have well qualified chefs, who will make your day comfortable and healthier.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 d-flex">
				<div class="pricing-entry rounded d-flex ftco-animate">
					<div class="img" style="background-image: url({{ asset('frontend/images/culture.jpeg') }});"></div>
					<div class="desc p-4">
						<div class="d-md-flex text align-items-start">
							<h3><span>Cultural Tourism</span></h3>
							{{-- <span class="price">$20.00</span> --}}
						</div>
						<div class="d-block">
							<p>Organized cultural tourism in Geita and excursions to Geita Goldmine sites. At Chato Beach Resort we also organize events Ideal for romance and relaxation perfect for honeymooners, couples, photographers and families</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 d-flex">
				<div class="pricing-entry rounded d-flex ftco-animate">
					<div class="img" style="background-image: url({{ asset('frontend/images/geita.jpeg') }});"></div>
					<div class="desc p-4">
						<div class="d-md-flex text align-items-start">
							<h3><span>Geita Airport</span></h3>
							{{-- <span class="price">$20.00</span> --}}
						</div>
						<div class="d-block">
							<p>Chato Beach Resort is also close to the airport at a distance of about 17.3km,
								there’s a transport from the airport to the hotel and back. to make travel easier for our customers.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

