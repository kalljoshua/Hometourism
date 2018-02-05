<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar">
    <aside id="sidebar" class="sidebar-white">
        <div class="widget widget-slider">
            <div class="widget-top">
                <h3 class="widget-title">Featured Properties Slider</h3>
            </div>
            <div class="widget-body">
                <div class="property-widget-slider">
                  <?php $featured_properties = App\Property::where('active',1)->take(4)->get();?>
                  @if(sizeof($featured_properties)>0)
                  @foreach($featured_properties as $featured)
                    <div class="item">
                        <div class="figure-block">
                            <figure class="item-thumb">
                              @if($featured->active==1)
                               <span class="label-featured label label-success">Featured</span>
                              @endif
                              <div class="label-wrap label-right">
                                @if($featured->for_sale==1)
                                  <div class="label-status label label-default">For Sale</div>
                                @else
                                  <div class="label-status label label-default">For Rent</div>
                                @endif

                                  <span class="label label-danger">Hot Offer</span>
                              </div>

                                <a href="/property-details/{{$featured->id}}" class="hover-effect">
                                    <img src="/images/properties/featured_slider_370x202/{{$featured->image}}" alt="thumb">
                                </a>
                                <div class="price">
                                    <span class="item-price">Shs {{$featured->price}}</span>
                                </div>
                                <ul class="actions">
                                  <li>
                                      <span id="fav-span{{$featured->id}}" data-toggle="tooltip" data-placement="top" title="Favorite"
                                            onclick="addToFavorites({{$featured->id}},
                                            @if(Auth::guard('agent')->id())
                                            {{Auth::guard('agent')->id()}}
                                                    @else
                                                    0
                                                    @endif
                                                    );"
                                            >
                                          <i class="fa fa-heart-o"></i>
                                      </span>
                                    </li>
                                    <li class="share-btn">
                                        <?php $url = URL::full();?>
                                        <div class="share_tooltip fade">
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}">
                                                <i class="fa fa-facebook"></i></a>
                                            <a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}">
                                                <i class="fa fa-twitter"></i></a>
                                            <a target="_blank" href="https://plus.google.com/share?url={{ urlencode($url) }}">
                                                <i class="fa fa-google-plus"></i></a>
                                        </div>
                                        <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                    </li>
                                </ul>
                            </figure>
                        </div>
                    </div>
                  @endforeach
                @else
                  Unfortunately, No Featured properties found!
                @endif

                </div>
            </div>
        </div>
        <div class="widget widget-recommend">
            <div class="widget-top">
                <h3 class="widget-title">We recommend</h3>
            </div>
            <?php $recommended = App\Property::where('recommended',1)->take(4)->get();?>
            <div class="widget-body">
              @if(sizeof($recommended)>0)
              @foreach($recommended as $recommend_property)
                <div class="media">
                    <div class="media-left">
                        <figure class="item-thumb">
                            <a class="hover-effect" href="/property-details/{{$recommend_property->id}}">
                                <img alt="thumb" src="/images/properties/agent_properties_150x110/{{$recommend_property->image}}" width="100" height="75">
                            </a>
                        </figure>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><a href="/property-details/{{$recommend_property->id}}">{{$recommend_property->title}}</a></h3>
                        <h4>Shs {{$recommend_property->price}}</h4>
                        <div class="amenities">
                            <p>{{$recommend_property->bedrooms}} beds • {{$recommend_property->bathrooms}} baths • {{$recommend_property->area_size}} sqft</p>
                            <p>{{$recommend_property->type->name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
              @else
                Unfortunately, No recommended properties found!
              @endif
            </div>
        </div>
        <div class="widget widget-reviews">
            <div class="widget-top">
                <h3 class="widget-title">Latest Reviews</h3>
            </div>
            <?php $latest_reviews = App\Review::orderBy('created_at','DESC')->take(2)->get(); ?>
            <div class="widget-body">
              @if(sizeof($latest_reviews)>0)
              @foreach($latest_reviews as $reviews)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object"
                            src="/images/properties/latest_reviews_50x50/{{$reviews->property->image}}"
                            alt="Thumb" width="50" height="50">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><a href="/property-details/{{$reviews->property->id}}">{{$reviews->property->title}}</a></h3>
                        <div class="rating">
                            <span class="bottom-ratings">
                              @for ($k=1; $k <= 5 ; $k++)
                            <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                <span class="glyphicon glyphicon-star{{ ($k <= $reviews->property->rating) ? '' : '-empty'}}"></span></span>
                            @endfor
                        </div>
                        <p>{{$reviews->review}}</p>
                    </div>
                </div>
              @endforeach
            @else
              Unfortunately, No reviews found!
            @endif
            </div>
        </div>
    </aside>
</div>
