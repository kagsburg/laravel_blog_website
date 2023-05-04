<div class="noti-wrap">
  <div class="noti__item js-item-menu">
      <i class="zmdi zmdi-comment-more"></i>
      @if(count(Helper::messageList())>5)
        <span data-count="5" class="badge badge-danger badge-counter">5+</span>
      @else 
        <span data-count="{{count(Helper::messageList())}}" class="badge badge-danger badge-counter">{{count(Helper::messageList())}}</span>
      @endif
      <div class="mess-dropdown js-dropdown">
          <div class="mess__title">
              <p>Message Center</p>
          </div>
          @foreach(Helper::messageList() as $message)
            <a class="dropdown-item d-flex align-items-center" href="{{route('message.show',$message->id)}}">
              <div class="mess__item">
                  <div class="image img-cir img-40">
                    @if($message->photo)
                      <img src="{{$message->photo}}" alt="{{$message->photo}}" />
                    @else 
                      <img src="{{asset('backend/images/icon/avatar-01.jpg')}}" alt="default img">
                    @endif
                  </div>
                  <div class="content">
                      <h6>{{$message->name}}</h6>
                      <p>{{$message->subject}}</p>
                      <span class="time">{{$message->created_at->diffForHumans()}}</span>
                  </div>
              </div>
            </a>
            @if($loop->index+1==5) 
              @php 
                break;
              @endphp
            @endif
          @endforeach

          <div class="mess__footer">
            <a href="{{ route('message.index')}}">View all messages</a>
        </div>
      </div>
  </div>
  {{-- <div class="noti__item js-item-menu">
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
          <div class="email__item">
              <div class="image img-cir img-40">
                  <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
              </div>
              <div class="content">
                  <p>Meeting about new dashboard...</p>
                  <span>Cynthia Harvey, Yesterday</span>
              </div>
          </div>
          <div class="email__item">
              <div class="image img-cir img-40">
                  <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
              </div>
              <div class="content">
                  <p>Meeting about new dashboard...</p>
                  <span>Cynthia Harvey, April 12,,2018</span>
              </div>
          </div>
          <div class="email__footer">
              <a href="#">See all emails</a>
          </div>
      </div>
  </div>
  <div class="noti__item js-item-menu">
      <i class="zmdi zmdi-notifications"></i>
      <span class="quantity">3</span>
      <div class="notifi-dropdown js-dropdown">
          <div class="notifi__title">
              <p>You have 3 Notifications</p>
          </div>
          <div class="notifi__item">
              <div class="bg-c1 img-cir img-40">
                  <i class="zmdi zmdi-email-open"></i>
              </div>
              <div class="content">
                  <p>You got a email notification</p>
                  <span class="date">April 12, 2018 06:50</span>
              </div>
          </div>
          <div class="notifi__item">
              <div class="bg-c2 img-cir img-40">
                  <i class="zmdi zmdi-account-box"></i>
              </div>
              <div class="content">
                  <p>Your account has been blocked</p>
                  <span class="date">April 12, 2018 06:50</span>
              </div>
          </div>
          <div class="notifi__item">
              <div class="bg-c3 img-cir img-40">
                  <i class="zmdi zmdi-file-text"></i>
              </div>
              <div class="content">
                  <p>You got a new file</p>
                  <span class="date">April 12, 2018 06:50</span>
              </div>
          </div>
          <div class="notifi__footer">
              <a href="#">All notifications</a>
          </div>
      </div>
  </div> --}}
</div>

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {

    Echo.channel('message')
      .listen('MessageSent', (e) => {

      const message_container = $('#message-items');
      const message_counter_area = $('#messages .count');
      const message_counter = parseInt( $(message_counter_area).attr('data-count') ) + 1;
      const message_length = parseInt( $('#message-items>.dropdown-item').length );
      $(message_counter_area).attr('data-count', message_counter);

      const data = `
      <a class="dropdown-item d-flex align-items-center message-item" href="${e.message.url}">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="${e.message.photo}" alt="${e.message.name}">
        </div>
        <div class="font-weight-bold">
          <div class="text-truncate">${e.message.subject}</div>
          <div class="small text-gray-500">${e.message.name} · ${e.message.date}</div>
        </div>
      </a>
      `;

      $(message_container).prepend(data);

      if(message_counter<=5){
        $(message_counter_area).text( message_counter );
      }else{ 
        $(message_counter_area).text('5+');
      };

      if(message_length>=5) $(message_container).find('.message-item').last().remove();

    });

  });
</script>
@endpush