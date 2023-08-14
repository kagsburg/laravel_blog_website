@extends('frontend.layouts.master')
@section('title') {{ __('header.home_title') }} @endsection
@section('main-content')
	
@if(count($banners)>0)
<div class="hero">
	<section class="home-slider owl-carousel">
		@foreach($banners as $key=>$banner)
			<div class="slider-item" style="background-image:url({{ Storage::url($banner->photo) }});">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-end">
						<div class="col-md-6 ftco-animate">
							<div class="text">
								<h3>{{$banner->title}}</h3>
								<br>
								<h2 class="mb-3">{{$banner->description}}</h2>
								<br>
								<h3><a href="{{$banner->link}}" style="color: #fff;">{{$banner->button}}</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</section>
</div>
@endif

@include('frontend.layouts.notification')

<section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-12">
				<form class="booking-form aside-stretch" method="post" action="{{route('checkout.store')}}" novalidate="novalidate">
                    @csrf
					<div class="row">
						<div class="col-md d-flex py-md-6">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Name</label>
										<input type="text" name="name" class="form-control" placeholder="Full Name" required>
										@error('name')
											<span class="text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
						</div>
						
						<div class="col-md d-flex py-md-6">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Contacts</label>
										<input type="email" name="email" class="form-control" placeholder="Email/Phone no" required>
										@error('email')
											<span class="text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
						</div>

						<div class="col-md d-flex py-md-6">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Check-in Date</label>
										<input type="date" name="arrival_date" class="form-control" placeholder="Check-in date" required>
										@error('arrival_date')
											<span class="text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
						</div>

						<div class="col-md d-flex py-md-6">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Check-out Date</label>
										<input type="date" name="departure_date" class="form-control" placeholder="Check-out date" required>
										@error('departure_date')
											<span class="text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
						</div>

						<div class="col-md d-flex py-md-6">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Room</label>
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<select name="room_id" class="form-control" required>
												<option value="">Select Room</option>
												@foreach($room_lists as $key=>$data)
													<option value='{{$data->id}}'>{{$data->title}}</option>
												@endforeach
											</select>
											@error('room_id')
												<span class="text-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md d-flex py-md-6">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Country</label>
									<div class="form-field">
										<div class="select-wrap">
											{{-- <div class="icon"><span class="ion-ios-arrow-down"></span></div> --}}
											<select name="country" id="country" required>
												<option value="Afghanistan">Afghanistan</option>
												<option value="Åland Islands">Åland Islands</option>
												<option value="Albania">Albania</option>
												<option value="Algeria">Algeria</option>
												<option value="American Samoa">American Samoa</option>
												<option value="Andorra">Andorra</option>
												<option value="Angola">Angola</option>
												<option value="Anguilla">Anguilla</option>
												<option value="Antarctica">Antarctica</option>
												<option value="Antigua and Barbuda">Antigua and Barbuda</option>
												<option value="Argentina">Argentina</option>
												<option value="Armenia">Armenia</option>
												<option value="Aruba">Aruba</option>
												<option value="Australia">Australia</option>
												<option value="Austria">Austria</option>
												<option value="Azerbaijan">Azerbaijan</option>
												<option value="Bahamas">Bahamas</option>
												<option value="Bahrain">Bahrain</option>
												<option value="Bangladesh">Bangladesh</option>
												<option value="Barbados">Barbados</option>
												<option value="Belarus">Belarus</option>
												<option value="Belgium">Belgium</option>
												<option value="Belize">Belize</option>
												<option value="Benin">Benin</option>
												<option value="Bermuda">Bermuda</option>
												<option value="Bhutan">Bhutan</option>
												<option value="Bolivia">Bolivia</option>
												<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
												<option value="BBotswanaW">Botswana</option>
												<option value="BBouvet IslandV">Bouvet Island</option>
												<option value="Brazil">Brazil</option>
												<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
												<option value="British Virgin Islands">British Virgin Islands</option>
												<option value="Brunei">Brunei</option>
												<option value="Bulgaria">Bulgaria</option>
												<option value="Burkina Faso">Burkina Faso</option>
												<option value="Burundi">Burundi</option>
												<option value="Cambodia">Cambodia</option>
												<option value="Cameroon">Cameroon</option>
												<option value="Canada">Canada</option>
												<option value="Cape Verde">Cape Verde</option>
												<option value="Cayman Islands">Cayman Islands</option>
												<option value="CCentral African RepublicF">Central African Republic</option>
												<option value="Chad">Chad</option>
												<option value="Chile">Chile</option>
												<option value="China">China</option>
												<option value="Christmas Island">Christmas Island</option>
												<option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
												<option value="Colombia">Colombia</option>
												<option value="Comoros">Comoros</option>
												<option value="Congo - Brazzaville">Congo - Brazzaville</option>
												<option value="Congo - Kinshasa">Congo - Kinshasa</option>
												<option value="Cook Islands">Cook Islands</option>
												<option value="Costa Rica">Costa Rica</option>
												<option value="Côte d’Ivoire">Côte d’Ivoire</option>
												<option value="Croatia">Croatia</option>
												<option value="Cuba">Cuba</option>
												<option value="Cyprus">Cyprus</option>
												<option value="Czech Republic">Czech Republic</option>
												<option value="Denmark">Denmark</option>
												<option value="Djibouti">Djibouti</option>
												<option value="Dominica">Dominica</option>
												<option value="Dominican Republic">Dominican Republic</option>
												<option value="Ecuador">Ecuador</option>
												<option value="Egypt">Egypt</option>
												<option value="El Salvador">El Salvador</option>
												<option value="Equatorial Guinea">Equatorial Guinea</option>
												<option value="Eritrea">Eritrea</option>
												<option value="Estonia">Estonia</option>
												<option value="Ethiopia">Ethiopia</option>
												<option value="Falkland Islands">Falkland Islands</option>
												<option value="Faroe Islands">Faroe Islands</option>
												<option value="Fiji">Fiji</option>
												<option value="Finland">Finland</option>
												<option value="France">France</option>
												<option value="French Guiana">French Guiana</option>
												<option value="French Polynesia">French Polynesia</option>
												<option value="French Southern Territories">French Southern Territories</option>
												<option value="Gabon">Gabon</option>
												<option value="Gambia">Gambia</option>
												<option value="Georgia">Georgia</option>
												<option value="Germany">Germany</option>
												<option value="Ghana">Ghana</option>
												<option value="Gibraltar">Gibraltar</option>
												<option value="Greece">Greece</option>
												<option value="Greenland">Greenland</option>
												<option value="Grenada">Grenada</option>
												<option value="Guadeloupe">Guadeloupe</option>
												<option value="Guam">Guam</option>
												<option value="Guatemala">Guatemala</option>
												<option value="Guernsey">Guernsey</option>
												<option value="Guinea">Guinea</option>
												<option value="Guinea-Bissau">Guinea-Bissau</option>
												<option value="Guyana">Guyana</option>
												<option value="Haiti">Haiti</option>
												<option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
												<option value="Honduras">Honduras</option>
												<option value="Hong Kong SAR China">Hong Kong SAR China</option>
												<option value="Hungary">Hungary</option>
												<option value="Iceland">Iceland</option>
												<option value="India">India</option>
												<option value="Indonesia">Indonesia</option>
												<option value="Iran">Iran</option>
												<option value="Iraq">Iraq</option>
												<option value="Ireland">Ireland</option>
												<option value="Isle of Man">Isle of Man</option>
												<option value="Israel">Israel</option>
												<option value="Italy">Italy</option>
												<option value="Jamaica">Jamaica</option>
												<option value="Japan">Japan</option>
												<option value="Jersey">Jersey</option>
												<option value="Jordan">Jordan</option>
												<option value="Kazakhstan">Kazakhstan</option>
												<option value="Kenya">Kenya</option>
												<option value="Kiribati">Kiribati</option>
												<option value="Kuwait">Kuwait</option>
												<option value="Kyrgyzstan">Kyrgyzstan</option>
												<option value="Laos">Laos</option>
												<option value="Latvia">Latvia</option>
												<option value="Lebanon">Lebanon</option>
												<option value="Lesotho">Lesotho</option>
												<option value="Liberia">Liberia</option>
												<option value="Libya">Libya</option>
												<option value="Liechtenstein">Liechtenstein</option>
												<option value="Lithuania">Lithuania</option>
												<option value="Luxembourg">Luxembourg</option>
												<option value="Macau SAR China">Macau SAR China</option>
												<option value="Macedonia">Macedonia</option>
												<option value="Madagascar">Madagascar</option>
												<option value="Malawi">Malawi</option>
												<option value="Malaysia">Malaysia</option>
												<option value="Maldives">Maldives</option>
												<option value="Mali">Mali</option>
												<option value="Malta">Malta</option>
												<option value="Marshall Islands">Marshall Islands</option>
												<option value="Martinique">Martinique</option>
												<option value="Mauritania">Mauritania</option>
												<option value="Mauritius">Mauritius</option>
												<option value="Mayotte">Mayotte</option>
												<option value="MexicoX">Mexico</option>
												<option value="Micronesia">Micronesia</option>
												<option value="Moldova">Moldova</option>
												<option value="Monaco">Monaco</option>
												<option value="Mongolia">Mongolia</option>
												<option value="Montenegro">Montenegro</option>
												<option value="Montserrat">Montserrat</option>
												<option value="Morocco">Morocco</option>
												<option value="Mozambique">Mozambique</option>
												<option value="Myanmar [Burma]">Myanmar [Burma]</option>
												<option value="Namibia">Namibia</option>
												<option value="Nauru">Nauru</option>
												<option value="Nepal">Nepal</option>
												<option value="Netherlands">Netherlands</option>
												<option value="Netherlands Antilles">Netherlands Antilles</option>
												<option value="New Caledonia">New Caledonia</option>
												<option value="New Zealand">New Zealand</option>
												<option value="Nicaragua">Nicaragua</option>
												<option value="Niger">Niger</option>
												<option value="Nigeria">Nigeria</option>
												<option value="Niue">Niue</option>
												<option value="Norfolk Island">Norfolk Island</option>
												<option value="Northern Mariana Islands">Northern Mariana Islands</option>
												<option value="North Korea">North Korea</option>
												<option value="Norway">Norway</option>
												<option value="Oman">Oman</option>
												<option value="Pakistan">Pakistan</option>
												<option value="Palau">Palau</option>
												<option value="Palestinian Territories">Palestinian Territories</option>
												<option value="Panama">Panama</option>
												<option value="Papua New Guinea">Papua New Guinea</option>
												<option value="Paraguay">Paraguay</option>
												<option value="Peru">Peru</option>
												<option value="Philippines">Philippines</option>
												<option value="Pitcairn Islands">Pitcairn Islands</option>
												<option value="Poland">Poland</option>
												<option value="Portugal">Portugal</option>
												<option value="Puerto Rico">Puerto Rico</option>
												<option value="Qatar">Qatar</option>
												<option value="Réunion">Réunion</option>
												<option value="Romania">Romania</option>
												<option value="Russia">Russia</option>
												<option value="Rwanda">Rwanda</option>
												<option value="Saint Barthélemy">Saint Barthélemy</option>
												<option value="Saint Helena">Saint Helena</option>
												<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
												<option value="Saint Lucia">Saint Lucia</option>
												<option value="Saint Martin">Saint Martin</option>
												<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
												<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
												<option value="Samoa">Samoa</option>
												<option value="San Marino">San Marino</option>
												<option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
												<option value="Saudi Arabia">Saudi Arabia</option>
												<option value="Senegal">Senegal</option>
												<option value="Serbia">Serbia</option>
												<option value="Seychelles">Seychelles</option>
												<option value="Sierra Leone">Sierra Leone</option>
												<option value="Singapore">Singapore</option>
												<option value="Slovakia">Slovakia</option>
												<option value="Slovenia">Slovenia</option>
												<option value="Solomon Islands">Solomon Islands</option>
												<option value="Somalia">Somalia</option>
												<option value="South Africa">South Africa</option>
												<option value="South Georgia">South Georgia</option>
												<option value="South Korea">South Korea</option>
												<option value="Spain">Spain</option>
												<option value="Sri Lanka">Sri Lanka</option>
												<option value="Sudan">Sudan</option>
												<option value="Suriname">Suriname</option>
												<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
												<option value="Swaziland">Swaziland</option>
												<option value="Sweden">Sweden</option>
												<option value="Switzerland">Switzerland</option>
												<option value="Syria">Syria</option>
												<option value="Taiwan">Taiwan</option>
												<option value="Tajikistan">Tajikistan</option>
												<option value="Tanzania" selected="selected">Tanzania</option>
												<option value="Thailand">Thailand</option>
												<option value="Timor-Leste">Timor-Leste</option>
												<option value="Togo">Togo</option>
												<option value="Tokelau">Tokelau</option>
												<option value="Tonga">Tonga</option>
												<option value="Trinidad and Tobago">Trinidad and Tobago</option>
												<option value="Tunisia">Tunisia</option>
												<option value="Turkey">Turkey</option>
												<option value="Turkmenistan">Turkmenistan</option>
												<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
												<option value="Tuvalu">Tuvalu</option>
												<option value="Uganda">Uganda</option>
												<option value="Ukraine">Ukraine</option>
												<option value="United Arab Emirates">United Arab Emirates</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="Uruguay">Uruguay</option>
												<option value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
												<option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
												<option value="Uzbekistan">Uzbekistan</option>
												<option value="Vanuatu">Vanuatu</option>
												<option value="Vatican City">Vatican City</option>
												<option value="Venezuela">Venezuela</option>
												<option value="Vietnam">Vietnam</option>
												<option value="Wallis and Futuna">Wallis and Futuna</option>
												<option value="Western Sahara">Western Sahara</option>
												<option value="Yemen">Yemen</option>
												<option value="Zambia">Zambia</option>
												<option value="Zimbabwe">Zimbabwe</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md d-flex py-md-6">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Guests</label>
									<input type="text" name="number_of_adults" class="form-control" placeholder="Adults/Children No." required>
									@error('number_of_adults')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
						</div>

						<div class="col-md d-flex">
							<div class="form-group d-flex align-self-stretch">
								<button class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"
								type="submit">
									<span>Check Availability 
										<small>Best Price Guaranteed!</small>
									</span>
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section">
	<div class="container">
	<div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section text-center ftco-animate">
		<span class="subheading">Welcome to Chato Beach Resort</span>
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
			<div class="col-md-7 order-md-last d-flex">
				<div class="img img-1 mr-md-2 ftco-animate" style="background-image: url({{ asset('frontend/images/home1.jpeg') }});"></div>
				<div class="img img-2 ml-md-2 ftco-animate" style="background-image: url({{ asset('frontend/images/home2.jpeg') }});"></div>
			</div>
			<div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
		<div class="heading-section mb-4 my-5 my-md-0">
		<span class="subheading">About Chato Beach Resort</span>
		<h2 class="mb-4">Welcome to Our Resort</h2>
		</div>
		<p>
			Chato Beach Resort is situated just 10km from the majestic Rubondo Islands National Park. The resort is also near Burigi-Chato National Park. It is suitable for tourists and travelers. It has several amenities that would guarantee your comfort. These amenities include; Restaurant, Free-Parking, Free-Internet, Gym & Sauna, Swimming-pool, Boat cruising, Coffee shop, Beach, Lounge Bar, Conference Hall, Babershop & Saloon, Rooms etc.
		</p>
		<p><a href="{{ route('about-us') }}" class="btn btn-secondary rounded">Find More</a></p>
			</div>
		</div>
	</div>
