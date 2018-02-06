@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : Favourites</title>
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
                    @include('user.left_bar')
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

                        @if(sizeof($favourites)>0)
                            <div class="row">
                                @foreach($favourites as $company)
                                    <div class="tour-item col-md-4 col-sm-6 animatedParent">
                                        <article class="tour-post animated fadeInDownShort">
                                            <header class="tour-post-header clearfix">
                                                <span class="tour-price pull-left">UGX {{number_format($company->price)}}</span>
                                                <span class="tour-days pull-right" style="color: #FDC600">
                                                    @for ($k=1; $k <= 5 ; $k++)
                                                        <span data-title="Average Rate: 5 / 5"
                                                              class="bottom-ratings tip">
                                                        <span class="glyphicon glyphicon-star{{ ($k <= $company->rating) ? '' : '-empty'}}"></span>
                                                            </span>
                                                    @endfor
                                                    ({{$company->rating}})
                                                </span>
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

                                                <span class="pull-left" style="color: #fd0b31">views ({{$company->views}})</span>
                                                <a class="more-details u-url" href="/{{$company->slug}}">See home details
                                                    <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center" style="margin-top:50px">
                                <h3>No Homes available under Favourites!</h3>
                            </div>
                        @endif
                        <div id="pagination" class="text-center animatedParent clearfix">
                            <ul class="pagination">
                                <?php echo $favourites->render(); ?>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </section>



    </div><!-- .site-content -->
@endsection