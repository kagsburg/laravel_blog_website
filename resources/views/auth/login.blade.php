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
    <title>{{ __('header.login_title') }} - {{ config('app.name') }}</title>

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

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('backend/images/icon/logo.jpeg') }}" alt="{{ asset('backend/images/icon/logo.jpeg') }}">
                            </a>
                        </div>
                        <div class="login-form">
                            <form class="user" action="{{ route('login') }}" method="post">
                              @csrf
                                <div class="form-group">
                                    <label>{{ __('header.login_form_email') }}</label>
                                    <input class="au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="{{ __('header.login_form_enter_email') }}"  required autocomplete="email" type="email" name="email" placeholder="Email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('header.login_form_password') }}</label>
                                    <input class="au-input au-input--full @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password"  name="password" required autocomplete="current-password" type="password" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('header.login_remember') }}
                                    </label>
                                    <label>
                                      @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">{{ __('header.login_forgot_pass') }}</a>
                                      @endif
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">{{ __('header.login_btn') }}</button>
                                {{-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> --}}
                            </form>
                            {{-- <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{ route('register') }}">Sign Up Here</a>
                                </p>
                            </div> --}}
                        </div>
                    </div>
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