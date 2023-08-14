@foreach($comments as $comment)
{{-- {{dd($comments)}} --}}
@php $dep = $depth-1; @endphp
<ul class="comment-list" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <li class="comment">
      <div class="vcard bio">
        @if($comment->user_info['photo'])
            <img src="{{ Storage::url($comment->user_info['photo']) }}" alt="{{ Storage::url($comment->user_info['photo']) }}" style="width: 50px; height: 50px;">
        @else 
            <img src="{{asset('backend/img/avatar.png')}}" alt="">
        @endif
      </div>
      <div class="comment-body">
        <h3>{{$comment->user_info['name']}}</h3>
        <div class="meta">{{$comment->created_at->format('g: i a')}} On {{$comment->created_at->format('M d Y')}}</div>
        <p>{{$comment->comment}}</p>
        <p>
            @if($dep)
                <a href="#" class="comment-btn">Like</a>
                <a href="#" class="reply" data-id="{{$comment->id}}">Reply</a>
            @endif
        </p>
      </div>
    </li>
    @include('frontend.pages.comment', ['comments' => $comment->replies, 'depth' => $dep])
  </ul>

@endforeach