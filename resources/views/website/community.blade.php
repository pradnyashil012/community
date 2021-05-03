<?php
$title = "Community";
?>
@extends('layouts.website')

@section('content')


<div class="site-section">
    <div class="container">
        <div class="row mb-1">
            <div class="col-12 text-center">
                <h1>Welcome to the Ipay Payment Community Center</h1>
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
                <h2>Recent Questions</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recentQues as $que)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <div class="excerpt">
                        <h2><a href="{{ route('website.question', ['slug' => $que->slug]) }}">{{$que->question}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left">
                                <img src="{{ asset('website/images/user.png') }}"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{$que->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{ $que->created_at->format('M d, Y') }}</span>
                        </div>
                        {{ Str::limit($que->description, 100) }}
                        <p><a href="{{ route('website.question', ['slug' => $que->slug]) }}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row text-center pt-5 border-top">

            <div class="col-md-12">
                {{ $recentQues->links('pagination::bootstrap-4') }}
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
                    <form action="#" class="d-flex">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
