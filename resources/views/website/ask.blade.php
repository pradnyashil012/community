<?php
$title = "Ask";
?>
@extends('layouts.website')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{ asset('website') }}/images/img_4.jpg');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <h1 class="">Ask</h1>
                    <p class="lead mb-4 text-white">Share your issue and get the solutions from the community!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-5">
                <form action="{{ route('website.ask') }}" method="post" class="p-5 bg-white" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')
                    @if(Session::has('question-asked'))
                    <div class="alert alert-success">{{ Session::get('question-asked') }}</div>
                    @endif
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="fname">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="question">Question</label>
                            <textarea name="question" id="question" cols="30" rows="3" class="form-control"
                                placeholder="Write your question here..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="description">Description</label>
                            <textarea name="description" id="description" id="" cols="30" rows="10"
                                                class="form-control"
                                                placeholder="Enter Description"></textarea>       
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Ask Question" class="btn btn-primary py-2 px-4 text-white">
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-md-5">

                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Phone Number</p>
                    <p class="mb-0"><a href="#">+91{{ $setting->phone }}</a></p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="#">{{ $setting->email }}</a></p>

                    <p class="mb-0 font-weight-bold">Address</p>
                    <p class="mb-0"><a href="#">{{ $setting->address }}</a></p>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('/website/css/summernote-bs4.min.css')}}">
@endsection

@section('script')
<script src="{{asset('/website/js/summernote-bs4.min.js')}}">
</script>
<script>
    $('#description').summernote({
        placeholder: 'Write description of the question',
        tabsize: 2,
        height: 100
    });

</script>
@endsection
