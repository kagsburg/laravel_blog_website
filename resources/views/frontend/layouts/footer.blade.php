<section class="instagram">
  <div class="container-fluid">
    <div class="row no-gutters justify-content-center pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        {{-- <span class="subheading">Photos</span>
        <h2><span>Instagram</span></h2> --}}
      </div>
    </div>
    {{-- <div class="row no-gutters">
      @isset($data['instagram_feed'])
        @foreach ($data['instagram_feed'] as $item)
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{ $item['permalink'] }}" class="insta-img image-popup" style="background-image: url({{ Storage::url($item->url) }});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
        @endforeach
      @endisset
    </div> --}}

    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-33db2a00-e2b9-4354-bb6a-e478f605f951"></div>

  </div>
</section>

<footer class="ftco-footer ftco-section img" style="background-image: url({{ asset('frontend/images/footer.jpeg') }});">
    <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Chato Beach Resort</h2>
          <p>Chato Beach Resort is situated just 35km from the majestic Rubondo Islands National Park. The resort is also near Burigi-Chato National Park. It is suitable for tourists and travelers. It has several amenities that would guarantee your comfort. </p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="https://twitter.com/chatobeach"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="https://www.youtube.com/@_chatobeachresort"><span class="icon-youtube"></span></a></li>
            <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100092540110478"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="https://www.instagram.com/_chatobeachresort/"><span class="icon-instagram"></span></a></li>
            {{-- <li class="ftco-animate"><a href="https://www.tiktok.com/@chatobeachresort?lang=en"><img src="{{ asset('frontend/images/tiktok.jpeg')}}" style="width: 30px; height: auto;"></a></li> --}}
            {{-- <li class="ftco-animate"><a href="https://www.tripadvisor.com/Hotel_Review-g11955938-d19524929-Reviews-Chato_Beach_Resort-Geita_Geita_Region.html"><span class="icon-tripadvisor"></span></a></li> --}}
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-5">
          <h2 class="ftco-heading-2">Other Social Links</h2>
          <ul class="list-unstyled">
            <li><a href="https://www.tiktok.com/@chatobeachresort?lang=en" class="py-2 d-block">TikTok</a></li>
            <li><a href="https://www.tripadvisor.com/Hotel_Review-g11955938-d19524929-Reviews-Chato_Beach_Resort-Geita_Geita_Region.html" class="py-2 d-block">Tripadvisor</a></li>
            <li><a href="https://planetofhotels.com/en/tanzania/ukaranga/chato-beach-resort" class="py-2 d-block">Planet Hotels</a></li>
            {{-- <li><a href="#" class="py-2 d-block">Gift Card</a></li> --}}
          </ul>
        </div>
      </div>
      <div class="col-md">
          <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Shortcuts</h2>
          <ul class="list-unstyled">
            <li><a href="{{ route('blog')}}" class="py-2 d-block">Articles</a></li>
            <li><a href="{{route('about-us')}}" class="py-2 d-block">About Us</a></li>
            <li><a href="{{route('contact')}}" class="py-2 d-block">Contact Us</a></li>
            <li><a href="{{ route('service')}}" class="py-2 d-block">Services</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              @php
                $settings=DB::table('settings')->get();
              @endphp
              <ul>
               <!-- <li><span class="icon icon-map-marker"></span><span class="text">@foreach($settings as $data) {{$data->address}} @endforeach</span></li>-->
                <li><span class="icon icon-map-marker"></span><span class="text">Chato, Geita</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">@foreach($settings as $data) {{$data->phone}} @endforeach</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">@foreach($settings as $data) {{$data->email}} @endforeach</span></a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p>
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
          <a target="_blank">{{ config('app.name') }}</a>
          <a href="http://www.ufanisiafrica.com">{{ __('footer.footer_powered') }}</a>
        </p>
      </div>
    </div>
  </div>

  <!-- scroll top -->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><span class="icon-arrow-up"></span></button>

  <!-- whatsapp -->
  <a  class="whats-app" href="https://api.whatsapp.com/send?phone=255684957484" target="_blank">
    <i class="icon-whatsapp my-float"></i>
  </a>
  
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('frontend/js/google-map.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

<script>
	// Get the button
	let mybutton = document.getElementById("myBtn");
	
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};
	
	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	  } else {
		mybutton.style.display = "none";
	  }
	}
	
	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	  document.body.scrollTop = 0;
	  document.documentElement.scrollTop = 0;
	}
	</script>

