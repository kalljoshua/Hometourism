@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : {{$company->name}}</title>
@endsection
@section('content')

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                @include('user.search')
            </div>
            <div class="breadcrumb-wrapper clearfix">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="/" >Home</a></li>
                        <li class="active">{{$company->name}}</li>
                    </ol>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="tour-single clearfix">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9 col-sm-8">
                        <header class="entry-header animatedParent clearfix">
                            <h4 class="pull-left tour-single-title animated growIn slower">{{$company->title}}</h4>
                            <span class="pull-left" style="color: #FDC600; font-size: 16px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Views ({{$company->views}})</span>

                        </header>
                        <article class="tour-post-single clearfix">
                            <div class="tour-single-slider animatedParent clearfix">
                                <div class="slier tour-single-slider-for animated fadeInUpShort">
                                    <div class="item">
                                        <img src="/images/services/single_service_1170x600/{{$company->image}}"
                                             alt="Tour Single"/></div>
                                    @if(App\DestinationImage::where('popular_destination_id',$company->id)->count()>0)
                                        @foreach(App\DestinationImage::where('popular_destination_id',$company->id)->get() as $S_images)
                                            <div class="item">
                                                <img src="/images/services/single_service_1170x600/{{$S_images->image}}" alt="Tour Single"/></div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="slider tour-single-slider-nav animated fadeInUpShort">
                                    <div class="item slick-active">
                                        <img src="/images/services/single_service_1170x600/{{$company->image}}"
                                             alt="Tour Single"/></div>
                                    @if(App\DestinationImage::where('popular_destination_id',$company->id)->count()>0)
                                        @foreach(App\DestinationImage::where('popular_destination_id',$company->id)->get() as $S_images)
                                            <div class="item">
                                                <img src="/images/services/single_service_1170x600/{{$S_images->image}}"
                                                     alt="Tour Single"/></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tour-single-contents animatedParent clearfix">
                                <div class="tour-post-meta pull-right animated fadeInUpShort clearfix">
                                    <span><i class="fa fa-envelope"></i><strong>Email Address : &nbsp;
                                        </strong>{{$company->email}}</span>
                                    <span><i class="fa fa-briefcase"></i><strong>Country : &nbsp;
                                        </strong>{{$company->country}}</span>
                                    <span><i class="fa fa-tags"></i><strong>State : &nbsp;
                                        </strong>{{$company->district}}</span>
                                </div>
                                Address
                                <p> {{$company->address}}</p>
                                Details
                                <p> {{$company->description}}</p>


                            </div>

                            <div class="tour-single-contents animatedParent clearfix">
                                <div class="tour-post-meta pull-right animated fadeInUpShort clearfix">
                                    <span><i class="fa fa-globe"></i><strong>Website : &nbsp;
                                        </strong>{{$company->website}}</span>
                                    <span><i class="fa fa-facebook"></i><strong>Facebook : &nbsp;
                                        </strong>{{$company->facebook}}</span>
                                    <span><i class="fa fa-twitter"></i><strong>Twitter : &nbsp;
                                        </strong>$ {{$company->twitter}}</span>
                                </div>
                                Features:
                                @foreach($company->features as $feature)
                                <p style="margin-left: 60px">{{$feature->feature}}</p>
                                @endforeach

                            </div>

                        </article>

                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
@endsection