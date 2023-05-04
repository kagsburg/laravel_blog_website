<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="{{ __('header.admin_search') }}" />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            @include('backend.notification.show')
                        </div>

                        <div class="noti__item js-item-menu">
                            @include('backend.message.message')
                        </div>
                    </div>
                    @php $locale = session()->get('locale'); @endphp
                    <div class="language-select dropdown" id="language-select">
                        <img src="{{ asset('frontend/img/english-flag.jpg') }}" alt="">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            @switch($locale)
                                @case('en')
                                <i class="flag-icon flag-icon-us"></i> 
                                @break
                                @case('fr')
                                <i class="flag-icon flag-icon-fr"></i> 
                                @break
                                @default
                                <i class="flag-icon flag-icon-us"></i> 
                            @endswitch
                        <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="lang/en">English<i class="flag-icon flag-icon-us"></i> </a>
                            <a class="dropdown-item" href="lang/fr">French<i class="flag-icon flag-icon-fr"></i> </a>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @if(Auth()->user()->photo)
                                    <img src="{{ Storage::url(Auth()->user()->photo) }}" alt="{{ Storage::url(Auth()->user()->photo) }}" alt="{{ Storage::url(Auth()->user()->photo) }}" alt="{{ Storage::url(Auth()->user()->photo) }}" />
                                @else
                                    <img src="{{asset('backend/images/icon/avatar-01.jpg')}}" alt="{{asset('backend/img/avatar-01.jpg')}}">
                                @endif
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth()->user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            @if(Auth()->user()->photo)
                                                <img src="{{ Storage::url(Auth()->user()->photo) }}" alt="{{ Storage::url(Auth()->user()->photo) }}" alt="{{ Storage::url(Auth()->user()->photo) }}" alt="{{ Storage::url(Auth()->user()->photo) }}" />
                                            @else
                                                <img src="{{asset('backend/images/icon/avatar-01.jpg')}}" alt="{{asset('backend/img/avatar-01.jpg')}}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{Auth()->user()->name}}</a>
                                        </h5>
                                        {{-- <span class="email">johndoe@example.com</span> --}}
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{route('admin-profile')}}">
                                            <i class="zmdi zmdi-account"></i>{{ __('header.profile_title') }}</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{route('settings')}}">
                                            <i class="zmdi zmdi-settings"></i>{{ __('header.setting_title') }}</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{route('change.password.form')}}">
                                            <i class="zmdi zmdi-money-box"></i>{{ __('header.change_password') }}</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                        <i class="zmdi zmdi-power"></i>{{ __('header.logout_title') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->