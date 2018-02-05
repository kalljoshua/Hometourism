@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : User Account</title>
@endsection
@section('content')

<div id="content" class="site-content">
    <div id="tropical-banner" class=" text-center clearfix">
        <img src="/assets/images/banner.jpg" alt="banner"/>
        <div class="container banner-contents clearfix">
            @include('user.search')
        </div>
        <span class="overlay"></span>
    </div>
    @include('flash::message')
    <section class="tour-page clearfix">
        <div class="container">

            <div class="row">
                <div class="col-md-3 col-sm-4 animatedParent">
                    <section class="advance-tour-filter animated fadeInRightShort clearfix">
                        <h5 class="widget-title">filter the result</h5>
                        <div class="search widget clearfix">
                            <form method="get"  class="search-form" action="where-we-go.html#">
                                <div>
                                    <input type="text" value="" name="s" class="search-text">
                                    <input type="submit" class="search-submit" value="">
                                    <i class="fa fa-search"></i>
                                </div>
                            </form>
                        </div>
                        <fieldset>
                            <div class="collapse-box">
                                <h5 class="collapset-title no-border">My Classified
                                    <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified">
                                        <i class="fa fa-angle-down"></i></a></h5>
                                <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
                                    <ul class="acc-list">
                                        <li class="active">
                                            <a href="{{route('user.profile')}}">
                                                <i class="fa fa-home"></i> Personal Home</a>
                                        </li>

                                        <li class="">
                                            <a href="{{route('user.package')}}">
                                                <i class="fa fa-home"></i> Purchase a Package</a>
                                        </li>

                                        <li class="">
                                            <a href="{{route('user.profile')}}">
                                                <i class="fa fa-briefcase"></i> Upgrade Package</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="collapse-box">
                                <h5 class="collapset-title">My Listings <a aria-expanded="true"
                                                                      class="pull-right" data-toggle="collapse"
                                                                      href="account-home.html#myads">
                                        <i class="fa fa-angle-down"></i></a></h5>
                                <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                                    <ul class="acc-list">
                                        <li>
                                            <a href="{{route('user.myads',['userId' => Auth::guard('user')->id()])}}">
                                                <i class="fa fa-credit-card"></i> My Ads</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.favourites',['userId' => Auth::guard('user')->id()])}}">
                                                <i class="fa fa-heart-o"></i> Favourite Ads</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.search',['userId' => Auth::guard('user')->id()])}}">
                                                <i class="fa fa-star-o"></i> Saved Search </a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.archived',['userId' => Auth::guard('user')->id()])}}">
                                                <i class="fa fa-folder-o"></i> Archived Ads</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.pending',['userId' => Auth::guard('user')->id()])}}">
                                                <i class="fa fa-hourglass"></i> Pending Approval </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="collapse-box">
                                <h5 class="collapset-title">Listing Orders <a aria-expanded="true" class="pull-right"
                                                                              data-toggle="collapse" href="#orders">
                                        <i class="fa fa-angle-down"></i></a></h5>
                                <div aria-expanded="true" id="orders" class="panel-collapse collapse in">
                                    <ul class="acc-list">
                                        {{--@foreach(App\ServiceRequest::where('type',2)->get() as $order)
                                            @if($order->company->user_id==$auth_user_id)--}}
                                                <li>
                                                    <a href="#" data-toggle="modal"
                                                       data-target="#modal-default-order">
                                                        <i class="fa fa-briefcase"></i>Name {{--{{$order->name}}--}}</a>
                                                </li>

                                                {{--<div class="modal fade" id="modal-default-order">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <aside class="panel panel-body panel-details">
                                                                <ul>

                                                                    <li>
                                                                        <p class="no-margin"><strong>Client Name:</strong>
                                                                            <a href="#"> {{$order->name}} </a></p></li>
                                                                    <li>
                                                                    <li>
                                                                        <p class="no-margin"><strong>Client Contact:</strong>
                                                                            <a href="#">{{$order->contact}}</a> </p>
                                                                    </li>
                                                                    <li>
                                                                        <p class=" no-margin "><strong>Email
                                                                                Address:</strong>
                                                                            <a href="#">{{$order->email}}</a></p>
                                                                    </li>
                                                                    <li>
                                                                        <p class="no-margin"><strong>Location:</strong>
                                                                            <a href="#">{{$order->location}}</a></p>
                                                                    </li>
                                                                    <li>
                                                                        <p class="no-margin"><strong>Order Date:</strong>
                                                                            <a href="#">{{$order->created_at}}</a></p>
                                                                    </li>
                                                                    <li>
                                                                        <p class="no-margin"><strong>Order Details:</strong>
                                                                            <a href="#">{{$order->details}}</a></p>
                                                                    </li>
                                                                </ul>
                                                            </aside>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            @endif
                                        @endforeach--}}
                                    </ul>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="range-filter">
                            <div class="collapse-box">
                                <h5 class="collapset-title">Terminate Account
                                    <a aria-expanded="true" class="pull-right" data-toggle="collapse"
                                       href="account-home.html#close"><i class="fa fa-angle-down"></i></a></h5>
                                <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                                    <ul class="acc-list">
                                        <li>
                                            <a href="{{route('account.close')}}"><i class="fa fa-close"></i>
                                                Close Account</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </fieldset>
                    </section>
                </div>
                <div class="col-md-9 col-sm-8">
                    <header class="section-header clearfix">
                        <div class="sorting pull-left">
                            <select class="form-control" >
                                <option>Sort Destination By</option>
                                <option>Africa</option>
                                <option>Australia</option>
                                <option>Asia</option>
                                <option>Europe</option>
                                <option>North America</option>
                                <option>South America</option>
                            </select>
                        </div>
                        <div class="layout-control pull-right clearfix">
                            <a data-layout="4" href="where-we-go.html#"><i class="fa fa-th"></i></a>
                            <a data-layout="12" href="where-we-go.html#"><i class="fa fa-th-list"></i></a>
                        </div>
                    </header>
                    @if(sizeof($companies)>0)
                    <div class="row">
                        @foreach($companies as $company)
                        <div class="tour-item col-md-4 col-sm-6 animatedParent">
                            <article class="tour-post animated fadeInDownShort">
                                <header class="tour-post-header clearfix">
                                    <span class="tour-price pull-left">UGx {{money_format("%.2n",$company->price)}}</span>
                                    <span class="tour-days pull-right"><i class="fa fa-clock-o"></i>&nbsp; rating</span>
                                </header>
                                <div class="tour-contents clearfix">
                                    <figure class="tour-feature-img">
                                        <a href="/{{$company->slug}}">
                                            <img src="/images/services/single_service_1170x600/{{$company->image}}" alt="Image"/></a>
                                    </figure>
                                    <h5 class="entry-title p-name">
                                        <a href="/{{$company->slug}}">{{$company->name}}</a></h5>
                                    <div class="entry-contents hide clearfix" style="">
                                        <p> {{ str_limit($company->description, $limit = 150, $end = '...') }} </p>
                                    </div>
                                    <a class="more-details u-url" href="/{{$company->slug}}">See home details
                                        <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <div class="text-center" style="margin-top:50px">
                            <h3>No Homes available under your account!</h3>
                        </div>
                    @endif
                    <div id="pagination" class="text-center animatedParent clearfix">
                        <ul class="pagination">
                            <?php echo $companies->render(); ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>



</div><!-- .site-content -->
@endsection