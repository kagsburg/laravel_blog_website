<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">Chato <span>Beach Resort</span></a>
      {{-- <a class="navbar-brand" href="{{route('home')}}">
        <img src="{{ asset('frontend/images/logo.jpeg') }}" alt="" style="width: auto; height: 100px;">
      </a> --}}
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}" class="nav-link">Home</a></li>
          <li class="nav-item @if(Request::path()=='room-grids'||Request::path()=='room-lists')  active  @endif"><a href="{{route('room-grids')}}" class="nav-link">Our Rooms</a></li>
          {{-- <li class="nav-item"><a href="restaurant.html" class="nav-link">Restaurant</a></li> --}}
          <li class="nav-item {{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}" class="nav-link">About Us</a></li>
          <li class="nav-item {{Request::path()=='service' ? 'active' : ''}}"><a href="{{route('service')}}" class="nav-link">Services</a></li>
          <li class="nav-item {{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}" class="nav-link">Articles</a></li>
          <li class="nav-item {{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
          <li class="nav-item "><a href="{{ route('downloadMenu') }}" class="nav-link">Menu</a></li>

          {{-- <li class="nav-item {{Request::path()=='checkout' ? 'active' : ''}}"><a href="{{ route('checkout') }}" class="nav-link">Book Now</a></li> --}}
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->