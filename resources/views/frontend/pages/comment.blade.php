@foreach($comments as $comment)
{{-- {{dd($comments)}} --}}
@php $dep = $depth-1; @endphp
<div class="single-comment-item first-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <div class="sc-author">
        @if($comment->user_info['photo'])
            <img src="{{ Storage::url($comment->user_info['photo']) }}" alt="{{ Storage::url($comment->user_info['photo']) }}" style="width: 100px; height: 100px;">
        @else 
            <img src="{{asset('backend/img/avatar.png')}}" alt="">
        @endif
    </div>
    <div class="sc-text">
        <span>{{$comment->created_at->format('g: i a')}} On {{$comment->created_at->format('M d Y')}}</span>
        <h5>{{$comment->user_info['name']}}</h5>
        <p>{{$comment->comment}}</p>
        @if($dep)
            <a href="#" class="comment-btn">Like</a>
            <a href="#" class="comment-btn" data-id="{{$comment->id}}">Reply</a>
        @endif
    </div>
    @include('frontend.pages.comment', ['comments' => $comment->replies, 'depth' => $dep])
</div>
@endforeach