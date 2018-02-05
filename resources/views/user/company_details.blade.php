@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : {{$company->name}}</title>
@endsection
@section('content')

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                <h2 class="template-title p-name"><strong>{{$company->name}}</strong></h2>
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

        <section class="tour-single clearfix">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9 col-sm-8">
                        <header class="entry-header animatedParent clearfix">
                            <h3 class="pull-left tour-single-title animated growIn slower">{{$company->name}}</h3>
                            <span class="tour-price-single pull-right animated growIn slower">
                               @for ($k=1; $k <= 5 ; $k++)
                                    <span data-title="Average Rate: 5 / 5"
                                          class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $company->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                @endfor
                            </span>
                        </header>
                        <article class="tour-post-single clearfix">
                            <div class="tour-single-slider animatedParent clearfix">
                                <div class="slier tour-single-slider-for animated fadeInUpShort">
                                    <div class="item">
                                        <img src="/images/services/single_service_1170x600/{{$company->image}}"
                                             alt="Tour Single"/></div>
                                    @if(App\ServiceImage::where('company_id',$company->id)->count()>0)
                                        @foreach(App\ServiceImage::where('company_id',$company->id)->get() as $S_images)
                                        <div class="item">
                                            <img src="/images/services/single_service_1170x600/{{$S_images->image}}" alt="Tour Single"/></div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="slider tour-single-slider-nav animated fadeInUpShort">
                                    <div class="item slick-active">
                                        <img src="/images/services/single_service_1170x600/{{$company->image}}"
                                             alt="Tour Single"/></div>
                                    @if(App\ServiceImage::where('company_id',$company->id)->count()>0)
                                        @foreach(App\ServiceImage::where('company_id',$company->id)->get() as $S_images)
                                            <div class="item">
                                                <img src="/images/services/single_service_1170x600/{{$S_images->image}}"
                                                     alt="Tour Single"/></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tour-single-contents animatedParent clearfix">
                                <div class="tour-post-meta pull-right animated fadeInUpShort clearfix">
                                    <span><i class="fa fa-map-marker"></i><strong>Address : &nbsp;
                                        </strong>{{$company->address}}</span>
                                    <span><i class="fa fa-clock-o"></i><strong>Duration : &nbsp;
                                        </strong>{{$company->created_at}}</span>
                                    <span><i class="fa fa-tags"></i><strong>Price : &nbsp;
                                        </strong>UGx {{money_format("%.2n",$company->price)}}</span>
                                </div>
                                <p> {{$company->description}}</p>
                                <footer class="tour-contents-footer clearfix">
                                    <a class="t-btn btn-red pull-right" href="single-where-we-go.html#" data-toggle="modal"
                                       data-target="#booking-popup">Booking Now</a>
                                    <a class="t-btn btn-black-border pull-right" href="single-where-we-go.html#"
                                       data-toggle="modal" data-target="#ask-q-popup">Ask Question</a>
                                    <div class="modal fade" id="booking-popup" tabindex="-1" role="dialog"
                                         aria-labelledby="booking-popup" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                <i class="fa fa-close"></i></button>

                                        </div>
                                    </div>
                                    <div class="modal fade" id="ask-q-popup" tabindex="-1" role="dialog" aria-labelledby="ask-q-popup" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i></button>

                                        </div>
                                    </div>
                                </footer>
                            </div>

                            <div class="tour-single-rates animatedParent clearfix">
                                <div class="accommodation animated fadeInUpShort clearfix">
                                    <ul class="clearfix">
                                        <li><strong>Home Occupants</strong> <span class="circle-icon"></span></li>
                                        <li>@if($company->adults>0)
                                                {{$company->adults}} Adults
                                            @else
                                                No Adults
                                            @endif
                                            <span class="circle-icon"></span></li>
                                        <li>@if($company->children>0)
                                                {{$company->children}} Children
                                            @else
                                                No Children
                                            @endif
                                        </li>

                                    </ul>
                                    <ul class="clearfix">
                                        <li><strong>Community Setup</strong></li>
                                        <li>@if($company->town>0)
                                                Town Setting
                                            @else
                                                Village setting
                                            @endif
                                        </li>
                                        <li>@if($company->shoppingmall>0)
                                                Near Shopping Mall
                                            @else
                                                No Shopping Mall
                                            @endif
                                        </li>

                                    </ul>
                                    <ul class="clearfix">
                                        <li><strong>Latrines and Toilets</strong></li>
                                        <li>@if($company->toilet>0)
                                                {{$company->toilet}} Toilets
                                            @else
                                                No Toilets
                                            @endif
                                        </li>
                                        <li>@if($company->bathrooms>0)
                                                {{$company->bathrooms}} Bathrooms
                                            @else
                                                No Bathrooms
                                            @endif
                                        </li>

                                    </ul>
                                </div>
                                <div class="accommodation animated fadeInDownShort clearfix">
                                    <ul class="clearfix">
                                        <li>@if($company->hospitals>0)
                                                Hospital Nearby
                                            @else
                                                No Hospital Nearby
                                            @endif
                                            <span class="circle-icon"></span></li>
                                        <li>@if($company->wifi>0)
                                                Wifi available
                                            @else
                                                No Wifi available
                                            @endif
                                            <span class="circle-icon"></span></li>
                                        <li>@if($company->wateraccess>0)
                                                Water source available
                                            @else
                                                No Water source
                                            @endif
                                            <span class="circle-icon"></span></li>

                                        <li>
                                            @if($company->river_lake>0)
                                                Water Body nearby
                                            @else
                                                No Water Body nearby
                                            @endif
                                        </li>
                                    </ul>
                                    <ul class="clearfix">
                                        <li>
                                            @if($company->mountain>0)
                                                Mountain nearby
                                            @else
                                                No Mountain nearby
                                                @endif
                                        </li>
                                        <li>
                                            @if($company->nationalpark>0)
                                                National Park nearby
                                            @else
                                                No National Park nearby
                                            @endif
                                        </li>
                                        <li>
                                            @if($company->swamp>0)
                                                Swamp nearby
                                            @else
                                                No Swamp nearby
                                            @endif
                                        </li>
                                        <li></li>
                                    </ul>

                                </div>
                            </div>
                            <h5 class="title-2"><strong>Reviews and Comments</strong></h5>
                            <section class="testimonial-var-two animatedParent clearfix" style="background-color: white">
                                <div class="container">
                                    <div class="row">
                                        @foreach(App\Review::where('company_id', $company->id)->orderBy('created_at','DESC')->take(4)->get() as $reviews)
                                        <div class="col-sm-4">
                                            <article class="testimonial var-two animated fadeInLeftShort clearfix">
                                                <figure class="avatar">
                                                    <img src="/assets/images/avatar.jpg" alt="avatar"/>
                                                </figure>
                                                <div class="contents">
                                                    <p>“{{$reviews->review}}” </p>
                                                    <cite class="fn">- <strong>{{$reviews->user->name}}</strong></cite>
                                                </div>
                                            </article>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            <form method="post" action="{{route('user.review.submit')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="company_id" value="{{ $company->id }}">

                                <div class="row" style="padding-left:15px;">
                                    <div class="col-sm-8 col-xs-10">
                                        <div class="range-advanced-main">
                                            <div class="range-text">
                                                <label><span class="range-title">Rate:</span></label>
                                                {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
                                                <div class="text-left">
                                                    <div class="stars starrr"></div>
                                                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box"
                                                       style="display:none; margin-right:10px;">
                                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-xs-10">
                                        <div class="form-group">
                                            <label><span class="range-title">Review:</span></label>
                                            <textarea class="form-control" name="review" rows="5"
                                                      placeholder="Your review"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-common">submit review</button>
                                </div>
                            </form>
                        </article>
                        @if(sizeof($related_homes)>0)
                        <div class="related-tours clearfix">
                            <header class="header-with-nav animatedParent clearfix">
                                <h3 class="title pull-left animated growIn slower">Related Homes</h3>
                                <a class="pull-right animated growIn slower" href="/homes/{{$related->type_id}}">SEE All Tours</a>
                            </header>
                            <div class="row">
                                @foreach($related_homes as $related)
                                <div class="col-md-4 col-xs-6 animatedParent">
                                    <article class="tour-post animated fadeInRightShort">
                                        <header class="tour-post-header clearfix">
                                            <span class="tour-price pull-left">
                                                UGx {{money_format("%.2n",$related->price)}}</span>
                                            <span class="tour-days pull-right"><i class="fa fa-clock-o"></i>&nbsp; rating</span>
                                        </header>
                                        <div class="tour-contents clearfix">
                                            <figure class="tour-feature-img">
                                                <img src="/images/services/single_service_1170x600/{{$related->image}}" alt="Image"/>
                                            </figure>
                                            <h5 class="entry-title p-name">{{$related->name}}</h5>
                                            <a class="more-details u-url" href="/{{$related->slug}}">
                                                See home details <i class="dashicons dashicons-arrow-right-alt2"></i></a>
                                        </div>
                                    </article>
                                </div>
                                    @endforeach
                            </div>
                        </div>
                            @endif
                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
    @endsection