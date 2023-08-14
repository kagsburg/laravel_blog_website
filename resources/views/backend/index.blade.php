@extends('backend.layouts.master')
@section('title') {{ __('sidebar.dashboard') }} @endsection
@section('main-content')
@include('backend.layouts.notification')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">{{ __('dashboard.overview') }}</h2>
                            {{-- <button class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>add item</button> --}}
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{\App\User::countActiveUser()}}</h2>
                                        <span>{{ __('dashboard.users') }}</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    {{-- <canvas id="widgetChart1"></canvas> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{\App\Models\Room::countActiveRoom()}}</h2>
                                        <span>{{ __('dashboard.halls') }}</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    {{-- <canvas id="widgetChart2"></canvas> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{\App\Models\Service::countActiveService()}}</h2>
                                        <span>Services</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    {{-- <canvas id="widgetChart3"></canvas> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{\App\Models\Post::countActivePost()}}</h2>
                                        <span>{{ __('dashboard.posts') }}</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    {{-- <canvas id="widgetChart4"></canvas> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
