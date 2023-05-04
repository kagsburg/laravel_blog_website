<div class="noti-wrap">
    {{-- <div class="noti__item js-item-menu">
        <i class="zmdi zmdi-comment-more"></i>
        <span class="quantity">1</span>
        <div class="mess-dropdown js-dropdown">
            <div class="mess__title">
                <p>You have 2 news message</p>
            </div>
            <div class="mess__item">
                <div class="image img-cir img-40">
                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                </div>
                <div class="content">
                    <h6>Michelle Moreno</h6>
                    <p>Have sent a photo</p>
                    <span class="time">3 min ago</span>
                </div>
            </div>
            <div class="mess__footer">
                <a href="#">View all messages</a>
            </div>
        </div>
    </div>
    <div class="noti__item js-item-menu">
        <i class="zmdi zmdi-email"></i>
        <span class="quantity">1</span>
        <div class="email-dropdown js-dropdown">
            <div class="email__title">
                <p>You have 3 New Emails</p>
            </div>
            <div class="email__item">
                <div class="image img-cir img-40">
                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                </div>
                <div class="content">
                    <p>Meeting about new dashboard...</p>
                    <span>Cynthia Harvey, 3 min ago</span>
                </div>
            </div>
            <div class="email__footer">
                <a href="#">See all emails</a>
            </div>
        </div>
    </div> --}}
    <div class="noti__item js-item-menu">
        <i class="zmdi zmdi-notifications"></i>
        <span class="badge badge-danger badge-counter">
            @if(count(Auth::user()->unreadNotifications) >5 )<span data-count="5" class="badge badge-danger badge-counter">5+</span>
            @else 
                <span class="badge badge-danger badge-counter" data-count="{{count(Auth::user()->unreadNotifications)}}">{{count(Auth::user()->unreadNotifications)}}</span>
            @endif
        </span>
        <div class="notifi-dropdown js-dropdown">
            <div class="notifi__title">
                <p>Notification Center</p>
            </div>
            @foreach(Auth::user()->unreadNotifications as $notification)
                <a class="dropdown-item d-flex align-items-center" target="_blank" href="{{route('admin.notification',$notification->id)}}">
                    <div class="notifi__item">
                        <div class="bg-c1 img-cir img-40">
                            {{-- <i class="zmdi {{$notification->data['zmdi']}}"></i> --}}
                        </div>
                        <div class="content">
                            <p class="@if($notification->unread()) font-weight-bold @else small text-gray-500 @endif">{{$notification->data['title']}}</p>
                            <span class="date">{{$notification->created_at->format('F d, Y h:i A')}}</span>
                        </div>
                    </div>
                </a>
                @if($loop->index+1==5)
                    @php 
                        break;
                    @endphp
                @endif
            @endforeach
            <div class="notifi__footer">
                <a href="{{route('all.notification')}}">All notifications</a>
            </div>
        </div>
    </div>
</div>