</section>

<section class="testimony-section">
	<div class="container">
		<div class="row no-gutters ftco-animate justify-content-center">
			<div class="col-md-5 d-flex">
				@foreach($homvids as $homvid)
					{{-- <div class="testimony-img aside-stretch-2" 
						style="background-image: url({{ asset('frontend/images/testimony-img.jpg') }});">
					</div> --}}

					<div class="testimony-img aside-stretch-2">
						<iframe width="470" height="500" 
						src="{{$homvid->link}}" 
						title="" 
						frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
						allowfullscreen></iframe>
					</div>
				@endforeach
			</div>
			<div class="col-md-7 py-5 pl-md-5">
				<div class="py-md-5">
					<div class="heading-section ftco-animate mb-4">
						<span class="subheading">Happy Customers</span>
							<h2 class="mb-0">Testimonies</h2>
					</div>
					<div class="carousel-testimony owl-carousel ftco-animate">
						@if(count($testimonials)>0)
							@foreach($testimonials as $testimonial)
								<div class="item">
									<div class="testimony-wrap pb-4">
										<div class="text">
										<p class="mb-4">{{$testimonial->message}}</p>
										</div>
										<div class="d-flex">
											@php
												$photo=explode(',',$testimonial->photo);
											@endphp
											<div class="user-img" style="background-image: url({{ Storage::url($testimonial->photo) }})">
											</div>
											<div class="pos ml-3">
											<p class="name">{{$testimonial->name}}</p>
											<span class="position">{{$testimonial->position}}</span>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pb ftco-room">
	<div class="container-fluid px-0">
		<div class="row no-gutters justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section text-center ftco-animate">
		<span class="subheading">Welcome to Chato Beach Resort Rooms</span>
		<h2 class="mb-4">Our Rooms</h2>
		</div>
	</div>  
		<div class="row no-gutters">
			@php
				$room_lists=DB::table('rooms')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
			@endphp
			@foreach($room_lists as $room)
				<div class="col-lg-6">
					<div class="room-wrap d-md-flex ftco-animate">
						@php
							$photo=explode(',',$room->photo);
						@endphp
						<a href="#" class="img" style="background-image: url({{ Storage::url($room->photo) }});"></a>
						<div class="half left-arrow d-flex align-items-center">
							<div class="text p-4 text-center">
								{{-- <p class="star mb-0">
									<span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span>
								</p> --}}
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
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
	<div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section text-center ftco-animate">
		<span class="subheading">Welcome to Chato Beach Resort Blog</span>
		<h2>Recent Blog</h2>
		</div>
	</div>
	<div class="row d-flex">
		@if($posts)
            @foreach($posts as $post)
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						@php
							$photo=explode(',',$post->photo);
						@endphp
						<a href="{{route('blog.detail',$post->slug)}}" class="block-20 rounded" style="background-image: url('{{ Storage::url($post->photo) }}');">
						</a>
						<div class="text mt-3 text-center">
						<div class="meta mb-2">
							<div><a href="#">{{$post->created_at->format('d M , Y. D')}}</a></div>
							<div><a href="#">{{$post->author_info['name']}}</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> ({{$post->allComments->count()}})</a></div>
						</div>
						<h3 class="heading"><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
						</div>
					</div>
				</div>
			@endforeach
		@endif
	</div>
</section>
	
@endsection

