<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Title Page-->
    <title>404 - {{ config('app.name') }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('backend/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('backend/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('backend/css/theme.css') }}" rel="stylesheet" media="all">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/images/icon/favicon.ico') }}">

</head>

<body>
  
  <div class="container-fluid">
    <div class="row" style="margin-top:10%">
        <!-- 404 Error Text -->
      <div class="col-md-12">
        <div class="text-center">
          <div class="error mx-auto" data-text="404">404</div>
          <p class="lead text-gray-800 mb-5">Page Not Found</p>
          <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
          {{-- {{dd(auth()->user())}}; --}}
            <a href="{{route('home')}}">&larr; Back to Home</a>

        </div>
      </div>
    </div>
  </div>

<!-- Jquery JS-->
<script src="{{ asset('backend/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('backend/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('backend/vendor/slick/slick.min.js') }}">
</script>
<script src="{{ asset('backend/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('backend/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ asset('backend/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('backend/vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('backend/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('backend/vendor/select2/select2.min.js') }}">
</script>

<!-- Main JS-->
<script src="{{ asset('backend/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
