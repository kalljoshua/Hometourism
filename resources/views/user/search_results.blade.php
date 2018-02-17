@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : Search Results</title>
@endsection
@section('content')
    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                <h2 class="template-title p-name"><strong>Search Results</strong></h2>
            </div>
            <div class="breadcrumb-wrapper clearfix">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="/" >Home</a></li>
                        <li class="active">Search Results</li>
                    </ol>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="tour-page special-offers clearfix">
            <div class="container">

                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        @if(sizeof($services)>0)
                            <div class="row">
                                @foreach($services as $service)
                                    <div class="col-md-4 col-xs-6 animatedParent">
                                        <article class="tour-post animated fadeInUpShort">
                                            <header class="tour-post-header clearfix">
                                                <span class="tour-price pull-left">$ {{number_format($service->price)}}</span>
                                                <span class="tour-days pull-right" style="color: #FDC600">
                                                    @for ($k=1; $k <= 5 ; $k++)
                                                        <span data-title="Average Rate: 5 / 5"
                                                              class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $service->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                                    @endfor
                                                    ({{$service->rating}})
                                                </span>
                                            </header>
                                            <div class="tour-contents clearfix">
                                                <figure class="tour-feature-img">
                                                    <a href="single-where-we-go.html">
                                                        <img src="/images/services/single_service_1170x600/{{$service->image}}"
                                                             alt="Image"/></a>
                                                </figure>
                                                <h5 class="entry-title p-name">
                                                    <a href="/{{$service->slug}}">{{$service->name}}</a> </h5>
                                                <span class="pull-left" style="color: #fd0b31">views ({{$service->views}})</span>
                                                <a class="more-details u-url" href="/{{$service->slug}}">See home details
                                                    <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center" style="margin-top:50px">
                                <h3>No Homes available from your search!</h3>
                            </div>
                        @endif
                        <div id="pagination" class="text-center animatedParent clearfix">
                            <ul class="pagination">
                                <?php echo $services->render(); ?>
                            </ul>
                        </div>
                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->

@endsection