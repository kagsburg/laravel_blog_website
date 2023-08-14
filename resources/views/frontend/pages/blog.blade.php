@extends('frontend.layouts.master')
@section('title') {{ __('header.news_title') }} @endsection
@section('main-content')

<div class="hero-wrap" style="background-image: url('{{ asset('frontend/images/article.jpeg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
        <div class="text">
            <p class="breadcrumbs mb-2">
              <span class="mr-2"><a href="{{ route('home') }}">Home</a></span> 
              <span>Blog</span>
            </p>
            <h1 class="mb-4 bread">Our Stories</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      @foreach($posts as $post)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20 rounded" style="background-image: url('{{ Storage::url($post->photo) }}');">
            </a>
            <div class="text mt-3">
              <div class="meta mb-2">
                <div><a href="#">{{$post->created_at->format('d M , Y. D')}}</a></div>
                <div><a href="#">{{$post->author_info['name']}}</a></div>
                {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> ({{$post->allComments->count()}})</a></div> --}}
              </div>
              <h3 class="heading"><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
              <p>{{$post->summary}}</p>
              <a href="{{route('blog.detail',$post->slug)}}" class="btn btn-secondary rounded">More info</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    {{-- <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div> --}}
  </div>
</section>

@endsection