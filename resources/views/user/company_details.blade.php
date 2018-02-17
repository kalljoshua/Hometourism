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
                            <h4 class="pull-left tour-single-title animated growIn slower">{{$company->name}}</h4>
                            <span class="pull-left" style="color: #FDC600; font-size: 16px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Views ({{$company->views}})</span>
                            <span class="tour-price-single pull-right animated growIn slower" style="color: #FDC600">
                               @for ($k=1; $k <= 5 ; $k++)
                                    <span data-title="Average Rate: 5 / 5"
                                          class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $company->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                @endfor
                                ({{$company->rating}})
                            </span>
                            <label class="switch1 pull-right">
                                <input type="checkbox" id="sus-check-company{{$company->id}}"
                                       data-property-id="{{$company->id}}"
                                       onchange="fullbooking({{$company->id}});">
                                <div class="slider1 round"></div>
                            </label>
                            <p class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;Full Booking: &nbsp;</p>
                            <span>
                                @if(Auth::guard('user')->user())
                                    @if(Auth::guard('user')->user()->id==$company->user_id)
                                        <a class="t-btn btn-sm btn-info pull-right" href="/home/{{$company->slug}}/edit">Edit</a>
                                    @endif
                                @endif

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
                                    <span><i class="fa fa-briefcase"></i><strong>Status : &nbsp;
                                        </strong>@if($company->full_booking>0)<b style="color: red">Fully Booked</b>
                                        @else Vaccant @endif</span>
                                    <span><i class="fa fa-tags"></i><strong>Price : &nbsp;
                                        </strong>$ {{number_format($company->price)}}</span>
                                </div>
                                <p> {{$company->description}}</p>
                                <footer class="tour-contents-footer clearfix">
                                    @if(Auth::guard('user')->user())
                                        @if($company->full_booking<1)
                                    <a class="t-btn btn-red pull-right" href="#" data-toggle="modal"
                                       data-target="#booking-popup">BOOK THIS HOME</a>
                                        @else
                                            <a class="t-btn btn-red pull-right" href="#">Fully Booked</a>
                                        @endif

                                    @else
                                        <a class="t-btn btn-red pull-right" href="#" data-toggle="modal"
                                           data-target="#booking-popup">REQUEST A HOST HOME</a>
                                    @endif
                                    <div class="modal fade" id="booking-popup" tabindex="-1" role="dialog"
                                         aria-labelledby="booking-popup" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form method="post" action="{{route('submit.request')}}">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    @if(Auth::guard('user')->user() )
                                                        <h4 class="modal-title">Book this Home</h4>
                                                        <input name="type" value="1" type="hidden"/>
                                                    @else
                                                        <h4 class="modal-title">Request this Home</h4>
                                                        <input name="type" value="2" type="hidden"/>
                                                    @endif
                                                </div>
                                                <div class="modal-body col-md-12">
                                                    @if(!Auth::guard('user')->user() )
                                                        <div class="form-group">
                                                            <div class="input-icon">
                                                                <input name="name" class="form-control"
                                                                       placeholder="Your Full Name" type="text" required/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-icon">
                                                                <input name="contact" class="form-control"
                                                                       placeholder="Your Contact" type="text" required/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-icon">
                                                                <input name="email" class="form-control"
                                                                       placeholder="Your Email Address" type="text" required/>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <input name="age" class="form-control"
                                                                   placeholder="How old are you?" type="text" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <select name="gender">
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <input name="guests" class="form-control"
                                                                   placeholder="Number of Guests" type="text" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <input name="profession" class="form-control"
                                                                   placeholder="Your Profession" type="text" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <input name="period" class="form-control"
                                                                   placeholder="Period of Stay" type="text" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <input name="service_id" value="{{$company->id}}" type="hidden"/>
                                                            <input name="slug" value="{{$company->slug}}" type="hidden"/>

                                                            <input name="location" class="form-control"
                                                                   placeholder="Preferred  location" type="text" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                        <textarea rows="3" class="form-control" name="expectations"
                                                                  placeholder="Enter request info" type="text">
                                                            Detailed Expectations....
                                                        </textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn-sm btn-warning pull-left"
                                                            data-dismiss="modal">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                    <input type="submit" class="btn-sm btn-primary" value="Submit">
                                                </div>

                                            </form>

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
                                        <li>@if($company->hospital>0)
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
                                @if(sizeof($company->features)>0)
                                <h5 class="title-2"><strong>More features that might interest you</strong></h5>
                                <section class="home-tour-type animatedParent clearfix">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($company->features as $type)
                                                <div class="col-md-3 col-xs-6">
                                                    <article class="service-var-2 animated fadeInLeftShort clearfix">
                                                        <div class="contents-wrap">
                                                            <h5 class="entry-title p-name">{{$type->feature}}</h5>
                                                        </div>
                                                    </article>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                                @endif
                            </div>
                            <h5 class="title-2"><strong>Reviews and Comments</strong></h5>
                            <section class="testimonial-var-two animatedParent clearfix" style="background-color: white">
                                <div class="container">
                                    <div class="row">
                                        @foreach(App\Review::where('company_id', $company->id)->orderBy('created_at','DESC')->take(4)->get() as $reviews)
                                        <div class="col-sm-4">
                                            <article class="testimonial var-two animated fadeInLeftShort clearfix">
                                                <figure class="avatar">
                                                    <img src="/images/users/contact_user_74x74/{{$reviews->user->image}}" alt="avatar"/>
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
                            </header>
                            <div class="row">
                                @foreach($related_homes as $related)
                                <div class="col-md-4 col-xs-6 animatedParent">
                                    <article class="tour-post animated fadeInRightShort">
                                        <header class="tour-post-header clearfix">
                                            <span class="tour-price pull-left">
                                                $ {{number_format($related->price)}}</span>
                                            <span class="tour-days pull-right" style="color: #FDC600">
                                                    @for ($k=1; $k <= 5 ; $k++)
                                                    <span data-title="Average Rate: 5 / 5"
                                                          class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $related->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                                @endfor
                                                ({{$related->rating}})
                                                </span>
                                        </header>
                                        <div class="tour-contents clearfix">
                                            <figure class="tour-feature-img">
                                                <img src="/images/services/single_service_1170x600/{{$related->image}}" alt="Image"/>
                                            </figure>
                                            <h5 class="entry-title p-name">{{$related->name}}</h5>
                                            <span class="pull-left" style="color: #fd0b31">views ({{$related->views}})</span>
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