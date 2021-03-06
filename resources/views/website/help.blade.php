<?php
$title = "Help";
?>
@extends('layouts.website')

@section('content')


<!--<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @foreach($postsFirst2 as $post)
                <a href="{{ route('website.post', ['slug' => $post->slug]) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{$post->image}}');">

                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach($middlePost as $post)
                <a href="{{ route('website.post', ['slug' => $post->slug]) }}" class="h-entry img-5 h-100 gradient"
                    style="background-image: url('{{$post->image}}');">

                    <div class="text">
                        <div class="post-categories mb-3">
                            <span class="post-category bg-danger">{{ $post->category->name }}</span>
                        </div>
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach($lastPost as $post)
                <a href="{{ route('website.post', ['slug' => $post->slug]) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{$post->image}}');">

                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>-->

<div class="site-section">
    <div class="container">
        <div class="row mb-1">
            <div class="col-12 text-center">
                <h1>Welcome to the Ipay Payment Help Center</h1>
            </div>
            <div class="col-12 search-form js-search-form">
                <form method="GET" action="{{ route('website.search') }}">
                    <input type="search" id="search_query" name="search_query" class="form-control" placeholder="Search your issue">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recentPosts as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('website.post', ['slug' => $post->slug]) }}"><img src="{{ $post->image }}"
                            alt="Image" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ $post->category->name }}</span>

                        <h2><a href="{{ route('website.post', ['slug' => $post->slug]) }}">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left">
                                <img src="@if($post->user->image){{ asset($post->user->image) }} @else {{ asset('website/images/user.png') }} @endif"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        {{ Str::limit($post->description, 100) }}
                        <p><a href="{{ route('website.post', ['slug' => $post->slug]) }}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row text-center pt-5 border-top">

            <div class="col-md-12">
                {{ $recentPosts->links('pagination::bootstrap-4') }}
                <!-- <div class="custom-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a>
          </div>
        </div> -->
            </div>
        </div>
    </div>
</div>

<!--<div class="site-section bg-light">
    <div class="container">

        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5 order-md-2">
                @foreach($firstfooterPost as $post)
                <a href="{{ route('website.post', ['slug' => $post->slug]) }}" class="hentry img-1 h-100 gradient"
                    style="background-image: url('{{ $post->image }}');">
                    <span class="post-category text-white bg-danger">{{ $post->category->name }}</span>
                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                </a>
            </div>
            @endforeach

            <div class="col-md-7">
                @foreach($lastFooterPost as $post)
                <a href="{{ route('website.post', ['slug' => $post->slug]) }}"
                    class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ $post->image }}');">
                    <span class="post-category text-white bg-success">{{ $post->category->name }}</span>
                    <div class="text text-sm">
                        <h2>{{ $post->title }}</h2>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                </a>
                @endforeach
                <div class="two-col d-block d-md-flex justify-content-between">
                    @foreach($firstfooterPost2 as $post)
                    <a href="{{ route('website.post', ['slug' => $post->slug]) }}"
                        class="hentry v-height img-2 gradient" style="background-image: url('{{ $post->image }}');">
                        <span class="post-category text-white bg-primary">{{ $post->category->name }}</span>
                        <div class="text text-sm">
                            <h2>{{ $post->title }}</h2>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </a>
                    @endforeach

                </div>

            </div>
        </div>

    </div>
</div>-->

<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Ask Your Question Here</h2>
                    <p class="mb-5">Din't find the solution, please ask the community</p>
                    <a href="{{ route('website.ask')}}" class="btn btn-danger" target="_blank">Ask Question</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Know latest problems and their solutions.</p>
                    <form action="{{ route('website.subscribe') }}" method="post" enctype="multipart/form-data"
                        class="d-flex">
                        @csrf
                        @include('includes.errors')
                        @if(Session::has('subscribed'))
                        <div class="alert alert-success">{{ Session::get('subscribed') }}</div><br>
                        @endif
                        <input type="email" name="email" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
