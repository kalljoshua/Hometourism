@extends('...layouts.user_layout')
@section('title')
  <title>HomeTourism : Home</title>
@endsection
@section('content')
    <link rel="stylesheet" href="/assets/css/weather.css" type="text/css" media="all">

    <div class="main-slider-wrap">
        <div class="main-slider">
            <div class="item">
                <img src="/assets/images/slide1.jpg" alt="one"/>
                <div class="slide-details clearfix">
                    <h3 class="title"><span>Make Extra Money from Your Home Space</span>
                        <span>With Shatsi Host Homes.</span></h3>
                </div>
            </div>
            <div class="item">
                <img src="/assets/images/slide2.jpg" alt="one"/>
                <div class="slide-details clearfix">
                    <h3 class="title"><span>Make Extra Money from Your Home Space</span>
                        <span>With Shatsi Host Homes.</span></h3>
                </div>
            </div>
            <div class="item">
                <img src="/assets/images/slide3.jpg" alt="one"/>
                <div class="slide-details clearfix">
                    <h3 class="title"><span>Make Extra Money from Your Home Space</span>
                        <span>With Shatsi Host Homes.</span></h3>
                </div>
            </div>
        </div>
        <form id="adv-search" action="home-var-two.html#">
            <div class="container">
                <fieldset>
                    <legend><span>Find A Host</span></legend>
                    <div class="form-wrap clearfix">
                        <select class="form-control" id="places" >
                            <option>Uganda</option>
                            <option>Kenya</option>
                            <option>Tanzania</option>
                            <option>Rwanda</option>
                            <option>Burundi</option>
                            <option>South Sudan</option>

                        </select>
                        <div class="input-group input-append date date-picker" >
                            <input type="text" class="form-control" name="date" value="CHECK-IN DATE">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                        </div>
                        <div class="input-group input-append date date-picker" >
                            <input type="text" class="form-control" name="date" value="CHECK-OUT DATE">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                        </div>
                        <select class="form-control" id="budget" >
                            <option>MAX-BUDGET</option>
                            <option>$300</option>
                            <option>$400</option>
                            <option>$500</option>
                            <option>$600</option>
                        </select>
                        <input name="search-tour" type="submit" value="Search Tours">
                    </div>

                </fieldset>
            </div>
        </form>
    </div>
    @if(sizeof($featured_services)>0)
    <section class="home-special-offers animatedParent clearfix">
        <div class="container">
            <header class="section-header header-with-nav clearfix">
                <h3 class="title pull-left animated growIn">FEATURED HOMES</h3>
                <a class="pull-right animated growIn" href="index.html#">see more offers</a>
            </header>
            <div class="tour-carousel animated flipInX clearfix">
                @foreach($featured_services as $featured)
                <article class="tour-post">
                    <i class="circle-icon"></i>
                    <header class="tour-post-header clearfix">
                        <span class="tour-price pull-left">UGx {{money_format("%.2n",$featured->price)}}</span>
                        <span class="tour-price-off-h pull-right">
                         @for ($k=1; $k <= 5 ; $k++)
                                <span data-title="Average Rate: 5 / 5"
                                      class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $featured->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                            @endfor
                            ({{$featured->rating}})
                        </span>
                    </header>
                    <div class="tour-contents clearfix">
                        <figure class="tour-feature-img">
                            <img src="/images/services/our_location_770x370/{{$featured->image}}" alt="Image"/>
                        </figure>
                        <h5 class="entry-title p-name">{{$featured->name}}</h5>
                        <span style="color: #FDC600">views ({{$featured->views}})</span>
                        <a class="more-details u-url" href="/{{$featured->slug}}">
                            See home details <i class="fa fa-angle-right"></i></a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <div style="height: 15px; background-color: white;">
    </div>
    @endif
    @if(sizeof($most_viewed_services)>0)
    <section class="home-special-offers animatedParent clearfix">
        <div class="container">
            <header class="section-header header-with-nav clearfix">
                <h3 class="title pull-left animated growIn">MOST VIEWED HOMES</h3>
                <a class="pull-right animated growIn" href="index.html#">see more offers</a>
            </header>
            <div class="tour-carousel animated flipInX clearfix">
                @foreach($most_viewed_services as $most_viewed)
                    <article class="tour-post">
                        <i class="circle-icon"></i>
                        <header class="tour-post-header clearfix">
                            <span class="tour-price pull-left">UGx {{money_format("%.2n",$most_viewed->price)}}</span>
                            <span class="tour-price-off-h pull-right">
                         @for ($k=1; $k <= 5 ; $k++)
                                    <span data-title="Average Rate: 5 / 5"
                                          class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $most_viewed->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                @endfor
                                ({{$most_viewed->rating}})
                        </span>
                        </header>
                        <div class="tour-contents clearfix">
                            <figure class="tour-feature-img">
                                <img src="/images/services/our_location_770x370/{{$most_viewed->image}}" alt="Image"/>
                            </figure>
                            <h5 class="entry-title p-name">{{$most_viewed->name}}</h5>
                            <span style="color: #FDC600">views ({{$most_viewed->views}})</span>
                            <a class="more-details u-url" href="/{{$most_viewed->slug}}">
                                See home details <i class="fa fa-angle-right"></i></a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <div style="height: 15px; background-color: white;">
    </div>
    @endif
    @if(sizeof($recent_services)>0)
    <section class="home-special-offers animatedParent clearfix">
        <div class="container">
            <header class="section-header header-with-nav clearfix">
                <h3 class="title pull-left animated growIn">RECENTLY ADDED HOMES</h3>
                <a class="pull-right animated growIn" href="index.html#">see more offers</a>
            </header>
            <div class="tour-carousel animated flipInX clearfix">
                @foreach($recent_services as $recent)
                    <article class="tour-post">
                        <i class="circle-icon"></i>
                        <header class="tour-post-header clearfix">
                            <span class="tour-price pull-left">UGx {{money_format("%.2n",$recent->price)}}</span>
                            <span class="tour-price-off-h pull-right">
                         @for ($k=1; $k <= 5 ; $k++)
                                    <span data-title="Average Rate: 5 / 5"
                                          class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $recent->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                @endfor
                                ({{$recent->rating}})
                        </span>
                        </header>
                        <div class="tour-contents clearfix">
                            <figure class="tour-feature-img">
                                <img src="/images/services/our_location_770x370/{{$recent->image}}" alt="Image"/>
                            </figure>
                            <h5 class="entry-title p-name">{{$recent->name}}</h5>
                            <span style="color: #FDC600">views ({{$recent->views}})</span>
                            <a class="more-details u-url" href="/{{$recent->slug}}">
                                See home details <i class="fa fa-angle-right"></i></a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section class="home-tour-type animatedParent clearfix">
        <div class="container">
            <header class="text-center">
                <h3 class="title-with-separator animated growIn">Explore the Host Homes by type</h3>
            </header>
            <div class="row">
                @foreach(App\Type::all() as $type)
                <div class="col-md-4 col-xs-6">
                    <article class="service-var-2 animated fadeInLeftShort clearfix">
                        <div class="icon-wrap">
                            <i class="dashicons dashicons-universal-access"></i>
                        </div>
                        <div class="contents-wrap">
                            <h5 class="entry-title p-name">{{$type->name}}</h5>
                            <small>{{$type->companies->count()}} homes available </small>
                        </div>
                        <a class="more" href="/homes/{{$type->id}}"><i class="fa fa-angle-right"></i></a>
                    </article>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <section class="weather-location-map animatedParent clearfix">
        <div class="container">
            <header class="text-center">
                <h3 class="title-with-separator animated growIn">Weather & Location Map</h3>
            </header>
            <div class="row">
                <div class="col-sm-6">
                    <div class="weather-table animated flipInX slower">
                        <div id="weather"></div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="location-map-wrap animated flipInX slower clearfix">
                        <div id="dvMap" style="width: 100%; height: 400px"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @if(sizeof($experiences)>0)
    <section class="testimonials animatedParent clearfix" style="background-color: white">
        <div class="container">
            <header class="text-center">
                <h3 class="title-with-separator animated growIn">User Experience</h3>
            </header>
            <div class="row experience-carousel">
                @foreach($experiences as $experience)
                    <div class="carousel-inner">
                        <div class="col-sm-12">
                            <article class="testimonial animated fadeInUpShort clearfix">
                                <figure class="avatar">
                                    <img src="/assets/images/avatar.jpg" alt="avatar"/>
                                </figure>
                                <div class="contents">
                                    <p>“{{$experience->details}}”
                                    </p>
                                    <cite class="fn">- <strong>{{$experience->user->name}}</strong></cite>
                                </div>
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section>

    @endif

    <section class="partners clearfix" style="background-color: #F8F8F8">
        <div class="container">
            <header class="text-center animatedParent">
                <h3 class="title-with-separator animated growIn">our partners</h3>
            </header>
            <div class="partners-carousel clearfix">
                <div class="partner">
                    <img src="/assets/images/partner-1.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-2.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-3.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-4.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-5.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-1.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-2.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-3.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-4.png" alt="partner"/>
                </div>
                <div class="partner">
                    <img src="/assets/images/partner-5.png" alt="partner"/>
                </div>
            </div>
        </div>
    </section>


@endsection

 
