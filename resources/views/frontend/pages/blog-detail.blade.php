@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$post->summary}}">
	<meta property="og:url" content="{{route('room-detail',$post->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$post->title}}">
	<meta property="og:image" content="{{$post->photo}}">
	<meta property="og:description" content="{{$post->description}}">
@endsection
@section('title') {{$post->title}} @endsection
@section('main-content')

<div class="hero-wrap" style="background-image: url('{{ asset('frontend/images/article-detail.jpeg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
        <div class="text">
            <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              <span class="mr-2"><a href="{{ route('home') }}">Home</a></span> 
              <span class="mr-2"><a href="{{ route('blog') }}">Blog</a></span> 
              <span>{{$post->title}}</span>
            </p>
            <h1 class="mb-4 bread">{{$post->title}}</h1>
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.layouts.notification')

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{$post->title}}</h2>
        <p>{!! $post->description !!}</p>
        <p>
          <img src="{{ Storage::url($post->photo) }}" alt="" class="img-fluid">
        </p>

        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            @php
                $tags=explode(',',$post->tags);
            @endphp
            @foreach(Helper::postTagList('tags') as $tag)
                <a href="{{route('blog.tag',$tag['slug'])}}" class="tag-cloud-link">{{$tag->title}}</a>
            @endforeach
          </div>
        </div>
        
        {{-- <div class="about-author d-flex p-4 bg-light">
          <div class="bio align-self-md-center mr-4">
            <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc align-self-md-center">
            <h3>{{$post->author_info['name']}}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div> --}}


        {{-- <div class="pt-5 mt-5"> --}}
          {{-- <h3 class="mb-5">({{$post->allComments->count()}}) Comments</h3> --}}
          <!-- Single Comment -->
          {{-- @include('frontend.pages.comment', ['comments' => $post->comments, 'post_id' => $post->id, 'depth' => 3]) --}}
          <!-- End Single Comment -->
          {{-- <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form class="p-5 bg-light" id="commentForm" action="{{route('post-comment.store',$post->slug)}}" method="POST">
              @csrf

              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <input type="hidden" name="parent_id" id="parent_id" value="" />
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
              </div>

            </form>
          </div> --}}
          <!-- END comment-list -->
          {{-- @auth
          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form class="p-5 bg-light" id="commentForm" action="{{route('post-comment.store',$post->slug)}}" method="POST">
              @csrf

              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <input type="hidden" name="parent_id" id="parent_id" value="" />
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
              </div>

            </form>
          </div> --}}

          {{-- @else
          <p class="text-center p-5">
              You need to <a href="{{route('admin')}}" style="color:rgb(54, 54, 204)">Login</a> for comment.
          </p> --}}
          <!--/ End Form -->
          {{-- @endauth
        </div> --}}

      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate pl-md-5">
        <div class="sidebar-box">
          <form action="{{route('blog.search')}}" class="search-form">
            <div class="form-group">
              <span class="icon fa fa-search"></span>
              <input type="text" name="search" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Categories</h3>
            @foreach(Helper::postCategoryList('posts') as $cat)
              <li><a href="{{route('blog.category',$cat['slug'])}}">{{$cat->title}}</a></li>
            @endforeach
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          @foreach($recent_posts as $post)
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{ Storage::url($post->photo) }});"></a>
              <div class="text">
                <h3 class="heading"><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> {{$post->created_at->format('d M , Y. D')}}</a></div>
                  <div><a href="#"><span class="icon-person"></span> {{$post->author_info['name']}}</a></div>
                  <div><a href="#"><span class="icon-chat"></span> ({{$post->allComments->count()}})</a></div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag Cloud</h3>
          <div class="tagcloud">
            @php
                $tags=explode(',',$post->tags);
            @endphp
            @foreach(Helper::postTagList('tags') as $tag)
              <a href="{{route('blog.tag',$tag['slug'])}}" class="tag-cloud-link">{{$tag->title}}</a>
            @endforeach
          </div>
        </div>

        {{-- <div class="sidebar-box ftco-animate">
          <h3>Paragraph</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
        </div> --}}
      </div>

    </div>
  </div>
</section> <!-- .section -->

@endsection
@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){

(function($) {
    "use strict";

    $('.btn-reply.reply').click(function(e){
        e.preventDefault();
        $('.btn-reply.reply').show();

        $('.comment_btn.comment').hide();
        $('.comment_btn.reply').show();

        $(this).hide();
        $('.btn-reply.cancel').hide();
        $(this).siblings('.btn-reply.cancel').show();

        var parent_id = $(this).data('id');
        var html = $('#commentForm');
        $( html).find('#parent_id').val(parent_id);
        $('#commentFormContainer').hide();
        $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
      });

    $('.comment-list').on('click','.btn-reply.cancel',function(e){
        e.preventDefault();
        $(this).hide();
        $('.btn-reply.reply').show();

        $('.comment_btn.reply').hide();
        $('.comment_btn.comment').show();

        $('#commentFormContainer').show();
        var html = $('#commentForm');
        $( html).find('#parent_id').val('');

        $('#commentFormContainer').append(html);
    });

})(jQuery)
})
</script>
@endpush
