<!-- Left Panel -->

<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="./">
            @php
                $settings=DB::table('settings')->get();
            @endphp  
            <img src="@foreach($settings as $data) {{ Storage::url($data->logo) }} @endforeach" alt="@foreach($settings as $data) {{ Storage::url($data->logo) }} @endforeach" 
            style="width: auto; height: 70px;" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('admin')}}">
                        <i class="fas fa-tachometer-alt"></i>{{ __('sidebar.dashboard') }}</a>
                </li>
                <li>
                    <a href="{{route('banner.index')}}">
                        <i class="fas fa-chart-bar"></i>{{ __('sidebar.banners') }}</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>{{ __('sidebar.halls') }}</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('room.index')}}">{{ __('sidebar.halls') }}</a>
                        </li>
                        <li>
                            <a href="{{route('image.index')}}">{{ __('sidebar.halls_photos') }}</a>
                        </li>
                    </ul>
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
                <li>
                    <a href="{{route('review.index')}}">
                        <i class="fas fa-map-marker-alt"></i>{{ __('sidebar.reviews') }}</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>{{ __('sidebar.posts') }}</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                <li>
                    <a href="{{route('testimonial.index')}}">
                        <i class="fas fa-calendar-alt"></i>{{ __('sidebar.testimony') }}</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- /#left-panel -->

<!-- Left Panel -->