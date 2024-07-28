@extends('frontend.layout.master')
@section('frontContent')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{ asset('frontend/assets/img/post-bg.jpg') }})">
        <div class="container px-4 position-relative px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle">{{ $post->sub_title }}</h3>
                        <span class="meta">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @php
                        echo $post->description;
                    @endphp

                    </p>
                </div>
            </div>
        </div>
    </article>
@endsection
