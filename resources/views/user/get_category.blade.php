@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : {{$categories->name}}</title>
@endsection
@section('content')
<div id="content" class="site-content">
    <div id="tropical-banner" class=" text-center clearfix">
        <img src="/assets/images/banner.jpg" alt="banner"/>
        <div class="container banner-contents clearfix">
            <h2 class="template-title p-name"><strong>{{$categories->name}}</strong></h2>
        </div>
        <div class="breadcrumb-wrapper clearfix">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/" >Home</a></li>
                    <li class="active">{{$categories->name}}</li>
                </ol>
            </div>
        </div>
        <span class="overlay"></span>
    </div>

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
                                    <span class="tour-price pull-left">UGx {{money_format("%.2n",$service->price)}}</span>
                                    <span class="tour-price-off pull-right">rating</span>
                                </header>
                                <div class="tour-contents clearfix">
                                    <figure class="tour-feature-img">
                                        <a href="single-where-we-go.html">
                                            <img src="/images/services/single_service_1170x600/{{$company->image}}"
                                                 alt="Image"/></a>
                                    </figure>
                                    <h5 class="entry-title p-name">
                                        <a href="/{{$company->slug}}">{{$company->name}}</a> </h5>
                                    <a class="more-details u-url" href="/{{$company->slug}}">See home details
                                        <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </article>
                        </div>
                            @endforeach
                    </div>
                    @else
                        <div class="text-center" style="margin-top:50px">
                            <h3>No Homes available under {{$categories->name}}!</h3>
                        </div>
                    @endif
                        <div id="pagination" class="text-center animatedParent clearfix">
                            <ul class="pagination">
                                <?php echo $services->render(); ?>
                            </ul>
                        </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <aside class="sidebar">
                        <section class="search-widget animatedParent">
                            <h5 class="hidden animated fadeInDownShort">Title</h5>
                            <div class="search animated fadeInUpShort clearfix">
                                <form method="get" class="search-form" action="special-offers.html#">
                                    <div>
                                        <input type="text" placeholder="Search Category" name="s" class="search-text">
                                        <input type="submit" class="search-submit" value="">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </form>
                            </div>
                        </section>
                        <section class="widget recent-post-widget animatedParent">
                            <h5 class="widget-title animated fadeInDownShort">Recent Blog Post</h5>
                            <article class="post blog-post-widget clearfix animated fadeInUpShort">
                                <figure class="blog-feature-img pull-right">
                                    <img src="images/blog-post-widget-img.jpg" alt="Blog Image"/>
                                </figure>
                                <h6 class="title"><a href="special-offers.html#">the standard blog post title</a></h6>
                                <time datetime="2007-08-29T13:58Z"  class="post-meta"><i class="fa fa-clock-o"></i> 08 Nov @014</time>
                            </article>
                            <article class="post blog-post-widget clearfix animated fadeInUpShort">
                                <figure class="blog-feature-img pull-right">
                                    <img src="images/blog-post-widget-img.jpg" alt="Blog Image"/>
                                </figure>
                                <h6 class="title"><a href="special-offers.html#">the standard blog post title</a></h6>
                                <time datetime="2007-08-29T13:58Z"  class="post-meta"><i class="fa fa-clock-o"></i> 08 Nov @014</time>
                            </article>
                            <article class="post blog-post-widget clearfix animated fadeInUpShort">
                                <figure class="blog-feature-img pull-right">
                                    <img src="images/blog-post-widget-img.jpg" alt="Blog Image"/>
                                </figure>
                                <h6 class="title"><a href="special-offers.html#">the standard blog post title</a></h6>
                                <time datetime="2007-08-29T13:58Z"  class="post-meta"><i class="fa fa-clock-o"></i> 08 Nov @014</time>
                            </article>
                        </section>
                        <section class="widget widget-text animatedParent">
                            <h5 class="widget-title animated fadeInDownShort">about us</h5>
                            <p class="animated fadeInUpShort">  voluptatem accusantium doloremque laudantium, totam rem aperiam eaqu ipsa quae ab illo inventore veritatis et quasi archit ecto beatae vitae dicta sunt explicabo. </p>
                        </section>
                        <section class="widget contact-widget clearfix animatedParent">
                            <h5 class="widget-title animated fadeInDownShort">Contact us</h5>
                            <address class="animated fadeInUpShort">
                                <strong> Address:</strong> 123 East West Corner Road,
                                Melborne-606
                                Australia.
                            </address>
                            <p class="phone-number animated fadeInUpShort"><strong>Phone:</strong>+61 0123 456 789</p>
                            <p class="email animated fadeInUpShort"><strong>Email:</strong> info@example.com </p>
                            <ul class="social-nav text-center clearfix animated fadeInUpShort">
                                <li><a href="special-offers.html#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="special-offers.html#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="special-offers.html#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="special-offers.html#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="special-offers.html#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>



</div><!-- .site-content -->

@endsection