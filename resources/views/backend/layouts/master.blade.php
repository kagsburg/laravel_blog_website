<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.head')

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="./">
                            @php
                                $settings=DB::table('settings')->get();
                            @endphp  
                            <img src="@foreach($settings as $data) {{ Storage::url($data->logo) }} @endforeach" alt="@foreach($settings as $data) {{ Storage::url($data->logo) }} @endforeach" 
                            style="width: 300px; height: 100px;" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{route('admin')}}">
                                <i class="fas fa-tachometer-alt"></i>
                                {{ __('sidebar.dashboard') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('banner.index')}}">
                                <i class="fas fa-chart-bar"></i>{{ __('sidebar.banners') }}</a>
                        </li>
                        <li>
                            <a href="{{route('room.index')}}">
                                <i class="far fa-check-square"></i>{{ __('sidebar.halls') }}</a>
                        </li>
                        <li>
                            <a href="{{route('category.index')}}">
                                <i class="fas fa-table"></i>{{ __('sidebar.category') }}</a>
                        </li>
                        <li>
                            <a href="{{route('service.index')}}">
                                <i class="fas fa-building"></i>{{ __('sidebar.services') }}</a>
                        </li>
                        <li>
                            <a href="{{route('order.index')}}">
                                <i class="fas fa-calendar-alt"></i>{{ __('sidebar.bookings') }}</a>
                        </li>
                        {{-- <li>
                            <a href="{{route('shipping.index')}}">
                                <i class="fas fa-shopping-cart"></i>Shipping</a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{route('coupon.index')}}">
                                <i class="fas fa-table"></i>Coupon</a>
                        </li> --}}
                        <li>
                            <a href="{{route('review.index')}}">
                                <i class="fas fa-map-marker-alt"></i>{{ __('sidebar.reviews') }}</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>{{ __('sidebar.posts') }}</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('post.index')}}">{{ __('sidebar.all_posts') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('post-category.index')}}">{{ __('sidebar.post_category') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('post-tag.index')}}">{{ __('sidebar.post_tag') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('comment.index')}}">{{ __('sidebar.post_comment') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}">
                                <i class="fas fa-user"></i>{{ __('sidebar.users') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('backend.layouts.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('backend.layouts.header')
            <!-- HEADER DESKTOP-->

            @include('backend.layouts.notification')
            <!-- MAIN CONTENT-->
            @yield('main-content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @include('backend.layouts.footer')

</body>

</html>
<!-- end document-->
