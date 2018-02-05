@extends('...layouts.user_layout')
@section('title')
  <title>HomeTourism : Home</title>
@endsection
@section('content')

    <div class="main-slider-wrap">
        <div class="main-slider">
            <div class="item">
                <img src="/assets/images/slide1.jpg" alt="one"/>
                <div class="slide-details clearfix">
                    <h3 class="title"><span>Have adventure trip with</span><span> tropical </span></h3>
                </div>
            </div>
            <div class="item">
                <img src="/assets/images/slide2.jpg" alt="one"/>
                <div class="slide-details clearfix">
                    <h3 class="title"><span>Have adventure trip with</span><span> tropical </span></h3>
                </div>
            </div>
            <div class="item">
                <img src="/assets/images/slide3.jpg" alt="one"/>
                <div class="slide-details clearfix">
                    <h3 class="title"><span>Have adventure trip with</span><span> tropical </span></h3>
                </div>
            </div>
        </div><form id="adv-search" action="home-var-two.html#">
            <div class="container">
                <fieldset>
                    <legend><span>Find the Tour</span></legend>
                    <div class="form-wrap clearfix">
                        <select class="form-control" id="places" >
                            <option>Africa</option>
                            <option>India</option>
                            <option>America</option>
                            <option>Russia</option>
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
    <section class="home-special-offers animatedParent clearfix">
        <div class="container">
            <header class="section-header header-with-nav clearfix">
                <h3 class="title pull-left animated growIn">FEATURED HOMES</h3>
                <a class="pull-right animated growIn" href="index.html#">see more offers</a>
            </header>
            <div class="tour-carousel animated flipInX clearfix">
                @for($i=1; $i<=5; $i++)
                <article class="tour-post">
                    <i class="circle-icon"></i>
                    <header class="tour-post-header clearfix">
                        <span class="tour-price pull-left">$299.00</span>
                        <span class="tour-price-off pull-right">30% OFF</span>
                    </header>
                    <div class="tour-contents clearfix">
                        <figure class="tour-feature-img">
                            <img src="/assets/images/tour-carousel-img-{{$i}}.jpg" alt="Image"/>
                        </figure>
                        <h5 class="entry-title p-name">Thai island hopper east</h5>
                        <a class="more-details u-url" href="index.html#">See tour details <i class="fa fa-angle-right"></i></a>
                    </div>
                </article>
                @endfor
            </div>
        </div>
    </section>
    <div style="height: 15px; background-color: white;">
    </div>
    <section class="home-special-offers animatedParent clearfix">
        <div class="container">
            <header class="section-header header-with-nav clearfix">
                <h3 class="title pull-left animated growIn">MOST VIEWED HOMES</h3>
                <a class="pull-right animated growIn" href="index.html#">see more offers</a>
            </header>
            <div class="tour-carousel animated flipInX clearfix">
                @for($i=1; $i<=5; $i++)
                    <article class="tour-post">
                        <i class="circle-icon"></i>
                        <header class="tour-post-header clearfix">
                            <span class="tour-price pull-left">$299.00</span>
                            <span class="tour-price-off pull-right">30% OFF</span>
                        </header>
                        <div class="tour-contents clearfix">
                            <figure class="tour-feature-img">
                                <img src="/assets/images/tour-carousel-img-{{$i}}.jpg" alt="Image"/>
                            </figure>
                            <h5 class="entry-title p-name">Thai island hopper east</h5>
                            <a class="more-details u-url" href="index.html#">See tour details <i class="fa fa-angle-right"></i></a>
                        </div>
                    </article>
                @endfor
            </div>
        </div>
    </section>
    <div style="height: 15px; background-color: white;">
    </div>
    <section class="home-special-offers animatedParent clearfix">
        <div class="container">
            <header class="section-header header-with-nav clearfix">
                <h3 class="title pull-left animated growIn">RECENTLY ADDED HOMES</h3>
                <a class="pull-right animated growIn" href="index.html#">see more offers</a>
            </header>
            <div class="tour-carousel animated flipInX clearfix">
                @for($i=1; $i<=5; $i++)
                    <article class="tour-post">
                        <i class="circle-icon"></i>
                        <header class="tour-post-header clearfix">
                            <span class="tour-price pull-left">$299.00</span>
                            <span class="tour-price-off pull-right">30% OFF</span>
                        </header>
                        <div class="tour-contents clearfix">
                            <figure class="tour-feature-img">
                                <img src="/assets/images/tour-carousel-img-{{$i}}.jpg" alt="Image"/>
                            </figure>
                            <h5 class="entry-title p-name">Thai island hopper east</h5>
                            <a class="more-details u-url" href="index.html#">See tour details <i class="fa fa-angle-right"></i></a>
                        </div>
                    </article>
                @endfor
            </div>
        </div>
    </section>
    <section class="home-tour-type animatedParent clearfix">
        <div class="container">
            <header class="text-center">
                <h3 class="title-with-separator animated growIn">Explore the World by type</h3>
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
                        <ul class="first clearfix">
                            <li>spring (sept-nov) <span class="circle-icon"></span></li>
                            <li>
                                <ul class="clearfix">
                                    <li>Average Min <span class="circle-icon"></span></li>
                                    <li>18 C <span class="circle-icon"></span></li>
                                    <li>64 F</li>
                                </ul>
                                <ul class="clearfix">
                                    <li>Average Min</li>
                                    <li>18 C</li>
                                    <li>64 F</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="clearfix">
                            <li>spring (sept-nov)</li>
                            <li>
                                <ul class="clearfix">
                                    <li>Average Min</li>
                                    <li>18 C</li>
                                    <li>64 F</li>
                                </ul>
                                <ul class="clearfix">
                                    <li>Average Min</li>
                                    <li>18 C</li>
                                    <li>64 F</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="clearfix">
                            <li>spring (sept-nov)</li>
                            <li>
                                <ul class="clearfix">
                                    <li>Average Min</li>
                                    <li>18 C</li>
                                    <li>64 F</li>
                                </ul>
                                <ul class="clearfix">
                                    <li>Average Min</li>
                                    <li>18 C</li>
                                    <li>64 F</li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="location-map-wrap animated flipInX slower clearfix">
                        <div id="location-map"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="testimonials animatedParent clearfix" style="background-color: white">
        <div class="container">
            <header class="text-center">
                <h3 class="title-with-separator animated growIn">User Experience</h3>
            </header>
            <div class="row">
                <div class="col-sm-6">
                    <article class="testimonial animated fadeInUpShort clearfix">
                        <figure class="avatar">
                            <img src="/assets/images/avatar.jpg" alt="avatar"/>
                        </figure>
                        <div class="contents">
                            <p>“Maecenas faucibus mollis intedum. Nulla vitaery elit ayt lbero pharetra augue. Integer posuere ererotu  anten tuer venenatise Dapibus posuere. Aenean eu leo quam”
                            </p>
                            <cite class="fn">- <strong>Steave Jhon,</strong> tourism Specialist</cite>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6">
                    <article class="testimonial animated fadeInUpShort clearfix">
                        <figure class="avatar">
                            <img src="/assets/images/avatar.jpg" alt="avatar"/>
                        </figure>
                        <div class="contents">
                            <p>“Maecenas faucibus mollis intedum. Nulla vitaery elit ayt lbero pharetra augue. Integer posuere ererotu  anten tuer venenatise Dapibus posuere. Aenean eu leo quam”
                            </p>
                            <cite class="fn">- <strong>Steave Jhon,</strong> tourism Specialist</cite>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6">
                    <article class="testimonial animated fadeInDownShort clearfix">
                        <figure class="avatar">
                            <img src="/assets/images/avatar.jpg" alt="avatar"/>
                        </figure>
                        <div class="contents">
                            <p>“Maecenas faucibus mollis intedum. Nulla vitaery elit ayt lbero pharetra augue. Integer posuere ererotu  anten tuer venenatise Dapibus posuere. Aenean eu leo quam”
                            </p>
                            <cite class="fn">- <strong>Steave Jhon,</strong> tourism Specialist</cite>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6">
                    <article class="testimonial animated fadeInDownShort clearfix">
                        <figure class="avatar">
                            <img src="/assets/images/avatar.jpg" alt="avatar"/>
                        </figure>
                        <div class="contents">
                            <p>“Maecenas faucibus mollis intedum. Nulla vitaery elit ayt lbero pharetra augue. Integer posuere ererotu  anten tuer venenatise Dapibus posuere. Aenean eu leo quam”
                            </p>
                            <cite class="fn">- <strong>Steave Jhon,</strong> tourism Specialist</cite>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
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

 
