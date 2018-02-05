@extends('...layouts.user_layout')
@section('content')

    <!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="page-title breadcrumb-top">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb"><li ><a href="/"><i class="fa fa-home"></i></a></li><li class="active">Simple Property – Listing</li></ol>
                        <div class="page-title-left">
                            <h2>Search Results</h2>
                        </div>
                        <div class="page-title-right">
                            <div class="view hidden-xs">
                                <div class="table-cell">
                                    <span class="view-btn btn-list active"><i class="fa fa-th-list"></i></span>
                                    <span class="view-btn btn-grid"><i class="fa fa-th-large"></i></span>
                                    <span class="view-btn btn-grid-3-col"><i class="fa fa-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 list-grid-area">
                    <div id="content-area">
                        <!--start property items-->
                        <div class="property-listing list-view">

                            <div class="row">
                                @foreach($properties as $property)
                                @if($property->for_sale == 1)
                                    <?php $status = 'Sale';?>
                                @else
                                    <?php $status = 'Rent';?>
                                @endif
                                    <div class="item-wrap">
                                        <div class="property-item table-list">
                                            <div class="table-cell">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="label-wrap hide-on-list">
                                                            <span class="label label-default">For {{$status}}</span>
                                                            <span class="label label-danger">Sold</span>
                                                        </div>
                                                        <div class="price hide-on-list">
                                                            <h3>{{$property->price}}</h3>
                                                            <p class="rant">{{$property->price_per_month}}/mo</p>
                                                        </div>
                                                        <a href="/property-details/{{$property->id}}">
                                                            <img src="/images/properties/property_listing_364x244/{{$property->image}}" alt="thumb">
                                                        </a>
                                                        <div class="thumb-caption clearfix">
                                                            <ul class="actions pull-right">
                                                                <li>
                                                                <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Favorite">
                                                                    <i class="fa fa-heart"></i>
                                                                </span>
                                                                </li>
                                                                <li class="share-btn">
                                                                    <div class="share_tooltip fade">
                                                                        <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                                                        <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                                                        <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                                                                        <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                                                                    </div>
                                                                    <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                                </li>
                                                                <li>
                                                                <span data-toggle="tooltip" data-placement="top" title="Photos (12)">
                                                                    <i class="fa fa-camera"></i> <!--<span class="count">(12)</span>-->
                                                                </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="item-body table-cell">                                                    
                                                <div class="body-left table-cell">
                                                    <div class="info-row">
                                                        <div class="label-wrap hide-on-grid">
                                                            <div class="label-status label label-default">For {{$status}}</div>
                                                            <span class="label label-danger">Sold</span>
                                                        </div>
                                                        <h2 class="property-title"><a href="/property-details/{{$property->id}}">{{$property->title}}</a></h2>
                                                        <h4 class="property-location">{{$property->address}}. {{$property->district}}, {{$property->country}}</h4>
                                                    </div>
                                                    <div class="info-row amenities hide-on-grid">
                                                        <p>
                                                            <span>Beds: {{$property->bedrooms}}</span>
                                                            <span>Baths: {{$property->bathrooms}}</span>
                                                            <span>Sqft: {{$property->area_size}}</span>
                                                        </p>
                                                        <p></p>
                                                    </div>
                                                    <div class="info-row date hide-on-grid">
                                                        <p><i class="fa fa-user"></i> <a href="#">{{$property->agent->first_name}} {{$property->agent->last_name}}</a></p>
                                                        <p><i class="fa fa-calendar"></i> {{ $property->created_at->format('M d,Y \a\t h:i a') }} </p>
                                                    </div>
                                                </div>
                                                <div class="body-right table-cell hidden-gird-cell">
                                                    <div class="info-row price">
                                                        <h3>{{$property->price}}</h3>
                                                            <p class="rant">{{$property->price_per_month}}/mo</p>
                                                    </div>
                                                    <div class="info-row phone text-right">
                                                        <a href="/property-details/{{$property->id}}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                        <p><a href="#">{{$property->agent->mobile_phone}}</a></p>
                                                    </div>
                                                </div>
                                                <div class="table-list full-width hide-on-list">
                                                    <div class="cell">
                                                        <div class="info-row amenities">
                                                            <p>
                                                            <span>Beds: {{$property->bedrooms}}</span>
                                                            <span>Baths: {{$property->bathrooms}}</span>
                                                            <span>Sqft: {{$property->area_size}}</span>
                                                            </p>
                                                            <p>Single Family Home</p>
                                                        </div>
                                                    </div>
                                                    <div class="cell">
                                                        <div class="phone">
                                                            <a href="/property-details/{{$property->id}}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            <p><a href="#">{{$property->agent->mobile_phone}}</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-foot date hide-on-list">
                                            <div class="item-foot-left">
                                                <p><i class="fa fa-user"></i> <a href="#">{{$property->agent->first_name}} {{$property->agent->last_name}}</a></p>
                                            </div>
                                            <div class="item-foot-right">
                                                <p><i class="fa fa-calendar"></i> {{ $property->created_at->format('M d,Y \a\t h:i a') }} </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--end property items-->


                        <hr>

                        <!--start Pagination-->
                        <div class="pagination-main">
                            <ul class="pagination">
                                <li class="disabled"><a aria-label="Previous" href="#"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a aria-label="Next" href="#"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                            </ul>
                        </div>
                        <!--start Pagination-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section page body-->



@endsection
