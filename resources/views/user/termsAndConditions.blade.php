@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : Terms of Use</title>
@endsection
@section('content')

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                <h2 class="template-title p-name"><strong>Terms of Use</strong></h2>
            </div>
            <div class="breadcrumb-wrapper clearfix">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="/" >Home</a></li>
                        <li class="active">Terms of Use</li>
                    </ol>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="blog-single clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <article class="blog-post">

                            <div class="entry-contents animatedParent clearfix">
                                <h4 class="entry-title animated fadeInUpShort">
                                    <a href="#">Terms of Use</a></h4>
                                <p class="animated fadeInUpShort">
                                </p>

                            </div>
                        </article>


                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
@endsection
